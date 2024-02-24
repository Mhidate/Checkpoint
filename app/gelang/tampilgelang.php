<?php
	include "../../config/konedb.php";

	$sql = mysqli_query($db, "select * from gelang");
	$data = mysqli_fetch_array($sql);

     $kosong="";
    if($data==0){
        $idgelang = $kosong;
    }
    else{$idgelang = $data['id'];}
	
?>

<div class="form-field">
    <input type="text" name="id" id="id" placeholder="Scan gelang RFID" class="form-control" style="width: 658px"
        value="<?php echo $idgelang; ?>">
</div>
