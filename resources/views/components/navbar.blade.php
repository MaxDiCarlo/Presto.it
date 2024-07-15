{{-- navbar da modificare --}}
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('homepage')}}">Presto.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('advertise.index')}}">Latest news</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link " href="{{route('login')}}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
          @endguest
          @auth
            <li class="nav-item">
              <a class="nav-link" href="{{route('advertise.create')}}">Inserisci annuncio</a>
            </li>
            @if (Auth::user()->reviewer)           
              <li class="nav-item">
                <a class="nav-link" href="{{route('reviewer.area')}}">Area revisori</a>
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{route('reviewer.richiesta')}}">Lavora con noi</a>
              </li>
            @endif
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Benvenuto {{Auth::user()->name}}
              </a>
              <ul class="dropdown-menu mt-3">
                <li">
                  <form class="d-flex justify-content-center" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-dark">Logout</button>
                  </form>
                </li>
              </ul>
          @endauth
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
