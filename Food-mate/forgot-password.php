<?php
include 'header.php';
?>

<title>Food-mate - Password Recovery</title>
        
  
        <!--===== INNERPAGE-WRAPPER ====-->
        <!--===== FULL-PAGE-FORM ====-->
        <section>
            <div id="full-page-form">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="full-page-title">
                                <h3 class="company-name"><span><img src="images/Logo.png" width="70" height="70">Food</span>-mate</h3>
                                <p>To reset your password, Enter the email address of your user account. if an account matches that email, you will receive a link to reset the password in your E-mail account.</p>
                            </div><!-- end full-page-title -->
                            
                            <div id="forgot-password">
                                <div class="custom-form custom-form-fields">
                                    <h3>Forgot Password</h3>
                                    <form method="POST" action="php.inc/forgot-password.inc.php">   
                                        <div class="form-group">
                                             <input type="email" name="email" class="form-control" placeholder="Your Email"  required/>
                                             <span><i class="fa fa-envelope"></i></span>
                                        </div>
                                        
                                        <button type="submit" name="submit" class="btn btn-success btn-block" style="border-radius: 7px;">Send</button>
                                    </form>
                                        
                                    <div class="other-links">
                                        <p class="link-line">Already Have An Account ? <a href="login">Login Here</a></p>
                                        <p class="link-line">New Here ? <a href="signup">Join Us</a></p>
                                    </div><!-- end other-links -->
                                </div><!-- end custom-form -->
                            </div><!-- end forgot-password -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end full-page-form -->
        </section>

<?php
include 'footer.php';
?>