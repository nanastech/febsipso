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
  <script type="text/javascript">
    function edit(id){
      var v = document.getElementById('catatan'+id).readOnly;
      if (v==true) {
        document.getElementById('catatan'+id).readOnly=false;
      }else{
        document.getElementById('catatan'+id).readOnly=true;
      }
    }

  </script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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
        Status Pendaftaran
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Kaprodi/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsi</a></li>
        <li class="active">Jadwal Sidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">    
        <!-- BOX Succes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Jadwal Sidang </h3>
            </div>
            <div class="box-body table-responsive">
            <div class="col-md-12">
              <legend><span class="fa fa-archive"></span>&nbsp;&nbsp;Upload File Sidang</legend>
                  <div class="col-md-3"></div>
                  <div class="col-md-5">

                    <form method="POST" action="<?php echo base_url('Kaprodi/upload_sidang/'.$this->session->userdata('prodi')); ?>" enctype="multipart/form-data">
                    <div class="form-group col-md-10">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-fw fa-file-text-o"></i>
                      </div>
                      <input type="file" class="form-control" name="filesidang" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="">
                    </div>
                  </div>
                    <div class="form-group col-md-2" align="center">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-upload"></i>
                      </button>
                    </div>
                    </form>
                  </div>
                  <div class="col-md-4"></div>
                  <legend></legend>
                </div>
                <div class="col-md-12">
                <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <table id="tabelupload"  class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width: 100px; text-align: center;">#</th>
                          <th style="width: 300px; text-align: center;">File</th>
                          <th style="width: 140px; text-align: center;">From</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $datas=$this->Model->read_orderby('prodi',$this->session->userdata('prodi'),'file_sidang','tgl_upload','DESC'); 
                        if ($datas) {
                          foreach ($datas as $data) { ?>
                          <tr>
                            <td><?= indonesian_date(strtotime($data['tgl_upload']),'l, d F Y','');?><small><?= indonesian_date(strtotime($data['tgl_upload']),'H:i:s','');?></small></td>
                            <td><a target="_blank" href="<?=base_url('uploads/jadwal_sidang/'.$data['file'])?>"><i class="fa fa-fw  fa-download"></i>&nbsp;<?=$data['file']?></a></td>
                            <td align="center"><span class="fa fa-user"></span>&nbsp;<?= $data['dari']?> <i class="pull-right"><?php if ($data['dari']=='Kaprodi '.$this->session->userdata('prodi')) { ?>
                              <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm_hapus<?= $data['id']?>" ><span class="fa fa-close"></span></button>
                            <?php } ?></i></td>
                          </tr>
                          <div class="modal fade modal-warning bs-example-modal-sm_hapus<?= $data['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
                                      </div>
                                      <div class="modal-body" align="center">
                                        <strong><h4>Yakin ingin menghapus file?</h4></strong>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                                        <a type="button" class="btn btn-danger pull-left" href="<?php echo base_url('Kaprodi/hapus_file_sidang/'.$this->session->userdata('prodi').'/'.$data['id']); ?>"><span class="fa fa-close"></span>&nbsp;&nbsp;Hapus</a>
                                      </div>
                                    </div>
                                  </div>
                              </div>  
                        <?php } 
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="text-align: center;">#</th>
                          <th style="text-align: center;">File</th>
                          <th style="text-align: center;">From</th>
                        </tr>
                        </tfoot>
                    </table>
                  </div>
                  <div class="col-md-2"></div>
                  <legend></legend>
                </div>
            <div class="col-md-12">
              <legend><span class="fa fa-database"></span>&nbsp;&nbsp;Jadwal Sidang Skripsi</legend>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 180px; text-align: center;">Mahasiswa</th>
                    <th style="width: 200px; text-align: center;">Judul Skripsi</th>
                    <th style="width: 180px; text-align: center;">Tanggal & Waktu Sidang</th>
                    <th style="width: 120px; text-align: center;">Ruang</th>
                    <th style="width: 120px; text-align: center;">Penguji I</th>
                    <th style="width: 120px; text-align: center;">Penguji II</th>
                    <th style="width: 120px; text-align: center;">Pembimbing</th>
                  </tr>
                </thead>
                <?php $mahasiswas = $this->Model->read_where_dual('acckaprodi is NOT NULL',NULL,'program_studi',$this->session->userdata('prodi'),'daftar_sidang');
                if ($mahasiswas) {
                  $no1=1;
                    foreach ($mahasiswas as $mahasiswa) { 
                    $jadwal=$this->Model->read_detail('nim',$mahasiswa['nim'],'jadwal_sidang');
                    if ($jadwal) { ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?=$no1?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= '['.$mahasiswa['nim'].']<br/>'.$mahasiswa['nama'];?></td>
                      <td align="justify"><?= mb_strtoupper($mahasiswa['judul_skripsi'],'UTF-8');?></td>
                  
                      <td style="vertical-align: middle; text-align: center;"><?php $tanggal=$this->Model->read_detail('id',$jadwal->tanggal_id,'tanggal_sidang');$bataswaktu=strtotime($jadwal->waktu)+(60*90);?><?= indonesian_date(strtotime($tanggal->tgl_sidang),'l, d F Y','').'<br>'.$jadwal->waktu.' - '.date("H:i:s", $bataswaktu);?></td>
                      <td style="vertical-align: middle; text-align: center;"><?=$jadwal->ruang?></td>
                      <td style="vertical-align: middle; text-align: center;"><?php if (!$jadwal->penguji1) {
                        echo "-";
                      }else{$dos1=$this->Model->read_detail('noreg',$jadwal->penguji1,'dosen'); echo $jadwal->penguji1.'<br>'.$dos1->nama;} ?></td>
                      <td style="vertical-align: middle; text-align: center;"><?php if (!$jadwal->penguji2) {
                        echo "-";
                      }else{$dos2=$this->Model->read_detail('noreg',$jadwal->penguji2,'dosen'); echo $jadwal->penguji2.'<br>'.$dos2->nama;} ?></td>
                      <td style="vertical-align: middle; text-align: center;"><?php if (!$jadwal->pembimbing) {
                        echo "-";
                      }else{$dospem=$this->Model->read_detail('noreg',$jadwal->pembimbing,'dosen'); echo $jadwal->pembimbing.'<br>'.$dospem->nama;} ?></td>
                    </tr>
                    <?php 
                    $no1++; 
                    }
                  } 
                  }
                ?>
                <tfoot>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 180px; text-align: center;">Mahasiswa</th>
                    <th style="width: 300px; text-align: center;">Judul Skripsi</th>
                    <th style="width: 180px; text-align: center;">Tanggal & Waktu Sidang</th>
                    <th style="width: 120px; text-align: center;">Ruang</th>
                    <th style="width: 120px; text-align: center;">Penguji I</th>
                    <th style="width: 120px; text-align: center;">Penguji II</th>
                    <th style="width: 120px; text-align: center;">Pembimbing</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
     
      
          <!-- /.box -->
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
<!-- Menu -->
<script>
  var dashboard = document.getElementById("dashboard");
  

  var treeoutline = document.getElementById("treedaftar");
  var status_outline = document.getElementById("jadwal_sidang");
  
  function clear_menu(){
    dashboard.className = "";
   
    treeoutline.className = "treeview";
    status_outline.className = "";
  }

  clear_menu();
  treeoutline.className = "treeview active";
  status_outline.className = "active";

</script>

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
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
  <script>
    $(function () {
    $("#example1").DataTable({
      "lengthMenu": [ 10, 25, 50, 100 ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Data Export Penguji Sidang',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
                }
            },
            {
                extend: 'pdfHtml5',
                title: 'Data Export Penguji Sidang',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
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
      "aaSorting": []
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
        cursorcolor: '#67b0d1'     // Scroll cursor color
      });
    });
  </script>
</body>
</html>
