<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login_rejestr/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login_rejestr/images/bg.jpg')}})">
		<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
				  <x-auth-session-status class="mb-4" :status="session('status')" />

				  <form method="POST" action="{{route('login')}}">
					@csrf
					<div class="form-group">
						<input type="text"  id="username" class="form-control" placeholder="Username" name="username" :value="{{old('username')}}" required autofocus autocomplete="username" >
						<x-input-error :messages="$errors->get('username')" class="mt-2" />
					</div>
	            <div class="form-group">
					<input id="password"  type="password" class="form-control" placeholder="Password" 
					name="password"
					required autocomplete="current-password" >
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

					<x-input-error :messages="$errors->get('password')" class="mt-2" />
	            </div>
	            <div class="form-group">
					<x-primary-button class="form-control btn btn-primary submit px-3">
						{{ __('Log in') }}
					</x-primary-button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
						<label for="remember_me" class="inline-flex items-center">
							<input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
							<span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
						</label>
								</div>
								<div class="w-50 text-md-right">
									@if (Route::has('password.request'))
									<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
										{{ __('Forgot your password?') }}
									</a>					
						            @endif
								</div>
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; <a  href="{{ route('register') }}">Or Sign Up</a> &mdash;</p>
	         
		      </div>
				</div>
			</div>
		</div>
	</section>
	<script src="{{asset('login_rejestr/js/jquery.min.js')}}"></script>
	<script src="{{asset('login_rejestr/js/popper.js')}}"></script>
	<script src="{{asset('login_rejestr/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('login_rejestr/js/main.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
	 @if(Session::has('message'))
	 var type = "{{ Session::get('alert-type','info') }}"
	 switch(type){
		case 'info':
		toastr.info(" {{ Session::get('message') }} ");
		break;
	
		case 'success':
		toastr.success(" {{ Session::get('message') }} ");
		break;
	
		case 'warning':
		toastr.warning(" {{ Session::get('message') }} ");
		break;
	
		case 'error':
		toastr.error(" {{ Session::get('message') }} ");
		break; 
	 }
	 @endif 
	</script>
	</body>
</html>

