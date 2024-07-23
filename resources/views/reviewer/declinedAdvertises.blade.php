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
    <div class="container" style="min-height: 700px">
        @if (count($advertises) > 0)
                <div class="row justify-content-around my-5">
                @foreach($advertises as $advertise)
                <div class="col-12 col-md-4 mb-5">
                    <x-card :advertise="$advertise"/>
                </div>         
                @endforeach
            @else
                <div class="row justify-content-center my-5">
                    <div class="col-12 col-md-10 text-center opacity-50">
                        <h1>{{__('ui.noadvertise')}}</h1>
                        <p>{{__('ui.trylater')}}</p>
                    </div>  
                </div>
            @endif
        </div>
    </div>
</x-layout>