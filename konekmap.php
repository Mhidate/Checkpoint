<?php
    
    $connect = mysqli_connect('localhost', 'root', '', 'datan');

    $lat_long       = $_POST['latlong'];
    $nama_pos    = $_POST['nama_pos'];
    $keterangan     = $_POST['keterangan'];

    $insert = mysqli_query($connect, "insert into lokasi set lat_long='$lat_long', nama_pos='$nama_pos', keterangan='$keterangan' ");

    header("Location: inpeta.php");

?>