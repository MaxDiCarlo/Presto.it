<nav class="navbar navbar-expand-lg p-0 mb-0-md-3 {{ Route::currentRouteName() == 'homepage' ? 'bianco': 'secnav'}}" style="background-color: #333; padding: 1rem;">
  <div class="container-fluid">
      <i class="animate__animated animate__zoomIn" style="margin-right: auto;"><img src="/images/logo.png" width="100" height="100" alt="Logo del sito"></i>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav ps-5 mb-2 mb-lg-0 mx-auto" style="display: flex; justify-content: center; align-items: center; flex-grow: 1;">
              <li class="nav-item" style="margin: 0 1rem;">
                  <a class="nav-link nav1 active" aria-current="page" href="{{route('homepage')}}" style="color: white; text-decoration: none;">{{__('ui.home')}}</a>
              </li>
              <li class="nav-item" style="margin: 0 1rem;">
                  <a class="nav-link nav1" href="{{route('advertise.index')}}" style="color: white; text-decoration: none;">{{__('ui.latest articles')}}</a>
              </li>
              {{-- DROPDOWN CATEGORIE --}}
              <li class="nav-item dropdown" style="margin: 0 1rem;">
                  <a class="nav-link nav1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; text-decoration: none;">
                      {{__('ui.categories')}}
                  </a>
                  <ul class="dropdown-menu">
                      @foreach(App\Models\Category::all() as $category)
                          <li><a class="dropdown-item" href="{{route('advertise.indexCategory', compact('category'))}}">{{__("ui.$category->name")}}</a></li>
                      @endforeach
                  </ul>
              </li>
              {{-- BOTTONE TEAM --}}
              <li class="nav-item" style="margin: 0 1rem;">
                <a class="nav-link nav1" href="{{route('team')}}" style="color: white; text-decoration: none;">{{__('ui.ourteam')}}</a>
              </li>
              @if(Route::currentRouteName() == 'reviewer.users' || Route::currentRouteName() == "users.search.get" || Route::currentRouteName() == 'users.search.get')
              <form action="{{route('users.search')}}" method="POST" class="d-flex ms-auto" role="search">
                  @csrf
                  <input class="form-control me-2 ricerca rounded-5" type="search" placeholder="{{__('ui.searchuser')}}" aria-label="Search" name="stringa">
                  <button class="btn btn-main rounded-5" type="submit"><i class="bi bi-search"></i></button>
                </form>
                @else
                <form action="{{route('advertise.search')}}" method="POST" class="d-flex ms-auto" role="search">
                    @csrf
                    <input class="form-control me-2 ricerca rounded-5" type="search" placeholder="{{__('ui.searchadvertise')}}" aria-label="Search" name="stringa">
                    <button class="btn btn-main rounded-5" type="submit"><i class="bi bi-search"></i></button>
                </form>
                @endif
                {{-- DROPDOWN UTENTE --}}
                @auth
              <li class="nav-item dropdown" style="margin: 0 1rem;">
                  <a class=" btn btn-orange rounded-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="">
                      {{__('ui.welcome').' '.Auth::user()->name}}<i class="mx-2 bi bi-person-circle"></i>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{route('advertise.create')}}">{{__('ui.insertadvertise')}}<i class="mx-2 bi bi-plus-circle"></i></a></li>
                      @if(Auth::user()->reviewer)
                          <li><a class="dropdown-item" href="{{route('reviewer.area')}}">{{__('ui.reviewersarea')}}</a></li>
                      @else
                          <li><a class="dropdown-item" href="{{route('reviewer.richiesta')}}">{{__('ui.workwithus')}}</a></li>
                      @endif
                      <li><hr class="dropdown-divider"></li>
                      <li><form action="{{route('logout')}}" method="POST">@csrf<button class="dropdown-item" type="submit">{{__('ui.logout')}}</button></form></li>
                  </ul>
              </li>
              @endauth
              @guest
                  <li class="nav-item" style="margin: 0 1rem;">
                      <a class="btn btn-orange rounded-5" href="{{route('login')}}" style="color: white; text-decoration: none;">{{__('ui.login')}}</a>
                  </li>
                  <li class="nav-item" style="margin: 0 1rem;">
                      <a class="btn btn-orange rounded-5" href="{{route('register')}}" style="color: white; text-decoration: none;">{{__('ui.register')}}</a>
                  </li>
              @endguest
            </ul>
            {{-- DROPDOWN LINGUE --}}
          <li class="nav-item dropdown" style="margin: 0 1rem; list-style: none;">
            <a class="nav-item dropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style= "text-decoration: none;"><i class="bi bi-translate" style="font-size: 25px; margin-right: 20px"></i></a>
            <ul class="dropdown-menu" style="margin-top: 2px; width: 60px;">

                <li><a class="dropdown-item p-0 m-0" href=""><x-_locale lang="it" /></a></li>
                
                <li><a class="dropdown-item p-0 m-0" href=""><x-_locale lang="en" /></a></li>
               
                <li><a class="dropdown-item p-0 m-0" href=""><x-_locale lang="es" /></a></li>
               
            </ul>
          </li>
      </div>
  </div>
</nav>
