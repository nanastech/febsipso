<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Penilaian Sidang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
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
	<script type="text/javascript">
		// Set the date we're counting down to
	function bataswaktu(id,waktu) {
		var countDownDate = new Date(waktu).getTime();
		var y;
		// Update the count down every 1 second
		var x = setInterval(function() {

		    // Get todays date and time
		    var now = new Date().getTime();
		    
		    // Find the distance between now an the count down date
		    var distance = countDownDate - now;
		    
		    // Time calculations for days, hours, minutes and seconds
		    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		    
		    // Output the result in an element with id="demo"
		   
		    
		    // If the count down is over, write some text 
		    if (distance < 0) {
		        clearInterval(x);
		        y = "Silahkan Masuk";
		       $('#tombolmasuk'+id).removeClass('hidden');
		       $('#tombolexpired'+id).addClass('hidden');
		    }else{
		    	y = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
		    	$('#tombolexpired'+id).removeClass('hidden');
		       	$('#tombolmasuk'+id).addClass('hidden');
		    }

		    document.getElementById("mundur"+id).innerHTML=y;
		}, 1000);
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
        Penilaian Sidang
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsi</a></li>
        <li class="active">Penilaian Sidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content ">
    <?php echo $notification; ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Mahasiswa Sidang</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            	<div class="col-md-12">
            		<table id="example1" class="table table-bordered table-striped ">
		                <thead>
		                  <tr>
		                    <th style="width: 10px;">#</th>
		                    <th style="text-align: center;">Tanggal Sidang</th>
		                    <th style="text-align: center;">Waktu Sidang</th>
		                    <th style="text-align: center;">Ruang Sidang</th>
		                    <th style="text-align: center;">Mahasiswa</th>
		                    <th style="text-align: center;">Judul Skripsi</th>
		                    <th style="text-align: center;">Jenjang</th>
		                    <th style="text-align: center;">Jurusan</th>
		                    <th style="text-align: center;">Aksi</th>
		                  </tr>
		                </thead>
		                <tbody>
		                  <?php $mahasiswas = $this->Model->read('jadwal_sidang');
		                  if (empty($mahasiswas)) {?>
		                    
		                  <?php
		                  }else{
			                  $no1=1;
			                  foreach ($mahasiswas as $mahasiswa) {
			                  	if ($this->Model->read_detail_dual('nim',$mahasiswa['nim'],'status','proses','judul_skripsi')) { ?>
		                  	 		<?php $mhs = $this->Model->read_detail('nim',$mahasiswa['nim'],'daftar_sidang');
					                    $tanggal=$this->Model->read_detail('id',$mahasiswa['tanggal_id'],'tanggal_sidang');
					                    $bataswaktu=strtotime($mahasiswa['waktu'])+(60*90);
					                    $today=date ("Y-m-d H:i:s"); 
										$tgl_selesai = strtotime($tanggal->tgl_sidang.$mahasiswa['waktu']); 
										$tgl_today = strtotime($today); 
					                    if ($this->session->userdata('username')==$mahasiswa['penguji1']||$this->session->userdata('username')==$mahasiswa['penguji2']||$this->session->userdata('username')==$mahasiswa['pembimbing']) { ?>
					                    	<tr>
												<td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
												<td style="vertical-align: middle; text-align: center;"><?= indonesian_date(strtotime($tanggal->tgl_sidang),'l, d F Y','');?></td>
												<td style="vertical-align: middle; text-align: center;"><?= date('H.i',strtotime($mahasiswa['waktu'])).' - '.date("H.i", $bataswaktu);?></td>
												<td style="vertical-align: middle; text-align: center;"><?= $mahasiswa['ruang'];?></td>
				                      			<td style="vertical-align: middle; text-align: center;"><?= '['.$mhs->nim.']<br/>'.$mhs->nama;?></td>
				                      			<td style="vertical-align: middle; text-align: justify;"><?=mb_convert_case($mhs->judul_skripsi, MB_CASE_UPPER, "UTF-8");?></td>
				                      			<td style="vertical-align: middle; text-align: center;"><?=$mhs->jenjang_pendidikan?></td>
				                     			<td style="vertical-align: middle; text-align: center;"><?=$mhs->program_studi?></td>

				                      			<td style="vertical-align: middle; text-align: center;">
				                      				<script type="text/javascript">
				                      					var batas = '<?=date('M d, Y H:i:s',$tgl_selesai)?>';
				                      					bataswaktu(<?=$mahasiswa['id']?>,batas);
				                      				</script>

				                      				<a id="tombolmasuk<?=$mahasiswa['id']?>" href="<?= base_url('Dospem/penilaian_sidang/'.base64_encode($mahasiswa['nim']));?>" class="btn btn-success btn-xs <?=($tgl_selesai <= $tgl_today ? '' : 'hidden')?>"><span class="fa  fa-file-text-o"></span>&nbsp;&nbsp;Penilaian Sidang</a>
				                      				<a id="tombolexpired<?=$mahasiswa['id']?>" href="" class="btn btn-warning btn-xs disabled <?=($tgl_selesai <= $tgl_today ? 'hidden' : '')?>"><span class="fa  fa-file-text-o"></span>&nbsp;&nbsp;Penilaian Sidang</a>

				                      				<small id="mundur<?=$mahasiswa['id']?>"></small>
				                      			</td>
				                    		</tr>
				                    		<?php $no1++; } //tutup if jika menguji?>
			                  	<?php } ?>
			                  <?php } //tutup loop
		                  }//tutup if jika ada
		                  ?>
		                </tbody>
		                <tfoot>
			                <tr>
			                  	<th style="width: 10px;">#</th>
				                <th style="text-align: center;">Tanggal Sidang</th>
				                <th style="text-align: center;">Waktu Sidang</th>
				                <th style="text-align: center;">Ruang Sidang</th>
				                <th style="text-align: center;">Mahasiswa</th>
				                <th style="text-align: center;">Judul Skripsi</th>
				                <th style="text-align: center;">Jenjang</th>
				                <th style="text-align: center;">Jurusan</th>
				                <th style="text-align: center;">Aksi</th>
			                </tr>
		                </tfoot>
		            </table>
            	</div>
            </div>
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
  

  var treeoutline = document.getElementById("treedaftar");
  var status_outline = document.getElementById("penilaian_sidang");
  
  function clear_menu(){
    dashboard.className = "";
   
    treeoutline.className = "treeview";
    status_outline.className = "";
  }

  clear_menu();
  treeoutline.className = "treeview active";
  status_outline.className = "active";
  

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
