<x-layout>
<div class="container">
    @if (count($advertises) > 0)
            <div class="row justify-content-around my-5">
            @foreach($advertises as $advertise)
            <div class="col-12 col-md-4 mb-5">
                <x-card :advertise="$advertise"/>
            </div>         
            @endforeach
        @else
            <div class="row justify-content-center my-5">
                <h1>Nessun annuncio da mostrare</h1>
        @endif
    </div>
</div>

</x-layout>