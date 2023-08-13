<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Revisi Sidang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="<?=base_url()?>/uploads/img/fti.ico" type="image/ico">

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
  <!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
<?php $this->load->view('mahasiswa/layout/top'); ?>	
<?php $this->load->view('mahasiswa/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	Revisi Sidang
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>superadmin/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sidang Skripsi</a></li>
        <li class="active">Revisi Sidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php echo $notification; ?>
    <?php echo form_error('file_revisi');?>
    <?php echo form_error('judul_revisi');?>
      <?php 
        $revisis=$this->Model->read_where('nim',$this->session->userdata('username'),'penilaian'); 
        if (!$this->Model->read_detail('nim',$this->session->userdata('username'),'daftar_sidang')) {?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Tidak Bisa Lihat Status Form!</h4>
            Maaf, Anda belum meng inputkan formulir pendaftaran sidang skripsi! 
          </div>
      <?php  }elseif(count($revisis)<3) {?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> Dewan Penguji Belum Menilai Keseluruhan!</h4>
          Silahkan tunggu penilaian dari dewan penguji! (<?=count($revisis)?>/3) 
        </div>
      <?php }else{?>

      
      <!-- BOX Succes -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Revisi </h3>
            </div>
            <div class="box-body table-responsive ">
              <div class="col-md-12">
                <legend><span class="fa fa-archive"></span>&nbsp;&nbsp;Upload Revisi Sidang</legend>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <form method="POST" action="<?php echo base_url('mahasiswa/revisi_sidang/'); ?>" enctype="multipart/form-data">
                    
                    <div class="form-group col-md-12">
                      <label>Judul Revisi :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-star"></i>
                        </div>
                        <textarea class="form-control" name="judul_revisi" rows="3" required=""></textarea>
                      </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group col-md-12">
                      <label>File Revisi :</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-file-text-o"></i>
                        </div>
                        <input required="" class="form-control" name="file_revisi" type="file" value="" accept=".pdf"> 
                      </div>
                      <!-- /.input group -->
                    </div>
                                        
                    <div class="form-group col-md-12">
                      <?php if ($this->Model->read_where_dual('nim',$this->session->userdata('username'),'accpenguji IS NULL',NULL,'penilaian')) {?>
                        <button type="submit" class="btn btn-primary form-control">
                          <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload
                        </button>
                      <?php }else{?>
                        <button type="button" class="btn btn-primary form-control" onclick="alert('Tidak Bisa Upload!. Karena Semua Revisi Telah DIAPPROVE Dewan Penguji')">
                          <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload
                        </button>
                      <?php } ?>
                    </div>
                  </form>
                </div>
                <div class="col-md-3"></div>
              </div>
              <div class="col-md-12">
                <legend><span class="fa fa-list-alt"></span>&nbsp;&nbsp;Daftar Revisi Sidang</legend>
                <table class="table table-condensed">
                  <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th style="width: 200px; text-align: center;">Batas Revisi</th>
                        <th style="width: 200px; text-align: center;">Penguji</th>
                        <th style="text-align: center;">Form Revisi</th>
                        <th style="width: 120px; text-align: center;">Total Revisi</th>
                        <th style="width: 120px; text-align: center;">Status Revisi</th>
                        <th style="width: 120px; text-align: center;">Nilai Akhir</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $jumlah_na=0;
                      if (!$revisis) {
                        echo '<tr>
                      <td colspan="7" style="text-align:center;"><i class="label bg-red">BELUM ADA NILAI MASUK</i></td>
                      </tr>';
                      }else{
                        $no=1;
                        foreach ($revisis as $id) {
                        $jumlah_na=$jumlah_na+$id['nilai_akhir'];
                        $dosen=$this->Model->read_detail('noreg',$id['penguji'],'dosen'); ?>
                        <tr>
                          <td style="vertical-align: middle;"><?=$no;?></td>
                          <td style="vertical-align: middle; "><?php if ($id['batas_revisi']) {
                            echo indonesian_date(strtotime($id['batas_revisi']),'l, d F Y','');
                          }else{
                            echo "-";
                            } ?></td>
                          <td style="vertical-align: middle; ">[<?=$id['penguji']?>]<br><?=$dosen->nama?></td>
                          <td style="vertical-align: middle;"> 
                            <button class="opener btn btn-default btn-block" data-id="#dialog<?=$id['id']?>">Revisi</button>
                            <div class="dialog" id="dialog<?=$id['id']?>" title="Revisi | [<?=$id['penguji']?>] <?=$dosen->nama?>">
                              <div class="form-group col-md-12">
                                <label>Judul Revisi:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-star"></i>
                                  </div>
                                  <textarea class="form-control" rows="3" readonly="" placeholder="Judul Revisi Masih Kosong"><?=$id['judul_revisi']?></textarea>
                                </div>
                                <!-- /.input group -->
                              </div>
                              <div class="form-group col-md-12">
                                <label>File Revisi:</label>
                                  <?php 
                                    if ($id['file_revisi']) {?>
                                      <a href="<?= base_url('uploads/revisi_sidang/'.$id['file_revisi']); ?>" target="_blank" class="btn btn-success btn-block"><span class="fa fa-archive"></span>&nbsp;&nbsp;Lihat File Revisi</a>
                                      <small class="pull-right"><i>Last Updated : <?=indonesian_date(strtotime($id['tgl_upload']),'l, d F Y H:i:s','');?></i></small>
                                    <?php }else{?>
                                      <button class="btn btn-warning btn-block disabled"><span class="fa fa-archive"></span>&nbsp;&nbsp;Lihat File Revisi</button>
                                    <?php }
                                  ?>
                                <!-- /.input group -->
                              </div>
                              <div class="form-group col-md-12">
                                <label>Catatan Revisi:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-commenting-o"></i>
                                  </div>
                                  <textarea class="form-control" rows="3" readonly="" placeholder="Catatan Revisi Pembimbing"><?=$id['catatan']?></textarea>
                                </div>
                                <!-- /.input group -->
                              </div>
                              <legend><span class="fa fa-tasks"></span>&nbsp;&nbsp;List Revisi</legend>
                              <div class="col-md-12">
                                 <?php $list_revisis=$this->Model->read_where_dual('nim',$this->session->userdata('username'),'penguji',$id['penguji'],'revisi_skripsi');
                                if ($list_revisis) { 
                                  $no2=1;?>
                                  
                                  <table border="1" width="100%" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px; text-align: center; vertical-align: middle;">NO</th>
                                            <th style="width: 450px; text-align: center; vertical-align: middle;">URAIAN</th>
                                            <th style="width: 300px; text-align: center; vertical-align: middle;">HALAMAN</th>
                                            <th style="width: 200px; text-align: center; vertical-align: middle;">PEMBIMBING</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($list_revisis as $list) {?>
                                          <tr>
                                              <td style="text-align: center;">
                                                <?= $no2;?>
                                              </td>
                                              <td>
                                                <?= nl2br($list['uraian']);?>
                                              </td>
                                              <td>
                                                <?= $list['halaman']?>
                                              </td>
                                              <td style="text-align: center;"><?php if ($list['accpenguji']) {
                                                echo '<button class="btn btn-success disabled"><span class="fa fa-check-square-o"></span>&nbsp;Approved</button>';
                                              }else{
                                                echo '<button class="btn btn-warning disabled"><span class="fa fa-minus-square-o"></span>&nbsp;Approve</button>';
                                              } ?>
                                              </td>
                                            </tr>
                                        <?php $no2++;} ?>
                                      </tbody>
                                  </table>
                                <?php }else{
                                  echo "<h3>Tidak Ada Revisi</h3>";
                                }
                              ?>
                              </div>
                            </div>
                          </td>
                          <td style="vertical-align: middle; text-align: center;">
                            <strong><?=$this->Model->jumlah_revisi_diterima($this->session->userdata('username'),$id['penguji'])?>/<?=$this->Model->total_revisi($this->session->userdata('username'),$id['penguji'])?></strong>
                          </td>
                          <td style="vertical-align: middle; text-align: center;"><?php if ($id['accpenguji']) {
                            echo '<button class="btn btn-success disabled"><span class="fa fa-check-square-o"></span>&nbsp;Approved</button>';
                          }else{
                            echo '<button class="btn btn-warning disabled"><span class="fa fa-minus-square-o"></span>&nbsp;Approve</button>';
                            } ?></td>


                          <td style="vertical-align: middle; text-align: center;"><?php if ($id['accpenguji']) {
                            echo $id['nilai_akhir'];
                          }else{
                            echo "-";
                            } ?></td>
                        </tr>
                    <?php $no++;
                      }//tutup loop
                    }//tutup iff?> 
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="5"></th>
                      <th>Nilai Akhir</th>
                      <th style="vertical-align: middle; text-align: center;">
                      	<?php if ($this->Model->read_where_dual('nim',$this->session->userdata('username'),'accpenguji IS NULL',NULL,'penilaian')) {
                        echo "-";
                      }else{?>
                        <?=number_format((float)$jumlah_na/($no-1), 2, '.', '')?>

                        <?php if ($jumlah_na>=90) {
                          echo "[A]";
                        }elseif ($jumlah_na>=80 && $jumlah_na<=89.99) {
                          echo "[A-]";
                        }elseif ($jumlah_na>=75 && $jumlah_na<=79.99) {
                          echo "[B+]";
                        }elseif ($jumlah_na>=70 && $jumlah_na<=74.99) {
                          echo "[B]";
                        }elseif ($jumlah_na>=65 && $jumlah_na<=69.99) {
                          echo "[B-]";
                        }elseif ($jumlah_na>=60 && $jumlah_na<=64.99) {
                          echo "[C+]";
                        }elseif ($jumlah_na>=55 && $jumlah_na<=59.99) {
                          echo "[C]";
                        }elseif ($jumlah_na<=54.99) {
                          echo "[TL]";
                        } ?>

                        <?php if ($jumlah_na>=56) {
                          echo " [LULUS]";
                        }else{
                          echo "[TIDAK LULUS]";
                          } ?>
                        
                      <?php } ?>
                      </th>
                    </tr>
                  </tfoot>
                </table>
                <script type="text/javascript">
                    $(".dialog").dialog({
                        autoOpen: false,
                        minWidth: 700,
                        maxHeight: 500,
                        position: { at: "center center" },
                        show:"slideDown",
                        hide:{ effect: 'explode', delay: 250, duration: 1000, easing: 'easeInQuad' }
                              });
                    $(".opener").click(function () {
                        var id = $(this).data('id');

                        $(id).dialog("open");
                    });
                </script>
              </div>
            	
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

<?php $this->load->view('mahasiswa/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

<!-- Menu -->
<script>
  var dashboard = document.getElementById("dashboard");
  var treedaftar = document.getElementById("treedaftar");
  var formulir = document.getElementById("formulir");
  var statusform = document.getElementById("revisisidang");
  
  function clear_menu(){
    dashboard.className = "";
    treedaftar.className = "treeview";
    formulir.className = "";
    statusform.className = "";
  }

  clear_menu();
  treedaftar.className = "treeview active";
  statusform.className = "active";

</script>

</body>
</html>
