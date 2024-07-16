<div class="container">
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
                        <form class="d-flex" role="search">
                            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light me-3" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
