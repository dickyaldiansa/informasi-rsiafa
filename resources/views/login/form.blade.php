<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="{{ asset('images/logo.png') }}">
	<title>{{ Session::get('nama') }}</title>

	<!-- css-->
	<link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('template/vendor/jquery/jquery-ui.min.css') }}" rel="stylesheet">
</head>

<body>
	<div class="d-flex justify-content-center mt-5">
		<div class="col-md-4 col-sm-12">
			<div class="card">
				<h4 class="text-center mt-2">
					<img src="{{ asset('images/logo.png') }}" style="max-width: 40px;">
					RSIA FRISDHY ANGEL
				</h4>
				<div class="text-center">MONITORING</div>
				<div class="card-body">

					<form action="{{ route('authenticate') }}" method="post">
						@csrf

						@error('errorlogin')
						<div class="form-group row">
							<div class="col-sm-12">
								<div class="alert alert-danger">{{ $message }}</div>
							</div>
						</div>
						@enderror

						<div class="form-group row">
							<label class="col-sm-4">Username</label>
							<div class="col-sm-8">
								<input type="username" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror form-control-sm">
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4">Password</label>
							<div class="col-sm-8">
								<input type="password" name="password" class="form-control @error('password') is-invalid @enderror form-control-sm">
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4"></label>
							<div class="col-sm-8">
								<button type="submit" name="login" class="btn btn-outline-primary btn-sm">
									Sign-in <i class="fas fa-key"></i>
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>

</div>
<!-- End of Page Wrapper -->

<!-- javascript-->
<script src="{{ asset('template/vendor/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('template/vendor/jquery/jquery-ui.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>