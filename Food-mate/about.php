<?php
session_start();
include 'header.php';

?>

<!--================ PAGE-COVER =============-->
<section class="page-cover" id="cover-about-us">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="page-title">About Us</h1>
				<ul class="breadcrumb">
					<li><a href="index">Home</a></li>
					<li class="active">About Us</li>
				</ul>
			</div><!-- end columns -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end page-cover -->


<!--===== INNERPAGE-WRAPPER ====-->
<section class="innerpage-wrapper">
	<div id="about-content-2" class="innerpage-section-padding">
		<div class="container">
			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
					<div id="abt-cnt-2-img">
						<img src="images/Foodee.jpeg" class="img-responsive" alt="about-img" />
					</div><!-- end abt-cnt-2-img -->
				</div><!-- end columns -->

				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
					<div id="abt-cnt-2-text">
						<h2>Welcome to<span><span><img src="images/Logo.png" style="margin-bottom: 10px;" width="45" height="45"> Food</span>-mate</span></h2>
						<p>Lorem ipsum dolor sit amet, conse adipiscing elit. Curabitur metus felis, venenatis eu ultricies vel, vehicula eu urna. Phasellus eget augue id est fringilla feugiat id a tellus. Sed hendrerit quam sed ante euismod posuere ultricies. Vestibulum suscipit convallis purus ut mattis. In eget turpis eget urna molestie ultricies in sagittis nunc. Sed accumsan leo in mauris rhoncus volutpat. In eget turpis eget urna molestie ultricies in sagittis nunc. Sed accumsan leo in mauris rhoncus volutpat.</p>
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="abt-cnt-2-ftr">
									<span><i class="fa fa-diamond"></i></span>
									<h4>Restaurant Suggestions</h4>
								</div><!-- end abt-cnt-2-ftr -->
							</div><!-- end columns -->

							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="abt-cnt-2-ftr">
									<span><i class="fa fa-clock-o"></i></span>
									<h4>24/7 Availability</h4>
								</div><!-- end abt-cnt-2-ftr -->
							</div><!-- end columns -->

							<div class="col-xs-4 col-sm-4 col-md-4">
								<div class="abt-cnt-2-ftr">
									<span><i class="fa fa-star"></i></span>
									<h4>5 Star Rating</h4>
								</div><!-- end abt-cnt-2-ftr -->
							</div><!-- end columns -->
						</div><!-- end row -->
					</div><!-- end abt-cnt-2-text -->
				</div><!-- end columns -->

			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end about-content-2 -->

	<?php

	include 'footer.php';

	?>