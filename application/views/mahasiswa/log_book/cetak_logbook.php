<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cetak Log Book Bimbingan <?=$this->session->userdata('username')?></title>
  <style>
  @page { 
    size:auto; 
    margin-top: 4cm;
    margin-bottom: 3cm;
    margin-left: 3cm;
    margin-right: 2cm;
  }
  div.page { page-break-after: always }
  </style>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body onload="window.print()">
<?php 
$dospem=$this->Model->read_detail('nim',$this->session->userdata('username'),'dospem');
$dosen = $this->Model->read_detail('noreg',$dospem->noreg,'dosen');
$outline = $this->Model->read_detail('nim',$this->session->userdata('username'),'outline');
?>
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
      <td colspan="9"><h2 align="center"><strong>Lembar Laporan<br>Bimbingan Skripsi</strong></h2></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    <tr>
   	  <td style="width: 160px"><strong>Mahasiswa</strong></td>
      <td width="10"><strong>:</strong></td>
      <td colspan="7"><strong>[<?=$this->session->userdata('username')?>] <?=$this->session->userdata('name')?></strong></td>
    </tr>
    <tr>
   	  <td style="width: 160px"><strong>Dosen Pembimbing</strong></td>
      <td width="10"><strong>:</strong></td>
      <td colspan="7"><strong><?php if ($dosen->nama) {
        echo '['.$dosen->noreg.'] '.$dosen->nama;
      }else{
        echo "-";
        } ?></strong></td>
    </tr>
    <tr>
      <td colspan="9">&nbsp;</td>
    </tr>
    </table>
    <table border="1" width="100%" cellpadding="5">
    	<tr>
    		<th style="width: 40px;">No.</th>
    		<th style="width: 180px;">Tanggal</th>
    		<th style="width: 450px;">Uraian Bimbingan</th>
    		<th style="width: 250px;">Catatan Pembimbing</th>
    		<th>Mengetahui Pembimbing</th>
    	</tr>
    <?php $bimbingans=$this->Model->read_where('id_dospem',$dospem->id,'log_book');
      $no=1;
      if (empty($bimbingans)) { ?>
        <tr align="center">
          <td colspan="5"><strong class="label label-danger">Data Kosong</strong></td>
        </tr>
      <?php }else{
        foreach ($bimbingans as $bimbingan) { ?>
        <tr>
        	<td valign="top" align="center" height="95"><?= $no;?></td>
        	<td valign="top" align="justify"><?= indonesian_date(strtotime($bimbingan['tanggal']),'d-m-Y','');?></td>
        	<td valign="top" align="justify"><?= $bimbingan['topik'];?></td>
        	<td valign="top" align="justify"><?php if (empty($bimbingan['catatan'])) {
                    echo "-";
                }else{
                    echo $bimbingan['catatan'];
                } ?>
            </td>
        	<td valign="top" align="center">
        		<?php
	                if (empty($bimbingan['accdospem'])) { ?>
	                  <a><span class="fa fa-times-circle-o"></span></a>
	                <?php }else{ ?>
	                  <a><span class="fa fa-check-circle-o"></span></a>
	                  <br>
                        <?php
                          echo '<small class="pull-right"><i>'.indonesian_date(strtotime($bimbingan['tglaccdospem']),'d-m-Y','').'</i></small>';
                         }
                        ?>
        	</td>
        </tr>
	<?php
		$no++;
	    }  
	  }
	?>
    </table>
    
    <table>
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
      <td colspan="9"><font>Mengetahui,</font></td>
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
    
  </table>
  
</div>

</body>
</html>