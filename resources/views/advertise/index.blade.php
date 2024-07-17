<x-layout>
    <x-masthead2></x-masthead2>
        <div class="container-fluid">
            @if (count($advertises) > 0)
                <div class="row justify-content-around my-5">
                    @foreach($advertises as $advertise)
                    <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
                        <x-card :advertise="$advertise"/>
                    </div>         
                    @endforeach
            @else
                    <div class="row justify-content-center my-5">
                        <h1>{{__('ui.noadvertise')}}</h1>
                    </div>
            @endif
                </div>
        </div>
</x-layout>