<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Status Formulir</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="<?=base_url()?>/uploads/img/fti.ico" type="image/ico">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
        Status Pendaftaran
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>superadmin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsi</a></li>
        <li class="active">Status Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        if (!$this->Model->read_detail('nim',$this->session->userdata('username'),'daftar_sidang')) {?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Tidak Bisa Lihat Status Form!</h4>
            Maaf, Anda belum meng inputkan formulir pendaftaran sidang skripsi! 
          </div>
      <?php  }else{?>

      
      <!-- BOX Succes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Status </h3>
            </div>
            <div class="box-body table-responsive no-padding">
             <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 300px; text-align: center;">Data Pendaftaran</th>
                  <th style="width: 120px; text-align: center;">Subag LAA</th>
                  <th style="width: 120px; text-align: center;">Dosen Pembimbing</th>
                  <th style="width: 120px; text-align: center;">Kaprodi</th>
                  <th style="text-align: center;">Progress</th>
                </tr>
                <tr>
                  <td style="vertical-align: middle; text-align: center;">1.</td>
                  <?php $form=$this->Model->read_detail('nim',$this->session->userdata('username'),'daftar_sidang');?>
                  <td style="vertical-align: middle; text-align: center;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Detail</button>
                  <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm_file"> <span class="fa fa-file-text-o"></span>&nbsp;&nbsp;File Persyaratan</button>
                  </td>
                    <!-- Large modal -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                              <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?= $form->nama;?>">
                            </div>
                            <!--  nim -->
                            <div class="form-group col-md-6">
                              <label for="inputnim">NIM</label>
                              <input type="tel" pattern="[0-9]{10}" class="form-control" name="nim" id="inputnim" placeholder="Masukan Nomor Induk Mahasiswa" required="" readonly="" value="<?=$form->nim;?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputjp">Jenjang Pendidikan</label>
                              <input type="text" name="" readonly="" class="form-control" value="<?=$form->jenjang_pendidikan;?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputps">Program Studi</label>
                              <input type="text" class="form-control" readonly="" name="" value="<?=$form->program_studi;?>">
                            </div>

                            <div class="form-group col-md-12"> 
                              <div class="row">
                                <div class="col-md-6"> 
                                 <label for="inputtempat">Tempat Lahir</label>
                                <input type="text" class="form-control" readonly="" name="tempat" id="inputtempat" placeholder="Masukan Tempat" required="" value="<?=$form->tempat;?>">
                        
                                </div>
                                <div class="col-md-6">
                                 <label for="inputtempat">Tempat Lahir</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="tl" id="datepicker1" placeholder="Format : yyyy-mm-dd" required="" readonly="" value="<?=$form->tanggal_lahir;?>">
                                  </div>
                                </div>
                              </div> 
                            </div>

                            <div class="form-group col-md-12">
                              <label for="inputnamaortu">Nama Orang Tua</label></label>
                              <input type="text" class="form-control" name="ortu" required="" readonly="" id="inputnamaortu" placeholder="Masukan Nama Orang Tua" value="<?=$form->ortu;?>">
                            </div>

                            <div class="form-group col-md-12">
                              <label for="inputalamatrmh">Alamat Rumah <font color="red">*</font></label></label>
                              <textarea class="form-control" rows="3" id="inputalamatrmh" name="alamatrmh" readonly="" placeholder="Masukan Alamat Rumah Lengkap" required=""><?=$form->alamatrmh;?></textarea>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputtr">Nomor Telepon Rumah  <font color="red">*</font></label></label>
                              <input type="text" class="form-control" name="tr" required="" readonly="" id="inputtr" data-inputmask='"mask": "99999999999"' data-mask placeholder="Masukan Nomor Telepon Rumah" value="<?=$form->teleponrmh;?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputhp">Nomor Handphone  <font color="red">*</font></label></label>
                              <input type="text" class="form-control" id="inputhp" name="hp" readonly="" required="" placeholder="Masukan Nomor Handphone" data-inputmask='"mask": "999999999999"' data-mask value="<?=$form->hp;?>">
                            </div>

                            <div class="form-group col-md-12">
                              <label for="inputnamaktr">Nama Kantor</label>
                              <input type="text" class="form-control" readonly="" id="inputnamaktr" name="namaktr" placeholder="Masukan Nama Kantor" value="<?=$form->kantor;?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputjt">Jabatan Terakhir</label>
                              <input type="text" class="form-control" id="inputjt" name="jt" readonly="" placeholder="Masukan Jabatan Terakhir" value="<?=$form->jabatan;?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputemail">E-Mail</label></label>
                              <input type="email" class="form-control" id="inputemail" name="email" required="" readonly="" placeholder="Masukan E-Mail" value="<?=$form->email;?>">
                            </div>

                            <div class="form-group col-md-12">
                              <label for="inputalamatktr">Alamat Kantor</label>
                              <textarea class="form-control" rows="3" readonly="" id="inputalamatktr" name="alamatktr" placeholder="Masukan Alamat Kantor"><?=$form->alamatktr;?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                              <label for="inputtk">Telepon Kantor</label>
                              <input type="text" class="form-control" id="inputtk" readonly="" name="tk" placeholder="Masukan Telepon Kantor" value="<?=$form->teleponktr;?>">
                            </div>

                            <div class="form-group col-md-12">
                              <label for="inputjs">Judul Skripsi </label></label>
                              <textarea class="form-control" readonly="" rows="3" id="inputjs" readonly="" name="js" required="" placeholder="Masukan Judul Skripsi"><?=$form->judul_skripsi;?></textarea>
                            </div>

                            <div class="form-group col-md-12">
                              <?php $dosen=$this->Model->read_detail('noreg',$form->dospem,'dosen');?>
                              <div class="row">
                                <div class="col-md-12">
                                <label for="inputdospem1">Dosen Pembimbing</label></label>
                                <input type="text" readonly="" name="" class="form-control" value="[<?=$form->dospem;?>] <?=$dosen->nama;?>">
                                </div>
                              </div> 
                            </div>

                            
                            <div class="form-group col-md-6">
                              <label for="inputtglpo">Tanggal Persetujuan Outline </label></label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" readonly="" class="form-control pull-right" name="tglpo" required="" value="<?=$form->tglpo;?>">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputjtmb">Jumlah Tatap Muka Bimbingan </label></label>
                                <div class="input-group date">
                                  <input type="text" class="form-control pull-right" name="jtmb" required="" id="inputjtmb" placeholder="Masukan Jumlah Tatap Muka Bimbingan" readonly="" value="<?=$form->bimbingan;?>">
                                  <div class="input-group-addon">
                                    <label ><sub>X</sub></label>
                                  </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputpers">Perpanjangan Skripsi</label>
                                <div class="input-group date">
                                  <input type="text" class="form-control pull-right" name="pers" id="inputpers" placeholder="Masukan Jumlah Perpanjangan Skripsi" readonly="" value="<?=$form->pers;?>">
                                  <div class="input-group-addon">
                                    <label><sub>X</sub></label>
                                  </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputipk">Indeks Prestasi Komulatif </label></label>
                              <input type="text" class="form-control" id="inputipk" name="ipk" readonly="" required="" placeholder="Masukan Indeks Prestasi Komulatif" value="<?=$form->ipk;?>">
                            </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Small modal -->
                    <div class="modal fade bs-example-modal-sm_file" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Detail Dokumen Persyaratan</h4>
                            <?php $notfound=base_url('uploads/img/no.gif')?>
                          </div>
                          <div class="modal-body col-md-12">
                            <div class="form-group col-md-12">
                              <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Kartu Tanda Penduduk (KTP):</label>
                              <br/>
                              <img src="<?=base_url('uploads/sidang_skripsi/'.$form->ktp)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>

                            <div class="form-group col-md-12">
                              <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Kartu Keluarga (KK):</label>
                              <br/>
                              <img src="<?=base_url('uploads/sidang_skripsi/'.$form->kk)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>

                            <div class="form-group col-md-12">
                              <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Daftar Ulang Terakhir:</label>
                              <br/>
                              <img src="<?=base_url('uploads/sidang_skripsi/'.$form->slipdut)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>

                            <div class="form-group col-md-12">
                              <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Bimbingan Skripsi:</label>
                              <br/>
                              <img src="<?=base_url('uploads/sidang_skripsi/'.$form->slipbs)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>

                            <div class="form-group col-md-12">
                              <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Ujian Skripsi:</label>
                              <br/>
                              <img src="<?=base_url('uploads/sidang_skripsi/'.$form->slipus)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>
                            <div class="form-group col-md-12">
                              <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Perpanjangan Skripsi:</label>
                              <br/>
                              <img src="<?=base_url('uploads/sidang_skripsi/'.$form->slipps)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>
                           
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  <td style="vertical-align: middle; text-align: center;">
                    <?php 
                    if (empty($form->accstaff)) {
                      echo '<a type="button" class="btn btn-primary disabled" > Validasi</a>';
                    }else{
                      echo '<a type="button" class="btn btn-success disabled" > Validated</a>';
                    }
                    ?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?php 
                    if (empty($form->accdospem)) {
                      echo '<a type="button" class="btn btn-primary disabled" > Approve</a>';
                    }else{
                      echo '<a type="button" class="btn btn-success disabled" > Approved</a>';
                    }
                    ?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?php 
                    if (empty($form->acckaprodi)) {
                      echo '<a type="button" class="btn btn-primary disabled" > Approve</a>';
                    }else{
                          echo '<button type="button" class="btn btn-success disabled" > Approved</button>';
                    }
                    ?>
                   
                  </td>
                   
                  <td align="center" style="vertical-align: middle; text-align: center;">
                  <?php 
                    if (!empty($form->accdospem)&&!empty($form->acckaprodi)) {?>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                      </div><span class="badge bg-green">100%</span>
                  <?php }elseif (!empty($form->accdospem)&&empty($form->acckaprodi)) {?>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 70%"></div>
                      </div><span class="badge bg-yellow">70%</span>
                  <?php }elseif (empty($form->accdospem)&&!empty($form->acckaprodi)) {?>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 70%"></div>
                      </div><span class="badge bg-yellow">70%</span>
                  <?php }elseif (!empty($form->accstaff)&&empty($form->accdospem)&&empty($form->acckaprodi)) { ?>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 40%"></div>
                      </div><span class="badge bg-yellow">40%</span>
                  <?php }elseif (empty($form->accstaff)&&empty($form->accdospem)&&empty($form->acckaprodi)) { ?>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                      </div><span class="badge bg-red">20%</span>
                  <?php }
                  ?>
                  </td>
                </tr>
              </table>
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
  statusform.className = "active";

</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
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
</body>
</html>
