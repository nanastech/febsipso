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
<?php $this->load->view('staff/layout/top'); ?>	
<?php $this->load->view('staff/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Kaprodi
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>superadmin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Akun</a></li>
        <li class="active">Daftar Kaprodi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php echo $notification; ?>
      
      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kepala Program Studi</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
            
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <form action="<?= base_url('Superadmin/daftarkapro')?>" method="POST">
           username: <input type="text" name="username">
           password: <input type="text" name="password">
           nama: <input type="text" name="nama">
           <input type="submit" name="" value="OK">
          </form> -->
          
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Noreg</th>
              <th>Nama</th>
              <th>Program Studi</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php $kaprodis = $this->Model->read_where('role','kaprodi','users');
            $no1=1;
            if (empty($kaprodis)) {
              
            }else{
            foreach ($kaprodis as $kaprodi) { ?>
            <tr>
              <td><?= $no1;?></td>
              <td><?= $kaprodi['username'];?></td>
              <td><?= $kaprodi['name'];?></td>
              <td>
              <?php 
                if ($kaprodi['prodi']=='DAK') {
                  echo "D3 Akuntansi";
                }elseif ($kaprodi['prodi']=='DKP') {
                    echo "D3 Keuangan & Perbankan";
                }elseif ($kaprodi['prodi']=='SA') {
                    echo "S1 Akuntasi";
                }elseif ($kaprodi['prodi']=='SM') {
                    echo "S1 Manajemen";
                }elseif ($kaprodi['prodi']=='EKS') {
                    echo "S1 Ekonomi Syariah";
                }elseif ($kaprodi['prodi']=='UM') {
                    echo "UMUM";
                }
              ?>
              </td>
              <td>
              <?php 
                  if ($kaprodi['status']=='1') {
                    echo "Aktif";
                  }else{
                    echo "Non Aktif";
                  }
              ?>
              </td>
            </tr>
            <?php $no1++; }
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>Noreg</th>
              <th>Nama</th>
              <th>Program Studi</th>
              <th>Status</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
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
<?php $this->load->view('staff/layout/footer'); ?>

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
    var daftar_pa = document.getElementById("daftar_pa");
    // var daftar_dospem = document.getElementById("daftar_dospem");
    var daftar_kaprodi = document.getElementById("daftar_kaprodi");
    function clear_menu(){
      dashboard.className = "";
      treedata.className = "treeview";
      daftar_akun.className = "";
      daftar_mhs.className = "";
      daftar_dsn.className = "";
      daftar_pa.className = "";
      // daftar_dospem.className = "";
      daftar_kaprodi.className = "";
    }

    clear_menu();
    treedata.className = "treeview active";
    daftar_kaprodi.className = "active";

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
