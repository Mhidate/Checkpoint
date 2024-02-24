<?php include("../../config/konedb.php");?>
<table class="table responsive-3" >


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