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
        <a href="{{ route('cars.show', ['id' => $car['id']]) }}">
          {{ $car['model'] }}
        </a>
      </p>
      <p>Color: {{ $car['color'] }}</p>
      <p>Price: {{ $car['price'] }}</p>
    </li>
  @endforeach
  </ul>
@endsection
