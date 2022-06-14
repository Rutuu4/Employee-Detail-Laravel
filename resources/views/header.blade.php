<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
           @if(!Auth::check())
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/home" class="nav-link px-2 text-secondary">Home</a></li>
        </ul>
         @endif
           @if(Auth::check())
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/dashboard" class="nav-link px-2 text-secondary">Dashboard</a></li>
        </ul>
         @endif

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          @if(Auth::check())
            <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-light me-2">Logout</button></a>
          @endif
          @if(!Auth::check())
            <a href="/login"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
            <a href="/register"><button type="button" class="btn btn-warning">Sign-up</button></a>
            @endif
        </div>
      </div>
    </div>
  </header>
