<header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        @if(session()->has('alert'))
            <div class="alert alert-danger">
                {{session('alert')}}
            </div>
        @endif
        <div class="col-10">
          <h1 class="text-white mt-5 pt-5 animate__animated animate__fadeInLeft">{{__('ui.welcomeheader')}}</h1>
          <p class="lead text-white animate__animated animate__fadeInLeft">{{__('ui.subtitleheader')}}</p>
          <div class="mb-2">
            <a class="btn btn-main" href="{{route('advertise.create')}}">{{__('ui.insertadvertise')}}</a>
          </div>
          <div>
            <a class="btn btn-main" href="{{route('advertise.index')}}">{{__('ui.latest articles')}}</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  