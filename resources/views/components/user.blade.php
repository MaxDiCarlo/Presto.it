<div class="user d-flex gap-2 gap-md-5 justify-content-center align-items-center">
    <p class="text-center m-0">{{$user->name}}</p>
    <p class="text-center m-0">{{$user->email}}</p>
    <form action="{{route('reviewer.makeReviewer', compact('user'))}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-main p-1">{{__('ui.makereviewer')}}</button>
    </form>
</div>