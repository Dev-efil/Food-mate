<?php
session_start();
if (!isset($_SESSION['a_uname'])) 
{  
 header("location: login");
}
include 'header.php';

include 'dbconnection.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<div style="font-size: 45px;">
Dashboard
</div>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
       <!-- /.content -->
<?php 
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

$sql = "SELECT * FROM restaurant";
$result = mysqli_query($conn, $sql);
$rcount = mysqli_num_rows($result);

$sql = "SELECT * FROM restauranteditor";
$result = mysqli_query($conn, $sql);
$recount = mysqli_num_rows($result);

$sql = "SELECT * FROM review";
$result = mysqli_query($conn, $sql);
$reviewcount = mysqli_num_rows($result);
 ?>
  <section class="content" style="padding-top: 70px;">
          <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="height:120px; ">
            <div class="inner">
              <h3><?= $count ?></h3>

              <p style="font-size: 20px;">Number of Food-mate Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" style="height:120px;">
            <div class="inner">
              <h3><?= $rcount ?></h3>

              <p style="font-size: 20px;">Number of Restaurants</p>
            </div>
            <div class="icon">
              <i class="ion ion-pizza"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" style="height:120px;">
            <div class="inner">
              <h3><?= $recount ?></h3>

              <p style="font-size: 20px;">Number of Restaurant Editors(Managers)</p>
            </div>
            <div class="icon">
              <i class="ion ion-man"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="height:120px;">
            <div class="inner">
              <h3><?= $reviewcount ?></h3>

              <p style="font-size: 20px;">Number of Reviews</p>
            </div>
            <div class="icon">
              <i class="ion ion-chatbubbles"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
  </section>
  </div>


  <!-- /.content-wrapper -->
<!-- <div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover table-bordered">
    <thead>
      <tr class="danger">
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div> -->
<!-- <div class="container"> -->

<!-- </div> -->
    



<?php
include 'footer.php';
?>