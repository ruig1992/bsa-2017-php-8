<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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

        return view('cars.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created car in the repository
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $storeData = $request->only([
            'model',
            'year',
            'mileage',
            'registration_number',
            'color',
            'price',
        ]);
        $car = new Car($storeData);
        $newData = $this->carsRepository->store($car);

        return response()->json($newData);
    }

    /**
     * Get and show the detailed information about the car by its id
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id)
    {
        return view('cars.show');

        $car = $this->carsRepository->getById($id);

        if ($car === null) {
            return response()->json([
                'message' => "The car with ID #$id not found",
            ], 404);
        }
        return response()->json($car);
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
        $storeData = $request->only([
            'model',
            'year',
            'mileage',
            'registration_number',
            'color',
            'price',
        ]);

        $car = $this->carsRepository->getById($id);
        if ($car === null) {
            return response()->json([
                'message' => "The car with ID #$id not found",
            ], 404);
        }

        $car->fromArray($storeData);
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
