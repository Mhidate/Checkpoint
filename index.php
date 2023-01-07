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
        <a href="tentang.php">Tentang Kami</a>
        <a href="javascript:void(0);" class="menu" onclick="myFunction()">
            <img src="img/menu.svg" width="20" height="20" />
        </a>
    </div>

    <p class="line anim-typewriter">Pendaki Sudah Sampai di Pos Berapa ?</p>
    
  
  
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

    <table class="table responsive-3" id="load_content">
        
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
		$sql = "SELECT * FROM catat ORDER BY nomer DESC";
		$query = mysqli_query($db, $sql);
		
		while($pendaki = mysqli_fetch_array($query)){
			echo "<tr>";
			echo "<td data-header=Nama:>".$pendaki['nama']."</td>";
			echo "<td data-header=Grup:>".$pendaki['grup']."</td>";
			echo "<td data-header=Alamat:>".$pendaki['alamat']."</td>";
			echo "<td data-header=Pos:>".$pendaki['pos']."</td>";
			echo "<td data-header=Tanggal/Waktu:>".$pendaki['waktu']."</td>";
			echo "<td data-header=Lokasi pos:><a href=peta.php>Lihat<a></td>";
			

			echo "</tr>";
		}		
		?>
       </tbody>  
    </table>



    <div class="footer">
        <marquee>
            <p>Code With Heart &#9829;</p>
        </marquee>
    </div>

</body>

</html>