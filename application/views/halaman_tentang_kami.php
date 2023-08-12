<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Pelaksanaan Skripsi Online Perbanas Institute</title>
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Material datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>

  <!-- <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
  <script type="text/javascript" src="<?= base_url(); ?>assets/bootstrap-material-design/dist/js/bootstrap-material-design.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/js/bootstrap-material-datetimepicker.js"></script>

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
<body class="hold-transition skin-blue layout-top-nav fixed" onload="setInterval('displayServerTime()', 1000);">
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
<div class="wrapper">
<?php $this->load->view('layout/top'); ?> 
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Tentang Kami
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
   <!--        <li><a href="#">Layout</a></li>-->
          <li class="active">Tentang Kami</li> 
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php echo $notification; ?>
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div>
        <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <div class="box box-default">
            <div class="box-header with-border">
              <span class="fa fa-gears"></span><h3 class="box-title">&nbsp;&nbsp;IT Boot Camp Batch I</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <img src="<?php echo base_url('uploads/img/'); ?>mhs/we2.jpg" style="max-width:100%;max-height:100%;" class="col-md-12">

                </div>
                <div class="col-md-12">
                  <br>
                </div>
                <div class="col-md-12">
                  <img src="<?php echo base_url('uploads/img/'); ?>mhs/we1.jpeg" style="max-width:100%;max-height:100%;" class="col-md-12">
                </div>
                <!-- End Col -->
              </div>
              <!-- Row End -->
            </div>
        </div>
        <!-- Box End -->
        <div class="box box-default">
          <div class="box-header with-border">
            <span class="glyphicon glyphicon-user"></span><h3 class="box-title">&nbsp;&nbsp;Dosen</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <!--  DEKAN -->
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/12.jpg') center center;">
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/yy.jpg" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Harya Widiputra</h3>
                                <h5 class="description-header"><strong>Dekan Fakultas Teknologi Informasi</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <!-- Ka.Lab IS and Design -->
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->

                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/8.jpg') center center;">
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/is.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Isnin Faried</h3>
                                <h5 class="description-header"><strong>Ka.Lab IS and Design</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- Ka.Lab Networking and Security -->
                <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/11.jpg') center center;">
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/mt.jpg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Ign Mantra</h3>
                                <h5 class="description-header"><strong>Ka.Lab Networking and Security</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                </div>
                <!--  KAPRODI TI -->
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/14.jpg') center center;">
                     
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/ly.jpg" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Lely Priska</h3>
                                <h5 class="description-header"><strong>Kaprodi Teknik Informatika</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <!-- SEKPRODI TI -->
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/2.jpg') center center;">
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/pd.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Dwi Atmodjo</h3>
                                <h5 class="description-header"><strong>Sekprodi Teknik Informatika</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- KAPRODI SI -->
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/10.jpg') center center;">
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/ag.jpg" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Agnes Novita Ida Safitri</h3>
                                <h5 class="description-header"><strong>Kaprodi Sistem Informasi</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>
                <!--  SEKPRODI SI -->
                <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/3.jpg') center center;">
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/el.jpeg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Elliana Gautama</h3>
                                <h5 class="description-header"><strong>Sekprodi Sistem Informasi</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                </div>
                <!-- Ka.Bag. LAA -->
                <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/13.jpg') center center;">
                          
                          
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>dos/mr.jpg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Martoyo Wisnhu Sasmita</h3>
                                <h5 class="description-header"><strong>Ka.Bag. LAA</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                </div>
              </div>
              <!-- End Col -->
            </div>
            <!-- Row End -->
          </div>
        </div>
        <!-- Box End -->
        
        <div class="box box-default">
          <div class="box-header with-border">
            <span class="fa fa-users"></span><h3 class="box-title">&nbsp;&nbsp;Team Developer</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
          </div>
          <div class="box-body">
             <div class="row">
               <div class="col-md-12">
          
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/15.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/i.jpg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Idham Mulya <br> 1313000005</h3>
                                <h5 class="widget-user-desc">Sistem Informasi</h5>
                                <h5 class="description-header"><strong>Project Manager</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                    <!-- /.widget-user -->
                  </div>
          
                  <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/18.jpg') center center;">
                            
                          </div>
                          <div class="widget-user-image">
                            <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/ir.jpeg" alt="User Avatar">
                          </div>
                          <div class="box-footer">
                            <div class="row">
                              <div class="col-sm-1 border-right">
                              </div>
                              <div class="col-sm-10 border-right" align="center">
                                <div class="description-block">
                                  <h3 class="widget-user-username">M. Irsan Anugrah<br>1313000013</h3>
                                  <h5 class="widget-user-desc">Sistem Informasi</h5>
                                  <h5 class="description-header"><strong>Project Manager</strong></h5>
                                  <span class="description-text"></span>
                                </div>
                                <!-- /.description-block -->
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                        </div>
                        <!-- /.widget-user -->
                  </div>
          
                  <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/doil.jpg') center center;">
                          <a href="http://unitdua.com/" target="_blank" style="color: white"><h5 class="description-header"><strong>Unitdua.com</strong></h5></a>
                          </div>
                          <div class="widget-user-image">
                            <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/do.png" alt="User Avatar">
                          </div>
                          <div class="box-footer">
                            <div class="row">

                              <div class="col-sm-1 border-right">
                              </div>
                              <div class="col-sm-10 border-right" align="center">
                                <div class="description-block">
                                   <h3 class="widget-user-username">Fadho'il Pamuji<br>1314000008</h3>
                                   <h5 class="widget-user-desc">Teknik Informatika</h5>
                                   <h5 class="description-header"><strong>Software Developer</strong></h5>
                                </div>
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                        </div>
                        <!-- /.widget-user -->
                  </div>
          
                  <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/16.jpg') center center;">
                         
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/al.jpeg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Ali Akbar<br>1314000007</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>Software Developer</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                  </div>  
          
                  <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/20.jpg') center center;">
                          
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/sq.jpeg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Shidqur Rachman<br>1314000012</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>Software Developer</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                  </div>

                  <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/21.jpg') center center;">
                          
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/rc.jpeg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Rachma Sari D<br>1314000013</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>Database Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                  </div>
          
                  <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/22.jpg') center center;">
                          
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/rs.jpeg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Rizka Amalia<br>1315000005</h3>
                                <h5 class="widget-user-desc">Sistem Komputer</h5>
                                <h5 class="description-header"><strong>Network Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                  </div>

                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/23.jpg') center center;">
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/fr.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Frandy Kurnianto<br>1315000003</h3>
                                <h5 class="widget-user-desc">Sistem Komputer</h5>
                                <h5 class="description-header"><strong>Network Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>

                  <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/24.png') center center;">
                          
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/st.jpeg" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Amadeus Satria P.H<br>1513000005</h3>
                                <h5 class="widget-user-desc">Sistem Informasi</h5>
                                <h5 class="description-header"><strong>System Designer</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                      </div>
                      <!-- /.widget-user -->
                  </div>
      
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/25.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/jn.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Jasmine Damayanti<br>1415000004</h3>
                                <h5 class="widget-user-desc">Sistem Komputer</h5>
                                <h5 class="description-header"><strong>Network Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/26.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/de.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Anissa Dea Tachry <br>1513000024</br></h3>
                                <h5 class="widget-user-desc">Sistem Informasi</h5>
                                <h5 class="description-header"><strong>System Designer</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
              
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/27.png') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/bl.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Anabella Mayzira<br>1414000024</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>Database Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>

                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/28.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/sp.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Syarifah Nurul M<br>1314000017</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>System Analyst</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
              
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/29.jpg') center center;">
                       
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/rt.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Rizky Rianti<br>1414000001</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>System Analyst</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
              
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/30.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/stl.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Stela Veranita Anwar<br>1414000013</h3>
                                <h5 class="widget-user-desc">Teknik Informatika</h5>
                                <h5 class="description-header"><strong>Database Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
              
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/31.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/mi.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">M Idham<br>1513000003</h3>
                                <h5 class="widget-user-desc">Sistem Informasi</h5>
                                <h5 class="description-header"><strong>System Analyst</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
              
                  <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-black" style="background: url('<?php echo base_url('uploads/img/'); ?>bg/32.jpg') center center;">
                        
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url('uploads/img/'); ?>mhs/ft.jpeg" alt="User Avatar">
                      </div>
                      <div class="box-footer">
                        <div class="row">
                          <div class="col-sm-1 border-right" > 
                              
                            </div>
                            <div class="col-sm-10 border-right" align="center">
                              <div class="description-block">
                                <h3 class="widget-user-username">Firsta Samudera D<br>1415000003</h3>
                                <h5 class="widget-user-desc">Sistem Komputer</h5>
                                <h5 class="description-header"><strong>Network Specialist</strong></h5>
                                <span class="description-text"></span>
                              </div>
                              <!-- /.description-block -->
                            </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- Box Primary end -->
          </div>
          <!-- Col End -->
      
      
            <!-- Button -->
        </div>
        <!-- Box End -->
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('layout/bot'); ?> 
</div>

<!-- Menu -->

<script>
  var dashboard = document.getElementById("home");
  


  var menu = document.getElementById("tentangkami");
  
  function clear_menu(){
    dashboard.className = "";
   

    menu.className = "";
  }

  clear_menu();

  menu.className = "active";

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
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthMenu": [ 10, 25, 50, 100 ],
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#example2').DataTable({
      "language": {
        "search": "Cari:"
      },
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
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
