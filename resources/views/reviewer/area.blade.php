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
        <div class="row justify-content-around h-100 align-items-center">
            <div class="col-12 col-md-4 text-center option p-0" data-url="{{route('reviewer.advertises')}}">
                <div class="bg"></div>
                <h2>Advertises</h2>
            </div>
            <div class="col-12 col-md-4 text-center option p-0" data-url="{{route('reviewer.users')}}">
                <div class="bg"></div>
                <h2>Users</h2>
            </div>
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