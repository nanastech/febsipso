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
  <!-- Material datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
  <!-- <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> -->
  <!-- <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
  <!-- <script type="text/javascript" src="<?= base_url(); ?>assets/bootstrap-material-desaign/dist/js/bootstrap-material-desaign.min.js"></script> -->
  <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/js/bootstrap-material-datetimepicker.js"></script>
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
        Report Outline
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Proposal Outline</a></li>
        <li class="active">Report Outline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Report Outline</h3>
            </div>
            <div class="box-body">
              <div class="col-md-12">
                <legend><span class="fa fa-archive"></span>&nbsp;&nbsp;Download Report Outline</legend>
                <div class="col-md-12">
                  <form method="POST" action="<?php echo base_url('Staff/excel_report_outline/'); ?>" target="_blank">
                    <div class="form-group col-sm-3">
                      <label>Dari Tanggal :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input required="" class="form-control" name="awal" id="begin-date"  type="text" placeholder="Dari Tanggal" value="">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group col-sm-3">
                      <label>Sampai Tanggal :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input required="" class="form-control" name="akhir" id="end-date"  type="text" placeholder="Sampai Tanggal" value="">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group col-sm-2">
                      <label>Program Studi :</label>
                      <select class="form-control" name="prodi" required="">
                        <option value="">--Pilih--</option>
                        <option value="DAK">D3 Akuntansi</option>
                        <option value="DKP">D3 Keuangan & Perbankan</option>
                        <option value="SA">S1 Akuntasi</option>
                        <option value="SM">S1 Manajemen</option>
                        <option value="EKS">S1 Ekonomi Syariah</option>
                      </select>
                    </div>
                    <div class="form-group col-sm-2">
                      <label>Status :</label>
                      <select class="form-control" name="status" required="">
                        <option value="">--Pilih--</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                      </select>
                    </div>
                    <script type="text/javascript">
                      $('#begin-date').bootstrapMaterialDatePicker({ 
                          format : 'YYYY-MM-DD', 
                          clearButton: true,
                          time: false,

                        });
                      $('#end-date').bootstrapMaterialDatePicker({ 
                          format : 'YYYY-MM-DD', 
                          clearButton: true,
                          time: false,
                        });
                    </script>
                    <div class="form-group col-md-2">
                      <label>&nbsp;</label>
                      <button type="submit" class="btn btn-primary form-control">
                        <i class="fa fa-download"></i>&nbsp;&nbsp;Download
                      </button>
                    </div>
                  </form>
                </div>
              </div>
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
  var report_outline = document.getElementById("reportoutline");
  
  function clear_menu(){
    dashboard.className = "";
   
    treeoutline.className = "treeview";
    report_outline.className = "";
  }

  clear_menu();
  treeoutline.className = "treeview active";
  report_outline.className = "active";

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
