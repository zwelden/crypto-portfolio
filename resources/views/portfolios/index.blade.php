@extends ('layouts.master')

@section ('content')

<h1>Portfolios</h1>
@if (Auth::user())
<a href="/portfolios/new">Create Portfolio</a>
@endif
@if (Auth::user() && count(Auth::user()->portfolios) > 0)
  <ul>
    @foreach (Auth::user()->portfolios as $portfolio)
      <li>{{ $portfolio->name}} <a href="/portfolios/{{ $portfolio->id }}">View</a> </li>
    @endforeach
  </ul>
@else
  <h3>No Portfolios Found</h3>
@endif

<script type="text/javascript" src="/js/test.js">

</script>

@endsection ('content')
