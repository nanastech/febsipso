<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSiSi | Dashboard</title>
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
<?php $this->load->view('kaprodi/layout/top'); ?>	
<?php $this->load->view('kaprodi/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal Sidang
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>kaprodi/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Input Jadwal</a></li>
        <li class="active">Jadwal Sidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Jadwal Sidang</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-condensed">
                <tr>
                  <th style="width: 10px">#</th>
                  <th >Peserta Sidang</th>
                  <th>Judul</th>
                  <th >Hari</th>
                  <th >Tanggal</th>
                  <th >Waktu</th>
                  <th>Ruang</th>
                  <th>Penguji I</th>
                  <th>Penguji II</th>
                  <th>Penguji III/Pembimbing</th>
                  <th>Aksi</th>
                </tr>
                <!-- data mahasiswa harus ada di database daftarsidang, baru bisa input jadwal sidang -->
                <?php $mahasiswas = $this->Model->read_where('program_studi',$this->session->userdata('prodi'),'daftar_sidang');
                if (empty($mahasiswas)) {
                  echo "Data Kosong";
                }else{
                $no1=1;
                foreach ($mahasiswas as $mahasiswa) { 
                  if (!empty($mahasiswa['accdospem']) && !empty($mahasiswa['acckaprodi'])  ) {
                    
                 
                  ?>
                <tr>
                  <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                  <?php $form=$this->Model->read_detail('nim',$mahasiswa['nim'],'daftar_sidang');
                    ?>
                  <td style="vertical-align: middle;width: 140px;text-align: center;">
                    <?= '['.$mahasiswa['nim'].']<br>'.$mahasiswa['nama'];?>
                  </td>
                  <td style="vertical-align: middle;">
                    <?= $mahasiswa['judul_skripsi']?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                  <?php 
                      $jadwal = $this->Model->read_detail('nim',$mahasiswa['nim'],'jadwal_sidang');
                      if (empty($jadwal)) {
                        echo "Kosong";
                      }else{
                       
                        if (date('l',strtotime($jadwal->tanggal_id))=='Sunday') {
                          $hari='Minggu';
                        }elseif (date('l',strtotime($jadwal->tanggal_id))=='Monday') {
                          $hari='Senin';
                        }elseif (date('l',strtotime($jadwal->tanggal_id))=='Tuesday') {
                          $hari='Selasa';
                        }elseif (date('l',strtotime($jadwal->tanggal_id))=='Wednesday') {
                          $hari='Rabu';
                        }elseif (date('l',strtotime($jadwal->tanggal_id))=='Thursday') {
                          $hari='Kamis';
                        }elseif (date('l',strtotime($jadwal->tanggal_id))=='Friday') {
                          $hari='Jumat';
                        }elseif (date('l',strtotime($jadwal->tanggal_id))=='Saturday') {
                          $hari='Sabtu';
                        }
                        echo $hari;
                      }
                  ?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?php 
                      if (empty($jadwal)) {
                        echo "Kosong";
                      }else{
                        echo $jadwal->tanggal_id;
                      }
                    ?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?php 
                      if (empty($jadwal)) {
                        echo "Kosong";
                      }else{
                        echo $jadwal->waktu;
                      }
                    ?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?php 
                      if (empty($jadwal)) {
                        echo "Kosong";
                      }else{
                        echo $jadwal->ruang;
                      }
                    ?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?= $jadwal->penguji1?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?= $jadwal->penguji2?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?= $jadwal->pembimbing?>
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                    <a type="button" class="btn btn-primary btn-sm" href="<?= base_url('Kaprodi/inputjadwal/'.base64_encode($mahasiswa['nim']));?>"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Input</a>
                  </td>
                    <!-- <div class="modal fade" id="exampleModal<?= $mahasiswa['nim']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Data Jadwal</h4>
                          </div>
                          <div class="modal-body">
                            <form method="POST" action="<?php echo base_url('dosen/update_kehadiran/Hadir/');?>">
                              <div class="form-group">
                                <label class="control-label">Nama Mahasiswa :</label>
                                <input readonly="readonly" name="nama" type="text" class="form-control" placeholder="<?= $mahasiswa['nama']?>" value="">
                              </div>
                              <div class="form-group">
                                <label class="control-label">NIM :</label>
                                <input name="nim" placeholder="<?= $mahasiswa['nim']?>" readonly="readonly" type="text" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="control-label">Judul :</label>
                                <textarea class="form-control" name="judul" id="message-text" placeholder="<?= $mahasiswa['judul_skripsi']?>"></textarea>
                              </div>
                              <div class="form-group">
                                <label class="control-label">Tanggal :</label>
                                <input type="time" class="form-control" name="tgl" id="tgl">
                              </div>
                              
                              <div class="form-group">
                                <label class="control-label">Hari :</label>
                                <input type="text" class="form-control" name="hari" id="hari">
                              </div>
                              <script type="text/javascript">
                                $('#tgl').keypress(function() {
                                  document.getElementById("hari").value = <?php echo "asas";?>;
                                });
                              </script>
                          </div>
                          <div class="modal-footer">
                            <button data-dismiss="modal">Close</button>
                            <input type="submit" value="Submit">
                          </div>
                           </form>   
                        </div>
                      </div>
                    </div> -->
                </tr>
                <?php 
                 }else{
                  echo "Kosong";
                }
                $no1++; 
                }
                }?>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('kaprodi/layout/bot'); ?>

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
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
