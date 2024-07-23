<x-layout>
    <x-masthead2></x-masthead2>
    <div class="container-fluid my-3 py-3">
        <div class="row justify-content-around gap-1 pb-2">
            <div class="col-12 col-md-11">
                <h1 class="sottotitolocategoria">{{__('ui.choosecategory')}}...</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
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
        </div>        
    <div class="container-fluid" style="min-height: 800px">
        @if ($advertises->count() > 0)
            <div class="row justify-content-around mt-5">
                @foreach($advertises as $advertise)
                <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
                    <x-card :advertise="$advertise"/>
                </div>         
                @endforeach
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
    @if (request()->routeIs('advertise.index') && count($advertises) > 0)
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-12 col-md-6 text-center d-flex justify-content-center gap-3 pb-5">
                    @if ($advertises->onFirstPage())
                        <div class="arrow-container disabled">
                            <div class="arrow-left"></div>
                        </div>
                    @else
                        <a href="{{ $advertises->previousPageUrl() }}" class="arrow-container">
                            <div class="arrow-left"></div>
                        </a>
                    @endif

                    @foreach ($advertises->getUrlRange(1, $advertises->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="btn btn-main{{ $advertises->currentPage() == $page ? ' current' : '' }}">{{ $page }}</a>
                    @endforeach

                    @if ($advertises->hasMorePages())
                        <a href="{{ $advertises->nextPageUrl() }}" class="arrow-container">
                            <div class="arrow-right"></div>
                        </a>
                    @else
                        <div class="arrow-container disabled">
                            <div class="arrow-right"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</x-layout>