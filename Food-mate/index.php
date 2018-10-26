<?php
session_start();
include 'header.php';
include_once 'php.inc/dbconn.php';
?>
<title>Food-mate - Home</title>
<!--========================= FLEX SLIDER =====================-->
<section class="flexslider-container" id="flexslider-container-1">
    <div class="flexslider slider" id="slider-1">

        <ul class="slides"> 

            <li class="item-1" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(images/wallp.jpg) 50% 0%;background-size:cover;height:100%;">
            </li>
            <li class="item-2" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(images/unnamed.jpg) 50% 0%;background-size:cover;height:100%;">
            </li>    	                
            <li class="item-3" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(images/bitcoin-pizza.jpg) 50% 0%;background-size:cover;height:100%;">                    
            </li><!-- end item -->         
        </ul>

    </div><!-- end slider -->

</section><!-- end flexslider-container -->

<section>
    <div class="featurette">
     <div class="featurette-inner text-center">
      <form action="searchResult" method="POST" role="form" class="search has-button" style="padding-bottom: 0;">
       <div class="form-group">
        <input type="text" placeholder="Search Restaurants.." name="search" class="form-control form-control-lg">
        <input class="btn btn-lg btn-success" type="submit" value="Search" name="submitsearch" style="border-radius: 7px;padding-left: 15px; outline: none;height: 46px;width: 95px;font-size: 17px;">
    </div>
    <!-- /form-group -->
</form>
<!-- /.max-width on this form -->
<input onclick="location.href = 'restaurantList';" type="button" id="myButton" name="restaurantlist" class="btn btn-success btn-lg" value="Restaurants" style="outline: none;border-radius: 7px; margin-bottom: 30px;">
<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "restaurantList";
    };
</script>

</div>
<!-- /.featurette-inner (display:table-cell) -->

</div>
<!-- /.featurette (display:table) -->
</section>

<?php
if (isset($_SESSION['u_name'])) 
{   

    echo '"
    <section id="hotel-offers" >
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
    <h2>
    Welcome <b>'.$_SESSION['u_name'].'</b>..!! </h2>
    <h1>Opinion Mining Results</h1>
    </div>
    </div>
    </div>
    </section>"';
    ?>
    <!--=============== HOTEL OFFERS ===============-->
    <section id="hotel-offers" class="section-padding">
        <hr style="width:80%;border: 2px solid lightgray;">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <div class="page-heading">
                        <h2 style="padding-top:50px;">Suggested Restaurant</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                       <?php
                       $sql = "SELECT Image, RName, Restaurant_info FROM restaurant";
                       $result = mysqli_query($conn, $sql);
                       if(mysqli_num_rows($result)>0)
                       {
                          while ($row = mysqli_fetch_assoc($result)) 
                          {


                            ?>
                            
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                        <a href="#">
                                            <img src="uploads/restaurant/<?=$row['Image']?>" style="height: 300px;width: 300px;" class="img-responsive" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">

                                                <li class="rating">
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->
                                    
                                    <div class="main-info hotel-info">

                                        <div class="main-title hotel-title">
                                            <a href="#"><?=$row['RName']?></a>
                                        </div><!-- end hotel-title -->
                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                            <?php 
                        }
                    }
                    ?>


                </div><!-- end owl-hotel-offers -->

                <div class="view-all text-center">
                    <a href="restaurantList" class="btn btn-orange">View All</a>
                </div><!-- end view-all -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end hotel-offers -->
<hr style="width:80%;border: 2px solid lightgray;">

<?php 
}
?>






<!--======================= BEST FEATURES =====================-->
<section id="best-features" class="banner-padding black-features">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6">
                <div class="b-feature-block">
                    <span><i class="fa fa-dollar"></i></span>
                    <h3>Restaurants</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                </div><!-- end b-feature-block -->
            </div><!-- end columns -->

            <div class="col-sm-8 col-md-6">
                <div class="b-feature-block">
                    <span><i class="fa fa-lock"></i></span>
                    <h3>Dishes</h3>
                    <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                </div><!-- end b-feature-block -->
            </div><!-- end columns -->

        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end best-features --> 

<?php
include 'footer.php';
?>