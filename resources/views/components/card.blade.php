<div class="card d-flex justify-content-center align-items-center" style="width: 22rem; height: 20rem;">
    <div class="card-body d-flex ">
      <h5 class="card-title text-center mt-3">{{$advertise->title}}</h5>
      <p class="card-text titolomedio ">{{__('ui.price')}}: <span class="h1"> {{$advertise->price}} € </span></p>
      <p class="card-text titolomedio">{{__('ui.description')}}:<div> {{ Str::limit($advertise->description, 70) }}</div></p>
      <p class="card-text"><a href="{{route('advertise.category', compact('advertise'))}}"><span class="badge rounded-pill text-bg-custom">{{$advertise->category->name}}</span></a></p>
      <a href="{{route('advertise.show', compact('advertise'))}}" class="btn btn-main mb-3" style="width: 12rem;">{{__('ui.btndetails')}}</a>
    </div>
</div>