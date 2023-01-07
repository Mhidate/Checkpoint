<?php include("konedb.php");?>

<html>

<head>
    <link rel="stylesheet" href="css/index.css  " />
    <title>Home gunung</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
  
    <script src="script/navmenu.js"></script>

</head>
<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
       $('#load_content').load('ref.php').fadeIn("slow");
    }, 1000); // refresh setiap 1000 milliseconds
    
</script>

<body >


    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Beranda</a>
        <a href="peta.php">Peta</a>
        <a href="#contact">Tentang Kami</a>
        <a href="javascript:void(0);" class="menu" onclick="myFunction()">
            <img src="img/menu.svg" width="20" height="20" />
        </a>
    </div>
    <h3 class="text-center">Gunung</h3>
    <form method="GET" action="cari.php">
            <div class="search-box">
                <input type="text" class="search-input" name="cari"
                    value="<?php if(isset($_GET['cari'])) { echo $_GET['cari']; } ?>" placeholder="Cari..">
                <button type="submit" class="search-button">
                    <img src="img/cari.svg" width="20" height="20" />
                </button>
            </div>
        </form>
        <br>

    <table class="table responsive-3">
        
        <caption>Tabel data pendaki </caption>

      

        <thead>
            <tr>
                <th class="column-primary" data-header="Pendaki"><span>Nama :</span></th>
                <th>Grup :</th>
                <th>Alamat :</th>
                <th>POS :</th>
                <th>Tanggal/Waktu :</th>
                <th>Lokasi pos : </th>
            </tr>
        </thead>
        <tbody >


            <?php

           if(isset($_GET['cari'])) {
	
		    $kata_cari = $_GET['cari'];
   
	
		    $query = "SELECT * FROM catat WHERE nama like '%".$kata_cari."%' or grup like '%".$kata_cari."%' or pos like '%".$kata_cari."%' or alamat like '%".$kata_cari."%'";
	          } else {
		      //jika tidak ada pencarian, default yang dijalankan query ini
		      $query = "SELECT * FROM catat ORDER BY nomer DESC";
	         }
	   
	         $result = mysqli_query($db, $query);
   
	         if(!$result) {
		     die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
	         }

       
	          while ($pendaki = mysqli_fetch_array($result)) {
	        ?>
            <tr>
                <td data-header=Nama:><?php echo $pendaki['nama']; ?></td>
                <td data-header=Grup:><?php echo $pendaki['grup']; ?></td>
                <td data-header=Alamat:><?php echo $pendaki['alamat']; ?></td>
                <td data-header=Pos:><?php echo $pendaki['pos']; ?></td>
                <td data-header=Tanggal/Waktu:><?php echo $pendaki['waktu']; ?></td>
                <td data-header=Lokasi_pos:><a href=peta.php>Lihat<a></td>
            </tr>
            <?php
	     } 
   

				
		?>
   </tbody>
    </table>
    



    

 




    <div class="footer">
        <marquee>
            <p>Code With &#9829;</p>
        </marquee>
    </div>

</body>

</html>