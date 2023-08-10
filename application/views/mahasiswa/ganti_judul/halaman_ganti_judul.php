<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Ganti Judul Skripsi</title>
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<script type="text/javascript">
	    //set timezone
	    <?php date_default_timezone_set('Asia/Jakarta'); ?>
	    //buat object date berdasarkan waktu di server
	    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
	    //buat object date berdasarkan waktu di client
	    var clientTime = new Date();
	    //hitung selisih
	    var Diff = serverTime.getTime() - clientTime.getTime();    
	    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
	    function displayServerTime(){
	    //buat object date berdasarkan waktu di client
	    var clientTime = new Date();
	    //buat object date dengan menghitung selisih waktu client dan server
	    var time = new Date(clientTime.getTime() + Diff);
	    //ambil nilai jam
	    var sh = time.getHours().toString();
	    //ambil nilai menit
	    var sm = time.getMinutes().toString();
	    //ambil nilai detik
	    var ss = time.getSeconds().toString();
	    //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
	    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
	}
	</script>
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

<?php $this->load->view('mahasiswa/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

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
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- DATATABLES BUTTON -->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

  <!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
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
