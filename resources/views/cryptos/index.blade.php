@extends ('layouts.master')

@section ('content')
  <h2>Test Test Test</h2>

  @if (count($cryptos) > 0)
    <ul>
      @foreach ($cryptos as $crypto)
        <li>
          <span>{{ $crypto->current_rank }}</span>
          <span> <a href="/cryptos/{{ $crypto->id }}/edit">{{ $crypto->name }}</a></span>
          <span>{{ $crypto->latest_price }}</span>
        </li>
      @endforeach
    </ul>
  @else
    <h3>No Cryptos</h3>
  @endif

@endsection ('content')
