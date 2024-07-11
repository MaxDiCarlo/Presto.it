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
    <div class="container">
        <div class="row align-items-center flex-column my-5">
            @foreach ($advertises as $advertise)
            <div class="col-12 col-md-6">
                <x-pending :advertise="$advertise"></x-pending>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>