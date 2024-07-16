{{-- <div class="container">
    <div class="row align-items-center my-5">
        <!-- Colonna per il logo -->
        <div class="col-12 col-md-6 fixed-top">
            <a href="{{ route('homepage') }}">
                <img src="/images/logo.png" width="100" height="100" alt="Logo del sito">
            </a>
        </div>
        <div class="col-12 col-md-6">
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container-fluid">
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
                                <a class="nav-link" href="{{route('login')}}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('register')}}">Register</a>
                            </li>
                            @endguest
                            @auth
                                <li class="nav-item">
                                    <a href="{{route('advertise.create')}}" class="nav-link">Inserisci annuncio</a>
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
                                        <li>
                                            <form class="d-flex justify-content-center" action="{{route('logout')}}" method="POST">
                                                @csrf
                                                <button type="submit" class="nav-link text-dark">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                        <form class="d-flex" role="search" action="{{route('advertise.search')}}" method="POST">
                            @csrf
                            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search" name="stringa">
                            <button class="btn btn-outline-light me-3" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div> --}}
@php
$currentRoute=Route::currentRouteName();
$categories = App\Models\Category::all();
@endphp    

<nav class="navbar navbar-expand-lg p-0 {{ $currentRoute == 'homepage' ? 'bianco': 'secnav'}}">
    <div class="container-fluid">
      {{-- <a class="navbar-brand" href="{{route('homepage')}}">Navbar</a> --}}
      <i><img class="ms-5" src="/images/logo.png" width="100" height="100" alt="Logo del sito"></i>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('advertise.index')}}">Ultimi articoli</a>
          </li>
          {{-- DROPDOWN CATEGORIE --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Categorie
            </a>
            <ul class="dropdown-menu">
              @foreach($categories as $category)
                <li><a class="dropdown-item" href="{{route('advertise.index.category', compact ('category') )}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </li>
          @auth
          {{-- DROPDOWN UTENTE --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Benvenuto/a {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('advertise.create')}}">Inserisci annuncio</a></li>
              @if(Auth::user()->reviewer)
                <li><a class="dropdown-item" href="{{route('reviewer.area')}}">Area revisori</a></li>
              @else
                <li><a class="dropdown-item" href="{{route('reviewer.richiesta')}}">Lavora con noi</a></li>
              @endif
              <li><hr class="dropdown-divider"></li>
              <li><form action="{{route('logout')}}" method="POST">@csrf<button class="dropdown-item" type="submit">Logout</button></form></li>
            </ul>
          </li>
          @endauth
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Register</a>
            </li>
          @endguest
        </ul>
        <form action="{{route('advertise.search')}}" method="POST" class="d-flex" role="search">
          @csrf
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="stringa">
          <button class="btn btn-main" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>