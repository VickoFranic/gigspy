<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GigSpy - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/login.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

  </head>
  <body>

  	<div class="container">
  		<div class="row">
  			<div class="col-lg-offset-4 col-lg-4" style="margin-top:100px">
  				<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
  					<img src="assets/img/logo_small.png" alt="" class="img">
  					<br>
  					<br>
  					<form class="cmxform" id="signupForm" method="POST" action="">
  					{{ csrf_field() }}
  						<fieldset>
  							<p>
  								<input id="email" name="email" type="email" placeholder="Username">
  								<br>
  								<input id="password" name="password" type="password" placeholder="Password">
  							</p>
  							<input class="submit btn-success btn btn-large" type="submit" value="Login">
  						</fieldset>
  					</form>
  					<div class="error">
  						@if (Session::has('message'))
  							{{ Session::get('message') }}
  						@endif
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>

</body>
</html>