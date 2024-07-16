<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-6">
                <div class="shower">
                    @if (count($images)>=1)
                    <x-carousel :images="$images"></x-carousel>
                    @endif
                    <div class="container-fluid body pb-3">
                        <div class="row">
                            <div class="col-12">
                                <h2><strong>€{{$advertise->price}}</strong></h2>
                                <h2><strong>{{$advertise->title}}</strong></h2>
                                <p class="card-text"><a href="{{route('advertise.category', compact('advertise'))}}"><span class="badge rounded-pill text-bg-custom">{{$advertise->category->name}}</span></a></p>
                                <p><strong>Venditore: {{$advertise->user->name}}</strong></p>
                                <div class="divisore"></div>
                                <p class="m-0">{{$advertise->description}}</p>
                                <div class="divisore"></div>
                                <p>Email: {{$advertise->user->email}}</p>
                            </div>
                            <div class="col-12 d-flex flex-column">
                                @if ($advertise->pending == true)
                                <div class="divisore"></div>
                                <div class = "d-flex justify-content-around">
                                    <form action="{{route('reviewer.accetta', compact('advertise'))}}" method="POST">
                                        @csrf
                                        <button class="btn bg-success btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Accetta</button>       
                                    </form>
                                    <form action="{{route('reviewer.declina', compact('advertise'))}}" method="POST">
                                        @csrf
                                        <button class="btn bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Declina</button>
                                    </form>
                                </div>
                                @endif
                                @auth
                                    @if (Auth::user()->reviewer)
                                    <div class="d-flex mb-5 gap-3">
                                        @if ($advertise->pending == false)
                                            <form action="{{route('reviewer.reset', compact('advertise'))}}" method="POST">
                                                @csrf
                                                <button class="btn bg-success btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Rimanda in elaborazione</button>       
                                            </form>
                                        @endif
                                        @if ($advertise->declined == true)
                                        <form action="{{route('reviewer.delete', compact('advertise'))}}" method="POST">
                                            @csrf
                                            <button class="btn bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Elimina definitavamente</button>       
                                        </form>
                                        @endif
                                    </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>