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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px;">#</th>
                    <th style="width: 75px;">NIM</th>
                    <th style="width: 180px;">Nama</th>
                    <th style="width: 500px;">Judul Skripsi</th>
                    <th style="width: 10px;">Prodi</th>
                    <th style="width: 10px;">Total</th>
                    <th style="width: 100px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $mahasiswas = $this->Model->read_where('noreg',$this->session->userdata('username'),'dospem');
                  if (empty($mahasiswas)) {?>
                    
                  <?php
                  }else{


                  $no1=1;
                  foreach ($mahasiswas as $mahasiswa) { 
                    $mhs = $this->Model->read_detail('nim',$mahasiswa['nim'],'mahasiswa');
                    $outline=$this->Model->read_detail('nim',$mahasiswa['nim'],'outline');
                    $dospem=$this->Model->read_detail('nim',$mahasiswa['nim'],'dospem');
                    if ($this->Model->read_detail_dual('nim',$mahasiswa['nim'],'status','proses','judul_skripsi')) {?>
                      <tr>
                        <td><?= $no1;?></td>
                        <td><?= $mhs->nim;?></td>
                        <td><?= $mhs->nama;?></td>
                        <td><?=mb_convert_case($outline->topikfix, MB_CASE_UPPER, "UTF-8");?></td>
                        <td><?= $mhs->jurusan;?></td>
                        <td><?= $this->Model->bimbingan($mahasiswa['id'])?></td>
                        <td><a href="<?= base_url('Dospem/detail_logbook/'.base64_encode($mahasiswa['nim']));?>" class="btn btn-primary btn-xs"><span class="fa fa-book"></span>&nbsp;&nbsp;Log Book</a><?php if ($this->Model->read_where_dual('id_dospem',$dospem->id,'accdospem IS NULL',NULL,'log_book')) {
                          echo '&nbsp;<span class="label bg-yellow fa fa-exclamation-circle"> </span>';
                        } ?></td>
                      </tr>
                    <?php $no1++; }
                    
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Judul Skripsi</th>
                  <th>Prodi</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
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
