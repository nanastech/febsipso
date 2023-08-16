  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
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
<?php $this->load->view('layout/dashboard/top'); ?>	
<?php $this->load->view('layout/dashboard/menu'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ganti Judul Skripsi
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a class="active">Ganti Judul Skripsi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Permohonan Ganti Judul Skripsi</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <?php 
          $cek=$this->Model->cek_ganti_judul($this->session->userdata('username'));
          $cek_daftar_sidang=$this->Model->read_detail('nim',$this->session->userdata('username'),'daftar_sidang');
          if ($cek && empty($cek->accstaff)) { //jika ada dan belum di acckaprodi dan sudah daftar
            echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
            Tidak bisa mengajukan permohonan ganti judul skripsi, karena permohonan ganti judul skripsi sebelumnya belum divalidasi Subag LAA. Mohon menghubungi Subag LAA.</div>';
          }elseif ($cek && !empty($cek->accstaff) && empty($cek_daftar_sidang)) { ?> <!-- jika ada dan sudah di acckaprodi dan belum daftar sidang -->
            <div class="col-md-12">
              <?php $outline=$this->Model->read_detail('nim',$this->session->userdata('username'),'outline'); ?>
              <form action="<?php echo base_url('Mahasiswa/proses_ganti_judul/'.$this->session->userdata('username')); ?>" method="POST">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="form-group col-md-12">
                  <label class="control-label">Judul Skripsi Sebelumnya :</label>
                  <textarea class="form-control" readonly="" name="judul_sebelum" required=""><?=$outline->topikfix?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Judul Skripsi Baru<font color="red">*</font> :</label>
                  <textarea class="form-control" name="judul_baru" required=""></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Keterangan Ganti Judul :</label>
                  <textarea class="form-control" name="keterangan"></textarea>
                </div>
                <div class="form-group col-md-12" align="center">
                <legend></legend>
                  <input type="submit" class="btn btn-primary" value="Submit">
                  <input type="reset" class="btn btn-warning" value="Reset">
                  <a class="btn btn-default" href="<?= base_url('Mahasiswa/')?>">Cancel</a>
                </div>
                </form>
              </div>
              <div class="col-md-3"></div>
            </div>
          <?php }elseif (!$cek && empty($cek_daftar_sidang)) { ?> <!-- Jika ga ada dan belum daftar sidang -->
            <div class="col-md-12">
              <?php $outline=$this->Model->read_detail('nim',$this->session->userdata('username'),'outline'); ?>
              <form action="<?php echo base_url('Mahasiswa/proses_ganti_judul/'.$this->session->userdata('username')); ?>" method="POST">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="form-group col-md-12">
                  <label class="control-label">Judul Skripsi Sebelumnya :</label>
                  <textarea class="form-control" readonly="" name="judul_sebelum" required=""><?=$outline->topikfix?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Judul Skripsi Baru<font color="red">*</font> :</label>
                  <textarea class="form-control" name="judul_baru" required=""></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Keterangan Ganti Judul :</label>
                  <textarea class="form-control" name="keterangan"></textarea>
                </div>
                <div class="form-group col-md-12" align="center">
                <legend></legend>
                  <input type="submit" class="btn btn-primary" value="Submit">
                  <input type="reset" class="btn btn-warning" value="Reset">
                  <a class="btn btn-default" href="<?= base_url('Mahasiswa/')?>">Cancel</a>
                </div>
                </form>
              </div>
              <div class="col-md-3"></div>
            </div>
          <?php }else{
            echo '<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
            Tidak bisa mengajukan permohonan ganti judul skripsi, karena sudah mengajukan sidang skripsi!</div>';
            } ?>
          
          <div class="col-md-12">
            <legend>Status Permohonan Ganti Judul Skripsi</legend>
            <table id="example1"  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 50px; text-align: center;">#</th>
                  <th style="width: 200px; text-align: center;">Judul Sebelumnya</th>
                  <th style="width: 200px; text-align: center;">Judul Baru</th>
                  
                  <th style="width: 100px; text-align: center;">Pembimbing</th>
                  <th style="width: 100px; text-align: center;">Kaprodi</th>
                  <th style="width: 100px; text-align: center;">Subag LAA</th>
                </tr>
              </thead>
              <tbody>
                <?php $ganti_judul=$this->Model->read_where('nim',$this->session->userdata('username'),'ganti_judul'); 
                $no=1;
                if ($ganti_judul) {
                  foreach ($ganti_judul as $id) { ?>
                    <tr>
                      <td align="center" style="vertical-align: middle;"><?= $no;?></td>
                      <td align="justify" style="vertical-align: middle;"><?= mb_strtoupper($id['judul_sebelum'],'UTF-8');?></td>
                      <td align="justify" style="vertical-align: middle;"><?= mb_strtoupper($id['judul_baru'],'UTF-8');?></td>
                      
                      <td align="center" style="vertical-align: middle;">
                        <?php 
                        if (empty($id['accdospem'])) {
                          echo '<a type="button" class="btn btn-primary disabled" > Approve</a>';
                        }else{
                          echo '<a type="button" class="btn btn-success disabled" ><span class="fa fa-check-square"></span> Approved</a>';
                        }
                        ?>
                      </td>
                      <td align="center" style="vertical-align: middle;">
                        <?php 
                        if (empty($id['acckaprodi'])) {
                          echo '<a type="button" class="btn btn-primary disabled" > Approve</a>';
                        }else{
                          echo '<a type="button" class="btn btn-success disabled" ><span class="fa fa-check-square"></span> Approved</a>';
                        }
                        ?>
                      </td>
                      <td align="center" style="vertical-align: middle;">
                        <?php 
                        if (empty($id['accstaff'])) { ?>
                          <a type="button" class="btn btn-primary disabled"> Validate</a>
                          &nbsp;<a onclick="return confirm('Menghapus permohonan ganti judul, apakah anda yakin?');" href="<?= base_url('Mahasiswa/hapus_permohonan_ganti_judul/'.$id['id'])?>" type="button" class="btn btn-danger" ><span class="fa fa-remove"></span></a>
                        <?php }else{
                          echo '<a type="button" class="btn btn-success disabled" ><span class="fa fa-check-square"></span> Validated</a>';
                        }
                        ?>
                      </td>
                    </tr>  
                  <?php $no++; 
                  } 
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="width: 50px; text-align: center;">#</th>
                  <th style="width: 200px; text-align: center;">Judul Sebelumnya</th>
                  <th style="width: 200px; text-align: center;">Judul Baru</th>
                  <th style="width: 100px; text-align: center;">Pembimbing</th>
                  <th style="width: 100px; text-align: center;">Kaprodi</th>
                  <th style="width: 100px; text-align: center;">Subag LAA</th>
                  
                </tr>
              </tfoot>
            </table>
                
          </div>
              
        </div>
        <!-- /.box-body -->
       
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
<?php $this->load->view('mahasiswa/layout/footer');?>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- DATATABLES BUTTON -->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
<!-- Menu -->
  <script>
    var dashboard = document.getElementById("dashboard");
    var formulir = document.getElementById("ganti_judul");
    
    function clear_menu(){
      dashboard.className = "";
      formulir.className = "";
    }

    clear_menu();
    formulir.className = "active";

  </script>
  <script>
    $(function () {
    $("#example1").DataTable({
      "searching": false,
      "lengthMenu": [ 10, 25, 50, 100 ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Data Ganti Judul',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Data Ganti Judul',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
              extend: 'colvis',
              text: 'Sembunyikan Kolom'
            }
        ]
      });
      $("#tabelupload").DataTable({
      "lengthMenu": [ 5, 10, 25, 50, 100 ],
      "order": [[ 0, "desc" ]]
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
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
        cursorcolor: '#00a65a'     // Scroll cursor color
      });
    });
  </script>
</body>
</html>
