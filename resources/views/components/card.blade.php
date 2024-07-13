<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{$advertise->title}}</h5>
      <p class="card-text">€{{$advertise->price}}</p>
      <p class="card-text">{{ Str::limit($advertise->description, 70) }}</p>
      <p class="card-text"><a href="{{route('advertise.category', compact('advertise'))}}"><span class="badge rounded-pill text-bg-custom">{{$advertise->category->name}}</span></a></p>
      <a href="{{route('advertise.show', compact('advertise'))}}" class="btn btn-main">Vai al dettaglio</a>
    </div>
</div>