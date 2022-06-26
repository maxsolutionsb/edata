<?php
session_start();
session_destroy(); //destroy the session
echo "<script type='text/javascript'>alert('Anda telah keluar sistem Terima kasih');";
echo "window.location = '../index.php';</script>";
exit;
?>
