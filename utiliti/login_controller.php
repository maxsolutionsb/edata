<?php
session_start();
include('data.php');

if(!empty($_POST)){
    $loginid = $_POST["loginid"];
    $katalaluan = $_POST["katalaluan"];
    
    $lsuser = new data();    
    $lsuser->select("tbl_pengguna
    INNER JOIN tbl_pengguna_role ON tbl_pengguna.user_id = tbl_pengguna_role.pr_user_id
    ", 
    "tbl_pengguna.user_id,
    tbl_pengguna.user_nama,
    tbl_pengguna.user_nokp,
    tbl_pengguna_role.pr_sekolah_id,
    tbl_pengguna_role.pr_role",
    " tbl_pengguna.user_nokp = '$loginid' AND tbl_pengguna.user_pass = password($katalaluan) ");
    $user = $lsuser->sql;

    if($user->num_rows > 0){
        $row = mysqli_fetch_assoc($user);
        $_SESSION['UKIDLogin'] = $row['user_id'];
        $_SESSION['UKIDSekolah'] = $row['pr_sekolah_id'];
        header('location:../main.php');
    }
    else{
        header('location:../index.php');
    }
}  
     
?>