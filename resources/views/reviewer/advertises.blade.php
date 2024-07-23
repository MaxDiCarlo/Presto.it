<x-layout>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    @if(session()->has('alert'))
        <div class="alert alert-danger">
            {{session('alert')}}
        </div>
    @endif
    <div class="container" style="min-height: 700px;">
            @if (count($advertises) > 0) 
                <div class="row align-items-center flex-column my-5 gap-5">          
                @foreach ($advertises as $advertise)
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <x-pending :advertise="$advertise"></x-pending>
                    </div>
                @endforeach
                    <div class="col-12 col-md-6 text-center">
                        <h5>{{__('ui.advertise')}} 1 {{__('ui.of')}} {{$number}}</h5>
                    </div>
                </div>
            @else
                <div class="row justify-content-center align-items-center my-5">   
                    <div class="col-12 col-md-10 text-center opacity-50">
                        <h1>{{__('ui.noadvertisetoaccept')}}</h1>
                        <p>{{__('ui.trylater')}}</p>
                    </div>
                </div>
            @endif
    </div>

</x-layout>