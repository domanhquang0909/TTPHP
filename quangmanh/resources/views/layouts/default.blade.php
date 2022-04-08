<!DOCTYPE html>
<html lang="en">
<head>
  @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini">
    <section>
<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i style="font-size: 18px;" class="fas fa-bars"></i></a>
      </li>

    </ul>
    <ul style="margin-left: 1160px;"  class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
             @if(Auth::check())
                <li class="dropdown">
                    <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a ><i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        @endif
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
    <ul class="navbar-nav ml-auto">

    </ul>

  </nav>
@include('layouts.header')


  <div class="content-wrapper">

    <section class="content">

      <div class="container" style="font-family: Arial, Helvetica, sans-serif;font-size: 15px;" >

        <div class="row">
          <!-- left column -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <div class="panel panel-primary">
                   <div class="panel-heading">
                         <h2 class="panel-title"> {{$title}} <small></small></h2>
                   </div>

                   @yield('contents')

             </div>

          </div>

          <div class="col-md-6">
          </div>
          </div>
      </div>
    </section>
  </div>

 @include('layouts.footer')
 </section>
</body>
</html>