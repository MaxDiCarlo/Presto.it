<x-layout>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if(session()->has('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif

    <div class="container-fluid">
        @if ($users->count() > 0)
            <div class="row justify-content-center mt-5 opacity-50"><h1 class="col-10 text-center">{{__('ui.norevusers')}}</h1></div>
            <div class="row justify-content-around mt-5">
                @foreach($users as $user)
                <div class="col-12 col-md-8 mb-4 d-flex justify-content-center">
                    <x-user :user="$user"></x-user>
                </div>
                @endforeach
            </div>
        @else
            <div class="row justify-content-center my-5">
                <div class="col-12 col-md-10 text-center opacity-50">
                    <h1>{{ __('ui.nousers') }}</h1>
                </div>
            </div>
        @endif
    </div>

    @if ($users->count() > 0)
        <div class="container mb-5">
            <div class="row justify-content-center mb-5">
                <div class="col-12 col-md-6 text-center d-flex justify-content-center gap-3">
                    @if ($users->onFirstPage())
                        <div class="arrow-container disabled">
                            <div class="arrow-left"></div>
                        </div>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="arrow-container">
                            <div class="arrow-left"></div>
                        </a>
                    @endif
        
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="btn btn-orange{{ $users->currentPage() == $page ? ' current' : '' }}">{{ $page }}</a>
                    @endforeach
        
                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="arrow-container">
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
