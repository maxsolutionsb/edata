<?php  
include('data.php');
include 'include.php';

if(!empty($_POST)){
    if(isset($_POST['del_action'])){
        $iuser = new data();
        $iuser->delete("tbl_pengguna", "user_id = ".$_POST["del_user_id"] );

        $iurole = new data();
        $iurole->delete("tbl_pengguna_role", " pr_user_id = ".$_POST["del_user_id"] );
    }
    else{
        $output = '';  
        $message = '';
        $user_id = $_POST["user_id"];  
        $user_nama = $_POST["user_nama"];  
        $user_nokp = $_POST["user_nokp"];  
        $user_email = $_POST["user_email"];  
        $pr_ppd_id = $_POST["pr_ppd_id"];
        $pr_sekolah_id = $_POST["pr_sekolah_id"];
        $pr_role = $_POST["pr_role"]; 
        
        if($_POST["user_id"] != '')  
        {  
            $iuser = new data();
            $iuser->update('tbl_pengguna',[
                'user_nama'=>$user_nama,
                'user_nokp'=>$user_nokp,
                'user_email'=>$user_email
            ],"user_id ='".$_POST["user_id"]."'");

            $iurole = new data();
            $iurole->update('tbl_pengguna_role',[
                'pr_ppd_id'=>$pr_ppd_id,
                'pr_sekolah_id'=>$pr_sekolah_id,
                'pr_role'=>$pr_role
            ],"pr_user_id ='".$_POST["user_id"]."'");

        }  
        else  
        {  
            $iuser1 = new data();
            $curr_id =  $iuser1->insert1('tbl_pengguna',[
                'user_nama'=>$user_nama,
                'user_nokp'=>$user_nokp,
                'user_email'=>$user_email
            ]);
            if(isset($curr_id)){
                $iuser = true;
                $iurole = new data();
                $iurole->insert('tbl_pengguna_role',[
                    'pr_user_id'=>$curr_id,
                    'pr_ppd_id'=>$pr_ppd_id,
                    'pr_sekolah_id'=>$pr_sekolah_id,
                    'pr_role'=>$pr_role
                ]);
            }
            else{
                $iuser = false;
            }
        }
    }

    //generate update list
    if($iuser == true){  
        $output='';
        $lsuser = new data();
        $lsuser->select("tbl_pengguna
        INNER JOIN tbl_pengguna_role ON tbl_pengguna.user_id = tbl_pengguna_role.pr_user_id
        LEFT JOIN tbl_sekolah ON tbl_pengguna_role.pr_sekolah_id = tbl_sekolah.sekolah_id",
        "tbl_pengguna.user_id,
        tbl_pengguna.user_nama,
        tbl_pengguna.user_nokp,
        tbl_sekolah.sek_nama,
        tbl_pengguna_role.pr_role");
        $user = $lsuser->sql; 
        $output .= '  
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#ID</th>
                        <th>Nama</th>
                        <th class="text-center">No. KP.</th>
                        <th>Sekolah</th>
                        <th>Peranan</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
        ';  
        while($row = mysqli_fetch_assoc($user ))  
        {  
            $output .= ' 
            <tr>
                <td class="text-center">'.$row['user_id'].'</td>
                <td>'.$row['user_nama'].'</td>
                <td class="text-center">'.$row['user_nokp'].'</td>
                <td>'.$row['sek_nama'].'</td>
                <td>'.userRole($row['pr_role']).'</td>
                <td>
                <a href="#" id="'.$row['user_id'].'" class="btn btn-xs btn-info edit_data" title="Kemaskini">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" id="'.$row['user_id'].'" class="btn btn-xs btn-danger del_data" title="Padam">
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