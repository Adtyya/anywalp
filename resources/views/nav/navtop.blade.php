<nav class="navbar-dark" style="background-color: #082032;">
    <div class="container">
      @auth
      @else
      <ul class="nav d-flex justify-content-end">
        <li class="nav-item"><a href="/login" class="nav-link link-light px-2">Login</a></li>
        <li class="nav-item"><a href="/register" class="nav-link link-light px-2">Register</a></li>
      </ul>
      @endauth
    </div>
  </nav>