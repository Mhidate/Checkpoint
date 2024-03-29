<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login-page.php');
}

include '../config/konedb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/dasho.css">
    <link rel="stylesheet" href="../public/css/fodaftar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
</head>

<script type="text/javascript">
$(document).ready(function() {
    setInterval(function() {
        $("#idg").load('../app/gelang/tampilgelang.php')
    }, 1000); //pembacaan id gelang tiap 1 detik = 1000
});
</script>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <div class="list-item">
                    <marquee>
                        <span class="description-header">Selamat Datang Admin</span>
                    </marquee>
                </div>
                <div class="illustration">
                    <img src="../public/img/user.svg" alt="">
                </div>

                <div class="mainl">
                    <div class="list-item">
                        <a href="admin-page.php">
                            <img src="../public/img/dasbo.svg" alt="" class="icon">
                            <span class="description">Dasboard</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a class="active" href="daftar-page.php">
                            <img src="../public/img/daftar.svg" alt="" class="icon">
                            <span class="description">Daftar</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="data-pendaki-page.php">
                            <img src="../public/img/data-pendaki.svg" alt="" class="icon">
                            <span class="description">Data pendaki</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="log-pendaki-page.php">
                            <img src="../public/img/log-pendaki.svg" alt="" class="icon">
                            <span class="description">Log pendaki</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="selesai-page.php">
                            <img src="../public/img/pselesai.svg" alt="" class="icon">
                            <span class="description">Selesai</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="hapus-lokasi-page.php">
                            <img src="../public/img/minus-map.svg" alt="" class="icon">
                            <span class="description">Hapus lokasi</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="tambah-lokasi-page.php">
                            <img src="../public/img/add-map.svg" alt="" class="icon">
                            <span class="description">Tambah lokasi</span>
                        </a>
                    </div>
                    <br><br><br>

                    <div class="list-item">
                        <a href="../app/logout/proses-logout.php">
                            <img src="../public/img/logout.svg" alt="" class="icon">
                            <span class="description">Log Out</span>
                        </a>
                    </div>


                </div>
            </div>



        </div>

        <div class="mainc">
            <form action="../app/tambah/data-pendaki.php" method="post">
                <h1 class="form-title">Daftar</h1>

                <div class="form-field" id="idg" name="id">


                </div>

                <div class="form-field">
                    <input name="grup" class="ptext"  placeholder="No Grup ( Contoh: Grup 1 )" required>
                </div>
                <div class="form-field">
                    <input name="nama" class="ptext" type="text" placeholder="Nama" required title="Nama hanya boleh berisi huruf">
                </div>
               
                <div class="form-field">
                    <input name="jenis" class="ptext" type="text" placeholder="Jenis kelamin ( isi dengan L/P )" required pattern="[a-zA-Z]+"
                        title="Nama hanya boleh berisi huruf">
                </div>
        
                 
                <div class="form-field">
                    <input name="nik" class="ptext" type="number" placeholder="NIK" required pattern="1234567890">
                </div>
                <div class="form-field">
                    <input name="alamat" class="ptext" type="text" placeholder="Alamat" required>
                </div>


                <div class="form-field">
                    <button name="daftar" class="form-button" type="submit">Daftar</button>
                </div>
            </form>



        </div>



    </div>




</body>
<?php if (isset($_GET['status'])): ?>
<p>
    <?php if ($_GET['status'] == 'sukses') {
        echo "<script>alert('Data berhasil di simpan');</script>";
    } else {
        echo "<script>alert('Proses GAGAL ID Sudah di gunakan!');</script>";
    } ?>
</p>
<?php endif; ?>

</html>