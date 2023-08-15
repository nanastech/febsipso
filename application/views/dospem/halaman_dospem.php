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
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
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
      <?php echo $notification; ?>

      <!-- Default box -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">

            <div class="inner">
              <h3 style="font-size: 43px;"> 0 <span class="fa fa-child"></span></h3>
              <p>Outline</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 style="font-size: 43px;"><?= $this->Model->widget_dosenpa_mahasiswa($this->session->userdata('username'))?> <span class="fa fa-child"></span></h3>
              <p>Mahasiswa PA</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
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
              <h3 style="font-size: 43px;"><?= $this->Model->widget_dospem_mahasiswa($this->session->userdata('username'))?> <span class="fa fa-child"></span></h3>
              <p style="width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Mahasiswa Bimbingan Skripsi</p>
            </div>
            <div class="icon">
              <i class="fa fa-chain"></i>
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
              <h3 style="font-size: 43px;"><?=$this->Model->dospem_verify_daftarsidang($this->session->userdata('username'))?></h3>
              <p style="width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Validasi Sidang Skripsi</p>
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

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Mahasiswa PA</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Jurusan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $mahasiswapas = $this->Model->list_mahasiswapa($this->session->userdata('username'));
                  $no1=1;
                  if (empty($mahasiswapas)) {
                    # code...
                  }else{
                  foreach ($mahasiswapas as $mahasiswapa) { ?>
                  <tr>
                    <td align="center"><?= $no1;?></td>
                    <td align="center"><?= '['.$mahasiswapa['nim'].']<br/>'.$mahasiswapa['nama_mhs']?></td>
                    <td align="center">
                    <?php if ($mahasiswapa['jurusan']=='DAK') {
                            echo 'D3 Akuntansi';
                          }elseif ($mahasiswapa['jurusan']=='DKP') {
                            echo 'D3 Keuangan & Perbankan';
                          }elseif ($mahasiswapa['jurusan']=='SA') {
                            echo 'S1 Akuntasi';
                          }elseif ($mahasiswapa['jurusan']=='SM') {
                            echo 'S1 Manajemen';
                          }elseif ($mahasiswapa['jurusan']=='EKS') {
                            echo 'S1 Ekonomi Syariah';
                          }?>
                    </td>
                  </tr>
                  <?php
                  $no1++; }
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Mahasiswa</th>
                    <th>Jurusan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning" style="border-top-color: #3d9970;">
            <div class="box-header with-border">
              <h3 class="box-title">Mahasiswa Bimbingan Skripsi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Jurusan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $mahasiswasks = $this->Model->list_mahasiswaskripsi($this->session->userdata('username'));
                  $no1=1;
                  if (empty($mahasiswasks)) {
                    # code...
                  }else{
                  foreach ($mahasiswasks as $mahasiswask) { 
                    if ($this->Model->read_detail_dual('nim',$mahasiswask['nim'],'status','proses','judul_skripsi')) {?>
                      <tr>
                        <td align="center"><?= $no1;?></td>
                        <td align="center"><?= '['.$mahasiswask['nim'].']<br/>'.$mahasiswask['nama_mhs']?></td>
                        <td align="center">
                        <?php if ($mahasiswask['jurusan']=='DAK') {
                            echo 'D3 Akuntansi';
                          }elseif ($mahasiswask['jurusan']=='DKP') {
                            echo 'D3 Keuangan & Perbankan';
                          }elseif ($mahasiswask['jurusan']=='SA') {
                            echo 'S1 Akuntasi';
                          }elseif ($mahasiswask['jurusan']=='SM') {
                            echo 'S1 Manajemen';
                          }elseif ($mahasiswask['jurusan']=='EKS') {
                            echo 'S1 Ekonomi Syariah';
                          }?>
                        </td>
                      </tr>
                    <?php   $no1++;}
                     }
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Mahasiswa</th>
                    <th>Jurusan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang Dosen Pembimbing!</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
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
  
  function clear_menu(){
    dashboard.className = "";
   
  }

  clear_menu();
  dashboard.className = "active";

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
    $("#example1").DataTable({
      "lengthMenu": [ 5, 10, 25, 50, 100 ]
    });
    $("#example2").DataTable({
      "lengthMenu": [ 5, 10, 25, 50, 100 ]
    });
    $('#example3').DataTable({
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
