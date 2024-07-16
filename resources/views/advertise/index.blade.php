<x-layout>
    <div class="container text-center">
        <div class="row">
          <div class="col-6">
            <h1 class="text-center my-5 pb-5"><strong>I nostri annunci</strong></h1>
          </div>
        </div>
    </div>
        <div class="container-fluid">
            @if (isset($condizione))
                    @if (count($advertises) > 0 && $condizione)
                    <div class="row justify-content-around">
                    @foreach($advertises as $advertise)
                    <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
                        <x-card :advertise="$advertise"/>
                    </div>
                    @endforeach
                @else
                        <div class="row justify-content-center my-5">
                            <h1>Nessun annuncio da mostrare</h1>
                        </div>
                @endif

            @else
                    @if (count($advertises) > 0)
                    <div class="row justify-content-around my-5">
                    @foreach($advertises as $advertise)
                    <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
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