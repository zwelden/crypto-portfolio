@extends ('layouts.master')

@section ('content')
<h1>Add Cypto</h1>
<form class="" action="/cryptos" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Crypto Name: </label>
    <input type="text" name="name" value="">
  </div>
  <div class="form-group">
    <label for="symbol">Crypto Symbol: </label>
    <input type="text" name="symbol" value="">
  </div>
  <div class="form-group">
    <label for="category">Category: </label>
    <input type="text" name="category" value="">
  </div>
  <div class="form-group">
    <input type="submit" name="" value="Add Crypto">
  </div>
</form>

@endsection ('content')
