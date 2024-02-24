<?php

include("../../config/konedb.php");


if(isset($_POST['daftar'])){
	
	$id = $_POST['id'];
	$grup = $_POST['grup'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$nik = $_POST['nik'];
	$alamat = $_POST['alamat'];
	
	$sql = "INSERT INTO pendaki (id, grup, nama, jenis, nik, alamat) VALUE ('$id', '$grup', '$nama', '$jenis', '$nik', '$alamat')";
	$query = mysqli_query($db, $sql);
	
	if( $query ) {
		header('Location: data-pendaki.php?status=sukses');
        mysqli_query($db, 'delete from gelang');
	} else {
		header('Location: daftar.php?status=gagal');
        
	}
	
} else {
	die("Akses dilarang...");
}

?>