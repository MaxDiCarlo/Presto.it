<x-layout>
    <x-masthead2></x-masthead2>
     <div class="container-fluid my-3 py-3">
        <div class="row justify-content-around gap-1 mb-5 pb-5">
                <div class="col-11 col-md-11">
                    <ul class="nav nav-pills nav-justified">
                        @foreach(App\Models\Category::all() as $category)
                        <li class="nav-item">
                          <a class="nav-link nav2 rounded-0" aria-current="page" href="{{route('advertise.indexCategory', compact('category'))}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                      </ul>
                </div>
    <div class="container-fluid">
        @if ($advertises->count() > 0)
            <div class="row justify-content-around mt-5">
                @foreach($advertises as $advertise)
                <div class="col-12 col-md-4 mb-5 d-flex justify-content-center">
                    <x-card :advertise="$advertise"/>
                </div>         
                @endforeach
            </div>
        @else
            <div class="row justify-content-center my-5">
                <div class="col-12 col-md-10 text-center opacity-50">
                    <h1>{{__('ui.noadvertise')}}</h1>
                    <p>{{__('ui.trylater')}}</p>
                </div>
            </div>
        @endif
    </div>

    @if (count($advertises) > 0)
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-6 text-center d-flex justify-content-center gap-3">
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