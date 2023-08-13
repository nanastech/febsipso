  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <script type="text/javascript">
     function pilihrole(sel){
      var value = sel.value;  
      if (value=="mahasiswa") {
         document.getElementById("username").style.display = "initial";
         document.getElementById("password").style.display = "initial";
         document.getElementById("nama").style.display = "initial";
         document.getElementById("prodi").style.display = "initial";
         document.getElementById("status").style.display = "initial";
      }else if(value=="dosen"){
         document.getElementById("username").style.display = "initial";
         document.getElementById("password").style.display = "initial";
         document.getElementById("nama").style.display = "initial";
         document.getElementById("prodi").style.display = "none";
         document.getElementById("status").style.display = "initial";
      }else if(value=="kaprodi"){
         document.getElementById("username").style.display = "initial";
         document.getElementById("password").style.display = "initial";
         document.getElementById("nama").style.display = "initial";
         document.getElementById("prodi").style.display = "initial";
         document.getElementById("status").style.display = "initial"; 
      }else if(value=="staff"){
         document.getElementById("username").style.display = "initial";
         document.getElementById("password").style.display = "initial";
         document.getElementById("nama").style.display = "initial";
         document.getElementById("prodi").style.display = "none";
         document.getElementById("status").style.display = "initial";
      }else{
         document.getElementById("username").style.display = "none";
         document.getElementById("password").style.display = "none";
         document.getElementById("nama").style.display = "none";
         document.getElementById("prodi").style.display = "none";
         document.getElementById("status").style.display = "none";
      }
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
<?php $this->load->view('staff/layout/top'); ?>	
<?php $this->load->view('staff/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Akun
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url(); ?>Staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Akun</a></li>
        <li class="active">Daftar Akun</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= $notification; ?>
      <?= form_error('username');?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pendaftaran Akun</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" action="<?= base_url('Staff/create_akun/'); ?>" method="POST">
              <div class="box-body">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label for="inputnama">Role :</label>
                    <select name="role" class="form-control" required="" onchange="pilihrole(this)">
                      <option value="">-- Pilih Role --</option>
                      <option value="mahasiswa">Mahasiswa</option>
                      <option value="dosen">Dosen</option>
                      <option value="kaprodi">Kepala Program Studi</option>
                      <option value="staff">Subag LAA</option>
                    </select>
                  </div>
                  <div class="form-grup" id="username" style="display: none;">
                    <label for="inputnama">Username :</label>
                    <input type="text" class="form-control" id="inputusername" name="username" placeholder="Masukan NIM / No.Reg" required="">
                  </div>
                  <div class="form-grup" id="password" style="display: none;">
                    <label for="inputnama">Password :</label>
                    <input type="password" class="form-control" id="inputpass" name="password" placeholder="Masukan Password" required="">
                  </div>
                  <div class="form-grup" id="nama" style="display: none;">
                    <label for="inputnama">Nama Lengkap :</label>
                    <input type="text" class="form-control" id="inputnama" name="nama" placeholder="Masukan Nama Lengkap" required="">
                  </div>
                  <div class="form-grup" id="prodi" style="display: none;">
                    <label for="inputnama">Program Studi :</label>
                    <select name="prodi" class="form-control">
                      <option value="">-- Pilih Program Studi --</option>
                      <option value="DAK">D3 Akuntansi</option>
                      <option value="DKP">D3 Keuangan & Perbankan</option>
                      <option value="SA">S1 Akuntasi</option>
                      <option value="SM">S1 Manajemen</option>
                      <option value="EKS">S1 Ekonomi Syariah</option>
                      <option value="UM">Umum</option>
                    </select>
                  </div>
                  
                  <div class="form-grup" id="status" style="display: none;">
                    <label for="inputnama">Status Akun:</label>
                    <select name="status" class="form-control" required="">
                      <option value="">-- Pilih Status Akun --</option>
                      <option value="1" selected="">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" align="center">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-warning" value="Reset">
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Daftar Akun SIPSO</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Prodi</th>
                    <th>Tanggal Buat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $users = $this->Model->read_orderby1('users','id','DESC');
                  $no1=1;
                  foreach ($users as $user) { ?>
                  <tr>
                    <td><?= $no1;?></td>
                    <td><?= $user['username'];?></td>
                    <td><?= $user['name'];?></td>
                    <td><?= $user['role'];?></td>
                    <td><?= $user['prodi'];?></td>
                    <td><?= $user['created_at'];?></td>
                    <td><?php 
                    if ($user['status']=='1') {
                      echo "Aktif";
                    }else{
                      echo "Non Aktif";
                    }
                    ?></td>
                    <td align="center">
                    <?php 
                      if ($user['role']=='superadmin') {
                        # code...
                      }else{
                    ?>
                      <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditModal<?=$user['username']?>">Edit</button>&nbsp; |&nbsp;
                      <a type="button" href="<?= base_url('Staff/delete_akun/'.$user['username']); ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs">Delete</a>
                    <?php 
                      }
                    ?>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="EditModal<?=$user['username']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #3c8dbc;color: white;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data User <?=$user['username']?></h4>
                          </div>
                          <div class="modal-body">
                            <form action="<?= base_url('Staff/update_akun/'.$user['username']); ?>" method="POST">
                              <div class="form-grup">
                                <label for="inputnama">Username :</label>
                                <input type="text" class="form-control" id="inputnama" name="username" placeholder="Masukan NIM / No.Reg" required=""<?php if ($user['role']=='kaprodi') {
                                  echo "readonly=''";
                                }?> value="<?=$user['username']?>">
                              </div>
                              <div class="form-grup">
                                <label for="inputnama">Password :</label>
                                <input type="password" class="form-control" id="inputnama" name="password" placeholder="*****" value="">
                              </div>
                              <div class="form-grup">
                                <label for="inputnama">Nama Lengkap :</label>
                                <input type="text" class="form-control" id="inputnama" name="nama" placeholder="Masukan Nama Lengkap" required="" value="<?=$user['name']?>">
                              </div>
                              <div class="form-grup">
                                <label for="inputnama">Program Studi :</label>
                                <select name="prodi" class="form-control" required="">
                                  <?php if ($user['role']=='kaprodi') {
                                    if ($user['prodi']=='DAK') {
                                      echo '<option value="DAK" selected="selected">D3 Akuntansi</option>';
                                    }elseif ($user['prodi']=='DKP') {
                                      echo '<option value="DKP" selected="selected">D3 Keuangan & Perbankan</option>';
                                    }elseif ($user['prodi']=='SA') {
                                      echo '<option value="SA" selected="selected">S1 Akuntasi</option>';
                                    }elseif ($user['prodi']=='SM') {
                                      echo '<option value="M" selected="selected">S1 Manajemen</option>';
                                    }elseif ($user['prodi']=='EKS') {
                                      echo '<option value="EKS" selected="selected">S1 Ekonomi Syariah</option>';
                                    }else{
                                      echo '<option value="UM" selected="selected">Umum</option>';
                                    }
                                  }else{?>
                                    <option value="">-- Pilih Program Studi --</option>
                                    <option value="DAK"<?php if($user['prodi']=='DAK') echo 'selected="selected"';?>>D3 Akuntansi</option>
                                    <option value="DKP"<?php if($user['prodi']=='DKP') echo 'selected="selected"';?>>D3 Keuangan & Perbankan</option>
                                    <option value="SAK"<?php if($user['prodi']=='SA') echo 'selected="selected"';?>>S1 Akuntasi</option>
                                    <option value="SM"<?php if($user['prodi']=='SM') echo 'selected="selected"';?>>S1 Manajemen</option>
                                    <option value="EKS"<?php if($user['prodi']=='EKS') echo 'selected="selected"';?>>S1 Ekonomi Syariah</option>
                                    <option value="UM" <?php if($user['prodi']=='UM') echo 'selected="selected"';?>>Umum</option>
                                  <?php }
                                  ?>
                                </select>
                              </div>
                              <div class="form-grup">
                                <label for="inputnama">Role :</label>
                                <input type="text" class="form-control" id="inputnama" name="role" required="" value="<?= $user['role']?>" readonly=""> 
                                
                              </div>
                              <div class="form-grup">
                                <label for="inputnama">Status Akun:</label>
                                <select name="status" class="form-control" required="">
                                  <option value="">-- Pilih Status Akun --</option>
                                  <option value="1" <?php if($user['status']=='1') echo 'selected="selected"';?>>Aktif</option>
                                  <option value="0" <?php if($user['status']=='0') echo 'selected="selected"';?>>Tidak Aktif</option>
                                </select>
                              </div>
                            </div>
                          

                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save changes">
                          </form>
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
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Prodi</th>
                  <th>Tanggal Buat</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('staff/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->
<?php $this->load->view('staff/layout/footer'); ?>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
  <script>
    var dashboard = document.getElementById("dashboard");
    var treedata = document.getElementById("treedata");
    var daftar_akun = document.getElementById("daftar_akun");
    var daftar_mhs = document.getElementById("daftar_mhs");
    var daftar_dsn = document.getElementById("daftar_dsn");
    // var daftar_pa = document.getElementById("daftar_pa");
    // var daftar_dospem = document.getElementById("daftar_dospem");
    // var daftar_kaprodi = document.getElementById("daftar_kaprodi");
    function clear_menu(){
      dashboard.className = "";
      treedata.className = "treeview";
      daftar_akun.className = "";
      daftar_mhs.className = "";
      daftar_dsn.className = "";
      // daftar_pa.className = "";
      // daftar_dospem.className = "";
      // daftar_kaprodi.className = "";
    }

    clear_menu();
    treedata.className = "treeview active";
    daftar_akun.className = "active";

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
