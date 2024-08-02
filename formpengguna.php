<?php
include('koneksi.db.php');
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Form pengguna</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
	<h2>Master Tabel Pengguna</h2>	
	<?php
	$berwenang=['7'];
	include('ceklevelpengguna.php');
	?>
	<form method="post">
	<div class="form-group row">
    <label for="nik" class="col-4 col-form-label">NIP</label> 
    <div class="col-8">
      <input id="nik" name="nik" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="username" name="username" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama_lengkap" class="col-4 col-form-label">Nama Lengkap</label> 
    <div class="col-8">
      <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="password" name="password" type="password" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="no_pegawai" class="col-4 col-form-label">No. Pegawai</label> 
    <div class="col-8">
      <input id="no_pegawai" name="no_pegawai" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="Golongan" class="col-4 col-form-label">Golongan</label> 
    <div class="col-8">
      <select id="Golongan" name="Golongan" class="custom-select">
	  <option value="-">-</option>
	  <?php $sqll="select * from Golongan";
		$ql=mysqli_query($koneksi,$sqll);
		$rl=mysqli_fetch_array($ql);
		do{
			?>
        <option value="<?php echo $rl['Golongan'];?>"><?php echo $rl['Golongan'].' '.$rl['Pangkat'];?></option>
		<?php } while($rl=mysqli_fetch_array($ql));
		?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="idlevel" class="col-4 col-form-label">Level Pengguna</label> 
    <div class="col-8">
      <select id="idlevel" name="idlevel" class="custom-select">
	   <option value="-">-</option>
		<?php $sqll="select * from level";
		$ql=mysqli_query($koneksi,$sqll);
		$rl=mysqli_fetch_array($ql);
		do{
			?>
        <option value="<?php echo $rl['idlevel'];?>"><?php echo $rl['namalevel'];?></option>
		<?php } while($rl=mysqli_fetch_array($ql));
		?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="idunit" class="col-4 col-form-label">Unit Pengguna</label> 
    <div class="col-8">
      <select id="idunit" name="idunit" class="custom-select">
	    <option value="-">-</option>
	  <?php $sqll="select * from unit";
		$ql=mysqli_query($koneksi,$sqll);
		$rl=mysqli_fetch_array($ql);
		do{
			?>
        <option value="<?php echo $rl['idunit'];?>"><?php echo $rl['namaunit'];?></option>
		<?php } while($rl=mysqli_fetch_array($ql));
		?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="Status" class="col-4 col-form-label">Status Pengguna</label> 
    <div class="col-8">
      <select id="Status" name="Status" class="custom-select">
	    <option value="Tidak Aktif" selected>Tidak Aktif</option>
		<option value="Aktif">Aktif</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan Rekord Baru</button>
    </div>
  </div>
	</form>
	<?php
		if (isset($_POST['submit'])){
			$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING);
			$nik=filter_var($_POST['nik'],FILTER_SANITIZE_STRING);
			$nama_lengkap=filter_var($_POST['nama_lengkap'],FILTER_SANITIZE_STRING);
			$password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
			$no_pegawai=filter_var($_POST['no_pegawai'],FILTER_SANITIZE_STRING);
			$Golongan=filter_var($_POST['Golongan'],FILTER_SANITIZE_STRING);
			$idlevel=filter_var($_POST['idlevel'],FILTER_SANITIZE_STRING);
			$idunit=filter_var($_POST['idunit'],FILTER_SANITIZE_STRING);
			$Status=filter_var($_POST['Status'],FILTER_SANITIZE_STRING);
			$sql="INSERT INTO `pengguna`(`nik`, `username`, `nama_lengkap`, `password`, `no_pegawai`, `Golongan`, `idlevel`, `idunit`,`Status`) VALUES ('".$nik."','".$username."','".$nama_lengkap."','".$password."','".$no_pegawai."','".$Golongan."','".$idlevel."','".$idunit."','".$Status."')";
			$q=mysqli_query($koneksi,$sql); 
			
			if ($q){
				echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Success!</strong>Record Sudah disimpan.
				</div>';
			} else {
				echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Gagal!</strong>Record Gagal disimpan.
				</div>';
			}
		}
	?>
</div>
<div class="container mt-3">
  <h2>Daftar pengguna</h2>          
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
		<th>Username</th>
        <th>Nama pengguna</th>
		<th>Nik pengguna</th>
		<th>Level pengguna</th>
		<th>Unit pengguna</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$sql='SELECT * FROM `pengguna`'; 
		$q=mysqli_query($koneksi,$sql);
		$r=mysqli_fetch_array($q);
		if (empty($r)){
			echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				<strong>Success!</strong>Record Record tabel tidak ada.
				</div>';
				exit();
		}
		do {
	?>
      <tr>
        <td><?php @$nmr++;echo $nmr;?></td>
        <td><?php echo $r['username'];?></td>
		<td><?php echo $r['nama_lengkap'];?></td>
		<td><?php echo $r['nik'];?></td>
		<td><?php 
			$sqllevel="SELECT * FROM `level` where idlevel = '".$r['idlevel']."'";
			$qlevel=mysqli_query($koneksi, $sqllevel);
			$rlevel=mysqli_fetch_array($qlevel);
			if (!empty($rlevel)) {
			echo $rlevel['namalevel'];
		} else echo 'Tidak terdefinisi';?></td>
		<td><?php 
			$sqlunit="SELECT * FROM `unit` where idunit = '".$r['idunit']."'";
			$qunit=mysqli_query($koneksi, $sqlunit);
			$runit=mysqli_fetch_array($qunit);
			if (!empty($runit)) {
			echo $runit['namaunit'];
			} else echo 'Tidak terdefinisi';?></td>
        <td><a href="koreksipengguna.php?id_login=<?php echo $r['id_login'];?>" target="frmmain" class="btn btn-success" title="Koreksi">🖊️</a>
		<a href="hapuspengguna.php?id_login=<?php echo $r['id_login'];?>" target="frmmain" class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah yakin ingin dihapus?')" >🗑️</a></td>
      </tr>
	  <?php
		} while ($r=mysqli_fetch_array($q));
	  ?>
    </tbody>
  </table>
</div>

</body>
</html>