<x-layout>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-6">
                <form method="POST" action="{{route('advertise.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control" id="title" name="title">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <input type="text-area" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Categories</label>
                        <select class="form-select" id="categories" name="categories[]">
                            @foreach ($categories as $category)
                                <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>