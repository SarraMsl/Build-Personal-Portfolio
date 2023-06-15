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
					<h2 class="heading-section">sign up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">You don't have an account?</h3>
				  <form method="POST" action="{{ route('register') }}">
					@csrf
					                    
					<div class="form-group">
                     
					<input type="text" id="name" class="form-control" placeholder="name"   name="name" :value="{{old('name')}}"  required autofocus autocomplete="name" >
					<x-input-error :messages="$errors->get('name')" class="mt-2" />
  
				</div>
		      		<div class="form-group">
		      			<input type="text"  id="username" class="form-control" placeholder="Username" name="username" :value="{{old('username')}}" required autofocus autocomplete="username" >
						  <x-input-error :messages="$errors->get('username')" class="mt-2" />

					</div>
                      <div class="form-group">
                        <input id="email" type="text" class="form-control" placeholder="Email"name="email" :value="{{old('email')}}" required autocomplete="username" >
						<x-input-error :messages="$errors->get('email')" class="mt-2" />
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
				<center><a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
						{{ __('Already registered?') }}
					</a></center>	
		
					<x-primary-button class="form-control btn btn-primary submit px-3">
						<a href="{{ route('verify_email') }}"></a>
						{{ __('Register') }}
					</x-primary-button>
	            </div>
	
	          </form>
	          <p class="w-100 text-center">&mdash;   <a  href="{{ route('login') }}">Or Sign In</a>&mdash;</p>
	         
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

