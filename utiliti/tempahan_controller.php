<?php
session_start();  
include('data.php');

$where="";
if($_SESSION['UKIDRole']==1){
  $where = "";
}
else if($_SESSION['UKIDRole']==2){
  $where = "tbl_sekolah.sek_ppd_id = ".$_SESSION['UKIDPPD'];
}
else{
  $where = "tbl_sekolah.sekolah_id = ".$_SESSION['UKIDSekolah'];
}


if(!empty($_POST)){
    if(isset($_POST['del_action'])){

        //Get file name to delete
        $itrmfile = new data();
        $itrmfile->select("tbl_tempahan","*","tempahan_id = ".$_POST["del_tempahan_id"]);
        $tempahan = $itrmfile->sql;

        $row = mysqli_fetch_assoc($tempahan);
        $filetodelete = $row['inter_file'];

        $itemp = new data();
        $itemp->delete("tbl_tempahan", "interim_id = ".$_POST["del_interim_id"] );

        $file_to_delete = $uploadFileDir.$filetodelete = $row['inter_file'];
        unlink($file_to_delete);


    }
    else{
        $output = '';  
        $message = '';
        $temp_fasiliti_id = $_POST["temp_fasiliti_id"];  
        $temp_kegunaan = $_POST["temp_kegunaan"];
        $temp_sdate = date('Y-m-d', strtotime($_POST["temp_sdate"]));
        $temp_edate = date('Y-m-d', strtotime($_POST["temp_edate"]));
        $temp_status = $_POST["temp_status"];     
        
        if($_POST["tempahan_id"] != '')  
        {  
            $itemp = new data();
            $itemp->update('tbl_tempahan',[
                'temp_fasiliti_id'=>$temp_fasiliti_id,
                'temp_kegunaan'=>$temp_kegunaan,
                'temp_sdate'=>$temp_sdate,
                'temp_edate'=>$temp_edate,
                'temp_status'=>$temp_status
            ],"tempahan_id ='".$_POST["tempahan_id"]."'");
        }  
        else  
        {  
            $itemp = new data();
            $itemp->insert('tbl_tempahan',[
                'temp_fasiliti_id'=>$temp_fasiliti_id,
                'temp_kegunaan'=>$temp_kegunaan,
                'temp_sdate'=>$temp_sdate,
                'temp_edate'=>$temp_edate,
                'temp_status'=>$temp_status
            ]);
        }
    }

    //generate update list
    if($itemp == true){  
        $output='';        

        $list = new data();
        $list->select("tbl_tempahan
        INNER JOIN tbl_sekolah_fasiliti ON tbl_tempahan.temp_fasiliti_id = tbl_sekolah_fasiliti.fasiliti_id
        INNER JOIN tbl_sekolah ON tbl_sekolah_fasiliti.fas_sek_id = tbl_sekolah.sekolah_id",
        "tbl_tempahan.tempahan_id,
        tbl_tempahan.temp_kegunaan,
        tbl_tempahan.temp_sdate,
        tbl_tempahan.temp_edate,
        tbl_tempahan.temp_status,
        tbl_sekolah_fasiliti.fas_nama,
        tbl_sekolah.sek_ppd_id,
        tbl_sekolah_fasiliti.fas_sek_id",  $where );
        $tempahan = $list->sql; 
        $output .= '  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">Bil</th>
                        <th width="25%">Fasiliti</th>
                        <th width="30%">Kegunaan</th>
                        <th width="10%">Mula</th>
                        <th width="10%">Tamat</th>
                        <th width="10%">Status</th>
                        <th width="10%">#</th>
                    </tr>
                </thead>
                <tbody>
        '; 
        $bil=1; 
        while($row = mysqli_fetch_assoc($tempahan))  
        {  
            $output .= ' 
            <tr>
                <td>'.$bil++.'</td>
                <td>'.$row['fas_nama'].'</td>
                <td>'.$row['temp_kegunaan'].'</td>
                <td>'.date('d-m-Y', strtotime($row['temp_sdate'])).'</td>
                <td>'.date('d-m-Y', strtotime($row['temp_edate'])).'</td>
                <td>'.$row['temp_status'].'</td>
                <td>
                <a href="#" id="'.$row['tempahan_id'].'" class="btn btn-xs btn-info edit_data">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" id="'.$row['tempahan_id'].'" class="btn btn-xs btn-danger del_data">
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