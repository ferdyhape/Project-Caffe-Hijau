@extends('admin-side.dashboard.layouts.main')
@section('content')

<body class="bg-gradient-primary">

    <div class="container">
        <div class="container my-5">

            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9 p-0">

                    <div class="card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row justify content-center">
                                <div class="col-lg-6"><img src="{{asset('assets/corp-assets/illustration/login.jpg')}}"
                                        class="bg-login-register" alt="login-illustration"></div>
                                <div class="col-lg-6">
                                    <div class="col row px-3 py-5 mx-auto">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <form method="POST" action="/login" class="user">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user " name="email"
                                                    placeholder="Email" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user"
                                                    name="password" placeholder="Passowrd" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary btn-user btn-block">Login</button>
                                            <hr>
                                            <a href="{{url('/login/google')}}"
                                                class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                        </form>
                                        <div class="my-2">
                                            <div class="text-center">
                                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="{{ url('register') }}">Create an Account!</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        @if ($message = Session::get('toast_error'))
        <script src="vendor/sweetalert/sweetalert.all.js"></script>
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })
            
            Toast.fire({
            icon: 'error',
            title: 'login failed, wrong email or password!'
            })
        </script>
        @endif
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>
@endsection