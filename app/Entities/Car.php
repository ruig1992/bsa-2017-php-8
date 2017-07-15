<?php
namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;
use App\Entities\Contracts\{Vehicle, VehicleInterface};

/**
 * Class Car
 * @package App\Entities
 */
class Car extends Vehicle implements VehicleInterface, Arrayable
{
    protected $id;
    protected $model;
    protected $year;
    protected $registration_number;
    protected $color;
    protected $price;
    /**
     * @var array
     */
    protected static $fillable = [
        'id',
        'model',
        'year',
        'registration_number',
        'color',
        'price',
    ];

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return Car
     */
    public function setModel($model): self
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return Car
     */
    public function setYear($year): self
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrationNumber()
    {
        return $this->registration_number;
    }

    /**
     * @param mixed $license_number
     * @return Car
     */
    public function setRegistrationNumber($license_number): self
    {
        $this->registration_number = $license_number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     * @return Car
     */
    public function setColor($color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Car
     */
    public function setPrice($price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'model' => $this->getModel(),
            'year' => $this->getYear(),
            'registration_number' => $this->getRegistrationNumber(),
            'color' => $this->getColor(),
            'price' => $this->getPrice(),
        ];
    }
}
