<div class="nav-container">
  <nav>
    <ul>
      <li>
        <a href="/">Home</a>
      </li>
      <li>
        <a href="/portfolios">Portfolios</a>
      </li>
      @if (Auth::user())
        <li>
          <form class="" action="/logout" method="post">
            {{ csrf_field() }}
            <input type="submit" name="submit" value="logout">
          </form>
        </li>
      @else
        <li>
          <a href="/register">Register</a>
        </li>
        <li>
          <a href="/login">Login</a>
        </li>
      @endif
    </ul>
  </nav>
</div>
