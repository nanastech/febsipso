<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Surat Outline</title>
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
        Surat Outline
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Proposal Outline</a></li>
        <li class="active">Surat Outline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
        <!-- BOX Succes -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Data Surat Outline </h3> 
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="text-align: center;">No. Surat</th>
                    <th style="text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">TTL</th>
                    <th style="text-align: center;">Prodi</th>
                    <th style="text-align: center;">Pembimbing</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Judul</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <?php $mahasiswas = $this->Model->read_orderby_dual('status_outline','Diterima','revisi','','outline','no_surat','DESC');
                if (!empty($mahasiswas)) {
                  $no1=1;
                  foreach ($mahasiswas as $mahasiswa) { ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                      <td style="vertical-align: middle; text-align: center;"><?php 
                      if (!empty($mahasiswa['no_surat'])) {
                        echo $mahasiswa['no_surat'];
                      }else{
                        echo "-";
                      }
                      ?></td>
                      <td style="vertical-align: middle; text-align: center;">[<?= $mahasiswa['nim'];?>]<br><?= $mahasiswa['nama'];?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= ucwords($mahasiswa['tempat']).', '.$mahasiswa['tgllahir'];?></td>
                      <td style="vertical-align: middle; text-align: center;"><?=$mahasiswa['jurusan']?></td>
                      <td style="vertical-align: middle; text-align: center;"><?php
                      if (!empty($mahasiswa['dospemfix'])) {
                         $dospem=$this->Model->read_detail('noreg',$mahasiswa['dospemfix'],'dosen');
                         echo '['.$mahasiswa['dospemfix'].']<br>'.$dospem->nama;
                       }else{
                        echo "-";
                        }?>
                      </td>
                      <td style="vertical-align: middle; text-align: center;"><?php
                      if (!empty($mahasiswa['email'])) {
                         echo $mahasiswa['email'];
                       }else{
                        echo "-";
                        } ?></td>
                      <td style="vertical-align: middle; text-align: center;"><?php
                      if (!empty($mahasiswa['topikfix'])) {
                         echo mb_convert_case($mahasiswa['topikfix'], MB_CASE_TITLE, "UTF-8");
                       }else{
                        echo "-";
                        } ?></td>
                      <td><button class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target=".bs-example-modal-sm<?= $mahasiswa['nim'] ?>"><span class="fa fa-plus"></span>&nbsp;&nbsp;No. Surat</button><br>
                      <a class="btn btn-danger btn-xs btn-block" target="_blank" href="<?= base_url('Staff/cetak_surat/'.base64_encode($mahasiswa['nim'])) ?>"><span class="fa fa-file-pdf-o"></span>&nbsp;&nbsp;Cetak</a></td>
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm<?= $mahasiswa['nim'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Nomor Surat</h4>
                              </div>
                              <form action="<?= base_url('staff/update_nosurat/'.$mahasiswa['nim'])?>" method="POST">
                              <div class="modal-body col-md-12">
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Nomor Surat : </label>
                                  <input type="text" name="no_surat" class="form-control" value="<?= $mahasiswa['no_surat']?>" required="" > 
                                </div>
                                <!-- <div class="form-group col-sm-2" style="padding-right: 0px; width: 65px;">
                                  <input type="text" class="form-control" name="no" required="" maxlength="3" value="<?= $this->Model->hitung_surat()+1?>">
                                </div>
                                <div class="form-group col-sm-1" style="padding-right: 0px; width: 22px;">
                                  <font size="5">/</font>
                                </div>
                                <div class="form-group col-sm-2" style="padding-right: 0px; width: 80px;">
                                  <input type="text" class="form-control" name="ket1" required="" maxlength="6" value="OL.INF">
                                </div>
                                <div class="form-group col-sm-1" style="padding-right: 0px; width: 22px;">
                                  <font size="5">/</font>
                                </div>
                                <div class="form-group col-sm-2" style="padding-right: 0px; width: 60px;">
                                  <input type="text" class="form-control" name="ket2" required="" maxlength="3">
                                </div>
                                <div class="form-group col-sm-1" style="padding-right: 0px; width: 22px;">
                                  <font size="5">/</font>
                                </div>
                                <div class="form-group col-sm-2" style="padding-right: 0px; width: 80px;">
                                  <input type="text" class="form-control" name="ket3" required="" maxlength="6" value="IKPIAP">
                                </div>
                                <div class="form-group col-sm-1" style="padding-right: 0px; width: 22px;">
                                  <font size="5">/</font>
                                </div>
                                <div class="form-group col-sm-2" style="padding-right: 0px; width: 75px;">
                                  <input type="text" class="form-control" name="ket4" required="" maxlength="4">
                                </div> -->
                              </div>
                              <div class="modal-footer">
                                <input type="submit" name="" class="btn btn-primary" value="Update">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>  
                    </tr>
                <?php 
                  $no1++; 
                  }
                }
                ?>
                <tfoot>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="text-align: center;">No. Surat</th>
                    <th style="text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">TTL</th>
                    <th style="text-align: center;">Prodi</th>
                    <th style="text-align: center;">Pembimbing</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Judul</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      
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
  

  var treeoutline = document.getElementById("treeoutline");
  var surat_outline = document.getElementById("surat_outline");
  
  function clear_menu(){
    dashboard.className = "";
   
    treeoutline.className = "treeview";
    surat_outline.className = "";
  }

  clear_menu();
  treeoutline.className = "treeview active";
  surat_outline.className = "active";

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
    $("#example3").DataTable({
      "lengthMenu": [ 5, 10, 25, 50, 100 ]
    });
    $('#example4').DataTable({
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
