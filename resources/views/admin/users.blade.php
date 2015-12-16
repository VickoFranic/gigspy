@include('admin.header')

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="{{ $admin->avatar }}" class="user-image img-responsive img-circle"/>
            </li>

            <li>
                <a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-3x"></i>Dashboard</a>
            </li>
            <li>
                <a class="active-menu" href="{{ url('/admin/users')}}"><i class="fa fa-user fa-3x"></i>Users</a>
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

 @include('admin.footer')