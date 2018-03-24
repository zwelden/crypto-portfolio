@extends ('layouts.master')

@section ('content')
<h1>Add Asset</h1>

<form class="" action="/assets" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    @if (count($avaliableCryptos) > 0)
      <select class="" name="crypto_id">
        @foreach($avaliableCryptos as $ac)
        <option value="{{ $ac->id }}">{{ $ac->name }}</option>
        @endforeach
      </select>
    @else
      <p>no avaliable cyptos</p>
    @endif
  </div>
  <div class="form-group">
    <label for="wallet_balance">Wallet Ballence: </label>
    <input type="number" min="0" step="0.0000001" name="wallet_balance" value="">
  </div>
  <div class="form-group">
    <label for="original_price">Original Value: </label>
    <input type="number" min="0" step="0.0001" name="original_price" value="">
  </div>
  <div class="form-group-hidden">
    <input type="hidden" name="portfolio_id" value="{{ $portfolio->id }}">
  </div>
  <div class="form-group">
    <input type="submit" name="submit" value="Add Asset">
  </div>
</form>




@endsection ('content')
