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
    <title>Data pendaki</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/dasho.css">
    <link rel="stylesheet" href="../public/css/datapendaki.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

<body >
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
                        <a class="active" href="data-pendaki-page.php">
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
     <form method="GET" action="data-pendaki-page.php">
            <div class="search-box">
                <input type="text" class="search-input" name="carik"
                    value="<?php if(isset($_GET['carik'])) { echo $_GET['carik']; } ?>" placeholder="Cari..">
                <button type="submit" class="search-button">
                    <img src="../public/img/cari.svg" width="20" height="20" />
                </button>
            </div>
     </form>
    
        <table class="table responsive-3">
            <thead>
                <tr>
                    <th class="column-primary" data-header="Pendaki"><span>ID gelang</span></th>
                    <th>Grup </th>
                    <th>Nama </th>
                    <th>Jenis kelamin </th>
                    <th>NIK </th>
                    <th>Alamat  </th>
                    <th>Edit  </th>
                    <th>Hapus  </th>
                    <th>Selesai  </th>
                
                </tr>
            </thead>
            <tbody>

                <?php
                    //jika kita klik cari, maka yang tampil query cari ini
                    if(isset($_GET['carik'])) {
                    //menampung variabel kata_cari dari form pencarian
                        $carin = $_GET['carik'];
            
                    //mencari data dengan menggunakan query
                        $query = "SELECT * FROM pendaki WHERE nama like '%".$carin."%' or grup like '%".$carin."%' or nik like '%".$carin."%' or alamat like '%".$carin."%'";
                        } else {
                        //jika tidak ada pencarian atau nama tidak ada maka query ini yang di jalankan
                        $query = "SELECT * FROM pendaki ORDER BY nom ASC";
                        }
                
                        $result = mysqli_query($db, $query);
            
                        if(!$result) {
                        die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
                        }
        
                ?>
                <?php
                while ($pendaki = mysqli_fetch_array($result)) {
                    
                echo '<tr>';
                echo '<td data-header="No gelang:" >' . $pendaki['id'] . '</td>';
                echo '<td data-header="Grup:" >' . $pendaki['grup'] . '</td>';
                echo '<td data-header="Nama:" >' . $pendaki['nama'] . '</td>';
                echo '<td data-header="Jenis kelamin:" >' . $pendaki['jenis'] . '</td>';
                echo '<td data-header="NIK:" >' . $pendaki['nik'] . '</td>';
                echo '<td data-header="Alamat:" >' . $pendaki['alamat'] . '</td>';
                echo '<td>';
                echo "<a href='../app/edit/edit-data-pendaki.php?nom=" . $pendaki['nom'] . "'><button class=b1><img src=../public/img/edit.svg width=20 height=20 /></button></a>";
                echo '</td>';
                echo '<td>';
                echo "<a href='../app/hapus/hapus-pendaki.php?nik=" . $pendaki['nik'] . "'><button class=b2><img src=../public/img/hapus.svg width=20 height=20 /></button></a>";
                echo '</td>';
                echo '<td>';
                echo "<a href='../app/selesai/proses-selesai.php?nik=" . $pendaki['nik'] . "'><button class=b3><img src=../public/img/selesai.svg width=20 height=20 /></button></a>";
                echo '</td>';
                echo '</tr>';
                
                }
                ?>
             </tbody>

         </table>
     </div>
    </div>   

</body>

</html>