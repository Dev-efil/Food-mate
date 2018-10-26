<?php
session_start();
if (!isset($_SESSION['ru_name'])) 
{  
 header("location: login.php");
}
include 'header.php';
include_once 'php.inc/dbconn.php';

?>
<title>Food-mate - Restaurant</title>

<!--========== PAGE-COVER =========-->
<section class="page-cover dashboard" style="height: 125px;">
    <div class="container" style="padding-top: 50px;>
    <div class="row">
        <div class="col-sm-12">
         <h1 class="page-title">Restaurant</h1>
         <ul class="breadcrumb">
            <li><a href="index">Home</a></li>
            <li class="active">Restaurant</li>
        </ul>
    </div><!-- end columns -->
</div><!-- end row -->
</div><!-- end container -->
</section><!-- end page-cover -->




<!--===== INNERPAGE-WRAPPER ====-->
<section class="innerpage-wrapper" style="padding-top: 0;">
    <div id="dashboard" class="innerpage-section-padding" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div style=" " class="dashboard-heading">

                       <?php
                       if (isset($_SESSION['ru_name'])) 
                       {   

                        echo " <section>      
                        <p style='font-size:70px;color:black'>Welcome <b>".$_SESSION['ru_name']."</b>.</p>
                        <br></section>";


                        $REditorid = $_SESSION['ru_id'];

                        $sql = "SELECT Restaurant_ID,Image, RName, Restaurant_info, Address, Contact_No, Email FROM restaurant WHERE REditor_ID = $REditorid";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0)
                        {
                            if ($row = mysqli_fetch_assoc($result)) 
                            {



                            }
                        }
                    }
                    ?>
                    <?php 
                    if (isset($row['RName']))
                    {  
                    ?>
                    <h2><?= $row['RName'] ?>'s<span> Profile</span></h2>
                    <?php 
                       }
                     ?>
                </div><!-- end dashboard-heading -->

                <div class="dashboard-wrapper">
                 <div class="row">



                     <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                         <h2 class="dash-content-title">Restaurant</h2>
                         <div class="panel panel-default">
                             <div class="panel-heading">
                                 <!-- tab profile edit analytics -->
                                 <div style="padding-top: 10px;padding-bottom: 10px;">
                                    <ul class="nav nav-pills nav-justified" style="font-size: 20px;">
                                  <?php 
                    if (isset($row['Restaurant_ID']))
                    {  
                    ?> <li class="active"><a data-toggle="tab" href="#Profile">Profile</a></li>
<?php 
} ?>

             <?php 
                    if (!isset($row['Restaurant_ID']))
                    {  
                    ?>
                                      <li class="active"><a  data-toggle="tab" href="#Create">Create Restaurant</a></li>

                                      <?php 
}
else
{
   echo '<li ><a data-toggle="tab" href="#Edit">Edit</a></li>';
} ?>
                                      <?php 
                    if (isset($row['Restaurant_ID']))
                    {  
                    ?> <li><a data-toggle="tab" href="#Analytics">Statistics</a></li>
                    <?php 
                    } ?>
                                  </ul>
                              </div>
                          </div>
                          <div class="tab-content">
                             <div id="Profile" class="tab-pane fade <?php if (isset($row['Restaurant_ID']))
                    {   ?> in active  <?php } ?>">
                                <div class="panel-body">
                                 <div class="row">
                                     <div class="col-sm-5 col-md-4 user-img">
                                         <img src="uploads/restaurant/<?=$row['Image']?>" class="img-responsive" alt="restaurant-img" />

                                     </div><!-- end columns -->

                                     <div class="col-sm-7 col-md-8  user-detail">
                                         <ul class="list-unstyled">
                                             <li><span>Restarant Name:</span> <?=$row['RName']?></li>
                                             <li><span>Address:</span> <?=$row['Address']?> </li>
                                             <li><span>Phone:</span> <?=$row['Contact_No']?> </li>
                                             <li><span>Email:</span>  <?=$row['Email']?> </li>
                                         </ul>      
                                     </div><!-- end columns -->

                                     <div class="col-sm-12 user-desc">
                                      <h4>About Restaurant</h4>
                                      <p><?=$row['Restaurant_info']?></p>

                                  </div><!-- end columns -->
                              </div><!-- end row -->
                          </div><!-- end panel-body -->
                      </div>

