@extends ('layouts.master')

@section ('content')

<div class="portfolio-list-wrapper">
  <div class="leader-card">
    <h2>Portfolio List</h2>
  </div>
  <div class="action-btns">
    <a href="/portfolios/new" class="btn btn-create-portfolio">Create New Portfolio</a>
  </div>

  @if (count($portfolio_data) > 0)
    <ul class="portfolio-list">
      @foreach ($portfolio_data as $portfolio)
        <li class="portfolio-list-item">
          <a href="/portfolios/{{ $portfolio['id'] }}" class="portfolio-card">
            <div class="portfolio-info">
              <div class="portfolio-name"><span>{{ $portfolio['name'] }}<span></div>
              <div class="portfolio-value-outer"><span class="portfolio-value">${{ $portfolio['value'] }}</span></div>
            </div>
            <div class="actions">
              <button class="btn-view">View Portfolio</button>
            </div>
          </a>
        </li>
      @endforeach
    </ul>
  @else
    <h3>No Portfolios Found</h3>
  @endif
</div>
<script type="text/javascript" src="/js/test.js">

</script>

@endsection ('content')
