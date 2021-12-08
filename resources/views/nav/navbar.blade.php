@include('includes.style')
<header class="navbar navbar-expand-lg navbar-dark" style="background-color: #082032">
    <div class="container">
      <a class="navbar-brand" href="#">
          <img src="../img/logo.png" alt="logo" width="180" height="100">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{Request::is('/')? 'active' : ''}}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{Request::is('/about')? 'active' : ''}}" href="/about">About</a>
            </li>
          </ul>
        </div>

        @auth
        <div class="dropdown me-5 mt-2 d-flex justify-content-end">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: white">
            {{ auth()->user()->name }}
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="background-color: white">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{url ('/setting/'.auth()->user()->id)}}">Setting</a></li>
            <form action="/logout" method="POST">
              @csrf
            <button class="btn text-dark dropdown-item" type="submit">Log Out</button></form>
          </ul>
        </div>
        @endauth
      
    </div>
</header>