<div id="Edit" class="tab-pane fade <?php if (isset($row['Restaurant_ID'])){   ?>  <?php } ?>">

                          <div class="custom-form custom-form-fields" style="background-color: #FFFFFF;padding-top: 0;">
                            <form action="php.inc/restaurant.inc.php" method="POST" enctype="multipart/form-data">
                               <div class="col-md-12">
                                <div class="col-md-6" style="padding-top: 20px;padding-bottom: 20px;margin-left: 0;">
                                  <div class="picture-container" style="border: 1px solid lightgrey;padding: 5px;">
                                    <div class="picture">
                                       <!--  <img src="images/resDefault.png" class="picture-src" id="wizardPicturePreview"/> -->
                                        <!-- <input type="file" name="Restaurantimg" required> -->
                                        <!-- <div class="image-upload"> <label for="file-input"> 
                                            <img class="picture-src" id="blah" src="images/resDefault.png" style="width:360px !important;height: 250px;" /> </label> 
                                            <input onchange="readURL(this);" style="display: none;" id="file-input" type="file" name="Restaurantimg"/> 
                                        </div> -->
                                        <div class="picture">
                                          <img style="width: 170px; height: 170px;" src="images/resDefault.png" class="picture-src" id="wizardPicturePreview"/>
                                          <input type="file" name="Restaurantimg" value="Upload Image" required>
                                      </div>
                                    </div>  
                                </div>
                            </div>

                            <div class="col-md-6" style="padding-top: 50px;">
                             <div class="form-group">
                              <input type="text" class="form-control" placeholder="Restaurant Name" name="restname" required style="background-color: #F2F2F2;" autofocus/>
                              <span><i class="fa fa-user"></i></span>
                          </div>
                          <div class="form-group">  
                              <textarea class="form-control" name="restinfo" placeholder="Restaurant Info" style="background-color: #F2F2F2;" required></textarea>
                              <span><i class="fa fa-info-circle"></i></span>
                          </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" name="restaddress" class="form-control" placeholder="Address"  required style="background-color: #F2F2F2;"/>
                          <span><i class="fa fa-home"></i></span>
                      </div>
                      <div class="form-group">
                          <input type="tel" name="contactno" class="form-control" placeholder="Contact No." pattern="[0-9]{10}" required style="background-color: #F2F2F2;"/>
                          <span><i class="fa fa-phone"></i></span>
                      </div> 
                      <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"  required style="background-color: #F2F2F2;"/>
                          <span><i class="fa fa-envelope"></i></span>
                      </div>
                                                        <!-- <?php 
                                                        // echo $_SESSION['ru_email']." ".$_SESSION['ru_id']." ".$_SESSION['ru_name'];
                                                        ?>-->


                                                    </div>

                                                </div>  
                                                <button class="btn btn-success " type="submit" name="submit" style="margin-right:  23px;width: 125px;border-radius: 7px;">Edit</button>

                                            </form>
                                        </div>

                                    </div>

                      <div id="Create" class="tab-pane fade <?php if (!isset($row['Restaurant_ID'])){   ?> in active  <?php } ?>">

                          <div class="custom-form custom-form-fields" style="background-color: #FFFFFF;padding-top: 0;">
                            <form action="php.inc/restaurant.inc.php" method="POST" enctype="multipart/form-data">
                               <div class="col-md-12">
                                <div class="col-md-6" style="padding-top: 20px;padding-bottom: 20px;margin-left: 0;">
                                  <div class="picture-container" style="border: 1px solid lightgrey;padding: 5px;">
                                    <div class="picture">
                                       <!--  <img src="images/resDefault.png" class="picture-src" id="wizardPicturePreview"/> -->
                                        <!-- <input type="file" name="Restaurantimg" required> -->
                                        <!-- <div class="image-upload"> <label for="file-input"> 
                                            <img class="picture-src" id="blahh" src="images/resDefault.png" style="width:360px !important;height: 250px;" /> </label> 
                                            <input onchange="readURL(this);" style="display: none;" id="file-input" type="file" name="Restaurantimg"/> 

                                        </div> -->
                                        <div class="picture">
                                          <img style="width: 170px; height: 170px;" src="images/resDefault.png" class="picture-src" id="wizardPicturePreview"/>
                                          <input type="file" name="Restaurantimg" value="Upload Image" required>
                                      </div>
                                    </div>  
                                </div>
                            </div>

                            <div class="col-md-6" style="padding-top: 50px;">
                             <div class="form-group">
                              <input type="text" class="form-control" placeholder="Restaurant Name" name="restname" required style="background-color: #F2F2F2;" autofocus/>
                              <span><i class="fa fa-user"></i></span>
                          </div>
                          <div class="form-group">	
                              <textarea class="form-control" name="restinfo" placeholder="Restaurant Info" style="background-color: #F2F2F2;" required></textarea>
                              <span><i class="fa fa-info-circle"></i></span>
                          </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" name="restaddress" class="form-control" placeholder="Address"  required style="background-color: #F2F2F2;"/>
                          <span><i class="fa fa-home"></i></span>
                      </div>
                      <div class="form-group">
                          <input type="tel" name="contactno" class="form-control" placeholder="Contact No." pattern="[0-9]{10}" required style="background-color: #F2F2F2;"/>
                          <span><i class="fa fa-phone"></i></span>
                      </div> 
                      <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"  required style="background-color: #F2F2F2;"/>
                          <span><i class="fa fa-envelope"></i></span>
                      </div>
                                                        <!-- <?php 
                                                        // echo $_SESSION['ru_email']." ".$_SESSION['ru_id']." ".$_SESSION['ru_name'];
                                                        ?>-->


                                                    </div>

                                                </div>  
                                                <button class="btn btn-success " type="submit" name="submit" style="margin-right:  23px;width: 125px;border-radius: 7px;">Create</button>

                                            </form>
                                        </div>

                                    </div>


                                   
                                    <div id="Analytics" class="tab-pane fade <?php if (isset($row['Restaurant_ID']))
                    {   ?>   <?php } ?>">
                     <?php 
                                    $r_id=$row['Restaurant_ID'];
                                        // $sql = "SELECT * FROM review WHERE ";
                                        // $result = mysqli_query($conn, $sql);
                                        // $reviewcount = mysqli_num_rows($result);

                                    $sql = "SELECT * FROM dish WHERE Restaurant_ID= $r_id";
                                    $result = mysqli_query($conn, $sql);
                                    $rcount = mysqli_num_rows($result); ?>
                                        <h3>Statistics</h3>
                                        <div class="container" >
                                            <div class="row">
                                                <div class="col-md-3" style="background-color: #00C0EF;">
                                                    <div style="font-size: 25px;background-color: #00C0EF;color: white;margin-bottom: 40px;">Restaurant Reviews <br> 2</div>
                                                </div>
                                                <div class="col-md-3" style="background-color: #00A65A;">
                                                    <div style="font-size: 25px;color: white;margin-bottom: 40px;">Restaurant Dishes <br> <?= $rcount ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end panel-detault -->

                    <!--  -->                                    
                </div>
            </div><!-- end columns -->


            <!-- Menu LIST -->
                            <?php 
