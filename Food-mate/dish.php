<?php
session_start();
include 'header.php';
include_once 'php.inc/dbconn.php';
?>

<title>Food-mate - Dish</title>
<section class="page-cover dashboard" style="height: 125px;">
    <div class="container" style="padding-top: 50px;">
        <div class="row">
            <div class="col-sm-12">
               <h1 class="page-title">Dish</h1>
               <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><a href="restaurantUser.php">Restaurant</a></li>
                <li class="active">Dish</li>
            </ul>
        </div><!-- end columns -->
    </div><!-- end row -->
</div><!-- end container -->
</section><!-- end page-cover -->

<section class="innerpage-wrapper">
   <div id="dashboard" class="innerpage-section-padding" style="padding-top: 20px;padding-bottom: 0;">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <div class="dashboard-heading">

            <h2>Dish <span>Profile</span></h2>
        </div><!-- end dashboard-heading -->

        <div class="dashboard-wrapper">
           <div class="row">
               <?php
               $id = intval($_GET['id']);
               $_SESSION['Dishid'] = $id;

               $sql = "SELECT Dish_image, Dish_name, Dish_info, Dish_price FROM dish WHERE Dish_ID = $id";
               $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result)>0)
               {
                while ($row = mysqli_fetch_assoc($result)) 
                {


                    ?>
                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Dish Detail</h4></div>
                            <div class="panel-body">
                               <div class="row">
                                   <div class="col-sm-5 col-md-4 user-img">
                                    <img src="uploads/dish/<?=$row['Dish_image']?>" class="img-responsive" alt="user-img" />
                                </div><!-- end columns -->

                                <div class="col-sm-7 col-md-8  user-detail">
                                    <ul class="list-unstyled">
                                        <li><span>Dish Name:</span> <?=$row['Dish_name']?></li>
                                        <li><span>Dish Price</span> <?=$row['Dish_price']?></li>
                                    </ul>

                                </div><!-- end columns -->

                                <div class="col-sm-12 user-desc">
                                   <h4>About this dish</h4>
                                   <p><?=$row['Dish_info']?></p>

                               </div><!-- end columns -->
                           </div><!-- end row -->

                       </div><!-- end panel-body -->
                   </div><!-- end panel-detault -->
               </div><!-- end columns -->
               <?php 
           }
       }
       ?>

   </div><!-- end row -->
</div><!-- end dashboard-wrapper -->
</div><!-- end columns -->
</div><!-- end row -->
</div><!-- end container -->          
</div><!-- end dashboard -->
</section><!-- end innerpage-wrapper -->


<section class="innerpage-wrapper">
   <div id="blog-details" class="innerpage-section-padding" style="padding-top: 0;">
      <div class="container">
         <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
            <div class="space-right">
               <div id="comments">

               </div><!-- end comments -->
                 <?php
            if (isset($_SESSION['u_name'])) 
            { 

                echo '<div id="comment-form">
                <div class="innerpage-heading">
                <h1>Add Review</h1>
                </div><!-- end innerpage-heading -->

                <form method="POST" action="php.inc/review.inc.php">
                <div class="form-group">
                <input type="hidden" name="username" value="">
                <textarea class="form-control input-lg" name="review" rows="5" placeholder="Your Review" required></textarea>
                </div>

                <button class="btn btn-success pull-right" style="border-radius: 7px;margin-top: 0;" name="submit" >Submit</button>
                </form>
                </div><br><br><br><br><!-- end comment-form -->';
            }
            ?>

               <?php

               $sql = "SELECT User_ID, username, Comment, Posted_date FROM review WHERE Dish_ID = $id";
               $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result)>0)
               {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                                                        // $row['User_ID'] = $userid;

                    ?>
                    <div class="comment-block">
                        <div class="user-img">
                            <img src="images/commenter-4.jpg" class="img-responsive" alt="user-img" />
                        </div><!-- end user-img -->

                        <div class="user-text" style="padding-top: 20px;">
                            <ul class="list-inline list-unstyled">
                                <li class="user-name"><?=$row['username']?></li>
                                <li class="date"><?=$row['Posted_date']?></li>
                            </ul>
                            <p><?=$row['Comment']?></p>
                        </div><!-- end user-text -->
                    </div><!-- end comment-block -->

                    <?php
                }
            }
            ?>


          


        </div>
    </div>
</div>
</div>
</div>
</section>

<?php
include 'footer.php';
?>