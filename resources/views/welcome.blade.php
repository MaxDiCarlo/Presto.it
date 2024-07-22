<x-layout>
    <x-masthead></x-masthead>
    <div class="container-fluid my-5 py-5">
        <div class="row justify-content-around gap-3 mb-5 pb-5">
            @foreach (App\Models\Category::all() as $category)
                <div class="col-12 col-md-3 categoria" data-url="{{route('advertise.indexCategory', compact('category'))}}">
                    <h2>{{$category->name}}</h2>
                </div>
            @endforeach

            <script>
                document.querySelectorAll('.categoria').forEach(element => {
                    element.addEventListener('click', ()=>{
                        window.location.href = element.getAttribute('data-url');
                    })
                })
            </script>
        </div>
        @if (count($advertises) > 0)
            <div class="row mb-5">
                <div class="col-12 d-flex justify-content-center">
                    <h2 class="presentation-h2">{{__('ui.latest articles')}}</h2>
                </div>
            </div>
            <div class="row justify-content-around">
                @foreach($advertises as $advertise)
                <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
                    <x-card :advertise="$advertise"/>
                </div>     
                @endforeach
                <div class="d-flex justify-content-center">
                    <a href="{{route('advertise.index')}}" class="btn btn-main">{{__('ui.showall')}}</a>
                </div>
        @else
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center opacity-50">
                        <h1>{{__('ui.noadvertise')}}</h1>
                        <p>{{__('ui.trylater')}}</p>
                    </div>  
                </div>
        @endif
            </div>
    </div>
</x-layout>