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
        Daftar Dosen
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>superadmin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Akun</a></li>
        <li class="active">Daftar Dosen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <!-- Default box -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pendaftaran Akun Dosen</h3>
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
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $dosens = $this->Model->read('dosen');
                  $no1=1;
                  foreach ($dosens as $dosen) { ?>
                  <tr>
                    <td><?= $no1;?></td>
                    <td><?= $dosen['noreg'];?></td>
                    <td><?= $dosen['nama'];?></td>
                    <td><?= $dosen['prodi'];?></td>
                    <td>
                      <?php  
                      if ($this->Model->read_where('username',$dosen['noreg'],'users')) { ?>
                        <a  class="btn btn-success btn-xs disabled">Terdaftar</a>
                      <?php }else{ ?>
                        <a href="<?= base_url('Staff/daftarkan_dsn/'.$dosen['noreg'])?>" class="btn btn-primary btn-xs">Daftarkan</a>
                      <?php }
                      ?>
                      
                    </td>
                  </tr>
                  <?php
                  $no1++; }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
    

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
    var treedata = document.getElementById("treedata");
    var daftar_akun = document.getElementById("daftar_akun");
    var daftar_mhs = document.getElementById("daftar_mhs");
    var daftar_dsn = document.getElementById("daftar_dsn");
    // var daftar_pa = document.getElementById("daftar_pa");
    // var daftar_dospem = document.getElementById("daftar_dospem");
    // var daftar_kaprodi = document.getElementById("daftar_kaprodi");
    function clear_menu(){
      dashboard.className = "";
      treedata.className = "treeview";
      daftar_akun.className = "";
      daftar_mhs.className = "";
      daftar_dsn.className = "";
      // daftar_pa.className = "";
      // daftar_dospem.className = "";
      // daftar_kaprodi.className = "";
    }

    clear_menu();
    treedata.className = "treeview active";
    daftar_dsn.className = "active";

  </script>

  <script>
    $(function () {
      $("#example1").DataTable();
      $("#example2").DataTable();
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
