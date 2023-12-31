<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Draft Peserta Sidang</title>
  <script type="text/javascript">
  var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8" /></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>
</head>
<body>
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
// header('Content-type: application/vnd.ms-excel; charset=utf-8');
 
// // // Mendefinisikan nama file ekspor "hasil-export.xls"
// header('Content-Disposition: attachment; filename='.$prodi.'-'.$tanggal.'_Draft_Peserta_Sidang-SubagLAA.xls');
?>
  <?php 
    if ($prodi=='TI') {?>
      <input type="button" onclick="tableToExcel('tabeldata', 'Teknik Informatika')" value="Export to Excel">
    <?php }elseif ($prodi=='SI') {?>
      <input type="button" onclick="tableToExcel('tabeldata', 'Sistem Informasi')" value="Export to Excel">
    <?php }elseif ($prodi=='SK') {?>
      <input type="button" onclick="tableToExcel('tabeldata', 'Sistem Komputer')" value="Export to Excel">
    <?php }
  ?>
  <div id="tabeldata">
	<table width="100%" >
		<tr>
			<td colspan="9">
				<h1 align="center">HASIL AKHIR OUTLINE</h1>
			</td>
		</tr>
    <tr>
      <td colspan="9">
        <h3 align="center">FAKULTAS TEKNOLOGI INFORMASI<br><?php if ($prodi=='TI') {
          echo "TEKNIK INFORMATIKA";
        }elseif ($prodi=='SI') {
          echo "SISTEM INFORMASI";
        }elseif ($prodi=='SK') {
          echo "SISTEM KOMPUTER";
        } ?>
        <br><small>PERIODE : <?=indonesian_date(strtotime($daritgl),'Y','')?>/<?= intval(indonesian_date(strtotime($sampaitgl),'Y',''))+1?></small></h3>
      </td>
    </tr>
		<tr>
			<td colspan="6" width="80%">&nbsp;</td>
			<td colspan="3">
				
			</td>
		</tr>
	</table>
	<br/>
	<i>Dari : <?=indonesian_date(strtotime($daritgl),'d F Y','')?>, Sampai :<?=indonesian_date(strtotime($sampaitgl),'d F Y','')?></i>	
      <table width="100%" border="1">
        <thead>
          <tr>
            <th style="width: 10px;" >NO</th>
            <th style="width: 50px; text-align: center;" >NIM</th>
            <th style="width: 50px; text-align: center;" >NAMA</th>
            <th style="width: 50px; text-align: center;" >TEMPAT, TANGGAL LAHIR</th>
            <th style="width: 50px; text-align: center;" >ALAMAT</th>
            <th style="width: 50px; text-align: center;" >TELP. RUMAH</th>
            <th style="width: 50px; text-align: center;" >HP</th>
            <th style="width: 50px; text-align: center;" >EMAIL</th>
            <th style="width: 50px; text-align: center;">JUDUL</th>
            <th style="width: 50px; text-align: center;" >PEMBIMBING</th>
            <th style="width: 50px; text-align: center;" >REVISI</th>
            <th style="width: 50px; text-align: center;" >STATUS</th>
          </tr>
        </thead>
        <?php 
        if ($status=='diterima') {
        	$mahasiswas = $this->Model->lap_hasil_outline_diterima($daritgl,$sampaitgl,$prodi,'nim','ASC');
        }elseif ($status=='ditolak') {
        	$mahasiswas = $this->Model->lap_hasil_outline_ditolak($daritgl,$sampaitgl,$prodi,'nim','ASC');
        }else{
        	$mahasiswas = '';
        }
        
        $lulus=array('A','A-','B+','B','B-','C+','C');
        if (!empty($mahasiswas)) {
          $no1=1;
          foreach ($mahasiswas as $mahasiswa) { 
            if ($mahasiswa['dospemfix']) {
            	$dosen=$this->Model->read_detail('noreg',$mahasiswa['dospemfix'],'dosen');
            	$namadosen=$dosen->nama;
            }else{
            	$dosen='';
            	$namadosen='-';
            }
            ?>
            <tr>
              <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
              <td style="vertical-align: middle;"><?=$mahasiswa['nim']?></td>
              <td style="vertical-align: middle;"><?=$mahasiswa['nama']?></td>
              <td style="vertical-align: middle;"><?=mb_strtoupper($mahasiswa['tempat'],'UTF-8')?>, <?=indonesian_date(strtotime($mahasiswa['tgllahir']),'d-m-Y','')?></td>
              <td align="justify" style="vertical-align: middle;"><?= mb_strtoupper($mahasiswa['alamat'],'UTF-8');?></td>
              <td style="vertical-align: middle;"><?=str_replace("_","",$mahasiswa['tlpr']);?></td>
              <td style="vertical-align: middle;"><?=str_replace("_","",$mahasiswa['nohp']);?></td>
              <td style="vertical-align: middle;"><?=$mahasiswa['email']?></td>
              <td align="justify" style="vertical-align: middle;"><?php if ($mahasiswa['topikfix']) {
              	echo mb_strtoupper($mahasiswa['topikfix'],'UTF-8');
              }else{
              	echo "-";
              	} ?></td>
              <td style="vertical-align: middle;"><?=$namadosen?></td>
              
              <?php if (empty($mahasiswa['revisi'])) {
                echo '<td style="vertical-align: middle;background-color: #acfca1;">✓</td>';
              }else{
                echo '<td style="vertical-align: middle;background-color: #fca7a1;">✘</td>';
              } ?>
              <?php if ($mahasiswa['status_outline']=='Diterima') {
                echo '<td style="vertical-align: middle;background-color: #acfca1;">✓'.$mahasiswa['status_outline'].'</td>';
              }elseif ($mahasiswa['status_outline']=='Ditolak') {
                echo '<td style="vertical-align: middle;background-color: #fca7a1;">✘'.$mahasiswa['status_outline'].'</td>';
              }else{
                echo "-";
              } ?>

              
            </tr>
        <?php 
          $no1++; 
          }
        }
        ?>
       
      </table>
      </div>
</body>
</html>