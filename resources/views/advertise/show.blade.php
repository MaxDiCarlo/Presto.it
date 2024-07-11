<x-layout>
    @if (count($images)>=1)
    <x-carousel :images="$images"></x-carousel>
    @endif
    <div class="container">
        <div class="row justify-content-around my-5">
            <div class="col-12 col-md-8 text-center">
                <h1>{{$advertise->title}}</h1>
                <p>€{{$advertise->price}}</p>
                <p>{{$advertise->description}}</p>
            </div>
            <div class="col-12 col-md-10 d-flex flex-column align-items-center">
                <p>Venditore: {{$advertise->user->name}}</p>
                <p>email: {{$advertise->user->email}}</p>
                @if ($advertise->pending == true)
                <div class = "d-flex justify-content-center">
                    <form action="{{route('reviewer.accetta', compact('advertise'))}}" method="POST">
                        @csrf
                        <button class="btn p-2 m-2 ml-4 bg-success btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Accetta</button>       
                    </form>
                    <form action="{{route('reviewer.declina', compact('advertise'))}}" method="POST">
                        @csrf
                        <button class="btn p-2 m-2 ml-4 bg-danger btn2 flex-grow-1" type="submit" style = "border-radius : 10px">Declina</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>