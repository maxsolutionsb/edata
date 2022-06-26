<?php
session_start();
include('data.php');

if(!empty($_POST)){
    $loginid = $_POST["loginid"];
    $katalaluan = $_POST["katalaluan"];
    
    $lsuser = new data();    
    $lsuser->select("tbl_pengguna
    INNER JOIN tbl_pengguna_role ON tbl_pengguna.user_id = tbl_pengguna_role.pr_user_id ", 
    "tbl_pengguna.user_id,
    tbl_pengguna.user_nama,
    tbl_pengguna.user_nokp,
    tbl_pengguna.user_gambar,
    tbl_pengguna_role.pr_sekolah_id,
    tbl_pengguna_role.pr_role,
    tbl_pengguna_role.pr_ppd_id",
    " tbl_pengguna.user_nokp = '$loginid' AND tbl_pengguna.user_pass = md5($katalaluan) ");
    $user = $lsuser->sql;

    if($user->num_rows > 0){
        $row = mysqli_fetch_assoc($user);
        $_SESSION['UKIDLogin'] = $row['user_id'];
        $_SESSION['UKLoginNama'] = $row['user_nama'];
        $_SESSION['UKLoginGambar'] = $row['user_gambar'];
        $_SESSION['UKIDSekolah'] = $row['pr_sekolah_id'];
        $_SESSION['UKIDRole'] = $row['pr_role'];
        $_SESSION['UKIDPPD'] = $row['pr_ppd_id'];
        header('location:../main.php');
    }
    else{ 
        echo "<script type='text/javascript'>alert('Login ID / Katalaluan Salah, sila cuba lagi');";
        echo "window.location = '../index.php';</script>";
        exit;
    }
}  
     
?>