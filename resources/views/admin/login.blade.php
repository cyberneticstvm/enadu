<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin-Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ public_path() .'/admin-login/images/icons/favicon.ico' }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/vendor/bootstrap/css/bootstrap.min.css' }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css' }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/vendor/animate/animate.css' }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/vendor/css-hamburgers/hamburgers.min.css' }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/vendor/select2/select2.min.css' }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/css/util.css' }}">
	<link rel="stylesheet" type="text/css" href="{{ public_path() .'/admin-login/css/main.css' }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ public_path() .'/admin-login/images/img-01.png' }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="{{ route('loginn') }}">
                    @csrf
					<span class="login100-form-title">
						Admin Login
					</span>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="mobile" placeholder="Mobile">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
                        @error('mobile')
                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        @error('password')
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                        @enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ public_path() .'/admin-login/vendor/jquery/jquery-3.2.1.min.js' }}"></script>
<!--===============================================================================================-->
	<script src="{{ public_path() .'/admin-login/vendor/bootstrap/js/popper.js' }}"></script>
	<script src="{{ public_path() .'/admin-login/vendor/bootstrap/js/bootstrap.min.js' }}"></script>
<!--===============================================================================================-->
	<script src="{{ public_path() .'/admin-login/vendor/select2/select2.min.js' }}"></script>
<!--===============================================================================================-->
	<script src="{{ public_path() .'/admin-login/vendor/tilt/tilt.jquery.min.js' }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ public_path() .'/admin-login/js/main.js' }}"></script>

</body>
</html>