<?php
session_start();  
include('data.php');
$inter_sek_id=$_SESSION['UKIDSekolah'];
// directory where file will be moved
$uploadFileDir = 'C:\laragon\www\edata\files\/';

if(!empty($_POST)){
    if(isset($_POST['del_action'])){

        //Get file name to delete
        $itrmfile = new data();
        $itrmfile->select("tbl_internet_interim","*","interim_id = ".$_POST["del_interim_id"]);
        $interim = $itrmfile->sql;

        $row = mysqli_fetch_assoc($interim);
        $filetodelete = $row['inter_file'];

        $isek = new data();
        $isek->delete("tbl_internet_interim", "interim_id = ".$_POST["del_interim_id"] );

        $file_to_delete = $uploadFileDir.$filetodelete = $row['inter_file'];
        unlink($file_to_delete);


    }
    else{
        $output = '';  
        $message = '';
        $inter_bulan = $_POST["inter_bulan"];  
        $inter_jenis = $_POST["inter_jenis"];
        $inter_kuantiti = $_POST["inter_kuantiti"];
        //Manage upload file
        $allowedfileExtensions = array('pdf','xlsx', 'xls'); //Pdf dan Excell diterima
        $fileTmpPath = $_FILES['inter_file']['tmp_name'];  
        $inter_file = $_FILES["inter_file"]['name'];

        $fileNameCmps = explode(".", $inter_file);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = $inter_sek_id.'-'. $inter_bulan . '.' . $fileExtension;
        
        
        if($_POST["interim_id"] != '')  
        {  
            $isek = new data();
            $isek->update('tbl_internet_interim',[
                'inter_sek_id'=>$inter_sek_id,
                'inter_bulan'=>$inter_bulan,
                'inter_jenis'=>$inter_jenis,
                'inter_kuantiti'=>$inter_kuantiti,
                'inter_file'=>$newFileName
            ],"interim_id ='".$_POST["interim_id"]."'");
            
            //Move uploaded file to selected directory
            if (file_exists($_FILES['inter_file']['tmp_name'])){
                if (in_array($fileExtension, $allowedfileExtensions)){            
                    $dest_path = $uploadFileDir . $newFileName;
                //  if(move_uploaded_file($fileTmpPath,"files/".$newFileName)){
                    if(!move_uploaded_file($fileTmpPath,  $uploadFileDir.$newFileName)){
                        echo 'error upload';
                        $isek = false;
                    }
                }
            }
        }  
        else  
        {  
            $isek = new data();
            $isek->insert('tbl_internet_interim',[
                'inter_sek_id'=>$inter_sek_id,
                'inter_bulan'=>$inter_bulan,
                'inter_jenis'=>$inter_jenis,
                'inter_kuantiti'=>$inter_kuantiti,
                'inter_file'=>$newFileName
            ]);

            //Move uploaded file to selected directory
            if (file_exists($_FILES['inter_file']['tmp_name'])){
                if (in_array($fileExtension, $allowedfileExtensions)){            
                    $dest_path = $uploadFileDir . $newFileName;
                //  if(move_uploaded_file($fileTmpPath,"files/".$newFileName)){
                    if(!move_uploaded_file($fileTmpPath,  $uploadFileDir.$newFileName)){
                        echo 'error upload';
                        $isek = false;
                    }
                }
            }
        }
    }

    //generate update list
    if($isek == true){  
        $output='';        

        $lsintrm = new data();
        $lsintrm->select("tbl_internet_interim
        INNER JOIN tbl_sekolah ON tbl_internet_interim.inter_sek_id = tbl_sekolah.sekolah_id",
        "tbl_internet_interim.interim_id,
        tbl_sekolah.sek_nama,
        tbl_internet_interim.inter_jenis,
        tbl_internet_interim.inter_kuantiti,
        tbl_internet_interim.inter_bulan,
        tbl_internet_interim.inter_file");
        $interim = $lsintrm->sql; 
        $output .= '  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">Bil.</th>
                        <th width="35%">Sekolah</th>
                        <th width="10%" class="text-center">Jenis</th>
                        <th width="10%" class="text-center">Bil. Talian</th>
                        <th width="10%" class="text-center">Bulan</th>
                        <th width="20%">Fail</th>
                        <th width="10%">#</th>
                    </tr>
                </thead>
                <tbody>
        '; 
        $bil=1; 
        while($row = mysqli_fetch_assoc($interim))  
        {  
            $output .= ' 
            <tr>
                <td>'.$bil++.'</td>
                <td>'.$row['sek_nama'].'</td>
                <td>'.$row['inter_jenis'].'</td>
                <td>'.$row['inter_kuantiti'].'</td>
                <td>'.$row['inter_bulan'].'</td>
                <td><a href="files/'.$row['inter_file'].'" target="_blank">'.$row['inter_file'].'</a></td>
                <td>
                <a href="#" id="'.$row['interim_id'].'" class="btn btn-xs btn-info edit_data">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" id="'.$row['interim_id'].'" class="btn btn-xs btn-danger del_data">
                    <i class="fas fa-trash"></i>
                </a>
                </td>
            </tr>
            ';  
        }  
        $output .= '</tbody>
                    </table>'; 
    }
    echo $output;  
}  
     
?>