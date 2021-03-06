<div class="card car-card">
  <div class="card-header">
    <h2 class="card-title h4 mb-0">
      @if ($vMode === 'index')
        <a href="{{ route('cars.show', ['id' => $car['id']]) }}">
          {{ $car['model'] }}
        </a>
      @else
        {{ $car['model'] }}
      @endif
    </h2>
  </div>

  <div class="card-block">
    <dl class="row mb-0">

    @if ($vMode === 'show')
      <dt class="col-sm-5 col-md-3 car-field">Year</dt>
      <dd class="col-sm-7 col-md-9">{{ $car['year'] }}</dd>

      <dt class="col-sm-5 col-md-3 car-field">Registration number</dt>
      <dd class="col-sm-7 col-md-9">{{ $car['registration_number'] }}</dd>
    @endif

      <dt class="col-sm-5 col-md-3 car-field">Color</dt>
      <dd class="col-sm-7 col-md-9">{{ $car['color'] }}</dd>

      <dt class="col-sm-5 col-md-3 car-field">Price</dt>
      <dd class="col-sm-7 col-md-9">{{ $car['price'] }}</dd>
    </dl>
  </div>

  @if ($vMode === 'show')
    <div class="cart-footer">
      <a href="{{ route('cars.edit', ['id' => $car['id']]) }}"
        class="btn btn-success edit-button">
          <i class="fa fa-pencil-square-o fa-lg mr-1" aria-hidden="true"></i> Edit</a>

      <a href="{{ route('cars.index') }}" class="btn btn-danger delete-button">
        <i class="fa fa-trash-o fa-lg mr-1"></i> Delete</a>
    </div>
  @endif
</div>
