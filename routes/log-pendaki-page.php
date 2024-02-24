<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login-page.php");
    }
    include '../config/konedb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/dasho.css">
    <link rel="stylesheet" href="../public/css/logpendaki.css">
</head>

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
                        <a class="active" href="log-pendaki-page.php">
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
          <br>
          <h1>Tabel log pendaki berdasarkan grup <a href='../app/hapus/hapus-log-pendaki.php?id=1'><button class="b1"  method="GET"><img src=../public/img/hapus.svg width="25" height="25" /></button></a></h1> <br><br>
          <div class="column">
            <table >
                <?php
                $g = "SELECT * FROM pendaki WHERE grup='Grup 1'";
                $query = mysqli_query($db, $g);
                ?>
            <h2>Grup 1-Jumlah Anggota <?php echo mysqli_num_rows($query) ?></h2>
            <thead>
                <tr>
                    <th class="column-primary" data-header="User"><span>Nama </span></th>
                    <th>Grup </th>
                    <th>POS </th>
                    <th>Tanggal/Waktu </th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM catat WHERE grup='Grup 1'";
                $query = mysqli_query($db, $sql);
            
                while($pendaki = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td data-header=Nama:>".$pendaki['nama']."</td>";
                    echo "<td data-header=Grup:>".$pendaki['grup']."</td>";
                    echo "<td data-header=Pos:>".$pendaki['pos']."</td>";
                    echo "<td data-header=Waktu:>".$pendaki['waktu']."</td>";
                    echo "</tr>";
                }	
        
                ?>
            </tbody>
            </table>
          </div>
  
          <br>
          <div class="column">
            <table >
                    <h2>Grup 2-Jumlah Anggota <?php echo mysqli_num_rows($query) ?></h2>
                    <thead>
                        <tr>
                            <th class="column-primary" data-header="User"><span>Nama </span></th>
                            <th>Grup </th>
                            <th>POS </th>
                            <th>Tanggal/Waktu </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "SELECT * FROM catat WHERE grup='Grup 2'";
                    $query = mysqli_query($db, $sql);
                    
                    while($pendaki = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td data-header=Nama:>".$pendaki['nama']."</td>";
                        echo "<td data-header=Grup:>".$pendaki['grup']."</td>";
                        echo "<td data-header=Pos:>".$pendaki['pos']."</td>";
                        echo "<td data-header=Waktu:>".$pendaki['waktu']."</td>";
                        echo "</tr>";
                    }	
                    ?>
                    </tbody>
            </table>
          </div>

        </div>

</body>

</html>