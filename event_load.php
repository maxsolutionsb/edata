<?php 
session_start();
include 'utiliti/data.php';

$where="";
if($_SESSION['UKIDRole']==1){
  $where = " 1=1 ORDER BY tbl_tempahan.temp_sdate ";
}
else if($_SESSION['UKIDRole']==2){
  $where = "tbl_sekolah.sek_ppd_id = ".$_SESSION['UKIDPPD']." ORDER BY tbl_tempahan.temp_sdate";
}
else{
  $where = "tbl_sekolah.sekolah_id = ".$_SESSION['UKIDSekolah']." ORDER BY tbl_tempahan.temp_sdate";
}

$calitem = new data();
$calitem->select("tbl_tempahan
INNER JOIN tbl_sekolah_fasiliti ON tbl_tempahan.temp_fasiliti_id = tbl_sekolah_fasiliti.fasiliti_id
INNER JOIN tbl_sekolah ON tbl_sekolah_fasiliti.fas_sek_id = tbl_sekolah.sekolah_id
INNER JOIN tbl_ppd ON tbl_sekolah.sek_ppd_id = tbl_ppd.ppd_id ",
" tbl_tempahan.tempahan_id,
CONCAT(tbl_tempahan.temp_kegunaan,' : ',tbl_sekolah_fasiliti.fas_nama)  as title,
tbl_ppd.ppd_nama,
tbl_tempahan.temp_sdate,
tbl_tempahan.temp_edate ", $where); 
$caltemp = $calitem->sql;

foreach($caltemp as $r){
    $data[] = array(
        'id'        => $r["tempahan_id"],
        'title'     => $r["title"].', '.$r["ppd_nama"],
        'start'     => $r["temp_sdate"],
        'end'       => $r["temp_edate"]
    );
}

echo json_encode($data,  JSON_PRETTY_PRINT);
?>