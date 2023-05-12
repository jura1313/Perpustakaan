    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link link-dark"href="{{ url('home') }}">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>

          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bookmark"></span>
              Bookmark
            </a>
          </li>
          @if (auth()->user()->role == "admin" || auth()->user()->role == "staff")


          <li class="nav-item">
            <a class="nav-link" href="/my-book">
              <span data-feather="book"></span>
              My Book
            </a>
          </li>
          @if (auth()->user()->role == "admin")
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="database"></span>
              Book Storage
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="{{ url('show-categories') }}">
              <span data-feather="list"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="user"></span>
              My Account
            </a>
          </li>
          @endif

        </ul>
      </div>
    </nav>
