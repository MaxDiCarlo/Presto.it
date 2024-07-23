<div class="pending d-flex justify-content-center text-center" style="width: 18rem;">
  <div class=" card-body d-flex flex-column">
    <h5 class="card-title">{{$advertise->title}}</h5>
    <p class="card-text">€{{$advertise->price}}</p>
    <p class="card-text">{{ Str::limit($advertise->description, 70) }}</p>
    <p class="card-text">{{__('ui.salesperson')}}: {{$advertise->user->name}}</p>
    <a href="{{route('advertise.show', compact('advertise'))}}" class="btn btn-main">{{__('ui.btndetails')}}</a>
    <div class = "d-flex justify-content-around">
      <form action="{{route('reviewer.accetta', compact('advertise'))}}" method="POST" class=" flex-grow-1 p-2 ps-0">
        @csrf
        <button class="btn bg-success h-100 w-100 m-0" type="submit" style = "border-radius : 10px">{{__('ui.accept')}}</button>       
      </form>
      <form action="{{route('reviewer.declina', compact('advertise'))}}" method="POST" class=" flex-grow-1 p-2 pe-0">
        @csrf
        <button class="btn bg-danger h-100 w-100 m-0" type="submit" style = "border-radius : 10px">{{__('ui.decline')}}</button>
      </form>
    </div>
  </div>
</div>