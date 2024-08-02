<?php
if ((isset($_GET['id_login'])) and (isset($_GET['ns']))) {
    include('koneksi.db.php');
    $id_login=filter_var($_GET['id_login'],FILTER_SANITIZE_STRING);
    $ns=filter_var($_GET['ns'],FILTER_SANITIZE_STRING);
    $sql="SELECT * FROM `headersurat` WHERE idSurat='".$ns."'";
	$q=mysqli_query($koneksi, $sql);
	$r=mysqli_fetch_array($q);
    $sqld="DELETE FROM `pesertakegiatan` WHERE idSurat = '".$ns."' and id_login='".$id_login."'";
    $qd=mysqli_query($koneksi,$sqld);
    echo "<script>window.location.href='formpermohonanisi.php?NomorSurat=".$r['NomorSurat']."';</script>";
}
?>