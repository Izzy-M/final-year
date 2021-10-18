<?php require('common/dbmanage.php');
$table=date('M_Y');
$date=date('M_Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description"type="text/css" content="Tea POS"c>
  <meta name="author" content="Isaiah Morara">

  <title>Tea Inventory Application</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="inc/font/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">SALE RECORD<br>INVENTORY</div>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading"></div>
      <!-- Heading -->
      <div class="sidebar-heading">
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item" id="home">
        <div class="nav-link" style="cursor: pointer;">
          <i class="fa fa-home"></i>
          <span>Home</span></div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-cogs"></i>
          <span>Manage</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations:</h6><ul style="list-style-type:none;cursor:pointer;">
            <li onclick="add();"> Add record</li>
              <script> function add(){location.assign('addnew.php');
                  $('#page-top').fadeIn();}</script>
          </ol>
            <div class="collapse-divider"></div>

          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->

      <li class="nav-item" id="sales">
        <div class="nav-link" style="cursor: pointer;">
          <i class="fa fa-dollar"></i>
          <span>Sales</span></div>
      </li><li class="nav-item" id="totalsales">
        <div class="nav-link" style="cursor: pointer;">
          <i class="fa fa-calculator"></i>
          <span>Total Sales</span></div>
           </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item" id="tables">
        <a class="nav-link" style="cursor: pointer;">
          <i class="fa fa-table"></i>
          <span>Periods</span></a>
      </li>
   <!-- scripts that work on the side nav navigation-->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"><i class="fa fa-caret-left" style="color:white;"></i></button>
      </div>

    </ul>


    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">




        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tables</h1>

          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary">Sales recorded on <?php ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>id</th>
                      <th>Code</th>
                      <th>Month</th>
                      <th>Year</th>
                      <th>weight</th>

                    </tr>
                  </thead>
                  <tbody>
                     <tr>
                      <?php
                      $table=date('M_Y');
$sql=$PDO->query("SELECT *FROM period");
foreach($sql->fetchAll() as $row){
  $id=$row['id'];

  $user=$row['user'];
  $date=$row['month'];
  $year=$row['year'];
  $sale=$row['totalsale'];

 echo'<tr><td>'. $id.'</td><td>'.$user.'</td><td>'.$date.'</td><td>'.$year.'</td><td>'. $sale.'</td></tr/>';}
$table=date('M_Y');
$totalsale=0;
$total=$PDO->query("SELECT * FROM `period`");
foreach($total->fetchAll() as $row){
$sale=$row['totalsale'];
$totalsale+=$sale;
}
?>
<tr><td colspan="4"><strong>Total</strong></td><td style="text-align:right;" ><b><?php echo $totalsale;?> KGs</b></td></tr>


                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <center><div class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="dpdf">
        <i class="fas fa-file-pdf fa-sm text-white-50"></i> Generate pdf</div></center>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script srSc="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<script>
$(document).ready(
  function(){
      $('#totalsales').click(function(){location.replace('totalsales.php');})
      $("#home").click(function(){location.replace('home.php');})
      $("#tables").click(function(){location.replace('tables.php');})
      $('#sales').click(function(){location.replace('sales.php');})
      $('#dpdf').click(function(table){
        location.assign('pdf.php');
      })

  }
)
</script>
