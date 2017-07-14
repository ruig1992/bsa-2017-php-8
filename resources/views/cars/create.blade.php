@extends('layouts.app')

@section('title', 'Add a new car')

@section('content')
  <section>
    <header class="mb-4">
      <h1 class="h3">
        <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Add a new car</h1>
    </header>

    <div class="container">

    <form id="form-car-data" method="POST" action="{{ route('cars.store') }}">
      {{ csrf_field() }}

      <div class="form-group row{{ $errors->has('model') ? ' has-danger' : '' }}">
        <label for="model" class="form-control-label col-md-3 col-form-label">Model</label>

        <div class="col col-lg-8">
          <input id="model" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="model" value="{{ old('model') }}" autofocus>
          @if ($errors->has('model'))
            <div class="form-control-feedback">{{ $errors->first('model') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group row{{ $errors->has('registration_number') ? ' has-danger' : '' }}">
        <label for="registration_number" class="form-control-label col-md-3 col-form-label">Registration number</label>

        <div class="col col-lg-8">
          <input id="registration_number" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="registration_number" value="{{ old('registration_number') }}">
          @if ($errors->has('registration_number'))
            <div class="form-control-feedback">{{ $errors->first('registration_number') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group row{{ $errors->has('year') ? ' has-danger' : '' }}">
        <label for="year" class="form-control-label col-md-3 col-form-label">Year</label>

        <div class="col col-lg-8">
          <input id="year" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="year" value="{{ old('year') }}">
          @if ($errors->has('year'))
            <div class="form-control-feedback">{{ $errors->first('year') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group row{{ $errors->has('color') ? ' has-danger' : '' }}">
        <label for="color" class="form-control-label col-md-3 col-form-label">Color</label>

        <div class="col col-lg-8">
          <input id="color" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="color" value="{{ old('color') }}">
          @if ($errors->has('color'))
            <div class="form-control-feedback">{{ $errors->first('color') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group row{{ $errors->has('price') ? ' has-danger' : '' }}">
        <label for="price" class="form-control-label col-md-3 col-form-label">Price</label>

        <div class="col col-lg-8">
          <input id="price" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="price" value="{{ old('price') }}">
          @if ($errors->has('price'))
            <div class="form-control-feedback">{{ $errors->first('price') }}</div>
          @endif
        </div>
      </div>

      <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i> Save</button>
      </div>
    </form>

    </div>
  </section>
@endsection
