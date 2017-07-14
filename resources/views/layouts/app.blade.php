<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cars. Main page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <h1 class="navbar-brand mb-0">BSA #5. Cars</h1>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ isActiveRoute('cars.index') }}">
            <a class="nav-link" href="{{ route('cars.index') }}">Cars list</a>
          </li>
          <li class="nav-item {{ isActiveRoute('cars.create') }}">
            <a class="nav-link" href="{{ route('cars.create') }}">Add</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      @yield('content')
    </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>
