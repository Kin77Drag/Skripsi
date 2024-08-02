<?php if (!isset($_SESSION)) session_start(); 
include('koneksi.db.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar Permohonan Yang Belum DiValidasi Peserta Kegiatan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Daftar Permohonan Yang Belum Divalidasi Peserta / Anggota Dewan</h2>
  <?php
	$berwenang=['4'];
	include('ceklevelpengguna.php');
	?>
  <p>Silahkan klik tombol lihat dan nanti klik tombol validasi untuk penandatanganan secara digital:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nomor Surat</th>
        <th>Tanggal</th>
        <th>Perihal / Acara</th>
        <th>Persetujuan</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      if (empty($_SESSION['SB_u'])) echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Gagal!</strong>Anda tidak terdaftar sebagai peserta.
      </div>';
      $sql="SELECT h.*,ps.*,p.* FROM `headersurat` h INNER JOIN pesertakegiatan ps ON h.IdSurat = ps.idSurat INNER JOIN pengguna p ON ps.id_login=p.id_login WHERE p.username='".$_SESSION['SB_u']."' order by ps.Setuju desc,h.IdSurat Desc";
      $q=mysqli_query($koneksi,$sql);
      $r=mysqli_fetch_array($q);
      if (empty($r)) {
        echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <strong>Gagal!</strong>Belum ada kegiatan yang mengikutsertakan anda !.
      </div>';
      exit();
      }
      do {
      ?>
      <tr>
        <td><?php @$nmr++; echo $nmr;?></td>
        <td><?php echo $r['NomorSurat'];?></td>
        <td><?php echo date_format(date_create($r['TglSurat']),'d-m-Y');?></td>
        <td><?php echo $r['Perihal'].'<br>'.$r['AcaraKegiatan'];?></td>
        <td><a href="cetaksuratpermohonan.php?idSurat=<?php echo $r['idSurat'];?>" target="_blank" class="btn btn-success">🔎  Lihat</a>
            <?php if ($r['Setuju'] != 'Setuju') {;?><a href="persetujuanpeserta.php?idSurat=<?php echo $r['idSurat'];?>&id_login=<?php echo $r['id_login'];?>" class="btn btn-info" onclick="return confirm('Apakah anda setuju ?');">✅ Setuju</a></td>
      </tr>
      <?php } else {
        echo '<b class="text-success">Sudah disetujui</b>';
      }
    }while($r=mysqli_fetch_array($q)); ?>
    </tbody>
  </table>
</div>

</body>
</html>
