<?php 
if (!isset($_SESSION)) session_start();
if (!in_array($_SESSION['SB_level'],$berwenang)) {
    echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Gagal login! </strong>Anda dilarang menggunkan modul ini karena level anda adalah : '.$_SESSION['SB_level'].'</div>';
  exit();
}
?>