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
 <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
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

  <script type="text/javascript">
    function edit() {
      document.getElementById('tempat').removeAttribute('readonly');
      document.getElementById('datepicker1').removeAttribute('readonly');
      document.getElementById('alamat').removeAttribute('readonly');
      document.getElementById('tlpr').removeAttribute('readonly');
      
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
        Log Outline
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Proposal Outline</a></li>
        <li class="active">Log Outline</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Log Outline</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body table-responsive">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped ">
                      <thead>
                      <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Data Outline</th>
                        <th style="text-align: center;">Subag LAA</th>
                        <th style="text-align: center;">Dosen PA</th>
                        <th style="text-align: center;">Kaprodi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $log_outlines = $this->Model->read_where('nim',$this->session->userdata('username'),'log_outline');
                      $no1=1;
                      if (empty($log_outlines)) {
                        # code...
                      }else{
                      foreach ($log_outlines as $log_outline) { ?>
                      <tr>
                        <td align="center"><?= $no1;?></td>
                        <td align="center"><?= date_format(date_create($log_outline['tgl_daftar']),'d F Y H:i:s') ?></td>
                        <td align="center">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?=$log_outline['id']?>"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Detail</button>
                          <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm_file<?=$log_outline['id']?>"> <span class="fa fa-file-text-o"></span>&nbsp;&nbsp;File Persyaratan</button>
                        </td>
                        <!-- Large modal -->
                        <div class="modal fade bs-example-modal-lg<?=$log_outline['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detail Pendaftaran Outline</h4>
                              </div>
                              <div class="modal-body col-md-12">
                                <!-- nama -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Nama Lengkap</label>
                                  <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?= $log_outline['nama']; ?>">
                                </div>
                                <!--  nim -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Nim</label>
                                  <input readonly="" required="" class="form-control" name="nim" type="text" placeholder="Masukan Nim" value="<?= $log_outline['nim']; ?>">
                                </div>
                                <!-- projurus -->
                                <div class="form-group col-md-6">
                                  <i class="fa fa-fw fa-graduation-cap"></i><label>&nbsp;&nbsp;Program Jurusan</label>
                                  <input readonly="" required="" class="form-control" name="projurus" type="text" placeholder="Masukan Nim" value="<?php 
                                  if ($log_outline['jurusan']=='TI'){
                                      echo 'S1 Teknik Informatika';
                                    }elseif ($log_outline['jurusan']=='SK') {
                                      echo 'S1 Sistem Komputer';
                                    }elseif ($log_outline['jurusan']=='SI') {
                                      echo 'S1 Sistem Informasi';
                                    }elseif ($log_outline['jurusan']=='ADB') {
                                      echo 'S1 Analitika Data Bisnis';
                                    }elseif ($log_outline['jurusan']=='MAKSI') {
                                      echo 'S2 Magister Akuntansi';
                                    }elseif ($log_outline['jurusan']=='MM') {
                                      echo 'S2 Magister Manajemen';
                                    }elseif ($log_outline['jurusan']=='PPAK') {
                                      echo 'Pendidikan Profesi Akuntansi';
                                    }elseif ($log_outline['jurusan']=='DAK') {
                                      echo 'D3 Akuntansi';
                                    }elseif ($log_outline['jurusan']=='DKP') {
                                      echo 'D3 Keuangan & Perbankan';
                                    }elseif ($log_outline['jurusan']=='AK') {
                                      echo 'S1 Akuntasi';
                                    }elseif ($log_outline['jurusan']=='M') {
                                      echo 'S1 Manajemen';
                                    }elseif ($log_outline['jurusan']=='ES') {
                                      echo 'S1 Ekonomi Syariah';
                                    }?>">
                                </div>
                                <!-- tempat -->
                                <div class="form-group col-md-6">
                                  <span class="fa fa-building"></span><label>&nbsp;&nbsp;Tempat Lahir</label>
                                  <input required="" readonly="" id="tempat" class="form-control" name="tempat" type="text" placeholder="Masukan Tempat Lahir" value="<?= $log_outline['tempat']; ?>">
                                </div>
                                <!-- tanggallahir -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-calendar"></span><label>&nbsp;&nbsp;Tanggal Lahir</label>
                                  <input required="" readonly="" class="form-control" name="tanggallahir" id="datepicker1" type="text" placeholder="yyyy-mm-dd" value="<?= $log_outline['tgllahir']; ?>">
                                </div>
                                <!-- alamat -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-home"></span><label>&nbsp;&nbsp;Alamat</label>
                                  <textarea required="" readonly="" class="form-control" name="alamat" id="alamat" type="text" rows="2" placeholder="Masukan Alamat"><?= $log_outline['alamat']; ?></textarea>
                                </div>
                                <!-- tlpr -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-phone-alt"></span><label>&nbsp;&nbsp;Nomor Telepon Rumah</label>
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-phone"></i>
                                    </div>
                                    <input required=""  readonly="" id="tlpr"  type="text" class="form-control" name="tlpr" data-inputmask='"mask": "(999) 999-999-9"' data-mask value="<?= $log_outline['tlpr']; ?>">
                                  </div>
                                </div>
                                <!-- nohp -->
                                <div class="form-group col-md-6">
                                  <span class="fa fa-fw fa-mobile-phone"></span><label>&nbsp;&nbsp;Nomor Handphone</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-earphone"></i>
                                      </div>
                                      <input required=""  readonly="" type="text" id="nohp" class="form-control" name="nohp" data-inputmask='"mask": "9999-9999-9999"' data-mask value="<?= $log_outline['nohp']; ?>">
                                    </div>
                                </div>
                                <!-- nmp -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Metode Penelitian</label>
                                  <input required="" readonly="" class="form-control" name="nmp" type="text" placeholder="" value="<?= $log_outline['nmp']; ?>">
                                </div>
                                <!-- ns -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Statistik</label>
                                  <input required="" readonly="" class="form-control" name="ns" type="text" placeholder="" value="<?= $log_outline['ns']; ?>">
                                </div>
                                <!-- topik1 -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 1</label>
                                  <textarea required="" readonly="" class="form-control" name="topik1" rows="2" placeholder="Masukan Topik 1"><?= $log_outline['topik1']; ?></textarea>
                                </div>
                                <!-- topik2 -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 2</label>
                                  <textarea required="" readonly="" class="form-control" name="topik2" rows="2" type="text" placeholder="Masukan Topik 2"><?= $log_outline['topik2']; ?></textarea>
                                </div>
                                <!-- dospem -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-pawn"></span><label>&nbsp;&nbsp;Dosen Pembimbing</label>
                                  <?php 
                                    $dosens=$this->Model->read_detail('noreg',$log_outline['dospem'],'dosen');
                                  ?>
                                  <input required="" readonly="" class="form-control" name="dospem" type="text" placeholder="" value="<?= '['.$dosens->noreg.'] '.$dosens->nama; ?>">
                                  
                                </div>
                                <!-- yajukan -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-ok-circle"></span><label>&nbsp;&nbsp;Yang Mengajukan</label>
                                  <input readonly="" required="" class="form-control" name="yajukan" type="text" placeholder=" Otomatis" value="<?=$log_outline['nama'];?>">
                                </div>
                                <!-- konsen -->
                                <div class="form-group col-md-12">
                                  <span class="glyphicon glyphicon-book"></span><label>&nbsp;&nbsp;Konsentrasi</label>
                                  <input required="" readonly="" class="form-control" name="konsen" type="text" placeholder="Masukan Konsentrasi" value="<?= $log_outline['konsen']; ?>">
                                </div>
                                <!-- lmedpel -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Metode Penelitian</label>
                                  <input required="" readonly="" class="form-control" name="lmedpel" type="text" value="<?php if ($log_outline['lmedpel']=='1') {echo 'LULUS';}elseif ($log_outline['lmedpel']=='0'){echo 'TIDAK LULUS';} ?>">
                                  
                                </div>
                                <!-- lstatis -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Statistik</label>
                                  <input required="" readonly="" class="form-control" name="lstatis" type="text" value="<?php if ($log_outline['lstatis']=='1') {echo 'LULUS';}elseif ($log_outline['lstatis']=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                                <!-- lkkp -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus KKP</label>
                                  <input required="" readonly="" class="form-control" name="lkkp" type="text" value="<?php if ($log_outline['lkkp']=='1') {echo 'LULUS';}elseif ($log_outline['lkkp']=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                                <!-- l128 -->
                                <div class="form-group col-md-6">
                                  <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus 128 SKS</label>
                                  <input required="" readonly="" class="form-control" name="l128" type="text" value="<?php if ($log_outline['l128']=='1') {echo 'LULUS';}elseif ($log_outline['l128']=='0'){echo 'TIDAK LULUS';} ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm_file<?=$log_outline['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                                  <img src="<?=base_url('uploads/'.$log_outline['ufmhs'])?>" onerror="this.src='<?= $notfound; ?>'" height="320px">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Bimbingan Skripsi :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/'.$log_outline['usbs'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Pendaftaran Ulang :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/'.$log_outline['uspu'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;KST :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/'.$log_outline['ukst'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Transkrip Nilai :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/'.$log_outline['utn'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;KHS :</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/'.$log_outline['ukhs'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                                <?php if (empty($log_outline['upro1'])) {?>
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/'.$log_outline['upro1'])?>" class="btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php }else{ ?>
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/'.$log_outline['upro1'])?>" class="btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php  } ?>

                                <?php if (empty($log_outline['upro2'])) {?>
                                  <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 2 :</label>
                                  <br/>
                                  <a href="<?=base_url('uploads/'.$log_outline['upro2'])?>" class="btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                </div>
                                <?php }else{ ?>
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 2 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/'.$log_outline['upro2'])?>" class="btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php  } ?>


                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <td align="center">
                          <?php 
                            if (empty($log_outline['accstaff'])) {
                              echo '<a type="button" class="btn btn-primary disabled"> Validate</a>';
                            }else{
                              echo '<a type="button" class="btn btn-success disabled"> Validated</a>';
                            }
                          ?>
                        </td>
                        <td align="center">
                          <?php 
                            if (empty($log_outline['accdsnpa'])) {
                              echo '<a type="button" class="btn btn-primary disabled" > Approve</a>';
                            }else{
                              echo '<a type="button" class="btn btn-success disabled" > Approved</a>';
                            }
                            ?>
                        </td>
                        <td align="center">
                          <?php 
                              if (!empty($log_outline['acckaprodi'])&&empty($log_outline['revisi'])) { 
                                if ($log_outline['status_outline']=='Ditolak') {
                                   echo '<button type="button" class="btn btn-danger disabled" data-toggle="modal" > Ditolak</button>';
                                }else{
                                    echo '<button type="button" class="btn btn-success disabled" data-toggle="modal" > Diterima</button>';
                                }?>
                          <?php }elseif (!empty($log_outline['acckaprodi'])&&!empty($log_outline['revisi'])) {
                                 echo '<button type="button" class="btn btn-warning disabled" data-toggle="modal"> Revisi</button>';
                              }
                            ?>
                        </td>
                      </tr>
                      <?php
                      $no1++; }
                      }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Data Outline</th>
                        <th style="text-align: center;">Subag LAA</th>
                        <th style="text-align: center;">Dosen PA</th>
                        <th style="text-align: center;">Kaprodi</th>
                      </tr>
                      </tfoot>
                    </table>
                </div>
              </div>
              <!-- /.box-body -->

          </div>
          <!-- /.box -->
      
          <!-- /.box -->
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
  var treedaftar = document.getElementById("treedaftar");
  var formulir = document.getElementById("formulir");
  var statusform = document.getElementById("statusform");

  var treeoutline = document.getElementById("treeoutline");
  var daftar_outline = document.getElementById("daftar_outline");
  var status_outline = document.getElementById("status_outline");
  
  function clear_menu(){
    dashboard.className = "";
    treedaftar.className = "treeview";
    formulir.className = "";
    statusform.className = "";

    treeoutline.className = "treeview";
    daftar_outline.className = "";
    status_outline.className = "";
  }

  clear_menu();
  treeoutline.className = "treeview active";
  log_outline.className = "active";

</script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
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
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

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
</body>
</html>
