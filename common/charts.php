<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php
require('common/dbmanage.php');
global $PDO;
$date=date('M_Y');
$PDO= new PDO("sqlite:common/tsrbk","","");$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);$date=date('M_Y');
//the table is auto generated//
$table=$date;
$createusertable=$PDO->query("CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY AUTOINCREMENT NULL ,fname TEXT NOT NULL,sname TEXT NOT NULL,surname TEXT NOT NULL, phone INTERGER NOT NULL,email TEXT NOT NULL, salescode TEXT NOT NULL, password TEXT NOT NULL)");
$createrecord=$PDO->query("CREATE TABLE IF NOT EXISTS $table (id INTEGER PRIMARY KEY AUTOINCREMENT NULL ,day TEXT NOT NULL, salercode TEXT NOT NULL,date_bought TEXT NOT NULL, time_bought INTEGER NOT NULL, time_recorded INTERGER NOT NULL ,transporter TEXT NOT NULL, no_of_bags INTERGER NOT NULL, total_weight TEXT NOT NULL,buyer TEXT NOT NULL)");
$saleperiod= $PDO->query("CREATE TABLE IF NOT EXISTS saleperiods(id INTEGER PRIMARY KEY AUTOINCREMENT NULL, period TEXT NOT NULL,read INTEGER NOT NULL)");
 $period=$PDO->query("CREATE TABLE IF NOT EXISTS period(id INTEGER PRIMARY KEY AUTOINCREMENT NULL,Month VARCHAR NOT NULL,total FLOAT NOT NULL)");?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description"type="text/css" content="Tea POS"c>
  <meta name="author" content="Isaiah Morara">

  <title>Tea POS Application</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="inc/fonts/fonts" rel="stylesheet" type="text/css">
  <link href=

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">SALE RECORD<br>INVENTORY <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
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
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Operations:</h6>
            <a class="collapse-item" onclick="login()">Re-Login</a>
            <a class="collapse-item" "onclick="add()">Add record</a>
            <a class="collapse-item" onclick="admin()">Admin Log-in</a>
            <div class="collapse-divider"></div>

          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <div class="nav-link" style="cursor: pointer;"" onclick="test()">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Summary</span></div>
      </li>
      <li class="nav-item">
        <div class="nav-link" style="cursor: pointer;"  href="charts.html">
          <i class="fas fa-fw fa-coins"></i>
          <span>Sales</span></div>
      </li><li class="nav-item">
        <div class="nav-link" style="cursor: pointer;" href="charts.html">
          <i class="fas fa-fw fa-calculator"></i>
          <span>Total Sales</span></div>
           </li>
                              

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" style="cursor: pointer;" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>
     <li class="nav-item" onclick=>
        <div class="nav-link" style="cursor: pointer;"  href="charts.html">
          <i class="fas fa-fw fa-search"></i>
          <span>Search</span></div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
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



          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">MONTLY SALES(UP TO DATE)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
$total=0;
$gettotal=$PDO->query("SELECT * FROM $date");
foreach ($gettotal->fetchAll() as $row) {
  $amt=$row['total_weight'];
  $total+=$amt;

}
echo $total.' <strong>KGS</strong>';
?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
<?php echo strtoupper("Previous Month's Sale");
$get=$PDO->query("SELECT *FROM period");
foreach($get->fetchAll() as $row){
  $id=$row['Id'];
  $dur=$row['Month'];
  $sale=$row['totalsale'];}


?>
                          </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sale.'Kgs';?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
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
                      <i class="fas fa-calculator fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                  Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
                </div>
              </div>

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                  Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
                </div>
              </div>

            </div>

            <!-- Donut Chart -->

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
