<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$advertise->title}}</h5>
      <p class="card-text">{{$advertise->price}}</p>
      <p class="card-text">{{$advertise->description}}</p>
      <p class="card-text"><a href="{{route('advertise.category', compact('advertise'))}}">{{$advertise->category->name}}</a></p>
      <a href="{{route('advertise.show', compact('advertise'))}}" class="btn btn-primary">Vai al dettaglio</a>
    </div>
  </div>