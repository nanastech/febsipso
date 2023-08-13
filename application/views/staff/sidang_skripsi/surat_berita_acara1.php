<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Surat Berita Acara 1 | <?= $record->nim ?></title>
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
$tanggal_sidang=$this->Model->read_detail('id',$jadwal->tanggal_id,'tanggal_sidang');?>
<div class="page">
  <br>
  <table width="100%">
    <tr>
      <td colspan="9"><h3 align="center"><strong><u>BERITA ACARA UJIAN SKRIPSI</u></strong><br><small>Nomor: <?= ($jadwal->no_surat ? $jadwal->no_surat : '-')?></small></h3></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" align="justify">Yang bertanda tangan dibawah ini menyatakan bahwa, pada hari ini <?= indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'l, d F Y','');?>, bertempat di Ruang <?=$jadwal->ruang?> Kampus Institut Keuangan Perbankan dan Informatika Asia Perbanas Jakarta Selatan, telah dilaksanakan pendadaran Skripsi mahasiswa :</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 160px">Nama</td>
      <td width="10">&nbsp;:&nbsp;</td>
      <td colspan="7"><strong><?php if (!empty($record->nama)) {
        echo mb_convert_case($record->nama, MB_CASE_TITLE, "UTF-8");
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td>Nomor Induk Mahasiswa</td>
      <td width="10">&nbsp;:&nbsp;</td>
      <td colspan="7"><?php if (!empty($record->nim)) {
        echo $record->nim;
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td>Program Studi</td>
      <td width="10">&nbsp;:&nbsp;</td>
      <td colspan="7"><?php if ($record->program_studi=="TI") {
        echo "Teknik Informatika";
      }elseif ($record->program_studi=="SI") {
        echo "Sistem Informasi";
      }elseif ($record->program_studi=="SK") {
        echo "Sistem Komputer";
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td>Jenjang Pendidikan</td>
      <td width="10">&nbsp;:&nbsp;</td>
      <td colspan="7"><?php if ($record->jenjang_pendidikan=="S1") {
        echo "Strata Satu (S-1)";
      }elseif ($record->jenjang_pendidikan=="S2") {
        echo "Strata Dua (S-2)";
      }elseif ($record->jenjang_pendidikan=="D3") {
        echo "Diploma Tiga (D-3)";
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td valign="top">Judul Skripsi</td>
      <td width="10" valign="top">&nbsp;:&nbsp;</td>
      <td colspan="7" valign="top" align="justify"><strong><?php if (!empty($record->judul_skripsi)) {
        echo mb_convert_case($record->judul_skripsi, MB_CASE_UPPER, "UTF-8");
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td>Ujian berlangsung</td>
      <td width="10">&nbsp;:&nbsp;</td>
      <td colspan="7">dari pukul <?php if (!empty($jadwal->waktu)) {
        $bataswaktu=strtotime($jadwal->waktu)+(60*90);
        echo date("H.i", strtotime($jadwal->waktu)).' - '.date("H.i", $bataswaktu);
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
      <td colspan="9" valign="justify">Demikian berita acara ini dibuat dengan sesungguhnya.</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
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
      <td colspan="3" width="60%">&nbsp;</td>
      <td colspan="3" >&nbsp;</td>
      <td colspan="3" width="40%">Jakarta, <?= indonesian_date(strtotime($tanggal_sidang->tgl_sidang),'d F Y','');?></font></td>
    </tr>
    <tr>
      <td colspan="3" >Mengetahui,<br>Ketua Program Studi,</td>
      <td colspan="3" >&nbsp;</td>
      <td colspan="3" >Yang bersangkutan,</td>
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
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="3" >
        <?php 
          $noreg = $this->Model->read_detail('prodi',$record->program_studi,'kaprodi');
          if (!empty($noreg)) {
            $kaprodi=$this->Model->read_detail('noreg',$noreg->noreg,'dosen');
            echo $kaprodi->nama;
           }else{
            echo "-";
           }
        ?>
      </td>
      <td colspan="3" >&nbsp;</td>
      <td colspan="3" ><?=mb_convert_case($record->nama, MB_CASE_TITLE, "UTF-8");?></td>
    </tr>
  </table>
</div>
</body>
</html>
