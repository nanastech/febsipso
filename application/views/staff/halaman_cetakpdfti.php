<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman Cetak</title>
</head>
<body onload="window.print()">
<?php 
date_default_timezone_set('Asia/Jakarta');
$lengkap=date("d-m-Y H:i:s");
$tanggal=date("d-m-Y");
// header('Content-type: application/vnd-ms-excel');
 
// // Mendefinisikan nama file ekspor "hasil-export.xls"
// header('Content-Disposition: attachment; filename='.$tanggal.'laporan_presensi.xls');
?>
	<table width="80%">
		<tr>
			<td colspan="9" >
				<h1 align="center">Draft Perserta Sidang Skripsi</h1>
			</td>
		</tr>
    <tr>
      <td colspan="9" >
        <h3 align="center">Fakultas Teknologi Informasi<br>
        Tenik Informatika
        </h3>

      </td>
    </tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td colspan="3">
				Tanggal : <?= $lengkap;?>
			</td>
		</tr>
	</table>
	<br/>
		<u><strong>Test</strong></u>
      <table class="table table-condensed">
        <tr>
          <th style="width: 10px">#</th>
          <th >Peserta Sidang</th>
          <th>Judul</th>
          <th >Hari</th>
          <th >Tanggal</th>
          <th >Waktu</th>
          <th>Ruang</th>
          <th>Penguji I</th>
          <th>Penguji II</th>
          <th>Pembimbing</th>
        </tr>
        <?php $mahasiswassi = $this->Model->read_where('program_studi','TI','daftar_sidang');
        if (empty($mahasiswassi)) {
          echo "Data Kosong";
        }else{
        $no1=1;
        foreach ($mahasiswassi as $mahasiswasi) { 
          if (!empty($mahasiswasi['accdospem']) && !empty($mahasiswasi['acckaprodi'])  ) {
            
         
          ?>
        <tr>
          <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
          <?php $form=$this->Model->read_detail('nim',$mahasiswasi['nim'],'daftar_sidang');
            ?>
          <td style="vertical-align: middle;width: 140px;text-align: center;">
            <?= '['.$mahasiswasi['nim'].']<br>'.$mahasiswasi['nama'];?>
          </td>
          <td style="vertical-align: middle;">
            <?= $mahasiswasi['judul_skripsi']?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
          <?php 
              $jadwal = $this->Model->read_detail('nim',$mahasiswasi['nim'],'jadwal_sidang');
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
               
                if (date('l',strtotime($jadwal->tanggal))=='Sunday') {
                  $hari='Minggu';
                }elseif (date('l',strtotime($jadwal->tanggal))=='Monday') {
                  $hari='Senin';
                }elseif (date('l',strtotime($jadwal->tanggal))=='Tuesday') {
                  $hari='Selasa';
                }elseif (date('l',strtotime($jadwal->tanggal))=='Wednesday') {
                  $hari='Rabu';
                }elseif (date('l',strtotime($jadwal->tanggal))=='Thursday') {
                  $hari='Kamis';
                }elseif (date('l',strtotime($jadwal->tanggal))=='Friday') {
                  $hari='Jumat';
                }elseif (date('l',strtotime($jadwal->tanggal))=='Saturday') {
                  $hari='Sabtu';
                }
                echo $hari;
              }
          ?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <?php 
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
                echo $jadwal->tanggal;
              }
            ?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <?php 
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
                echo $jadwal->waktu;
              }
            ?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <?php 
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
                echo $jadwal->ruang;
              }
            ?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <?php 
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
                $dosenp1=$this->Model->read_detail('Noreg',$jadwal->penguji1,'dosen_pembimbing');
                echo $dosenp1->Nama;
              }
            ?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <?php 
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
                 $dosenp2=$this->Model->read_detail('Noreg',$jadwal->penguji2,'dosen_pembimbing');
                echo $dosenp2->Nama;
              }
            ?>
          </td>
          <td style="vertical-align: middle; text-align: center;">
            <?php 
              if (empty($jadwal)) {
                echo "Kosong";
              }else{
                 $dosenp3=$this->Model->read_detail('Noreg',$jadwal->pembimbing,'dosen_pembimbing');
                echo $dosenp3->Nama;
              }
            ?>
          </td>
        </tr>
        <?php 
         }else{
          echo "Kosong";
        }
        $no1++; 
        }
        }?>
      </table>
</body>
</html>