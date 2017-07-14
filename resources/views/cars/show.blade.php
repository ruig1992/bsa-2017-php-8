@extends('layouts.app')

@section('title', $car['model'])

@section('content')
  @empty($car)
    <p>No car</p>
  @endempty

  <h2>{{ $car['model'] }}</h2>

  <p>Year: {{ $car['year'] }}</p>
  <p>Registration number: {{ $car['registration_number'] }}</p>
  <p>Color: {{ $car['color'] }}</p>
  <p>Price: {{ $car['price'] }}</p>

  <a href="{{ route('cars.edit', ['id' => $car['id']]) }}" class="btn btn-success edit-button">Edit</a>
  <a href="{{ route('cars.index') }}" class="btn btn-danger delete-button">Delete</a>
@endsection
