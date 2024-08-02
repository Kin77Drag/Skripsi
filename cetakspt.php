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
        <table>
                <tr>
                    <td><img src="images/Logo.png" width="80" height="85"></td>
                    <td>
                        <center>
                            <font size="5" style="font-family: time new romance;"><b>DEWAN PERWAKILAN RAKYAT DAERAH</b>
                            </font><br>
                            <font size="5"><b>KOTA BENGKULU</b></font><br>
                            <font size="2"><i>JL. WR. Supratman Kel. Bentiring Permai Telp. 
                                (0736) 7310026-7310454-7310455 Fax 7310026</i></font><br> 
                            <font size="3" style="font-family: time new romance;"><b>BENGKULU</b></font><br>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            </table><center>
            <table width="614">
                <tr>
                    <td>
                        <center>
                            <font size="4" style="font-family: 'Times New Roman', Times, serif;"><u><b>SURAT PERINTAH TUGAS</b></u></font><br>
                            <font size="3" style="font-family: 'Times New Roman', Times, serif;">Nomor  : <input type="text" name="no_surat_1" style="font-size: 12px; font-family: time new romance; width: 100px;">
                        </center>
                    </td>
                </tr>
            </table>
            <table width="614">
                <tr>
                    <td style="text-align: left;" valign="top" width="20%">1. Dasar </td>
                    <td valign="top" width="1%">:</td> 
                    <td width="79%"><ol>
                        <li>Peraturan Walikota Bengkulu Nomor 32 Tahun 2022 Tentang Perjalanan Dinas Pemerintah Kota Bengkulu Tahun Anggaran 2023.</li>
                        <li>Pengajuan dari Anggota DPRD Kota Bengkulu Nomor : <?php echo $r['NomorSurat']; ?> Tanggal <?php echo date_format(date_create($r['TglSurat']),'d-m-Y');?>  Perihal Permohonan Kunjungan Kerja</li>
                        <li>Persetujuan Ketua DPRD  Kota Bengkulu tanggal 05 Setember  2023<</li>
                    </td>     
                </tr>
                <tr><td colspan="3">
                    <center><font size="3" style="font-family: 'Times New Roman', Times, serif;"><b>MEMERINTAHKAN</b></font></center>
                </td>
                </tr>
                <tr>
                    <td valign="top" width="20%">2. Kepada</td>
                    <td valign="top" width="1%">:</td>
                    <td width="79%"> Nama / NIP / Jabatan<br>
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
                    <td valign="top" width="20%">3. Untuk</td>
                    <td valign="top" width="1%">:</td>
                    <td><?php echo $r['AcaraKegiatan']; ?></td>
                </tr>
                <tr>
                    <td valign="top" width="20%">4.	Tanggal</td>
                    <td valign="top" width="1%">:</td>
                    <td><?php echo date_format(date_create($r['TanggalAwal']),'d-m-Y').' s/d '.date_format(date_create($r['TanggalAkhir']),'d-m-Y'); ?></td>
                </tr>
                <tr>
                    <td valign="top" width="20%">5.	Keterangan</td>
                    <td valign="top" width="1%">:</td>
                    <td>
                        <ol>
                            <li>Untuk dilaksanakan dengan penuh rasa tanggung jawab.</li>
                            <li>Membuat laporan tertulis dan tindak lanjut atas  pelaksanaan tugas tersebut.</li>
                        </ol>
                    </td>
                </tr>
            </table>
            <table width="614"><tr><td width="60%"></td><td>Ditetapkan di Bengkulu&emsp;&emsp;<br>
                Pada Tanggal, <?php echo date_format(date_create($r['TanggalAwal']),'d-m-Y')?><br>
                Ketua DPRD Kota Bengkulu&emsp;<br>
                <?php 
                include('qrcode/qrlib.php');
                $filename=date('YmdHis').".png";
                        $errorCorrectionLevel = 'H';
                        $matrixPointSize = 1;
                        $url="http://localhost/cetaksuratpermohonan.php?idSurat=".$NomorSurat;
                        $chipertext=base64_encode($url);
                        QRcode::png($chipertext, $filename, $errorCorrectionLevel, $matrixPointSize, 1);
                        echo '<img src="'.$filename.'">';
                ?>
                <br>
                <font size="3" style="font-family: 'Times New Roman', Times, serif;"><b><u>SUPRIANTO, S.IP.</u></b></font>
                &emsp;&emsp;&emsp13;
            </p></td></tr>
        </table>
</body>
</html>    