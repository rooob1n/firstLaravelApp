
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>First Laravel App</title>

    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="/css/app.css"  rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>

  <body>
      @include('layouts.header')

      @if ($flash = session('message'))
        <div id="alert-div" class="alert alert-success" role="alert" style="margin:20px;">

          {{ $flash }}

        </div>
         
      @endif

      <div class="container">
        <div class="row">
          {{-- {{ dd(auth()) }} --}}
          <div class="col-md-8">
            @yield('content')
          </div>

          <div class="col-md-4">
            @include('layouts.sidebar')
          </div>
        </div>

      </div>

    
    <!-- JavaScript Bundle with Popper -->
    
    @include('layouts.js')
   
  </body>
</html>
