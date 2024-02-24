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
    <title>Hapus lokasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/dasho.css">
    <link rel="stylesheet" href="../public/css/tabel.css">
</head>
<style>

.b1{
    color : red;
    width: 50px;
}
.b1:hover {
  background: #fff;
    border-color: red;
  transform: translateY(7px);
  color: red;
}
</style>

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
                        <a href="daftar-page.php">
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
                        <a class="active" href="hapus-lokasi-page.php">
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
        <table class="table responsive-3">
           <thead>
                <tr>
                    <th>No</th>
                    <th>Latitude dan Longitude</th>
                    <th>Nama pos</th>

                </tr>
            </thead>
            <tbody>

                <?php
                $sql = 'SELECT * FROM lokasi';
                $query = mysqli_query($db, $sql);

                while ($lokasi = mysqli_fetch_array($query)) {
                    echo '<tr>';
                    echo '<td data-header="No:" >' . $lokasi['id'] . '</td>';
                    echo '<td data-header="Lat,Long:" >' . $lokasi['lat_long'] . '</td>';
                    echo '<td data-header="Lokasi:" >' . $lokasi['nama_pos'] . '</td>';
                    echo '<td>';
                    echo "<a href='../app/hapus/hapus-lokasi.php?id=" . $lokasi['id'] . "'><button class=b1><img src=../public/img/hapus.svg width=20 height=20 /></button></a>";
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    
    </div>

</body>
</html>