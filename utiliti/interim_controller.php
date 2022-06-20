<?php  
include('data.php');

if(!empty($_POST)){
    if(isset($_POST['del_action'])){
        $isek = new data();
        $isek->delete("tbl_interim", "interim_id = ".$_POST["del_interim_id"] );
    }
    else{
        $output = '';  
        $message = '';
        $inter_bulan = $_POST["inter_bulan"];  
        $inter_jenis = $_POST["inter_jenis"];  
        $inter_file = $_POST["inter_file"];  
        
        
        if($_POST["interim_id"] != '')  
        {  
            $isek = new data();
            $isek->update('tbl_interim',[
                'inter_bulan'=>$inter_bulan,
                'inter_jenis'=>$inter_jenis,
                'inter_file'=>$inter_file
            ],"interim_id ='".$_POST["interim_id"]."'");
        }  
        else  
        {  
            $isek = new data();
            $isek->insert('tbl_interim',[
                'inter_bulan'=>$inter_bulan,
                'inter_jenis'=>$inter_jenis,
                'inter_file'=>$inter_file
            ]);  
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
        tbl_internet_interim.inter_bulan,
        tbl_internet_interim.inter_file");
        $interim = $lsintrm->sql; 
        $output .= '  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="5%">Bil.</th>
                        <th width="60%">Sekolah</th>
                        <th width="10%">Bulan</th>
                        <th width="15%">Fail</th>
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
                <td>'.$row['inter_bulan'].'</td>
                <td>'.$row['inter_file'].'</td>
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