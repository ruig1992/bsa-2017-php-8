<?php
namespace App\Http\Controllers;

use App\Entities\Car;
use App\Http\Requests\ValidatedCar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Contracts\CarRepositoryInterface;

class CarController extends Controller
{
    /**
     * Cars repository
     * @var CarRepositoryInterface
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
     * Get and show the list of all cars with certain data fields
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cars = $this->carsRepository->getAll();

        return view('cars.index', ['cars' => $cars->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created car in the repository
     *
     * @param  ValidatedCar $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * Get and show the detailed information about the car by its id
     *
     * @param int $id
     * @return JsonResponse
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Update the specified car in the repository
     *
     * @param  ValidatedCar $request
     * @return JsonResponse
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
