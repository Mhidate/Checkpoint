<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Pendaki</title>
 
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<style>
  body {
  /*penulisan folder di luar css*/
  background-image: url("img/zig\ zag\ wool.webp");
}
    .btn {
        margin-top: 10px;
        border: 3px solid #ffffff;
        background: #032A3B;
        color: #ffffff;
    }
    h1{
        margin-top: 8%;
        color: white;
    }
    label{
        color: white;
        margin-top: 10px;
    }
    
</style>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "konedb.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_anggota
    if (isset($_GET['nik'])) {
        $nik=input($_GET["nik"]);

        $sql="select * from pendaki where nik=$nik";
        $hasil=mysqli_query($db,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
        $grup=input($_POST["grup"]);
        $nama=input($_POST["nama"]);
        $jenis=input($_POST["jenis"]);
        $nik=input($_POST["nik"]);
        $alamat=input($_POST["alamat"]);
        $catatan=input($_POST["catatan"]);
        


     
        
            $sql = "INSERT INTO selesai (grup, nama, jk, nik, alamat, catatan) VALUE ('$grup', '$nama', '$jenis', '$nik', '$alamat','$catatan')";
        
        $query = mysqli_query($db, $sql);

  
        if ($query) {
            $sql = "DELETE FROM pendaki WHERE nik=$nik";
	          $query = mysqli_query($db, $sql);
            header("Location:data-pendaki.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h1>Pendaki Yang Sudah Selesai</h1>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <input type="hidden" name="grup" value="<?php echo $data['grup']; ?>" />
        <input type="hidden" name="nama" value="<?php echo $data['nama']; ?>" />
        <input type="hidden" name="jenis" value="<?php echo $data['jenis']; ?>" />
        <input type="hidden" name="nik" value="<?php echo $data['nik']; ?>" />
        <input type="hidden" name="alamat" value="<?php echo $data['alamat']; ?>" />

        <div class="form-group">
            <label>Apakah pendaki yang selesai memiliki catatan ? jika tidak ketik - :</label>
            <textarea type="text" name="catatan" class="form-control"  required> </textarea>

        </div>
        
    

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>