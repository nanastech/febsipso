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
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini" onload="setInterval('displayServerTime()', 1000);">
<?php 
  setlocale(LC_CTYPE, 'de_DE.UTF8');
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
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Mahasiswa Bimbingan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-md-12">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 20%; text-align: center;">Mahasiswa</th>
                    <th style="width: 35%; text-align: center;">Judul Skripsi</th>
                    <th style="width: 20%; text-align: center;">Dosen Pembimbing</th>
                    <th style="width: 10%; text-align: center;">Total</th>
                    <th style="width: 10%; text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $mahasiswas = $this->Model->read('dospem');
                  if (empty($mahasiswas)) {?>
                    
                  <?php
                  }else{


                  $no1=1;
                  foreach ($mahasiswas as $mahasiswa) { 
                    $mhs = $this->Model->read_detail('nim',$mahasiswa['nim'],'mahasiswa');
                    $outline=$this->Model->read_detail('nim',$mahasiswa['nim'],'outline');
                    if ($mhs->jurusan==$this->session->userdata('prodi') && !empty($mahasiswa['noreg'])) {
                    ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                      <td align="center" style="vertical-align: middle;"><?= '['.$mhs->nim.']<br>'.$mhs->nama;?></td>
                      <td align="justify"><?= mb_strtoupper($outline->topikfix,'UTF-8');?></td>
                      <td align="center" style="vertical-align: middle;"><?php $dospem= $this->Model->read_detail('noreg',$outline->dospemfix,'dosen'); echo '['.$dospem->noreg.']<br>'.$dospem->nama;?></td>
                      <td align="center" style="vertical-align: middle;"><?= $this->Model->bimbingan($mahasiswa['id'])?></td>
                      <td align="center" style="vertical-align: middle;"><a href="<?= base_url('kaprodi/detail_logbook/'.base64_encode($mahasiswa['nim']));?>" class="btn btn-primary btn-xs"><span class="fa fa-book"></span>&nbsp;&nbsp;Log Book</a></td>
                    </tr>
                  <?php
                  $no1++; 
                      }  
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Mahasiswa</th>
                  <th>Judul Skripsi</th>
                  <th>Dosen Pembimbing</th>
                  <th>Total</th>
                  <th>Aksi</th>
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

  <?php $this->load->view('layout/dashboard/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<?php $this->load->view('layout/dashboard/footer'); ?>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

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
