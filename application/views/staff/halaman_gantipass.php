
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
<?php $this->load->view('layout/dashboard/top'); ?>	
<?php $this->load->view('layout/dashboard/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ganti Password</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form method="POST" action="<?php echo base_url('Staff/ganti_password/');?>">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-group col-md-12">
                <label class="control-label">Nama :</label>
                <input readonly="readonly" name="nama" type="text" class="form-control" value="<?= $this->session->userdata('name');?>">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Username :</label>
                <input name="username" readonly="readonly" value="<?= $this->session->userdata('username');?>" type="text" class="form-control">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Password Lama :</label>
                <input name="passlama" value="" type="password" class="form-control">
                <?php echo form_error('passlama');?>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Password Baru :</label>
                <input name="passbaru" value="" type="password" class="form-control">
                <?php echo form_error('passbaru');?>
              </div>
            </div>
              
        </div>
        <!-- /.box-body -->
        <div class="box-footer" align="center">
          <input type="submit" class="btn btn-primary" value="Submit">
          <input type="reset" class="btn btn-warning" value="Reset">
          <a type="button" href="<?= base_url('Staff')?>" class="btn btn-default">Cancel</a>
        </div>
        </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('layout/dashboard/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<?php $this->load->view('layout/dashboard/footer'); ?>
<!-- Menu -->
  <!-- <script>
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

  </script> -->
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
