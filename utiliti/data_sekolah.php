<?php
include('data.php');

if(isset($_POST["sekolah_id"])) { 
    $sekolah_id = $_POST["sekolah_id"];
    $lssekolah = new data();
    $lssekolah->select("tbl_sekolah", "*"," sekolah_id = '$sekolah_id' ");
    $sekolah = $lssekolah->sql;

    $row = mysqli_fetch_assoc($sekolah);
    echo json_encode($row);
}




?>