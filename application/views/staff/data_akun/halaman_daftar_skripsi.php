<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Daftar Skripsi</title>
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
  <?php $this->load->view('staff/layout/top'); ?>	
  <?php $this->load->view('staff/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Skripsi
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>superadmin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Akun</a></li>
        <li class="active">Daftar Skripsi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $notification; ?>
      <!-- Default box -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Skripsi Mahasiswa</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="example1"  class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width: 18px;">No</th>
                      <th style="width: 89px;">Program Studi</th>
                      <th style="width: 48px;">NIM</th>
                      <th style="width: 80px;">Nama</th>
                      <th style="width: 355px;">Judul Skripsi</th>
                      <th >Pembimbing</th>
                      <th >Status</th>
                      <th> Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $mahasiswas=$this->Model->read_orderby1('judul_skripsi','nim','ASC');
                    if ($mahasiswas) {
                      $no=1;
                      $jenjang='';
                      $jurusan='';
                      foreach ($mahasiswas as $id) { 
                      $mahasiswa=$this->Model->read_detail('nim',$id['nim'],'mahasiswa'); 
                      $pembimbing=$this->Model->read_detail('noreg',$id['pembimbing'],'dosen');
                      if ($mahasiswa->jurusan=='TI') {
                        $jurusan='Teknik Informatika';
                       }elseif ($mahasiswa->jurusan=='SI') {
                        $jurusan='Sistem Informasi';
                       }elseif ($mahasiswa->jurusan=='SK') {
                        $jurusan='Sistem Komputer';
                       }else{
                        $jurusan='Error 404';
                       } 
                       // if ($mahasiswa->jenjang=='Strata Satu') {
                       //   $jenjang='S1';
                       // }elseif ($mahasiswa->jenjang=='Strata Dua') {
                       //   $jenjang='S2';
                       // }elseif ($mahasiswa->jenjang=='Diploma Tiga') {
                       //   $jenjang='D3';
                       // }else{
                       //   $jenjang='Error 404';
                       // } ?>
                      <tr>
                        <td align="center"><?=$no;?></td>
                        <td align="center">[S1]<br><?=$jurusan;?></td>
                        <td align="center"><?=$id['nim']?></td>
                        <td ><?=$mahasiswa->nama;?></td>
                        <td align="justify"><?= mb_strtoupper($id['judul'],'UTF-8');?></td>
                        <td align="center"><?php if ($id['pembimbing']) {?>
                          [<?=$id['pembimbing']?>]<br><?=$pembimbing->nama;?>
                        <?php }else{
                          echo "-";
                          } ?></td>
                        <td align="center"><?php if ($id['status']=='proses') {?>
                          Aktif
                        <?php }elseif ($id['status']=='lulus') {
                          echo "Lulus";
                        }else{
                          echo "-";
                          } ?></td>

                          <td><a  class="btn btn-primary btn-xs disabled">Edit</a>
                          <a  class="btn btn-danger btn-xs disabled">Delete</a></td>
                      </tr>
                    <?php $no++;}
                    }?>
                  </tbody>
              </table>
              </div>
              <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
   

    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('staff/layout/bot'); ?>

  <!--======================================================================================-->
</div>
<!-- ./wrapper -->

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
<!-- page script -->
<script>
  var dashboard = document.getElementById("dashboard");
  var treedata = document.getElementById("treedata");
  var daftar_akun = document.getElementById("daftar_akun");
  var daftar_mhs = document.getElementById("daftar_mhs");
  var daftar_dsn = document.getElementById("daftar_dsn");
  // var daftar_pa = document.getElementById("daftar_pa");
  // var daftar_dospem = document.getElementById("daftar_dospem");
  // var daftar_kaprodi = document.getElementById("daftar_kaprodi");
  function clear_menu(){
    dashboard.className = "";
    treedata.className = "treeview";
    daftar_akun.className = "";
    daftar_mhs.className = "";
    daftar_dsn.className = "";
    // daftar_pa.className = "";
    // daftar_dospem.className = "";
    // daftar_kaprodi.className = "";
  }

  clear_menu();
  treedata.className = "treeview active";
  daftar_mhs.className = "active";

</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
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
