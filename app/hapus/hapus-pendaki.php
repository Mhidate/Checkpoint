<?php

include("../../config/konedb.php");

if( isset($_GET['nik']) ){
	
	$nik = $_GET['nik'];
	
	$sql = "DELETE FROM pendaki WHERE nik=$nik";
	$query = mysqli_query($db, $sql);
	
	if( $query ){
		header('Location: ../../routes/data-pendaki-page.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>