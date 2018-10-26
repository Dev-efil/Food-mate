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
        Restaurant Managers
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Restaurant Managers</li>
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
          <th> Restaurant Editor ID </th>
          <th> Profile Picture </th>
          <th> Email </th>
          <th> Contact Number </th>
          <th> Username </th>
          <th> Action </th>
        </tr>
        <?php
        
        $sql = "SELECT REditor_ID, REditor_profile_pic, Email, REditorContact_No, User_name,Status FROM  restauranteditor";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
        {
          while ($row = mysqli_fetch_assoc($result)) 
          {
            // $_SESSION['re_id'] = $row['REditor_ID'];
            // echo $_SESSION['re_id'];
        ?>
        <tbody id="myTable" align="center">
            <tr>
                <td><?=$row['REditor_ID']?></td>
                <td><?=$row['REditor_profile_pic']?></td>
                <td><?=$row['Email']?></td>
                <td><?=$row['REditorContact_No']?></td>
                <td><?=$row['User_name']?></td>
                <td>
                <?php
                
                  $status=$row['Status'];
                  if ($status == "Active") 
                  {
                    ?>
                    <form method="POST" action="status.inc.php">
                     

                    <input type="checkbox" name="status" value="Active" data-on="Active" data-off="Deactive" data-toggle="toggle" checked>
                    <?php
                  }

                  else if ($status == "Deactive")
                  {
                    ?>
                    <input type="checkbox" name="status" value="Deactive" data-on="Active" data-off="Deactive" data-toggle="toggle">
                    </form>
                    <?php
                  } 
                  ?>
                </td>
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
    


<!--     <script>
    $(document).ready(function() {
        var url = window.location; 
        var element = $('ul .sidebar-menu a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0; }).parent().addClass('active');
        if (element.is('li')) { 
             element.addClass('active').parent().parent('li').addClass('active')
         }
    });
    </script> -->
<!-- <script type="text/javascript">
  $(function(){
    $('ul .sidebar-menu li').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
    $('ul .sidebar-menu li').click(function(){
      $(this).parent().addClass('active').siblings().removeClass('active')  
    })
  })
  </script> -->
<?php
include 'footer.php';
?>