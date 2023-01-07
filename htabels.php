<?php

include("konedb.php");

if( isset($_GET['id']) ){
	
	
	$id = $_GET['id'];
	
	
	$sql = "DELETE FROM selesai";
	$query = mysqli_query($db, $sql);
	
	
	if( $query ){
		header('Location: selesai.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>