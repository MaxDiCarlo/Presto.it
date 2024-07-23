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

    <div class="container-fluid container-area">
        <div class="row justify-content-around align-items-center m-0">
            <div class="col-12 col-md-5 text-center option p-0" data-url="{{route('reviewer.advertises')}}">
                <div class="bg"></div>
                <h2>{{__('ui.advertises')}}</h2>
            </div>
            <div class="col-12 col-md-5 text-center option p-0" data-url="{{route('reviewer.declinedAdvertises')}}">
                <div class="bg"></div>
                <h2>{{__('ui.advertisesbin')}}</h2>
            </div>
            @if (Auth::user()->admin)
                <div class="col-12 col-md-5 text-center option p-0 my-5" data-url="{{route('reviewer.users')}}">
                    <div class="bg"></div>
                    <h2>{{__('ui.users')}}</h2>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.querySelectorAll('.option').forEach(element => {
            element.addEventListener('click', () => {
                window.location.href = element.getAttribute('data-url');
            })
        })
    </script>
</x-layout>