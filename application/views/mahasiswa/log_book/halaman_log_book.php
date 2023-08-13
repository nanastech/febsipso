<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Log Book</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="icon" href="https://portal.perbanas.id/images/favicon.ico" type="image/ico">
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
  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
    /* written by riliwan balogun http://www.facebook.com/riliwan.rabo*/
    .board{
    height: 500px;
    background: #fff;
    /*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
    }
    .board .nav-tabs {
        position: relative;
        /* border-bottom: 0; */
        /* width: 80%; */
        margin: 40px auto;
        margin-bottom: 0;
        box-sizing: border-box;

    }

    .board > div.board-inner{
        background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
        background-size: 30%;
    }

    p.narrow{
        width: 60%;
        margin: 10px auto;
    }

    .liner{
        height: 2px;
        background: #ddd;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: #555555;
        cursor: default;
        /* background-color: #ffffff; */
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tabs{
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: white;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }

    span.round-tabs.one{
        color: #999;border: 2px solid #999;
    }

    li.active span.round-tabs.one{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #999;
    }

    span.round-tabs.two{
        color: #febe29;border: 2px solid #febe29;
    }

    li.active span.round-tabs.two{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #febe29;
    }

    span.round-tabs.three{
        color: #3e5e9a;border: 2px solid #3e5e9a;
    }

    li.active span.round-tabs.three{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #3e5e9a;
    }

    span.round-tabs.four{
        color: #f1685e;border: 2px solid #f1685e;
    }

    li.active span.round-tabs.four{
        background: #fff !important;
        border: 2px solid #ddd;
        color: #f1685e;
    }

    span.round-tabs.five{
        
        color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
    }

    li.active span.round-tabs.five{
        background: #fff !important;
        border: 2px solid #ddd;
        color: rgb(34, 194, 34);
    }

    .nav-tabs > li.active > a span.round-tabs{
        background: #fafafa;
    }
    .nav-tabs > li {
        width: 20%;
    }
    /*li.active:before {
        content: " ";
        position: absolute;
        left: 45%;
        opacity:0;
        margin: 0 auto;
        bottom: -2px;
        border: 10px solid transparent;
        border-bottom-color: #fff;
        z-index: 1;
        transition:0.2s ease-in-out;
    }*/
    li:after {
        content: " ";
        position: absolute;
        left: 45%;
       opacity:0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #ddd;
        transition:0.1s ease-in-out;
        
    }
    li.active:after {
        content: " ";
        position: absolute;
        left: 45%;
       opacity:1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #ddd;
        
    }
    .nav-tabs > li a{
       width: 70px;
       height: 70px;
       margin: 20px auto;
       border-radius: 100%;
       padding: 0;
    }

    .nav-tabs > li a:hover{
        background: transparent;
    }

    .tab-content{
    }
    .tab-pane{
       position: relative;
    padding-top: 20px;
    }
    .tab-content .head{
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 25px;
        text-transform: uppercase;
        padding-bottom: 10px;
    }
    .btn-outline-rounded{
        padding: 10px 40px;
        margin: 20px 0;
        border: 2px solid transparent;
        border-radius: 25px;
    }

    .btn.green{
        background-color:#5cb85c;
        /*border: 2px solid #5cb85c;*/
        color: #ffffff;
    }



    @media( max-width : 585px ){
        
        .board {
    width: 90%;
    height:auto !important;
    }
        span.round-tabs {
            font-size:16px;
    width: 50px;
    height: 50px;
    line-height: 50px;
        }
        .tab-content .head{
            font-size:20px;
            }
        .nav-tabs > li a {
    width: 50px;
    height: 50px;
    line-height:50px;
    }

    li.active:after {
    content: " ";
    position: absolute;
    left: 35%;
    }

    .btn-outline-rounded {
        padding:12px 20px;
        }
    }
  </style>
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
        Log Book
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>Mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Log Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Modal -->
         <div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg" role="document">
             <div class="modal-content">
              
               <div class="modal-body ">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                      <ul class="nav nav-tabs" id="myTab">
                        <div class="liner"></div>
                        <li class="active">
                          <a href="#home" data-toggle="tab" title="welcome">
                            <span class="round-tabs one">
                              <label>1</label>
                            </span> 
                          </a>
                        </li>

                        <li>
                          <a href="#profile" data-toggle="tab" title="profile">
                            <span class="round-tabs two">
                              <label>2</label>
                            </span> 
                          </a>
                        </li>
             
                        <li>
                          <a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                            <span class="round-tabs three">
                              <label>3</label>
                            </span>
                          </a>
                        </li>

                        <li>
                          <a href="#settings" data-toggle="tab" title="blah blah">
                            <span class="round-tabs four">
                              <label>4</label>
                            </span> 
                          </a>
                        </li>

                        <li>
                          <a href="#doner" data-toggle="tab" title="completed">
                            <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                            </span>
                          </a>
                        </li>
                 
                      </ul>
                    </div>

                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="home">

                        <h3 class="head text-center">Menambahkan Bimbingan</h3>
                              
                        <div class="col-md-12" align="center">
                          <img src="<?php echo base_url('uploads/img/log_book/1.png'); ?>" style="max-width:70%;max-height:70%;">
                        </div>
                  
                    

                        <p class="narrow text-center">
                          Sebelum melakukan bimbingan, mahasiswa bimbingan mengisi terlebih dahulu Uraian bimbingan pada tombol 'Bimbingan'.
                        </p>
                        
                        
                      </div>

                      <div class="tab-pane fade" id="profile">
                        <h3 class="head text-center">Bertemu Dosen Pembimbing</h3>

                        <div class="col-md-12" align="center">
                          <img src="<?php echo base_url('uploads/img/log_book/meet.png'); ?>" style="max-width:30%;max-height:30%;">
                        </div>
                        <p class="narrow text-center">
                          Mahasiswa bimbingan bertemu dengan dosen pembimbing untuk melakukan bimbingan yang sudah disepakati bersama. Bimbingan berlangsung secara tatap muka.
                        </p>
                        
                      </div>

                      <div class="tab-pane fade" id="messages">
                        <h3 class="head text-center">Status bimbingan tervalidasi</h3>
                        <div class="col-md-12" align="center">
                          <img src="<?php echo base_url('uploads/img/log_book/3.png'); ?>" style="max-width:60%;max-height:60%;">
                        </div>
                        <p class="narrow text-center">
                          Mahasiswa bimbingan tidak bisa menambah bimbingan lagi jika status bimbingan belum tervalidasi oleh dosen pembimbing. Mahasiswa bimbingan dimohon menghubungi dosen pembimbing untuk meminta validasi status bimbingan.
                        </p>
                        
                      </div>

                      <div class="tab-pane fade" id="settings">
                        <h3 class="head text-center">Update Uraian Bimbingan Sebelum Tervalidasi</h3>
                        <div class="col-md-12" align="center">
                          <img src="<?php echo base_url('uploads/img/log_book/4.png'); ?>" style="max-width:70%;max-height:70%;">
                        </div>
                        <p class="narrow text-center">
                          Mahasiswa bimbingan dapat mengubah uraian bimbingan pada tombol 'Edit' sebelum divalidasi oleh dosen pembimbing.
                        </p>
                      </div>

                      <div class="tab-pane fade" id="doner">
                        <div class="text-center">
                          <i class="img-intro icon-checkmark-circle"></i>
                        </div>
                        <h3 class="head text-center">Lakukan Bimbingan Sampai Batas Minimal 8</h3>
                        <div class="col-md-12" align="center">
                          <img src="<?php echo base_url('uploads/img/log_book/5.png'); ?>" style="max-width:70%;max-height:70%;">
                        </div>
                        <p class="narrow text-center">
                          Total bimbingan minimal 8 untuk dapat melakukan pendaftaran sidang pada menu 'pendaftaran sidang'.
                        </p>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                  </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
             </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
         </div><!-- /.modal -->
    <?php echo $notification; ?>
    <?php 
      $cek_outline = $this->Model->read_detail_tri('nim',$this->session->userdata('username'),'status_outline','Diterima','revisi','','outline');
      $cek_dospem=$this->Model->read_detail('nim',$this->session->userdata('username'),'dospem');
        if (empty($cek_outline)) { ?>
          <!-- Jika outline belum diterima -->
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Tidak Mengisi Form Bimbingan!</h4>
            Maaf, anda tidak bisa mengisi formulir bimbingan dikarenakan outline belum diterima/direvisi!
          </div>
        <?php }elseif(empty($cek_dospem->noreg)||empty($cek_outline->topikfix)){?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Tidak Mengisi Form Bimbingan!</h4>
              Maaf, pembimbing dan judul skripsi anda belum ditentukan oleh kepala program studi.
            </div>
        <?php }else{?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List Log Book Bimbingan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <br/>
              <?php $dospem=$this->Model->read_detail('nim',$this->session->userdata('username'),'dospem');
              $dosen = $this->Model->read_detail('noreg',$dospem->noreg,'dosen');
              $outline = $this->Model->read_detail('nim',$this->session->userdata('username'),'outline');
              ?>
              <div class="col-md-12">
                <div class="row">
                
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="fa fa-mortar-board"></span><label>&nbsp;&nbsp;Mahasiswa</label>
                      <input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Mahasiswa" value="<?='['.$this->session->userdata('username').'] '.$this->session->userdata('name');?>">
                    </div>

                    <div class="form-group">
                      <span class="fa fa-book"></span><label>&nbsp;&nbsp;Judul Skripsi&nbsp;&nbsp;<a class="btn btn-primary btn-xs" href="<?=base_url('Mahasiswa/ganti_judul/')?>"><span class="fa fa-repeat"></span>&nbsp;&nbsp;Ganti Judul</a></label>
                      <textarea name="judul" class="form-control" rows="3" readonly=""><?=$outline->topikfix;?></textarea>
                    </div>
                   
                    <div class="form-group">
                      <span class="fa fa-download"></span><label>&nbsp;&nbsp;Outline Skripsi</label>
                      <?php if (empty($outline->outline_fix)) {?>
                        <a href="<?=base_url('uploads/'.$outline->outline_fix)?>" class="form-control btn btn-danger disabled" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                      <?php }else{ ?>
                          <a href="<?=base_url('uploads/'.$outline->outline_fix)?>" class="form-control btn btn-success" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i>&nbsp;&nbsp;Tampilkan Outline</a>
                      <?php  } ?>
                    </div>

                  </div>
                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <span class="fa fa-envelope"></span><label>&nbsp;&nbsp;Nomor Surat</label>
                      <input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Mahasiswa" value="<?php if (!empty($outline->no_surat)) {
                        echo $outline->no_surat;
                      }else{
                        echo "-";
                        } ;?>">
                    </div>
                    <div class="form-group" align="center">
                      <img src="<?php echo base_url('uploads/img/logofull.png'); ?>" style="max-width: 320px;" class="form-group col-md-12">
                    </div>
                  </div>
                  
                  <div class=" col-md-4">
                    <div class="form-group">

                      <span class="fa fa-briefcase"></span><label>&nbsp;&nbsp;Dosen Pembimbing</label>
                      <input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Mahasiswa" value="<?='['.$dosen->noreg.'] '.$dosen->nama;?>">
                    </div>
                    <div class="form-group" style="margin-bottom: 0px;">
                      <span class="fa fa-briefcase"></span><label>&nbsp;&nbsp;Total Bimbingan</label>
                    </div>
                    <label style="font-size: 110px;"><strong><?= $this->Model->bimbingan($dospem->id)?></strong></label> 
                    
                  </div>
                </div>  
                <br/>
                <div class="row">
                  <div class="form-group col-md-4">

                  <?php 
                  $cek=$this->Model->read_where('id_dospem',$dospem->id,'log_book');
                  if (!empty($cek)) {
                    if ($this->Model->cek_belum_tervalidasi($dospem->id)>0) {?>
                      <button class="btn btn-warning" style="cursor:not-allowed" data-toggle="modal" data-target=".bs-example-modal-sm_info"><span class="fa fa-plus"></span>&nbsp;&nbsp;Bimbingan</button>
                    <?php }else{ ?>
                       <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm_tambah"><span class="fa fa-plus"></span>&nbsp;&nbsp;Bimbingan</button>
                    <?php }
                  }else{ ?>
                     <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm_tambah"><span class="fa fa-plus"></span>&nbsp;&nbsp;Bimbingan</button>
                  <?php }
                  ?>
                  </div>
                  <div class="col-md-4"></div>
                  <div class="col-md-4" align="right"><a target="_blank" class="btn btn-danger" href="<?= base_url('mahasiswa/cetak_logbook')?>"><span class="fa fa-file-pdf-o"></span>&nbsp;&nbsp;Cetak Log Book</a></div>
                </div>
                <!-- Small modal -->
                <div class="modal fade bs-example-modal-sm_info" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Peringatan!</h4>
                      </div>
                      <div class="modal-body">
                        <p>Untuk menambahkan bimbingan diharuskan tervalidasi semuanya oleh dosen pembimbing terlebih dahulu.  Harap menghubungi dosen pembimbing bersangkutan untuk meminta validasi.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Small modal -->
                <div class="modal fade bs-example-modal-sm_tambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Bimbingan</h4>
                      </div>
                      <form action="<?= base_url('Mahasiswa/tambah_bimbingan/')?>" method="POST">
                      <div class="modal-body col-md-12">
                        <div class="form-group col-md-12">
                          <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Uraian Bimbingan:</label>
                          <textarea class="form-control" name="topik" rows="3" required=""></textarea>
                          <input type="hidden" name="iddospem" value="<?= $dospem->id;?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="submit" name="" class="btn btn-primary" value="Submit">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>              
              </div>
              <div class="col-md-12">
                <table class="table table-hover">
                  <tr>
                    <th style="width: 40px;">#</th>
                    <th style="width: 180px;">Tanggal</th>
                    <th style="width: 450px; ">Uraian Bimbingan (Mahasiswa)</th>
                    <th> </th>
                    <th style="width: 450px; ">Catatan Pembimbing (Pembimbing)</th>
                    <th style="text-align: center; width: 160px;">Dosen Pembimbing</th>
                  </tr>
                  <?php $bimbingans=$this->Model->read_where('id_dospem',$dospem->id,'log_book');
                  $no=1;
                  if (empty($bimbingans)) { ?>
                    <tr align="center">
                      <td colspan="4"><strong class="label label-danger">Data Kosong</strong></td>
                    </tr>
                  <?php }else{
                    foreach ($bimbingans as $bimbingan) { ?>
                    <tr>
                      <td><?= $no;?></td>
                      <td> <?= indonesian_date(strtotime($bimbingan['tanggal']),'l, d-m-Y','');?> </td>
                      <td><?= $bimbingan['topik'];?><br><?php if (!empty($bimbingan['lu_topik'])) {
                        echo '<small class="pull-right"><i>last updated: '.indonesian_date(strtotime($bimbingan['lu_topik']),'d-m-Y H:i:s','').'</i></small>';
                      } ?></td>
                      <td><?php if (empty($bimbingan['accdospem'])) { ?>
                        <button class="btn btn-warning " data-toggle="modal" data-target=".bs-example-modal-sm<?= $bimbingan['id'] ?>"><span class="fa fa-plus"></span>&nbsp;&nbsp;Edit</button>
                      <?php } ?></td>
                        <!-- Small modal -->
                        <div class="modal fade bs-example-modal-sm<?= $bimbingan['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Bimbingan</h4>
                              </div>
                              <form action="<?= base_url('Mahasiswa/update_bimbingan/'.$bimbingan['id'])?>" method="POST">
                              <div class="modal-body col-md-12">
                                <div class="form-group col-md-12">
                                  <span class="fa fa-check-circle-o"></span><label>&nbsp;&nbsp;Uraian Bimbingan:</label>
                                  <textarea class="form-control" name="topik" rows="3" required=""><?= $bimbingan['topik'];?></textarea>
                                  <label>&nbsp;&nbsp;<font color="red">*Mengubah/ Menambahan dapat menghapus status validasi!</font></label>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" name="" class="btn btn-primary" value="Update">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      <td><?php if (empty($bimbingan['catatan'])) {
                        echo "-";
                      }else{
                        echo $bimbingan['catatan'].'<br><small class="pull-right"><i>last updated: '.indonesian_date(strtotime($bimbingan['lu_catatan']),'d-m-Y H:i:s','').'</i></small>';
                        } ?></td>  
                      <td align="center">
                        <?php
                        if (empty($bimbingan['accdospem'])) { ?>
                          <a class="btn btn-primary disabled">Validate</a>
                        <?php }else{ ?>
                          <a class="btn btn-success disabled">Validated</a>
                          <br>
                        <?php
                          echo '<small class="pull-right"><i>'.indonesian_date(strtotime($bimbingan['tglaccdospem']),'d-m-Y H:i:s','').'</i></small>';
                         }
                        ?>
                      </td>
                    </tr>
                  <?php
                  $no++;
                    }  
                  }
                  ?>
                  
                </table>
              </div>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- Default box -->
      <?php }?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('mahasiswa/layout/bot'); ?>

