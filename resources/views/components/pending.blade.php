<div class="pending" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$advertise->title}}</h5>
      <p class="card-text">€{{$advertise->price}}</p>
      <p class="card-text">{{ Str::limit($advertise->description, 70) }}</p>
      <a href="{{route('advertise.show', compact('advertise'))}}" class="btn btn-main">Vai al dettaglio</a>
      <form action="{{route('reviewer.accetta', compact('advertise'))}}" method="POST">
        @csrf
        <button class="btn btn-main" type="submit">Accetta</button>
      </form>
      <form action="{{route('reviewer.declina', compact('advertise'))}}" method="POST">
        @csrf
        <button class="btn btn-main" type="submit">Declina</button>
      </form>
    </div>
  </div>