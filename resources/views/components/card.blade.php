<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$advertise->title}}</h5>
      <p class="card-text">{{$advertise->price}}</p>
      <p class="card-text">{{$advertise->description}}</p>
      <p class="card-text">{{$advertise->category->name}}</p>
      <a href="#" class="btn btn-primary">Vai al dettaglio</a>
    </div>
  </div>