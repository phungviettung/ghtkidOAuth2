<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
  	<base href="{{ asset('')}}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="client_asset/css/LgoinWithoutAccount.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="client_asset/img/icon.png">

</head>
<body>
	<div class="wrapper">
		<header>
			<div class="hearder_header">
				<img src="client_asset/img/logo.png" alt="">
			</div>
		</header>

		<section class="fm_login">
			<form action="postlogin" method="POST">
      			{{ csrf_field() }}
      			 @if(isset($error))
		            <div class="alert alert-danger">
		                    <strong>{{$error}}</strong><br/>
		            </div>
		        @endif


				<!-- <h6 class="title">Log in to use your <span>GHTK</span> account with <span>Shopee</span></h6> -->
				<div class="form-group row">
					<label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
					<div class="col-sm-9">
						<input type="email" name="email"  class="form-control"  placeholder="email.ghtk.vn">
					</div>
				</div>
				<div class="form-group row">
					<label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
					<div class="col-sm-9">
						<input type="password" name="password" class="form-control"placeholder="Password">
					</div>
				</div>
				@if(isset($callback_url))
				<input type="hidden" name="callback" value="{{$callback_url}}">
				<input type="hidden" name="app_id" value="{{$app_id}}">
				@endif


				<a class="fogot" href="">Forgotten Password?</a>
				<button type="submit" class="btn btn_login">Login</button>
				<div class="register-link">
                    <p>
                        Don't you have account?
                        <a href="register.php">Sign Up Here</a>
                    </p>
                </div>
			</form>
		</section>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>