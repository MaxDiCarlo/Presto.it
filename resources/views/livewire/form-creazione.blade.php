<div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form wire:submit="storeAdvertise">
      <div class="my-3">
          <label for="title" class="form-label">{{__('ui.title')}}</label>
          <input type="text" class="form-control" id="title" wire:model="title">
      </div>
      <div class="mb-3">
          <label for="price" class="form-label">{{__('ui.price')}}</label>
          <input type="text" class="form-control" id="price" wire:model="price">
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">{{__('ui.description')}}</label>
          <textarea id="description" cols="30" rows="10" wire:model="description" class="form-control"></textarea>
      </div>
      <div class="mb-3">
          <label for="categories" class="form-label">{{__('ui.categories')}}</label>
          <select class="form-select" id="categories" wire:model="category">
              <option value="" selected>{{__('ui.choosecategory')}}</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
      </div>

      <div class="mb-3">
        <input type="file" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror"    placeholder="Img/"  id="image" wire:model.live="images">
        @error('temporary_images.*')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
        @error('temporary_images')
            <p class="fst-italic text-danger">{{$message}}</p>
        @enderror
      </div>
      @if (!empty($images))
        <div class="row">
            <div class="col-12 mb-3">
                <p>Photo preview:</p>
                <div class="row border border-4 border-success rounded shadow py-4">  
                      @foreach ($images as $key => $image)
                      <div class="col d-flex flex-coloumn align-items-center my-3">
                            <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                            <button type="button" class="btn btn-danger mt-1" wire:click="removeImage({{$key}})">X</button>
                      </div>
                      @endforeach
                </div>
            </div>
        </div>
        @endif
      <button type="submit" class="btn btn-main">{{__('ui.insertadvertise')}}</button>
  </form>
    <script src="{{ asset('js/script.js') }}"></script>
</div>
