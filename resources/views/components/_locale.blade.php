<form action="{{route('setLocale', $lang)}}" class="d-inline me-3" method="POST">
    @csrf
    <button class="btn" type="submit">
        <img src="{{asset('vendor/blade-flags/language-'.$lang.'.svg')}}" width="32" height="32">
    </button>
</form>