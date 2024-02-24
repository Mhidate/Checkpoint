<?php

include("../../config/konedb.php");

if( isset($_GET['id']) ){
	
	$id = $_GET['id'];

	$sql = "DELETE FROM catat";
	$query = mysqli_query($db, $sql);
	
	if( $query ){
		header('Location: log-pendaki.php');
	} else {
		die("gagal menghapus...");
	}
	
} else {
	die("akses dilarang...");
}

?>