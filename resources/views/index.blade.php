<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title>GigSpy</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="assets/css/app.css">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/font-style.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/register.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="assets/js/all.js"></script>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

  </head>
  <body>
  	<div class="container">
  		<div class="row">

  		@if(isset($user))
  			@include('index.userinfo')
  		@else
  			@include('index.start')
  		@endif

  		</div>
  	</div>

  	<div id="footerwrap">
  		<footer class="clearfix"></footer>
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-12 col-lg-12">
  					<p><img src="assets/img/logo_small.png" alt=""></p>
  					<p>GigSpy - Musician`s best friend</p>
  				</div>

  			</div><!-- /row -->
  		</div><!-- /container -->		
  	</div><!-- /footerwrap -->

</body>
</html>