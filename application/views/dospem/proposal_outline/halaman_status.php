<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Status Outline</title>
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">

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
<?php $this->load->view('dospem/layout/top'); ?>	
<?php $this->load->view('dospem/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Status Outline
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Dospem/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Proposal Outline</a></li>
        <li class="active">Status Outline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php 
        if (!$this->Model->read('outline')) {?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Tidak Bisa Lihat Status Form!</h4>
            Belum ada data outline yang terinput!
          </div>
      <?php  }else{?>

      
        <!-- BOX Succes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Status </h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 180px; text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Data Pendaftaran</th>
                    <th style="width: 50px; text-align: center;">Prodi</th>
                    <th style="width: 120px; text-align: center;">Staff Prodi</th>
                    <!-- <th style="width: 120px; text-align: center;">Dosen PA</th> -->
                    <th style="width: 120px; text-align: center;">Kaprodi</th>
                  </tr>
                </thead>
                <?php $mahasiswas = $this->Model->dosenpa_where('noreg',$this->session->userdata('username'));
                if (empty($mahasiswas)) {
                }else{
                  $no1=1;
                  foreach ($mahasiswas as $mahasiswa) { ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= '['.$mahasiswa['nim'].']<br/>'.$mahasiswa['nama_mhs'];?></td>
                      <?php $form=$this->Model->read_detail('nim',$mahasiswa['nim'],'outline');?>
                      <td style="vertical-align: middle; text-align: center;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?=$mahasiswa['nim']?>"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Detail</button>
                        <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm_file<?=$mahasiswa['nim']?>"> <span class="fa fa-file-text-o"></span>&nbsp;&nbsp;File Persyaratan</button>
                      </td>
                        <!-- Large modal -->
                        <div class="modal fade bs-example-modal-lg<?=$mahasiswa['nim']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detail Pendaftaran Outline</h4>
                              </div>
                              <div class="modal-body col-md-12">
                                <!-- nama -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Nama Lengkap</label>
                                  <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?= $form->nama;?>">
                                </div>
                                <!--  nim -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Nim</label>
                                  <input readonly="" required="" class="form-control" name="nim" type="text" placeholder="Masukan Nim" value="<?= $form->nim;?>">
                                </div>
                                <!-- projurus -->
                                <div class="form-group col-md-6">
                                  <i class="fa fa-fw fa-graduation-cap"></i><label>&nbsp;&nbsp;Program Jurusan</label>
                                  <input readonly="" required="" class="form-control" name="projurus" type="text" placeholder="Masukan Nim" value="<?php if ($form->jurusan=='TI'){echo 'Teknik Informatika';}elseif ($form->jurusan=='SI'){echo 'Sistem Informasi';}elseif ($form->jurusan=='SK'){echo 'Sistem Komputer';}?>">
                                </div>
                                <!-- nohp -->
                                <div class="form-group col-md-6">
                                  <span class="fa fa-fw fa-mobile-phone"></span><label>&nbsp;&nbsp;Nomor Handphone</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                      </div>
                                      <input required=""  readonly="" type="text" class="form-control" name="nohp" data-inputmask='"mask": "9999-9999-9999"' data-mask value="<?= $form->nohp; ?>">
                                    </div>
                                </div>
                                <!-- tempat -->
                                <div class="form-group col-md-6">
                                  <span class="fa fa-building"></span><label>&nbsp;&nbsp;Tempat Lahir</label>
                                  <input required="" readonly="" class="form-control" name="tempat" type="text" placeholder="Masukan Tempat Lahir" value="<?= $form->tempat; ?>">
                                </div>
                                <!-- tanggallahir -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-calendar"></span><label>&nbsp;&nbsp;Tanggal Lahir</label>
                                  <input required="" readonly="" class="form-control" name="tanggallahir" id="datepicker1" type="text" placeholder="Masukan Tanggal Lahir" value="<?= $form->tgllahir; ?>">
                                </div>
                                <!-- alamat -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-home"></span><label>&nbsp;&nbsp;Alamat</label>
                                  <textarea required="" readonly="" class="form-control" name="alamat" type="text" rows="2" placeholder="Masukan Alamat"><?= $form->alamat; ?></textarea>
                                </div>
                                <!-- topik1 -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 1</label>
                                  <textarea required="" readonly="" class="form-control" name="topik1" rows="2" placeholder="Masukan Topik 1"><?= $form->topik1; ?></textarea>
                                </div>
                                <!-- topik2 -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 2</label>
                                  <textarea required="" readonly="" class="form-control" name="topik2" rows="2" type="text" placeholder="Masukan Topik 2"><?= $form->topik2; ?></textarea>
                                </div>
                                <!-- dospem -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-pawn"></span><label>&nbsp;&nbsp;Dosen Pembimbing</label>
                                  <?php 
                                    $dosen=$this->Model->read_detail('noreg',$form->dospem,'dosen');
                                  ?>
                                  <input required="" readonly="" class="form-control" name="dospem" type="text" placeholder="" value="<?= '['.$dosen->noreg.'] '.$dosen->nama; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                 <label>&nbsp;&nbsp;</label>
                                  <?php 
                                    $dosens=$this->Model->read_detail('noreg',$form->dospems,'dosen');
                                  ?>
                                  <input required="" readonly="" class="form-control" name="dospems" type="text" placeholder="" value="<?= '['.$dosens->noreg.'] '.$dosens->nama; ?>">
                                </div>
                                <!-- nmp -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Metode Penelitian</label>
                                  <input required="" readonly="" class="form-control" name="nmp" type="text" placeholder="" value="<?= $form->nmp; ?>">
                                </div>
                                <!-- ns -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Statistik</label>
                                  <input required="" readonly="" class="form-control" name="nmp" type="text" placeholder="" value="<?= $form->ns; ?>">
                                </div>
                                <!-- lmedpel -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Metode Penelitian</label>
                                  <input required="" readonly="" class="form-control" name="lmedpel" type="text" value="<?php if ($form->lmedpel=='1') {echo 'LULUS';}elseif ($form->lmedpel=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                                <!-- lstatis -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Statistik</label>
                                  <input required="" readonly="" class="form-control" name="lstatis" type="text" value="<?php if ($form->lstatis=='1') {echo 'LULUS';}elseif ($form->lstatis=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                                <!-- lkkp -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus KKP</label>
                                  <input required="" readonly="" class="form-control" name="lkkp" type="text" value="<?php if ($form->lkkp=='1') {echo 'LULUS';}elseif ($form->lkkp=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                                <!-- l128 -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus SKS</label>
                                  <input required="" readonly="" class="form-control" name="l128" type="text" value="<?php if ($form->l128=='1') {echo 'LULUS';}elseif ($form->l128=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                                <!-- konsen -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-book"></span><label>&nbsp;&nbsp;Konsentrasi</label>
                                  <input required="" readonly="" class="form-control" name="konsen" type="text" placeholder="Masukan Konsentrasi" value="<?= $form->konsen; ?>">
                                </div>
                                <!-- yajukan -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-ok-circle"></span><label>&nbsp;&nbsp;Yang Mengajukan</label>
                                  <input readonly="" required="" class="form-control" name="yajukan" type="text" placeholder=" Otomatis" value="<?=$form->nama;?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm_file<?=$mahasiswa['nim']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detail Dokumen Persyaratan</h4>
                                <?php $notfound=base_url('uploads/img/no.gif')?>
                              </div>
                              <div class="modal-body col-md-12">
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Foto Mahasiswa :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/outline/'.$form->ufmhs)?>" onerror="this.src='<?= $notfound; ?>'" height="320px">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Bimbingan Skripsi :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/outline/'.$form->usbs)?>" onerror="this.src='<?= $notfound; ?>'" height="400px" width="500px">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Pendaftaran Ulang :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/outline/'.$form->uspu)?>" onerror="this.src='<?= $notfound; ?>'" height="400px" width="500px">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;KST :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/outline/'.$form->ukst)?>" onerror="this.src='<?= $notfound; ?>'" height="400px" width="500px">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Transkrip Nilai :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/outline/'.$form->utn)?>" onerror="this.src='<?= $notfound; ?>'" height="400px" width="500px">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;KHS :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/outline/'.$form->ukhs)?>" onerror="this.src='<?= $notfound; ?>'" height="400px" width="500px">
                                </div>
                                <?php if (empty($form->upro1)) {?>
                                  <div class="form-group col-md-6">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/outline/topik/'.$form->upro1)?>" class="btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php }else{ ?>
                                  <div class="form-group col-md-6">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/outline/topik/'.$form->upro1)?>" class="btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php  } ?>

                                <?php if (empty($form->upro2)) {?>
                                  <div class="form-group col-md-6">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 2 :</label>
                                  <br/>
                                  <a href="<?=base_url('uploads/outline/topik/'.$form->upro2)?>" class="btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                </div>
                                <?php }else{ ?>
                                  <div class="form-group col-md-6">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 2 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/outline/topik/'.$form->upro2)?>" class="btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php  } ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      <td style="vertical-align: middle; text-align: center;">
                        <?= $mahasiswa['jurusan'] ?>
                      <td style="vertical-align: middle; text-align: center;">
                        <?php 
                        if (empty($form->accstaff)) {
                          echo '<a type="button" class="btn btn-primary disabled" href="'.base_url('Staff/validated/'.$form->nim).'"> Validate</a>';
                        }else{
                          echo '<a type="button" class="btn btn-success disabled" href=""> Validated</a>';
                        }
                        ?>
                      </td>
                      <!-- <td style="vertical-align: middle; text-align: center;">
                        <?php 
                        // if (empty($form->accdsnpa)) {?>
                          <a type="button" class="btn btn-primary" onclick="return confirm('Are you sure?');" href="<?php //=base_url('Dospem/approved/'.$form->nim)?>"> Approve</a>
                        <?php // }else{
                          // echo '<a type="button" class="btn btn-success disabled" href=""> Approved</a>';
                        //}
                        ?>
                      </td> -->
                      <td style="vertical-align: middle; text-align: center;">
                        <?php 
                        if (empty($form->acckaprodi)) {
                          echo '<a type="button" class="btn btn-primary disabled" data-toggle="modal" data-target=".bs-example-modal-sm_commend"> Approve</a>';
                         }elseif (!empty($form->acckaprodi)&&empty($form->revisi)) {
                            echo '<button type="button" class="btn btn-success disabled" data-toggle="modal" > Approved</button>';
                          }elseif (!empty($form->acckaprodi)&&!empty($form->revisi)) {
                             echo '<button type="button" class="btn btn-warning disabled" data-toggle="modal"> Revisi</button>';
                          }
                        ?>
                      </td>
                    </tr>
                <?php 
                  $no1++; 
                  }
                }
                ?>
                <tfoot>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 180px; text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Data Pendaftaran</th>
                    <th style="width: 50px; text-align: center;">Prodi</th>
                    <th style="width: 120px; text-align: center;">Staff Prodi</th>
                    <!-- <th style="width: 120px; text-align: center;">Dosen PA</th> -->
                    <th style="width: 120px; text-align: center;">Kaprodi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <?php }
      ?>
      
          <!-- /.box -->
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('dospem/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

<!-- Menu -->
<script>
  var dashboard = document.getElementById("dashboard");
  

  var treeoutline = document.getElementById("treeoutline");
  var status_outline = document.getElementById("status_outline");
  
  function clear_menu(){
    dashboard.className = "";
   
    treeoutline.className = "treeview";
    status_outline.className = "";
  }

  clear_menu();
  treeoutline.className = "treeview active";
  status_outline.className = "active";

</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
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


<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

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
