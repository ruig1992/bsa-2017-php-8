<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- Bootstrap 4.0.0 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Font Awesome 4.7.0 from BootstrapCDN -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
    .btn:focus {
      background-color: transparent;
    }
    .btn-primary:focus {
      color: #0275d8;
    }
    a.btn-success:focus {
      color: #5cb85c;
    }
    a.btn-danger:focus {
      color: #d9534f;
    }
    .navbar-brand {
      font-weight: 500;
    }
    .car-field {
      font-weight: 600;
    }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <a href="{{ route('app.index') }}"
        class="navbar-brand mb-0">BSA Task #5</a>

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

    <div class="container-fluid p-4">
      @yield('content')
    </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <script>
    "use strict";
    $(function() {
        var groups = $('#form-car-data .has-danger');
        if (!groups.length) {
            return;
        }

        groups.each(function(i, group) {
            var elem = $(group).find('input,textarea');
            elem.val(elem.val().trim())
                .data('old', elem.val());
        })
        .on('input', 'input,textarea', function() {
            var group = $(this).parents('.form-group');
            if ($(this).val().trim() === $(this).data('old')) {
                group.addClass('has-danger')
                    .find('.form-control-feedback').show();
                return;
            }
            group.removeClass('has-danger')
                .find('.form-control-feedback').hide();
        });
    });
    </script>
  </body>
</html>
