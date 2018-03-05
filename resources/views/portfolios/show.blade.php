@extends ('layouts.master')

@section ('content')
<h1>{{ $portfolio->name }}</h1>


<a href="/portfolios/{{ $portfolio->id }}/addAsset">Add Asset</a>
@if (count($portfolio->assets) > 0)
  <ul class="asset-list">
      <li class="asset-list-header">
        <span class="asset-type">Asset Type</span>
        <span class="asset-balance">Balance</span>
        <span class="asset-price">Price</span>
        <span class="asset-value">Value</span>
        <span class="asset-controls">Controls</span>
      </li>
    @foreach($portfolio->assets as $asset)
      <li class="asset-item">
        <span class="asset-type">{{ $asset->crypto->name }}</span>
        <span class="asset-balance">{{ $asset->wallet_balance }}</span>
        <span class="asset-price">${{ $asset->crypto->latest_price }}</span>
        <span class="asset-value">${{ $asset->wallet_balance * $asset->crypto->latest_price }}</span>
        <div class="asset-controls">
          <a href="/assets/{{ $asset->id }}"><button type="button" name="button">Edit</button></a>
          <form action="/portfolios/{{ $portfolio->id }}/assets/{{ $asset->id }}/remove" method="POST" style="display:inline-block">
            {{ csrf_field() }}
            <input type="submit" name="sumbit" value="Delete">
          </form>
        </div>
      </li>
    @endforeach
    <li class="assets-list-total"> Total: <span class="assets-total">Total</span></li>
  </ul>
@else
  <p>No Assets in Portfolio</p>
@endif

<form class="" action="/portfolios/{{ $portfolio->id }}/remove" method="post">
  {{ csrf_field() }}
  <input type="submit" name="sumbit" value="Delete Portfolio">
</form>
@endsection ('content')
