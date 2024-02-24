<?php

include("../../config/konedb.php");

if( isset($_GET['id']) ){
	
	
	$id = $_GET['id'];
	

	$sql = "DELETE FROM lokasi WHERE id=$id";
	$query = mysqli_query($db, $sql);
	

	if( $query ){
		header('Location: ../../routes/hapus-lokasi-page.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>