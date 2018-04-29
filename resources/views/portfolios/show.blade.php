@extends ('layouts.master')

@section ('content')
<div class="portfolio-detail-leader-card">
  <h1>{{ $portfolio->name }}</h1>
  <h2>Porfolio Overview</h2>
</div>

<div class="total-card">
  <div class="assets-list-total">
    <div class="assets-total">Total</div>
    <div class="assets-total-subtitle"> Portfolio Total</div>
   </div>
</div>

<div class="add-asset-btn-wrapper">
  <a href="/portfolios/{{ $portfolio->id }}/addAsset" class="btn-add-asset">Add Asset</a>
</div>

@if (count($portfolio->assets) > 0)

  <ul class="asset-list">
    @foreach($portfolio->assets as $asset)
      <li class="asset-item">
        <div class="asset-card">
          <div class="asset-header">
            <div class="asset-header-title">
              <span class="asset-symbol">{{ $asset->crypto->cmc_symbol }}</span>
              <span class="asset-name">{{ $asset->crypto->name }}</span>
            </div>
            <div class="asset-header-value">
              <span class="asset-value"><span class="asset-value-currency-sign">$</span>{{ round($asset->wallet_balance * $asset->crypto->latest_price, 2) }}</span>
            </div>
          </div>
          <div class="asset-info">
            <div class="asset-info-section asset-price-wrapper">
              <span class="asset-price">${{ $asset->crypto->latest_price }}</span>
              <span class="info-text">Price</span>
            </div>
            <div class="asset-info-section asset-balance-wrapper">
              <span class="asset-balance">{{ $asset->wallet_balance }}</span>
              <span class="info-text">Balance</span>
            </div>
            <div class="asset-info-section asset-portfolio-perecentage">
              <span class="asset-port-percent"></span>
              <span class="info-text">Portfolio Pct.</span>
            </div>
          </div>


          <div class="asset-controls">
            <a href="/assets/{{ $asset->id }}" class="btn-edit">Edit</a>
            <form action="/portfolios/{{ $portfolio->id }}/assets/{{ $asset->id }}/remove" method="POST" style="display:inline-block">
              {{ csrf_field() }}
              <input type="submit" name="sumbit" value="Delete" class="btn-delete">
            </form>
          </div>
        </div>
      </li>
    @endforeach
  </ul>
@else
  <p>No Assets in Portfolio</p>
@endif

<form class="" action="/portfolios/{{ $portfolio->id }}/remove" method="post">
  {{ csrf_field() }}
  <input type="submit" name="sumbit" value="Delete Portfolio">
</form>
@endsection ('content')
