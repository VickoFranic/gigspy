<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GigSpy - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
  <link href="assets/user/css/animate.css" rel="stylesheet">
	<link href="assets/user/css/bootstrap.css" rel="stylesheet">
	<link href="assets/user/css/login.css" rel="stylesheet">
	<link href="assets/user/css/app.css" rel="stylesheet">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

  </head>
  <body>
  @include('helpers.preloaderStart');
  	<div class="container">
  		<div class="row">
  			<div class="col-lg-offset-3 col-lg-6" style="margin-top:100px">
  				<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
  					<img src="assets/user/img/logo_small.png" alt="" class="img animated infinite pulse">
  					<br>
  					<br>

  					<form class="cmxform" id="signupForm" method="POST" action="">
  					{{ csrf_field() }}
  						<fieldset>
  							<p>
  								<input id="email" name="email" type="email" placeholder="Email">
  								<br>
  								<input id="password" name="password" type="password" placeholder="Password">
  							</p>
  							<input class="submit btn-success btn btn-large" type="submit" value="Login">
  						</fieldset>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  @include('helpers.preloaderEnd');
  
</body>
</html>