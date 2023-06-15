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


	</style>
	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login_rejestr/images/bg.jpg')}})">
	<section class="ftco-section">
		<div class="">
			<div class="row justify-content-center">
				<div class="">
              
                    <div class="transparent-box">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <div class="button-container">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-primary-button class="form-control btn btn-primary submit px-1">
                                        {{ __('Resend Verification Email') }}
                                    </x-primary-button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-primary-button class="form-control btn btn-primary submit px-1">
                                    {{ __('Log Out') }}
                                </x-primary-button>
                            </form>
                        </div>
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
