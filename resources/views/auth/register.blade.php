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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 pt-5 my-5">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                        <label for="name" class="form-label mt-3">Username</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                      <label for="password_confirmation" class="form-label mt-3">Password confirmation</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-main">Register</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>