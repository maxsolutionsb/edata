<?php  
include('data.php');
include 'utiliti/include.php';

if(!empty($_POST)){
    if(isset($_POST['del_action'])){
        $isek = new data();
        $isek->delete("tbl_sekolah", "sekolah_id = ".$_POST["del_sekolah_id"] );
    }
    else{
        $output = '';  
        $message = '';
        $sek_kod = $_POST["kod_sekolah"];  
        $sek_nama = $_POST["nama_sekolah"];  
        $sek_jenis = $_POST["jenis"];  
        $sek_ptj = $_POST["ptj"];  
        $sek_lokasi = $_POST["lokasi"];
        $sek_alamat1 = $_POST["alamat_baris1"];
        $sek_alamat2 = $_POST["alamat_baris2"]; 
        $sek_alamat3 = $_POST["alamat_baris3"]; 
        $sek_poskod = $_POST["poskod"];  
        $sek_daerah_id = $_POST["daerah"];  
        $sek_negeri_id = $_POST["negeri"];  
        $sek_ppd_id = $_POST["ppd"];
        $sek_phone = $_POST["no_telefon"];  
        $sek_emel = $_POST["emel"];
        
        if($_POST["sekolah_id"] != '')  
        {  
            $isek = new data();
            $isek->update('tbl_sekolah',[
                'sek_kod'=>$sek_kod,
                'sek_nama'=>$sek_nama,
                'sek_jenis'=>$sek_jenis,
                'sek_ptj'=>$sek_ptj,
                'sek_lokasi'=>$sek_lokasi,
                'sek_alamat1'=>$sek_alamat1,
                'sek_alamat2'=>$sek_alamat2,
                'sek_alamat3'=>$sek_alamat3,
                'sek_poskod'=>$sek_poskod,
                'sek_daerah_id'=>$sek_daerah_id,
                'sek_negeri_id'=>$sek_negeri_id,
                'sek_ppd_id'=>$sek_ppd_id,
                'sek_phone'=>$sek_phone,
                'sek_emel'=>$sek_emel,
            ],"sekolah_id ='".$_POST["sekolah_id"]."'");
        }  
        else  
        {  
            $isek = new data();
            $isek->insert('tbl_sekolah',[
                'sek_kod'=>$sek_kod,
                'sek_nama'=>$sek_nama,
                'sek_jenis'=>$sek_jenis,
                'sek_ptj'=>$sek_ptj,
                'sek_lokasi'=>$sek_lokasi,
                'sek_alamat1'=>$sek_alamat1,
                'sek_alamat2'=>$sek_alamat2,
                'sek_alamat3'=>$sek_alamat3,
                'sek_poskod'=>$sek_poskod,
                'sek_daerah_id'=>$sek_daerah_id,
                'sek_negeri_id'=>$sek_negeri_id,
                'sek_ppd_id'=>$sek_ppd_id,
                'sek_phone'=>$sek_phone,
                'sek_emel'=>$sek_emel,
            ]);  
        }
    }

    //generate update list
    if($isek == true){  
        $output='';
        $lssekolah = new data();
        $lssekolah->select("tbl_sekolah
        INNER JOIN tbl_ppd ON tbl_sekolah.sek_ppd_id = tbl_ppd.ppd_id",
        "tbl_sekolah.sekolah_id,
        tbl_sekolah.sek_kod,
        tbl_sekolah.sek_nama,
        tbl_ppd.ppd_nama,
        tbl_sekolah.sek_jenis");
        $sekolah = $lssekolah->sql; 
        $output .= '  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kod</th>
                        <th>Sekolah</th>
                        <th>Jenis</th>
                        <th>PPD</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
        ';  
        while($row = mysqli_fetch_assoc($sekolah))  
        {  
            $output .= ' 
            <tr>
                <td>'.$row['sek_kod'].'</td>
                <td>'.$row['sek_nama'].'</td>
                <td>'.$row['sek_jenis'].'</td>
                <td>'.$row['ppd_nama'].'</td>
                <td>
                <a href="#" id="'.$row['sekolah_id'].'" class="btn btn-xs btn-info edit_data">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" id="'.$row['sekolah_id'].'" class="btn btn-xs btn-danger del_data">
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