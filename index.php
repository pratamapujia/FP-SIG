<?php

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

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-danger">
      <div class="container">
        <a href="" class="navbar-brand">
          <span class="brand-text font-weight-light">SIGRUSA</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">Contact</a>
            </li>
          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">
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
              <h3 class="text-center">Peta Persebaran Rumah Sakit di Sidoarjo Berdasarkan Tipe</h3>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <!-- <div id="myMap" style="height: 500px"></div> -->
                  <div id="mapid" style="height: 550px;"></div>
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

  <!-- REQUIRED SCRIPTS -->

  <script>
    // var mymap = L.map('mapid').setView([-7.444694024689493, 112.69966657585864], 11);

    // Layer Group per type rumah sakit
    var typeB = L.layerGroup();
    <?php foreach ($typeB as $B) { ?>
      L.marker([<?= $B['latitude']; ?>, <?= $B['longitude']; ?>]).bindPopup('<b><?= $B['rumah_sakit']; ?> (<?= $B['type']; ?>)</b><br/>' + '<?= $B['jalan']; ?></br>' + '<?= $B['telepon']; ?>').addTo(typeB);
    <?php } ?>

    var typeC = L.layerGroup();
    <?php foreach ($typeC as $C) { ?>
      L.marker([<?= $C['latitude']; ?>, <?= $C['longitude']; ?>]).bindPopup('<b><?= $C['rumah_sakit']; ?> (<?= $C['type']; ?>)</b><br/>' + '<?= $C['jalan']; ?></br>' + '<?= $C['telepon']; ?>').addTo(typeC);
    <?php } ?>

    var typeD = L.layerGroup();
    <?php foreach ($typeD as $D) { ?>
      L.marker([<?= $D['latitude']; ?>, <?= $D['longitude']; ?>]).bindPopup('<b><?= $D['rumah_sakit']; ?> (<?= $D['type']; ?>)</b><br/>' + '<?= $D['jalan']; ?></br>' + '<?= $D['telepon']; ?>').addTo(typeD);
    <?php } ?>

    //Api map dan data Map
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

    //vector layer
    var streets = L.tileLayer(mbUrl, {
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr
    });

    //Add map
    var mymap = L.map('mapid', {
      center: [-7.40202050602138, 112.65918700767108],
      zoom: 12,
      layers: [streets, typeB, typeC, typeD]
    });

    //Add tema layer
    var baseLayers = {
      "Streets": streets
    };

    //Add group layers
    var overlays = {
      "RS Tipe B": typeB,
      "RS Tipe C": typeC,
      "RS Tipe D": typeD
    };

    L.control.layers(baseLayers, overlays).addTo(mymap);
    L.geoJSON(kecamatan).addTo(mymap);

    // </?php foreach ($sql as $s) : ?>
    //   L.marker([</?= $s['latitude']; ?>, </?= $s['longitude']; ?>]).addTo(mymap)
    //     .bindPopup("<b></?= $s['rumah_sakit']; ?></b><br/>" + "Alamat : </?= $s['jalan']; ?>");
    // </?php endforeach ?>
  </script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>