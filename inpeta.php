<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah lokasi</title>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
    #mapid {
        height: 100%;
    }

    .jumbotron {
        height: 100%;
        border-radius: 0;
        background-image: url("img/zig\ zag\ wool.webp");
    }

    body {
        background-image: url("img/zig\ zag\ wool.webp");
    }

    .btn {
        border: 3px solid #ffffff;
        background: #032A3B;
        color: #ffffff;
    }
    </style>
</head>

<body>
    <div class="row">
        <!-- class row digunakan sebelum membuat column  -->
        <div class="col-4">
            <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <div class="jumbotron">
                <h1 style="color: white;">Tambah lokasi pos</h1>
                <hr>
                <form action="konekmap.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1" style="color: white;">Latitude, Longitude</label>
                        <input type="text" class="form-control" id="latlong" name="latlong" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" style="color: white;">Nama Pos</label>
                        <input type="text" class="form-control" name="nama_pos">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" style="color: white;">Keterangan(isi tanda strip jika
                            tidak ada keterangan)</label>
                        <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>

                </form>

                <div class="form-group">
                    <a href="admin.php">
                        <button class="btn btn-info">Kembali ke dasboard admin</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-8">
            <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
            <!-- peta akan ditampilkan dengan id = mapid -->
            <div id="mapid"></div>
        </div>
    </div>


    <script>
    var mymap = L.map('mapid').setView([-8.3730354, 116.4608215], 12);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'

    }).addTo(mymap);


    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("koordinatnya adalah " + e.latlng
                .toString()
            )
            .openOn(mymap);

        document.getElementById('latlong').value = e.latlng
    }
    mymap.on('click', onMapClick);



    <?php
        
        $mysqli = mysqli_connect('localhost', 'root', '', 'datan');  
        $tampil = mysqli_query($mysqli, "select * from lokasi");
        while($hasil = mysqli_fetch_array($tampil)){ ?>

    var picon = L.icon({
        iconUrl: 'img/marker.png',
        iconSize: [38, 38],
    });

    L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>], {
            icon: picon
        }).addTo(mymap)
        .bindPopup(
            `<?php echo $hasil['nama_pos'].'<br>dengan Latitude dan Longitude '.$hasil['lat_long'].'<br>keteragan:'.$hasil['keterangan']; ?>`
            )


    <?php } ?>
    </script>

</body>

</html>
