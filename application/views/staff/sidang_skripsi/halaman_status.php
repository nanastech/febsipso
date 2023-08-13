<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Status Sidang Skripsi</title>
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

  <!-- Material datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>

  <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> 
  <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> 
  <!--<script type="text/javascript" src="<?= base_url(); ?>assets/bootstrap-material-design/dist/js/bootstrap-material-design.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>-->
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/js/bootstrap-material-datetimepicker.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<script type="text/javascript">
	    //set timezone
	    <?php date_default_timezone_set('Asia/Jakarta'); ?>
	    //buat object date berdasarkan waktu di server
	    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
	    //buat object date berdasarkan waktu di client
	    var clientTime = new Date();
	    //hitung selisih
	    var Diff = serverTime.getTime() - clientTime.getTime();    
	    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
	    function displayServerTime(){
	    //buat object date berdasarkan waktu di client
	    var clientTime = new Date();
	    //buat object date dengan menghitung selisih waktu client dan server
	    var time = new Date(clientTime.getTime() + Diff);
	    //ambil nilai jam
	    var sh = time.getHours().toString();
	    //ambil nilai menit
	    var sm = time.getMinutes().toString();
	    //ambil nilai detik
	    var ss = time.getSeconds().toString();
	    //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
	    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
	}
	</script>
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini" onload="setInterval('displayServerTime()', 1000);">
<?php 
	date_default_timezone_set('Asia/Jakarta');
		###date('Y-m-d') kalo mau hari ini;
	$date=date_create(date('Y-m-d H:i:s'));

 	if (date_format($date,'l')=='Sunday') {
 		$hari='Minggu';
 	}elseif (date_format($date,'l')=='Monday') {
 		$hari='Senin';
 	}elseif (date_format($date,'l')=='Tuesday') {
 		$hari='Selasa';
 	}elseif (date_format($date,'l')=='Wednesday') {
 		$hari='Rabu';
 	}elseif (date_format($date,'l')=='Thursday') {
 		$hari='Kamis';
 	}elseif (date_format($date,'l')=='Friday') {
 		$hari='Jumat';
 	}elseif (date_format($date,'l')=='Saturday') {
 		$hari='Sabtu';
 	}
	 	
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
?>
<!-- Site wrapper -->
<div class="wrapper">
<!--======================================================================================-->
<?php $this->load->view('staff/layout/top'); ?>	
<?php $this->load->view('staff/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Status Pendaftaran
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsi</a></li>
        <li class="active">Status Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        if (!$this->Model->read('outline')) {?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Tidak Bisa Lihat Status Form!</h4>
            Belum ada data outline yang terinput!
          </div>
      <?php  }else{?>

      
        <!-- BOX Succes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Status Pendaftaran</h3>
            </div>
            <div class="box-body table-responsive">
              <div class="col-md-12">
                <legend><span class="fa fa-archive"></span>&nbsp;&nbsp;Download Draft Peserta Sidang</legend>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <form method="POST" action="<?php echo base_url('Staff/excel_data_pendaftaran/'); ?>" target="_blank">
                    <div class="form-group col-md-3">
                      <label>Dari Tanggal :</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input required="" class="form-control" name="awal" id="begin-date"  type="text" placeholder="Dari Tanggal" value="">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group col-md-3">
                      <label>Sampai Tanggal :</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input required="" class="form-control" name="akhir" id="end-date"  type="text" placeholder="Sampai Tanggal" value="">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group col-md-3">
                      <label>Program Studi :</label>
                      <select class="form-control" name="prodi" required="">
                        <option value="">--Pilih Program Studi--</option>
                        <option value="TI">S1 Teknik Informatika</option>
                        <option value="SK">S1 Sistem Komputer</option>
                        <option value="SI">S1 Sistem Informasi</option>
                        <option value="ADB">S1 Analitika Data Bisnis</option>
                        <option value="MAKSI">S2 Magister Akuntansi</option>
                        <option value="MM">S2 Magister Manajemen</option>
                        <option value="PPAK">Pendidikan Profesi Akuntansi</option>
                        <option value="DK">D3 Akuntansi</option>
                        <option value="DKP">D3 Keuangan & Perbankan</option>
                        <option value="AK">S1 Akuntasi</option>
                        <option value="M">S1 Manajemen</option>
                        <option value="ES">S1 Ekonomi Syariah</option>
                      </select>
                    </div>
                    <script type="text/javascript">
                      $('#begin-date').bootstrapMaterialDatePicker({ 
                          format : 'YYYY-MM-DD', 
                          clearButton: true,
                          time: false,
                        });
                      $('#end-date').bootstrapMaterialDatePicker({ 
                          format : 'YYYY-MM-DD', 
                          clearButton: true,
                          time: false,
                        });
                    </script>
                    <div class="form-group col-md-3">
                      <label>&nbsp;</label>
                      <button type="submit" class="btn btn-primary form-control">
                        <i class="fa fa-download"></i>&nbsp;&nbsp;Download
                      </button>
                    </div>
                  </form>
                </div>
                <div class="col-md-1"></div>
              </div>
              <div class="col-md-12">
                <legend><span class="fa fa-check-circle"></span>&nbsp;&nbsp;Validasi Data Pendaftaran Sidang</legend>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 180px; text-align: center;">Tanggal Daftar</th>
                      <th style="width: 180px; text-align: center;">Mahasiswa</th>
                      <th style="text-align: center;">Data Pendaftaran</th>
                      <th style="width: 50px; text-align: center;">Prodi</th>
                      <th style="width: 120px; text-align: center;">Aksi</th>
                  </thead>
                  <?php $mahasiswas = $this->Model->read_orderby1('daftar_sidang','tgl_daftar','DESC');
                  if (empty($mahasiswas)) {
                  }else{
                    $no1=1;
                    foreach ($mahasiswas as $mahasiswa) { ?>
                      <tr>
                        <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                        <td style="vertical-align: middle; text-align: center;"><?= indonesian_date(strtotime($mahasiswa['tgl_daftar']),'l, d F Y','');?></td>
                        <td style="vertical-align: middle; text-align: center;"><?= '['.$mahasiswa['nim'].']<br/>'.$mahasiswa['nama'];?></td>
                       
                        <td style="vertical-align: middle; text-align: center;">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?= $mahasiswa['nim'];?>"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Detail</button>
                          <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm_file<?= $mahasiswa['nim'];?>"> <span class="fa fa-file-text-o"></span>&nbsp;&nbsp;File Persyaratan</button>
                        </td>
                          <!-- Large modal -->
                          <div class="modal fade bs-example-modal-lg<?= $mahasiswa['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Detail Pendaftaran Outline</h4>
                                </div>
                                <div class="modal-body col-md-12">
                                  <!-- nama -->
                                  <div class="form-group col-md-6">
                                    <label>&nbsp;&nbsp;Nama Lengkap</label>
                                    <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?= $mahasiswa['nama'];?>">
                                  </div>
                                  <!--  nim -->
                                  <div class="form-group col-md-6">
                                    <label for="inputnim">NIM</label>
                                    <input type="tel" pattern="[0-9]{10}" class="form-control" name="nim" id="inputnim" placeholder="Masukan Nomor Induk Mahasiswa" required="" readonly="" value="<?=$mahasiswa['nim'];?>">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputjp">Jenjang Pendidikan</label>
                                    <input type="text" name="" readonly="" class="form-control" value="<?=$mahasiswa['jenjang_pendidikan'];?>">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputps">Program Studi</label>
                                    <input type="text" class="form-control" readonly="" name="" value="<?=$mahasiswa['program_studi'];?>">
                                  </div>

                                  <div class="form-group col-md-12"> 
                                    <div class="row">
                                      <div class="col-md-6"> 
                                       <label for="inputtempat">Tempat Lahir</label>
                                      <input type="text" class="form-control" readonly="" name="tempat" id="inputtempat" placeholder="Masukan Tempat" required="" value="<?=$mahasiswa['tempat'];?>">
                              
                                      </div>
                                      <div class="col-md-6">
                                       <label for="inputtempat">Tempat Lahir</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" name="tl" id="datepicker1" placeholder="Format : yyyy-mm-dd" required="" readonly="" value="<?=$mahasiswa['tanggal_lahir'];?>">
                                        </div>
                                      </div>
                                    </div> 
                                  </div>

                                  <div class="form-group col-md-12">
                                    <label for="inputnamaortu">Nama Orang Tua</label></label>
                                    <input type="text" class="form-control" name="ortu" required="" readonly="" id="inputnamaortu" placeholder="Masukan Nama Orang Tua" value="<?=$mahasiswa['ortu'];?>">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <label for="inputalamatrmh">Alamat Rumah <font color="red">*</font></label></label>
                                    <textarea class="form-control" rows="3" id="inputalamatrmh" name="alamatrmh" readonly="" placeholder="Masukan Alamat Rumah Lengkap" required=""><?=$mahasiswa['alamatrmh'];?></textarea>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputtr">Nomor Telepon Rumah  <font color="red">*</font></label></label>
                                    <input type="text" class="form-control" name="tr" required="" readonly="" id="inputtr" data-inputmask='"mask": "99999999999"' data-mask placeholder="Masukan Nomor Telepon Rumah" value="<?=$mahasiswa['teleponrmh'];?>">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputhp">Nomor Handphone  <font color="red">*</font></label></label>
                                    <input type="text" class="form-control" id="inputhp" name="hp" readonly="" required="" placeholder="Masukan Nomor Handphone" data-inputmask='"mask": "999999999999"' data-mask value="<?=$mahasiswa['hp'];?>">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <label for="inputnamaktr">Nama Kantor</label>
                                    <input type="text" class="form-control" readonly="" id="inputnamaktr" name="namaktr" placeholder="Masukan Nama Kantor" value="<?=$mahasiswa['kantor'];?>">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputjt">Jabatan Terakhir</label>
                                    <input type="text" class="form-control" id="inputjt" name="jt" readonly="" placeholder="Masukan Jabatan Terakhir" value="<?=$mahasiswa['jabatan'];?>">
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputemail">E-Mail</label></label>
                                    <input type="email" class="form-control" id="inputemail" name="email" required="" readonly="" placeholder="Masukan E-Mail" value="<?=$mahasiswa['email'];?>">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <label for="inputalamatktr">Alamat Kantor</label>
                                    <textarea class="form-control" rows="3" readonly="" id="inputalamatktr" name="alamatktr" placeholder="Masukan Alamat Kantor"><?=$mahasiswa['alamatktr'];?></textarea>
                                  </div>

                                  <div class="form-group col-md-12">
                                    <label for="inputtk">Telepon Kantor</label>
                                    <input type="text" class="form-control" id="inputtk" readonly="" name="tk" placeholder="Masukan Telepon Kantor" value="<?=$mahasiswa['teleponktr'];?>">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <label for="inputjs">Judul Skripsi </label></label>
                                    <textarea class="form-control" readonly="" rows="3" id="inputjs" readonly="" name="js" required="" placeholder="Masukan Judul Skripsi"><?=$mahasiswa['judul_skripsi'];?></textarea>
                                  </div>

                                  <div class="form-group col-md-12">
                                    <?php $dosen=$this->Model->read_detail('noreg',$mahasiswa['dospem'],'dosen');?>
                                    <div class="row">
                                      <div class="col-md-12">
                                      <label for="inputdospem1">Dosen Pembimbing</label></label>
                                      <input type="text" readonly="" name="" class="form-control" value="[<?=$mahasiswa['dospem'];?>] <?=$dosen->nama;?>">
                                      </div>
                                    </div> 
                                  </div>

                                  
                                  <div class="form-group col-md-6">
                                    <label for="inputtglpo">Tanggal Persetujuan Outline </label></label>
                                      <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" readonly="" class="form-control pull-right" name="tglpo" required="" value="<?=$mahasiswa['tglpo'];?>">
                                      </div>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputjtmb">Jumlah Tatap Muka Bimbingan </label></label>
                                      <div class="input-group date">
                                        <input type="text" class="form-control pull-right" name="jtmb" required="" id="inputjtmb" placeholder="Masukan Jumlah Tatap Muka Bimbingan" readonly="" value="<?=$mahasiswa['bimbingan'];?>">
                                        <div class="input-group-addon">
                                          <label ><sub>X</sub></label>
                                        </div>
                                      </div>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputpers">Perpanjangan Skripsi</label>
                                      <div class="input-group date">
                                        <input type="text" class="form-control pull-right" name="pers" id="inputpers" placeholder="Masukan Jumlah Perpanjangan Skripsi" readonly="" value="<?=$mahasiswa['pers'];?>">
                                        <div class="input-group-addon">
                                          <label><sub>X</sub></label>
                                        </div>
                                      </div>
                                  </div>

                                  <div class="form-group col-md-6">
                                    <label for="inputipk">Indeks Prestasi Komulatif </label></label>
                                    <input type="text" class="form-control" id="inputipk" name="ipk" readonly="" required="" placeholder="Masukan Indeks Prestasi Komulatif" value="<?=$mahasiswa['ipk'];?>">
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Small modal -->
                          <div class="modal fade bs-example-modal-sm_file<?= $mahasiswa['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Detail Dokumen Persyaratan</h4>
                                  <?php $notfound=base_url('uploads/img/no.gif')?>
                                </div>
                                <div class="modal-body col-md-12">
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Kartu Tanda Penduduk (KTP):</label><small class="pull-right"><i><?php if (!empty($mahasiswa['lu_ktp'])) {echo "last updated: ".$mahasiswa['lu_ktp'];}?></i></small>
                                    <br/>
                                    <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['ktp'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Kartu Keluarga (KK):</label><small class="pull-right"><i><?php if (!empty($mahasiswa['lu_kk'])) {echo "last updated: ".$mahasiswa['lu_kk'];}?></i></small>
                                    <br/>
                                    <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['kk'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Daftar Ulang Terakhir:</label><small class="pull-right"><i><?php if (!empty($mahasiswa['lu_slipdut'])) {echo "last updated: ".$mahasiswa['lu_slipdut'];}?></i></small>
                                    <br/>
                                    <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipdut'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Bimbingan Skripsi:</label><small class="pull-right"><i><?php if (!empty($mahasiswa['lu_slipbs'])) {echo "last updated: ".$mahasiswa['lu_slipbs'];}?></i></small>
                                    <br/>
                                    <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipbs'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                  </div>

                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Ujian Skripsi:</label><small class="pull-right"><i><?php if (!empty($mahasiswa['lu_slipus'])) {echo "last updated: ".$mahasiswa['lu_slipus'];}?></i></small>
                                    <br/>
                                    <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipus'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                  </div>
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Perpanjangan Skripsi:</label><small class="pull-right"><i><?php if (!empty($mahasiswa['lu_slipps'])) {echo "last updated: ".$mahasiswa['lu_slipps'];}?></i></small>
                                    <br/>
                                    <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipps'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                  </div>
                                 
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <td style="vertical-align: middle; text-align: center;">
                          <?= $mahasiswa['program_studi'] ?></td>
                        <td style="vertical-align: middle; text-align: center;">
                          <?php 
                          if (empty($mahasiswa['accstaff'])) {?>
                            <a type="button" onclick="return confirm('Are you sure?');" class="btn btn-primary " href="<?=base_url('Staff/verify_sidang/'.$mahasiswa['nim'])?>"> Validate</a>
                          <?php }else{
                            echo '<a type="button" class="btn btn-success disabled" href=""> Validated</a>';
                          }
                          ?>
                        </td>
                      </tr>
                  <?php 
                    $no1++; 
                    }
                  }
                  ?>
                  <tfoot>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 180px; text-align: center;">Tanggal Daftar</th>
                      <th style="width: 180px; text-align: center;">Mahasiswa</th>
                      <th style="text-align: center;">Data Pendaftaran</th>
                      <th style="width: 50px; text-align: center;">Prodi</th>
                      <th style="width: 120px; text-align: center;">Aksi</th>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      <?php }
      ?>
      
          <!-- /.box -->
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('staff/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

<!-- Menu -->
<script>
  var dashboard = document.getElementById("dashboard");
  

  var treejadwal = document.getElementById("treejadwal");
  var statussidangskripsi = document.getElementById("statussidangskripsi");
  
  function clear_menu(){
    dashboard.className = "";
   
    treejadwal.className = "treeview";
    statussidangskripsi.className = "";
  }

  clear_menu();
  treejadwal.className = "treeview active";
  statussidangskripsi.className = "active";

</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>


<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('html').niceScroll({
         // Do not hide scrollbar when mouse out
    cursorborderradius: '10px', // Scroll cursor radius
    background: '#E5E9E7',     // The scrollbar rail color
    cursorwidth: '10px',       // Scroll cursor width
    cursorcolor: '#67b0d1'     // Scroll cursor color
  });
});
</script>
</body>
</html>
