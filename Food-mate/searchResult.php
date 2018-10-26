<?php
session_start();
include 'header.php';
include 'php.inc/dbconn.php';
?>

<title>Food-mate - Search Results</title>
<!--===================== PAGE-COVER ====================-->
        <section class="page-cover back-size" id="cover-car-search">
            <div class="container">
                <div class="row" >
                    <div class="col-sm-12">
                      <h1 class="page-title">Search Results</h1>
                        <ul class="breadcrumb">
                            <li><a href="index">Home</a></li>
                            <li class="active">Search Results</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->




<section class="innerpage-wrapper" style="padding-top: 0;">
    <div id="dashboard" class="innerpage-section-padding" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >

                            <div class="dashboard-heading">
                           <h2>Search <span>Results</span></h2>
                    </div><!-- end dashboard-heading -->

<!--                     <script type="text/javascript">

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<div class="row" style=" margin-top: 20px; margin-left: 20px;" >
  <div class="input-group">
          <input id="myInput" type="text" class="form-control" style="height: 40px;font-size: 20px;border-radius: 8px;" placeholder="Search Restaurants..." >
        </div>
  
</div> -->

<!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
          <div id="search-result-page" class="innerpage-section-padding">
            <div class="container">
              <div class="row">
                        
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-side">
                        <div class="row">
                             <?php
                             if(isset($_POST['submitsearch']))
                             {
                             	$search = mysqli_real_escape_string($conn, $_POST['search']);

                             	$sql = "SELECT * FROM restaurant WHERE RName LIKE '%$search%' ";
                             	
                             	$result = mysqli_query($conn, $sql);

                             	$queryResult = mysqli_num_rows($result);
                             	if ($queryResult>1) 
                             	{
                             		echo $queryResult." Results found!";
                             	}
                             	else if ($queryResult>0) 
                             	{
                             		echo $queryResult." Result found! <br><br><br>";
                             	}
                             	
                             	if ($queryResult>0) 
                             	{
                             		while ($row = mysqli_fetch_assoc($result)) 
                             		{
                             			?>

                             			<div class="col-sm-6 col-md-4 col-lg-3" id="myTable" >
                                    <div class="grid-block main-block cr-grid-block" id="myTable">
                                      <div class="main-img cr-grid-img" id="myTable">
                                          <a href="#">
                                          <img src="uploads/restaurant/<?=$row['Image']?>" style="height: 262.5px;" class="img-responsive" alt="<?=$row['RName']?>-image" />
                                            </a>

                                      </div><!-- end cr-grid-img -->
                                        
                                         <div class="block-info cr-grid-info" style="height: 280px;">
                                          <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star lightgrey"></i></span>
                                            </div><!-- end rating -->
                                            
                                          <h3 class="block-title"><a href="#"><?=$row['RName']?></a></h3>
                                            <p class="block-minor"><?=$row['Restaurant_info']?></p>
                                            <ul class="list-unstyled list-inline car-features">
                                              <li><span><?=$row['Address']?></span></li>
                                                <li><span><?=$row['Contact_No']?></span></li>
                                            </ul>
                                            <div class="grid-btn">
                                              <a href="restaurantUser?id=<?=$row['Restaurant_ID']?>" style="border-radius: 5px;margin-top: 50px;" class="btn btn-success btn-block btn-lg">View</a>
                                            </div><!-- end grid-btn -->
                                         </div><!-- end cr-grid-info -->
                                    </div><!-- end cr-grid-block -->

                                </div><!-- end columns -->
                                <?php  
                             		}
                             	}
                             	else
                             	{
                             		echo "There are no results match your search!";
                             	}
                             }
                             	else
                             	{
                             		echo "Error search";
                             	}

                             
                             ?>


                            </div><!-- end row -->
                        </div>
              </div>
            </div>
          </div>
        </section>

</div>
</div>
</div>
</div>
</section>

<?php
include 'footer.php';
?>