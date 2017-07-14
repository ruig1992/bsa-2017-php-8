@extends('layouts.app')

@section('title', $car->getModel())

@section('content')
  @empty($car)
    <p>No car</p>
  @endempty

  <h2>{{ $car->getModel() }}</h2>

  <p>Year: {{ $car->getYear() }}</p>
  <p>Registration number: {{ $car->getRegistrationNumber() }}</p>
  <p>Color: {{ $car->getColor() }}</p>
  <p>Price: {{ $car->getPrice() }}</p>

  <a href="{{ route('cars.edit', ['id' => $car->getId()]) }}" class="btn btn-success edit-button">Edit</a>
  <a href="{{ route('cars.index') }}" class="btn btn-danger delete-button">Delete</a>
@endsection
