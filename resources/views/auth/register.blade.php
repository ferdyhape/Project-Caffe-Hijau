@extends('admin-side.dashboard.layouts.main')
@section('content')

<body class="bg-auth">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5">
                        <img src="{{asset('assets/corp-assets/illustration/register.jpg')}}" class="bg-login-register"
                            alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="col row px-4 py-5 mx-auto">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register Page</h1>
                            </div>
                            <form class="user" method="POST" action="/register">
                                @csrf
                                <div class="form-group ">
                                    <input type="text"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        name="name" required placeholder="Name" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" required placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"
                                            class="show-pw form-control form-control-user @error('password') is-invalid @enderror "
                                            name="password" required placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password"
                                            class="show-pw form-control form-control-user @error('password') is-invalid @enderror "
                                            name="password_confirmation" required placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-check ms-2 my-3">
                                    <input class="form-check-input" type="checkbox" id="showPassword"
                                        onclick="checkPassword();" />
                                    <label class="form-check-label" for="showPassword">
                                        Show Password
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Register
                                    Account</button>
                                <hr>
                                <a href="{{ url('login') }}" class="btn btn-google btn-user btn-block">
                                    </i> Already have an account? Login!
                                </a>
                            </form>
                            <div class="my-2">
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function checkPassword(){
            var pass = document.querySelectorAll('.show-pw')
            {
                if (document.getElementById('showPassword').checked){ 
                    pass.forEach(element => {
                    element.type = 'text';
                    });
                } else {
                    pass.forEach(element => {
                    element.type = 'password';
                    });
                }
            }
        }
    </script>
</body>
@endsection