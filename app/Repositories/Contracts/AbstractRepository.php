<?php
namespace App\Repositories\Contracts;

use App\Entities\Contracts\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Exceptions\NotFoundException;

/**
 * Class AbstractRepository
 * @package App\Repositories\Contracts
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var array Raw mock data.
     */
    protected static $itemsData;

    /**
     * @var \Illuminate\Database\Eloquent\Collection Wrapped data to handy work with.
     */
    protected static $itemsCollection = null;

    public function __construct()
    {
        if (!is_null(self::$itemsCollection)) {
            return;
        }

        self::$itemsCollection = new Collection();

        foreach (static::$itemsData as $data) {
            $item = $this->createEntity($data);
            self::$itemsCollection->push($item);
        }
    }

    /**
     * Creates an entity of a repository type
     *
     * @param array $data
     * @return mixed
     */
    abstract protected function createEntity(array $data);

    /**
     * @inheritdoc
     */
    public function getAll(): Collection
    {
        return self::$itemsCollection->sortBy(function ($entity) {
            return $entity->getId();
        });
    }

    /**
     * Returns a vehicle by id.
     *
     * @param  int $id
     * @return Vehicle|null
     */
    public function getById(int $id): ?Vehicle
    {
        $item = self::$itemsCollection->filter(function ($entity) use ($id) {
            return $entity->getId() === $id;
        })->first();

        if (!$item) {
            return null;
        }

        return $item;
    }

    /**
     * Adds a vehicle.
     *
     * @param  Vehicle $entity A new vehicle data.
     * @return Vehicle|null
     */
    public function addItem($entity): ?Vehicle
    {
        $id = $this->getNextIndex();
        $entity->setId($id);
        self::$itemsCollection = self::$itemsCollection->push($entity);

        return $this->getById($id);
    }

    /**
     * Updates a vehicle in collection.
     *
     * @param  Vehicle $entity Edited vehicle.
     * @return Vehicle|null  An updated vehicle or null if it isn't exist
     * @throws NotFoundException
     */
    public function update($entity): ?Vehicle
    {
        $id = $entity->getId();

        $notFound = self::$itemsCollection->filter(function ($entity) use ($id) {
            return $entity->getId() == $id;
        })->isEmpty();

        if ($notFound) {
            throw new NotFoundException("No item is found.");
        }

        $this->delete($id);
        self::$itemsCollection = self::$itemsCollection->push($entity);

        return $this->getById($id);
    }

    /**
     * Updates a vehicle in the collection if exists. Adds if no.
     *
     * @param  Vehicle $entity
     * @return Vehicle|null
     */
    public function store($entity): ?Vehicle
    {
        try {
            return $this->update($entity);
        } catch (NotFoundException $e) {
            return $this->addItem($entity);
        }
    }

    /**
     * @inheritdoc
     */
    public function delete(int $id): Collection
    {
        self::$itemsCollection = self::$itemsCollection->filter(
            function ($entity) use ($id) {
                return $entity->getId() !== $id;
            }
        );

        return $this->getAll();
    }

    /**
     * Calculates a new id.
     *
     * @return int
     */
    public static function getNextIndex(): int
    {
        $i = 0;

        self::$itemsCollection->each(function ($entity) use (&$i) {
            if ($entity->getId() > $i) {
                $i = $entity->getId();
            }
        });

        return $i + 1;
    }
}
