<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GigSpy - Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- ANIMATE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animate.css') }}">
     <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets/admin/css/font-awesome.css') }}" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="{{ asset('assets/admin/js/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet" />
</head>
<body>
    @include('helpers.preloaderStart')
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">{{ $admin->name }}</div> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last login : {{ $admin->last_login }} &nbsp; <a href="{{ url('/logout') }}" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->