<x-layout>
    <x-masthead></x-masthead>
    <div class="container-fluid my-5 py-5">
        @if (count($advertises) > 0)
            <div class="row mb-5">

                <div class="container-fluid container-area">
                    <div class="row justify-content-around mt-5 m-0">
                        <div class="col-12 col-md-3 text-center option p-0">
                            
                            <h2>Sport</h2>
                        </div>
                        <div class="col-12 col-md-3 text-center option p-0">
                            
                            <h2>Cinema</h2>
                        </div>
                        <div class="col-12 col-md-3 text-center option p-0">
                                
                            <h2>Intrattenimento</h2>
                        </div>
                    </div>
                </div>

                <div class="container-fluid container-area">
                    <div class="row justify-content-around mt-5 m-0">
                        <div class="col-12 col-md-3 text-center option p-0">
                            
                            <h2>Videogiochi</h2>
                        </div>
                        <div class="col-12 col-md-3 text-center option p-0">
                            
                            <h2>Cucina</h2>
                        </div>
                        <div class="col-12 col-md-3 text-center option p-0">
                                
                            <h2>Programmazione</h2>
                        </div>
                    </div>
                </div>

                <div class="container-fluid container-area">
                    <div class="row justify-content-around m-0">
                        <div class="col-12 col-md-3 text-center option p-0">
                            
                            <h2>Viaggi</h2>
                        </div>
                        <div class="col-12 col-md-3 text-center option p-0">
                            
                            <h2>Manga</h2>
                        </div>
                        <div class="col-12 col-md-3 text-center option p-0">
                                
                            <h2>Musica</h2>
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

    {{-- <div class="bg"></div> --}}

</x-layout>