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
  <!-- Material datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
  <!--<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> 
  <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
  <!-- <script type="text/javascript" src="<?= base_url(); ?>assets/bootstrap-material-design/dist/js/bootstrap-material-design.min.js"></script> -->
  <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/js/bootstrap-material-datetimepicker.js"></script>
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
	 	
  function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
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
        <li><a href="<?php echo base_url(); ?>staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ganti Judul Skripsi</li>
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
          <div class="col-md-12">
            <legend><span class="fa fa-check-circle"></span> Status Permohonan Ganti Judul Skripsi</legend>
            <table id="example1"  class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 50px; text-align: center;">#</th>
                  <th style="width: 100px; text-align: center;">Mahasiswa</th>
                  <th style="width: 200px; text-align: center;">Judul Sebelumnya</th>
                  <th style="width: 200px; text-align: center;">Judul Baru</th>
                  <th style="width: 100px; text-align: center;">Keterangan</th>
                  <th style="width: 100px; text-align: center;">Kaprodi</th>
                  <th style="width: 100px; text-align: center;">Subag LAA</th>
                </tr>
              </thead>
              <tbody>
                <?php $ganti_judul=$this->Model->read('ganti_judul'); 
                $no=1;
                if ($ganti_judul) {
                  foreach ($ganti_judul as $id) { 
                    $Mahasiswa=$this->Model->read_detail('nim',$id['nim'],'mahasiswa');
                    ?>
                    <tr>
                      <td align="center" style="vertical-align: middle;"><?= $no;?></td>
                      <td style="width: 100px; vertical-align: middle; text-align: center;">[ <?= $id['nim']?> ]<br><?=$Mahasiswa->nama;?></td>
                      <td align="justify" style="vertical-align: middle;"><?= mb_strtoupper($id['judul_sebelum'],'UTF-8');?></td>
                      <td align="justify" style="vertical-align: middle;"><?= mb_strtoupper($id['judul_baru'],'UTF-8');?></td>
                      <td><?=$id['keterangan']?></td>
                      <td align="center" style="vertical-align: middle;">
                        <?php 
                        if (empty($id['acckaprodi'])) {
                          echo '<a type="button" class="btn btn-warning disabled" ><span class="fa fa-minus-square"></span></a>';
                        }else{
                          echo '<a type="button" class="btn btn-success disabled" ><span class="fa fa-check-square"></span></a>';
                        }
                        ?>
                      </td>
                      <td align="center" style="vertical-align: middle;">
                        <?php 
                        if (empty($id['accstaff'])) {
                          if (empty($id['acckaprodi'])) { ?>
                           <button class="btn btn-primary" onclick="alert('Kepala Program Studi Belum APPROVE')"> Approve</button>
                          <?php }else{
                          echo '<button data-toggle="modal" data-target=".bs-example-modal-sm_app'.$id['id'].'"  class="btn btn-primary"> Approve</button>';
                          }
                        }else{
                          echo '<a type="button" class="btn btn-success disabled" ><span class="fa fa-check-square"></span> Validated</a>';
                        }
                        ?>
                      </td>
                      <!-- Small modal -->
                      <div class="modal fade modal-warning bs-example-modal-sm_app<?=$id['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
                            </div>
                            <div class="modal-body">
                              <strong><h4>Ingin <strong>VALIDATE</strong> permohonan ganti judul skripsi mahasiswa [ <?= $id['nim']?> ] <?=$Mahasiswa->nama;?>?!</h4></strong>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                              <a type="button" class="btn btn-primary pull-left" href="<?php echo base_url('Staff/validasi_ganti_judul/'.$id['nim'].'/'.$id['id']); ?>">Validate</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>  
                  <?php $no++; 
                  } 
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="width: 50px; text-align: center;">#</th>
                  <th style="width: 100px; text-align: center;">Mahasiswa</th>
                  <th style="width: 200px; text-align: center;">Judul Sebelumnya</th>
                  <th style="width: 200px; text-align: center;">Judul Baru</th>
                  <th style="width: 100px; text-align: center;">Keterangan</th>
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
<?php $this->load->view('layout/dashboard/footer'); ?>
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
<!-- Menu -->
<script>
  var dashboard = document.getElementById("dashboard");
  var statussidangskripsi = document.getElementById("ganti_judul");

  function clear_menu(){
    dashboard.className = "";
    statussidangskripsi.className = "";
  }

  clear_menu();
  statussidangskripsi.className = "active";
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "searching": true,
     "lengthMenu": [ 10, 25, 50, 100 ],
      dom: 'Bfrtip',
      buttons: [
          {
              extend: 'excelHtml5',
              title: 'Data Export Ganti Judul',
              exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6 ]
              }
          },
          {
              extend: 'pdfHtml5',
              title: 'Data Export Ganti Judul',
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
