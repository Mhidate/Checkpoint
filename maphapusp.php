<?php

include("konedb.php");

if( isset($_GET['id']) ){
	
	
	$id = $_GET['id'];
	

	$sql = "DELETE FROM lokasi WHERE id=$id";
	$query = mysqli_query($db, $sql);
	

	if( $query ){
		header('Location: hapusmap.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>