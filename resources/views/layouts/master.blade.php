<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Cryptos</title>
  </head>
  <body>
    @include('layouts.partials.nav')
    <div class="main-content-wrapper">
      <h1>Page Title</h1>
      
      @yield('content')
    </div>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
