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
        <li class="active">Status Pendaftaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">    
        <!-- BOX Succes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Status </h3>
            </div>
            <div class="box-body table-responsive">
            <div class="col-md-12">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 180px; text-align: center;">Tanggal Daftar</th>
                    <th style="width: 180px; text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Data Pendaftaran</th>
                    <th style="width: 120px; text-align: center;">Dosen Pembimbing</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <?php $mahasiswas = $this->Model->read_orderby_dual('accstaff is NOT NULL',NULL,'program_studi',$this->session->userdata('prodi'),'daftar_sidang','tgl_daftar','DESC');
                if (empty($mahasiswas)) {
      
                }else{
                  $no1=1;
                  foreach ($mahasiswas as $mahasiswa) { ?>
                    <tr>
                      <td style="vertical-align: middle; text-align: center;"><?= $no1;?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= indonesian_date(strtotime($mahasiswa['tgl_daftar']),'l, d F Y','');?></td>
                      <td style="vertical-align: middle; text-align: center;"><?= '['.$mahasiswa['nim'].']<br/>'.$mahasiswa['nama'];?></td>
                     
                      <td style="vertical-align: middle; text-align: center;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?= $mahasiswa['nim'];?>"><span class="fa fa-file-text-o"></span>&nbsp;&nbsp;Detail</button>
                        <button class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm_file<?= $mahasiswa['nim'];?>"> <span class="fa fa-file-text-o"></span>&nbsp;&nbsp;File Persyaratan</button>
                      </td>
                        <!-- Large modal -->
                        <div class="modal fade bs-example-modal-lg<?= $mahasiswa['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detail Pendaftaran Outline</h4>
                              </div>
                              <div class="modal-body col-md-12">
                                <!-- nama -->
                                <div class="form-group col-md-6">
                                  <label>&nbsp;&nbsp;Nama Lengkap</label>
                                  <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?= $mahasiswa['nama'];?>">
                                </div>
                                <!--  nim -->
                                <div class="form-group col-md-6">
                                  <label for="inputnim">NIM</label>
                                  <input type="tel" pattern="[0-9]{10}" class="form-control" name="nim" id="inputnim" placeholder="Masukan Nomor Induk Mahasiswa" required="" readonly="" value="<?=$mahasiswa['nim'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputjp">Jenjang Pendidikan</label>
                                  <input type="text" name="" readonly="" class="form-control" value="<?=$mahasiswa['jenjang_pendidikan'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputps">Program Studi</label>
                                  <input type="text" class="form-control" readonly="" name="" value="<?=$mahasiswa['program_studi'];?>">
                                </div>

                                <div class="form-group col-md-12"> 
                                  <div class="row">
                                    <div class="col-md-6"> 
                                     <label for="inputtempat">Tempat Lahir</label>
                                    <input type="text" class="form-control" readonly="" name="tempat" id="inputtempat" placeholder="Masukan Tempat" required="" value="<?=$mahasiswa['tempat'];?>">
                            
                                    </div>
                                    <div class="col-md-6">
                                     <label for="inputtempat">Tempat Lahir</label>
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="tl" id="datepicker1" placeholder="Format : yyyy-mm-dd" required="" readonly="" value="<?=$mahasiswa['tanggal_lahir'];?>">
                                      </div>
                                    </div>
                                  </div> 
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="inputnamaortu">Nama Orang Tua</label></label>
                                  <input type="text" class="form-control" name="ortu" required="" readonly="" id="inputnamaortu" placeholder="Masukan Nama Orang Tua" value="<?=$mahasiswa['ortu'];?>">
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="inputalamatrmh">Alamat Rumah <font color="red">*</font></label></label>
                                  <textarea class="form-control" rows="3" id="inputalamatrmh" name="alamatrmh" readonly="" placeholder="Masukan Alamat Rumah Lengkap" required=""><?=$mahasiswa['alamatrmh'];?></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputtr">Nomor Telepon Rumah  <font color="red">*</font></label></label>
                                  <input type="text" class="form-control" name="tr" required="" readonly="" id="inputtr" data-inputmask='"mask": "99999999999"' data-mask placeholder="Masukan Nomor Telepon Rumah" value="<?=$mahasiswa['teleponrmh'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputhp">Nomor Handphone  <font color="red">*</font></label></label>
                                  <input type="text" class="form-control" id="inputhp" name="hp" readonly="" required="" placeholder="Masukan Nomor Handphone" data-inputmask='"mask": "999999999999"' data-mask value="<?=$mahasiswa['hp'];?>">
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="inputnamaktr">Nama Kantor</label>
                                  <input type="text" class="form-control" readonly="" id="inputnamaktr" name="namaktr" placeholder="Masukan Nama Kantor" value="<?=$mahasiswa['kantor'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputjt">Jabatan Terakhir</label>
                                  <input type="text" class="form-control" id="inputjt" name="jt" readonly="" placeholder="Masukan Jabatan Terakhir" value="<?=$mahasiswa['jabatan'];?>">
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputemail">E-Mail</label></label>
                                  <input type="email" class="form-control" id="inputemail" name="email" required="" readonly="" placeholder="Masukan E-Mail" value="<?=$mahasiswa['email'];?>">
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="inputalamatktr">Alamat Kantor</label>
                                  <textarea class="form-control" rows="3" readonly="" id="inputalamatktr" name="alamatktr" placeholder="Masukan Alamat Kantor"><?=$mahasiswa['alamatktr'];?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="inputtk">Telepon Kantor</label>
                                  <input type="text" class="form-control" id="inputtk" readonly="" name="tk" placeholder="Masukan Telepon Kantor" value="<?=$mahasiswa['teleponktr'];?>">
                                </div>

                                <div class="form-group col-md-12">
                                  <label for="inputjs">Judul Skripsi </label></label>
                                  <textarea class="form-control" readonly="" rows="3" id="inputjs" readonly="" name="js" required="" placeholder="Masukan Judul Skripsi"><?=$mahasiswa['judul_skripsi'];?></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                  <?php $dosen=$this->Model->read_detail('noreg',$mahasiswa['dospem'],'dosen');?>
                                  <div class="row">
                                    <div class="col-md-12">
                                    <label for="inputdospem1">Dosen Pembimbing</label></label>
                                    <input type="text" readonly="" name="" class="form-control" value="[<?=$mahasiswa['dospem'];?>] <?=$dosen->nama;?>">
                                    </div>
                                  </div> 
                                </div>

                                
                                <div class="form-group col-md-6">
                                  <label for="inputtglpo">Tanggal Persetujuan Outline </label></label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" readonly="" class="form-control pull-right" name="tglpo" required="" value="<?=$mahasiswa['tglpo'];?>">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputjtmb">Jumlah Tatap Muka Bimbingan </label></label>
                                    <div class="input-group date">
                                      <input type="text" class="form-control pull-right" name="jtmb" required="" id="inputjtmb" placeholder="Masukan Jumlah Tatap Muka Bimbingan" readonly="" value="<?=$mahasiswa['bimbingan'];?>">
                                      <div class="input-group-addon">
                                        <label ><sub>X</sub></label>
                                      </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputpers">Perpanjangan Skripsi</label>
                                    <div class="input-group date">
                                      <input type="text" class="form-control pull-right" name="pers" id="inputpers" placeholder="Masukan Jumlah Perpanjangan Skripsi" readonly="" value="<?=$mahasiswa['pers'];?>">
                                      <div class="input-group-addon">
                                        <label><sub>X</sub></label>
                                      </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="inputipk">Indeks Prestasi Komulatif </label></label>
                                  <input type="text" class="form-control" id="inputipk" name="ipk" readonly="" required="" placeholder="Masukan Indeks Prestasi Komulatif" value="<?=$mahasiswa['ipk'];?>">
                                </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm_file<?= $mahasiswa['nim'];?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Detail Dokumen Persyaratan</h4>
                                <?php $notfound=base_url('uploads/img/no.gif')?>
                              </div>
                              <div class="modal-body col-md-12">
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Kartu Tanda Penduduk (KTP):</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['ktp'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>

                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Kartu Keluarga (KK):</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['kk'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>

                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Daftar Ulang Terakhir:</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipdut'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>

                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Bimbingan Skripsi:</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipbs'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>

                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Ujian Skripsi:</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipus'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Slip Perpanjangan Skripsi:</label>
                                  <br/>
                                  <img src="<?=base_url('uploads/sidang_skripsi/'.$mahasiswa['slipps'])?>" onerror="this.src='<?= $notfound; ?>'" style="width:100%;max-width:560px;">
                                </div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      
              
                     
                      <td style="vertical-align: middle; text-align: center;">
                        <?php 
                        if (empty($mahasiswa['accdospem'])) {
                          echo '<a type="button" class="btn btn-primary disabled"> Approve</a>';
                        }else{
                          echo '<a type="button" class="btn btn-success disabled" href=""> Approved</a>';
                        }
                        ?>
                      </td>
                      <td style="vertical-align: middle; text-align: center;">
                        <?php 
                        if (empty($mahasiswa['acckaprodi'])) {
                          if (empty($mahasiswa['accdospem'])) { ?>
                             <a type="button" class="btn btn-primary" onclick="alert('Dosen Pembimbing Belum Approve!')"> Approve</a>
                          <?php }else{ ?>
                              <a type="button" onclick="return confirm('Are you sure?');" class="btn btn-primary" href="<?= base_url('Kaprodi/approve_sidang/'.$mahasiswa['nim'])?>"> Approve</a>
                          <?php } 
                           }else{ ?>
                          <a type="button" class="btn btn-success disabled"> Approved</a>
                           
                        <?php }
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
                    <th style="width: 180px; text-align: center;">Tanggal Daftar</th>
                    <th style="width: 180px; text-align: center;">Mahasiswa</th>
                    <th style="text-align: center;">Data Pendaftaran</th>
                    <th style="width: 120px; text-align: center;">Dosen Pembimbing</th>
                    <th style="width: 120px; text-align: center;">Aksi</th>
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
    var status_outline = document.getElementById("formulir");
    
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
