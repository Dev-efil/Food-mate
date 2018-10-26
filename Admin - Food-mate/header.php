<?php 

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Food-mate | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <link rel="icon" href="dist/img/admin.jpg" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Food-</b>mate</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin </b>Food-mate</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">




          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php
                                if (isset($_SESSION['a_uname'])) 
                                {   
                                    echo $_SESSION['a_uname'];
                                }
                            ?>  </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/admin.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['a_uname']; ?> - Food-mate Admin
                  <small>Member since Feb. 2018</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div align="center">
                  <form action="logout.inc.php" method="POST">
                      <input class="btn btn-success btn-flat" style="border-radius: 6px;" name="submit" type="submit" value="Logout">
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>


 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
                                if (isset($_SESSION['a_uname'])) 
                                {   
                                    echo $_SESSION['a_uname'];
                                }
                            ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"  data-widget="tree">
        <li class="header"> </li>

        <li <?php if($_SERVER['SCRIPT_NAME']=="/admin - Food-mate/admin.php") { ?> class="active" <?php   }  ?>>
          <a href="admin">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard </span>
            <span class="pull-right-container">         
            </span>
          </a>
        </li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/admin - Food-mate/restaurant.php") { ?> class="active" <?php   }  ?>>
          <a href="restaurant">
            <i class="fa fa-cutlery"></i>
            <span>Restaurants</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/admin - Food-mate/user.php") { ?> class="active" <?php   }  ?>>
          <a href="user">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/admin - Food-mate/restaurantManager.php") { ?> class="active" <?php   }  ?>>
          <a href="restaurantManager">
            <i class="fa fa-user-circle-o"></i>
            <span>Restaurant Manager</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/admin - Food-mate/review.php") { ?> class="active" <?php   }  ?>>
          <a href="review">
            <i class="fa fa-commenting-o"></i> 
            <span>Reviews</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

