<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow ">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><span data-feather="book-open"></span>  MY-LIBRARY</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        @if (Auth::check())
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 bg-dark border-0">Logout   <span data-feather="log-out"></span></button>
          </form>
        @endif
        @if (empty(Auth::check()))
        <a href="{{ url('login') }}" style="text-decoration: none; color:antiquewhite;"><button type="submit" class="nav-link px-3 bg-dark border-0"><span data-feather="log-in"></span>    Login</button></a>
        @endif

      </div>
    </div>
  </header>
