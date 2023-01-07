<?php 

include("konedb.php");

if( !isset($_GET['nik']) ){

	header('Location: data-pendaki.php');
}


$nik = $_GET['nik'];

$sql = "SELECT * FROM pendaki WHERE nik=$nik";
$query = mysqli_query($db, $sql);
$pendaki = mysqli_fetch_assoc($query);
$id = $pendaki['id'];
$grup = $pendaki['grup'];
$nama = $pendaki['nama'];
$jk = $pendaki['jenis'];
$nik = $pendaki['nik'];
$alamat = $pendaki['alamat'];

if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulir Edit Data Pendaki</title>
</head>

<body>
	<header>
		<h3>Formulir Edit Data Pendaki</h3>
	</header>
	
	 <form action="editdata.php" method="POST">
		
		<fieldset>
			
			<input type="hidden" name="id" value="<?php echo $id ?>" />
            <p>
			<label for="grup">Grup: </label>
			<input type="text" name="grup" placeholder="grup" value="<?php echo $grup ?>" />
		</p>
		
		<p>
			<label for="nama">Nama: </label>
			<input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $nama ?>" />
		</p>
		<p>
			<label for="jenis_kelamin">Jenis Kelamin: </label>
			<?php $jk ?>
			<label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'L') ? "checked": "" ?>> Laki-laki</label>
			<label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'P') ? "checked": "" ?>> Perempuan</label>
		</p>
        <p>
			<label for="nik">NIK: </label>
			<input name="nik"><?php echo $nik ?></input>
		</p>
        <p>
			<label for="alamat">Alamat: </label>
			<textarea name="alamat"><?php echo $alamat ?></textarea>
		</p>
		
		
		<p>
			<input type="submit" value="Simpan" name="simpan" />
		</p>
		
		</fieldset>
		
	
	</form>
	
	</body>
</html>
