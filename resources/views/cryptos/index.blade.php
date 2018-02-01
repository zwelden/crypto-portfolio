@extends ('layouts.master')

@section ('content')
  <h2>Test Test Test</h2>

  @if (count($cryptos) > 0)
    <ul>
      @foreach ($cryptos as $crypto)
        <li>{{ $crypto->current_rank }}  {{ $crypto->name }} {{ $crypto->latest_price }}</li>
      @endforeach
    </ul>
  @else
    <h3>No Cryptos</h3>
  @endif

@endsection ('content')
