<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin-side.dashboard.layouts.head')

</head>

@if ( in_array(Route::current()->getName(), array('dashboardlogin', 'dashboardregister', 'dashboardforgorpassword',
'login', 'register'), true) )
@yield('content')
@include('admin-side.dashboard.layouts.script')
@include('sweetalert::alert')

@else

<body>
    <div id="page-top">
        <div id="wrapper">
            @include('admin-side.dashboard.layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                @include('admin-side.dashboard.layouts.top-bar')

                <div id="content">
                    @yield('content')
                </div>
                @include('admin-side.dashboard.layouts.footer')
                @include('admin-side.dashboard.layouts.scroll-to-top')
                @include('admin-side.dashboard.layouts.logout-modal')
            </div>
        </div>
    </div>
    @include('admin-side.dashboard.layouts.script')
    @include('sweetalert::alert')
</body>
@endif



</html>