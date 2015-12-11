<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GigSpy - Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" />
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
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="{{ $admin->avatar }}" class="user-image img-responsive img-circle"/>
                    </li>

                    <li>
                        <a  href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-3x"></i>Dashboard</a>
                    </li>
                     <li>
                        <a class="active-menu"  href="{{ url('/admin/users')}}"><i class="fa fa-user fa-3x"></i>Users</a>
                    </li>
                </ul>      
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     	<h2>Users</h2>     
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Users table</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Location</th>
                                            <th>Last login</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                            @if($user->role_id == 1)
                                        		<h6 class="text-center">ADMIN</h6>
                                        	@endif
                                            	<img src="{{ $user->avatar }}" class="img img-responsive img-circle user-image">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->location }}</td>
                                            <td>{{ $user->last_login }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      <!-- End  Basic Table  -->
                </div>   
            </div>
        </div>           
    </div>
 <!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('assets/admin/js/jquery-1.10.2.js') }}"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="{{ asset('assets/admin/js/jquery.metisMenu.js') }}"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="{{ asset('assets/admin/js/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables/dataTables.bootstrap.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    
   
</body>
</html>
