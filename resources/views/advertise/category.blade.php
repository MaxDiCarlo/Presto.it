<x-layout>
    <div class="container">
        <div class="row justify-content-around my-5">
            @foreach($advertises as $advertise)
            <div class="col-12 col-md-4 mb-5">
                <x-card :advertise="$advertise"/>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>