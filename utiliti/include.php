<?php

function userRole($role){
    if($role==1)
        return 'Pentadbir';
    else if($role==2)
        return 'PPD';
    else if($role==3)
        return 'Sekolah';
    else
        return 'Tiada Peranan';
}   

?>