<!--======================================================================================-->
 </div>
<!-- ./wrapper -->

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
<!-- page script -->
<script>
  var dashboard = document.getElementById("dashboard");
  var treedaftar = document.getElementById("treedaftar");
  var formulir = document.getElementById("formulir");
  var statusform = document.getElementById("statusform");
  // var daftar_pa = document.getElementById("daftar_pa");
  // var daftar_dospem = document.getElementById("daftar_dospem");
  // var daftar_kaprodi = document.getElementById("daftar_kaprodi");
  var log_book = document.getElementById("log_book");
  function clear_menu(){
    dashboard.className = "";
    treedaftar.className = "treeview";
    formulir.className = "";
    statusform.className = "";
    // daftar_pa.className = "";
    // daftar_dospem.className = "";
    // daftar_kaprodi.className = "";
    log_book.className='';
  }

  clear_menu();
  log_book.className = "active";

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

<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {
   $('#info').modal({
    show: true,
   });
  $('html').niceScroll({
         // Do not hide scrollbar when mouse out
    cursorborderradius: '10px', // Scroll cursor radius
    background: '#E5E9E7',     // The scrollbar rail color
    cursorwidth: '10px',       // Scroll cursor width
    cursorcolor: '#00a65a'     // Scroll cursor color
  });
});
</script>
</body>
</html>
