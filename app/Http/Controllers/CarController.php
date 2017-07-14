<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests\ValidatedCar;

use App\Entities\Car;
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

        $updatedCars = $this->carsRepository->getAll($car);

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
            return response()->view(
                'errors.404',
                ['message' => "The car with ID #$id not found"],
                404
            );
        }
        return view('cars.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified car in the repository
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
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
            return response()->json([
                'message' => "The car with ID #$id not found",
            ], 404);
        }

        $car->fromArray($data);
        $data = $this->carsRepository->update($car);

        return response()->json($data);
    }

    /**
     * Remove the specified car from the repository
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $oldCount = count($this->carsRepository->getAll());
        $newCount = count($this->carsRepository->delete($id));

        if ($newCount === $oldCount) {
            return response()->json([
                'message' => "The car with ID #$id doesn't exist",
            ], 404);
        }
        return response('Ok', 200);
    }
}
