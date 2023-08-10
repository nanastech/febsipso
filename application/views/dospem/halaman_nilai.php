<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="<?=base_url()?>/uploads/img/perbanas.ico" type="image/ico">
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
	 	
?>
<!-- Site wrapper -->
<div class="wrapper">
<!--======================================================================================-->
<?php $this->load->view('dospem/layout/top'); ?>	
<?php $this->load->view('dospem/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dospem/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
 
<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pendaftaran Sidang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php 
              // $outline=$this->Model->read_detail('Nim',$this->session->userdata('username'),'outline');
              // $info=$this->Model->read_detail('Nim',$this->session->userdata('username'),'info');
              ?>
            <form role="form" action="<?php echo base_url('mahasiswa/daftar/'); ?>" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-12">
                  <div class="form-group col-md-6">
                    <label for="inputnamapenilai">NAMA PENILAI</label>
                    <input type="text" class="form-control" id="inputnamapenilai" name="penilai" placeholder="Masukan Nama Penilai" required="" readonly="" value="<?= ucwords($this->session->userdata('name'));?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputdiuji">NAMA YANG DIUJI </label>
                    <input type="text" class="form-control" id="inputdiuji" name="diuji" placeholder="Mahasiswa" required="" readonly="" value="">
                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputtgl">HARI/TANGGAL</label>
                    <input type="text" class="form-control" id="inputtgl" name="tgl" placeholder="Hari, Tanggal" required="" readonly="" value="">
                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inpunim">NIM</label>
                    <input type="text" class="form-control" id="inpunim" name="nim" placeholder="NIM" required="" readonly="" value="">
                    
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputwkt">WAKTU</label>
                    <input type="text" class="form-control" id="inputwkt" name="waktu" placeholder="00.00 - 00.00" required="" readonly="" value="">
                    
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputruang">RUANG</label>
                    <input type="text" class="form-control" id="inputruang" name="ruang" placeholder="2201" required="" readonly="" value="">
                    
                  </div>
                  <table>
                  	<thead>
	                  	<tr>	
	                  		<th>
	                  			KRITERIA
	                  		</th>
	                  		<th>
	                  			BOBOT
	                  		</th>
	                  		<th>
	                  			NILAI
	                  		</th>
	                  		<th>
	                  			BOBOT NILAI
	                  		</th>
	                  	</tr>
                  	</thead>
                  	<tbody>
                  		<tr>
                  			<td>
                  				<strong>A. PENYAJIAN</strong><br>
                  				&nbsp;&nbsp;- Keyakinan diri/self confidence <br>
                  				&nbsp;&nbsp;- Argumentasi dalam menjawab/menyanggah <br>
                  				&nbsp;&nbsp;- Pemahaman (mengerti makna dan fakta yang diketahui) <br>
                  			</td>
                  		</tr>
                  	</tbody>
                  </table>
                  
                                 
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
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('dospem/layout/bot'); ?>

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
  dashboard.className = "active";

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
    cursorcolor: '#67b0d1'     // Scroll cursor color
  });
});
</script>
</body>
</html>
