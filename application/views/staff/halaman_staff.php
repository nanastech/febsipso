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
        Dashboard
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>kaprodi/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang Subag LAA!</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <p>Lorem ipsum dolor sit amet, mea no errem verear. Quo et erant electram, usu cu debet cotidieque deterruisset. Modus oblique vim ad, liber tamquam duo ei. Ex sea tollit commodo recusabo.
		  </p>
		  <p>Et his vidit prompta, mea dico invidunt an. Aliquip reprehendunt mel te. Cu alienum philosophia quo, nobis tantas eum ea. Usu ubique mucius tractatos cu, modo alterum volumus cum ad. Timeam ponderum sea no. Mutat inciderint ut has.
		  </p>
		 
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

<?php $this->load->view('staff/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

<!-- Menu -->
<!-- script baru dimatikan tgl 19/04/23 -->
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
    cursorcolor: '#67b0d1'     // Scroll cursor color
  });
});
</script>
</body>
</html>
