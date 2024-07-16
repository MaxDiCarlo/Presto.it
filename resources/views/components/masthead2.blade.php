<header class="masthead2">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-10">
          <h1 class="text-white mt-5 pt-5 animate__animated animate__fadeInLeft">Naviga fra i nostri articoli</h1>
          @guest
            <p class="lead text-white">E se vuoi aggiungerne qualcuno, iscriviti adesso!</p>
            <a class="btn btn-main" href="{{route('register')}}">Registrati</a>
            <p class="lead text-white pt-3">O se sei già registrato...</p>
            <a class="btn btn-main" href="{{route('login')}}">Accedi</a>
          @endguest
          @auth
            <p class="lead text-white">E se vuoi aggiungerne qualcuno... fallo!</p>
            <a class="btn btn-main" href="{{route('advertise.create')}}">Aggiungi articolo</a>
          @endauth
        </div>
      </div>
    </div>
  </header>