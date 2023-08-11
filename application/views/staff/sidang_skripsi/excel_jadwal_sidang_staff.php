<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman Cetak</title>
</head>
<body>
<?php 
date_default_timezone_set('Asia/Jakarta');
$tanggal_sidang=$this->Model->read_detail('id',$idtanggal,'tanggal_sidang');
$lengkap=date("d-m-Y H:i:s");
$tanggal=date("d-m-Y");
function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
  } 
header('Content-type: application/vnd.ms-excel; charset=utf-8');
 
// // Mendefinisikan nama file ekspor "hasil-export.xls"
header('Content-Disposition: attachment; filename='.$prodi.'-'.$tanggal.'-jadwal_sidang_tgl_'.indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'d M  Y','').'-SubagLAA.xls');
?>
	<table width="100%">
		<tr>
			<td colspan="9">
				<h1 align="center">DRAFT PESERTA SIDANG SKRIPSI</h1>
			</td>
		</tr>
    <tr>
      <td colspan="9">
        <h3 align="center">FAKULTAS TEKNOLOGI INFORMASI<br>
        <?php if ($prodi=='TI') {
          echo "TEKNIK INFORMATIKA";
        }elseif ($prodi=='SI') {
          echo "SISTEM INFORMASI";
        }elseif ($prodi=='SK') {
          echo "SISTEM KOMPUTER";
        } ?>
        <br><small>PERIODE : <?=indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'d F Y','');?></small></h3>
      </td>
    </tr>
		<tr>
			<td colspan="6" width="80%">&nbsp;</td>
			<td colspan="3">
			
			</td>
		</tr>
	</table>
	<br/>
		
      <table width="100%" border="1">
        <thead>
          <tr>
            <th style="width: 10px;">NO</th>
            <th style="width: 50px; text-align: center;">HARI</th>
            <th style="width: 50px; text-align: center;">TANGGAL</th>
            <th style="width: 50px; text-align: center;">WAKTU</th>
            <th style="width: 50px; text-align: center;">RUANG</th>
            <th style="width: 50px; text-align: center;">NIM</th>
            <th style="width: 50px; text-align: center;">NAMA</th>
            <th style="width: 50px; text-align: center;">JUDUL SKRIPSI</th>
            <th style="width: 50px; text-align: center;">Penguji I</th>
            <th style="width: 50px; text-align: center;">Penguji II</th>
            <th style="width: 50px; text-align: center;">Pembimbing</th>
          </tr>
        </thead>
        <?php $mahasiswas = $this->Model->lap_jadwal_sidang($idtanggal,$prodi);
        if (!empty($mahasiswas)) {
          $no1=1;
          foreach ($mahasiswas as $mahasiswa) { 
              $dos1=$this->Model->read_detail('noreg',$mahasiswa['penguji1'],'dosen');
              $dos2=$this->Model->read_detail('noreg',$mahasiswa['penguji2'],'dosen');
              $dos3=$this->Model->read_detail('noreg',$mahasiswa['dospem'],'dosen');
              $bataswaktu=strtotime($mahasiswa['waktu'])+(60*90);?>
            <tr>
              <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
              <td style="vertical-align: middle; text-align: center;"><?=indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'l','');?></td>
              <td style="vertical-align: middle;"><?=indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'d M Y','');?></td>
              <td style="vertical-align: middle;"><?= $mahasiswa['waktu'].' - '.date("H:i:s", $bataswaktu);?></td>
              <td style="vertical-align: middle; text-align: center;"><?= $mahasiswa['ruang']?></td>
              <td style="vertical-align: middle;"><?= $mahasiswa['nim'];?></td>
              <td style="vertical-align: middle;"><?= $mahasiswa['nama'];?></td>
              <td align="justify" style="vertical-align: middle;"><?= mb_strtoupper($mahasiswa['judul_skripsi'],'UTF-8');?></td>
              <td style="vertical-align: middle;"><?=$dos1->nama?></td>
              <td style="vertical-align: middle;"><?=$dos2->nama?></td>
              <td style="vertical-align: middle;"><?=$dos3->nama?></td>
            </tr>
        <?php 
          $no1++; 
          }
        }
        ?>
       
      </table>
</body>
</html>