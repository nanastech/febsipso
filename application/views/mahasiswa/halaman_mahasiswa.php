<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Dashboard</title>
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
  <!-- Tell the browser to be responsive to screen width -->
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
	<style type="text/css">
    /* Timeline */
    .timeline,
    .timeline-horizontal {
      list-style: none;
      padding: 20px;
      position: relative;
    }
    .timeline:before {
      top: 40px;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 3px;
      background-color: #eeeeee;
      left: 50%;
      margin-left: -1.5px;
    }
    .timeline .timeline-item {
      margin-bottom: 20px;
      position: relative;
    }
    .timeline .timeline-item:before,
    .timeline .timeline-item:after {
      content: "";
      display: table;
    }
    .timeline .timeline-item:after {
      clear: both;
    }
    .timeline .timeline-item .timeline-badge {
      color: #fff;
      width: 54px;
      height: 54px;
      line-height: 52px;
      font-size: 22px;
      text-align: center;
      position: absolute;
      top: 18px;
      left: 50%;
      margin-left: -25px;
      background-color: #7c7c7c;
      border: 3px solid #ffffff;
      z-index: 100;
      border-top-right-radius: 50%;
      border-top-left-radius: 50%;
      border-bottom-right-radius: 50%;
      border-bottom-left-radius: 50%;
    }
    .timeline .timeline-item .timeline-badge i,
    .timeline .timeline-item .timeline-badge .fa,
    .timeline .timeline-item .timeline-badge .glyphicon {
      top: 2px;
      left: 0px;
    }
    .timeline .timeline-item .timeline-badge.primary {
      background-color: #1f9eba;
    }
    .timeline .timeline-item .timeline-badge.info {
      background-color: #5bc0de;
    }
    .timeline .timeline-item .timeline-badge.success {
      background-color: #59ba1f;
    }
    .timeline .timeline-item .timeline-badge.warning {
      background-color: #d1bd10;
    }
    .timeline .timeline-item .timeline-badge.danger {
      background-color: #ba1f1f;
    }
    .timeline .timeline-item .timeline-panel {
      position: relative;
      width: 46%;
      float: left;
      right: 16px;
      border: 1px solid #c0c0c0;
      background: #ffffff;
      border-radius: 2px;
      padding: 20px;
      -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
      box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }
    .timeline .timeline-item .timeline-panel:before {
      position: absolute;
      top: 26px;
      right: -16px;
      display: inline-block;
      border-top: 16px solid transparent;
      border-left: 16px solid #c0c0c0;
      border-right: 0 solid #c0c0c0;
      border-bottom: 16px solid transparent;
      content: " ";
    }
    .timeline .timeline-item .timeline-panel .timeline-title {
      margin-top: 0;
      color: inherit;
    }
    .timeline .timeline-item .timeline-panel .timeline-body > p,
    .timeline .timeline-item .timeline-panel .timeline-body > ul {
      margin-bottom: 0;
    }
    .timeline .timeline-item .timeline-panel .timeline-body > p + p {
      margin-top: 5px;
    }
    .timeline .timeline-item:last-child:nth-child(even) {
      float: right;
    }
    .timeline .timeline-item:nth-child(even) .timeline-panel {
      float: right;
      left: 16px;
    }
    .timeline .timeline-item:nth-child(even) .timeline-panel:before {
      border-left-width: 0;
      border-right-width: 14px;
      left: -14px;
      right: auto;
    }
    .timeline-horizontal {
      list-style: none;
      position: relative;
      padding: 20px 0px 20px 0px;
      display: inline-block;
    }
    .timeline-horizontal:before {
      height: 3px;
      top: auto;
      bottom: 26px;
      left: 56px;
      right: 0;
      width: 100%;
      margin-bottom: 20px;
    }
    .timeline-horizontal .timeline-item {
      display: table-cell;
      height: 280px;
      width: 20%;
      min-width: 320px;
      float: none !important;
      padding-left: 0px;
      padding-right: 20px;
      margin: 0 auto;
      vertical-align: bottom;
    }
    .timeline-horizontal .timeline-item .timeline-panel {
      top: auto;
      bottom: 64px;
      display: inline-block;
      float: none !important;
      left: 0 !important;
      right: 0 !important;
      width: 75%;
      margin-bottom: 20px;
    }
    .timeline-horizontal .timeline-item .timeline-panel:before {
      top: auto;
      bottom: -16px;
      left: 28px !important;
      right: auto;
      border-right: 16px solid transparent !important;
      border-top: 16px solid #c0c0c0 !important;
      border-bottom: 0 solid #c0c0c0 !important;
      border-left: 16px solid transparent !important;
    }
    .timeline-horizontal .timeline-item:before,
    .timeline-horizontal .timeline-item:after {
      display: none;
    }
    .timeline-horizontal .timeline-item .timeline-badge {
      top: auto;
      bottom: 0px;
      left: 43px;
    }
  </style>
  	<style type="text/css">
    .btn3d {
    position:relative;
    top: -6px;
    border:0;
     transition: all 40ms linear;
     margin-top:10px;
     margin-bottom:10px;
     margin-left:2px;
     margin-right:2px;
    }
    .btn3d:active:focus,
    .btn3d:focus:hover,
    .btn3d:focus {
        -moz-outline-style:none;
             outline:medium none;
    }
    .btn3d:active, .btn3d.active {
        top:2px;
    }
    .btn3d.btn-white {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #f5f5f5, 0 8px 8px 1px rgba(0,0,0,.2);
        background-color:#fff;
    }
    .btn3d.btn-white:active, .btn3d.btn-white.active {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
        background-color:#fff;
    }
    .btn3d.btn-default {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #BEBEBE, 0 8px 8px 1px rgba(0,0,0,.2);
        background-color:#f9f9f9;
    }
    .btn3d.btn-default:active, .btn3d.btn-default.active {
        color: #666666;
        box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
        background-color:#f9f9f9;
    }
    .btn3d.btn-primary {
        box-shadow:0 0 0 1px #417fbd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4D5BBE, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#4274D7;
    }
    .btn3d.btn-primary:active, .btn3d.btn-primary.active {
        box-shadow:0 0 0 1px #417fbd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color:#4274D7;
    }
    .btn3d.btn-success {
        box-shadow:0 0 0 1px #31c300 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #5eb924, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#78d739;
    }
    .btn3d.btn-success:active, .btn3d.btn-success.active {
        box-shadow:0 0 0 1px #30cd00 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #78d739;
    }
    .btn3d.btn-info {
        box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #348FD2, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#39B3D7;
    }
    .btn3d.btn-info:active, .btn3d.btn-info.active {
        box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #39B3D7;
    }
    .btn3d.btn-warning {
        box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #D79A34, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#FEAF20;
    }
    .btn3d.btn-warning:active, .btn3d.btn-warning.active {
        box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #FEAF20;
    }
    .btn3d.btn-danger {
        box-shadow:0 0 0 1px #b93802 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #AA0000, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#D73814;
    }
    .btn3d.btn-danger:active, .btn3d.btn-danger.active {
        box-shadow:0 0 0 1px #b93802 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #D73814;
    }
    .btn3d.btn-magick {
        color: #fff;
        box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #9823d5, 0 8px 8px 1px rgba(0,0,0,0.5);
        background-color:#bb39d7;
    }
    .btn3d.btn-magick:active, .btn3d.btn-magick.active {
        box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
        background-color: #bb39d7;
    }
  </style>
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
        Dashboard
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
      <?php $outline=$this->Model->read_detail('nim',$this->session->userdata('username'),'outline');
      $dsnpa=$this->Model->dosenpa_where_detail('nim',$this->session->userdata('username'));
      $dospem=$this->Model->dospem_where_detail('nim',$this->session->userdata('username'));
      $poutline=0;
        if (!empty($outline)) {
          $poutline=$poutline+20;
        }
        if (!empty($outline->accstaff)) {
          $poutline=$poutline+20;
        }
        if (!empty($outline->accdsnpa)) {
          $poutline=$poutline+30;
        }
        if (!empty($outline->acckaprodi)) {
          $poutline=$poutline+30;
        }
        if (!empty($outline->revisi)) {
          $poutline=$poutline-10;
        }
      ?>
      <!-- Default box -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">

            <div class="inner">
              <h3 style="font-size: 43px;"><?= $poutline;?>%</h3>


              <p>Progress Outline</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="<?= base_url('Mahasiswa/status_outline/')?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php if (empty($dsnpa->noreg)) { ?>
              <h3 style="font-size: 20px;">Kosong</h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Kosong</h3>
            <?php }else{ ?>
              <h3 style="font-size: 20px;"><?= $dsnpa->noreg;?></h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;"><?= $dsnpa->nama_dsn;?></h3>
            <?php } ?>
              <p>Dosen PA</p>
            </div>
            <div class="icon">
              <i class="fa fa-black-tie"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-olive">
            <div class="inner">
            <?php if (empty($dospem->noreg)) { ?>
              <h3 style="font-size: 20px;">Kosong</h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Kosong</h3>
            <?php }else{ ?>
              <h3 style="font-size: 20px;"><?= $dospem->noreg;?></h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;"><?= $dospem->nama_dsn;?></h3>
            <?php } ?>
              <p>Dosen Pembimbing</p>
            </div>
            <div class="icon">
              <i class="fa fa-black-tie"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">

            <div class="inner">
              <h3 style="font-size: 43px;"><?php if (empty($dospem)) {
                echo 0;
              }else{
                echo $this->Model->bimbingan($dospem->id_dospem);
              }?></h3>


              <p>Total Bimbingan</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="<?= base_url('Mahasiswa/log_book/')?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

      </div>
      
      <!-- /.box -->
  
      			

       <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-file-text"></span>&nbsp;&nbsp;Contoh Outline</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          <div class="row">
              <div class="col-md-12" align="center">
                <h2>Contoh Outline</h2>
                <!-- Standard button -->
                <a type="button" class="btn3d btn btn-default btn-lg" href="<?=base_url('uploads/doc/outline2.docx')?>"><span class="glyphicon glyphicon-download-alt"></span> Download</a><br>
                
                <iframe src="http://docs.google.com/gview?url=<?=base_url('uploads/doc/')?>outline2.docx&embedded=true" style="width:600px; height:500px;max-width:100%; max-height:100%;" frameborder="0"></iframe>
                <br>
             
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            
          </div>
          <!-- /.box-footer-->
       </div>
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
    cursorcolor: '#00a65a'     // Scroll cursor color
  });
});
</script>
</body>
</html>
