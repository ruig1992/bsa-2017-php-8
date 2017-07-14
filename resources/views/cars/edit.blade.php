@extends('layouts.app')

@section('title', 'Edit the car')

@section('content')
<section>
  <h3 class="panel-title">Edit the car #{{ $car['id'] }}</h3>
  <form id="form-car-data" method="POST" action="{{ route('cars.update', ['id' => $car['id']]) }}">
    {{ csrf_field() }}

    <input name="_method" type="hidden" value="PUT">

    <div class="form-group{{ $errors->has('model') ? ' has-danger' : '' }}">
      <label for="model" class="col-md-4 form-control-label">Model</label>

      <div class="col-md-6">
        <input id="model" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="model" value="{{ old('model', $car['model']) }}">
        @if ($errors->has('model'))
          <div class="form-control-feedback">{{ $errors->first('model') }}</div>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('registration_number') ? ' has-danger' : '' }}">
      <label for="registration_number" class="col-md-4 form-control-label">Registration number</label>

      <div class="col-md-6">
        <input id="registration_number" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="registration_number" value="{{ old('registration_number', $car['registration_number']) }}">
        @if ($errors->has('registration_number'))
          <div class="form-control-feedback">{{ $errors->first('registration_number') }}</div>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
      <label for="year" class="col-md-4 form-control-label">Year</label>

      <div class="col-md-6">
        <input id="year" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="year" value="{{ old('year', $car['year']) }}">
        @if ($errors->has('year'))
          <div class="form-control-feedback">{{ $errors->first('year') }}</div>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('color') ? ' has-danger' : '' }}">
      <label for="color" class="col-md-4 form-control-label">Color</label>

      <div class="col-md-6">
        <input id="color" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="color" value="{{ old('color', $car['color']) }}">
        @if ($errors->has('color'))
          <div class="form-control-feedback">{{ $errors->first('color') }}</div>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
      <label for="price" class="col-md-4 form-control-label">Price</label>

      <div class="col-md-6">
        <input id="price" type="text" class="form-control {{ $errors->has('model') ? ' form-control-danger' : '' }}" name="price" value="{{ old('price', $car['price']) }}">
        @if ($errors->has('price'))
          <div class="form-control-feedback">{{ $errors->first('price') }}</div>
        @endif
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-floppy-o fa-lg mr-1" aria-hidden="true"></i> Save</button>
      </div>
    </div>
  </form>
</section>
@endsection
