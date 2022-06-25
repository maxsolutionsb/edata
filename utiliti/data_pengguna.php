<?php
session_start();
include('data.php');

if(isset($_POST["user_id"])) { 
    $user_id = $_POST["user_id"];
    $lsuser = new data();
    $lsuser->select("
    tbl_pengguna
    INNER JOIN tbl_pengguna_role ON tbl_pengguna.user_id = tbl_pengguna_role.pr_user_id", 
    "tbl_pengguna.user_id,
    tbl_pengguna.user_nama,
    tbl_pengguna.user_nokp,
    tbl_pengguna.user_email,
    tbl_pengguna_role.pr_ppd_id,
    tbl_pengguna_role.pr_sekolah_id,
    tbl_pengguna_role.pr_role",
    "tbl_pengguna.user_id = '$user_id' ");
    $user = $lsuser->sql;

    $row = mysqli_fetch_assoc($user);
    echo json_encode($row);
}
else{
    echo 'Tiada';
}

?>