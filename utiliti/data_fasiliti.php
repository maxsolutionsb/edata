<?php
include('data.php');

if(isset($_POST["fasiliti_id"])) { 
    $fasiliti_id = $_POST["fasiliti_id"];
    $lsfasiliti = new data();
    $lsfasiliti->select("tbl_sekolah_fasiliti", "*"," fasiliti_id = '$fasiliti_id' ");
    $fasiliti = $lsfasiliti->sql;

    $row = mysqli_fetch_assoc($fasiliti);
    echo json_encode($row);
}




?>