<div class="pending" style="width: 18rem;">
  <div class=" card-body d-flex flex-column">
    <h5 class="card-title">{{$advertise->title}}</h5>
    <p class="card-text">€{{$advertise->price}}</p>
    <p class="card-text">{{ Str::limit($advertise->description, 70) }}</p>
    <a href="{{route('advertise.show', compact('advertise'))}}" class="btn btn-main">Vai al dettaglio</a>
    <div class = "d-flex justify-content-around">
      <form action="{{route('reviewer.accetta', compact('advertise'))}}" method="POST">
        @csrf
        <button class="btn p-2 m-2 ml-4 bg-success btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Accetta</button>       
      </form>
      <form action="{{route('reviewer.declina', compact('advertise'))}}" method="POST">
        @csrf
        <button class="btn p-2 m-2 ml-4 bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Declina</button>
      </form>
    </div>
  </div>
</div>