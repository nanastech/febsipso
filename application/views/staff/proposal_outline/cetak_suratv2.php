<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Surat Ketersediaan Pembimbing Skripsi | <?= $record->nim ?></title>
  <style>
  @page { 
    size:21.59cm 35.56cm; /*ukuran kertas legal*/
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
<div class="page">

  <table width="100%">
    <tr>
      <td colspan="2">Jakarta, <?= indonesian_date(time(),'j F  Y','');?></td>
      <td colspan="7"></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">Nomor &nbsp;: <?php if (!empty($record->no_surat)) {
        echo $record->no_surat;
      }else{
        echo "-";
        } ?></td>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td colspan="3">Perihal &nbsp;: Pembimbing Skripsi</td>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">Yang Terhormat &nbsp;: </td>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td colspan="3"><strong><?php if (!empty($record->dospemfix)) {
        $dosen=$this->Model->read_detail('noreg',$record->dospemfix,'dosen');
        echo $dosen->nama;
      }else{
        echo "-";
        } ?></strong></td>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td colspan="3">Dosen Pembimbing Skripsi</td>
      <td colspan="6"></td>
    </tr>
  <!-- <tr>
    <td colspan="3">Fakultas Teknologi Informasi</td>
    <td colspan="6"></td>
  </tr> -->
    <tr>
      <td colspan="3">IKPIA PERBANAS</td>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" align="justify"><font>Dengan ini kami sampaikan bahwa yang namanya tersebut dibawah ini bermaksud menyusun skripsi :</font></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>

    <tr>
      <td style="width: 160px">Nama</td>
      <td width="10">:</td>
      <td colspan="7"><strong><?php if (!empty($record->nama)) {
        echo ucwords($record->nama);
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td>NIM</td>
      <td width="10">:</td>
      <td colspan="7"><?php if (!empty($record->nim)) {
        echo $record->nim;
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td>Jenjang/ Program Studi</td>
      <td width="10">:</td>
      <td colspan="7"><?php if (!empty($record->jurusan)) {
        if ($record->jurusan=='TI'){
    		echo 'S1 Teknik Informatika';
  		}elseif ($record->jurusan=='SK') {
          echo 'S1 Sistem Komputer';
        }elseif ($record->jurusan=='SI') {
          echo 'S1 Sistem Informasi';
        }elseif ($record->jurusan=='ADB') {
          echo 'S1 Analitika Data Bisnis';
        }elseif ($record->jurusan=='MAKSI') {
          echo 'S2 Magister Akuntansi';
        }elseif ($record->jurusan=='MM') {
          echo 'S2 Magister Manajemen';
        }elseif ($record->jurusan=='PPAK') {
          echo 'Pendidikan Profesi Akuntansi';
        }elseif ($record->jurusan=='DAK') {
          echo 'D3 Akuntansi';
        }elseif ($record->jurusan=='DKP') {
          echo 'D3 Keuangan & Perbankan';
        }elseif ($record->jurusan=='AK') {
          echo 'S1 Akuntasi';
        }elseif ($record->jurusan=='M') {
          echo 'S1 Manajemen';
        }elseif ($record->jurusan=='ES') {
          echo 'S1 Ekonomi Syariah';
        }else{
          echo "-";
        }
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td valign="top">Alamat</td>
      <td width="10" valign="top">:</td>
      <td colspan="7" valign="top" align="justify"><?php if (!empty($record->alamat)) {
        echo ucwords($record->alamat);
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td width="10">:</td>
      <td colspan="7"><?php if (!empty($record->nohp)) {
        echo $record->nohp;
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td valign="top">Judul</td>
      <td width="10" valign="top">:</td>
      <td colspan="7" valign="top" align="justify"><strong><?php if (!empty($record->topikfix)) {
        echo mb_convert_case($record->topikfix, MB_CASE_UPPER, "UTF-8");
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9" align="justify"><font>Sehubungan dengan itu, kami mohon kesediaan Bapak/ Ibu untuk menjadi <strong>Pembimbing</strong>  skripsi mahasiswa tersebut dengan menitikberatkan bimbingan pada materi sekaligus teknik penulisan.</font></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9" align="justify"><font>Apabila Bapak/ Ibu tidak keberatan, kami mohon untuk menandatangani surat kesediaan sebagai dosen pembimbing skripsi yang dilampirkan dan mengembalikannya kepada kami melalui mahasiswa tersebut di atas.</font></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9"><font>Atas perhatian dan kesediaan Bapak/ Ibu, disampaikan terima kasih.</font></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9"><font>Kepala Program Studi <?php 
        if ($record->jurusan=='TI'){
    	  echo 'Teknik Informatika';
        }elseif ($record->jurusan=='SK') {
          echo 'Sistem Komputer';
        }elseif ($record->jurusan=='SI') {
          echo 'Sistem Informasi';
        }elseif ($record->jurusan=='ADB') {
          echo 'Analitika Data Bisnis';
        }elseif ($record->jurusan=='MAKSI') {
          echo 'Magister Akuntansi';
        }elseif ($record->jurusan=='MM') {
          echo 'Magister Manajemen';
        }elseif ($record->jurusan=='PPAK') {
          echo 'Pendidikan Profesi Akuntansi';
        }elseif ($record->jurusan=='DAK') {
          echo 'Akuntansi';
        }elseif ($record->jurusan=='DKP') {
          echo 'Keuangan & Perbankan';
        }elseif ($record->jurusan=='AK') {
          echo 'Akuntasi';
        }elseif ($record->jurusan=='M') {
          echo 'Manajemen';
        }elseif ($record->jurusan=='ES') {
          echo 'Ekonomi Syariah';
  		} ?>,</font></td>
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
      <td colspan="9"><font><?php 
                      $noreg = $this->Model->read_detail('prodi',$record->jurusan,'kaprodi');
                      if (!empty($noreg)) {
                        $kaprodi=$this->Model->read_detail('noreg',$noreg->noreg,'dosen');
                        echo $kaprodi->nama;
                       }else{
                        echo "-";
                        }
                      ?></font></td>
    </tr>
    
  </table>
</div>
<div class="page">
  <br>
  <table width="100%">
    <tr>
      <td colspan="9"><h2 align="center"><strong>SURAT KESEDIAAN SEBAGAI DOSEN PEMBIMBING SKRIPSI<hr></strong></h2></td>
    </tr>
    <tr>
      <td colspan="3">Yang bertanda tangan di bawah ini :</td>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td style="width: 160px"><strong>Nama Dosen</strong></td>
      <td width="10"><strong>:</strong></td>
      <td colspan="7"><strong><?php if ($dosen->nama) {
        echo $dosen->nama;
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td style="width: 160px"><strong>Nomor Reg. Dosen</strong></td>
      <td width="10"><strong>:</strong></td>
      <td colspan="7"><strong><?php if ($dosen->noreg) {
        echo $dosen->noreg;
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9" align="justify"><font>menyatakan <strong>bersedia / tidak bersedia*)</strong> menjadi pembimbing skripsi mahasiswa IKPIA Perbanas,</font></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td style="width: 160px">Nama</td>
      <td width="10">:</td>
      <td colspan="7"><strong><?php if (!empty($record->nama)) {
        echo ucwords($record->nama);
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td>NIM</td>
      <td width="10">:</td>
      <td colspan="7"><?php if (!empty($record->nim)) {
        echo $record->nim;
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td valign="top">Alamat</td>
      <td width="10" valign="top">:</td>
      <td colspan="7" valign="top" align="justify"><?php if (!empty($record->alamat)) {
        echo ucwords($record->alamat);
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td>Telepon</td>
      <td width="10">:</td>
      <td colspan="7"><?php if (!empty($record->nohp)) {
        echo $record->nohp;
      }else{
        echo "-";
        } ?></td>
    </tr>
    <tr>
      <td valign="top">Judul</td>
      <td width="10" valign="top">:</td>
      <td colspan="7" valign="top" align="justify"><strong><?php if (!empty($record->topikfix)) {
        echo strtoupper($record->topikfix);
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td colspan="9"></td>
    </tr>
    <tr>
      <td colspan="9" valign="justify"><font>Sehubungan dengan itu, kami mohon kesediaan Bapak/ Ibu untuk menjadi <strong>Pembimbing</strong>  skripsi mahasiswa tersebut dengan menitikberatkan bimbingan pada materi sekaligus teknik penulisan.</font></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9"><font>Jakarta,  ..... /............................... / <?= date('Y') ?></font></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9"><font>Yang menyatakan,</font></td>
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
      <td colspan="3"><font><?php if ($dosen->nama) {
        echo '<u>'.$dosen->nama.'</u><br> Dosen Pembimbing';
      }else{
        echo "-";
        } ?></font></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="9">*) Coret yang tidak perlu</td>
    </tr>
    
  </table>
</div>
</body>
</html>
