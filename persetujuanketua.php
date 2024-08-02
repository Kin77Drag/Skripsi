<!DOCTYPE html>
<html lang="en">
<head>
  <title>Persetujuan Ketua Dewan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
	$berwenang=['1','7'];
	include('ceklevelpengguna.php');
	?>
    <?php
if  (isset($_GET['idSurat'])) {
    include('koneksi.db.php');
    $idSurat=filter_var($_GET['idSurat'],FILTER_SANITIZE_STRING);
    $sql="UPDATE `headersurat` SET `WaktuPengesahanSPTKetua`= now(),`ValidasiSPTKetua`=1 WHERE `IdSurat`='".$idSurat."' and `ValidasiSPTKabag`=1 and `ValidasiSPTSekwan`=1"; 
    $q=mysqli_query($koneksi,$sql);
    if ($q){
        ?><div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='vaketua.php';"></button>
        <strong>Success!</strong>Persetujuan berhasil !.
        </div><?php
    } else {
        ?><div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='vaketua.php';"></button>
        <strong>Gagal!</strong>Persetujuan gagal !.
        </div><?php
    }
}
?>
</body>
</html>