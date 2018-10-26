<?php
session_start();
include 'header.php';
include 'php.inc/dbconn.php';
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
				<li class="active">Restaurant db retrieve name</li>
			</ul>
		</div><!-- end columns -->
	</div><!-- end row -->
</div><!-- end container -->
</section><!-- end page-cover -->
<?php
$id = intval($_GET['id']);


$sql = "SELECT Image, RName, Restaurant_info, Address, Contact_No, Email FROM restaurant WHERE Restaurant_ID=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0)
{
	if ($row = mysqli_fetch_assoc($result)) 
	{
		?>
		<!--===== INNERPAGE-WRAPPER ====-->
		<section class="innerpage-wrapper">
			<div id="dashboard" class="innerpage-section-padding" style="padding-top: 20px;">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dashboard-heading">
								<h2><?=$row['RName']?>'s <span> Profile</span></h2>
							</div><!-- end dashboard-heading -->

							<div class="dashboard-wrapper">
								<div class="row">                                  
									<div class="col-xs-12 col-sm-10 col-md-10 dashboard-content user-profile">
										<div class="panel panel-default">
											<div class="panel-heading"><h4>Restaurant Details</h4></div>
											<div class="panel-body">
												<div class="row">
													<div class="col-sm-5 col-md-4 user-img">
														<img src=uploads/restaurant/<?=$row['Image']?> class="img-responsive" alt="restaurant-img" />
													</div><!-- end columns -->

													<div class="col-sm-7 col-md-8  user-detail">
														<ul class="list-unstyled">
															<li><span>Restarant Name:</span> <?=$row['RName']?></li>
															<li><span>Address:</span> <?=$row['Address']?></li>
															<li><span>Phone:</span> <?=$row['Contact_No']?></li>
															<li><span>Email:</span> <?=$row['Email']?></li>
														</ul>      
													</div><!-- end columns -->

													<div class="col-sm-12 user-desc">
														<h4>About this restaurant</h4>
														<p><?=$row['Restaurant_info']?></p>

													</div><!-- end columns -->
												</div><!-- end row -->
											</div><!-- end panel-body -->
										</div><!-- end panel-detault -->
									</div><!-- end columns -->

								</div><!-- end row -->
							</div><!-- end dashboard-wrapper -->
							<?php 
						}
					}
					?>
				</div><!-- end columns -->




				<!-- Menu LIST -->
				<div class="col-xs-12 col-sm-10 col-md-10 dashboard-content wishlist" style="padding-top: 50px;padding-bottom: 60px;">
					<h2 class="dash-content-title">Menu</h2>
					<div class="table-responsive">
						<table class="table table-hover">
							<tbody>

								<?php
                                                        // $Reditorid = $_SESSION['ru_id'];
                                                        // $sqlRestid = "SELECT Restaurant_ID FROM restaurant WHERE REditor_ID = $Reditorid";
                                                        // $result = mysqli_query($conn, $sqlRestid);
                                                        // if ($row = mysqli_fetch_assoc($result)) 
                                                        // {
                                                        //     $Restid=$row['Restaurant_ID'];
                                                        // }

								$sql = "SELECT Dish_ID,Dish_image, Dish_name, Dish_info, Dish_price FROM dish WHERE Restaurant_ID = $id";
								$result = mysqli_query($conn, $sql);
								if(mysqli_num_rows($result)>0)
								{
									while ($row = mysqli_fetch_assoc($result)) 
									{


										?>
										<tr class="list-content" style="width: 850px;">
											<td class="list-img wishlist-img"><img src="uploads/dish/<?=$row['Dish_image']?>" class="img-responsive" alt="wishlist-img" /></td>
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

										</td>

										<td class="wishlist-btn hidden-sm">
											<div class="grid-btn">
												<a href="dish?id=<?=$row['Dish_ID']?>" style="padding-left: 15px; margin-top: 45px; border-radius: 6px;font-size: 17px;outline: none;" class="btn btn-warning">View Dish</a>
											</div>
										</td>


									</tr>
									<?php 
								}
							}
							?>

						</tbody>
					</table>
				</div><!-- end table-responsive -->
			</div><!-- end columns -->
		</div><!-- end row -->
	</div><!-- end container -->          
</div><!-- end dashboard -->
</section><!-- end innerpage-wrapper -->








<?php
include 'footer.php';
?>