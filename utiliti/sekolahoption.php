<?php
session_start();
include('data.php');

if(isset($_POST["ppd_id"])) { 
    $ppd_id = $_POST["ppd_id"];
    $lssekolah = new data();
    $lssekolah->select("tbl_sekolah", "*"," sek_ppd_id = '$ppd_id' ORDER BY sek_nama ASC ");
    $sekolah = $lssekolah->sql;
    
    echo '<select class="form-control select2" id="temp_sek_id" name="temp_sek_id" style="width: 100%;">';
    echo '<option value="">--Sila pilih--</option>';
    while($row = mysqli_fetch_assoc($sekolah)) {        
        echo '<option value="'.$row['sekolah_id'].'">'.$row['sek_nama'].'</option>';
    }
    echo '</select>';
}

?>