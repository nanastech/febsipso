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
    function edit(){
      var v = document.getElementById('editcatatan').readOnly;
      if (v==true) {
        document.getElementById('editcatatan').readOnly=false;
      }else{
        document.getElementById('editcatatan').readOnly=true;
      }
    }

   function mystatus(sel){
        var value = sel.value;  
        if (value=="Ditolak") {
           document.getElementById("dospemfix").style.display = "none";
           document.getElementById("dospem").style.display = "none";
           document.getElementById("dospems").style.display = "none";
           document.getElementById("pro1").style.display = "initial";
           document.getElementById("pro2").style.display = "initial";
           document.getElementById("topikfix").style.display = "none";
           document.getElementById("komentar").style.display = "initial";
           document.getElementById("catatan").style.display = "none";
        }else{
           document.getElementById("dospemfix").style.display = "initial";
           document.getElementById("dospem").style.display = "initial";
           document.getElementById("dospems").style.display = "initial";
           document.getElementById("pro1").style.display = "initial";
           document.getElementById("pro2").style.display = "initial";
           document.getElementById("topikfix").style.display = "initial";
           document.getElementById("komentar").style.display = "initial";
           document.getElementById("catatan").style.display = "initial";
           document.getElementById("status").style.display = "initial";
           document.getElementById("judulrevisi").style.display = "initial";
           document.getElementById("prorevisi").style.display = "initial";
           document.getElementById("btnapproved").style.display = "initial";
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
      <?php echo $this->session->flashdata('notification'); ?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- Form Input Outline -->
          <div class="box box-default">
            <div class="box-header with-border">
              <span class="glyphicon glyphicon-plus"></span><h3 class="box-title">&nbsp;&nbsp;Edit Status Outline</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                  <?php if (empty($record->acckaprodi)) {?>
                    <form action="<?= base_url('Kaprodi/Approved/'.$record->nim)?>" method="POST">
                  <?php }else{?>
                    <form action="<?= base_url('Kaprodi/update_status/'.$record->nim)?>" method="POST">
                  <?php  } ?>
                    
                      <legend >Status Outline</legend>
                      <!-- nama -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Nama Mahasiswa</label>
                        <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?= $record->nama;?>">
                      </div>
                      <!--  nim -->
                      <div class="form-group col-md-6">
                        <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Nim</label>
                        <input readonly="" required="" class="form-control" name="nim" type="text" placeholder="Masukan Nim" value="<?= $record->nim;?>">
                      </div>
                      <!-- StatusOutline -->
                      <div class="form-group col-md-12">
                        <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Status Outline :<font color="red">*</font></label>
                        <?php if (empty($record->acckaprodi)) {?> 
                          <select name="status" class="form-control" required="" onchange="mystatus(this)">
                            <option value="">Pilih</option>
                            <option value="Diterima">Outline Diterima</option>
                            <option value="Ditolak">Outline Ditolak</option>
                          </select>
                        <?php }else{?>
                          <select name="status" class="form-control" required="">
                            <?php if ($record->status_outline=="Diterima") {
                              echo '<option value="Diterima">Outline Diterima</option>';
                            }else{
                              echo '<option value="Ditolak">Outline Ditolak</option>';
                            } ?>
                          </select>
                        <?php }?>
                      </div>
                      <!-- Dospem Pilihan Mahasiswa-->
                      <div class="form-group col-md-6" id="dospem">
                        <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Dosen Pembimbing Pilihan Mahasiswa</label>
                        <?php $dosen=$this->Model->read_detail('noreg',$record->dospem,'dosen');?>
                        <input readonly="" required="" class="form-control" name="dospem" type="text" value="<?= '['.$dosen->noreg.'] '.$dosen->nama; ?>">
                      </div>
                      <div class="form-group col-md-6" id="dospems">
                        <label>&nbsp;&nbsp;</label>
                        <?php $dosens=$this->Model->read_detail('noreg',$record->dospems,'dosen');?>
                        <input readonly="" required="" class="form-control" name="dospems" type="text" value="<?= '['.$dosens->noreg.'] '.$dosens->nama; ?>">
                      </div>
                      <!-- Dospem -->
                      <div class="form-group col-md-12" id="dospemfix">
                        <span class="glyphicon glyphicon-user"></span><label>&nbsp;&nbsp;Dosen Pembimbing Yang Disetujui :</label>
                        <select name="dospemfix"  class="form-control">
                          <?php 
                          $cekdospem = $this->Model->read_detail('nim',$record->nim,'dospem');
                          if ($this->Model->read_where('id_dospem',$cekdospem->id,'log_book')) {
                                $dosen=$this->Model->read_detail('noreg',$record->dospemfix,'dosen');?>
                                <option value="<?= $record->dospemfix;?>" selected="">[<?= $dosen->noreg;?>] <?= $dosen->nama;?></option>
                          <?php }else{
                                  if (empty($record->dospemfix)) {?>
                                    <option value="" selected="">Pilih</option>
                                  <?php }else{ 
                                    $dosen=$this->Model->read_detail('noreg',$record->dospemfix,'dosen');?>
                                    <option value="<?= $record->dospemfix;?>" selected="">[<?= $dosen->noreg;?>] <?= $dosen->nama;?></option>
                                  <?php }
                                $dosens=$this->Model->read('dosen');
                                foreach ($dosens as $dosen) { ?>
                                  <option value="<?=$dosen['noreg']?>">[<?=$dosen['noreg']?>] <?=$dosen['nama']?></option>
                                <?php
                                }
                              }
                          ?>
                        </select>
                        <?php 
                        if ($cekdospem) {
                            if ($this->Model->read_where('id_dospem',$cekdospem->id,'log_book')) {
                            echo '<label>&nbsp;&nbsp;<font color="red">*Mahasiswa sudah melakukan bimbingan.</font></label>';
                            }
                        } ?>
                        
                      </div>

                      <!-- Proposal 1 -->
                      <div class="form-group col-md-6" id="pro1">
                        <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 1 :</label>
                        <br/>
                        <?php if (empty($record->upro1)) {?>
                        <a href="<?=base_url('uploads/outline/topik/'.$record->upro1)?>" class="btn btn-danger disabled btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline 1</a>
                        <?php }else{ ?>
                        <a href="<?=base_url('uploads/outline/topik/'.$record->upro1)?>" class="btn btn-success btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline 1</a>
                        <?php  } ?>
                      </div>

                      <!-- Proposal 2 -->
                      <div class="form-group col-md-6" id="pro2">
                        <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Proposal Outline 2 :</label>
                        <br/>
                        <?php if (empty($record->upro1)) {?>
                        <a href="<?=base_url('uploads/outline/topik/'.$record->upro2)?>" class="btn btn-danger disabled btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline 2</a>
                        <?php }else{ ?>
                        <a href="<?=base_url('uploads/outline/topik/'.$record->upro2)?>" class="btn btn-success btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline 2</a>
                        <?php  } ?>
                      </div>
                      
                      <!-- Topik -->
                      <div class="form-group col-md-12" id="topikfix">
                        <span class="glyphicon glyphicon-flag"></span><label>&nbsp;&nbsp;Topik Yang Disetujui :</label>
                        <?php if (empty($record->topikfix)) {?> 
                          <select name="topikfix" class="form-control">
                            <option value="">Pilih</option>
                            <option value="1"><?= $record->topik1; ?></option>
                            <option value="2"><?= $record->topik2; ?></option>
                          </select>
                        <?php }else{ ?>
                          <textarea readonly="" rows="2" class="form-control" name="topikfix"><?=$record->topikfix?></textarea>
                        <?php }?>
                      </div>
                      <!-- Komentar -->
                      <div class="form-group col-md-12" id="komentar">
                        <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Komentar Outline :</label> <font color="red">*jika terdapat komentar mengenai outline</font>
                        <textarea rows="3" class="form-control" placeholder="Boleh dikosongkan..." name="komentar"><?= $record->komentar;?></textarea>
                      </div>
                      <!-- Revisi -->
                      <div class="form-group col-md-12" id="catatan">
                        <div class="checkbox" style="margin-top: 0;margin-bottom: 0;">
                          <label>
                            <input type="checkbox" name="revisi" value="revisi" onchange="edit()" <?=($record->revisi ? 'checked' : '')?>> <strong>Catatan Revisi Outline</strong> <font color="red">*jika terdapat revisi pada outline</font>
                          </label>
                        </div>
                        <textarea readonly="" rows="3" class="form-control" id="editcatatan" name="catatan"><?= $record->catatan;?></textarea>
                      </div>

                      <div class="form-group col-md-3"></div>
                      <div class="form-group col-md-3">
                        <input onclick="return confirm('Apakah anda yakin?');" type="submit" name="submit" value="
                        <?php if (empty($record->acckaprodi)) { echo 'Approve';}else{echo 'Update';}?>" class="btn btn-primary btn-block">
                      </div>
                      <div class="form-group col-md-3">
                        <a href="<?= base_url('Kaprodi/status_outline/')?>" class="btn btn-default btn-block">Kembali</a>
                      </div>
                      <div class="form-group col-md-3"></div>
                      
                    </form>
                  </div>
                  <div class="col-md-12">
                  <legend></legend>
                      <br>
                      <legend>Revisi Outline <font color="red" size="4">*outline revisi mahasiswa</font></legend>
                  <form action="<?php echo base_url('Kaprodi/revisi_outline/'.$record->nim); ?>" method="POST">
                    <!-- nama -->
                    <div class="form-group col-md-12" id="status">
                      <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Status</label>
                      <input readonly="" required="" class="form-control" name="nama" type="text" placeholder="Masukan Nama" value="<?php if (empty($record->revisi)) {
                        echo 'Tidak terdapat revisi';
                      }else{
                        echo 'Terdapat revisi';
                        } ?>">
                    </div>
                    <!-- Judul Revisi -->
                    <div class="form-group col-md-12" id="judulrevisi">
                      <span class="glyphicon glyphicon-pencil"></span><label>&nbsp;&nbsp;Judul Outline Revisi</label>
                      <textarea readonly="" rows="2" class="form-control" name="judul_revisi"><?php if (empty($record->judul_revisi)) {
                        echo "-";
                      }else{
                        echo $record->judul_revisi;
                      } ?>
                      </textarea>
                    </div>
                    <!-- Proposal Revisi -->
                    <div class="form-group col-md-6" id="prorevisi">
                      <span class="glyphicon glyphicon-open-file"></span><label>&nbsp;&nbsp;Proposal Revisi</label>
                      <br/>
                      <?php if (!empty($record->outline_revisi)) { ?>
                        <a href="<?=base_url('uploads/outline/topik/'.$record->outline_revisi)?>" class="btn btn-success btn-block" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Proposal Revisi</a>
                      <?php }else{ ?>
                        <a class="btn btn-warning disabled btn-block"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Proposal Revisi</a>
                      <?php } ?>
                    </div>

                    <div class="form-group col-md-6" id="btnapproved">
                      <label>&nbsp;&nbsp;</label>
                      <br/>
                      <?php if (!empty($record->revisi)) { ?>
                        <button type="submit" class="btn btn-primary btn-block">
                          <i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Approve Revisi
                        </button>

                      <?php }else{ ?>
                        <a class="btn btn-warning disabled btn-block"><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;Approve Revisi</a>
                      <?php } ?>
                    </div>
                  </form>
                    <!-- Row End -->
                  </div>
                </div>
                
                <div class="row col-md-12">
                  <hr>
                  <p><font color="red">*</font>Required</p>
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
              <span class="glyphicon glyphicon-tasks"></span><h3 class="box-title">&nbsp;&nbsp;List Dosen Pembimbing</h3>
              <input type="hidden" name="upload_gambar">
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Dosen Pembimbing</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $dosens = $this->Model->read('dosen');
                      $no1=1;
                      foreach ($dosens as $dosen) { ?>
                      <tr>
                        <td><?= $no1;?></td>
                        <td><?= '['.$dosen['noreg'].']<br> '.$dosen['nama'];?></td>
                        
                        <td align="center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm<?= $dosen['noreg']?>"><?= $this->Model->widget_dospem_mahasiswa($dosen['noreg']); ?></button>
                          
                        </td>
                        <div class="modal fade bs-example-modal-sm<?= $dosen['noreg']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">List Mahasiswa Bimbingan</h4>
                              </div>
                              <div class="modal-body">
                              <?php $mahasiswas=$this->Model->list_mahasiswaskripsi($dosen['noreg']); ?>
                                <div class="form-group col-md-12">
                                  <label>&nbsp;&nbsp;</label>
                                  <textarea readonly="" rows="5" class="form-control"><?php if (!empty($mahasiswas)) {
                                    foreach ($mahasiswas as $mahasiswa) {
                                      if ($this->Model->read_detail_dual('nim',$mahasiswa['nim'],'status','proses','judul_skripsi')) {
                                        echo "[".$mahasiswa['nim']."] ".$mahasiswa['nama_mhs']."\n";
                                      }
                                    }
                                  } ?></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </tr>
                      <?php
                      $no1++; }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Dosen Pembimbing</th>
                        <th>Total</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              <!-- /.box-body -->
              </div>
            <!-- Box Primary end -->
            </div>
            <!-- Col End -->
            
            <div class="box-footer" align="center">
              
            </div>
          </div>
          <!-- Form Upload Persyartan end -->
        </div>
      </div>
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
      $("#example1").DataTable({
        "lengthMenu": [ 5, 10, 25, 50, 100 ]
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
