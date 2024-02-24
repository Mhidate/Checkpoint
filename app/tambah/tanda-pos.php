<?php
    
    include("../../config/konedb.php");

    $lat_long       = $_POST['latlong'];
    $nama_pos    = $_POST['nama_pos'];
    $keterangan     = $_POST['keterangan'];

    $insert = mysqli_query($db, "insert into lokasi set lat_long='$lat_long', nama_pos='$nama_pos', keterangan='$keterangan' ");

    header("Location: ../../routes/tambah-lokasi-page.php");

?>