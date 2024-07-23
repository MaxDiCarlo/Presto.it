<x-layout>
    <x-masthead></x-masthead>
    <div class="container-fluid my-3 py-3">
        <div class="row justify-content-around gap-1 pb-2">
            <div class="col-12 col-md-11">
                <h1 class="sottotitolocategoria">{{__('ui.choosecategory')}}...</h1>
            </div>
        </div>
        <div class="row justify-content-around gap-3 pb-5">
            @foreach(App\Models\Category::all() as $category)
            <div class="col-12 col-md-3 my-4">
                <ul class="nav nav-tabs nav-fill my-2">
                    <li class="nav-item my-3">
                            <!-- Button linking to the category's advertisement index -->
                            <a class="btn btn-orange rounded-5 btn-category px-5 mx-5" aria-current="page" href="{{ route('advertise.indexCategory', ['category' => $category]) }}">
                                {{ __("ui.$category->name") }}
                            </a>
                        </li>
                    </ul>
                </div>
                @endforeach
        </div>        
        
        
        @if (count($advertises) > 0)
            <div class="row justify-content-around mb-5">
                <div class="col-12 col-md-11">
                    <h1 class="h1">{{__('ui.latest articles')}}</h1>
                </div>
            </div>
            <div class="row justify-content-around">
                @foreach($advertises as $advertise)
                <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
                    <x-card :advertise="$advertise"/>
                </div>     
                @endforeach
                <div class="d-flex justify-content-center mb-5 pb-5">
                    <a href="{{route('advertise.index')}}" class="btn btn-main">{{__('ui.showall')}}</a>
                </div>
        @else
                <div class="row justify-content-center" style="min-height: 300px">
                    <div class="col-12 col-md-10 text-center opacity-50">
                        <h1>{{__('ui.noadvertise')}}</h1>
                        <p>{{__('ui.trylater')}}</p>
                    </div>  
                </div>
        @endif
            </div>
    </div>
</x-layout>