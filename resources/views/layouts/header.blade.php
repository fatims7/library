<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a href="/" class="navbar-logo">Digital <span>Library</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon navbar-dark"></span>
    </button>
    
    
    
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    @if (Auth::check())

        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{ Auth::user()->username }}
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
        
        @else

        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a href="/login" class="login">Login</a>
          </li>
        </ul>
        
        @endif    
        
  </div>
    
    
  </div>
</nav>