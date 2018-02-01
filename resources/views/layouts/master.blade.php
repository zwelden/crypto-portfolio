<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cryptos</title>
  </head>
  <body>
    @include('layouts.partials.nav')
    <h1>Cryptos</h1>

    @yield('content')

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

  </body>
</html>
