<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<?php include 'konedb.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dasho.css">
    <link real="stylesheet" href="css/card.css">
    <script type="text/javascript" src="script/Chart.js"></script>
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
                    <img src="img/user.svg" alt="">
                </div>

                <div class="mainl">
                    <div class="list-item">
                        <a class="active" href="admin.php">
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
                        <a href="data-pendaki.php">
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
                            <span class="description">Hapus lokasi </span>
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

        <div  style="width: 800px; height: 500px; justify-content: center; margin-top: 50px; margin-left: 10%;">
		   <a style="color: white;">Gerafik jumlah pendaki yang terdaftar (jalur resmi) ,pendaki laki-laki, perempuan , </a>
           <a style="color: white;">dan jumlah pendaki yang sudah sampai di setiap pos</a>
           <br>
           <br>
           <br>
           <br>
          <canvas id="myChart" ></canvas>
         <br>
         
           

	    </div>

        
      

        


    </div>
 
         
        <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Terdaftar", "Laki-laki","Perempuan","Pos 1","Pos 2","Pos 3","Pos 4","Pos 5"],
				datasets: [{
					label: 'Jumlah pendaki',
					data: [
                    <?php 
					$jumlah_pendaki = mysqli_query($db,"select * from pendaki");
					echo mysqli_num_rows($jumlah_pendaki);
					?>,
					<?php 
					$jumlah_laki = mysqli_query($db,"select * from pendaki where jenis='L'");
					echo mysqli_num_rows($jumlah_laki);
					?>, 
					<?php 
					$jumlah_perempuan = mysqli_query($db,"select * from pendaki where jenis='P'");
					echo mysqli_num_rows($jumlah_perempuan);
					?>, 
                    <?php 
					$jumlah_pos1 = mysqli_query($db,"select * from catat where pos='pos 1'");
					echo mysqli_num_rows($jumlah_pos1);
					?>,
                    <?php 
					$jumlah_pos2 = mysqli_query($db,"select * from catat where pos='pos 2'");
					echo mysqli_num_rows($jumlah_pos2);
					?>,
                    <?php 
					$jumlah_pos3 = mysqli_query($db,"select * from catat where pos='pos 3'");
					echo mysqli_num_rows($jumlah_pos3);
					?>,
                    <?php 
					$jumlah_pos4 = mysqli_query($db,"select * from catat where pos='pos 4'");
					echo mysqli_num_rows($jumlah_pos4);
					?>,
                    <?php 
					$jumlah_pos5 = mysqli_query($db,"select * from catat where pos='pos 5'");
					echo mysqli_num_rows($jumlah_pos5);
					?>
                    
                    

					
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
   

</body>
<script src="dashs.js"></script>

</html>