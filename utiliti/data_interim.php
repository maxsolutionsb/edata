<?php
include('data.php');

if(isset($_POST["interim_id"])) { 
    $interim_id = $_POST["interim_id"];
    $lsintrm = new data();
    $lsintrm->select("tbl_internet_interim","*","interim_id = '$interim_id' ");
    $interim = $lsintrm->sql;

    $row = mysqli_fetch_assoc($interim);
    echo json_encode($row);
}
else{
    echo 'Tiada';
}

?>