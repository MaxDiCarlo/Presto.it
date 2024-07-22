<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    @foreach ($images as $index => $image)
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach ($images as $index => $image)
      <div class="carousel-item {{ $index == 0 ? 'active' : '' }} position-relative">
        <img src="{{ $image->getUrl(1800, 1800) }}" class="rounded-3" alt="..." height="100%">
        <div class="row justify-content-center">
          <div class="col-md-5 ps-3">
            <div class="card-body">
              <h5>Labels</h5>
              @if ($image->labels)
                @foreach ($image->labels as $label)
                  #{{$label}},
                @endforeach
              @endif
            </div>
          </div>
          <div class="col-md-8 ps-3">
            <div class="card-body">
                <h5>Ratings</h5>
                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="text-center mx-auto">{{$image->adult}}</div>
                    </div>
                    <div class="col-10">adult</div>
                    <div class="col-2">
                        <div class="text-center mx-auto">{{$image->violence}}</div>
                    </div>
                    <div class="col-10">violence</div>
                    <div class="col-2">
                        <div class="text-center mx-auto">{{$image->spoof}}</div>
                    </div>
                    <div class="col-10">spoof</div>
                    <div class="col-2">
                        <div class="text-center mx-auto">{{$image->racy}}</div>
                    </div>
                    <div class="col-10">racy</div>
                    <div class="col-2">
                        <div class="text-center mx-auto">{{$image->medical}}</div>
                    </div>
                    <div class="col-10">medical</div>
                </div>
            </div>
        </div>
        </div>
      </div>
    @endforeach
  </div>
  @if (count($images) > 1)
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon frecce" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon frecce" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  @endif
</div>
