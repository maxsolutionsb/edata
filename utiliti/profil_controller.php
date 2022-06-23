<?php  
include('data.php');

if(!empty($_POST)){
        $user_id = $_POST["user_id"];  
        $user_nama = $_POST["user_nama"];  
        $user_nokp = $_POST["user_nokp"];  
        $user_email = $_POST["user_email"];  
        $pr_ppd_id = $_POST["pr_ppd_id"];
        $pr_sekolah_id = $_POST["pr_sekolah_id"];
        $pr_role = $_POST["pr_role"]; 

        //Move uploaded file to selected directory
        if (file_exists($_FILES['inter_file']['tmp_name'])){

            //Manage upload file
            $allowedfileExtensions = array('pdf','xlsx', 'xls'); //Pdf dan Excell diterima
            $fileTmpPath = $_FILES['inter_file']['tmp_name'];  
            $inter_file = $_FILES["inter_file"]['name'];

            $fileNameCmps = explode(".", $inter_file);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = $inter_sek_id.'-'. $inter_bulan . '.' . $fileExtension;

            if (in_array($fileExtension, $allowedfileExtensions)){            
                $dest_path = $uploadFileDir . $newFileName;
            //  if(move_uploaded_file($fileTmpPath,"files/".$newFileName)){
                if(!move_uploaded_file($fileTmpPath,  $uploadFileDir.$newFileName)){
                    echo 'error upload';
                    $isek = false;
                }
            }
        }
        
        $iuser = new data();
        $iuser->update('tbl_pengguna',[
            'user_nama'=>$user_nama,
            'user_nokp'=>$user_nokp,
            'user_email'=>$user_email
        ],"user_id ='".$_POST["user_id"]."'");


    if($iuser == true){  
        
    }
}  
     
?>