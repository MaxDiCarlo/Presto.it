<x-layout>
    <x-carousel></x-carousel>
    <div class="container">
        <div class="row justify-content-around my-5">
            <div class="col-12 col-md-8 text-center">
                <h1>{{$advertise->title}}</h1>
                <p>{{$advertise->price}}</p>
                <p>{{$advertise->description}}</p>
            </div>
        </div>
    </div>
</x-layout>