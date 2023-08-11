<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Log Book</title>
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
<?php $this->load->view('dospem/layout/top'); ?>	
<?php $this->load->view('dospem/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Log Book
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Log Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $notification; ?>
    <?php $nim=base64_decode($this->uri->segment(3));?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Log Book Bimbingan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <br/>
              <?php $dospem=$this->Model->read_detail('nim',$nim,'dospem');
              $mhs = $this->Model->read_detail('nim',$nim,'mahasiswa');
              $outline = $this->Model->read_detail('nim',$nim,'outline');
              ?>
              <div class="col-md-12">
                <div class="row">
                
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="fa fa-mortar-board"></span><label>&nbsp;&nbsp;Mahasiswa</label>
                      <input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Mahasiswa" value="<?='['.$mhs->nim.'] '.$mhs->nama;?>">
                    </div>

                    <div class="form-group">
                      <span class="fa fa-book"></span><label>&nbsp;&nbsp;Judul Skripsi</label>
                      <textarea name="judul" class="form-control" rows="3" readonly=""><?=mb_convert_case($outline->topikfix, MB_CASE_UPPER, "UTF-8");?></textarea>
                    </div>
                    <div class="form-group">
                      <span class="fa fa-download"></span><label>&nbsp;&nbsp;Outline Skripsi</label>
                      <?php if (empty($outline->outline_fix)) {?>
                        <a href="<?=base_url('uploads/'.$outline->outline_fix)?>" class="form-control btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                      <?php }else{ ?>
                          <a href="<?=base_url('uploads/'.$outline->outline_fix)?>" class="form-control btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                      <?php  } ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="fa fa-envelope"></span><label>&nbsp;&nbsp;Nomor Surat</label>
                      <input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Mahasiswa" value="<?php if (!empty($outline->no_surat)) {
                        echo $outline->no_surat;
                      }else{
                        echo "-";
                        } ;?>">
                    </div>
                    <div class="form-group" align="center">
                      <img src="<?php echo base_url('uploads/img/logofull.png'); ?>" style="max-width: 320px;" class="form-group col-md-12">
                    </div>
                  </div>
                  <div class=" col-md-4">
                    <div class="form-group">

                      <span class="fa fa-briefcase"></span><label>&nbsp;&nbsp;Dosen Pembimbing</label>
                      <input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Dosen" value="<?='['.$this->session->userdata('username').'] '.$this->session->userdata('name');?>">
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                      <span class="fa fa-briefcase"></span><label>&nbsp;&nbsp;Total Bimbingan</label>
                    </div>
                    <label style="font-size: 110px;"><strong><?= $this->Model->bimbingan($dospem->id)?></strong></label> 
                    
                  </div>
                </div>  
                <br/>
                <div class="row" style="padding-bottom: 15px;">
                  <div class="form-group col-md-4"></div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4" align="right"><a target="_blank" class="btn btn-danger" href="<?= base_url('Dospem/cetak_logbook/'.$this->uri->segment(3))?>"><span class="fa fa-file-pdf-o"></span>&nbsp;&nbsp;Cetak Log Book</a></div>
                </div>
               
              </div>
              <div class="col-md-12">
                <table class="table table-hover">
                  <tr>
                    <th style="width: 40px;">#</th>
                    <th style="width: 180px;">Tanggal</th>
                    <th style="width: 450px; ">Uraian Bimbingan (Mahasiswa)</th>
                    <th style="width: 450px; ">Catatan Pembimbing (Pembimbing)</th>
                    <th> </th>
                    <th style="text-align: center; width: 160px;">Dosen Pembimbing</th>
                  </tr>
                  <?php $bimbingans=$this->Model->read_where('id_dospem',$dospem->id,'log_book');
                  $no=1;
                  if (empty($bimbingans)) { ?>
                    <tr align="center">
                      <td colspan="4"><strong class="label label-danger">Data Kosong</strong></td>
                    </tr>
                  <?php }else{
                    foreach ($bimbingans as $bimbingan) { ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td><?= indonesian_date(strtotime($bimbingan['tanggal']),'l, d-m-Y','');?></td>
                      <td><?= $bimbingan['topik'];?><br><?php if (!empty($bimbingan['lu_topik'])) {
                        echo '<small class="pull-right"><i>last updated: '.indonesian_date(strtotime($bimbingan['lu_topik']),'d-m-Y H:i:s','').'</i></small>';
                      } ?></td>
                      <td><?php if (empty($bimbingan['catatan'])) {
                        echo "-";
                      }else{
                        echo $bimbingan['catatan'].'<br><small class="pull-right"><i>last updated: '.indonesian_date(strtotime($bimbingan['lu_catatan']),'d-m-Y H:i:s','').'</i></small>';
                        } ?></td>  
                      <td><?php if (empty($bimbingan['accdospem'])) {?>
                        <button class="btn btn-warning " data-toggle="modal" data-target=".bs-example-modal-sm<?= $bimbingan['id'] ?>"><span class="fa fa-plus"></span>&nbsp;&nbsp;Catatan</button>
                      <?php } ?></td>
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm<?= $bimbingan['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Tambah Catatan</h4>
                              </div>
                              <form action="<?= base_url('Dospem/update_bimbingan/'.$bimbingan['id'])?>" method="POST">
                              <div class="modal-body col-md-12">
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Catatan Pembimbing:</label>
                                  <textarea class="form-control" name="catatan" rows="3" required=""><?= $bimbingan['catatan'];?></textarea>
                                  
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" name="" class="btn btn-primary" value="Update">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <td align="center">
                        <?php
                        if (empty($bimbingan['accdospem'])) { ?>
                          <a class="btn btn-primary " href="<?= base_url('Dospem/validasi_logbook/'.$bimbingan['id']);?>">Validate</a>
                        <?php }else{ ?>
                          <a class="btn btn-success disabled">Validated</a>
                        <?php
                          echo '<small class="pull-right"><i>'.indonesian_date(strtotime($bimbingan['tglaccdospem']),'d-m-Y H:i:s','').'</i></small>';
                         }
                        ?>
                      </td>
                    </tr>
                  <?php
                  $no++;
                    }  
                  }
                  ?>
                  
                </table>
              </div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- Default box -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('dospem/layout/bot'); ?>

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
  

  var treeoutline = document.getElementById("treeoutline");
  var status_outline = document.getElementById("status_outline");
  var log_book = document.getElementById("log_book");
  
  function clear_menu(){
    dashboard.className = "";
    treeoutline.className = "treeview";
    status_outline.className = "";
    log_book.className='';
  }

  clear_menu();
  log_book.className = "active";
  
</script>
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
