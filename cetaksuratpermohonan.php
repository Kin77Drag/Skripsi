<?php
		include('koneksi.db.php');
		if (isset($_GET['idSurat'])){
			$NomorSurat=filter_var($_GET['idSurat'],FILTER_SANITIZE_STRING);
			$sql="SELECT * FROM `headersurat` WHERE idSurat='".$NomorSurat."'";
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
                        Bengkulu, <?php echo date_format(date_create($r['TglSurat']),'d-m-Y');?>
                        </div>
                    </td>
                </tr>
            </table>
            <table width="615">
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Nomor</td>
                    <td style="font-size: 12px; font-family: time new romance; width: 182px;" width="100">: <?php echo $r['NomorSurat']; ?>
                        <input style="font-size: 12px; font-family: time new romance; width: 182px;" id="IdSurat" name="IdSurat" type="hidden" value="<?php echo $r['IdSurat']; ?>">
                    </td> 
                    <td width="500" style="font-size: 12px; font-family: time new romance; line-height:1.5;">
                        Kepada Yth.
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Sifat</td>
                    <td style= "font-size: 12px; font-family: time new romance; width: 182px;" width="100">: <?php echo $r['SifatSurat'];?>
                    </td> 
                    <td style="line-height:1.5;" class="">
                        <input style="font-size: 12px; font-family: time new romance; width: 150px;" id="TujuanSurat" name="TujuanSurat" 
                        type="text" class="form-control" value="<?php echo $r['TujuanSurat'];?>">
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;">Lampiran</td>
                    <td style="font-size: 12px; font-family: time new romance; width: 182px;" width="100">: <?php echo $r['Lampiran']; ?>
                    </td> 
                    <td style="font-size: 12px; font-family: time new romance; line-height:1.5;">
                        Di-
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 12px; font-family: time new romance;" valign="top">Perihal</td>
                    <td style="font-size: 12px; font-family: time new romance; width: 320px; text-align: left;"width="581">: <?php echo $r['Perihal']; ?>
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
                    <td style="font-size: 12px; font-family: time new romance;" valign="top">Tanggal</td>
                    <td class="col" style="font-size: 12px; font-family: time new romance;"> : <?php echo date_format(date_create($r['TanggalAwal']),'l, d-m-Y');?> s/d <?php echo  $r['TanggalAkhir'];?>
                    </td>
                </tr>
                <tr>
                    <td width="55"></td>
                    <td style="font-size: 12px; font-family: time new romance;">Tempat</td>
                    <td style="font-size: 12px; font-family: time new romance; width: 320px;" style="line-height:1.5;">: <?php echo $r['TempatKegiatan']; ?>
                    </td>
                </tr>
                <tr>
                    <td width="55"></td>
                    <td style="font-size: 12px; font-family: time new romance;" valign="top">Acara</td>
                    <td style="font-size: 12px; font-family: time new romance; width: 320px;" style="line-height:1.5;">: <?php echo $r['AcaraKegiatan']; ?>
                    </td>
                </tr>
        <tr>
            <td width="55"></td>
            <td style="font-size: 12px; font-family: time new romance;" valign="top">Peserta : </td>
            <td>
                <ol>
                <?php $sqlps="select ps.*,p.nama_lengkap from pesertakegiatan ps inner join pengguna p ON ps.id_login = p.id_login where ps.idSurat='".$r['IdSurat']."' and p.idlevel <>'5'";
                $qps=mysqli_query($koneksi,$sqlps);
                $rps=mysqli_fetch_array($qps);
                if (!empty($rps)) {
                    do {
                        echo "<li>".$rps['nama_lengkap'];
                        echo "</li>";
                    } while($rps=mysqli_fetch_array($qps));
                }
                ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td width="55"></td>
            <td style="font-size: 12px; font-family: time new romance;" valign="top">Pendamping : </td>
            <td>
                <ol>
                <?php $sqlps="select ps.*,p.nama_lengkap from pesertakegiatan ps inner join pengguna p ON ps.id_login = p.id_login where ps.idSurat='".$r['IdSurat']."' and p.idlevel='5'";
                $qps=mysqli_query($koneksi,$sqlps);
                $rps=mysqli_fetch_array($qps);
                if (!empty($rps)) {
                    do {
                        echo "<li>".$rps['nama_lengkap'];
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
                    <td style="font-size: 12px; font-family: time new romance; width: 320px;" style="line-height:1.5;">: <?php echo $r['AlatAngkutan']; ?>
                </tr>
            </table>
            <table width="612">
                <tr>
                    <td colspan="2" align="justify" style="font-size: 12px; font-family: time new romance; line-height:1.5;">
                                
                            <p style="text-align:justify; text-indent: 0.5in;">Berkenaan dengan hal tersebut, bersama ini dengan hormat agar Saudara berkenan untuk menerima dan diagendakan kegiatan dimaksud.
                            </p> 
                            <p style="text-align:justify; text-indent: 0.5in;">Demikian disampaikan atas kerjasamanya dihaturkan terima kasih.</p>
                    </td>
                </tr>
                <tr>
                    <td colspan=2 align="center">DEWAN PERWAKILAN RAKYAT DAERAH<br>KOTA BENGKULU</td>
                </tr>
                <tr>
                    <td width="50%">
                        <ol>
                <?php $sqlps="select ps.*,p.nama_lengkap from pesertakegiatan ps inner join pengguna p ON ps.id_login = p.id_login where ps.idSurat='".$r['IdSurat']."' and p.idlevel <> 5";
                $qps=mysqli_query($koneksi,$sqlps);
                $rps=mysqli_fetch_array($qps);
                if (!empty($rps)) {
                    do {
                        echo "<li>".$rps['nama_lengkap'];
                        echo "</li>";
                    } while($rps=mysqli_fetch_array($qps));
                }
                ?>
                </ol>
                    </td>
                    <td align="right">
                    <ol>
                <?php $sqlps="select ps.*,p.nama_lengkap from pesertakegiatan ps inner join pengguna p ON ps.id_login = p.id_login where ps.idSurat='".$r['IdSurat']."' and p.idlevel <> 5";
                $qps=mysqli_query($koneksi,$sqlps);
                $rps=mysqli_fetch_array($qps);
                include('qrcode/qrlib.php');
                if (!empty($rps)) {
                    do {
                        echo "<li>. &nbsp;";
                        $filename=date('YmdHis').".png";
                        $errorCorrectionLevel = 'H';
                        $matrixPointSize = 1;
                        $url="http://localhost/cetaksuratpermohonan.php?idSurat=".$NomorSurat;
                        $chipertext=base64_encode($url);
                        QRcode::png($chipertext, $filename, $errorCorrectionLevel, $matrixPointSize, 1);
                        echo '<img src="'.$filename.'">';
                        echo "</li>";
                    } while($rps=mysqli_fetch_array($qps));
                }
                ?>
                </ol>
                    </td>    
                </tr>
            </table>
</body>
</html>
