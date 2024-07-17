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
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" wire:model="title">
      </div>
      <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" class="form-control" id="price" wire:model="price">
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea id="description" cols="30" rows="10" wire:model="description" class="form-control"></textarea>
      </div>
      <div class="mb-3">
          <label for="categories" class="form-label">Categories</label>
          <select class="form-select" id="categories" wire:model="category">
              <option value="" selected>Seleziona una categoria</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
      </div>
      <div id="fileInputsContainer">
    @for ($i = 0; $i < $inputCount; $i++)
        <div class="mb-3" wire:key="file-{{ $i }}">
            <label for="img[{{ $i }}]" class="form-label">File</label>
            <input type="file" class="form-control" id="img[{{ $i }}]" wire:model.live="img.{{ $i }}">
        </div>
    @endfor
  </div>

      <button type="button" class="btn btn-main" wire:click="addInput" id="addFileInput">Add File</button>
      <button type="submit" class="btn btn-main">Inserisci Annuncio</button>
  </form>
    <script src="{{ asset('js/script.js') }}"></script>
</div>
