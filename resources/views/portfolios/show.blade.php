@extends ('layouts.master')

@section ('content')
<h1>{{ $portfolio->name }}</h1>


<a href="/portfolios/{{ $portfolio->id }}/addAsset">Add Asset</a>
@if (count($portfolio->assets) > 0)
  <ul>
    @foreach($portfolio->assets as $asset)
      <li>
        {{ $asset->crypto->name }}
        <span class="crypto-asset" data-assetid="{{ $asset->id }}" data-crypto="{{ $asset->crypto->name }}" data-address="{{ $asset->address }}">{{ $asset->wallet_balance }}</span>
        - <span class="price-asset-{{ $asset->id }}">{{ $asset->crypto->latest_price }}</span>
        - <span class="total-asset-{{ $asset->id }}">Total</span>
        <form action="/portfolios/{{ $portfolio->id }}/assets/{{ $asset->id }}/remove" method="POST" style="display:inline-block">
          {{ csrf_field() }}
          <input type="submit" name="sumbit" value="Delete">
        </form>
      </li>
    @endforeach
    <li> Total: <span class="assets-total">Total</span></li>
  </ul>
@else
  <p>No Assets in Portfolio</p>
@endif

<form class="" action="/portfolios/{{ $portfolio->id }}/remove" method="post">
  {{ csrf_field() }}
  <input type="submit" name="sumbit" value="Delete Portfolio">
</form>
@endsection ('content')
