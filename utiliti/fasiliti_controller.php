<?php  
include('data.php');

if(!empty($_POST)){
    if(isset($_POST['del_action'])){
        $fas_sek_id = $_POST['del_fas_sek_id'];
        $isek = new data();
        $isek->delete("tbl_sekolah_fasiliti", "fasiliti_id = ".$_POST["del_fasiliti_id"] );
    }
    else{
        $output = '';  
        $message = '';
        $fas_nama = $_POST["fas_nama"];
        $fas_sek_id = $_POST["fas_sek_id"];
        $jenis_fasiliti = $_POST["jenis_fasiliti"];  
        $bilangan = $_POST["bilangan"];
        
        if($_POST["fasiliti_id"] != '')  
        {  
            $isek = new data();
            $isek->update('tbl_sekolah_fasiliti',[
                'fas_nama'=>$fas_nama,
                'fas_sek_id'=>$fas_sek_id,
                'fas_jenis'=>$jenis_fasiliti,
                'fas_kuantiti'=>$bilangan
            ],"fasiliti_id ='".$_POST["fasiliti_id"]."'");
        }  
        else  
        {  
            $isek = new data();
            $isek->insert('tbl_sekolah_fasiliti',[
                'fas_nama'=>$fas_nama,
                'fas_sek_id'=>$fas_sek_id,
                'fas_jenis'=>$jenis_fasiliti,
                'fas_kuantiti'=>$bilangan
            ]);  
        }
    }

    //generate update list
    if($isek == true){ 
        $output='';
        $lsfasiliti = new data();
        $lsfasiliti->select("tbl_sekolah_fasiliti", "*", "fas_sek_id='$fas_sek_id' ");
        $fasiliti = $lsfasiliti->sql; 
        $output .= '  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th  class="text-center" width="5%">No.</th>
                        <th width="70%">Jenis</th>
                        <th class="text-center" width="10%">Bilangan</th>
                        <th class="text-center" width="15%">#</th>
                    </tr>
                </thead>
                <tbody>
        ';  
        $bil=1;
        while($row = mysqli_fetch_assoc($fasiliti))  
        {  
            $output .= ' 
            <tr>
                <td>'.$bil++.'</td>
                <td>'.$row['fas_jenis'].'</td>
                <td>'.$row['fas_kuantiti'].'</td>
                <td>
                    <a href="#" id="'.$row['fasiliti_id'].'" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" id="'.$row['fasiliti_id'].'&'.$row['fas_sek_id'].'" class="btn btn-xs btn-danger del_data" title="Padam">
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