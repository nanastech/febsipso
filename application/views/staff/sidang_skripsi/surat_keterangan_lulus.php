<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Surat Keterangan Lulus| <?= $record->nim ?></title>
  <style>
  @page { 
    size:21cm 29.7cm; /*ukuran kertas 21.59cm 35.56cm legal 21cm 29.7cm A4 21.59cm 27.94cm letter*/
    margin-top: 4cm;
    margin-bottom: 3cm;
    margin-left: 3cm;
    margin-right: 2cm;
  }
  div.page { page-break-after: always }
  </style>
</head>
<body onload="window.print()">
<?php 
date_default_timezone_set('Asia/Jakarta');
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
//\ header('Content-type: application/vnd-ms-word');
 
// // // Mendefinisikan nama file ekspor "hasil-export.xls"
// header('Content-Disposition: attachment; filename='.$tanggal.'laporan_presensi.doc');
?>
<?php $jadwal=$this->Model->read_detail('nim',$record->nim,'jadwal_sidang');
$tanggal_sidang=$this->Model->read_detail('id',$jadwal->tanggal_id,'tanggal_sidang');
$cekyudisium=$this->Model->read_where_dual('nim',$record->nim,'nilai_akhir','0','penilaian');
  if ($cekyudisium) {
    $nilai_angka="[KOSONG]";
    $nilai_huruf="[KOSONG]";
  }else{
    $penilaians=$this->Model->read_where('nim',$record->nim,'penilaian');
    if ($penilaians) {
        $nilai_akhir=0;
       foreach ($penilaians as $penilaian) {
        $nilai_akhir=$nilai_akhir+$penilaian['nilai_akhir'];
      }
      $nilai_angka=number_format((float)$nilai_akhir/3, 2, '.', '');
      if ($nilai_angka>=90) {
        $nilai_huruf='A';
      }elseif ($nilai_angka>=80 && $nilai_angka<=89.99) {
        $nilai_huruf='A-';
      }elseif ($nilai_angka>=75 && $nilai_angka<=79.99) {
        $nilai_huruf='B+';
      }elseif ($nilai_angka>=70 && $nilai_angka<=74.99) {
        $nilai_huruf='B';
      }elseif (total>=65 && total<=69.99) {
        $nilai_huruf='B-';
      }elseif (total>=60 && total<=64.99) {
        $nilai_huruf='C+';
      }elseif (total>=55 && total<=59.99) {
        $nilai_huruf='C';
      }elseif (total<=54.99) {
        $nilai_huruf='TL';
      }
    }else{
      $nilai_angka="[KOSONG]";
      $nilai_huruf="[KOSONG]";
    }
  }
?>
<div class="page">
  <br>
  <table width="100%">
    <tr>
      <td colspan="9"><h3 align="center"><strong>SURAT KETERANGAN LULUS</strong><br><small>Nomor: <?= ($jadwal->no_skl ? $jadwal->no_skl : '-')?></small></h3></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" align="justify">Pimpinan Institut Keuangan Pebankan dan Informatika Asia Perbanas Jakarta, dengan ini menerangkan bahwa :</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 170px">Nama</td>
      <td width="15">&nbsp;:&nbsp;</td>
      <td colspan="7"><strong><?php if (!empty($record->nama)) {
        echo mb_convert_case($record->nama, MB_CASE_TITLE, "UTF-8");
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td>Tempat & Tanggal Lahir</td>
      <td width="15">&nbsp;:&nbsp;</td>
      <td colspan="7"><?php if (!empty($record->tempat)&&!empty($record->tanggal_lahir)) {
        echo $record->tempat.', '.indonesian_date(strtotime($record->tanggal_lahir),'d M  Y','');
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td>Nomor Induk Mahasiswa</td>
      <td width="15">&nbsp;:&nbsp;</td>
      <td colspan="7"><?php if (!empty($record->nim)) {
        echo $record->nim;
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9" align="justify">&emsp;&emsp;telah memenuhi semua persyaratan akademik dan dinyatakan <strong><i>Lulus</i></strong> dari program pendidikan <?php if ($record->jenjang_pendidikan=="S1") {
        echo "Strata Satu";
      }elseif ($record->jenjang_pendidikan=="S2") {
        echo "Strata Dua";
      }elseif ($record->jenjang_pendidikan=="D3") {
        echo "Diploma Tiga";
      }else{
        echo "-";
        } ?> program studi <strong><?php if ($record->program_studi=="TI") {
        echo "Teknik Informatika";
      }elseif ($record->program_studi=="SI") {
        echo "Sistem Informasi";
      }elseif ($record->program_studi=="SK") {
        echo "Sistem Komputer";
      }else{
        echo "-";
        } ?></strong> pada tanggal <?= indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'d F Y','');?>.</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="9" align="justify">Dengan demikian yang bersangkutan memperoleh segala hak dan kewajiban sebagai seorang Sarjana Komputer (S.Kom) sesuai dengan peraturan perundang-undangan yang berlaku.</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="9" align="justify">Surat keterangan ini bersifat sementara dan dinyatakan tidak berlaku setelah ijazah dikeluarkan.</td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <!-- <tr>
      <td colspan="9"><font>Jakarta,  ..... /............................... / <?= date('Y') ?></font></td>
    </tr> -->
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
  </table>
  <table>
    <tr>
      <td colspan="9">Jakarta, <?= indonesian_date(strtotime(date('d-m-Y')),'d F Y','');?></td>
    </tr>
    <tr>
      <td colspan="9">Dekan Fakultas Teknologi Informasi</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9">Dr. Harya Damar Widiputra, S.T.,M.Kom</td>
    </tr>
  </table>
</div>
</body>
</html>
