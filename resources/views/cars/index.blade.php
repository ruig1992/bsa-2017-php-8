@extends('layouts.app')

@section('title', 'Cars list')

@section('content')
  @empty($cars)
    <p>No cars</p>
  @endempty

  <ul>
  @foreach ($cars as $car)
    <li>
      <p>
        <a href="{{ route('cars.show', ['id' => $car->getId()]) }}">
          {{ $car->getModel() }}
        </a>
      </p>
      <p>Color: {{ $car->getColor() }}</p>
      <p>Price: {{ $car->getPrice() }}</p>
    </li>
  @endforeach
  </ul>
@endsection
