<form method="POST" action="{{ $action or route('app.index') }}">

  @isset ($method)
    @if (in_array(trim($method), ['PUT', 'PATCH', 'DELETE'], true))
      <input name="_method" type="hidden" value="{{ $method }}">
    @endif
  @endisset

  {{ csrf_field() }}

  <div class="form-group row{{ $errors->has('model') ? ' has-danger' : '' }}">
    <label for="model" class="form-control-label col-md-3 col-form-label">Model</label>

    <div class="col col-lg-8">
      <input id="model" type="text" class="form-control{{ $errors->has('model') ?
        ' form-control-danger' : '' }}" name="model"
        value="{{ old('model', $car['model'] ?? null) }}" autofocus>

      @if ($errors->has('model'))
        <div class="form-control-feedback">{{ $errors->first('model') }}</div>
      @endif
    </div>
  </div>

  <div class="form-group row{{ $errors->has('registration_number') ? ' has-danger' : '' }}">
    <label for="registration_number"
      class="form-control-label col-md-3 col-form-label">Registration number</label>

    <div class="col col-lg-8">
      <input id="registration_number" type="text" class="form-control{{
        $errors->has('registration_number') ? ' form-control-danger' : '' }}"
        name="registration_number"
        value="{{ old('registration_number', $car['registration_number'] ?? null) }}">

      @if ($errors->has('registration_number'))
        <div class="form-control-feedback">{{ $errors->first('registration_number') }}</div>
      @endif
    </div>
  </div>

  <div class="form-group row{{ $errors->has('year') ? ' has-danger' : '' }}">
    <label for="year" class="form-control-label col-md-3 col-form-label">Year</label>

    <div class="col col-lg-8">
      <input id="year" type="text" class="form-control {{ $errors->has('year') ?
        ' form-control-danger' : '' }}" name="year"
        value="{{ old('year', $car['year'] ?? null) }}">

      @if ($errors->has('year'))
        <div class="form-control-feedback">{{ $errors->first('year') }}</div>
      @endif
    </div>
  </div>

  <div class="form-group row{{ $errors->has('color') ? ' has-danger' : '' }}">
    <label for="color" class="form-control-label col-md-3 col-form-label">Color</label>

    <div class="col col-lg-8">
      <input id="color" type="text" class="form-control {{ $errors->has('color') ?
        ' form-control-danger' : '' }}" name="color"
        value="{{ old('color', $car['color'] ?? null) }}">

      @if ($errors->has('color'))
        <div class="form-control-feedback">{{ $errors->first('color') }}</div>
      @endif
    </div>
  </div>

  <div class="form-group row{{ $errors->has('price') ? ' has-danger' : '' }}">
    <label for="price" class="form-control-label col-md-3 col-form-label">Price</label>

    <div class="col col-lg-8">
      <input id="price" type="text" class="form-control {{ $errors->has('price') ?
        ' form-control-danger' : '' }}" name="price"
        value="{{ old('price', $car['price'] ?? null) }}">

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
