  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
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
        <li><a href="<?php echo base_url(); ?>dospem/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>

      <!-- Default box -->
      <div class="row">

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">

            <div class="inner">
              <h3 style="font-size: 43px;"> 0 <span class="fa fa-child"></span></h3>
              <p>Outline</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 style="font-size: 43px;"><?= $this->Model->widget_dosenpa_mahasiswa($this->session->userdata('username'))?> <span class="fa fa-child"></span></h3>
              <p>Mahasiswa PA</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
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
              <h3 style="font-size: 43px;"><?= $this->Model->widget_dospem_mahasiswa($this->session->userdata('username'))?> <span class="fa fa-child"></span></h3>
              <p style="width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Mahasiswa Bimbingan Skripsi</p>
            </div>
            <div class="icon">
              <i class="fa fa-chain"></i>
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
              <h3 style="font-size: 43px;"><?=$this->Model->dospem_verify_daftarsidang($this->session->userdata('username'))?></h3>
              <p style="width: inherit; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">Validasi Sidang Skripsi</p>
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

      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Mahasiswa PA</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Jurusan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $mahasiswapas = $this->Model->list_mahasiswapa($this->session->userdata('username'));
                  $no1=1;
                  if (empty($mahasiswapas)) {
                    # code...
                  }else{
                  foreach ($mahasiswapas as $mahasiswapa) { ?>
                  <tr>
                    <td align="center"><?= $no1;?></td>
                    <td align="center"><?= '['.$mahasiswapa['nim'].']<br/>'.$mahasiswapa['nama_mhs']?></td>
                    <td align="center">
                    <?php if ($mahasiswapa['jurusan']=='DAK') {
                            echo 'D3 Akuntansi';
                          }elseif ($mahasiswapa['jurusan']=='DKP') {
                            echo 'D3 Keuangan & Perbankan';
                          }elseif ($mahasiswapa['jurusan']=='SA') {
                            echo 'S1 Akuntasi';
                          }elseif ($mahasiswapa['jurusan']=='SM') {
                            echo 'S1 Manajemen';
                          }elseif ($mahasiswapa['jurusan']=='EKS') {
                            echo 'S1 Ekonomi Syariah';
                          }?>
                    </td>
                  </tr>
                  <?php
                  $no1++; }
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Mahasiswa</th>
                    <th>Jurusan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-warning" style="border-top-color: #3d9970;">
            <div class="box-header with-border">
              <h3 class="box-title">Mahasiswa Bimbingan Skripsi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="text-align: center;">#</th>
                    <th style="text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Jurusan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $mahasiswasks = $this->Model->list_mahasiswaskripsi($this->session->userdata('username'));
                  $no1=1;
                  if (empty($mahasiswasks)) {
                    # code...
                  }else{
                  foreach ($mahasiswasks as $mahasiswask) { 
                    if ($this->Model->read_detail_dual('nim',$mahasiswask['nim'],'status','proses','judul_skripsi')) {?>
                      <tr>
                        <td align="center"><?= $no1;?></td>
                        <td align="center"><?= '['.$mahasiswask['nim'].']<br/>'.$mahasiswask['nama_mhs']?></td>
                        <td align="center">
                        <?php if ($mahasiswask['jurusan']=='DAK') {
                            echo 'D3 Akuntansi';
                          }elseif ($mahasiswask['jurusan']=='DKP') {
                            echo 'D3 Keuangan & Perbankan';
                          }elseif ($mahasiswask['jurusan']=='SA') {
                            echo 'S1 Akuntasi';
                          }elseif ($mahasiswask['jurusan']=='SM') {
                            echo 'S1 Manajemen';
                          }elseif ($mahasiswask['jurusan']=='EKS') {
                            echo 'S1 Ekonomi Syariah';
                          }?>
                        </td>
                      </tr>
                    <?php   $no1++;}
                     }
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Mahasiswa</th>
                    <th>Jurusan</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Selamat Datang Dosen Pembimbing!</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
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


<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- Menu -->
  <script>
    var dashboard = document.getElementById("dashboard");
    function clear_menu(){
      dashboard.className = "";
    
    }
    clear_menu();
    dashboard.className = "active";
  </script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "lengthMenu": [ 5, 10, 25, 50, 100 ]
      });
      $("#example2").DataTable({
        "lengthMenu": [ 5, 10, 25, 50, 100 ]
      });
      $('#example3').DataTable({
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
