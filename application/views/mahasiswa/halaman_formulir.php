<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Formulir Pendaftaran</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="<?=base_url()?>/uploads/img/fti.ico" type="image/ico">
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
        <li><a href="#">Pendaftaran Sidang</a></li>
        <li class="active">Formulir Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        if ($this->Model->read_detail('nim',$this->session->userdata('username'),'daftar_sidang')) { ?>
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Tidak Bisa Isi Form!</h4>
              Maaf, Anda sudah mengisi form sebelumnya!
          </div>
      <?php }else{
        $dospem=$this->Model->dospem_where_detail('nim',$this->session->userdata('username'));
        $info=$this->Model->read_detail_tri('nim',$this->session->userdata('username'),'status_outline','Diterima','revisi','','outline');
        if (empty($info) || $this->Model->cek_sudah_tervalidasi($dospem->id_dospem)<8) { ?>
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Tidak Bisa Isi Form!</h4>
              Maaf, Status outline Anda belum diterima/masih dalam tahap revisi dan jumlah bimbingan kurang dari 8!
          </div>
        <?php 
        }else{ ?>
           <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Pendaftaran Sidang</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo base_url('mahasiswa/daftar/'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="col-md-12">
                        <div class="form-group col-md-12">
                          <label for="inputnama">Nama</label>
                          <input type="text" class="form-control" id="inputnama" name="nama" placeholder="Masukan Nama" required="" readonly="" value="<?= ucwords($this->session->userdata('name'));?>">
                          <?php echo form_error('nama');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputnim">NIM </label>
                          <input type="tel" pattern="[0-9]{10}" class="form-control" name="nim" id="inputnim" placeholder="Masukan Nomor Induk Mahasiswa" required="" readonly="" value="<?=$this->session->userdata('username');?>">
                          <?php echo form_error('nim');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputjp">Jenjang Pendidikan</label>
                          <select class="form-control" name="jp" required="" id="inputjp">
                            <option value="D3">D3</option>
                            <option value="S1" selected="">S1</option>
                            <option value="S2">S2</option>
                          </select>
                          
                          <?php echo form_error('jp');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputps">Program Studi</label>
                          <select class="form-control" name="ps" required="" id="inputps">
                            <option value="TI" selected="">TI</option>
                            <option value="SI" >SI</option>
                            <option value="SK">SK</option>
                          </select>
                          <?php echo form_error('ps');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputtempat">Tempat/ Tanggal Lahir</label>
                          <div class="row">
                            <div class="col-md-6"> 
                            <input type="text" class="form-control" name="tempat" id="inputtempat" placeholder="Masukan Tempat" required="">
                            <?php echo form_error('tempat');?>
                            </div>
                            <div class="col-md-6">
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="tl" id="datepicker1" placeholder="Masukan Tanggal Lahir" required="">
                              </div>
                              <?php echo form_error('tl');?>
                            </div>
                          </div> 
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputnamaortu">Nama Orang Tua</label>
                          <input type="text" class="form-control" name="ortu" required="" id="inputnamaortu" placeholder="Masukan Nama Orang Tua">
                          <?php echo form_error('ortu');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputalamatrmh">Alamat Rumah</label>
                          <textarea class="form-control" rows="3" id="inputalamatrmh" name="alamatrmh" placeholder="Masukan Alamat Rumah" required=""></textarea>
                          <?php echo form_error('alamatrmh');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputtr">Telepon Rumah</label>
                          <input type="text" class="form-control" name="tr" required="" id="inputtr" placeholder="Masukan Nomor Telepon Rumah">
                          <?php echo form_error('tr');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputhp">/ HP</label>
                          <input type="text" class="form-control" id="inputhp" name="hp" required="" placeholder="Masukan Nomor Handphone">
                          <?php echo form_error('hp');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputnamaktr">Nama Kantor</label>
                          <input type="text" class="form-control" id="inputnamaktr" name="namaktr" placeholder="Masukan Nama Kantor">
                          <?php echo form_error('namaktr');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputjt">Jabatan Terakhir</label>
                          <input type="text" class="form-control" id="inputjt" name="jt"  placeholder="Masukan Jabatan Terakhir">
                          <?php echo form_error('jt');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputemail">E-Mail</label>
                          <input type="email" class="form-control" id="inputemail" name="email" required="" placeholder="Masukan E-Mail">
                          <?php echo form_error('email');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputalamatktr">Alamat Kantor</label>
                          <textarea class="form-control" rows="3" id="inputalamatktr" name="alamatktr" placeholder="Masukan Alamat Kantor"></textarea>
                          <?php echo form_error('alamatktr');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputtk">Telepon Kantor</label>
                          <input type="text" class="form-control" id="inputtk" name="tk" placeholder="Masukan Telepon Kantor">
                          <?php echo form_error('tk');?>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputjs">Judul Skripsi</label>
                          <textarea class="form-control" readonly="" rows="3" id="inputjs" name="js" required="" placeholder="Masukan Judul Skripsi"><?=$info->topikfix;?></textarea>
                          <?php echo form_error('js');?>
                        </div>

                        <div class="form-group col-md-12">
                          
                          <div class="row">

                            <div class="col-md-12">
                            <label for="inputdospem1">Dosen Pembimbing</label>
                            <input type="text" name="dospem" class="form-control" readonly="" value="<?=$info->dospemfix;?>" required="">
                            <?php echo form_error('dospem');?>
                            </div>
                            
                          </div> 
                        </div>

                        
                        <div class="form-group col-md-6">
                          <label for="inputtglpo">Tanggal Persetujuan Outline</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="tglpo" required="" id="datepicker2" placeholder="Masukan Tanggal Persetujuan Outline">
                            </div>
                            <?php echo form_error('tglpo');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputjtmb">Jumlah Tatap Muka Bimbingan</label>
                            <div class="input-group date">
                              <input type="text" class="form-control pull-right" name="jtmb" required="" id="inputjtmb" placeholder="Masukan Jumlah Tatap Muka Bimbingan">
                              <div class="input-group-addon">
                                <label >Kali</label>
                              </div>
                            </div>
                            <?php echo form_error('jtmb');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputpers">Perpanjangan Skripsi</label>
                            <div class="input-group date">
                              <input type="text" class="form-control pull-right" name="pers" id="inputpers" placeholder="Masukan Jumlah Perpanjangan Skripsi">
                              <div class="input-group-addon">
                                <label>Kali</label>
                              </div>
                            </div>
                            <?php echo form_error('pers');?>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputipk">Indeks Prestasi Komulatif</label>
                          <input type="text" class="form-control" id="inputipk" name="ipk" required="" placeholder="Masukan Indeks Prestasi Komulatif">
                          <?php echo form_error('ipk');?>
                        </div>

                        <legend>Upload Slip Daftar Ulang Terakhir</legend>
                        <div class="form-group ">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" name="slipdut" required="" id="exampleInputFile">

                          <p class="help-block">Example block-level help text here.</p>
                         
                        </div>

                        <legend>Upload Slip Bimbingan Skripsi</legend>
                        <div class="form-group ">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" name="slipbs" required="" id="exampleInputFile">

                          <p class="help-block">Example block-level help text here.</p>
                          
                        </div>

                        <legend>Upload Slip Ujian Skripsi</legend>
                        <div class="form-group ">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" name="slipus" required="" id="exampleInputFile">

                          <p class="help-block">Example block-level help text here.</p>
                          
                        </div>

                        <legend>Upload Slip Perpanjangan Skripsi (Jika Lebih Dari 1 Semester)</legend>
                        <div class="form-group ">
                          <label for="exampleInputFile">File input</label>
                          <input type="file" name="slipps" id="exampleInputFile">

                          <p class="help-block">Example block-level help text here.</p>
                         
                        </div>

                        
                        <br>
                        <div class="form-group " style="margin-bottom: 0px;">
                          <label>
                            <font color="red">*</font> Required!
                          </label>
                        </div>

                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer" align="center">
                      <input type="submit" class="btn btn-primary" value="Submit">
                      <input type="reset" class="btn btn-warning" value="Reset">
                      <a type="button" class="btn btn-default" href="<?= base_url('Mahasiswa/')?>">Cancel</a>
                    </div>
                  </form>
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
    cursorcolor: '#67b0d1'     // Scroll cursor color
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
      autoclose: true
    });

    //Date picker2
    $('#datepicker2').datepicker({
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
