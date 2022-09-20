<?php
session_start();
include('data.php');

if(isset($_POST["tempahan_id"])) { 
    $tempahan_id = $_POST["tempahan_id"];
    $lstemp = new data();
    $lstemp->select("tbl_tempahan", "*"," tempahan_id = '$tempahan_id' ");
    $tempahan = $lstemp->sql;

    $row = mysqli_fetch_assoc($tempahan);
    echo json_encode($row);
}

?>