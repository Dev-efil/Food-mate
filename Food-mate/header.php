<?php
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from kiswa.net/themes/star-travel/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Jun 2018 18:56:30 GMT -->
<head>
    <!-- <title>Food-mate</title> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="images/Logo.png" type="image/x-icon">

    <!-- Google Fonts -->   
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Stylesheet -->   
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom Stylesheets --> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" id="cpswitch" href="css/orange.css">
    <link rel="stylesheet" href="css/responsive.css">

    
    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">

    <!-- Flex Slider Stylesheet -->
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" />

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="css/datepicker.css">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Color Panel -->
    <link rel="stylesheet" href="css/jquery.colorpanel.css">

<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

       <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->
    </head>
    
    
    <body id="main-homepage">



       <!--====== LOADER =====-->
       <div class="loader"></div>

       <nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar-1" style="padding-top: 12px;height: 70px;">
        <div class="container">
            <div class="col-md-5" >

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" id="menu-button">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                  </button>
                  <a href="index" class="navbar-brand" style="padding-top:5px;"><span><img src="images/Logo.png" width="45" height="45">Food</span>-mate</a>
              </div><!-- end navbar-header -->
          </div>

          <div class="col-md-4">
            <div class="collapse navbar-collapse" id="myNavbar1">

                <ul class="nav navbar-nav navbar-right">
                    <li <?php if($_SERVER['SCRIPT_NAME']=="/Food-mate/index") { ?>  class="nav-item active" <?php   }  ?> id="home" style="padding-top: 0;padding-bottom: 2px;">
                        <a class="nav-link" href="index">Home</a>		
                    </li>
                    <li <?php if($_SERVER['SCRIPT_NAME']=="/Food-mate/about") { ?>  class="nav-item active"   <?php   }  ?> id="about" style="padding-top: 0;padding-bottom: 2px;">
                        <a class="nav-link " href="about">About Us</a>

                    </li>
                    <li <?php if($_SERVER['SCRIPT_NAME']=="/Food-mate/contact") { ?>  class="nav-item active"   <?php   }  ?> id="contact" style="padding-top: 0;padding-bottom: 2px;margin-left: 0;">
                        <a class="nav-link " href="contact" style="margin-right: 13px;">Contact Us</a>
                    </li>


                </ul>

            </div>
        </div>
        <div class="col-md-3">
            <div class="collapse navbar-collapse" id="myNavbar1">
                <?php
                if (isset($_SESSION['u_name']) || isset($_SESSION['ru_name']))
                {
                    echo '<form action="php.inc/logout.inc.php" method="POST">
                    <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item" style="padding-top: 13px;padding-bottom: 2px;">   
                    <input class="logoutbtn newlgbtn" name="submit" type="submit" value="Logout" style="padding-right=0;" >
                    </li>  
                    </ul>
                    </form>';
                }

                else
                {
                    echo '
                    <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item" style="padding-top: 0;padding-bottom: 2px;">
                    <a class="nav-link " href="login">Login</a>
                    </li>     
                    <li class="nav-item" style="padding-top: 0;padding-bottom: 2px;">
                    <a class="nav-link " href="signup">Sign up</a>
                    </li>
                    </ul>';
                }
                ?>
                <?php
               
                if (isset($_SESSION['ru_name']))
                {
                    $rusername=$_SESSION['ru_name'];
                    echo '<ul class="nav navbar-nav navbar-right">
                    <li class="nav-item" id="contact" style="padding-top: 0px;padding-bottom: 5px;margin-left: 0;">
                    <a class="nav-link " href="restaurant" style="padding-right: 15px !important;">'.$rusername.'</a>
                    </li>
                    </ul>';
                }
                ?>
                <?php
                
                if (isset($_SESSION['u_name']))
                {

                    $username=$_SESSION['u_name'];
                    echo '<ul class="nav navbar-nav navbar-right">
                    <li class="nav-item" id="contact" style="padding-top: 0px;padding-bottom: 5px;margin-left: 0;">
                    <a class="nav-link " href="index" style="padding-right: 15px !important;">'.$username.'</a>
                    </li>
                    </ul>';
                }
                ?>            
            </div>
        </div>



    </div><!-- end navbar collapse -->

    <!-- end container -->

</nav><!-- end navbar -->        

</script>
<div class="sidenav-content">
    <div id="mySidenav" class="sidenav" >
        <h2 id="web-name"><span><img src="images/Logo.png" width="40" height="40"></span>Food-mate</h2>

        <div id="main-menu">
           <div class="closebtn">
            <button class="btn btn-default" id="closebtn">&times;</button>
        </div><!-- end close-btn -->

        <div class="list-group panel">

            <a href="index" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-home link-icon"></i></span>Home</a>


            <a href="about" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-address-card link-icon"></i></span>About Us</a>


            <a href="contact" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-phone link-icon"></i></span>Contact Us</a>


            <a href="login" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-lock link-icon"></i></span>Login</a>


            <a href="signup" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-user-plus link-icon"></i></span>Sign Up</a>


        </div><!-- end main-menu -->
    </div><!-- end mySidenav -->
</div><!-- end sidenav-content -->
</div>