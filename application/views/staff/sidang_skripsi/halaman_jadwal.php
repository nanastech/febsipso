<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPSO | Jadwal Sidang</title>
      <link rel="icon" href="<?=base_url()?>/uploads/img/fti.ico" type="image/ico">
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



    <!-- chosen.js -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/chosen.js/chosen.css" />


    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
    <!--<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
  	--><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script type="text/javascript" src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <style type="text/css">
      legend{
          border-bottom: 1px solid #e5e5e5;
      }
    </style>

    <script>
      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

      ga('create', 'UA-60343429-1', 'auto');
      ga('send', 'pageview');
    </script>
  </head>
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
<?php $this->load->view('staff/layout/top'); ?> 
<?php $this->load->view('staff/layout/menu'); ?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal Sidang
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsis</a></li>
        <li class="active">Jadwal Sidang</li>
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
              <h3 class="box-title">Informasi Jadwal Sidang Skripsi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">

              <div class="col-md-12">
                <legend><span class="fa fa-plus"></span>&nbsp;&nbsp;Tambah Jadwal Sidang</legend>
                <div class="col-md-3"></div>
                <div class="col-md-5">

                  <form method="POST" action="<?php echo base_url('Staff/tambah_tanggal/'); ?>">
                  <div class="form-group col-md-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input required="" class="form-control" name="tanggal" id="min-date"  type="text" placeholder="yyyy-mm-dd" value="">
                      <script type="text/javascript">
                        $('#min-date').bootstrapMaterialDatePicker({ 
                            format : 'YYYY-MM-DD', 
                            minDate : new Date(),
                            clearButton: true,
                            time: false,
                          });
                      </script>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group col-md-2" align="center">
                    <button type="submit" class="btn btn-primary">
                      <i class="fa fa-plus"></i>
                    </button>
                  </div>
                  </form>
                </div>
                <div class="col-md-4"></div>
                <legend></legend>
              </div>
              <div class="col-md-12">
                 
                <?php 
                  $tanggal_sidangs=$this->Model->list_tanggal_sidang('tanggal_sidang','tgl_sidang','DESC');
                  if (!empty($tanggal_sidangs)) {
                    foreach ($tanggal_sidangs as $tanggal_sidang) {?>
                    <div class="box box-default">
                      <div class="box-header with-border">
                        <i class="fa fa-calendar"></i><label>&nbsp;&nbsp;<?= indonesian_date(strtotime($tanggal_sidang['tgl_sidang']),'l, d F Y','');?>&nbsp;&nbsp;|&nbsp;&nbsp;<button data-toggle="modal" data-target=".bs-example-modal-sm_edit<?=$tanggal_sidang['id']?>" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span></button>&nbsp;&nbsp;<button data-toggle="modal" data-target=".bs-example-modal-sm_hapus<?=$tanggal_sidang['id']?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></button> </label>

                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm_edit<?=$tanggal_sidang['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ganti Tanggal Sidang</h4>
                              </div>
                              <div class="modal-body col-md-12">
                              <div class="col-md-3"></div>
                              <div class="col-md-6">
                                <form method="POST" action="<?php echo base_url('Staff/update_tanggal/'.$tanggal_sidang['id']); ?>">
                                <div class="form-group col-md-12">
                                  <label for="input">Tanggal Selumnya:</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required="" class="form-control" readonly="" name="sebelumnya" type="text" placeholder="yyyy-mm-dd" value="<?=$tanggal_sidang['tgl_sidang']?>">
                                  </div>
                                  <!-- /.input group -->
                                </div>
                                <div class="form-group col-md-12">
                                  <label for="input">Tanggal Sesudah:</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required="" class="form-control" name="tanggalbaru" id="min-date<?=$tanggal_sidang['id']?>"  type="text" placeholder="yyyy-mm-dd" value="">
                                    <script type="text/javascript">
                                      $('#min-date<?=$tanggal_sidang['id']?>').bootstrapMaterialDatePicker({ 
                                          format : 'YYYY-MM-DD', 
                                          minDate : new Date(),
                                          clearButton: true,
                                          time: false,
                                        });
                                    </script>
                                  </div>
                                  <!-- /.input group -->
                                </div>
                              </div>
                              <div class="col-md-3"></div>
                              </div>
                              <div class="modal-footer" align="center">
                                <input type="submit" class="btn btn-primary" name="">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <div class="modal fade modal-warning bs-example-modal-sm_hapus<?=$tanggal_sidang['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
                              </div>
                              <div class="modal-body">
                                <strong><h4>Semua data jadwal mahasiswa sidang yang bersangkutan pada <?= indonesian_date(strtotime($tanggal_sidang['tgl_sidang']),'l, d F Y','');?> akan terhapus!!!</h4></strong>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                                <a type="button" class="btn btn-danger pull-left" href="<?php echo base_url('Staff/hapus_tanggal/'.$tanggal_sidang['id']); ?>"><span class="fa fa-trash"></span>&nbsp;&nbsp;Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="box-tools pull-right">
                          <button class="btn btn-success btn-xs dropdown-toggle" type="button" data-toggle="dropdown"><span class="fa fa-file-excel-o"></span>&nbsp;&nbsp;<strong>Export</strong>&nbsp;
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('Staff/excel_daftar_sidang/TI/'.$tanggal_sidang['id']); ?>">Teknik Informatika</a></li>
                            <li><a href="<?php echo base_url('Staff/excel_daftar_sidang/SI/'.$tanggal_sidang['id']); ?>">Sistem Informasi</a></li>
                            <li><a href="<?php echo base_url('Staff/excel_daftar_sidang/SK/'.$tanggal_sidang['id']); ?>">Sistem Komputer</a></li>
                          </ul>
                         
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                        </div>
                        <!-- /.box-tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body table-responsive">
                      
                        <table id="tabel<?=$tanggal_sidang['id']?>" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th style="width: 10px;">#</th>
                              <th style="width: 140px; text-align: center;">Mahasiswa</th>
                              <th style="text-align: center;">Prodi</th>
                              <th style="width: 300px; text-align: center;">Judul Skripsi</th>
                              <th style="width: 140px; text-align: center;">Waktu</th>
                              <th style="width: 10px; text-align: center;">Ruang</th>
                              <th style="text-align: center;">Penguji I</th>
                              <th style="text-align: center;">Penguji II</th>
                              <th style="text-align: center;">Pembimbing</th>
                              <th style="width: 100px; text-align: center;"><button data-toggle="modal" data-target=".bs-example-modal-sm_addmhs<?=$tanggal_sidang['id']?>" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span>&nbsp;&nbsp;Mahasiswa (<?=$this->Model->belum_ada_dijadwal()?>)</button></th>
                              <!-- Small modal -->
                              <div class="modal fade bs-example-modal-sm_addmhs<?=$tanggal_sidang['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Tambah Mahasiswa | <?=indonesian_date(strtotime($tanggal_sidang['tgl_sidang']),'l, d F Y','');?></h4>
                                    </div>
                                    <div class="modal-body col-md-12">
                                      <div class="col-md-2"></div>
                                      <div class="col-md-8">
                                        <form method="POST" action="<?php echo base_url('Staff/tambah_mahasiswa_jadwal/'.$tanggal_sidang['id']); ?>">
                                        <?php $datapendaftars=$this->Model->read_where('acckaprodi is NOT NULL',NULL,'daftar_sidang'); ?>
                                        <div class="form-group col-md-12">
                                          <label for="input">Calon Peserta Sidang:</label>
                                          <select class="form-control" name="mahasiswa" required="">
                                            <option value="">--Pilih--</option>
                                            <?php 
                                              foreach ($datapendaftars as $pendaftar) {
                                                if (!$this->Model->read_detail('nim',$pendaftar['nim'],'jadwal_sidang')) {?>
                                                <option value="<?=$pendaftar['nim']?>"><?='['.$pendaftar['nim'].'] '.$pendaftar['nama']?></option>
                                            <?php }
                                            }
                                            ?>
                                          </select>
                                          <!-- /.input group -->
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="input">Waktu :</label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                              <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input required="" class="form-control" id="time<?=$tanggal_sidang['id']?>" name="waktu" type="text" placeholder="H:i:s">
                                            <script type="text/javascript">
                                              $('#time<?=$tanggal_sidang['id']?>').bootstrapMaterialDatePicker({
                                                date: false,
                                                shortTime: false,
                                                format: 'HH:mm:00'
                                              });
                                            </script>
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="input">Ruang :</label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                              <i class="fa fa-building"></i>
                                            </div>
                                            <input type="text" class="form-control" name="ruang" required="" placeholder="Masukan Ruang" pattern="[0-9]{4}">
                                          </div>
                                          <!-- /.input group -->
                                        </div>
                                        <?php $dosens=$this->Model->read_orderby1('dosen','nama','ASC'); ?>
                                        <div class="form-group col-md-12">
                                          <label for="input">Dosen Penguji I :</label>
                                          <select class="form-control" name="penguji1" required="">
                                            <option value="">--Pilih--</option>
                                            <?php 
                                              foreach ($dosens as $dosen) {?>
                                                <option value="<?=$dosen['noreg']?>"><?='['.$dosen['noreg'].'] '.$dosen['nama']?></option>
                                            <?php 
                                            }
                                            ?>
                                          </select>
                                          <!-- /.input group -->
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="input">Dosen Penguji II :</label>
                                          <select class="form-control" name="penguji2" required="">
                                            <option value="">--Pilih--</option>
                                            <?php 
                                              foreach ($dosens as $dosen) {?>
                                                <option value="<?=$dosen['noreg']?>"><?='['.$dosen['noreg'].'] '.$dosen['nama']?></option>
                                            <?php 
                                            }
                                            ?>
                                          </select>
                                          <!-- /.input group -->
                                        </div>
                                      </div>
                                      <div class="col-md-2"></div>
                                    </div>
                                    <div class="modal-footer" align="center">
                                      <input type="submit" class="btn btn-primary" name="">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $mahasiswas = $this->Model->read_where('tanggal_id',$tanggal_sidang['id'],'jadwal_sidang');
                            if (!empty($mahasiswas)) {
                              $no=1;
                              foreach ($mahasiswas as $mahasiswa) {
                                $mhs=$this->Model->read_detail('nim',$mahasiswa['nim'],'daftar_sidang');
                                $bataswaktu=strtotime($mahasiswa['waktu'])+(60*90);
                                ?>
                                <tr>
                                  <td style="vertical-align: middle; text-align: center;"><?= $no;?></td>
                                  <td align="center" style="vertical-align: middle;"><?= '['.$mhs->nim.']<br>'.$mhs->nama;?></td>
                                  <td align="center" style="vertical-align: middle;"><?=$mhs->program_studi;?></td>
                                  <td align="justify"><?= mb_strtoupper($mhs->judul_skripsi,'UTF-8');?></td>
                                  <td align="center" style="vertical-align: middle;"><?= date('H.i',strtotime($mahasiswa['waktu'])).' - '.date("H.i", $bataswaktu);?></td>
                                  <td align="center" style="vertical-align: middle;"><?= $mahasiswa['ruang']?></td>
                                  <td align="center" style="vertical-align: middle;"><?php if ($mahasiswa['penguji1']) {
                                    $dos1=$this->Model->read_detail('noreg',$mahasiswa['penguji1'],'dosen'); echo $dos1->nama;
                                  }else{
                                    echo "-";
                                    };?></td>
                                  <td align="center" style="vertical-align: middle;"><?php if ($mahasiswa['penguji2']) {
                                    $dos2=$this->Model->read_detail('noreg',$mahasiswa['penguji2'],'dosen'); echo $dos2->nama;
                                  }else{
                                    echo "-";
                                    } ;?></td>
                                  <td align="center" style="vertical-align: middle;"><?php if ($mahasiswa['pembimbing']) {
                                    $dos3=$this->Model->read_detail('noreg',$mahasiswa['pembimbing'],'dosen'); echo $dos3->nama;
                                  }else{
                                    echo "-";
                                    };?></td>
                                  <td align="center" style="vertical-align: middle;"><button data-toggle="modal" data-target=".bs-example-modal-sm_editmhs<?=$mahasiswa['nim']?>" class="btn btn-primary btn-xs"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Edit Jadwal</button>&nbsp;&nbsp;<button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm_hapus_mhs<?=$mahasiswa['nim']?>" ><span class="fa fa-close"></span></button></td>
                                  <!-- Small modal -->
                                  <div class="modal fade bs-example-modal-sm_editmhs<?=$mahasiswa['nim']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h4 class="modal-title" id="myModalLabel">Edit Jadwal Sidang Mahasiswa | <?= '['.$mhs->nim.'] '.$mhs->nama;?></h4>
                                        </div>
                                        <div class="modal-body col-md-12">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                          <form method="POST" action="<?php echo base_url('Staff/update_jadwal_mhs/'.$mahasiswa['nim']); ?>">
                                          <?php $tanggalsidanglists=$this->Model->read('tanggal_sidang'); ?>
                                          <div class="form-group col-md-12">
                                            <label for="input">Tanggal Sidang Sidang:</label>
                                            <select class="form-control" name="tanggal_sidang" required="">
                                              <option value="">--Pilih--</option>
                                              <?php 
                                                foreach ($tanggalsidanglists as $tanggalsidanglist) {?>
                                                  <option value="<?=$tanggalsidanglist['id']?>" <?php if ($tanggal_sidang['id']==$tanggalsidanglist['id']) { echo "selected=''";}?>><?=indonesian_date(strtotime($tanggalsidanglist['tgl_sidang']),'l, d F Y','')?></option>
                                              <?php 
                                              }
                                              ?>
                                            </select>
                                            <!-- /.input group -->
                                          </div>
                                          <div class="form-group col-md-12">
                                            <label for="input">Waktu :</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                              </div>
                                              <input required="" class="form-control" id="timeedit<?=$mahasiswa['nim']?>" name="waktu" type="text" placeholder="H:i:s" value="<?=$mahasiswa['waktu']?>">
                                              <script type="text/javascript">
                                                $('#timeedit<?=$mahasiswa['nim']?>').bootstrapMaterialDatePicker({
                                                  date: false,
                                                  shortTime: false,
                                                  format: 'HH:mm:00'
                                                });
                                              </script>
                                            </div>
                                            <!-- /.input group -->
                                          </div>
                                          <div class="form-group col-md-12">
                                            <label for="input">Ruang :</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-building"></i>
                                              </div>
                                              <input type="text" class="form-control" name="ruang" required="" placeholder="Masukan Ruang" pattern="[0-9]{4}" value="<?=$mahasiswa['ruang']?>">
                                            </div>
                                            <!-- /.input group -->
                                          </div>
                                          <?php $dosens=$this->Model->read_orderby1('dosen','nama','ASC'); ?>
                                          <div class="form-group col-md-12">
                                            <label for="input">Dosen Penguji I :</label>
                                            <select class="form-control" name="penguji1" required="">
                                              <option value="">--Pilih--</option>
                                              <?php 
                                                foreach ($dosens as $dosen) {?>
                                                  <option value="<?=$dosen['noreg']?>" <?php if ($mahasiswa['penguji1']==$dosen['noreg']) { echo "selected=''";}?>><?='['.$dosen['noreg'].'] '.$dosen['nama']?></option>
                                              <?php 
                                              }
                                              ?>
                                            </select>
                                            <!-- /.input group -->
                                          </div>
                                          <div class="form-group col-md-12">
                                            <label for="input">Dosen Penguji II :</label>
                                            <select class="form-control" name="penguji2" required="">
                                              <option value="">--Pilih--</option>
                                              <?php 
                                                foreach ($dosens as $dosen) {?>
                                                  <option value="<?=$dosen['noreg']?>" <?php if ($mahasiswa['penguji2']==$dosen['noreg']) { echo "selected=''";}?>><?='['.$dosen['noreg'].'] '.$dosen['nama']?></option>
                                              <?php 
                                              }
                                              ?>
                                            </select>
                                            <!-- /.input group -->
                                          </div>

                                        </div>
                                        <div class="col-md-2"></div>
                                        </div>
                                        <div class="modal-footer" align="center">
                                          <input type="submit" class="btn btn-primary" name="" value="Update">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal fade modal-warning bs-example-modal-sm_hapus_mhs<?=$mahasiswa['nim']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
                                        </div>
                                        <div class="modal-body">
                                          <strong><h4>Data jadwal sidang mahasiswa <?= '['.$mhs->nim.'] '.$mhs->nama;?> akan terhapus!!</h4></strong>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                                          <a type="button" class="btn btn-danger pull-left" href="<?php echo base_url('Staff/hapus_jadwal_mhs/'.$mahasiswa['nim']); ?>"><span class="fa fa-close"></span>&nbsp;&nbsp;Hapus</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </tr> 
                            <?php
                            $no++;
                                  }
                              }
                            ?>
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>#</th>
                            <th>Mahasiswa</th>
                            <th>Prodi</th>
                            <th>Judul Skripsi</th>
                            <th>Waktu</th>
                            <th>Ruang</th>
                            <th>Penguji I</th>
                            <th>Penguji II</th>
                            <th>Pembimbing</th>
                            <th>Aksi</th>
                          </tr>
                          </tfoot>
                        </table>
                        <script type="text/javascript">
                        $(function () {
                          $("#tabel<?=$tanggal_sidang['id']?>").DataTable({
                              "columns": [
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                { "orderable": false }
                              ]
                            });
                        });
                      </script>
                      </div>
                      <!-- /.box-body -->
                    </div>
                      
                  <?php  }
                  }else{
                    echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-close"></i> Data Jadwal Masih Kosong!</h4>
                    Silahkan input tanggal sidang terlebih dahulu!.</div>';
                  }
                ?>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('staff/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<!-- chosen.js -->
<script src="<?php echo base_url(); ?>assets/plugins/chosen.js/chosen.jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/chosen.js/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>assets/plugins/chosen.js/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

    <script>
      var dashboard = document.getElementById("dashboard");
      var treejadwal = document.getElementById("treejadwal");
      var jadwal = document.getElementById("jadwal");
      
      
      function clear_menu(){
        dashboard.className = "";
        treejadwal.className = "treeview";
        jadwal.className = "";
      
      }

      clear_menu();
      treejadwal.className = "treeview active";
      jadwal.className = "active";

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
    <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();

      //Datemask dd/mm/yyyy
      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      //Datemask2 mm/dd/yyyy
      $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
      //Money Euro
      $("[data-mask]").inputmask();

      //Date range picker
      $('#reservation').daterangepicker();
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
      //Date range as a button
      $('#daterange-btn').daterangepicker(
          {
            ranges: {
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          }
      );

      //Date picker1
      $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

      //Date picker2
      $('#datepicker2').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });


      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });

      //Colorpicker
      $(".my-colorpicker1").colorpicker();
      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //Timepicker
      $(".timepicker").timepicker({
        showInputs: false
      });
    });
  </script>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $('#date').bootstrapMaterialDatePicker
      ({
        time: false,
        clearButton: true
      });

      $('#time').bootstrapMaterialDatePicker
      ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
      });

      $('#date-format').bootstrapMaterialDatePicker
      ({
        format: 'dddd DD MMMM YYYY - HH:mm'
      });
      $('#date-fr').bootstrapMaterialDatePicker
      ({
        format: 'DD/MM/YYYY HH:mm',
        lang: 'fr',
        weekStart: 1, 
        cancelText : 'ANNULER',
        nowButton : true,
        switchOnClick : true
      });

      $('#date-end').bootstrapMaterialDatePicker
      ({
        weekStart: 0, format: 'DD/MM/YYYY HH:mm'
      });
      $('#date-start').bootstrapMaterialDatePicker
      ({
        weekStart: 0, format: 'DD/MM/YYYY HH:mm', shortTime : true
      }).on('change', function(e, date)
      {
        $('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
      });

      $('#min-date').bootstrapMaterialDatePicker({ 
        format : 'YYYY-MM-DD', 
        minDate : new Date(),
        clearButton: true,
        time: false,
      });

      // for (var i = '<?=$this->Model->jumlah_tanggal_sidang();?>'; i >= 0; i--) {
      //   $('#min-date'+i).bootstrapMaterialDatePicker({ 
      //   format : 'YYYY-MM-DD', 
      //   minDate : new Date(),
      //   clearButton: true,
      //   time: false,
      // });
      // }

      $.material.init()
    });
    </script>
  </body>
</html>
