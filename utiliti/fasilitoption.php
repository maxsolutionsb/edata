<?php
session_start();
include('data.php');

if(isset($_POST["sek_id"])) { 
    $sek_id = $_POST["sek_id"];
    $lsfas = new data();
    $lsfas->select("tbl_sekolah_fasiliti", "*"," fas_sek_id = '$sek_id' ORDER BY fas_nama ASC ");
    $fas = $lsfas->sql;
    
    echo '<select class="form-control select2" id="temp_fasiliti_id" name="temp_fasiliti_id" style="width: 100%;">';
    echo '<option value="">--Sila pilih--</option>';
    while($row = mysqli_fetch_assoc($fas)) {        
        echo '<option value="'.$row['fasiliti_id'].'">'.$row['fas_nama'].'</option>';
    }
    echo '</select>';
}




?>