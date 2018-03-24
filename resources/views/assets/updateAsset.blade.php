@extends ('layouts.master')

@section ('content')
<h1>Update Asset</h1>

<h3>{{ $asset->crypto->name }}</h3>

<form class="" action="/assets/{{ $asset->id }}" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="wallet_balance">New Wallet Ballence: </label>
    <input type="number" min="0" step="0.0000001" name="wallet_balance" value="{{ $asset->wallet_balance }}">
  </div>
  <div class="form-group">
    <label for="original_value">Original Price: </label>
    <input type="number" min="0" step="0.0001" name="original_price" value="{{ $asset->original_price }}">
  </div>
  <div class="form-group">
    <input type="submit" name="submit" value="Update Asset">
  </div>
</form>




@endsection ('content')
