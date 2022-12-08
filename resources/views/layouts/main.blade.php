<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.head')

</head>

<body>

    @include('layouts.preload')

    @if (!Route::is('login', 'register'))
    @include('layouts.navbar')
    @endif

    @yield('content')

    @if (!Route::is('login', 'register'))
    @include('layouts.footer')
    @endif

    @include('layouts.script')

</body>

</html>