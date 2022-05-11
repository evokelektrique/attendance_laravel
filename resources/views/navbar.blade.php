<nav class="navbar">
  <div class="navbar-brand">

    {{-- Logo --}}
    <a class="navbar-item" href="/">
      <button class="button is-light">
        <img src="{{ asset("logo.png") }}" alt="Attendance" width="150">
      </button>
    </a>

    {{-- Burger --}}
    <div class="navbar-burger" data-target="header_navbar">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  {{-- Navbar links --}}
  <div id="header_navbar" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="/">داشبورد</a>
      <a class="navbar-item" href="/">کاربران</a>
      <a class="navbar-item" href="/">درس ها</a>
    </div>

    <div class="navbar-end">
      @auth
      <div class="navbar-item">
        <a class="button is-danger" href="{{ route('logout') }}">
          خروج
        </a>
      </div>
      @else
      <div class="navbar-item">
        <a class="button" href="{{ route('login') }}">
          ورود
        </a>
      </div>
      @endauth
    </div>
  </div>

</nav>