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
            <div class="row justify-content-center my-5 gap-3">
                @foreach ($users as $user)
                    <div class="col-12 col-md-10">
                        <x-user :user="$user"></x-user>
                    </div>
                @endforeach
            </div>
        </div>
</x-layout>