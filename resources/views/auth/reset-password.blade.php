<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login_rejestr/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login_rejestr/images/bg.jpg')}})">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
                  <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

		      
                      <div class="form-group">
                        <input id="username" type="text" class="form-control" placeholder="Username"name="username"  :value="old('username', $request->username)" required autocomplete="username" >
						<x-input-error :messages="$errors->get('username')" class="mt-2" />
						</div>
	            <div class="form-group">
	              <input id="password"  type="password" class="form-control" placeholder="Password"  name="password"
				  required autocomplete="new-password" >
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				  
				  <x-input-error :messages="$errors->get('password')" class="mt-2" />
	            </div>
                <div class="form-group">
                    <input id="password_confirmation" type="password" class="form-control" placeholder="Confirem Password" name="password_confirmation" required autocomplete="new-password">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  </div>
               
	            <div class="form-group">
		
		
					<x-primary-button class="form-control btn btn-primary submit px-3">
						{{ __('Register') }}
					</x-primary-button>
	            </div>
	
	          </form>
	         
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('login_rejestr/js/jquery.min.js')}}"></script>
  <script src="{{asset('login_rejestr/js/popper.js')}}"></script>
  <script src="{{asset('login_rejestr/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('login_rejestr/js/main.js')}}"></script>

	</body>
</html>

