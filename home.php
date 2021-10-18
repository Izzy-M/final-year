<?php
require('common/dbmanage.php');
session_start();
if(isset($_SESSION['currentUser'])){
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
  <meta name="description"type="text/css" content="Tea POS">
  <meta name="author" content="Isaiah Morara">

  <title>Tea Inventory Application</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="inc/font/css/font-awesome.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
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
<div class="row" style="text-align:center !important;"><h2>Tea Inventory Application</h2>


</div>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">MONTLY SALES(UP TO DATE)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
$table=date('M_Y');
$to=0;
$total=$PDO->query("SELECT * FROM `$table`");
foreach($total->fetchAll()as $row){
$to=+$row['total_weight'];
};
echo $to.' <strong>KGS</strong>'
?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
<?php echo strtoupper("Previous Month's Sale");
$sale=0;
$get=$PDO->query("SELECT *FROM period");
foreach($get->fetchAll() as $row){
  $id=$row['id'];
  $dur=$row['month'];
  $sale=$row['totalsale'];}

?>
                          </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sale.'Kgs';?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar-check-o fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Recorded sales</div>
<?php
$total=0;
$get=$PDO->query("SELECT *FROM period");
foreach ($get->fetchAll() as $row) {
  $amt=$row['totalsale'];
  $total+=$amt;
}

?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total.'KGs';?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calculator fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
<?php echo strtoupper("Previous Month's Earnings");
$get=$PDO->query("SELECT *FROM $date WHERE salercode='$user'");
foreach($get->fetchAll() as $row){
  $id=$row['id'];
  $sale=$row['total_weight'];}

?>
                          </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($sale*20).'<i class="fa fa-dollar"></i>';?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
<?php echo strtoupper("Devidents Earning");
$get=$PDO->query("SELECT *FROM period");
$sale=0;
foreach($get->fetchAll() as $row){
  $id=$row['id'];
  $dur=$row['month'];
  $total=$row['totalsale'];
$sale=+$total;
}
?>
                          </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($sale*15).'<i class="fa fa-dollar"></i>';?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
<?php echo strtoupper("Annual Earning");
$total=0;
$get=$PDO->query("SELECT *FROM period");
foreach ($get->fetchAll() as $row) {
  $amt=$row['totalsale'];
  $total+=$amt;
}

?>
                          </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($total*20).'<i class="fa fa-dollar"></i>';?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sales View</h6></div>
                  <div class="dropdown no-arrow">
                   <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myChart" height="100" ></canvas>
                    <script>
                    $.ajax({
                      method:"GET",
                      url:"control.php?present",
                      dataType:'json',
                      success:function(data){
                        var label=[];
                        var dt=[];
                        for(i in data){
                          label.push(data[i].month);
                          dt.push(data[i].totalsale);
                        }



var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label:'Production in Kg(per Month)',
            data: dt,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
}
});
</script>
                  </div>
                </div>
              </div>
            </div>


                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                   <!-- <canvas id="myPieChart"></canvas>-->
                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">



            </div>


        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sharon<?php date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Bootstrap core JavaScript-->

</body>

</html>
<script>

</script>
<?php }
else{
  header('Location:index.php');
}
