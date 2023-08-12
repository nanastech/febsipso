</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-green fixed sidebar-mini" onload="setInterval('displayServerTime()', 1000);">
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
<?php $this->load->view('mahasiswa/layout/top'); ?>	
<?php $this->load->view('mahasiswa/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
      <?php $outline=$this->Model->read_detail('nim',$this->session->userdata('username'),'outline');
      $dsnpa=$this->Model->dosenpa_where_detail('nim',$this->session->userdata('username'));
      $dospem=$this->Model->dospem_where_detail('nim',$this->session->userdata('username'));
      $poutline=0;
        if (!empty($outline)) {
          $poutline=$poutline+20;
        }
        if (!empty($outline->accstaff)) {
          $poutline=$poutline+20;
        }
        if (!empty($outline->accdsnpa)) {
          $poutline=$poutline+30;
        }
        if (!empty($outline->acckaprodi)) {
          $poutline=$poutline+30;
        }
        if (!empty($outline->revisi)) {
          $poutline=$poutline-10;
        }
      ?>
      <!-- Default box -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="font-size: 43px;"><?= $poutline;?>%</h3>
              <p>Progress Outline</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-text"></i>
            </div>
            <a href="<?= base_url('Mahasiswa/status_outline/')?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <?php if (empty($dsnpa->noreg)) { ?>
              <h3 style="font-size: 20px;">Kosong</h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Kosong</h3>
            <?php }else{ ?>
              <h3 style="font-size: 20px;"><?= $dsnpa->noreg;?></h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;"><?= $dsnpa->nama_dsn;?></h3>
            <?php } ?>
              <p>Dosen PA</p>
            </div>
            <div class="icon">
              <i class="fa fa-black-tie"></i>
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
            <?php if (empty($dospem->noreg)) { ?>
              <h3 style="font-size: 20px;">Kosong</h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Kosong</h3>
            <?php }else{ ?>
              <h3 style="font-size: 20px;"><?= $dospem->noreg;?></h3>
              <h3 style="font-size: 15px;width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;"><?= $dospem->nama_dsn;?></h3>
            <?php } ?>
              <p>Dosen Pembimbing</p>
            </div>
            <div class="icon">
              <i class="fa fa-black-tie"></i>
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
              <h3 style="font-size: 43px;"><?php if (empty($dospem)) {
                echo 0;
              }else{
                echo $this->Model->bimbingan($dospem->id_dospem);
              }?></h3>
              <p>Total Bimbingan</p>
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
      <!-- /.box -->	

       <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-file-text"></span>&nbsp;&nbsp;Contoh Outline</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
          <div class="row">
              <div class="col-md-12" align="center">
                <h2>Contoh Outline</h2>
                <!-- Standard button -->
                <a type="button" class="btn3d btn btn-default btn-lg" href="<?=base_url('uploads/doc/outline2.docx')?>"><span class="glyphicon glyphicon-download-alt"></span> Download</a><br><br>
                <!-- <iframe src="http://docs.google.com/gview?url=<?=base_url('uploads/doc/')?>outline2.docx&embedded=true" style="width:600px; height:400px;max-width:100%; max-height:100%;" frameborder="0"></iframe> -->
                <br>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer"></div>
          <!-- /.box-footer-->
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('mahasiswa/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<?php $this->load->view('mahasiswa/layout/footer'); ?>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('html').niceScroll({
          // Do not hide scrollbar when mouse out
      cursorborderradius: '10px', // Scroll cursor radius
      background: '#E5E9E7',     // The scrollbar rail color
      cursorwidth: '10px',       // Scroll cursor width
      cursorcolor: '#00a65a'     // Scroll cursor color
    });
  });
</script>
</body>
</html>