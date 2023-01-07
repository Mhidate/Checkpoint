<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
include 'konedb.php';
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
    <link rel="stylesheet" href="css/dasho.css">
    <link rel="stylesheet" href="css/datapendaki.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

<style>



</style>

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
                    <img src="img/user.svg" alt="">
                </div>

                <div class="mainl">
                    <div class="list-item">
                        <a href="admin.php">
                            <img src="img/dasbo.svg" alt="" class="icon">
                            <span class="description">Dasboard</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="daftar.php">
                            <img src="img/daftar.svg" alt="" class="icon">
                            <span class="description">Daftar</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a class="active" href="data-pendaki.php">
                            <img src="img/data-pendaki.svg" alt="" class="icon">
                            <span class="description">Data pendaki</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="log-pendaki.php">
                            <img src="img/log-pendaki.svg" alt="" class="icon">
                            <span class="description">Log pendaki</span>
                        </a>
                    </div>
                    <div class="list-item">
                        <a href="selesai.php">
                            <img src="img/pselesai.svg" alt="" class="icon">
                            <span class="description">Selesai</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="hapusmap.php">
                            <img src="img/minus-map.svg" alt="" class="icon">
                            <span class="description">Hapus lokasi</span>
                        </a>
                    </div>

                    <div class="list-item">
                        <a href="inpeta.php">
                            <img src="img/add-map.svg" alt="" class="icon">
                            <span class="description">Tambah lokasi</span>
                        </a>
                    </div>
                    <br><br><br>

                    <div class="list-item">
                        <a href="action-logout.php">
                            <img src="img/logout.svg" alt="" class="icon">
                            <span class="description">Log Out</span>
                        </a>
                    </div>


                </div>
            </div>

            
        </div> 
      
     <div class="mainc">
     <form method="GET" action="data-pendaki.php">
            <div class="search-box">
                <input type="text" class="search-input" name="carik"
                    value="<?php if(isset($_GET['carik'])) { echo $_GET['carik']; } ?>" placeholder="Cari..">
                <button type="submit" class="search-button">
                    <img src="img/cari.svg" width="20" height="20" />
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
		      //jika tidak ada pencarian, default yang dijalankan query ini
		      $query = "SELECT * FROM pendaki ORDER BY nom ASC";
	         }
	   
	         $result = mysqli_query($db, $query);
   
	         if(!$result) {
		     die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
	         }
	   //kalau ini melakukan foreach atau perulangan
      
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
            echo "<a href='editp.php?nom=" . $pendaki['nom'] . "'><button class=b1><img src=img/edit.svg width=20 height=20 /></button></a>";
            echo '</td>';
            echo '<td>';
            echo "<a href='hapuspendaki.php?nik=" . $pendaki['nik'] . "'><button class=b2><img src=img/hapus.svg width=20 height=20 /></button></a>";
            echo '</td>';
            echo '<td>';
            echo "<a href='pselesai.php?nik=" . $pendaki['nik'] . "'><button class=b3><img src=img/selesai.svg width=20 height=20 /></button></a>";
            echo '</td>';
    
            echo '</tr>';
            
            }
            ?>
           


    </tbody>

    </table>
  </div>
</div>

    

</body>

<script src="dashs.js"></script>

</html>