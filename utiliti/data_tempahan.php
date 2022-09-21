<?php
session_start();
include('data.php');

if(isset($_POST["tempahan_id"])) { 
    $tempahan_id = $_POST["tempahan_id"];
    $lstemp = new data();
    $lstemp->select(
        "tbl_tempahan", 
        "tbl_tempahan.tempahan_id,
         CONCAT(DATE_FORMAT(tbl_tempahan.temp_sdate, \"%m/%d/%Y %i:%i%p\"),' - ' , DATE_FORMAT(tbl_tempahan.temp_edate, \"%m/%d/%Y %i:%i%p\")) AS combdate,
         tbl_tempahan.temp_fasiliti_id,
         tbl_tempahan.temp_kegunaan,
         tbl_tempahan.temp_status",
        " tempahan_id = '$tempahan_id' ");
    $tempahan = $lstemp->sql;

    $row = mysqli_fetch_assoc($tempahan);
    echo json_encode($row);
}

?>