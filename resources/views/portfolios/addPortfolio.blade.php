@extends ('layouts.master')

@section ('content')

<form class="" action="/portfolios" method="post">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Portfolio Name:</label>
    <input type="text" name="name" value="">
  </div>
  <div class="form-group-hidden">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  </div>
  <div class="form-group">
    <input type="submit" name="submit" value="Create Portfolio">
  </div>
</form>

@endsection ('content')
