<?php
		include('koneksi.db.php');
		if (isset($_GET['NomorSurat'])){
			$NomorSurat=filter_var($_GET['NomorSurat'],FILTER_SANITIZE_STRING);
			$sql="SELECT * FROM `headersurat` WHERE NomorSurat='".$NomorSurat."'";
			$q=mysqli_query($koneksi, $sql);
			$r=mysqli_fetch_array($q);
		} 
			?>
<!DOCTYPE html>
<html>
    <head>
        <title>Surat Permohonaan Dinas Luar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            table tr td{
                font-size: 13px;
            }
            table tr .text{
                text-align: right;
                font-size: 13px;
            }
            .tujuan{
                text-align: center;
                font-size: 13px;
            }
            .Perihal{
                text-align: left,top;
                font-size: 13px;
            }
        </style>
    </head>
    <body>
    
        <center>  
            <form method="post">
            <table width="680">
                <tr>
                    <td><img src="images/LogoDPRD.png" tyle="width: 75;" alt="logo"  height="80"></td>
                    <td>
                        <center>
                            <font size="5" style="font-family: time new romance;"><b>DEWAN PERWAKILAN RAKYAT DAERAH</b></font><br>
                            <font size="5"><b>KOTA BENGKULU</b></font><br>
                            <font size="2"><i>JL. WR. Supratman Kel. Bentiring Permai Telp. (0736) 7310026-7310454-7310455 Fax 7310026</i></font><br> 
                            <font size="3" style="font-family: time new romance;"><b>BENGKULU</b></font><br><br>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            </table>
            <table width="615">
                <tr>
                    <td class="text">
                        <div class="col">
                        <input type="date" class="form-control" id="TglSurat" name="TglSurat" value="<?php echo $r['TglSurat'];?>">
                        </div>
                    </td>
                </tr>
            </table>
            <table width="615">
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Nomor</td>
                    <td width="100">:
                        <input style="font-size: 12px; font-family: time new romance; width: 182px;" id="NomorSurat" name="NomorSurat" type="text" value="<?php echo $r['NomorSurat']; ?>">
                        <input style="font-size: 12px; font-family: time new romance; width: 182px;" id="IdSurat" name="IdSurat" type="hidden" value="<?php echo $r['IdSurat']; ?>">
                    </td> 
                    <td width="500" style="font-size: 12px; font-family: time new romance; line-height:1.5;">
                        Kepada Yth.
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Sifat</td>
                    <td width="100">:
                        <input style= "font-size: 12px; font-family: time new romance; width: 182px;" id="SifatSurat" name="SifatSurat" type="text" value="<?php echo $r['SifatSurat'];?>">
                    </td> 
                    <td style="line-height:1.5;" class="">
                        <input style="font-size: 12px; font-family: time new romance; width: 150px;" id="TujuanSurat" name="TujuanSurat" 
                        type="text" class="form-control" value="<?php echo $r['TujuanSurat'];?>">
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Lampiran</td>
                    <td width="100">:
                        <input style="font-size: 12px; font-family: time new romance; width: 182px;" id="Lampiran" name="Lampiran" type="text" value="<?php echo $r['Lampiran']; ?>">
                    </td> 
                    <td style="font-size: 12px; font-family: time new romance; line-height:1.5;">
                        Di-
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Perihal</td>
                    <td width="581">: 
                        <textarea style="font-size: 12px; font-family: time new romance; width: 320px; text-align: left;" id="Perihal" name="Perihal" class="form-control" cols="50" rows="2">
                        <?php echo $r['Perihal']; ?>
                    </textarea>
                    </td>
                    <td style="line-height:1.5;" class="tujuan" style="font-size: 12px; font-family: time new romance;">
                        <b>Bengkulu</b>
                    </td>
                </tr>
            </table>
            <br>

            <table width="612">
                <tr>
                    <td width="55"></td>
                    <td align="justify" style="font-size: 12px; font-family: time new romance; line-height:1.5;">
                                Dengan Hormat,
                            <p style="text-align:justify; text-indent: 0.5in;">Sehubungan dengan ditetapkannya Program Kerja Pimpinan dan Anggota DPRD 
                                Kota Bengkulu yaitu melaksanakan Kunjungan Kerja, maka dengan ini kami 
                                beritahukan bahwa Anggota DPRD Kota Bengkulu bermaksud melaksanakan
                                Kunjungan Kerja yang akan dilaksanakan pada :
                            </p> 
                    </td>
                </tr>
            </table>
            <br>
            <table width="612">
                <tr>
                    <td width="55"></td>
                    <td style="font-size: 12px; font-family: time new romance;">Tanggal</td>
                    <td class="col"> :
                        <input style="font-size: 12px; font-family: time new romance;" type="date" class="form-control" id="TanggalAwal" name="TanggalAwal" value="<?php echo $r['TanggalAwal'];?>">
                        s/d <input style="font-size: 12px; font-family: time new romance;" id="TanggalAkhir" name="TanggalAkhir" 
                        type="date" class="form-control" value="<?php echo  $r['TanggalAkhir'];?>">
                    </td>
                </tr>
                <tr>
                    <td width="55"></td>
                    <td style="font-size: 12px; font-family: time new romance;">Tempat</td>
                    <td style="line-height:1.5;">:
                        <textarea style="font-size: 12px; font-family: time new romance; width: 320px;" id="TempatKegiatan" name="TempatKegiatan" class="form-control" cols="50" rows="1">
                        <?php echo $r['TempatKegiatan']; ?>
                    </textarea>
                    </td>
                </tr>
                <tr>
                    <td width="55"></td>
                    <td style="font-size: 12px; font-family: time new romance;">Acara</td>
                    <td style="line-height:1.5;">:
                        <textarea style="font-size: 12px; font-family: time new romance; width: 320px;" id="AcaraKegiatan" name="AcaraKegiatan" class="form-control" cols="50" rows="1"> 
                        <?php echo $r['AcaraKegiatan']; ?>
                    </textarea>
                    </td>
                </tr>
        <tr>
            <td width="55"></td>
            <td style="font-size: 12px; font-family: time new romance;">Peserta : <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah Peserta</button></td>
            <td>
                <ol>
                <?php $sqlps="select ps.*,p.nama_lengkap from pesertakegiatan ps inner join pengguna p ON ps.id_login = p.id_login where ps.idSurat='".$r['IdSurat']."' and p.idlevel !='5'";
                $qps=mysqli_query($koneksi,$sqlps);
                $rps=mysqli_fetch_array($qps);
                if (!empty($rps)) {
                    do {
                        echo "<li>".$rps['nama_lengkap'];
                        echo '<a href="hapuspesertakegiatan.php?id_login='.$rps['id_login'].'&ns='.$r['IdSurat'].'" title="Hapus Peserta" onclick="return confirm(\'Apakah yakin peserta '.$rps['nama_lengkap'].' akan dihapus ?\')">🗑️</a>';
                        echo "</li>";
                    } while($rps=mysqli_fetch_array($qps));
                }
                ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td width="55"></td>
            <td style="font-size: 12px; font-family: time new romance;">Pendamping : <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal2">Tambah Pendamping</button></td>
            <td>
                <ol>
                <?php $sqlps="select ps.*,p.nama_lengkap from pesertakegiatan ps inner join pengguna p ON ps.id_login = p.id_login where ps.idSurat='".$r['IdSurat']."' and p.idlevel='5'";
                $qps=mysqli_query($koneksi,$sqlps);
                $rps=mysqli_fetch_array($qps);
                if (!empty($rps)) {
                    do {
                        echo "<li>".$rps['nama_lengkap'];
                        echo '<a href="hapuspesertakegiatan.php?id_login='.$rps['id_login'].'&ns='.$r['IdSurat'].'" title="Hapus Pendamping" onclick="return confirm(\'Apakah yakin pendamping '.$rps['nama_lengkap'].' akan dihapus ?\')">🗑️</a>';
                        echo "</li>";
                    } while($rps=mysqli_fetch_array($qps));
                }
                ?>
                </ol>
            </td>
        </tr>
                <tr>
                    <td width="55"></td>
                    <td style="font-size: 12px; font-family: time new romance;">Alat Transportasi</td>
                    <td style="line-height:1.5;">:
                        <textarea style="font-size: 12px; font-family: time new romance; width: 320px;" id="AlatAngkutan" name="AlatAngkutan" class="form-control" cols="50" rows="1"> 
                        <?php echo $r['AlatAngkutan']; ?>
                    </textarea>
                </tr>
            </table>
            <br>
            <div class="form-group row">
			<div class="offset-4 col-8">
			<button name="submit" type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
