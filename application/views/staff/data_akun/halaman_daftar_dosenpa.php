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
<?php $this->load->view('staff/layout/top'); ?>	
<?php $this->load->view('staff/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Dosen PA
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Akun</a></li>
        <li class="active">Daftar Dosen Penasihat Akademik</li>
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
              <h3 class="box-title">Pendaftaran Dosen Pembimbing Akademik</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" action="<?php echo base_url('Staff/daftar_dosenpa/daftar'); ?>" method="POST">
              <div class="box-body">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label for="inputnama">Mahasiswa :</label>
                    <select name="mahasiswa" class="form-control" required="">
                      <option value="">-- Pilih Mahasiswa --</option>
                      <?php 
                      $mahasiswas=$this->Model->read('mahasiswa');
                      foreach ($mahasiswas as $mahasiswa) {
                        if ($this->Model->read_detail('nim',$mahasiswa['nim'],'dosenpa')) {
                          # code...
                        }else{
                          echo '<option value="'.$mahasiswa['nim'].'">['.$mahasiswa['nim'].'] '.$mahasiswa['nama'].'</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label for="inputnama">Dosen Pembimbing Akademik :</label>
                    <select name="dosenpa" class="form-control" required="">
                      <option value="">-- Pilih Dosen Pembimbing Akademik --</option>
                      <?php 
                      $dosens=$this->Model->read('dosen');
                      foreach ($dosens as $dosen) { ?>
                        <option value="<?=$dosen['noreg']?>">[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>;
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" align="center">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-warning" value="Reset">
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Daftar Akun SIPSO</h3>
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
                  <th>#</th>
                  <th>Mahasiswa</th>
                  <th>Dosen Pembimbing Akademik</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $dosenpas = $this->Model->list_dosenpa();
                $no1=1;
                foreach ($dosenpas as $dosenpa) { ?>
                <tr>
                  <td><?= $no1;?></td>
                  <td><?= '['.$dosenpa['nim'].'] '.$dosenpa['nama_mhs'];?></td>
                  <td><?= '['.$dosenpa['noreg'].'] '.$dosenpa['nama'];?></td>
                  <td align="center">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditModal<?=$dosenpa['id_dosenpa']?>">Edit</button>
                  </td>
                  <!-- Modal -->
                  <div class="modal fade" id="EditModal<?=$dosenpa['id_dosenpa']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header" style="background-color: #3c8dbc;color: white;">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit Data Dosen Pembimbing Akademik</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url('Staff/daftar_dosenpa/update'); ?>" method="POST">
                            <input type="hidden" name="id_dosenpa" value="<?=$dosenpa['id_dosenpa']?>">
                            <div class="form-grup">
                              <label for="inputnama">Mahasiswa :</label>
                              <select name="mahasiswa" class="form-control" required="">
                                <option value="">-- Pilih Mahasiswa --</option>
                                <?php 
                                echo '<option value="'.$dosenpa['nim'].'" selected="">['.$dosenpa['nim'].'] '.$dosenpa['nama_mhs'].'</option>';
                                ?>
                              </select>
                            </div>
                            <div class="form-grup">
                              <label for="inputnama">Dosen Pembimbing Akademik :</label>
                              <select name="dosenpa" class="form-control" required="">
                                <option value="">-- Pilih Dosen Pembimbing Akademik --</option>
                                <?php 
                                $dosens=$this->Model->read('dosen');
                                foreach ($dosens as $dosen) { ?>
                                  <option value="<?=$dosen['noreg']?>"<?php if($dosenpa['noreg']==$dosen['noreg']) echo 'selected="selected"';?>>[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>;
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-primary" value="Save changes">
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
                <?php
                $no1++; }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Mahasiswa</th>
                  <th>Dosen Pembimbing Akademik</th>
                  <th>Aksi</th>
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
    // var daftar_kaprodi = document.getElementById("daftar_kaprodi");
    function clear_menu(){
      dashboard.className = "";
      treedata.className = "treeview";
      daftar_akun.className = "";
      daftar_mhs.className = "";
      daftar_dsn.className = "";
      daftar_pa.className = "";
      // daftar_dospem.className = "";
      // daftar_kaprodi.className = "";
    }

    clear_menu();
    treedata.className = "treeview active";
    daftar_pa.className = "active";

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
