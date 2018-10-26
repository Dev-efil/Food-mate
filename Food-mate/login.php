<?php
session_start();

include 'header.php';
$msg='';
if (isset($_POST['submit'])) 
{
    include_once 'dbconn.php';
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);
    if (empty($Username) || empty($Password)) 
    {
         $msg = "<div class='alert alert-danger'>
                                    Invalid Password
                                </div>";

    }
   
}

?>

<title>Food-mate - Login</title>

        <!--===== INNERPAGE-WRAPPER ====-->
       <!--===== FULL-PAGE-FORM ====-->
        <section>
            
             
            <div id="full-page-form">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="full-page-title">
                                <h3 class="company-name"><span><img src="images/Logo.png" width="70" height="70">Food</span>-mate</h3>
                                <p>Lorem ipsum dolor sit amet, conse adipiscing elit. Curabitur metus felis, venenatis eu ultricies vel, vehicula eu urna. Phasellus eget augue id est fringilla feugiat id a tellus. Sed hendrerit quam sed ante euismod posuere ultricies. </p>
                            </div><!-- end full-page-title -->

                            <div class="custom-form custom-form-fields">
<?php 

// if(session('success'))<div class="alert alert-success">
// {
//     { 
//         session('success') 
//     }
// }</div>
// endif
// if(session('error'))<div class="alert alert-danger">
//     {
//         { 
//             session('error') 
//         }
//     }</div>
// endif
// if(count($errors) > 0)<div class="alert alert-danger"><strong>Whoops!</strong> There were some problems with your input.</div>
// endif
 ?>
                              <?php 

                              // if (isset($message)) 
                              // {
                              //     echo $message;
                              // }
                             
                              // print_r($_GET['Error']);
        if(isset($_GET['Error'])=="invalid") 
            { 
                echo '<div class="alert alert-danger" role="alert">
                                    Invalid Password
                                </div>'; 
            }
            elseif (isset($_GET['Error'])=="invalidu") 
            {
                echo '<div class="alert alert-danger" role="alert">
                                    Invalid Username
                                </div>'; 
            }
            elseif (isset($_GET['Error'])=="deactivatedr") 
            {
                echo '<div class="alert alert-danger" role="alert">
                                    Your account is deactivated, Please contact Administrator.
                                </div>'; 
            }
            elseif (isset($_GET['Error'])=="deactivated") 
            {
                echo '<div class="alert alert-danger" role="alert">
                                    Your account is deactivated, Please contact Administrator.
                                </div>'; 
            }

                               ?>  
                           


                                <h3>Login</h3>
                                <form action="php.inc/Login.inc.php" method="POST"> 

                                    <div class="form-group">
                                         <input type="text" name="Username" class="form-control" placeholder="Username" required=""  autofocus/>
                                         <span><i class="fa fa-user"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="password" name="Password" class="form-control" placeholder="Password"  />
                                         <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <div class="checkbox">
                                         <label><input type="checkbox"> Remember me</label>
                                    </div>
                                    
                                    <button class="btn btn-success btn-block" style="border-radius: 7px;" type="submit" name="submit">Login</button>
                                </form>
                                <?php 


                                   // $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                   //  if (strpos($fullUrl, "login=pin") == true) 
                                   //  {
                                   //      echo "<div class='alert alert-success'>Invalid Password</div>";
                                   //      exit();
                                   //  }
                                   //  else if (strpos($fullUrl, "login=iu") == true) 
                                   //  {
                                   //      echo '<div class="alert alert-success">Invalid Username</div>';
                                   //      exit();
                                   //  }
                                   //  else if (strpos($fullUrl, "login=error") == true) 
                                   //  {
                                   //      echo '<div class="alert alert-success">User not found in our system</div>';
                                   //      exit();
                                   //  }
                                // if (!isset($_GET['login'])) 
                                // {
                                //     // exit();
                                // }
                                // else
                                // {
                                //     $login = $_GET['login'];
                                //     if ($login == 'ip') 
                                //     {
                                //         echo "<div class='alert alert-success'>Invalid Password</div>";
                                //         exit();
                                //     }
                                //     else if ($login == 'iu') 
                                //     {
                                //         echo '<div class="alert alert-success">Invalid Username</div>';
                                //         exit();
                                //     }
                                //     else if ($login == 'error') 
                                //     {
                                //         echo '<div class="alert alert-success">User not found in our system</div>';
                                //         exit();
                                //     }
                                // } -->

                                 ?>
                                <div class="other-links">
                                    <p class="link-line">New Here ? <a href="signup">Signup</a></p>
                                    <a class="simple-link" href="forgot-password">Forgot Password ?</a>
                                </div><!-- end other-links -->
                            </div><!-- end custom-form -->

                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end full-page-form -->
            
        </section>

<?php
include 'footer.php';
?>