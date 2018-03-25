@extends ('layouts.master')

@section ('content')
<h2>{{ $crypto->name }}</h2>

<form class="crypto-update-form" action="/cryptos/{{ $crypto->id }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="cc_api_symbol">Crypto Compare Api Symbol: </label>
    <input type="text" name="cc_api_symbol" value="">
    <select class="crypto-select" name=""></select>
    @if ($crypto->cc_api_symbol != '')
      <p>Current Symbol: {{ $crypto->cc_api_symbol }}</p>
    @else
      <p>No Category Symbol Set</p>
    @endif
  </div>
  <div class="form-group">
    <label for="category">Category: </label>
    <input type="text" name="category" value="">
    @if ($crypto->category != '')
      <p>Current Category: {{ $crypto->category}}</p>
    @else
      <p>No Category Currently Set</p>
    @endif
  </div>
  <div class="form-group-hidden">
    <input type="hidden" name="id" value="{{ $crypto->id }}">
  </div>
  <div class="form-group">
    <input type="submit" name="" value="Update">
  </div>
</form>

@endsection ('content')
