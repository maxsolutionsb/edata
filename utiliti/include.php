<?php

function userRole($role){
    if($role==1)
        return 'Pentadbir Sistem';
    else if($role==2)
        return 'Pentadbir PPD';
    else if($role==3)
        return 'Sekolah';
    else
        return 'Tiada Peranan';
}  

function tempahanStatus($id){
    if($id==1)
        return 'Baru';
    else if($id==2)
        return 'Sah';
    else if($id==3)
        return 'Tidak Sah';
    else
        return 'Batal';
}   

?>