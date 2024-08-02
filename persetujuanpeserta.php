<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Permohonan Yang Belum DiValidasi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
if ((isset($_GET['idSurat'])) and (isset($_GET['id_login']))) {
    include('koneksi.db.php');
    $idSurat=filter_var($_GET['idSurat'],FILTER_SANITIZE_STRING);
    $id_login=filter_var($_GET['id_login'],FILTER_SANITIZE_STRING);
    $sql="UPDATE `pesertakegiatan` SET `Setuju`='Setuju',`WaktuSetuju`= now() WHERE `idSurat`='".$idSurat."' and `id_login`='".$id_login."'";
    $q=mysqli_query($koneksi,$sql);
    if ($q){
        ?><div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='vanggota.php';"></button>
        <strong>Success!</strong>Persetujuan berhasil !.
        </div><?php
    } else {
        ?><div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='vanggota.php';"></button>
        <strong>Gagal!</strong>Persetujuan gagal !.
        </div><?php
    }
}
?>
</body>
</html>