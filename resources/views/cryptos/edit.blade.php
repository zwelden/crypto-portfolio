@extends ('layouts.master')

@section ('content')
<h2>{{ $crypto->name }}</h2>
<form class="" action="/cryptos/{{ $crypto->id }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Crypto Name: </label>
    <input type="text" name="name" value="">
    @if ($crypto->name != '')
      <p>Current Name: {{ $crypto->name}}</p>
    @else
      <p>No Name Currently Set</p>
    @endif
  </div>
  <div class="form-group">
    <label for="symbol">Crypto Symbol: </label>
    <input type="text" name="symbol" value="">
    @if ($crypto->symbol != '')
      <p>Current Symbol: {{ $crypto->symbol}}</p>
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
  <div class="form-group">
    <label for="block_explorer_api-prefix">Block Explorer API Prefx:</label>
    <input type="text" name="block_explorer_api_prefix" value="">
    @if ($crypto->block_explorer_api_prefix != '')
      <p>Current Block Explorer: {{ $crypto->block_explorer_api_prefix }}</p>
    @else
      <p>No Block Explorer Currently Set</p>
    @endif
  </div>
  <div class="form-group">
    <label for="block_explorer_api-postfix">Block Explorer API Postfix:</label>
    <input type="text" name="block_explorer_api_postfix" value="">
    @if ($crypto->block_explorer_api_postfix != '')
      <p>Current Block Explorer: {{ $crypto->block_explorer_api_postfix }}</p>
    @else
      <p>No Block Explorer Currently Set</p>
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
