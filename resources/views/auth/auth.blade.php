@extends('layouts.main')
@section('content')

<section class="ftco-section">
	<div class="container my-5">
		<div class="justify-content-center row">
			<div class="col-lg-5 col-sm-7 px-0">
				@if ($message = Session::get('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{ $message }}
					<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif

				@if ($message = Session::get('LoginFailed'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					{{ $message }}
					<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-5 col-sm-7 shadow p-5">
				<ul class="nav nav-fill nav-justified" id="nav-tab" role="tablist">
					<button class="nav-item border-0 btn btn-light mx-2 py-2 active" style="font-size: 13px"
						id="pills-login-tab" data-bs-toggle="tab" data-bs-target="#pills-login" type="button" role="tab"
						aria-controls="pills-login" aria-selected="false">LOGIN</button>
					<button class="nav-item border-0 btn btn-light mx-2 py-2" style="font-size: 13px" id="tab-register"
						data-bs-toggle="tab" data-bs-target="#pills-register" type="button" role="tab"
						aria-controls="pills-register" aria-selected="false">REGISTER</button>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
						<p class="h2 text-center mt-5">LOGIN PAGE</p>
						<div class="login-icon text-center m-0 p-0" style="font-size: 150px;">
							<i class="fa-solid fa-house-lock text-dark"></i>
						</div>
						<form method="POST" action="/login" class="signin-form">
							@csrf
							<div class="form-group mt-3">
								<input type="text" class=" form-control @error('email') is-invalid @enderror"
									name="email" required placeholder="Email">
								@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="form-group mt-3">
								<input id="password-field" type="password" class=" form-control" name="password"
									required placeholder="Passowrd">
								@error('password')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="form-group mt-3">
								<button type="submit"
									class="form-control btn btn-primary rounded submit px-3">Login</button>
							</div>
							<div class="form-group d-flex mt-3 mb-0">
								<div class="w-50 text-start">
									<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-end">
									<a href="#">Forgot Password</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
						<p class="h2 text-center mt-5">REGISTER PAGE</p>
						<div class="login-icon text-center m-0 p-0" style="font-size: 150px;">
							<i class="fa-solid fa-address-card  text-dark"></i>
						</div>
						<form method="POST" action="/register" class="signin-form">
							@csrf
							<input type="hidden" id="level" name="level" value="user">
							<div class="form-group mt-3">
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
									required placeholder="Name">
								@error('name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
							<div class="form-group mt-3">
								<input type="text" class="form-control @error('email') is-invalid @enderror"
									name="email" required placeholder="Email">
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group mt-3">
								<input id="password" type="password"
									class="form-control @error('password') is-invalid @enderror" name="password"
									required placeholder="Password">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="form-group mt-3">
								<input id="password-confirm" type="password"
									class="form-control @error('password') is-invalid @enderror"
									name="password_confirmation" required autocomplete="new-password"
									placeholder="Password Confirm">
							</div>
							<div class="form-group mt-3">
								<button type="submit"
									class="form-control btn btn-primary rounded submit px-3">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection