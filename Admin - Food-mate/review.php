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
      <h1>
        Reviews
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reviews</li>
      </ol>
    </section>
       <!-- /.content -->

              <script type="text/javascript">

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<div class="row" style=" margin-top: 20px; margin-left: 20px;" >
  <div class="input-group">
          <input id="myInput" type="text" class="form-control" style="height: 40px;font-size: 20px;border-radius: 8px;" placeholder="Search..." >
        </div>
  
</div>

<div class="container" style="margin: 0;">
         <section style="margin-top: 40px;">
      <table class="table table-hover table-bordered" align="center" border="1px" style="width:1300px; line-height:60px;">
        <tr class="danger">
          <th> Review ID </th>
          <th> User ID </th>
          <th> User Name </th>
          <th> Dish ID </th>
          <th> Comment </th>
          <th> Posted Date </th>
        </tr>
        <?php
        $sql = "SELECT Review_ID, User_ID, username, Dish_ID, Comment, Posted_date FROM review";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
        {
          while ($row = mysqli_fetch_assoc($result)) 
          {
           
          
        ?>
        <tbody id="myTable" align="center">
            <tr>
                <td><?=$row['Review_ID']?></td>
                <td><?=$row['User_ID']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['Dish_ID']?></td>
                <td><?=$row['Comment']?></td>
                <td><?=$row['Posted_date']?></td>
            </tr> 
          </tbody>
        <?php
          }
        }
        ?>      
    </table>
  </section>
</div>
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