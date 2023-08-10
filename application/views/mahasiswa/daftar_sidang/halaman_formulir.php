<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Formulir Pendaftaran</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
<body class="hold-transition skin-green fixed sidebar-mini" onload="setInterval('displayServerTime()', 1000);">
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
	 	
?>
<!-- Site wrapper -->
<div class="wrapper">
<!--======================================================================================-->
<?php $this->load->view('mahasiswa/layout/top'); ?>	
<?php $this->load->view('mahasiswa/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Formulir Pendaftaran
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsi</a></li>
        <li class="active">Formulir Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $notification; ?>
      <?php 
      	$formulir=$this->Model->read_detail('nim',$this->session->userdata('username'),'daftar_sidang');
        if ($formulir) { 
        	// JIKA DITEMUKAN
        	if (empty($formulir->accstaff)) { ?>
        	<!-- JIKA BELOM DI VERIFIKASI STAFF -->	
        	<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info-circle"></i> Formulir Belum Divallidasi SUBAG LAA!</h4>
            Formulir Pendaftaran dapat diedit/diupdate kembali sebelum divalidasi SUBAG LAA!</div>
        	<div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-default">
                  <div class="box-header with-border">
	                  <span class="fa fa-file-text-o"></span><h3 class="box-title">&nbsp;&nbsp;Formulir Pendaftaran Sidang Skripsi</h3>

	                  <div class="box-tools pull-right">
	                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                  </div>
	                </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url('mahasiswa/update_daftar/'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
	                    <div class="col-md-6">
	                       <legend><strong>1. Data Calon Peserta Sidang Skripsi</strong></legend>
	                       <!-- ufmhs -->
		                    <div class="form-group col-md-12">
	                          <label for="inputnama">Nama Lengkap <font color="red">*</font></label>
	                          <input type="text" class="form-control" id="inputnama" name="nama" placeholder="Masukan Nama" required="" readonly="" value="<?= ucwords($formulir->nama);?>">
	                          <?php echo form_error('nama');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputnim">NIM <font color="red">*</font></label>
	                          <input type="tel" pattern="[0-9]{10}" class="form-control" name="nim" id="inputnim" placeholder="Masukan Nomor Induk Mahasiswa" required="" readonly="" value="<?=$formulir->nim;?>">
	                          <?php echo form_error('nim');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputjp">Jenjang Pendidikan <font color="red">*</font></label>
	                          <select class="form-control" name="jp" required="" id="inputjp">
	                            <option value="D3" <?php if ($formulir->jenjang_pendidikan=="D3") {echo "selected=''";}?> >D3</option>
	                            <option value="S1" <?php if ($formulir->jenjang_pendidikan=="S1") {echo "selected=''";}?> >S1</option>
	                            <option value="S2" <?php if ($formulir->jenjang_pendidikan=="S2") {echo "selected=''";}?> >S2</option>
	                          </select>
	                          
	                          <?php echo form_error('jp');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputps">Program Studi <font color="red">*</font></label>
                              
	                          <select class="form-control" name="ps" required="" id="inputps" readonly>
	                            <?php if ($formulir->program_studi=='TI'){
                                        echo '<option value="TI">S1 Teknik Informatika</option>';
                                      }elseif ($formulir->program_studi=='SK') {
                                        echo '<option value="SK">S1 Sistem Komputer</option>';
                                      }elseif ($formulir->program_studi=='SI') {
                                        echo '<option value="SI">S1 Sistem Informasi</option>';
                                      }elseif ($formulir->program_studi=='ADB') {
                                        echo '<option value="ADB">S1 Analitika Data Bisnis</option>';
                                      }elseif ($formulir->program_studi=='MAKSI') {
                                        echo '<option value="MAKSI">S2 Magister Akuntansi</option>';
                                      }elseif ($formulir->program_studi=='MM') {
                                        echo '<option value="MM">S2 Magister Manajemen</option>';
                                      }elseif ($formulir->program_studi=='PPAK') {
                                        echo '<option value="PPAK">Pendidikan Profesi Akuntansi</option>';
                                      }elseif ($formulir->program_studi=='DAK') {
                                        echo '<option value="DK">D3 Akuntansi</option>';
                                      }elseif ($formulir->program_studi=='DKP') {
                                        echo '<option value="DKP">D3 Keuangan & Perbankan</option>';
                                      }elseif ($formulir->program_studi=='AK') {
                                        echo '<option value="AK">S1 Akuntasi</option>';
                                      }elseif ($formulir->program_studi=='M') {
                                        echo '<option value="M">S1 Manajemen</option>';
                                      }elseif ($formulir->program_studi=='ES') {
                                        echo '<option value="ES">S1 Ekonomi Syariah</option>';
                                      } ?>
	                          </select>
	                          <?php echo form_error('ps');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                         
	                          <div class="row">
	                            <div class="col-md-6"> 
	                             <label for="inputtempat">Tempat Lahir <font color="red">*</font></label>
	                            <input type="text" class="form-control" name="tempat" id="inputtempat" placeholder="Masukan Tempat" required="" value="<?php if (empty(set_value('tempat'))) {
	                            	echo ucwords($formulir->tempat);
	                            } else {
	                            	echo set_value('tempat');
	                            }?>">
	                            <?php echo form_error('tempat');?>
	                            </div>
	                            <div class="col-md-6">
	                             <label for="inputtempat">Tempat Lahir <font color="red">*</font></label>
	                              <div class="input-group date">
	                                <div class="input-group-addon">
	                                  <i class="fa fa-calendar"></i>
	                                </div>
	                                <input type="text" class="form-control pull-right" name="tl" id="datepicker1" placeholder="Format : yyyy-mm-dd" required="" value="<?php if (empty(set_value('tl'))) {
		                            	echo $formulir->tanggal_lahir;
		                            } else {
		                            	echo set_value('tl');
		                            }?>">
	                              </div>
	                              <?php echo form_error('tl');?>
	                            </div>
	                          </div> 
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputnamaortu">Nama Orang Tua <font color="red">*</font></label>
	                          <input type="text" class="form-control" name="ortu" required="" id="inputnamaortu" placeholder="Masukan Nama Orang Tua" value="<?php if (empty(set_value('ortu'))) {
		                            	echo $formulir->ortu;
		                            } else {
		                            	echo set_value('ortu');
		                            }?>">
	                          <?php echo form_error('ortu');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputalamatrmh">Alamat Rumah <font color="red">*</font></label>
	                          <textarea class="form-control" rows="3" id="inputalamatrmh" name="alamatrmh" placeholder="Masukan Alamat Rumah Lengkap" required=""><?php if (empty(set_value('alamatrmh'))) {
		                            	echo $formulir->alamatrmh;
		                            } else {
		                            	echo set_value('alamatrmh');
		                            }?></textarea>
	                          <?php echo form_error('alamatrmh');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputtr">Nomor Telepon Rumah </label>
	                          <input type="text" class="form-control" name="tr" id="inputtr" data-inputmask='"mask": "99999999999"' data-mask placeholder="Masukan Nomor Telepon Rumah" value="<?php if (empty(set_value('tr'))) {
		                            	echo $formulir->teleponrmh;
		                            } else {
		                            	echo set_value('tr');
		                            }?>">
	                          <?php echo form_error('tr');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputhp">Nomor Handphone  <font color="red">*</font></label>
	                          <input type="text" class="form-control" id="inputhp" name="hp" required="" placeholder="Masukan Nomor Handphone" data-inputmask='"mask": "999999999999"' data-mask value="<?php if (empty(set_value('hp'))) {
		                            	echo $formulir->hp;
		                            } else {
		                            	echo set_value('hp');
		                            }?>">
	                          <?php echo form_error('hp');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputnamaktr">Nama Kantor</label>
	                          <input type="text" class="form-control" id="inputnamaktr" name="namaktr" placeholder="Masukan Nama Kantor" value="<?php if (empty(set_value('namaktr'))) {
		                            	echo $formulir->kantor;
		                            } else {
		                            	echo set_value('namaktr');
		                            }?>">
	                          <?php echo form_error('namaktr');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputjt">Jabatan Terakhir</label>
	                          <input type="text" class="form-control" id="inputjt" name="jt"  placeholder="Masukan Jabatan Terakhir" value="<?php if (empty(set_value('jt'))) {
		                            	echo $formulir->jabatan;
		                            } else {
		                            	echo set_value('jt');
		                            }?>">
	                          <?php echo form_error('jt');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputemail">E-Mail  <font color="red">*</font></label>
	                          <input type="email" class="form-control" id="inputemail" name="email" required="" placeholder="Masukan E-Mail" value="<?php if (empty(set_value('email'))) {
	                          	echo $formulir->email;
	                          } else {
	                          	echo set_value('email');
	                          }
	                          ?>">
	                          <?php echo form_error('email');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputalamatktr">Alamat Kantor</label>
	                          <textarea class="form-control" rows="3" id="inputalamatktr" name="alamatktr" placeholder="Masukan Alamat Kantor"><?php if (empty(set_value('alamatktr'))) {
		                            	echo $formulir->alamatktr;
		                            } else {
		                            	echo set_value('alamatktr');
		                            }?></textarea>
	                          <?php echo form_error('alamatktr');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputtk">Telepon Kantor</label>
	                          <input type="text" class="form-control" id="inputtk" name="tk" placeholder="Masukan Telepon Kantor" value="<?php if (empty(set_value('tk'))) {
		                            	echo $formulir->teleponktr;
		                            } else {
		                            	echo set_value('tk');
		                            }?>">
	                          <?php echo form_error('tk');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputjs">Judul Skripsi  <font color="red">*</font></label>
	                          <textarea class="form-control" readonly="" rows="3" id="inputjs" name="js" required="" placeholder="Masukan Judul Skripsi"><?php if (empty(set_value('js'))) {
	                          	echo mb_convert_case($formulir->judul_skripsi, MB_CASE_UPPER, "UTF-8");
	                          } else {
	                          	echo ucwords(set_value('js'));
	                          }
	                          ?></textarea>
	                          <?php echo form_error('js');?>
	                        </div>

	                        <div class="form-group col-md-12">
	                        <?php $dosenup= $this->Model->read_detail('noreg',$formulir->dospem,'dosen');?>
	                          <div class="row">
	                            <div class="col-md-12">
	                            <label for="inputdospem1">Dosen Pembimbing <font color="red">*</font></label>
	                            <select class="form-control" name="dospem" required="" readonly>
		                            <option value="<?=$formulir->dospem?>">[<?=$formulir->dospem;?>] <?=$dosenup->nama;?></option>
		                        </select>
	                            <?php echo form_error('dospem');?>
	                            </div>
	                          </div> 
	                        </div>

	                        
	                        <div class="form-group col-md-6">
	                          <label for="inputtglpo">Tanggal Persetujuan Outline <font color="red">*</font></label>
	                            <div class="input-group date">
	                                <div class="input-group-addon">
	                                  <i class="fa fa-calendar"></i>
	                                </div>
	                                <input type="text" class="form-control pull-right" name="tglpo" required="" id="datepicker2" placeholder="Format : yyyy-mm-dd" value="<?php if (empty(set_value('tglpo'))) {
		                            	echo $formulir->tglpo;
		                            } else {
		                            	echo set_value('tglpo');
		                            }?>">
	                            </div>
	                            <?php echo form_error('tglpo');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputjtmb">Jumlah Tatap Muka Bimbingan <font color="red">*</font></label>
	                            <div class="input-group date">
	                              <input type="text" class="form-control pull-right" name="jtmb" required="" id="inputjtmb" placeholder="Masukan Jumlah Tatap Muka Bimbingan" readonly="" value="<?= $formulir->bimbingan?>">
	                              <div class="input-group-addon">
	                                <label ><sub>X</sub></label>
	                              </div>
	                            </div>
	                            <?php echo form_error('jtmb');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputpers">Perpanjangan Skripsi</label>
	                            <div class="input-group date">
	                              <input type="text" class="form-control pull-right" name="pers" id="inputpers" placeholder="Masukan Jumlah Perpanjangan Skripsi" value="<?php if (empty(set_value('pers'))) {
		                            	echo $formulir->pers;
		                            } else {
		                            	echo set_value('pers');
		                            }?>">
	                              <div class="input-group-addon">
	                                <label><sub>X</sub></label>
	                              </div>
	                            </div>
	                            <?php echo form_error('pers');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputipk">Indeks Prestasi Komulatif  <font color="red">*</font></label>
	                          <input type="text" class="form-control" id="inputipk" name="ipk" required="" placeholder="Masukan Indeks Prestasi Komulatif" value="<?php if (empty(set_value('ipk'))) {
		                            	echo $formulir->ipk;
		                            } else {
		                            	echo set_value('ipk');
		                            }?>">
	                          <?php echo form_error('ipk');?>
	                        </div>

	                     
	                    </div>
	                    <div class="col-md-6">
	                      	<legend><strong>2. Upload File Persyaratan Sidang Skripsi</strong></legend>
	                      	<?php $notfound=base_url('uploads/img/no.gif')?>
	                      	<!-- KTP -->
		                      <div class="box box-success">
		                          <div class="box-header with-border">
		                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Fotokopi Kartu Tanda Penduduk (KTP)</label>

		                            <div class="box-tools pull-right">
		                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                              </button>
		                            </div>
		                            <!-- /.box-tools -->
		                          </div>
		                          <!-- /.box-header -->
		                          <div class="box-body">
		                            <div class="form-group">
		                              <img src="<?=base_url('uploads/sidang_skripsi/'.$formulir->ktp)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
		                             
		                            </div>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-fw fa-file-picture-o"></i>
		                              </div>
		                              <input type="file" class="form-control" name="ktp" accept="image/*" >
		                            </div>
		                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                            <?php echo form_error('ktp');?>
		                          </div>
		                          <!-- /.box-body -->
		                        </div>
		                    <!-- KK -->
		                    	<div class="box box-success">
		                          <div class="box-header with-border">
		                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Fotokopi Kartu Keluarga (KK)</label>

		                            <div class="box-tools pull-right">
		                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                              </button>
		                            </div>
		                            <!-- /.box-tools -->
		                          </div>
		                          <!-- /.box-header -->
		                          <div class="box-body">
		                            <div class="form-group">
		                              <img src="<?=base_url('uploads/sidang_skripsi/'.$formulir->kk)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
		                             
		                            </div>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-fw fa-file-picture-o"></i>
		                              </div>
		                              <input type="file" class="form-control" name="kk" accept="image/*" >
		                            </div>
		                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                            <?php echo form_error('kk');?>
		                          </div>
		                          <!-- /.box-body -->
		                        </div>
	                       	<!-- slip daftar ulang --> 
		                      <div class="box box-success">
		                          <div class="box-header with-border">
		                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Daftar Ulang Terakhir</label>

		                            <div class="box-tools pull-right">
		                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                              </button>
		                            </div>
		                            <!-- /.box-tools -->
		                          </div>
		                          <!-- /.box-header -->
		                          <div class="box-body">
		                            <div class="form-group">
		                              <img src="<?=base_url('uploads/sidang_skripsi/'.$formulir->slipdut)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
		                             
		                            </div>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-fw fa-file-picture-o"></i>
		                              </div>
		                              <input type="file" class="form-control" name="slipdu" accept="image/*" >
		                            </div>
		                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                            <?php echo form_error('slipdu');?>
		                          </div>
		                          <!-- /.box-body -->
		                        </div>
		                    <!-- slip bimbingan skripsi -->
		                      <div class="box box-success">
		                          <div class="box-header with-border">
		                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Bimbingan Skripsi</label>

		                            <div class="box-tools pull-right">
		                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                              </button>
		                            </div>
		                            <!-- /.box-tools -->
		                          </div>
		                          <!-- /.box-header -->
		                          <div class="box-body">
		                            <div class="form-group">
		                              <img src="<?=base_url('uploads/sidang_skripsi/'.$formulir->slipbs)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
		                             
		                            </div>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-fw fa-file-picture-o"></i>
		                              </div>
		                              <input type="file" class="form-control" name="slipbs" accept="image/*" >
		                            </div>
		                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                            <?php echo form_error('slipbs');?>
		                          </div>
		                          <!-- /.box-body -->
		                        </div>
		                    <!-- slip ujian skripsi -->
		                      <div class="box box-success">
		                          <div class="box-header with-border">
		                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Ujian Skripsi</label>

		                            <div class="box-tools pull-right">
		                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                              </button>
		                            </div>
		                            <!-- /.box-tools -->
		                          </div>
		                          <!-- /.box-header -->
		                          <div class="box-body">
		                            <div class="form-group">
		                              <img src="<?=base_url('uploads/sidang_skripsi/'.$formulir->slipus)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
		                             
		                            </div>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-fw fa-file-picture-o"></i>
		                              </div>
		                              <input type="file" class="form-control" name="slipus" accept="image/*" >
		                            </div>
		                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                            <?php echo form_error('slipus');?>
		                          </div>
		                          <!-- /.box-body -->
		                        </div>
		                    <!-- slip perpanjangan skripsi -->
		                      <div class="box box-success">
		                          <div class="box-header with-border">
		                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Perpanjangan Skripsi</label>

		                            <div class="box-tools pull-right">
		                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                              </button>
		                            </div>
		                            <!-- /.box-tools -->
		                          </div>
		                          <!-- /.box-header -->
		                          <div class="box-body">
		                            <div class="form-group">
		                              <img src="<?=base_url('uploads/sidang_skripsi/'.$formulir->slipps)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
		                             
		                            </div>
		                            <div class="input-group">
		                              <div class="input-group-addon">
		                                <i class="fa fa-fw fa-file-picture-o"></i>
		                              </div>
		                              <input type="file" class="form-control" name="slipps" accept="image/*" >
		                            </div>
		                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                            <?php echo form_error('slipps');?>
		                          </div>
		                          <!-- /.box-body -->
		                        </div>

	                     
	                    </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer" align="center">
                      <input type="submit" onclick="return confirm('Are you sure?');" class="btn btn-primary" value="Update">
                      <a type="button" class="btn btn-default" href="<?= base_url('Mahasiswa/')?>">Cancel</a>
                    </div>
                  </form>
                  <div class="overlay" id="myloading2" style="visibility: hidden;">
		              <i class="fa fa-refresh fa-spin"></i>
		            </div>
                </div>
                <!-- /.box -->
              </div>
              <!--/.col (left) -->
           </div>
        	<?php } else { ?>
        	<!-- JIKA SUDAH DI VERIFIKASI STAFF -->
        		<div class="alert alert-danger alert-dismissible">
		              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		              <h4><i class="icon fa fa-ban"></i> Tidak Bisa Isi Form!</h4>
		              Maaf, Formulir Anda sudah divalidasi SUBAG LAA sebelumnya!
		          </div>
        	<?php }?>
      <?php }else{
      	// JIKA BELOM MENGISI SAMA SEKALI
        $dospem=$this->Model->read_detail('nim',$this->session->userdata('username'),'dospem');
        if ($dospem) {
        	$dosen = $this->Model->read_detail('noreg',$dospem->noreg,'dosen');
        }else{
        	$dosen = $this->Model->read_detail('noreg','','dosen');
        }
        $info=$this->Model->read_detail_tri('nim',$this->session->userdata('username'),'status_outline','Diterima','revisi','','outline');
        if (empty($info) || $this->Model->cek_sudah_tervalidasi($dospem->id)<8) { ?>
        <!-- JIKA BELOM 8 kali BIMBINGAN -->
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Tidak Bisa Isi Form!</h4>
              Maaf, Status outline Anda belum diterima/masih dalam tahap revisi dan jumlah bimbingan kurang dari 8!
          </div>
        <?php 
        }else{ ?>
        	<!-- MENGISI FORM -->
           <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-default">
                  <div class="box-header with-border">
	                  <span class="fa fa-file-text-o"></span><h3 class="box-title">&nbsp;&nbsp;Formulir Pendaftaran Sidang Skripsi</h3>

	                  <div class="box-tools pull-right">
	                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	                  </div>
	                </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form id="formdaftarsidang" action="<?php echo base_url('mahasiswa/daftar/'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
	                    <div class="col-md-6">
	                       <legend><strong>1. Data Calon Peserta Sidang Skripsi</strong></legend>
	                       <!-- ufmhs -->
		                    <div class="form-group col-md-12">
	                          <label for="inputnama">Nama Lengkap <font color="red">*</font></label>
	                          <input type="text" class="form-control" id="inputnama" name="nama" placeholder="Masukan Nama" required="" readonly="" value="<?= ucwords($this->session->userdata('name'));?>">
	                          <?php echo form_error('nama');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputnim">NIM <font color="red">*</font></label>
	                          <input type="tel" pattern="[0-9]{10}" class="form-control" name="nim" id="inputnim" placeholder="Masukan Nomor Induk Mahasiswa" required="" readonly="" value="<?=$this->session->userdata('username');?>">
	                          <?php echo form_error('nim');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputjp">Jenjang Pendidikan <font color="red">*</font></label>
	                          <select class="form-control" name="jp" required="" id="inputjp">
	                            <option value="D3">D3</option>
	                            <option value="S1" selected="">S1</option>
	                            <option value="S2">S2</option>
	                          </select>
	                          
	                          <?php echo form_error('jp');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputps">Program Studi <font color="red">*</font></label>
	                          <select class="form-control" name="ps" required="" id="inputps" readonly>
	                            <?php if ($this->session->userdata('prodi')=='TI'){
                                        echo '<option value="TI">S1 Teknik Informatika</option>';
                                      }elseif ($this->session->userdata('prodi')=='SK') {
                                        echo '<option value="SK">S1 Sistem Komputer</option>';
                                      }elseif ($this->session->userdata('prodi')=='SI') {
                                        echo '<option value="SI">S1 Sistem Informasi</option>';
                                      }elseif ($this->session->userdata('prodi')=='ADB') {
                                        echo '<option value="ADB">S1 Analitika Data Bisnis</option>';
                                      }elseif ($this->session->userdata('prodi')=='MAKSI') {
                                        echo '<option value="MAKSI">S2 Magister Akuntansi</option>';
                                      }elseif ($this->session->userdata('prodi')=='MM') {
                                        echo '<option value="MM">S2 Magister Manajemen</option>';
                                      }elseif ($this->session->userdata('prodi')=='PPAK') {
                                        echo '<option value="PPAK">Pendidikan Profesi Akuntansi</option>';
                                      }elseif ($this->session->userdata('prodi')=='DAK') {
                                        echo '<option value="DK">D3 Akuntansi</option>';
                                      }elseif ($this->session->userdata('prodi')=='DKP') {
                                        echo '<option value="DKP">D3 Keuangan & Perbankan</option>';
                                      }elseif ($this->session->userdata('prodi')=='AK') {
                                        echo '<option value="AK">S1 Akuntasi</option>';
                                      }elseif ($this->session->userdata('prodi')=='M') {
                                        echo '<option value="M">S1 Manajemen</option>';
                                      }elseif ($this->session->userdata('prodi')=='ES') {
                                        echo '<option value="ES">S1 Ekonomi Syariah</option>';
                                      } ?>
	                          </select>
	                          <?php echo form_error('ps');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                         
	                          <div class="row">
	                            <div class="col-md-6"> 
	                             <label for="inputtempat">Tempat Lahir <font color="red">*</font></label>
	                            <input type="text" class="form-control" name="tempat" id="inputtempat" placeholder="Masukan Tempat" required="" value="<?php if (empty(set_value('tempat'))) {
	                            	echo ucwords($info->tempat);
	                            } else {
	                            	echo set_value('tempat');
	                            }?>">
	                            <?php echo form_error('tempat');?>
	                            </div>
	                            <div class="col-md-6">
	                             <label for="inputtempat">Tempat Lahir <font color="red">*</font></label>
	                              <div class="input-group date">
	                                <div class="input-group-addon">
	                                  <i class="fa fa-calendar"></i>
	                                </div>
	                                <input type="text" class="form-control pull-right" name="tl" id="datepicker1" placeholder="Format : yyyy-mm-dd" required="" value="<?php if (empty(set_value('tl'))) {
		                            	echo $info->tgllahir;
		                            } else {
		                            	echo set_value('tl');
		                            }?>">
	                              </div>
	                              <?php echo form_error('tl');?>
	                            </div>
	                          </div> 
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputnamaortu">Nama Orang Tua <font color="red">*</font></label>
	                          <input type="text" class="form-control" name="ortu" required="" id="inputnamaortu" placeholder="Masukan Nama Orang Tua" value="<?=set_value('ortu');?>">
	                          <?php echo form_error('ortu');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputalamatrmh">Alamat Rumah <font color="red">*</font></label>
	                          <textarea class="form-control" rows="3" id="inputalamatrmh" name="alamatrmh" placeholder="Masukan Alamat Rumah Lengkap" required=""><?php if (empty(set_value('alamatrmh'))) {
		                            	echo $info->alamat;
		                            } else {
		                            	echo set_value('alamatrmh');
		                            }?></textarea>
	                          <?php echo form_error('alamatrmh');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputtr">Nomor Telepon Rumah</label>
	                          <input type="text" class="form-control" name="tr" id="inputtr" data-inputmask='"mask": "99999999999"' data-mask placeholder="Masukan Nomor Telepon Rumah" value="<?php if (empty(set_value('tr'))) {
		                            	echo $info->tlpr;
		                            } else {
		                            	echo set_value('tr');
		                            }?>">
	                          <?php echo form_error('tr');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputhp">Nomor Handphone  <font color="red">*</font></label>
	                          <input type="text" class="form-control" id="inputhp" name="hp" required="" placeholder="Masukan Nomor Handphone" data-inputmask='"mask": "999999999999"' data-mask value="<?php if (empty(set_value('hp'))) {
		                            	echo $info->nohp;
		                            } else {
		                            	echo set_value('hp');
		                            }?>">
	                          <?php echo form_error('hp');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputnamaktr">Nama Kantor</label>
	                          <input type="text" class="form-control" id="inputnamaktr" name="namaktr" placeholder="Masukan Nama Kantor" value="<?=set_value('namaktr')?>">
	                          <?php echo form_error('namaktr');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputjt">Jabatan Terakhir</label>
	                          <input type="text" class="form-control" id="inputjt" name="jt"  placeholder="Masukan Jabatan Terakhir" value="<?=set_value('jt')?>">
	                          <?php echo form_error('jt');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputemail">E-Mail  <font color="red">*</font></label>
	                          <input type="email" class="form-control" id="inputemail" name="email" required="" placeholder="Masukan E-Mail" value="<?php if (empty(set_value('email'))) {
	                          	echo $info->email;
	                          } else {
	                          	echo set_value('email');
	                          }
	                          ?>">
	                          <?php echo form_error('email');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputalamatktr">Alamat Kantor</label>
	                          <textarea class="form-control" rows="3" id="inputalamatktr" name="alamatktr" placeholder="Masukan Alamat Kantor"><?=set_value('alamatktr')?></textarea>
	                          <?php echo form_error('alamatktr');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputtk">Telepon Kantor</label>
	                          <input type="text" class="form-control" id="inputtk" name="tk" placeholder="Masukan Telepon Kantor" value="<?=set_value('tk')?>">
	                          <?php echo form_error('tk');?>
	                        </div>
	                        <div class="form-group col-md-12">
	                          <label for="inputjs">Judul Skripsi  <font color="red">*</font></label>
	                          <textarea class="form-control" readonly="" rows="3" id="inputjs" name="js" required="" placeholder="Masukan Judul Skripsi"><?php if (empty(set_value('js'))) {
	                          	echo mb_convert_case($info->topikfix, MB_CASE_UPPER, "UTF-8");
	                          } else {
	                          	echo ucwords(set_value('js'));
	                          }
	                          ?></textarea>
	                          <?php echo form_error('js');?>
	                        </div>

	                        <div class="form-group col-md-12">
	                          <div class="row">
	                            <div class="col-md-12">
	                            <label for="inputdospem1">Dosen Pembimbing <font color="red">*</font></label>
	                            <select class="form-control" name="dospem" required="" readonly>
		                            <option value="<?=$dospem->noreg?>">[<?=$dospem->noreg;?>] <?=$dosen->nama;?></option>
		                        </select>
	                            <?php echo form_error('dospem');?>
	                            </div>
	                          </div> 
	                        </div>

	                        
	                        <div class="form-group col-md-6">
	                          <label for="inputtglpo">Tanggal Persetujuan Outline <font color="red">*</font></label>
	                            <div class="input-group date">
	                                <div class="input-group-addon">
	                                  <i class="fa fa-calendar"></i>
	                                </div>
	                                <input type="text" class="form-control pull-right" name="tglpo" required="" placeholder="Format : yyyy-mm-dd" value="<?=date('Y-m-d',strtotime($info->tglacckaprodi))?>" readonly>
	                            </div>
	                            <?php echo form_error('tglpo');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputjtmb">Jumlah Tatap Muka Bimbingan <font color="red">*</font></label>
	                            <div class="input-group date">
	                              <input type="text" class="form-control pull-right" name="jtmb" required="" id="inputjtmb" placeholder="Masukan Jumlah Tatap Muka Bimbingan" readonly="" value="<?= $this->Model->cek_sudah_tervalidasi($dospem->id)?>">
	                              <div class="input-group-addon">
	                                <label ><sub>X</sub></label>
	                              </div>
	                            </div>
	                            <?php echo form_error('jtmb');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputpers">Perpanjangan Skripsi</label>
	                            <div class="input-group date">
	                              <input type="text" class="form-control pull-right" name="pers" id="inputpers" placeholder="Masukan Jumlah Perpanjangan Skripsi" value="<?=set_value('pers')?>">
	                              <div class="input-group-addon">
	                                <label><sub>X</sub></label>
	                              </div>
	                            </div>
	                            <?php echo form_error('pers');?>
	                        </div>
	                        <div class="form-group col-md-6">
	                          <label for="inputipk">Indeks Prestasi Komulatif  <font color="red">*</font></label>
	                          <input type="text" class="form-control" id="inputipk" name="ipk" required="" placeholder="Masukan Indeks Prestasi Komulatif" value="<?=set_value('ipk')?>">
	                          <?php echo form_error('ipk');?>
	                        </div>

	                     
	                    </div>
	                    <div class="col-md-6">
	                      	<legend><strong>2. Upload File Persyaratan Sidang Skripsi</strong></legend>
	                      	<!-- KTP -->
		                      <div class="form-group">
		                        <div class="form-group">
		                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Fotokopi Kartu Tanda Penduduk (KTP) <font color="red">*</font></label>
		                        </div>
		                        <div class="input-group">
		                          <div class="input-group-addon">
		                            <i class="fa fa-fw fa-file-picture-o"></i>
		                          </div>
		                          <input type="file" class="form-control" name="ktp" accept="image/*" required="" value="<?=set_value('ktp')?>">
		                        </div>
		                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                        <?php echo form_error('ktp');?>
		                      </div>
		                    <!-- KK -->
		                      <div class="form-group">
		                        <div class="form-group">
		                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Fotokopi Kartu Keluarga (KK) <font color="red">*</font></label>
		                        </div>
		                        <div class="input-group">
		                          <div class="input-group-addon">
		                            <i class="fa fa-fw fa-file-picture-o"></i>
		                          </div>
		                          <input type="file" class="form-control" name="kk" accept="image/*" required="">
		                        </div>
		                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                        <?php echo form_error('kk');?>
		                      </div>
	                       	<!-- slip daftar ulang -->
		                      <div class="form-group">
		                        <div class="form-group">
		                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Daftar Ulang Terakhir <font color="red">*</font></label>
		                        </div>
		                        <div class="input-group">
		                          <div class="input-group-addon">
		                            <i class="fa fa-fw fa-file-picture-o"></i>
		                          </div>
		                          <input type="file" class="form-control" name="slipdu" accept="image/*" required="">
		                        </div>
		                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                        <?php echo form_error('slipdu');?>
		                      </div>
		                    <!-- slip bimbingan skripsi -->
		                      <div class="form-group">
		                        <div class="form-group">
		                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Bimbingan Skripsi <font color="red">*</font></label>
		                        </div>
		                        <div class="input-group">
		                          <div class="input-group-addon">
		                            <i class="fa fa-fw fa-file-picture-o"></i>
		                          </div>
		                          <input type="file" class="form-control" name="slipbs" accept="image/*" required="">
		                        </div>
		                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                        <?php echo form_error('slipbs');?>
		                      </div>
		                    <!-- slip ujian skripsi -->
		                      <div class="form-group">
		                        <div class="form-group">
		                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Ujian Skripsi <font color="red">*</font></label>
		                        </div>
		                        <div class="input-group">
		                          <div class="input-group-addon">
		                            <i class="fa fa-fw fa-file-picture-o"></i>
		                          </div>
		                          <input type="file" class="form-control" name="slipus" accept="image/*" required="">
		                        </div>
		                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                        <?php echo form_error('slipus');?>
		                      </div>
		                    <!-- slip perpanjangan skripsi -->
		                      <div class="form-group">
		                        <div class="form-group">
		                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Perpanjangan Skripsi (Jika Lebih Dari 1 Semester)</label>
		                        </div>
		                        <div class="input-group">
		                          <div class="input-group-addon">
		                            <i class="fa fa-fw fa-file-picture-o"></i>
		                          </div>
		                          <input type="file" class="form-control" name="slipps" accept="image/*" >
		                        </div>
		                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
		                        <?php echo form_error('slipps');?>
		                      </div>

	                     
	                    </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer" align="center">
                      <input type="submit" onclick="return confirm('Are you sure?');" class="btn btn-primary" value="Submit" >
                      <input type="reset" class="btn btn-warning" value="Reset">
                      <a type="button" class="btn btn-default" href="<?= base_url('Mahasiswa/')?>">Cancel</a>
                    </div>
                  </form>
                  <div class="overlay" id="myloading1" style="visibility: hidden;">
		              <i class="fa fa-refresh fa-spin"></i>
		            </div>
                </div>
                <!-- /.box -->
              </div>
              <!--/.col (left) -->
           </div>
      <?php
        }
      } ?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('mahasiswa/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

<!-- Menu -->
<script>
  var dashboard = document.getElementById("dashboard");
  var treedaftar = document.getElementById("treedaftar");
  var formulir = document.getElementById("formulir");
  var statusform = document.getElementById("statusform");
  
  function clear_menu(){
    dashboard.className = "";
    treedaftar.className = "treeview";
    formulir.className = "";
    statusform.className = "";
  }

  clear_menu();
  treedaftar.className = "treeview active";
  formulir.className = "active";
</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('html').niceScroll({
         // Do not hide scrollbar when mouse out
    cursorborderradius: '10px', // Scroll cursor radius
    background: '#E5E9E7',     // The scrollbar rail color
    cursorwidth: '10px',       // Scroll cursor width
    cursorcolor: '#00a65a'     // Scroll cursor color
  });
});
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker1
    $('#datepicker1').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    //Date picker2
    $('#datepicker2').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

</body>
</html>
