<x-layout>
    <div class="container-fluid my-5 py-3">
        <div class="row pb-5 mb-3">
            <div class="col-12 d-flex justify-content-center">
                <h2 class="presentation-h2">{{__('ui.ourteam')}}</h2>
            </div>
        </div>
        {{-- PRIMA FILA --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container">
                        <img src="/images/lorenzo.jpg" class="card-img-top" alt="...">
                    </div>
                </div>
                <h5 class="card-title"><strong>Lorenzo Dasara</strong></h5>
            </div>

            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container">
                        <img src="/images/tiziano.jpg" class="card-img-top" alt="...">
                    </div>
                </div>
                <h5 class="card-title"><strong>Tiziano Di Felice</strong></h5>
            </div>
        </div>

        {{-- SECONDA FILA --}}
        <div class="row mt-5 pt-3 pb-5 mb-3 justify-content-center">
            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container">
                        <img src="/images/max.jpg" class="card-img-top img-fluid" alt="...">
                    </div>
                </div>
                <h5 class="card-title"><strong>Massimiliano Di Carlo</strong></h5>
            </div>

            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container">
                        <img src="/images/logo.png" class="card-img-top" alt="...">
                    </div>
                </div>
                <h5 class="card-title"><strong>Pasquale Russo</strong></h5>
            </div>
        </div>
    </div>
</x-layout>
