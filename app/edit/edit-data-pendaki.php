<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Pendaki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<style>
  body {
  /*penulisan folder di luar css*/
  background-image: url("../../public/img/zig\ zag\ wool.webp");
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

    include "../../config/konedb.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['nom'])) {
        $nom=input($_GET["nom"]);

        $sql="select * from pendaki where nom=$nom";
        $hasil=mysqli_query($db,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
        $nom=htmlspecialchars($_POST["nom"]);
        $id=input($_POST["id"]);
        $grup=input($_POST["grup"]);
        $nama=input($_POST["nama"]);
        $jenis=input($_POST["jenis"]);
        $nik=input($_POST["nik"]);
        $alamat=input($_POST["alamat"]);


        $sql="update pendaki set id='$id',grup='$grup',nama='$nama',jenis='$jenis',nik='$nik',alamat='$alamat' where nom=$nom";
        $hasil=mysqli_query($db,$sql);

        if ($hasil) {
            header("Location:../../routes/data-pendaki-page.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";
        }

    }

    ?>
    <h1>Edit Data Pendaki</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Grup (Isi dengan kata "Grup" lalu nomer grup):</label>
            <input type="text" name="grup" class="form-control" value="<?php echo $data['grup']; ?>" required />
        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"  required/>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin: </label><br>
            <div class="form-check form-check-inline">
                <input type="radio" name="jenis"  id="laki-laki" value="L" checked>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="jenis"  id="perempuan" value="P" <?php if ($data['jenis'] == "P") { echo "checked"; } ?>>
                <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
        </div>
        <div class="form-group">
            <label>NIK:</label>
            <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>"  required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required/>
        </div>

        <input type="hidden" name="nom" value="<?php echo $data['nom']; ?>" />
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>