if (isset($row['Restaurant_ID']))
                    {
                         ?>
            <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content wishlist" style="padding-top: 50px;padding-bottom: 60px;">
                <h2 class="dash-content-title">Menu</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>

                            <tr class="list-content">
                                <td class="list-img wishlist-img"><img src="images/addimg.jpg" class="img-responsive" alt="wishlist-img" /></td>
                                <td class="list-text wishlist-text">
                                    <h3 style="padding-top: 35px; font-size: 30px;">Add Dish    
                                    </h3>
                                </td>
                                <td class="wishlist-btn hidden-sm">
                                    <div class="pull-right" style="padding-right: 25px; padding-top: 45px;">
                                        <input onclick="document.getElementById('modal-wrapper').style.display='block'"  class="btn btn-success btn-lg" type="button" name="add" value="Add Dish" style="font-size: 19px; margin-right: 5px; border-radius: 6px;outline: none;">
                                    </div>
                                </td>

                            </tr>
                            <?php 
} ?>
<?php 
if (isset($row['Restaurant_ID']))
                    {
                         ?>
                            <?php
                            $Reditorid = $_SESSION['ru_id'];
                            $sqlRestid = "SELECT Restaurant_ID FROM restaurant WHERE REditor_ID = $Reditorid";
                            $result = mysqli_query($conn, $sqlRestid);
                            if ($row = mysqli_fetch_assoc($result)) 
                            {
                                $Restid=$row['Restaurant_ID'];
                            }

                            $sql = "SELECT Dish_ID,Dish_image, Dish_name, Dish_info, Dish_price FROM dish WHERE Restaurant_ID = $Restid";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0)
                            {
                                while ($row = mysqli_fetch_assoc($result)) 
                                {


                                    ?>
                                    <tr class="list-content" style="width: 850px;">
                                        <td class="list-img wishlist-img "><img src="uploads/dish/<?=$row['Dish_image']?>" class="img-responsive" alt="wishlist-img" /></td>
                                        <td class="list-text wishlist-text">
                                            <h3><?=$row['Dish_name']?>
                                            <span class="rating">
                                                <i class="fa fa-star orange"></i>
                                                <i class="fa fa-star orange"></i>
                                                <i class="fa fa-star orange"></i>
                                                <i class="fa fa-star orange"></i>
                                                <i class="fa fa-star lightgrey"></i>
                                            </span>
                                        </h3>
                                        <p><?=$row['Dish_info']?></p>
                                        <p class="order"><span>Dish Price:</span> <?=$row['Dish_price']?></p>
                                        <a href="dish?id=<?=$row['Dish_ID']?>" style="padding-left: 15px; margin-top: 45px; border-radius: 6px;font-size: 17px;outline: none;" class="btn btn-warning">View Dish</a>
                                    </td>

    

                                    <?php
                                    if (isset($_SESSION['ru_name'])) 
                                    {   
                                    ?>
                                        <td class="wishlist-btn hidden-sm">
                                        <form action="" method="">
                                        <input onclick="document.getElementById('modal-edit').style.display='block'" class="btn btn-primary" type="button"  name="Edit" style="border-radius: 6px;font-size: 17px;width: 106.99px; outline: none;" value="Edit">
                                        <br><br>
                                        <input class="btn btn-danger" type="button" name="remove" style="border-radius: 6px;font-size: 17px;outline: none;" value="Remove">
                                        </form>
                                        </td>
                                        <?php 
                                    }
                                    ?>

                                </tr>
                                <?php 
                            }
                        }
                        ?>
