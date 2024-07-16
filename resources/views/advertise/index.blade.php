<x-layout>
<div class="container bg-sfondo">
    @if (isset($condizione))
            @if (count($advertises) > 0 && $condizione)
            <div class="row justify-content-around my-5">
            @foreach($advertises as $advertise)
            <div class="col-12 col-md-4 mb-5">
                <x-card :advertise="$advertise"/>
            </div>         
            @endforeach
        @else
                <div class="row justify-content-center my-5">
                    <h1>Nessun annuncio da mostrare</h1>
                </div>
        @endif
            </div>
    @else
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
                </div>
        @endif
            </div>
            @endif
</div>

</x-layout>