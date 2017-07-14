@extends('layouts.app')

@section('title', $car['model'])

@section('content')
  <article>
    <header class="mb-4">
      <h1 class="h2">
        <i class="fa fa-car mr-2" aria-hidden="true"></i> Car Info</h1>
    </header>

    @include('cars.car-item', ['vMode' => 'show'])
  </article>

@endsection
