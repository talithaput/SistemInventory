
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Sign Up</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('template/')}}/assets/img/icon.ico" type="image/x-icon"/>



	<!-- Fonts and icons -->
	<script src="{{asset('template/')}}/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{asset('template/')}}/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('template/')}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('template/')}}/assets/css/azzara.min.css">
</head>
<body class="login" style="background-color:#e4e6c3">
	<div class="wrapper wrapper-login">
		<div class="container container-login">
        <form method="POST" action="{{ route('register') }}">
            @csrf
			<h3 class="text-center">Sign Up</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
				<label for="name">{{ __('Name') }}</label>
					<input  id="name" name="name" type="text" class="form-control input-border-bottom" value="{{ old('name') }}" required autocomplete="name" autofocus>
					
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group form-floating-label">
					<label for="email">{{ __('Email Address') }}</label>
					<input  id="email" name="email" type="email" class="form-control input-border-bottom" value="{{ old('email') }}" required autocomplete="email">
					
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group form-floating-label">
				<label for="password">{{ __('Password') }}</label>
					<input  id="password" name="password" type="password" class="form-control input-border-bottom" value="{{ old('password') }}" required autocomplete="new-password">
					
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group form-floating-label">
				<label for="password-confirm">{{__('Confirm Password') }}</label>
					<input  id="password-confirm" name="password_confirmation" type="password" class="form-control input-border-bottom" required autocomplete="new-password">
					
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
				<div class="form-action">
					<a href="{{ route('login') }}" id="show-signin" class="btn btn-danger btn-rounded btn-login mr-3">Cancel</a>
					<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
				</div>
				</div>
			</div>
        </form>
		</div>
	</div>
	<script src="{{asset('template/')}}/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/core/popper.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/core/bootstrap.min.js"></script>
	<script src="{{asset('template/')}}/assets/js/ready.js"></script>
</body>
</html>