<x-layout>
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

    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-6">
                <livewire:form-creazione />
            </div>
        </div>
    </div>
</x-layout>