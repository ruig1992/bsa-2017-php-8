@extends('layouts.app')

@section('title', 'Cars list')

@section('content')
  <section>
    <header class="mb-4">
      <h1 class="h2">
        <i class="fa fa-list-alt mr-2" aria-hidden="true"></i> Cars List</h1>
    </header>

    @if (count($cars) === 0)
      @component('components.alert')
        @slot('type') warning @endslot
        No cars... Unfortunately, you will have to walk. :-)
      @endcomponent
    @else

      <div class="row">
        @foreach ($cars as $car)
          <div class="col-12 col-md-6 col-lg-4 p-3">
            @include('cars.car-item', ['vMode' => 'index'])
          </div>
        @endforeach
      </div>
    @endif

  </section>
@endsection
