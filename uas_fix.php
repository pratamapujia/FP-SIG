<?php
$conn = mysqli_connect("localhost", "root", "", "sig");
$pin = mysqli_query($conn, "SELECT * FROM uas");
$mobil = mysqli_query($conn, "SELECT * FROM uas WHERE color = 'red'");
$motor = mysqli_query($conn, "SELECT * FROM uas WHERE color = 'green'");
// print_r($motor);
?>

<!DOCTYPE html>
<html lang="In">

<head>

    <title>UAS SIG</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.73.0/dist/L.Control.Locate.css" integrity="sha256-EeDu9q7hdz6S/FWLehOLjXhw0pxm9Kfq0OTvFw4hYUI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/leaflet.locatecontrol@0.73.0/dist/L.Control.Locate.min.css,npm/leaflet.locatecontrol@0.73.0/dist/L.Control.Locate.mapbox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.73.0/src/L.Control.Locate.js" integrity="sha256-sMpm6ogcKNIgSfXNdMS7N/h6+CLucWZ9XaHQnu+u7W0=" crossorigin="anonymous"></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 10px;
        }

        #map {
            width: 90%;
            height: 600px;
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">SIG</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="nav nav-tabs tabs-bordered">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" aria-expanded="true" href="#home" style="color: cyan;">Peta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" aria-expanded="false" href="#kelompok" style="color: cyan;">Kelompok</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Sistem Informasi Geografis Bengkel di Kec. Karang Pilang</h5>
                        <div id='map'></div>
                        <input type="button" value="Locate me!" onClick="javascript:getLocationLeaflet();">
                    </center>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="kelompok" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
                <div class="col-md-4">
                    <div class="card m-b-30 card-body">
                        <h5 class="card-title" style="text-align: center;">Sandi Ragil Putra</h5>
                        <img src="user.svg">
                        <button href="" class="btn btn-inverse waves-effect waves-light" disabled>18082010015</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card m-b-30 card-body text-xs-center">
                        <h5 class="card-title" style="text-align: center;">Farid Chilmi</h5>
                        <img src="user.svg">
                        <button href="" class="btn btn-inverse waves-effect waves-light" disabled>18082010017</button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card m-b-30 card-body text-xs-right">
                        <h5 class="card-title" style="text-align: center;">Deztra Irzhak Pratama</h5>
                        <img src="user.svg">
                        <button href="" class="btn btn-inverse waves-effect waves-light" disabled>18082010071</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Karang-pilang.js" type="text/javascript"></script>
    <script>
        var mobillay = L.layerGroup();
        var motorlay = L.layerGroup();
        var redIcon = L.icon({
            iconUrl: 'marker.png',
            iconSize: [45, 55]
        });

        <?php foreach ($mobil as $mobil) { ?>
            L.marker([<?= $mobil['latitude']; ?>, <?= $mobil['longitude']; ?>], {
                icon: redIcon
            }).bindPopup(" <b> <?= $mobil['nama_bengkel']; ?> </b> <br/ > <?= $mobil['keterangan']; ?>").addTo(mobillay)
        <?php } ?>

        <?php foreach ($motor as $motor) { ?>
            L.marker([<?= $motor['latitude']; ?>, <?= $motor['longitude']; ?>]).bindPopup(" <b> <?= $motor['nama_bengkel']; ?> </b> <br/ > <?= $motor['keterangan']; ?>").addTo(motorlay)
        <?php } ?>


        var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

        var streets = L.tileLayer(mbUrl, {
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });
        var satelite = L.tileLayer(mbUrl, {
            id: 'mapbox/satellite-v9',
            tileSize: 512,
            zoomOffset: -1,
            attribution: mbAttr
        });

        var polygon = L.geoJSON(karangpilang);

        var clusters = L.markerClusterGroup();
        clusters.addLayer(motorlay);
        clusters.addLayer(mobillay);

        function onLocationFound(e) {
            var radius = e.accuracy / 2;
            var location = e.latlng
            L.marker(location).addTo(map)
            L.circle(location, radius).addTo(map);
        }

        function onLocationError(e) {
            alert(e.message);
        }

        function getLocationLeaflet() {
            map.on('locationfound', onLocationFound);
            map.on('locationerror', onLocationError);
            map.locate({
                setView: true,
                maxZoom: 16
            });
        }

        var loc = L.control.locate({
            position: 'topright',
            strings: {
                title: "Show me where I am, yo!"
            }
        });

        var map = L.map('map', {
            center: [-7.336136, 112.698489],
            zoom: 14,
            layers: [streets, clusters, polygon]
        });

        var baseLayers = {
            "Streets": streets,
            "Sattelite": satelite
        };

        var overlays = {
            "Bengkel Mobil": mobillay,
            "Bengkel Motor": motorlay,
            "Cluster": clusters
        };

        L.control.layers(baseLayers, overlays).addTo(map);
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>