<!-- The Modal Peserta-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header Pilih Peserta -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Peserta Kegiatan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form>
      <input id="IdSurat" name="IdSurat" type="hidden" value="<?php echo $r['IdSurat']; ?>">
  <div class="form-group row">
    <label for="id_login" class="col-4 col-form-label">Pilih Peserta</label> 
    <div class="col-8">
      <select id="id_loginp" name="id_loginp" class="custom-select">
        <?php 
        $sqlpengguna="select * from pengguna where id_login not in (select id_login from pesertakegiatan where idSurat='".$r['IdSurat']."' and idlevel !='5') and idlevel != '5'";
        $qpengguna=mysqli_query($koneksi,$sqlpengguna);
        $rpengguna=mysqli_fetch_array($qpengguna);
        do {
        ?>
        <option value="<?php echo $rpengguna['id_login'];?>"><?php echo $rpengguna['nama_lengkap'];?></option>
        <?php }while($rpengguna=mysqli_fetch_array($qpengguna));
        ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="btambahpeserta" type="submit" class="btn btn-primary">Tambahkan</button>
    </div>
  </div>
</form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- The Modal Pendamping-->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pendamping Kegiatan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="post">
      <input id="IdSurat" name="IdSurat" type="hidden" value="<?php echo $r['IdSurat']; ?>">
  <div class="form-group row">
    <label for="id_login" class="col-4 col-form-label">Pilih Pendamping</label> 
    <div class="col-8">
      <select id="id_loginp" name="id_loginp" class="custom-select">
        <?php 
        $sqlpengguna="select * from pengguna where id_login not in (select id_login from pesertakegiatan where idSurat='".$r['IdSurat']."' and idlevel='5') and idlevel = '5'";
        $qpengguna=mysqli_query($koneksi,$sqlpengguna);
        $rpengguna=mysqli_fetch_array($qpengguna);
        if (empty($rpengguna)) {
            echo '<option>Tidak ada pendamping lagi</option>';
        } else { 
        do {
        ?>
        <option value="<?php echo $rpengguna['id_login'];?>"><?php echo $rpengguna['nama_lengkap'];?></option>
        <?php }while($rpengguna=mysqli_fetch_array($qpengguna)); };
        ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="btambahpendamping" type="submit" class="btn btn-primary">Tambahkan</button>
    </div>
  </div>
