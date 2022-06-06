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
      @can("admin,supervisor")
      <a class="navbar-item" href="{{ route("users.index") }}">کاربران</a>
      @endcan

      @can("teacher,admin,supervisor")
      <a class="navbar-item" href="{{ route("courses.index") }}">درس ها</a>
      @endcan

    </div>

    <div class="navbar-end">
      @auth
      <div class="navbar-item">
        <a class="button is-danger" href="{{ route('logout') }}">
          خروج
        </a>
      </div>
      @endauth
    </div>
  </div>

</nav>
