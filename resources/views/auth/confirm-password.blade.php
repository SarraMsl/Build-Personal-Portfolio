<!doctype html>
<html lang="en">
<head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login_rejestr/css/style.css')}}">
	<style>


		.transparent-box {
            margin-top: 50%;
			width: 650px;
			height: 350px;
			border: 2px solid #fff;
			border-radius: 10px;
			background-color: rgba(255, 255, 255, 0.3);
			padding: 40px;
		}

        .button-container {
            display: flex;
            justify-content: space-evenly;
            margin-top: 30px;
        }

        .transparent-box .text-sm {
            color: #050101;
            font-size: 25px;
        }
        .button-container button {
            width: 20px;
        }

	</style>
	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login_rejestr/images/bg.jpg')}})">
	<section class="ftco-section">
		<div class="">
			<div class="row justify-content-center">
				<div class="">
              
                    <div class="transparent-box">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
           
                <div class="form-group">
                    <input id="password"  type="password" class="form-control" placeholder="Password"  name="password"
                    required autocomplete="current-password" >
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>
        </div>

    <div>
     <center><x-primary-button class=" btn btn-primary submit  button-container">
     {{ __('Confirm') }}
        </x-primary-button></center>   
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
