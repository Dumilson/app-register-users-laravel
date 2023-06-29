@if (Session::has('success'))
    <div class="alert success">
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('info'))
    <div class="alert info">
        {{ Session::get('info') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert warning">
        {{ Session::get('warning') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert error">
        {{ Session::get('error') }}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert error">
            {{ $error }}
        </div>
    @endforeach
@endif
