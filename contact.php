<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "sig2021");

if (!isset($_SESSION['pengguna'])) {
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}

$conn = mysqli_connect("localhost", "root", "", "sig2021");
$sql = mysqli_query($conn, "SELECT * FROM rumah_sakit");
$typeB = mysqli_query($conn, "SELECT * FROM rumah_sakit WHERE type = 'B'");
$typeC = mysqli_query($conn, "SELECT * FROM rumah_sakit WHERE type = 'C'");
$typeD = mysqli_query($conn, "SELECT * FROM rumah_sakit WHERE type = 'D'");

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIG | Rumah Sakit</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="dist/js/sidoarjo.js"></script>
  <!-- Map Cluster -->
  <link rel="stylesheet" href="dist/css/MarkerCluster.css">
  <link rel="stylesheet" href="dist/css/MarkerCluster.Default.css">
  <script src="dist/js/leaflet.markercluster-src.js"></script>

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-danger">
      <div class="container">
        <a href="index.php" class="navbar-brand">
          <span class="brand-text font-weight-light">SIGRUSA</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="contact.php" class="nav-link active">Contact</a>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="text-center">TIM PENGEMBANG</h3>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="card card-solid">
          <div class="card-body pb-0">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    TIM PENGEMBANG
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>Pratama Puji Ariyanto</b></h2>
                        <p class="text-muted text-sm"><b>NPM: </b> 18082010016 </p>
                      </div>
                      <div class="col-5 text-center">
                        <img src="dist/img/1.jpg" alt="user-avatar" class="img img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    TIM PENGEMBANG
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>Cready Celgie G.</b></h2>
                        <p class="text-muted text-sm"><b>NPM: </b> 18082010031 </p>
                      </div>
                      <div class="col-5 text-center">
                        <img src="dist/img/3.jpeg" alt="user-avatar" class="img img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header text-muted border-bottom-0">
                    TIM PENGEMBANG
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-7">
                        <h2 class="lead"><b>Cahyo Joyo Prawiro</b></h2>
                        <p class="text-muted text-sm"><b>NPM: </b> 18082010034 </p>
                      </div>
                      <div class="col-5 text-center">
                        <img src="dist/img/2.png" alt="user-avatar" class="img img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- Default to the left -->
      <strong>Copyright &copy; <?= DATE('Y'); ?></a>.</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>