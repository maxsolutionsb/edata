<?php
session_start();
include('data.php');

if(isset($_POST["tempahan_id"])) { 
    $tempahan_id = $_POST["tempahan_id"];
    $lstemp = new data();
    $lstemp->select(
        "tbl_tempahan
        INNER JOIN tbl_sekolah_fasiliti ON tbl_tempahan.temp_fasiliti_id = tbl_sekolah_fasiliti.fasiliti_id
        INNER JOIN tbl_sekolah ON tbl_sekolah_fasiliti.fas_sek_id = tbl_sekolah.sekolah_id", 
        "tbl_tempahan.tempahan_id,
         CONCAT(DATE_FORMAT(tbl_tempahan.temp_sdate, \"%m/%d/%Y %i:%i%p\"),' - ' , DATE_FORMAT(tbl_tempahan.temp_edate, \"%m/%d/%Y %i:%i%p\")) AS combdate,
         tbl_tempahan.temp_fasiliti_id,
         tbl_tempahan.temp_kegunaan,
         tbl_tempahan.temp_status,         
         tbl_sekolah_fasiliti.fas_sek_id as sek_id,
         tbl_sekolah.sek_ppd_id as ppd",
        " tempahan_id = '$tempahan_id' ");
    $tempahan = $lstemp->sql;

    $row = mysqli_fetch_assoc($tempahan);
    echo json_encode($row);
}

?>