</form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
		<?php
            if (isset($_POST['btambahpendamping'])) {
                $id_loginp=filter_var($_POST['id_loginp'],FILTER_SANITIZE_STRING);
                $sqlt="INSERT INTO `pesertakegiatan`(`idSurat`, `id_login`) VALUES ('".$r['IdSurat']."','".$id_loginp."')";
                $qt=mysqli_query($koneksi,$sqlt);
                if ($qt) {
                    echo "<script>
			alert('Pendamping sudah ditambahkan'); window.location.href='formpermohonanisi.php?NomorSurat=".$r['NomorSurat']."';</script>";
                }
            }
            if (isset($_POST['btambahpeserta'])) {
                $id_loginp=filter_var($_POST['id_loginp'],FILTER_SANITIZE_STRING);
                $sqlt="INSERT INTO `pesertakegiatan`(`idSurat`, `id_login`) VALUES ('".$r['IdSurat']."','".$id_loginp."')";
                $qt=mysqli_query($koneksi,$sqlt);
                if ($qt) {
                    echo "<script>
			alert('Peserta sudah ditambahkan'); window.location.href='formpermohonanisi.php?NomorSurat=".$r['NomorSurat']."';</script>";
                }
            }
			if (isset($_POST['submit'])){
                $NomorSurat=filter_var($_POST['NomorSurat'],FILTER_SANITIZE_STRING);
                $IdSurat=filter_var($_POST['IdSurat'],FILTER_SANITIZE_STRING);
				$TglSurat=filter_var($_POST['TglSurat'],FILTER_SANITIZE_STRING);
                $SifatSurat=filter_var($_POST['SifatSurat'],FILTER_SANITIZE_STRING);
                $TujuanSurat=filter_var($_POST['TujuanSurat'],FILTER_SANITIZE_STRING);
                $Lampiran=filter_var($_POST['Lampiran'],FILTER_SANITIZE_STRING);
                $Perihal=filter_var($_POST['Perihal'],FILTER_SANITIZE_STRING);
                $TanggalAwal=filter_var($_POST['TanggalAwal'],FILTER_SANITIZE_STRING);
                $TanggalAkhir=filter_var($_POST['TanggalAkhir'],FILTER_SANITIZE_STRING);
                $TempatKegiatan=filter_var($_POST['TempatKegiatan'],FILTER_SANITIZE_STRING);
                $AcaraKegiatan=filter_var($_POST['AcaraKegiatan'],FILTER_SANITIZE_STRING);
                $AlatAngkutan=filter_var($_POST['AlatAngkutan'],FILTER_SANITIZE_STRING);
                include('koneksi.db.php');
				$sql="UPDATE `headersurat` SET `TglSurat`='".$TglSurat."',`NomorSurat`='".$NomorSurat."', `SifatSurat`='".$SifatSurat."',`TujuanSurat`='".$TujuanSurat."',`Lampiran`='".$Lampiran."',`Perihal`='".$Perihal."',`TanggalAwal`='".$TanggalAwal."',`TanggalAkhir`='".$TanggalAkhir."',`TempatKegiatan`='".$TempatKegiatan."',`AcaraKegiatan`='".$AcaraKegiatan."',`AlatAngkutan`='".$AlatAngkutan."' WHERE IdSurat='".$IdSurat."'";
				$q=mysqli_query($koneksi,$sql); //echo $sql;
				
                if ($q){
                    ?><div class="alert alert-success alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='carisurat.php';"></button>
                    <strong>Success!</strong>Record Sudah diganti.
                    </div><?php
                } else {
                    ?><div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.location.href='carisurat.php';"></button>
                    <strong>Gagal!</strong>Record Gagal diganti.
                    </div><?php
                }
			}
		?>
        </center>
    </body>
</html>
