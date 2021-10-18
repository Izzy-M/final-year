<?php
require('common/dbmanage.php');
session_start();
$user=$_SESSION['currentUser'];
$date=date('M_Y');
//the table is auto generated//

// up to there all the tables are created//
?><!DOCTYPE html>
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
  <scriptsrc="common/jqui.js"></script>
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
<div class="row" style="text-align:center !important;"><h2>Tea Inventory Application</h2></div>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row" style="float:right;margin-bottom:5px;">
            <form id="search">
            <input type="text" onkeyup="find(this.value)" autofocus id="searcharea" placeholder="Find Period"/>
          </form>
        </div>


          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>

                <tr>
                  <th>id</th>
                  <th>Day</th>
                  <th>Usercode</th>
                  <th>Buyer</th>
                  <th>Date bought</th>
                  <th>Bags</th>
                  <th>weight</th>
                </tr>
              </thead>
              <tbody id="testId">
                 <tr>
                  <?php
                  $table=date('M_Y');
$sql=$PDO->query("SELECT *FROM $table WHERE salercode='$user'");

foreach($sql->fetchAll() as $row){
$id=$row['id'];
$user=$row['salercode'];
$day=$row['day'];
$bags=$row['no_of_bags'];
$weight=$row['total_weight'];
$buyer=$row['buyer'];
$date=$row['date_bought'];


?>
               <td><?php echo $id;?></td>
                  <td><?php echo $day;?></td>
                  <td><?php echo $user;?></td>
                  <td><?php echo $buyer;?></td>
                  <td><?php echo $date ;?></td>
                  <td><?php echo $bags;?></td>
                  <td><?php echo $weight;?></td>
                </tr><?php };
$total=0;
$gettotal=$PDO->query("SELECT * FROM `$table` WHERE salercode='$user'");
foreach ($gettotal->fetchAll() as $weightrow) {
$amt=$weightrow['total_weight'];
$total+=$amt;}

?>


<tr><td colspan="6"><strong>Total</strong></td><td style="text-align:right;" ><b><?php echo $total;?> KGs</b></td></tr>


              </tbody>
            </table>
          </div>


        </div>

  <!-- End of Page Wrapper -->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
<script>
$(document).ready(
  function(){
      $('#totalsales').click(function(){location.replace('totalsales.php');})
      $("#home").click(function(){location.replace('home.php');})
      $("#tables").click(function(){location.replace('tables.php');})
      $('#sales').click(function(){location.replace('sales.php');})


  }

)

</script>
