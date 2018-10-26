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
                                <p>Lorem ipsum dolor sit amet, conse adipiscing elit. Curabitur metus felis, venenatis eu ultricies vel, vehicula eu urna. Phasellus eget augue id est fringilla feugiat id a tellus. Sed hendrerit quam sed ante euismod posuere ultricies. </p>
                            </div><!-- end full-page-title -->

                            <div class="custom-form custom-form-fields">
                           
                                <h3>Reset your password</h3>
                                <form action="php.inc/password-recoverya.inc.php" method="POST">
                                <?php 
                            $email = $_GET['Email'];
                            ?> <input type="hidden" name="email" value="<?php echo $email; ?>">
                                    <div class="form-group">
                                         <input type="password" name="password" class="form-control" placeholder="New Password"  required/>
                                         <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="password" name="confirmpassword" class="form-control" placeholder="Re-enter New Password"  required/>
                                         <span><i class="fa fa-lock"></i></span>
                                    </div>
                                    
                                    <button type="submit" name="submit" class="btn btn-success btn-block" style="border-radius: 7px;font-size: 20px;">Reset</button>
                                </form>
                                
                            </div><!-- end custom-form -->

                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end full-page-form -->
            
        </section>


<?php
	include 'footer.php';
?>