<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Pelaksanaan Skripsi Online Perbanas Institute</title>
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Material datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>

  <!-- <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/bootstrap-material-design/dist/js/bootstrap-material-design.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>

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
<body class="hold-transition skin-blue layout-top-nav fixed" onload="setInterval('displayServerTime()', 1000);">
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
<div class="wrapper">
<?php $this->load->view('layout/top'); ?> 
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Jadwal Sidang Skripsi
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
   <!--        <li><a href="#">Layout</a></li>-->
          <li class="active">Jadwal Sidang Skripsi</li> 
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php echo $notification; ?>
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div>
        <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-book"></span>&nbsp;&nbsp;Jadwal Sidang Skripsi</h3>
          </div>
          <div class="box-body table-responsive">
            <div class="col-md-12">
           		<table id="example1"  class="table table-bordered table-striped">
	                <thead>
	                	<tr>
	                		<th style="width: 18px;">No</th>
	                		<th style="width: 86px;">Program Studi</th>
	                		<th style="width: 48px;">Mahasiswa</th>
	                		<th style="width: 94px">Judul Skripsi</th>
                      <th style="width: 64px;">Penguji I</th>
                      <th style="width: 64px;">Penguji II</th>
                      <th style="width: 77px;">Pembimbing</th>
                      <th style="width: 49px;">Tanggal</th>
                      <th style="width: 47px;">Waktu</th>
                      <th style="width: 47px;">Tempat</th>
	                	</tr>
	                </thead>
	               	<tbody>
	                	<?php $mahasiswas=$this->Model->read_orderby1('jadwal_sidang','tanggal_id','ASC');
	                	if ($mahasiswas) {
	                		$no=1;
	                		$jenjang='';
	                		$jurusan='';
	                		foreach ($mahasiswas as $id) { 
	                		$mahasiswa=$this->Model->read_detail('nim',$id['nim'],'daftar_sidang');	
                      $penguji1=$this->Model->read_detail('noreg',$id['penguji1'],'dosen');
                      $penguji2=$this->Model->read_detail('noreg',$id['penguji2'],'dosen');
	                		$pembimbing=$this->Model->read_detail('noreg',$id['pembimbing'],'dosen');
                      $tanggal=$this->Model->read_detail('id',$id['tanggal_id'],'tanggal_sidang');
	                		if ($mahasiswa->program_studi=='TI') {
	                		 	$jurusan='Teknik Informatika';
	                		 }elseif ($mahasiswa->program_studi=='SI') {
	                		 	$jurusan='Sistem Informasi';
	                		 }elseif ($mahasiswa->program_studi=='SK') {
	                		 	$jurusan='Sistem Komputer';
	                		 }else{
	                		 	$jurusan='Error 404';
	                		 } 
	                		 // if ($mahasiswa->jenjang=='Strata Satu') {
	                		 // 	$jenjang='S1';
	                		 // }elseif ($mahasiswa->jenjang=='Strata Dua') {
	                		 // 	$jenjang='S2';
	                		 // }elseif ($mahasiswa->jenjang=='Diploma Tiga') {
	                		 // 	$jenjang='D3';
	                		 // }else{
	                		 // 	$jenjang='Error 404';
	                		 // } ?>
	                		<tr>
	                			<td align="center"><small><?=$no;?></small></td>
	                			<td align="center"><small>[S1]<br><?=$jurusan;?></small></td>
	                			<td align="center"><small>[<?=$id['nim']?>]<br><?=$mahasiswa->nama;?></small></td>
	                			<td align="justify"><small><?= mb_strtoupper($mahasiswa->judul_skripsi,'UTF-8');?></small></td>
                        <td align="center"><small><?php if ($id['penguji1']) {?>
                          [<?=$id['penguji1']?>]<br><?=$penguji1->nama;?>
                        <?php }else{
                          echo "-";
                          } ?></small></td>
                        <td align="center"><small><?php if ($id['penguji2']) {?>
                          [<?=$id['penguji2']?>]<br><?=$penguji2->nama;?>
                        <?php }else{
                          echo "-";
                          } ?></small></td>
                        <td align="center"><small><?php if ($id['pembimbing']) {?>
                          [<?=$id['pembimbing']?>]<br><?=$pembimbing->nama;?>
                        <?php }else{
                          echo "-";
                          } ?></small></td>
                        <td><small><?=indonesian_date(strtotime($tanggal->tgl_sidang),'d F  Y','')?></small></td>
                        <td><small><?=$id['waktu']?></small></td>
                        <td><small>R. <?=$id['ruang']?></small></td>
	                		</tr>
	                	<?php $no++;}
	                	}?>
	                </tbody>
	           	</table>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('layout/bot'); ?> 
</div>

<!-- Menu -->

<script>
  var dashboard = document.getElementById("home");
  


  var menu = document.getElementById("ujianskripsi");
  
  function clear_menu(){
    dashboard.className = "";
   

    menu.className = "";
  }

  clear_menu();

  menu.className = "active";

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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthMenu": [ 10, 25, 50, 100 ],
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#example2').DataTable({
      "language": {
        "search": "Cari:"
      },
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
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
