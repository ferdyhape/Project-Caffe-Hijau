<!DOCTYPE html>
<html lang="en">

<head>

    @include('general-page.layouts.head')

</head>

<body>

    @include('general-page.layouts.preload')

    @if (!Route::is('auth'))
    @include('general-page.layouts.navbar')
    @endif

    @yield('content')

    @if (!Route::is('auth'))
    @include('general-page.layouts.footer')
    @endif

    @include('general-page.layouts.script')

</body>

</html>