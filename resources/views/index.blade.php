<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<title>GigSpy</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="assets/user/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/user/css/app.css">
<link href="assets/user/css/bootstrap.css" rel="stylesheet">
<link href="assets/user/css/main.css" rel="stylesheet">
<link href="assets/user/css/font-style.css" rel="stylesheet">
<link rel="stylesheet" href="assets/user/css/register.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

    </head>
    <body>
      <div id="preloader">
        <h1>Please wait...</h1>
      </div>

      <div class="wrap invisible">
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
           <p><img src="assets/user/img/logo_small.png" alt=""></p>
           <p>GigSpy - Musician`s best friend</p>
         </div>

       </div><!-- /row -->
     </div><!-- /container -->		
   </div><!-- /footerwrap -->
 </div>
<script type="text/javascript" src="assets/user/js/all.js"></script>
</body>
</html>