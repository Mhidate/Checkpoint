<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>Peta pos</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <link rel="stylesheet" href="../public/css/index.css"/>
    <script src="../script/navmenu.js"></script>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href="../index.php">Beranda</a>
        <a href="peta-page.php" class="active">Peta</a>
        <a href="tentang-page.php">Tentang Kami</a>
        <a href="javascript:void(0);" class="menu" onclick="myFunction()">
            <img src="../public/img/menu.svg" width="20" height="20" />
        </a>
    </div>

    <br>

    <h1 style="color: white; text-align: center;">Peta lokasi pos </h1>
    <div id="mapid" style="width: 700px; height: 400px; margin-left: 25%; margin-bottom: 10%; z-index: 4;"></div>
    
    <br>

    <div class="footer">
        <marquee>
            <p>Code With Heart &#9829;</p>
        </marquee>
    </div>
</body>

<script>
        var mymap = L.map('mapid').setView([-8.3730354, 116.4608215], 12);
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
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
            
            include("../config/konedb.php");  
            $tampil = mysqli_query($db, "select * from lokasi"); 
            while($hasil = mysqli_fetch_array($tampil)){ ?>



        var picon = L.icon({
            iconUrl: '../public/img/marker.png',
            iconSize: [38, 38],
        });
        L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>], {
                icon: picon
            }).addTo(mymap)
            .bindPopup(
                `<?php echo $hasil['nama_pos'].'<br>dengan Latitude dan Longitude '.$hasil['lat_long'].'<br>keteragan : '.$hasil['keterangan']; ?>`
                )


        <?php } ?>
</script>

</html>