<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.head')

</head>

<body>

    @include('layouts.preload')

    @if (!Route::is('auth'))
    @include('layouts.navbar')
    @endif

    @yield('content')

    @if (!Route::is('auth'))
    @include('layouts.footer')
    @endif

    @include('layouts.script')

</body>

</html>