<?php 
} ?>
                    </tbody>
                </table>
            </div><!-- end table-responsive -->
        </div><!-- end columns -->

        <div class="container" align="center">
          <div class="container">
            <div id="modal-wrapper" class="modal">
              <form action="php.inc/dish.inc.php" method="POST" class="modal-content animate createRec" enctype="multipart/form-data">
                <h1 style="margin-bottom: 20px;padding-top: 20px;">Add Dish</h1>
                <div class="imgcontainer">
                  <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close" style="padding-left: 3px;">&times;</span>
              </div>

              <div class="col-sm-12">

                 <div class="picture-container"  style="width: 250px;border: 1px solid lightgrey;padding: 5px;margin-bottom: 5px;">
                  <div class="picture">
                      <img  style="width: 220px;height: 180px;" src="images/dishdefault2.jpg" class="picture-src" id="wizardPicturePreview"/>
                      <input type="file" name="dishImage" required>
                  </div>
                  <h6>Choose Picture</h6>
              </div>

          </div>

          <div style="padding-top: 20px;">
              <div class="form-group formcon candyform">
                <input type="text" placeholder="Dish Name" class="form-control form-control-lg" style="font-size:22px;" name="dishName" required autofocus>

            </div>
            <div class="form-group formcon candyform">
                <input type="text"  placeholder="Dish Information" class="form-control form-control-lg" style="font-size:22px;" name="dishInfo" required>
            </div>
            <div class="form-group formcon candyform">
                <input type="text" placeholder="Dish Price" class="form-control form-control-lg" style="font-size:22px;" name="dishPrice" required>
            </div>     
            <div class="pull-right" style="padding-right: 100px; padding-top: 10px;">
                <input style="border-radius: 6px; font-size: 19px;outline: none;" class="btn btn-success btn-lg" type="submit" name="submitdish" value="Add">
            </div>
        </div>
    </form>
</div>
</div>
</div>			

<div class="container" align="center">
          <div class="container">
            <div id="modal-edit" class="modal">
              <form action="php.inc/dish.inc.php" method="POST" class="modal-content animate createRec" enctype="multipart/form-data">
                <h1 style="margin-bottom: 40px;padding-top: 20px;">Edit Dish</h1>
                <div class="imgcontainer">
                  <span onclick="document.getElementById('modal-edit').style.display='none'" class="close" title="Close" style="padding-left: 3px;">&times;</span>
              </div>

              <div class="col-sm-12">

                 <div class="picture-container"  style="width: 250px;border: 1px solid lightgrey;padding: 5px;margin-bottom: 40px;">
                  <div class="picture">
                      <img  style="width: 220px;height: 180px;" src="images/dishdefault2.jpg" class="picture-src" id="wizardPicturePreview"/>
                      <input type="file" name="dishImage" required>
                  </div>
                  <h6>Choose Picture</h6>
              </div>

          </div>

          <div style="padding-top: 40px;">

            <div class="form-group formcon candyform">
                <input type="text" placeholder="Dish Price" class="form-control form-control-lg" style="font-size:22px;" name="dishPrice" required>
            </div>     
            <div class="pull-right" style="padding-right: 100px; padding-top: 10px;">
                <input style="border-radius: 6px; font-size: 19px;outline: none;" class="btn btn-success btn-lg" type="submit" name="submitdish" value="Edit">
            </div>
        </div>
    </form>
</div>
</div>
</div>          


</div><!-- end row -->
</div><!-- end dashboard-wrapper -->
</div><!-- end columns -->
</div> <!-- end row -->
</div> <!-- end dashboard-wrapper -->
</section><!-- end innerpage-wrapper -->



<?php
include 'footer.php';
?>