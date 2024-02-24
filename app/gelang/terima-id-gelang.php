<?php
include '../../config/konedb.php';

$idgelang = $_POST['idgelang'];

mysqli_query($db, 'delete from gelang');
$simpan = mysqli_query($db, "insert into gelang(id)values('$idgelang')");

if ($simpan) {

    $baca_gelang = mysqli_query($db, 'select * from gelang');
    $data_gelang = mysqli_fetch_array($baca_gelang);
    $idgelang = $data_gelang['id'];

    if ($idgelang == 0) {
        echo '<h1>gelang belum terdaftar</h1>';
    } else {
        $cari_pendaki = mysqli_query($db,"select * from pendaki where id='$idgelang'");
        $jumlah_data = mysqli_num_rows($cari_pendaki);

        if ($jumlah_data == 0) {
            echo '<h1> Gelang tidak terdaftar</h1>';
        } else {
            $data_pendaki = mysqli_fetch_array($cari_pendaki);
            $id = $data_pendaki['id'];
            $grup = $data_pendaki['grup'];
            $nama = $data_pendaki['nama'];
            $nik = $data_pendaki['nik'];
            $alamat = $data_pendaki['alamat'];
            $poss = "Pos 1▲" ;
            

            $sql = "INSERT INTO catat (id, grup, nama, nik, alamat,pos) VALUE ('$id', '$grup', '$nama', '$nik', '$alamat','$poss')";
            $query = mysqli_query($db, $sql);
        }
    }
} else {
    echo 'Gagal';
}

?>
