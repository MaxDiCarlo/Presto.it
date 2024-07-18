<header class="masthead2">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-10">
          <h1 class="text-white mt-5 pt-5 animate__animated animate__fadeInLeft">{{__('ui.headerindex')}}</h1>
          @guest
            <p class="lead text-white">{{__('ui.subtitleindex2')}}</p>
            <a class="btn btn-main" href="{{route('register')}}">{{__('ui.btnindexregister')}}</a>
            <p class="lead text-white pt-3">{{__('ui.subtitleindex3')}}</p>
            <a class="btn btn-main" href="{{route('login')}}">{{__('ui.btnindexlogin')}}</a>
          @endguest
          @auth
            <p class="lead text-white animate__animated animate__fadeInLeft">{{__('ui.subtitleindex')}}</p>
            <a class="btn btn-main" href="{{route('advertise.create')}}">{{__('ui.insertadvertise')}}</a>
          @endauth
        </div>
      </div>
    </div>
  </header>