<div class="nav-container">
  <nav class="top-header-menu">
    <div class="home-link">
      <a href="/">Home</a>
    </div>
    <ul>
      <li class="">
        <a href="/portfolios">Portfolios</a>
      </li>
      @if (Auth::user())
        <li class="">
          <form class="" action="/logout" method="post">
            {{ csrf_field() }}
            <input type="submit" name="submit" value="Logout">
          </form>
        </li>
      @else
        <li class="">
          <a href="/register">Register</a>
        </li>
        <li class="">
          <a href="/login">Login</a>
        </li>
      @endif
    </ul>
  </nav>
</div>
