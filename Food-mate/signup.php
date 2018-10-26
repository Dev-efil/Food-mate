<?php
include 'header.php';
?>

<title>Food-mate - Sign Up</title>    
<!--===== INNERPAGE-WRAPPER ====-->
<!--===== FULL-PAGE-FORM ====-->
<section>
    <div id="full-page-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="full-page-title" style="margin-bottom: 40px !important;">
                        <h3 class="company-name"><span><img src="images/Logo.png" width="70" height="70">Food</span>-mate</h3> 
                    </div><!-- end full-page-title -->

                    <div class="custom-form custom-form-fields">
                        <h3>Create Account</h3>
                        <div class="col-sm-12" > 
                            <div class="tab">
                                <div class="col-sm-6" style="padding-left: 0;">
                                    <button style="width: 260px; border-radius: 7px; outline: none;" class="btn btn-primary tablinks" onclick="openCity(event, 'User')" id="defaultOpen">User</button>
                                </div>
                                <div class="col-sm-6" style="padding-left: 0;"> 
                                    <button style="width: 260px;border-radius: 7px;outline: none;" class="btn btn-primary tablinks" onclick="openCity(event, 'Restaurant')" id="defaultOpen">Restaurant</button>
                                </div>
                            </div>
                        </div>

                        <div id="User" class="tabcontent">
                            <h4 style="padding-left: 20px;margin-bottom: 0px;margin-top:100px;">User Sign up</h4>
                            <form action="php.inc/signup.inc.user.php" method="POST" enctype="multipart/form-data">
                                <div class="col-sm-12">       
                                    <div class="col-sm-6">
                                     <div class="picture-container">
                                      <div class="picture">
                                          <img style="width: 170px; height: 170px;" src="images/default-avatar.png" class="picture-src" id="wizardPicturePreview"/>
                                          <input type="file" name="userimg" value="Upload Image" required>
                                      </div>

                                  </div>
                              </div>


                              <div class="col-sm-6" style="height: 200px;">

                                <div class="form-group" style="padding-bottom: 15px;">
                                 <input type="text" name="firstname" class="form-control" placeholder="First Name" required autofocus/>
                                 <span><i class="fa fa-user"></i></span>
                             </div>
                             <div class="form-group" style="padding-bottom: 15px;">
                                 <input type="text" name="lastname" class="form-control" placeholder="Last Name" required/>
                                 <span><i class="fa fa-user"></i></span>
                             </div>
                             <div class="form-group">
                                 <input type="text" name="dateofbirth" class="form-control" placeholder="Date Of Birth" required/>
                                 <span><i class="fa fa-calendar"></i></span>
                             </div>
                         </div>

                     </div>

                     <div class="col-sm-12"> 
                        <hr style="border-top: 2px solid #B4B5B5;">
                        <div class="col-sm-6">
                            <div class="form-group">
                             <input type="text" name="country" class="form-control" placeholder="Country"  required/>
                             <span><i class="fa fa-home"></i></span>
                         </div>
                         <div class="form-group">
                             <input type="text" name="state" class="form-control" placeholder="State"  required/>
                             <span><i class="fa fa-home"></i></span>
                         </div>
                         <div class="form-group">
                             <input type="text" name="city" class="form-control" placeholder="City"  required/>
                             <span><i class="fa fa-home"></i></span>   
                         </div>

                     </div>
                     <div class="col-sm-6" style="height: 180px;">
                        <div class="form-group">
                         <input type="text" name="contactNo" class="form-control" placeholder="Contact No." pattern="[0-9]{10}" required/>
                         <span><i class="fa fa-phone"></i></span>
                     </div>
                     <div class="form-group">
                         <input type="email" name="email" class="form-control" placeholder="Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"  required/>
                         <span><i class="fa fa-envelope"></i></span>
                     </div>
                 </div>
             </div>
             <div class="col-sm-12">
                <hr style="border-top: 2px solid #B4B5B5;">

                <div class="form-group">
                 <input type="text" name="username" class="form-control" placeholder="Username"  required/>
                 <span><i class="fa fa-user"></i></span>
             </div>

             <div class="form-group">
                 <input type="password" name="password" class="form-control" placeholder="Password"  required/>
                 <span><i class="fa fa-lock"></i></span>
             </div>

             <div class="form-group">
                 <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password"  required/>
                 <span><i class="fa fa-lock"></i></span>
             </div>
         </div>
         <div align="right" class="btnal">
            <button class="btn btn-success btn-block" type="submit" name="submit" style="margin-right:  23px; width: 125px;border-radius: 7px;">Sign up</button>
        </div>
    </form>
</div>

<div id="Restaurant" class="tabcontent">  
    <h4 style="padding-left: 20px;margin-bottom: 0px;margin-top:100px;">Restaurant Manager Sign up</h4>
    <form action="php.inc/signup.inc.rm.php" method="POST" enctype="multipart/form-data">
        <div class="col-sm-12">
            <div class="col-sm-6">
             <div class="picture-container">
              <div class="picture">
                  <img style="width: 170px; height: 170px;" src="images/default-avatar.png" class="picture-src" id="wizardPicturePreview"/>
                  <input type="file" name="RMimg" required>
              </div>
          </div>
      </div>
      <div class="col-sm-6" style="padding-top: 50px; height: 240px;">
        <div class="form-group" style="padding-bottom: 18px;">
         <input type="email" name="RMemail" class="form-control" placeholder="Email"  required/>
         <span><i class="fa fa-envelope"></i></span>
     </div>
     <div class="form-group">
         <input type="text" name="RMContactNo" class="form-control" placeholder="Contact No."  required/>
         <span><i class="fa fa-phone"></i></span>
     </div>
 </div>
</div>

<div class="col-sm-12">
 <div class="form-group">
     <input type="text" name="RMusername" class="form-control" placeholder="Username"  required/>
     <span><i class="fa fa-user"></i></span>
 </div>
 <div class="form-group">
     <input type="password" name="RMpassword" class="form-control" placeholder="Password"  required/>
     <span><i class="fa fa-lock"></i></span>
 </div>

 <div class="form-group">
     <input type="password" name="RMconfirmpassword" class="form-control" placeholder="Confirm Password"  required/>
     <span><i class="fa fa-lock"></i></span>
 </div>

</div>
<div align="right" class="btnal">
    <button class="btn btn-success btn-block" type="submit" name="submit1" style="margin-right:  23px; width: 125px;border-radius: 7px;">Sign up</button>
</div>
</form>



</div>
<div class="other-links">
    <p class="link-line">Already Have An Account ? <a href="login">Login Here</a></p>
</div><!-- end other-links -->
</div><!-- end custom-form -->

</div><!-- end columns -->
</div><!-- end row -->
</div><!-- end container -->
</div><!-- end full-page-form -->
</section>








<script>
    function openCity(evt, userName) 
    {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) 
        {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) 
        {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }
        document.getElementById(userName).style.display = "block";
        evt.currentTarget.className += "active";
    }
    document.getElementById("defaultOpen").click();
</script>

<?php
include 'footer.php';
?>