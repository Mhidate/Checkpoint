<!DOCTYPE html>
<html>
<head>
	<title>Export data pendaki ke file ms excel</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: arial;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php

	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data pendaki.xls");
    date_default_timezone_set('Asia/Jakarta');
     $date = date('m/d/Y');
	?>
	
		<h1>Data Yang Sudah Selesai Mendaki </h1>
		<h2>Data di ekspor tanggal <?php echo $date; ?></h2>
        <br><br>
 
	<table border="1">
		<tr>
			
			<th>Nama </th>
			<th>Grup </th>
			<th>Jenis kelamin </th>
            <th>NIK </th>
            <th>Alamat </th>
            <th>Tanggal selesai </th>
            <th>Catatan </th>
		</tr>
		<?php 

		include("../../config/konedb.php");
 
		$data = mysqli_query($db,"select * from selesai");
		
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['grup']; ?></td>
			<td><?php echo $d['jk']; ?></td>
            <td><?php echo $d['nik']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['tgl']; ?></td>
            <td><?php echo $d['catatan']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>




