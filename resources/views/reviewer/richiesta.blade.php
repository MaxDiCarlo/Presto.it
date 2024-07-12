<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 pt-5">
                <form method="POST" action="{{route('reviewer.submit')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="body" class="form-label">Richiesta</label>
                        <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-main">Invia richiesta</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>