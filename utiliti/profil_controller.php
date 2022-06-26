<?php 
session_start();
$user_id = $_SESSION['UKIDLogin'] ;
include('data.php');
$uploadFileDir = 'C:\laragon\www\edata\files\profil/';
if(!empty($_POST["user_nama"])){
        // $user_id = $_POST["user_id"];  
        $user_nama = $_POST["user_nama"];  
        $user_phone = $_POST["user_phone"];  
        $user_email = $_POST["user_email"];   

        //Move uploaded file to selected directory
        if (file_exists($_FILES['user_gambar']['tmp_name'])){

            //Manage upload file
            $allowedfileExtensions = array('jpg','png', 'jpeg'); //Pdf dan Excell diterima
            $fileTmpPath = $_FILES['user_gambar']['tmp_name'];  
            $user_gambar = $_FILES["user_gambar"]['name'];

            $fileNameCmps = explode(".", $user_gambar);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName ='profile-'. $user_id . '.' . $fileExtension;

            if (in_array($fileExtension, $allowedfileExtensions)){            
                $dest_path = $uploadFileDir . $newFileName;
            //  if(move_uploaded_file($fileTmpPath,"files/".$newFileName)){
                if(!move_uploaded_file($fileTmpPath,  $uploadFileDir.$newFileName)){
                    echo 'error upload';
                    $isek = false;
                }
            }

            if($_POST["user_pass"]!=''){
                $user_pass = md5($_POST["user_pass"]);
            }
            else{
                $user_pass = $_POST["oldpass"];
            }

            $iuser = new data();
            $iuser->update('tbl_pengguna',[
                'user_nama'=>$user_nama,
                'user_phone'=>$user_phone,
                'user_pass'=>$user_pass,
                'user_gambar'=> $newFileName,
                'user_email'=>$user_email
            ],"user_id ='".$user_id."'");

            
        }
        else{
            if($_POST["user_pass"]!=''){
                $user_pass = md5($_POST["user_pass"]);
            }
            else{
                $user_pass = $_POST["oldpass"];
            }

            $iuser = new data();
            $iuser->update('tbl_pengguna',[
                'user_nama'=>$user_nama,
                'user_phone'=>$user_phone,
                'user_pass'=>$user_pass,
                'user_email'=>$user_email
            ],"user_id ='".$user_id."'");
        }

        if($iuser){ 
            header('location:logout.php');
        }  
} 
else{
    echo 'Error';
} 
     
?>