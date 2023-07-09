<!doctype html>
<html lang="en">
  <head>
  	<title>Login Sicatat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('/sicatatmentahan/css/login.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img">
						<img src="{{ asset('sicatatmentahan/images/logingambar.png') }}" alt="Image">
						</div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
						<div class="img-pemkot" style="background-image: url(images/logopemkot.png);" src="{{ asset('/sicatatmentahan/images/logopemkot.png') }}">
						</div>
			      		<div class="w-100">
			      			<h3 class="text-center">LOGIN</h3>
			      		</div>
			      	</div>
							<form class="signin-form" method="POST" action="{{ route('login') }}">
                            @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="username" >{{ __('Username') }}</label>
			      			<input type="text" class="form-control" placeholder="username" name="username" id=username  value="{{ old('username') }}" required autocomplete="username" autofocus>
                        </div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">{{ __('Password') }}</label>
		              <input type="password" class="form-control" placeholder="password" name="password"  id="password" required autocomplete="current-password">
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">{{ __('Login') }}</button>
                        
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
						</div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

