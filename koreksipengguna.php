<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Lavel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
	include('koneksi.db.php');
	if (isset($_GET['id_login'])){
		$id_login=filter_var($_GET['id_login'],FILTER_SANITIZE_STRING);
		$sql="SELECT * FROM `pengguna` WHERE id_login='".$id_login."'";
		$q=mysqli_query($koneksi, $sql);
		$r=mysqli_fetch_array($q);
	} 
		?>
	<div class="container">
	<h2>Master Tabel Pengguna</h2>	
	<form method="post">
		<div class="form-group row">
			<label for="username" class="col-4 col-form-label">Username</label> 
			<div class="col-8">
			<input id="username" name="username" type="text" class="form-control" value="<?php echo $r['username'];?>">
			<input id="id_login" name="id_login" type="hidden" class="form-control" value="<?php echo $r['id_login'];?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="nama_lengkap" class="col-4 col-form-label">Nama pengguna</label> 
			<div class="col-8">
			<input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control" value="<?php echo $r['nama_lengkap'];?>">
			</div>
		</div>
		<div class="form-group row">
    <label for="password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="password" name="password" type="password" class="form-control" value="<?php echo $r['password'];?>">
    </div>
  </div>
    <div class="form-group row">
			<label for="nik" class="col-4 col-form-label">Nik pengguna</label>  
			<div class="col-8">
			<input id="nik" name="nik" type="text" class="form-control" value="<?php echo $r['nik'];?>">
			</div>
	</div>
	<div class="form-group row">
     <label for="no_pegawai" class="col-4 col-form-label">No. Pegawai</label> 
     <div class="col-8">
      <input id="no_pegawai" name="no_pegawai" type="text" class="form-control" value="<?php echo $r['no_pegawai'];?>">
     </div>
    </div>
		<div class="form-group row">
    <label for="Golongan" class="col-4 col-form-label">Golongan</label> 
    <div class="col-8">
      <select id="Golongan" name="Golongan" class="form-select">
	  <?php $sqlg="select * from Golongan";
		$qg=mysqli_query($koneksi,$sqlg);
		$rg=mysqli_fetch_array($qg); ?>
		<option value="-" <?php if ($r['Golongan']==$rg['Golongan']) echo "Selected";?>>-</option>
		<?php
		do{
			?>
        <option value="<?php echo $rg['Golongan'];?>" <?php if ($r['Golongan']==$rg['Golongan']) echo "Selected";?>><?php echo $rg['Golongan'].' '.$rg['Pangkat'];?></option>
		<?php } while($rg=mysqli_fetch_array($qg));
		?>
      </select>
    </div>
  </div>
		<div class="form-group row">
			<label for="idlevel" class="col-4 col-form-label">Level pengguna</label>  
				<div class="col-8">
				<select class="form-select" name="idlevel" id="idlevel">
						<?php
							$sqllevel="SELECT * FROM `level`";
							$qlevel=mysqli_query($koneksi, $sqllevel);
							$rlevel=mysqli_fetch_array($qlevel);?>
							<option value="-" <?php if ($r['idlevel']=='-') echo "Selected";?>>-</option>
							<?php
							do{
						?>
						<option value="<?php echo $rlevel['idlevel'];?>" <?php if ($r['idlevel']==$rlevel['idlevel']) echo "selected";?>>
						<?php echo $rlevel['namalevel'];?> </option>
						<?php
							} while ($rlevel=mysqli_fetch_array($qlevel));
						?>
				</select>
				</div>
		</div>
		<div class="form-group row">
			<label for="idunit" class="col-4 col-form-label">Unit pengguna</label>  
			<div class="col-8">
				<select class="form-select" name="idunit" id="idunit">
					<?php
						$sqlunit="SELECT * FROM `unit`";
						$qunit=mysqli_query($koneksi, $sqlunit);
						$runit=mysqli_fetch_array($qunit);?>
						<option value="-" <?php if ($r['idunit']==$runit['idunit']) echo "Selected";?>>-</option>
						<?php
						do{
					?>
					<option value="<?php echo $runit['idunit'];?>" <?php if ($r['idunit']==$runit['idunit']) echo "Selected";?>><?php
						echo $runit['idunit'].' '.$runit['namaunit'];
					?></option>
					<?php
						} while ($runit=mysqli_fetch_array($qunit));
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
    <label for="Status" class="col-4 col-form-label">Status Pengguna</label> 
    <div class="col-8">
      <select id="Status" name="Status" class="form-select">
	    <option value="Tidak Aktif" <?php if ($r['Status']=="Tidak Aktif") echo "Selected";?>>Tidak Aktif</option>
		<option value="Aktif" <?php if ($r['Status']=="Aktif") echo "Selected";?>>Aktif</option>
      </select>
    </div>
  </div> 
		<div class="form-group row">
			<div class="offset-4 col-8">
			<button name="submit" type="submit" class="btn btn-primary">Submit</button>
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
			$id_login=filter_var($_POST['id_login'],FILTER_SANITIZE_STRING);

			$sql="UPDATE `pengguna` SET `nik`='".$nik."',`username`='".$username."',`nama_lengkap`='".$nama_lengkap."',`password`='".$password."',`no_pegawai`='".$no_pegawai."',`idlevel`='".$idlevel."',`idunit`='".$idunit."',`Golongan`='".$Golongan."',`Status`='".$Status."' WHERE id_login='".$id_login."'";
			$q=mysqli_query($koneksi,$sql); //echo $sql;
			
			if ($q){
				?><div class="alert alert-success alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='formpengguna.php';"></button>
				<strong>Success!</strong>Record Sudah diganti.
				</div><?php
			} else {
				?><div class="alert alert-danger alert-dismissible">
				<button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='formpengguna.php';"></button>
				<strong>Gagal!</strong>Record Gagal diganti.
				</div><?php
			}
		}
	?>
	</div>

</body>
</html>