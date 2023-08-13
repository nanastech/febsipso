  <!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/select2.min.css">
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
        Formulir Pendaftaran
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Proposal Outline</a></li>
        <li class="active">Formulir Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= $notification; ?>
      <?php 
      $cek_outline = $this->Model->read_detail('nim',$this->session->userdata('username'),'outline');
        if (!empty($cek_outline)) { 
          if (!empty($cek_outline->accstaff)) {?> 
            <!-- Jika sudah di validasi staff -->
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Tidak Bisa Edit Form!</h4>
              Maaf, anda tidak bisa edit formulir dikarenakan formulir pendaftaran outline sudah divalidasi oleh SUBAG LAA!
            </div>
          <?php }else{ $form=$this->Model->read_detail('nim',$this->session->userdata('username'),'outline'); ?>
            <!-- Jika belum divalidasi staff -->
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- Form Input Outline -->
                <div class="box box-default">
                  <div class="box-header with-border">
                    <span class="glyphicon glyphicon-plus"></span><h3 class="box-title">&nbsp;&nbsp;Form Input Outline</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <form role="form" action="<?= base_url('Mahasiswa/update_outline/'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <!-- nama -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Nama Lengkap</label>
                          <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?=$form->nama;?>">
                        </div>
                        <!--  nim -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Nim</label>
                          <input readonly="" required="" class="form-control" name="nim" type="text" placeholder="Masukan Nim" value="<?=$form->nim;?>">
                        </div>
                        <!-- projurus -->
                        <div class="form-group col-md-6">
                          <i class="fa fa-fw fa-graduation-cap"></i><label>&nbsp;&nbsp;Program Jurusan</label>
                          <select class="form-control" name="projurus" required="" readonly="">
                          <?php if ($form->jurusan=='DAK') {
                              echo '<option value="DAK">D3 Akuntasi</option>';
                            }elseif ($form->jurusan=='DKP') {
                              echo '<option value="DKP">D3 Keuangan & Perbankan</option>';
                            }elseif ($form->jurusan=='SA') {
                              echo '<option value="SA">S1 Akuntansi</option>';
                            }elseif ($form->jurusan=='SM') {
                              echo '<option value="SM">S1 Manajemen</option>';
                            }elseif ($form->jurusan=='EKS') {
                              echo '<option value="EKS">S1 Ekonomi Syariah</option>';
                          } ?>
                          </select>
                        </div>
                       <!-- nohp -->
                        <div class="form-group col-md-6">
                          <span class="fa fa-fw fa-mobile-phone"></span><label>&nbsp;&nbsp;Nomor Handphone</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="glyphicon glyphicon-earphone"></i>
                              </div>
                              <input required="" type="text" class="form-control" name="nohp" data-inputmask='"mask": "9999-9999-9999"' data-mask value="<?=$form->nohp;?>">
                            </div>
                        </div>
                        <!-- tempat -->
                        <div class="form-group col-md-6">
                          <span class="fa fa-building"></span><label>&nbsp;&nbsp;Tempat Lahir</label>
                          <input required="" class="form-control" name="tempat" type="text" placeholder="Masukan Tempat Lahir" value="<?=$form->tempat;?>">             
                        </div>
                        <!-- tanggallahir -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-calendar"></span><label>&nbsp;&nbsp;Tanggal Lahir</label>
                          <input required="" class="form-control" name="tanggallahir" id="datepicker1" type="text" placeholder="yyyy-mm-dd" value="<?=$form->tgllahir;?>">
                        </div>
                        <!-- alamat -->
                        <div class="form-group col-md-12">
                          <span class="glyphicon glyphicon-home"></span><label>&nbsp;&nbsp;Alamat</label>
                          <textarea required="" class="form-control" name="alamat" type="text" rows="2" placeholder="Masukan Alamat"><?=$form->alamat;?></textarea>
                        </div>
                        <!-- email -->
                        <div class="form-group col-md-12">
                          <label for="inputemail">E-Mail  <font color="red">*</font></label>
                          <input type="email" class="form-control" id="inputemail" name="email" required="" placeholder="Masukan E-Mail" value="<?=$form->email;?>">
                        </div>
                        <!-- topik1 -->
                        <div class="form-group col-md-12">
                          <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 1</label>
                          <textarea required="" class="form-control" name="topik1" rows="2" placeholder="Masukan Topik 1"><?=$form->topik1;?></textarea>
                        </div>
                        <!-- topik2 -->
                        <div class="form-group col-md-12">
                          <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 2</label>
                          <textarea required="" class="form-control" name="topik2" rows="2" type="text" placeholder="Masukan Topik 2"><?=$form->topik2;?></textarea>
                        </div>
                        <!-- dospem -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-pawn"></span><label>&nbsp;&nbsp;Dosen Pembimbing</label>
                          <select required="" class="form-control" name="dospem">
                            <?php 
                            $dosens=$this->Model->read('dosen');
                            foreach ($dosens as $dosen) { ?>
                              <option <?php if($form->dospem==$dosen['noreg']) echo 'selected="selected"';?> value="<?=$dosen['noreg']?>">[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>;
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <!-- dospems -->
                        <div class="form-group col-md-6">
                          <label>&nbsp;&nbsp;</label>
                          <select required="" class="form-control" name="dospems">
                            <?php 
                            foreach ($dosens as $dosen) { ?>
                              <option <?php if($form->dospems==$dosen['noreg']) echo 'selected="selected"';?> value="<?=$dosen['noreg']?>">[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>;
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <!-- nmp -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Metode Penelitian</label>
                          <select required="" class="form-control" name="nmp">
                            <option value="">
                              Pilih Nilai
                            </option>
                            <option <?php if($form->nmp=='A') echo 'selected="selected"';?> value="A">
                              A
                            </option>
                            <option <?php if($form->nmp=='A-') echo 'selected="selected"';?> value="A-">
                              A-
                            </option>
                            <option <?php if($form->nmp=='B+') echo 'selected="selected"';?> value="B+">
                            B+
                            </option>
                            <option <?php if($form->nmp=='B') echo 'selected="selected"';?> value="B">
                            B
                            </option>
                            <option <?php if($form->nmp=='B-') echo 'selected="selected"';?> value="B-">
                            B-
                            </option>
                            <option <?php if($form->nmp=='C+') echo 'selected="selected"';?> value="C+">
                            C+
                            </option>
                            <option <?php if($form->nmp=='C') echo 'selected="selected"';?> value="C">
                            C
                            </option>
                            <option <?php if($form->nmp=='C-') echo 'selected="selected"';?> value="C-">
                              C-
                            </option>
                            <option <?php if($form->nmp=='D') echo 'selected="selected"';?> value="D">
                              D
                            </option>
                            <option <?php if($form->nmp=='E') echo 'selected="selected"';?> value="E">
                              E
                            </option>
                          </select>
                        </div>
                        <!-- ns -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Statistik</label>
                          <select require="" class="form-control" name="ns">
                            <option value="">
                              Pilih Nilai
                            </option>
                            <option <?php if($form->ns=='A') echo 'selected="selected"';?> value="A">
                              A
                            </option>
                            <option <?php if($form->ns=='A-') echo 'selected="selected"';?> value="A-">
                              A-
                            </option>
                            <option <?php if($form->ns=='B+') echo 'selected="selected"';?> value="B+">
                              B+
                            </option>
                            <option <?php if($form->ns=='B') echo 'selected="selected"';?> value="B">
                              B
                            </option>
                            <option <?php if($form->ns=='B-') echo 'selected="selected"';?> value="B-">
                              B-
                            </option>
                            <option <?php if($form->ns=='C+') echo 'selected="selected"';?> value="C+">
                              C+
                            </option>
                            <option <?php if($form->ns=='C') echo 'selected="selected"';?> value="C">
                              C
                            </option>
                            <option <?php if($form->ns=='C-') echo 'selected="selected"';?> value="C-">
                              C-
                            </option>
                            <option <?php if($form->ns=='D') echo 'selected="selected"';?> value="D">
                              D
                            </option>
                            <option <?php if($form->ns=='E') echo 'selected="selected"';?> value="E">
                              E
                            </option>
                          </select>
                        </div>
                        <!-- lmedpel -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Metode Penelitian</label>
                          <select required="" class="form-control" name="lmedpel">
                            <option value="">
                              Pilih  
                            </option>
                            <option <?php if($form->lmedpel=='1') echo 'selected="selected"';?> value="1">
                              Lulus 
                            </option>
                            <option <?php if($form->lmedpel=='0') echo 'selected="selected"';?> value="0">
                              Tidak Lulus
                            </option>
                          </select>
                        </div>
                        <!-- lstatis -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Statistik</label>
                          <select require="" class="form-control" name="lstatis">
                            <option value="">
                            Pilih  
                            </option>
                            <option <?php if($form->lstatis=='1') echo 'selected="selected"';?> value="1">
                            Lulus 
                            </option>
                            <option <?php if($form->lstatis=='0') echo 'selected="selected"';?> value="0">
                            Tidak Lulus
                            </option>
                          </select>
                        </div>
                        <!-- lkkp -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus KKP</label>
                          <select required="" class="form-control" name="lkkp">
                            <option value="">
                              Pilih  
                            </option>
                            <option <?php if($form->lkkp=='1') echo 'selected="selected"';?> value="1">
                              Lulus 
                            </option>
                            <option <?php if($form->lkkp=='0') echo 'selected="selected"';?> value="0">
                              Tidak Lulus
                            </option>
                          </select>
                        </div>
                        <!-- l128 -->
                        <div class="form-group col-md-6">
                          <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus SKS</label>
                          <select required="" class="form-control" name="l128">
                            <option value="">
                              Pilih  
                            </option>
                            <option <?php if($form->l128=='1') echo 'selected="selected"';?> value="1">
                              Lulus 
                            </option>
                            <option <?php if($form->l128=='0') echo 'selected="selected"';?> value="0">
                              Tidak Lulus
                            </option>
                          </select>
                      </div>
                      <!-- konsen -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-book"></span><label>&nbsp;&nbsp;Konsentrasi</label>
                        <input required="" class="form-control" name="konsen" type="text" placeholder="Masukan Konsentrasi" value="<?=$form->konsen;?>">
                      </div>
                      <!-- yajukan -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-ok-circle"></span><label>&nbsp;&nbsp;Yang Mengajukan</label>
                        <input readonly="" required="" class="form-control" name="yajukan" type="text" placeholder=" Otomatis" value="<?=$form->nama;?>">
                      </div>
                      <div class="row col-md-12">
                  	    <hr>
                        <p>
                          Keterangan : <br>
                          &nbsp;&nbsp;D3 : 90 SKS <br>
                          &nbsp;&nbsp;S1 : 125 SKS <br>
                          &nbsp;&nbsp;<font color="red">*&nbsp;</font>Required
                        </p>
                  </div>
                    </div>
                    <!-- Row End -->
                    </div>
                  </div>
                  <!-- Box End -->
                  <!-- Form Input Outline End -->
                </div>
                <!-- /.box -->
              </div>
              <!--/.col (left) -->
              <div class="col-md-6">
                <!-- Form Upload Persyartan -->
                <div class="box box-default">
                  <div class="box-header with-border">
                    <span class="glyphicon glyphicon-tasks"></span><h3 class="box-title">&nbsp;&nbsp;Form Upload Persyaratan</h3>
                    <?php $notfound=base_url('uploads/img/no.gif')?>
                    <input type="hidden" name="upload_gambar">
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="box box-success">
                          <div class="box-header with-border">
                            <i class="fa fa-fw fa-camera"></i><label>&nbsp;&nbsp;Foto Mahasiswa</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group col-md-12">
                              <img src="<?=base_url('uploads/outline/'.$form->ufmhs)?>" onerror="this.src='<?= $notfound; ?>'" height="150px">
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-picture-o"></i>
                              </div>
                              <input type="file" class="form-control" name="ufmhs" accept="image/*" >
                            </div>
                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="box box-success">
                          <div class="box-header with-border">
                            <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Bimbingan Skripsi</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                              <img src="<?=base_url('uploads/outline/'.$form->usbs)?>" onerror="this.src='<?= $notfound; ?>'" height="225px" width="300px">
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-picture-o"></i>
                              </div>
                              <input type="file" class="form-control" name="usbs" accept="image/*">
                            </div>
                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="box box-success">
                          <div class="box-header with-border">
                           <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Pendaftaran Ulang</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                              <img src="<?=base_url('uploads/outline/'.$form->uspu)?>" onerror="this.src='<?= $notfound; ?>'" height="225px" width="300px">
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-picture-o"></i>
                              </div>
                              <input type="file" class="form-control" name="uspu" accept="image/*">
                            </div>
                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="box box-success">
                          <div class="box-header with-border">
                           <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Upload Kartu Studi Tetap (KST)</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                              <img src="<?=base_url('uploads/outline/'.$form->ukst)?>" onerror="this.src='<?= $notfound; ?>'" height="225px" width="300px">
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-picture-o"></i>
                              </div>
                              <input type="file" class="form-control" name="ukst" accept="image/*">
                            </div>
                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="box box-success">
                          <div class="box-header with-border">
                           <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;KHS Semester</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                              <img src="<?=base_url('uploads/outline/'.$form->ukhs)?>" onerror="this.src='<?= $notfound; ?>'" height="225px" width="300px">
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-picture-o"></i>
                              </div>
                              <input type="file" class="form-control" name="ukhs" accept="image/*">
                            </div>
                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-12">
                        <div class="box box-success">
                          <div class="box-header with-border">
                           <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Transkrip Nilai</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                              <img src="<?=base_url('uploads/outline/'.$form->utn)?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-picture-o"></i>
                              </div>
                              <input type="file" class="form-control" name="utn" accept="image/*">
                            </div>
                            <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="box box-success">
                          <div class="box-header with-border">
                            <span class="glyphicon glyphicon-open-file"></span><label>&nbsp;&nbsp;Proposal Topik 1</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                                <a href="<?=base_url('uploads/outline/topik/'.$form->upro1)?>" class="btn btn-default" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline Topik 1</a>
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-pdf-o"></i>
                              </div>
                              <input type="file" class="form-control" name="upro1" accept=".pdf">
                            </div>
                            <p class="text-red"><code><strong>Format file : pdf, Max file size : 5MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="box box-success">
                          <div class="box-header with-border">
                            <span class="glyphicon glyphicon-open-file"></span><label>&nbsp;&nbsp;Proposal Topik 2</label>
                            <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                            </div>
                            <!-- /.box-tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <div class="form-group">
                                <a href="<?=base_url('uploads/outline/topik/'.$form->upro2)?>" class="btn btn-default" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline Topik 2</a>
                            </div>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-fw fa-file-pdf-o"></i>
                              </div>
                              <input type="file" class="form-control" name="upro2" accept=".pdf">
                            </div>
                            <p class="text-red"><code><strong>Format file : pdf, Max file size : 5MB</strong></code></p>
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                    </div>
                  <!-- Box Primary end -->
                  </div>
                  <!-- Col End -->
                  <div class="box-footer" align="center">
                    <input type="submit" onclick="return confirm('Are you sure?');" class="btn btn-primary btn-lg" value="Submit Outline">
                    &nbsp;
                    <input type="reset" class="btn btn-warning btn-lg" value="Reset">
                    &nbsp;
                    <button type="button" class="btn btn-default btn-lg">Cancel</button>
                  </div>
                  </form> 
                </div>
                <!-- Form Upload Persyaratan end -->
              </div>
            </div>
          <?php }?>
          <?php  }else{
           $relasiPA=$this->Model->read_detail('nim',$this->session->userdata('username'),'dosenpa');
           if (empty($relasiPA) || !$relasiPA) { ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info-circle"></i> Dosen PA Belum Ditentukan!</h4>
            Mohon tentukan dosen PA terlebih dahulu....
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><span class="fa fa-user"></span>&nbsp;&nbsp;Pendaftaran Dosen Penasehat Akademik</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <form action="<?= base_url('Mahasiswa/daftar_dosenpa/'); ?>" method="POST">
                      <div class="col-md-6 col-md-push-3">
                        <div class="form-grup col-md-12">
                          <label for="inputnama">Dosen Penasehat Akademik :</label>
                          <select name="dosenpa" class="form-control select2" required="">
                            <option value="">-- Pilih Dosen Penasehat Akademik --</option>
                            <?php 
                            $dosens=$this->Model->read('dosen');
                            foreach ($dosens as $dosen) { ?>
                              <option value="<?= $dosen['noreg']?>">[<?= $dosen['noreg']?>] <?=  $dosen['nama']?></option>;
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-grup col-md-12" style="margin-top: 10px;" align="right">
                          <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.box-body -->
                <!-- <div class="box-footer" align="center">
                </div>
                <!-- /.box-footer-->
              </div>
            </div>  
          </div>
          <?php }else{ ?>
          	<!-- Jika belum mengisi formulir -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- Form Input Outline -->
              <div class="box box-default">
                <div class="box-header with-border">
                  <span class="glyphicon glyphicon-plus"></span><h3 class="box-title">&nbsp;&nbsp;Form Input Outline</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <form role="form" action="<?= base_url('Mahasiswa/daftar_outline/'); ?>" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- nama -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Nama Lengkap<font color="red">*</font></label>
                        <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?=$this->session->userdata('name');?>">
                        <?= form_error('nama');?>
                      </div>
                      <!--  nim -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Nim<font color="red">*</font></label>
                        <input readonly="" required="" class="form-control" name="nim" type="text" placeholder="Masukan Nim" value="<?=$this->session->userdata('username');?>">
                        <?= form_error('nim');?>
                      </div>
                      <!-- projurus -->
                      <div class="form-group col-md-6">
                        <i class="fa fa-fw fa-graduation-cap"></i><label>&nbsp;&nbsp;Program Jurusan<font color="red">*</font></label>
                        <select class="form-control" name="projurus" required="" readonly="">
                        <?php if ($this->session->userdata('prodi')=='DAK') {
                            echo '<option value="DAK">D3 Akuntasi</option>';
                          }elseif ($this->session->userdata('prodi')=='DKP') {
                            echo '<option value="DKP">D3 Keuangan & Perbankan</option>';
                          }elseif ($this->session->userdata('prodi')=='SA') {
                            echo '<option value="SA">S1 Akuntansi</option>';
                          }elseif ($this->session->userdata('prodi')=='SM') {
                            echo '<option value="SM">S1 Manajemen</option>';
                          }elseif ($this->session->userdata('prodi')=='EKS') {
                            echo '<option value="EKS">S1 Ekonomi Syariah</option>';
                          } ?>
                        </select>
                        <?= form_error('projurus');?>
                      </div>
                      <!-- nohp -->
                      <div class="form-group col-md-6">
                        <span class="fa fa-fw fa-mobile-phone"></span><label>&nbsp;&nbsp;Nomor Handphone<font color="red">*</font></label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="glyphicon glyphicon-earphone"></i>
                            </div>
                            <input required="" type="text" class="form-control" name="nohp" data-inputmask='"mask": "9999-9999-9999"' data-mask value="<?= set_value('nohp'); ?>">
                          </div>
                          <?= form_error('nohp');?>
                      </div>
                      <!-- tempat -->
                      <div class="form-group col-md-6">
                        <span class="fa fa-building"></span><label>&nbsp;&nbsp;Tempat Lahir<font color="red">*</font></label>
                        <input required="" class="form-control" name="tempat" type="text" placeholder="Masukan Tempat Lahir" value="<?= set_value('tempat'); ?>">
                        <?= form_error('tempat');?>
                      </div>
                      <!-- tanggallahir -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-calendar"></span><label>&nbsp;&nbsp;Tanggal Lahir<font color="red">*</font></label>
                        <input required="" class="form-control" name="tanggallahir" id="datepicker1" type="text" placeholder="yyyy-mm-dd" value="<?= set_value('tanggallahir'); ?>">
                        <?= form_error('tanggallahir');?>
                      </div>
                      <!-- alamat -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-home"></span><label>&nbsp;&nbsp;Alamat<font color="red">*</font></label>
                        <textarea required="" class="form-control" name="alamat" type="text" rows="2" placeholder="Masukan Alamat"><?= set_value('alamat'); ?></textarea>
                        <?= form_error('alamat');?>
                      </div>
                      <!-- email -->
                      <div class="form-group col-md-12">
                        <label for="inputemail">E-Mail  <font color="red">*</font></label>
                        <input type="email" class="form-control" id="inputemail" name="email" required="" placeholder="Masukan E-Mail" value="<?= set_value('email'); ?>">
                        <?= form_error('email');?>
                      </div>
                      <!-- topik1 -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 1<font color="red">*</font></label>
                        <textarea required="" class="form-control" name="topik1" rows="2" placeholder="Masukan Topik 1"><?= set_value('topik1'); ?></textarea>
                        <?= form_error('topik1');?>
                      </div>
                      <!-- topik2 -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik 2<font color="red">*</font></label>
                        <textarea required="" class="form-control" name="topik2" rows="2" type="text" placeholder="Masukan Topik 2"><?= set_value('topik2'); ?></textarea>
                        <?= form_error('topik2');?>
                      </div>
                      <!-- dospem -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-pawn"></span><label>&nbsp;&nbsp;Dosen Pembimbing<font color="red">*</font></label>
                        <select required="" class="form-control" name="dospem">
                        <option value="">
                            Pilih Pembimbing
                            </option>
                          <?php 
                          $dosens=$this->Model->read('dosen');
                          foreach ($dosens as $dosen) { ?>
                            <option <?php if(set_value('dospem')==$dosen['noreg']) echo 'selected="selected"';?> value="<?=$dosen['noreg']?>">[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>;
                          <?php
                          }
                          ?>
                        </select>
                        <?= form_error('dospem');?>
                      </div>
                      <!-- dospems -->
                      <div class="form-group col-md-6">
                        <label>&nbsp;&nbsp;</label>
                        <select required="" class="form-control" name="dospems">
                        <option value="">
                            Pilih Pembimbing
                            </option>
                          <?php 
                          foreach ($dosens as $dosen) { ?>
                            <option <?php if(set_value('dospem')==$dosen['noreg']) echo 'selected="selected"';?> value="<?=$dosen['noreg']?>">[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>;
                          <?php
                          }
                          ?>
                        </select>
                        <?= form_error('dospems');?>
                      </div>
                      <!-- nmp -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Metode Penelitian<font color="red">*</font></label>
                        <select required="" class="form-control" name="nmp">
                          <option value="">
                          Pilih Nilai
                          </option>
                          <option <?php if(set_value('nmp')=='A') echo 'selected="selected"';?> value="A">
                          A
                          </option>
                          <option <?php if(set_value('nmp')=='A-') echo 'selected="selected"';?> value="A-">
                          A-
                          </option>
                          <option <?php if(set_value('nmp')=='B+') echo 'selected="selected"';?> value="B+">
                          B+
                          </option>
                          <option <?php if(set_value('nmp')=='B') echo 'selected="selected"';?> value="B">
                          B
                          </option>
                          <option <?php if(set_value('nmp')=='B-') echo 'selected="selected"';?> value="B-">
                          B-
                          </option>
                          <option <?php if(set_value('nmp')=='C+') echo 'selected="selected"';?> value="C+">
                          C+
                          </option>
                          <option <?php if(set_value('nmp')=='C') echo 'selected="selected"';?> value="C">
                          C
                          </option>
                          <option <?php if(set_value('nmp')=='C-') echo 'selected="selected"';?> value="C-">
                          C-
                          </option>
                          <option <?php if(set_value('nmp')=='D') echo 'selected="selected"';?> value="D">
                          D
                          </option>
                          <option <?php if(set_value('nmp')=='E') echo 'selected="selected"';?> value="E">
                          E
                          </option>
                        </select>
                        <?= form_error('nmp');?>
                      </div>
                      <!-- ns -->
                        <div class="form-group col-md-6">
	                        <span class="glyphicon glyphicon-equalizer"></span><label>&nbsp;&nbsp;Nilai Statistik<font color="red">*</font></label>
	                        <select require="" class="form-control" name="ns" >
	                          <option value="">
	                          Pilih Nilai
	                          </option>
	                          <option <?php if(set_value('ns')=='A') echo 'selected="selected"';?> value="A">
	                          A
	                          </option>
	                          <option <?php if(set_value('ns')=='A-') echo 'selected="selected"';?> value="A-">
	                          A-
	                          </option>
	                          <option <?php if(set_value('ns')=='B+') echo 'selected="selected"';?> value="B+">
	                          B+
	                          </option>
	                          <option <?php if(set_value('ns')=='B') echo 'selected="selected"';?> value="B">
	                          B
	                          </option>
	                          <option <?php if(set_value('ns')=='B-') echo 'selected="selected"';?> value="B-">
	                          B-
	                          </option>
	                          <option <?php if(set_value('ns')=='C+') echo 'selected="selected"';?> value="C+">
	                          C+
	                          </option>
	                          <option <?php if(set_value('ns')=='C') echo 'selected="selected"';?> value="C">
	                          C
	                          </option>
                            <option <?php if(set_value('ns')=='C-') echo 'selected="selected"';?> value="C-">
	                          C-
	                          </option>
	                          <option <?php if(set_value('ns')=='D') echo 'selected="selected"';?> value="D">
	                          D
	                          </option>
	                          <option <?php if(set_value('ns')=='E') echo 'selected="selected"';?> value="E">
	                          E
	                          </option>
	                        </select>
	                        <?= form_error('ns');?>
                      	</div>
                      <!-- lmedpel -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Metode Penelitian<font color="red">*</font></label>
                        <select required="" class="form-control" name="lmedpel">
                          <option value="">
                          Pilih  
                          </option>
                          <option <?php if(set_value('lmedpel')=='1') echo 'selected="selected"';?> value="1">
                          Lulus 
                          </option>
                          <option <?php if(set_value('lmedpel')=='0') echo 'selected="selected"';?> value="0">
                          Tidak Lulus
                          </option>
                        </select>
                        <?= form_error('lmedpel');?>
                      </div>
                      <!-- lstatis -->
                      <div class="form-group col-md-6" >
	                        <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus Statistik<font color="red">*</font></label>
	                        <select require="" class="form-control" name="lstatis">
	                          <option value="">
	                          Pilih  
	                          </option>

	                          <option <?php if(set_value('lstatis')=='1') echo 'selected="selected"';?> value="1">
	                          Lulus 
	                          </option>
	                          
	                          <option <?php if(set_value('lstatis')=='0') echo 'selected="selected"';?> value="0">
	                          Tidak Lulus
	                          </option>
	                        </select>
	                        <?= form_error('lstatis');?>
                      </div> 
                      <!-- lkkp -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus KKP<font color="red">*</font></label>
                        <select required="" class="form-control" name="lkkp">
                          <option value="">
                          Pilih  
                          </option>
                          <option <?php if(set_value('lkkp')=='1') echo 'selected="selected"';?> value="1">
                          Lulus 
                          </option>
                          <option <?php if(set_value('lkkp')=='0') echo 'selected="selected"';?> value="0">
                          Tidak Lulus
                          </option>
                        </select>
                        <?= form_error('lkkp');?>
                      </div>
                      <!-- l128 -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-ok-sign"></span><label>&nbsp;&nbsp;Lulus SKS<font color="red">*</font></label>
                        <select required="" class="form-control" name="l128">
                          <option value="">
                          Pilih  
                          </option>
                          <option <?php if(set_value('l128')=='1') echo 'selected="selected"';?> value="1">
                          Lulus 
                          </option>
                          <option <?php if(set_value('l128')=='0') echo 'selected="selected"';?> value="0">
                          Tidak Lulus
                          </option>
                        </select>
                        <?= form_error('l128');?>
                      </div>
                      <!-- konsen -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-book"></span><label>&nbsp;&nbsp;Konsentrasi<font color="red">*</font></label>
                        <input required="" class="form-control" name="konsen" type="text" placeholder="Masukan Konsentrasi" value="<?= set_value('konsen'); ?>">
                        <?= form_error('konsen');?>
                      </div>
                      <!-- yajukan -->
                      <div class="form-group col-md-12">
                        <span class="glyphicon glyphicon-ok-circle"></span><label>&nbsp;&nbsp;Yang Mengajukan<font color="red">*</font></label>
                        <input readonly="" required="" class="form-control" name="yajukan" type="text" placeholder=" Otomatis" value="<?=$this->session->userdata('name');?>">
                        <?= form_error('yajukan');?>
                      </div>
                    </div>
                  	<!-- Row End -->
                  </div>
                  <div class="row col-md-12">
                  	<hr>
                  	<p>
                        Keterangan : <br>
                        &nbsp;&nbsp;D3 : 90 SKS <br>
                        &nbsp;&nbsp;S1 : 125 SKS <br>
                        &nbsp;&nbsp;<font color="red">*&nbsp;</font>Required
                      </p>
                  </div>
                </div>
                <!-- Box End -->
                <!-- Form Input Outline End -->
              </div>
              <!-- /.box -->
            </div>
            <!--/.col (left) -->
            <div class="col-md-6">
              <!-- Form Upload Persyartan -->
              <div class="box box-default">
                <div class="box-header with-border">
                  <span class="glyphicon glyphicon-tasks"></span><h3 class="box-title">&nbsp;&nbsp;Form Upload Persyaratan</h3>
                  <input type="hidden" name="upload_gambar">
                  <?= form_error('upload_gambar');?>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <!-- ufmhs -->
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <i class="fa fa-fw fa-camera"></i><label>&nbsp;&nbsp;Foto Mahasiswa<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-picture-o"></i>
                          </div>
                          <input type="file" class="form-control" name="ufmhs" accept="image/*" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                        <?= form_error('ufmhs');?>
                      </div>
                      <!-- usbs -->
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Bimbingan Skripsi<font color="red">*</font></label></div>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-fw fa-file-picture-o"></i>
                            </div>
                            <input type="file" class="form-control" name="usbs" accept="image/*" required="">
                          </div>
                          <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                          <?= form_error('usbs');?>
                      </div>
                      <!-- uspu -->
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Slip Pendaftaran Ulang<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-picture-o"></i>
                          </div>
                          <input type="file" class="form-control" name="uspu" accept="image/*" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                        <?= form_error('uspu');?>
                      </div>
                      <!-- ukst -->
                      <div class="form-group col-md-6">
                        <div class="form-group">
                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Upload Kartu Studi Tetap (KST)<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-picture-o"></i>
                          </div>
                          <input type="file" class="form-control" name="ukst" accept="image/*" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                        <?= form_error('ukst');?>
                      </div>
                      <!-- ukhs -->
                      <div class="form-group col-md-6">
                        <div class="form-group">
                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;KHS Semester<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-picture-o"></i>
                          </div>
                          <input type="file" class="form-control" name="ukhs" accept="image/*" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                        <?= form_error('ukhs');?>
                      </div>
                      <!-- utn -->
                      <div class="form-group col-md-12">
                        <div class="form-group">
                          <i class="glyphicon glyphicon-picture"></i><label>&nbsp;&nbsp;Transkrip Nilai<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-picture-o"></i>
                          </div>
                          <input type="file" class="form-control" name="utn" accept="image/*" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : gif|jpg|png, Max file size : 2MB</strong></code></p>
                        <?= form_error('utn');?>
                      </div>
                      <!-- upro1 -->
                      <div class="form-group col-md-6">
                        <div class="form-group">
                          <span class="glyphicon glyphicon-open-file"></span><label>&nbsp;&nbsp;Proposal Topik 1<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-pdf-o"></i>
                          </div>
                          <input type="file" class="form-control" name="upro1" accept=".pdf" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : pdf, Max file size : 5MB</strong></code></p>
                        <?= form_error('upro1');?>
                      </div>
                      <!-- upro1 -->
                      <div class="form-group col-md-6">
                        <div class="form-group">
                          <span class="glyphicon glyphicon-open-file"></span><label>&nbsp;&nbsp;Proposal Topik 2<font color="red">*</font></label>
                        </div>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-fw fa-file-pdf-o"></i>
                          </div>
                          <input type="file" class="form-control" name="upro2" accept=".pdf" required="">
                        </div>
                        <p class="text-red"><code><strong>Format file : pdf, Max file size : 5MB</strong></code></p>
                        <?= form_error('upro2');?>
                      </div>
                    </div>
                  <!-- /.box-body -->
                  </div>
                <!-- Box Primary end -->
                </div>
                <!-- Col End -->
                
                <div class="box-footer" align="center">
                  <input type="submit" onclick="return confirm('Are you sure?');" class="btn btn-primary btn-lg" value="Submit Outline">
                  &nbsp;
                  <input type="reset" class="btn btn-warning btn-lg" value="Reset">
                  &nbsp;
                  <button type="button" class="btn btn-default btn-lg">Cancel</button>
                </div>
                </form> 
              </div>
              <!-- Form Upload Persyartan end -->
            </div>
        </div>
        <?php  }
        } ?>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('mahasiswa/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<?php $this->load->view('mahasiswa/layout/footer'); ?>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<!-- Menu -->
  <script>
    var dashboard = document.getElementById("dashboard");
    var treeoutline = document.getElementById("treeoutline");
    var daftar_outline = document.getElementById("daftar_outline");
    var status_outline = document.getElementById("status_outline");
    
    var treedaftar = document.getElementById("treedaftar");
    var formulir = document.getElementById("formulir");
    var statusform = document.getElementById("statusform");
    
    function clear_menu(){
      dashboard.className = "";
      treeoutline.className = "treeview";
      daftar_outline.className = "";
      status_outline.className = "";
      treedaftar.className = "treeview";
      formulir.className = "";
      statusform.className = "";
    }

    clear_menu();
    daftar_outline.className = "treeview active";
    treeoutline.className = "active";
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
