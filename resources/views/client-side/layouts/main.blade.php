<!DOCTYPE html>
<html lang="en">

<head>

    @include('client-side.layouts.head')

</head>

<body>

    @include('client-side.layouts.preload')

    @if (!Route::is('auth'))
    @include('client-side.layouts.navbar')
    @endif

    @yield('content')

    @if (!Route::is('auth'))
    @include('client-side.layouts.footer')
    @endif

    @include('client-side.layouts.script')

</body>

</html>