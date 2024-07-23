<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-6">
                <div class="shower">
                    @if (count($images)>=1)
                    <x-carousel :images="$images"></x-carousel>
                    @endif
                    @if ($advertise->pending)
                    @foreach ($images as $image)
                    <div class="col-md-12">
                        <div class="card-body w-100">
                            <div class="labels ps-4 pe-4 mb-3">
                                @foreach ($image->labels as $label)
                                #{{$label}},
                                @endforeach
                            </div>
                            <h5 class="mb-3">Ratings</h5>
                            <div class="row justify-content-center text-center">
                                <div class="col-6">
                                    <div class="text-center mx-auto {{$image->adult}}"></div>
                                </div>
                                <div class="col-6">adult</div>
                                <div class="col-6">
                                    <div class="text-center mx-auto {{$image->violence}}"></div>
                                </div>
                                <div class="col-6">violence</div>
                                <div class="col-6">
                                    <div class="text-center mx-auto {{$image->spoof}}"></div>
                                </div>
                                <div class="col-6">spoof</div>
                                <div class="col-6">
                                    <div class="text-center mx-auto {{$image->racy}}"></div>
                                </div>
                                <div class="col-6">racy</div>
                                <div class="col-6">
                                    <div class="text-center mx-auto {{$image->medical}}"></div>
                                </div>
                                <div class="col-6">medical</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="container-fluid body pb-3">
                        <div class="row">
                            <div class="col-12">
                                <h2><strong>€{{$advertise->price}}</strong></h2>
                                <h2><strong>{{$advertise->title}}</strong></h2>
                                <p class="card-text"><a href="{{route('advertise.category', compact('advertise'))}}"><span class="badge rounded-pill text-bg-custom">{{$advertise->category->name}}</span></a></p>
                                <p><strong>{{__('ui.salesperson')}}: {{$advertise->user->name}}</strong></p>
                                <div class="divisore"></div>
                                <p class="m-0">{{$advertise->description}}</p>
                                <div class="divisore"></div>
                                <p>Email: {{$advertise->user->email}}</p>
                            </div>
                            <div class="col-12 d-flex flex-column gap-3">
                                @if ($advertise->pending == true)
                                <div class="divisore"></div>
                                <div class = "d-flex justify-content-around">
                                    <form action="{{route('reviewer.accetta', compact('advertise'))}}" method="POST">
                                        @csrf
                                        <button class="btn bg-success btn2 flex-grow-1" type="submit" style = "border-radius : 10px">{{__('ui.accept')}}</button>       
                                    </form>
                                    <form action="{{route('reviewer.declina', compact('advertise'))}}" method="POST">
                                        @csrf
                                        <button class="btn bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">{{__('ui.decline')}}</button>
                                    </form>
                                </div>
                                @endif
                                @auth
                                @if (Auth::user()->reviewer)
                                <div class="d-flex mb-5 gap-3 justify-content-around">
                                    @if ($advertise->pending == false)
                                    <form action="{{route('reviewer.reset', compact('advertise'))}}" method="POST">
                                        @csrf
                                        <button class="btn bg-success btn2 flex-grow-1" type="submit" style = "border-radius : 10px">{{__('ui.sendtorevision')}}</button>       
                                    </form>
                                    @endif
                                    @if ($advertise->declined == true)
                                        <form action="{{route('reviewer.delete', compact('advertise'))}}" method="POST">
                                            @csrf
                                            <button class="btn bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">{{__('ui.delete')}}</button>       
                                        </form>
                                    @elseif ($advertise->user_id == Auth::user()->id)
                                        <form action="{{route('advertise.delete', compact('advertise'))}}" method="POST">
                                            @csrf
                                            <button class="btn bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">{{__('ui.delete')}}</button>
                                        </form>  
                                    @endif
                                @elseif ($advertise->user_id == Auth::user()->id && $advertise->pending == false)
                                        <form action="{{route('advertise.delete', compact('advertise'))}}" method="POST">
                                            @csrf
                                            <button class="btn bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">{{__('ui.delete')}}</button>       
                                        </form>
                                @endif
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>