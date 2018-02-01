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
    <label for="address">Wallet Address: </label>
    <input type="text" name="address" value="">
  </div>
  <div class="form-group-hidden">
    <input type="hidden" name="portfolio_id" value="{{ $portfolio->id }}">
  </div>
  <div class="form-group">
    <input type="submit" name="submit" value="Add Asset">
  </div>
</form>




@endsection ('content')
