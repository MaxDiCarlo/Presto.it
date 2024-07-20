<x-layout>
    <x-masthead2></x-masthead2>
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
                <h1>{{__('ui.noadvertise')}}</h1>
            </div>
        @endif
    </div>

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
</x-layout>