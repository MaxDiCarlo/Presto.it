<x-layout>
    <div class="container-fluid my-5 py-3" style="min-height: 900px">
        <div class="row pb-5 mb-3">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="h1">{{__('ui.ourteam')}}</h1>
            </div>
        </div>
        {{-- PRIMA FILA --}}
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-5">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container" style="background-color:#d9e7f036;">
                        <img src="/images/lorenzo.jpg" class="card-img-top cartateam" alt="...">
                    </div>
                </div>
                <h5 class="card-title pt-4"><strong>Lorenzo Dasara</strong></h5>
            </div>

            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container" style="background-color:#d9e7f036;">
                        <img src="/images/tiziano.jpg" class="card-img-top cartateam" alt="...">
                    </div>
                </div>
                <h5 class="card-title pt-4"><strong>Tiziano Di Felice</strong></h5>
            </div>
        </div>

        {{-- SECONDA FILA --}}
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-12 col-md-5 d-flex flex-column align-items-center mb-5">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container" style="background-color:#d9e7f036;">
                        <img src="/images/max.jpg" class="card-img-top cartateam img-fluid" alt="...">
                    </div>
                </div>
                <h5 class="card-title pt-4"><strong>Massimiliano Di Carlo</strong></h5>
            </div>

            <div class="col-12 col-md-5 d-flex flex-column align-items-center">
                <div class="card" style="border: none; box-shadow:none;">
                    <div class="image-container" style="background-color:#d9e7f036;">
                        <img src="/images/Pasquale.jpeg" class="card-img-top cartateam" alt="...">
                    </div>
                </div>
                <h5 class="card-title pt-4"><strong>Pasquale Russo</strong></h5>
            </div>
        </div>
    </div>
</x-layout>
