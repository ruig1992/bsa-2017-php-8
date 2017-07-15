<?php
namespace App\Http\Controllers;

use App\Entities\Car;
use App\Http\Requests\ValidatedCar;
use App\Repositories\Contracts\CarRepositoryInterface;

/**
 * Class CarController
 * @package App\Http\Controllers
 */
class CarController extends Controller
{
    /**
     * @var CarRepositoryInterface The cars repository instance
     */
    protected $carsRepository;

    /**
     * @param CarRepositoryInterface $carsRepository
     */
    public function __construct(CarRepositoryInterface $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    /**
     * Gets and displays the list of all cars from the repository.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $cars = $this->carsRepository->getAll();

        return view('cars.index', ['cars' => $cars->toArray()]);
    }

    /**
     * Shows the form for creating a new car.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Stores a newly created car in the repository.
     *
     * @param \App\Http\Requests\ValidatedCar $request
     *    Contains the rules for validating the car data from request
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(ValidatedCar $request)
    {
        $data = $request->only([
            'model',
            'registration_number',
            'year',
            'color',
            'price',
        ]);

        $car = new Car($data);
        $this->carsRepository->store($car);
        $updatedCars = $this->carsRepository->getAll();

        return view('cars.index', ['cars' => $updatedCars->toArray()]);
    }

    /**
     * Gets and displays the full information about the car by its id.
     *
     * If the car does not exist, returns the response
     * with error code 404 (Not Found).
     *
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|
     *         \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $car = $this->carsRepository->getById($id);

        if ($car === null) {
            return response()->view('errors.404', [
                'message' => "The car #$id not found. But, there are other ones! :-)",
            ], 404);
        }
        return view('cars.show', ['car' => $car->toArray()]);
    }

    /**
     * Shows the form for editing the specified car by its id.
     *
     * If the car does not exist, returns the response
     * with error code 404 (Not Found).
     *
     * @param int $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|
     *         \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $car = $this->carsRepository->getById($id);

        if ($car === null) {
            return response()->view('errors.404', [
                'message' => "The car #$id not found",
            ], 404);
        }
        return view('cars.edit', ['car' => $car->toArray()]);
    }

    /**
     * Updates the specified car by its id in the repository.
     *
     * If the car does not exist, returns the response
     * with error code 404 (Not Found).
     *
     * @param \App\Http\Requests\ValidatedCar $request
     *    Contains the rules for validating the car data from request
     * @param int $id
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory|
     *         \Illuminate\Http\Response
     */
    public function update(ValidatedCar $request, int $id)
    {
        $data = $request->only([
            'model',
            'registration_number',
            'year',
            'color',
            'price',
        ]);

        $car = $this->carsRepository->getById($id);
        if ($car === null) {
            return response()->view('errors.404', [
                'message' => "The car #$id not found",
            ], 404);
        }

        $car->fromArray($data);
        $car = $this->carsRepository->update($car);

        return view('cars.show', ['car' => $car->toArray()]);
    }
}
