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
	 	
?>
<!-- Site wrapper -->
<div class="wrapper">
<!--======================================================================================-->
<?php $this->load->view('kaprodi/layout/top'); ?>	
<?php $this->load->view('kaprodi/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Status Outline
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Kaprodi/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
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
                    <th style="width: 150px; text-align: center;">Mahasiswa</th>
                    <th style="text-align: center; width: 95px;">Data Pendaftaran</th>
                    <th style="width: 155px; text-align: center;">Tanggal Mengajukan Outline</th>
                    <th style="width: 80px; text-align: center;">Subag LAA</th>
                    <!-- <th style="width: 80px; text-align: center;">Dosen PA</th> -->
                    <th style="width: 80px; text-align: center;">Kaprodi</th>
                    <th style="width: 100px; text-align: center;">Dosen Pembimbing</th>
                  </tr>
                </thead>
                <?php $mahasiswas = $this->Model->read_orderby('jurusan',$this->session->userdata('prodi'),'outline','tgl_daftar','DESC');
                if (empty($mahasiswas)) {
                  echo "Data Kosong";
                }else{
                  $no1=1;
                  foreach ($mahasiswas as $mahasiswa) { ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= '['.$mahasiswa['nim'].']<br/>'.$mahasiswa['nama'];?></td>
                      <?php $form=$this->Model->read_detail('nim',$mahasiswa['nim'],'outline');?>
                      <td style="vertical-align: middle; text-align: center;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?= $form->nim;?>"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Detail</button>
                        <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm_file<?= $form->nim;?>"> <span class="fa fa-file-text-o"></span>&nbsp;&nbsp;File Persyaratan</button>
                      </td>
                        <!-- Large modal -->
                        <div class="modal fade bs-example-modal-lg<?= $form->nim;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
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
                                  <input readonly="" required="" class="form-control" name="projurus" type="text" placeholder="Masukan Nim" value="<?php 
                                    if ($form->jurusan=='DAK') {
                                      echo 'D3 Akuntansi';
                                    }elseif ($form->jurusan=='DKP') {
                                      echo 'D3 Keuangan & Perbankan';
                                    }elseif ($form->jurusan=='SA') {
                                      echo 'S1 Akuntasi';
                                    }elseif ($form->jurusan=='SM') {
                                      echo 'S1 Manajemen';
                                    }elseif ($form->jurusan=='EKS') {
                                      echo 'S1 Ekonomi Syariah';
                                    }?>">
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
                                <!-- dospem -->
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
                        <div class="modal fade bs-example-modal-sm_file<?= $form->nim;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
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
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/outline/topik/'.$form->upro1)?>" class="btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php }else{ ?>
                                  <div class="form-group col-md-12">
                                    <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                                    <br/>
                                    <a href="<?=base_url('uploads/outline/topik/'.$form->upro1)?>" class="btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                  </div>
                                <?php  } ?>

                                <?php if (empty($form->upro2)) {?>
                                  <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 2 :</label>
                                  <br/>
                                  <a href="<?=base_url('uploads/outline/topik/'.$form->upro2)?>" class="btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                                </div>
                                <?php }else{ ?>
                                  <div class="form-group col-md-12">
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
                        <?= $mahasiswa['tgl_daftar'] ?>
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
                        // if (empty($form->accdsnpa)) {
                        //   echo '<a type="button" class="btn btn-primary disabled" href="'.base_url('Dospem/validated/'.$form->nim).'"> Approve</a>';
                        // }else{
                        //   echo '<a type="button" class="btn btn-success disabled" href=""> Approved</a>';
                        // }
                        ?>
                      </td> -->
                      <td style="vertical-align: middle; text-align: center;">
                        <?php 
                        if (empty($form->acckaprodi)) {?>
                          <a type="button" class="btn btn-primary" href="<?= base_url('Kaprodi/edit_status/'.base64_encode($form->nim))?>"> Approve</a>
                        <?php }elseif (!empty($form->acckaprodi)&&empty($form->revisi)) { ?>
                          <a type="button" class="btn btn-success" href="<?= base_url('Kaprodi/edit_status/'.base64_encode($form->nim))?>"> Approved</a>
                        <?php }elseif (!empty($form->acckaprodi)&&!empty($form->revisi)) { ?>
                          <a type="button" class="btn btn-warning" href="<?= base_url('Kaprodi/edit_status/'.base64_encode($form->nim))?>"> Revisi</a>
                           
                        <?php }
                        ?>
                       
                      </td>
                      <td style="vertical-align: middle; text-align: center;">
                      <?php if ($form->dospemfix) {
                        $dospem=$this->Model->read_detail('noreg',$form->dospemfix,'dosen');
                        echo '['.$form->dospemfix.']<br>'.$dospem->nama;
                      }else{
                        echo "-";
                        } ?>
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
                    <th style="width: 150px; text-align: center;">Mahasiswa</th>
                    <th style="text-align: center; width: 95px;">Data Pendaftaran</th>
                    <th style="width: 155px; text-align: center;">Tanggal Mengajukan Outline</th>
                    <th style="width: 80px; text-align: center;">Subag LAA</th>
                    <!-- <th style="width: 80px; text-align: center;">Dosen PA</th> -->
                    <th style="width: 80px; text-align: center;">Kaprodi</th>
                    <th style="width: 100px; text-align: center;">Dosen Pembimbing</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <?php }
      ?>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('kaprodi/layout/bot'); ?>
<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<?php $this->load->view('kaprodi/layout/footer'); ?>
  <!-- DataTables -->
  <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
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
