@extends ('layouts.master')

@section ('content')

<h2>Portfolios</h2>
<a href="/portfolios/new">Create Portfolio</a>

@if (count($portfolio_data) > 0)
  <ul>
    @foreach ($portfolio_data as $portfolio)
      <li>{{ $portfolio['name'] }} : {{ $portfolio['value'] }} <a href="/portfolios/{{ $portfolio['id'] }}">View</a> </li>
    @endforeach
  </ul>
@else
  <h3>No Portfolios Found</h3>
@endif

<script type="text/javascript" src="/js/test.js">

</script>

@endsection ('content')
