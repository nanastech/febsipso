<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Pengumuman</title>
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

  <!-- 
  CK EDITOR-->

  <script src="<?php echo base_url(); ?>assets/plugins/ckeditor4/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/ckeditor4/config.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/ckeditor4/styles.js"></script>

  <!-- Material datetime picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
  
  <!--<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script> 
  <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script> -->
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
  <style type="text/css">
    .onoffswitch {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch-checkbox {
    display: none;
}

.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 20px;
}

.onoffswitch-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch-inner:before, .onoffswitch-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch-inner:before {
    content: "YES";
    padding-left: 10px;
    background-color: #2FCCFF; color: #FFFFFF;
}

.onoffswitch-inner:after {
    content: "NO";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}

.onoffswitch-switch {
    display: block; width: 18px; margin: 6px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 20px;
    position: absolute; top: 0; bottom: 0; right: 56px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
    margin-left: 0;
}

.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
    right: 0px; 
}


 .onoffswitch1 {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch1-checkbox {
    display: none;
}

.onoffswitch1-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 30px;
}

.onoffswitch1-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch1-inner:before, .onoffswitch1-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    border-radius: 30px;
    box-shadow: 0px 15px 0px rgba(0,0,0,0.08) inset;
}

.onoffswitch1-inner:before {
    content: "YES";
    padding-left: 10px;
    background-color: #2FCCFF; color: #FFFFFF;
    border-radius: 30px 0 0 30px;
}

.onoffswitch1-inner:after {
    content: "NO";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
    border-radius: 0 30px 30px 0;
}

.onoffswitch1-switch {
    display: block; width: 30px; margin: 0px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 30px;
    position: absolute; top: 0; bottom: 0; right: 56px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
    background-image: -moz-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%); 
    background-image: -webkit-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%); 
    background-image: -o-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%); 
    background-image: linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 80%);
    box-shadow: 0 1px 1px white inset;
}

.onoffswitch1-checkbox:checked + .onoffswitch1-label .onoffswitch1-inner {
    margin-left: 0;
}

.onoffswitch1-checkbox:checked + .onoffswitch1-label .onoffswitch1-switch {
    right: 0px; 
}

.onoffswitch2 {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch2-checkbox {
    display: none;
}

.onoffswitch2-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #999999; border-radius: 5px;
}

.onoffswitch2-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch2-inner:before, .onoffswitch2-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch2-inner:before {
    content: "YES";
    padding-left: 10px;
    background-color: #00a65a ; color: #FFFFFF;
}

.onoffswitch2-inner:after {
    content: "NO";
    padding-right: 10px;
    background-color: #EEEEEE; color: #999999;
    text-align: right;
}

.onoffswitch2-switch {
    display: block; width: 18px; margin: 0px;
    background: #FFFFFF;
    border: 2px solid #999999; border-radius: 5px;
    position: absolute; top: 0; bottom: 0; right: 68px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
    background-image: -moz-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
    background-image: -webkit-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
    background-image: -o-linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
    background-image: linear-gradient(center top, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0) 100%);
}

.onoffswitch2-checkbox:checked + .onoffswitch2-label .onoffswitch2-inner {
    margin-left: 0;
}

.onoffswitch2-checkbox:checked + .onoffswitch2-label .onoffswitch2-switch {
    right: 0px; 
}

.onoffswitch3
{
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch3-checkbox {
    display: none;
}

.onoffswitch3-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 0px solid #999999; border-radius: 0px;
}

.onoffswitch3-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch3-inner > span {
    display: block; float: left; position: relative; width: 50%; height: 30px; padding: 0; line-height: 30px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
}

.onoffswitch3-inner .onoffswitch3-active {
    padding-left: 10px;
    background-color: #EEEEEE; color: #FFFFFF;
}

.onoffswitch3-inner .onoffswitch3-inactive {
    padding-right: 10px;
    background-color: #EEEEEE; color: #FFFFFF;
    text-align: right;
}

.onoffswitch3-switch {
    display: block; width: 18px; margin: 0px; text-align: center; 
    border: 0px solid #999999;border-radius: 0px; 
    position: absolute; top: 0; bottom: 0;
}
.onoffswitch3-active .onoffswitch3-switch {
    background: #27A1CA; left: 0;
}
.onoffswitch3-inactive .onoffswitch3-switch {
    background: #A1A1A1; right: 0;
}

.onoffswitch3-active .onoffswitch3-switch:before {
    content: " "; position: absolute; top: 0; left: 18px; 
    border-style: solid; border-color: #27A1CA transparent transparent #27A1CA; border-width: 15px 9px;
}


.onoffswitch3-inactive .onoffswitch3-switch:before {
    content: " "; position: absolute; top: 0; right: 18px; 
    border-style: solid; border-color: transparent #A1A1A1 #A1A1A1 transparent; border-width: 15px 9px;
}


.onoffswitch3-checkbox:checked + .onoffswitch3-label .onoffswitch3-inner {
    margin-left: 0;
}

.onoffswitch4 {
    position: relative; width: 90px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}

.onoffswitch4-checkbox {
    display: none;
}

.onoffswitch4-label {
    display: block; overflow: hidden; cursor: pointer;
    border: 2px solid #27A1CA; border-radius: 0px;
}

.onoffswitch4-inner {
    display: block; width: 200%; margin-left: -100%;
    -moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
    -o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
}

.onoffswitch4-inner:before, .onoffswitch4-inner:after {
    display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 26px;
    font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
    -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
    border: 2px solid transparent;
    background-clip: padding-box;
}

.onoffswitch4-inner:before {
    content: "Yes";
    padding-left: 10px;
    background-color: #FFFFFF; color: #27A1CA;
}

.onoffswitch4-inner:after {
    content: "No";
    padding-right: 10px;
    background-color: #FFFFFF; color: #666666;
    text-align: right;
}

.onoffswitch4-switch {
    display: block; width: 25px; margin: 0px;
    background: #27A1CA;
    position: absolute; top: 0; bottom: 0; right: 65px;
    -moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
    -o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s; 
}

.onoffswitch4-checkbox:checked + .onoffswitch4-label .onoffswitch4-inner {
    margin-left: 0;
}

.onoffswitch4-checkbox:checked + .onoffswitch4-label .onoffswitch4-switch {
    right: 0px; 
}



.cmn-toggle 
{
  position: absolute;
  margin-left: -9999px;
  visibility: hidden;
}

.cmn-toggle + label 
{
  display: block;
  position: relative;
  cursor: pointer;
  outline: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

input.cmn-toggle-round-flat + label 
{
  padding: 2px;
  width: 75px;
  height: 30px;
  background-color: #dddddd;
  -webkit-border-radius: 60px;
  -moz-border-radius: 60px;
  -ms-border-radius: 60px;
  -o-border-radius: 60px;
  border-radius: 60px;
  -webkit-transition: background 0.4s;
  -moz-transition: background 0.4s;
  -o-transition: background 0.4s;
  transition: background 0.4s;
}

input.cmn-toggle-round-flat + label:before, input.cmn-toggle-round-flat + label:after 
{
  display: block;
  position: absolute;
  content: "";
}

input.cmn-toggle-round-flat + label:before 
{
  top: 2px;
  left: 2px;
  bottom: 2px;
  right: 2px;
  background-color: #fff;
  -webkit-border-radius: 60px;
  -moz-border-radius: 60px;
  -ms-border-radius: 60px;
  -o-border-radius: 60px;
  border-radius: 60px;
  -webkit-transition: background 0.4s;
  -moz-transition: background 0.4s;
  -o-transition: background 0.4s;
  transition: background 0.4s;
}

input.cmn-toggle-round-flat + label:after 
{
  top: 4px;
  left: 4px;
  bottom: 4px;
  width: 22px;
  background-color: #dddddd;
  -webkit-border-radius: 52px;
  -moz-border-radius: 52px;
  -ms-border-radius: 52px;
  -o-border-radius: 52px;
  border-radius: 52px;
  -webkit-transition: margin 0.4s, background 0.4s;
  -moz-transition: margin 0.4s, background 0.4s;
  -o-transition: margin 0.4s, background 0.4s;
  transition: margin 0.4s, background 0.4s;
}

input.cmn-toggle-round-flat:checked + label 
{
  background-color: #27A1CA;
}

input.cmn-toggle-round-flat:checked + label:after 
{
  margin-left: 45px;
  background-color: #27A1CA;
}

div.switch5 { clear: both; margin: 0px 0px; }
div.switch5 > input.switch:empty { margin-left: -999px; }
div.switch5 > input.switch:empty ~ label { position: relative; float: left; line-height: 1.6em; text-indent: 4em; margin: 0.2em 0px; cursor: pointer; -moz-user-select: none; }
div.switch5 > input.switch:empty ~ label:before, input.switch:empty ~ label:after { position: absolute; display: block; top: 0px; bottom: 0px; left: 0px; content: "off"; width: 3.6em; height: 1.5em; text-indent: 2.4em; color: rgb(153, 0, 0); background-color: rgb(204, 51, 51); border-radius: 0.3em; box-shadow: 0px 0.2em 0px rgba(0, 0, 0, 0.3) inset; }
div.switch5 > input.switch:empty ~ label:after { content: " "; width: 1.4em; height: 1.5em; top: 0.1em; bottom: 0.1em; text-align: center; text-indent: 0px; margin-left: 0.1em; color: rgb(255, 136, 136); background-color: rgb(255, 255, 255); border-radius: 0.15em; box-shadow: 0px -0.2em 0px rgba(0, 0, 0, 0.2) inset; transition: all 100ms ease-in 0s; }
div.switch5 > input.switch:checked ~ label:before { content: "on"; text-indent: 0.5em; color: rgb(102, 255, 102); background-color: rgb(51, 153, 51); }
div.switch5 > input.switch:checked ~ label:after { margin-left: 2.1em; color: rgb(102, 204, 102); }
div.switch5 > input.switch:focus ~ label { color: rgb(0, 0, 0); }
div.switch5 > input.switch:focus ~ label:before { box-shadow: 0px 0px 0px 3px rgb(153, 153, 153); }







.switch6 {  max-width: 17em;  margin: 0 auto; }
.switch6-light > span, .switch-toggle > span {  color: #000000; }
.switch6-light span span, .switch6-light label, .switch-toggle span span, .switch-toggle label {  color: #2b2b2b; }

.switch-toggle a, 
.switch6-light span span { display: none; }

.switch6-light { display: block; height: 30px; position: relative; overflow: visible; padding: 0px; margin-left:0px; }
.switch6-light * { box-sizing: border-box; }
.switch6-light a { display: block; transition: all 0.3s ease-out 0s; }

.switch6-light label, 
.switch6-light > span { line-height: 30px; vertical-align: middle;}

.switch6-light label {font-weight: 700; margin-bottom: px; max-width: 100%;}

.switch6-light input:focus ~ a, .switch6-light input:focus + label { outline: 1px dotted rgb(136, 136, 136); }
.switch6-light input { position: absolute; opacity: 0; z-index: 5; }
.switch6-light input:checked ~ a { right: 0%; }
.switch6-light > span { position: absolute; left: -100px; width: 100%; margin: 0px; padding-right: 100px; text-align: left; }
.switch6-light > span span { position: absolute; top: 0px; left: 0px; z-index: 5; display: block; width: 50%; margin-left: 100px; text-align: center; }
.switch6-light > span span:last-child { left: 50%; }
.switch6-light a { position: absolute; right: 50%; top: 0px; z-index: 4; display: block; width: 50%; height: 100%; padding: 0px; }
  </style>
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
<?php $this->load->view('staff/layout/top'); ?>	
<?php $this->load->view('staff/layout/menu'); ?>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengumuman
        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>staff/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pengumuman</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $notification; ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><span class="fa fa-edit"></span> Input Pengumuman</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <div class="col-md-12">
            <form method="POST" action="<?php echo base_url('Staff/proses_pengumuman/'); ?>" enctype="multipart/form-data">
            <div class="row col-md-12">
              <div class="form-group col-md-6">
                <label>Judul Pengumuman<font color="red">*</font> : </label>
                <?php echo form_error('judul');?>
                <input type="text" name="judul" class="form-control" required="" value="<?=set_value('judul')?>">
              </div>
            </div>
            <div class="row col-md-12">
              <div class="form-group col-md-6">
                <label>No. Surat : </label>
                <input type="text" name="nosurat" class="form-control" value="<?=set_value('nosurat')?>">
              </div>
            </div>
            <script type="text/javascript">
              function upload(sel){
                var value = sel.value;  
       
                if (value=="") {
                   document.getElementById("checkdah").style.display = "none";
                }else{
                   document.getElementById("checkdah").style.display = "initial";
                }
              }
            </script>
            <div class="row col-md-12">
              <div class="form-group col-md-6">
                <label>Upload Gambar Pengumuman : </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-picture-o"></i>
                  </div>
                  <input type="file" name="gambar" id="upgambar" class="form-control" accept="image/*" >
                </div>
              </div>
            </div>
            <div class="row col-md-12">
              <div class="form-group col-md-6">
                <label>Upload Attachment Pengumuman : </label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-paperclip"></i>
                  </div>
                  <input type="file" name="attachment" class="form-control" onchange="upload(this)" accept=".xlsx,.pptx,application/vnd.ms-excel,application/vnd.ms-powerpoint,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                </div>
              </div>
              <div class="form-group col-md-6" id="checkdah" style="display: none;">
                <label> Tampilkan Attachment : </label>
                <div class="onoffswitch2">
                  <input type="checkbox" name="tampilkan" value="tampil" class="onoffswitch2-checkbox" id="myonoffswitch2" checked>
                  <label class="onoffswitch2-label" for="myonoffswitch2">
                      <span class="onoffswitch2-inner"></span>
                      <span class="onoffswitch2-switch"></span>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group col-md-12">
              <label>Isi Pengumuman<font color="red">*</font> : </label>
              <?php echo form_error('isi');?>
              <textarea id="editor1" name="isi" class="form-control" required="">
              <?=set_value('isi')?>
              </textarea>
            </div>
            <div class="row col-md-12">
              <div class="form-group col-md-12" align="right">
                <legend></legend>
                <input type="submit" value="Publikasi!" class="btn btn-primary">&nbsp;&nbsp;
                <input type="reset" value="Reset" class="btn btn-warning">&nbsp;&nbsp;
                <a href="<?=base_url('Staff/')?>" class="btn btn-default">Cancel</a>
              </div>
            </div>
            </form>
          </div>
              
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><span class="fa fa-bullhorn"></span> Pengumuman</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <div class="col-md-12">
            <table id="example1"  class="table table-bordered table-striped">
              <thead><tr><th></th></tr></thead>
              <tbody>
                <?php $pengumumans=$this->Model->read_orderby1('pengumuman','tgl_post','DESC');
                if ($pengumumans) {
                  foreach ($pengumumans as $id) { ?>
                  <script type="text/javascript">
                    function changetext<?=$id['id']?>() // no ';' here
                    { 
                        document.getElementById("show<?=$id['id']?>").click();
                        var elem = document.getElementById("text<?=$id['id']?>");
                        if (elem.innerHTML=="Show less...") elem.innerHTML = "Show more...";
                        else elem.innerHTML = "Show less...";
                    }
                    function change<?=$id['id']?>()
                    {
                      var elem = document.getElementById("text<?=$id['id']?>");
                        if (elem.innerHTML=="Show less...") elem.innerHTML = "Show more...";
                        else elem.innerHTML = "Show less...";
                    }
                  </script>
                  <tr>
                    <td>
                      <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                          <button class="btn btn-danger btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm_hapus<?=$id['id']?>"><i class="fa fa-close"></i> Hapus</button>
                            <div class="modal fade modal-warning bs-example-modal-sm_hapus<?=$id['id']?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
                                  </div>
                                  <div class="modal-body">
                                    <strong><h4>Data pengumuman <?=strtoupper($id['judul'])?> akan dihapus!!</h4></strong>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline" data-dismiss="modal">Cancel</button>
                                    <a type="button" class="btn btn-danger pull-left" href="<?=base_url('Staff/hapus_pengumuman/'.$id['id'])?>"><span class="fa fa-close"></span>&nbsp;&nbsp;Hapus</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <h2 align="center">PENGUMUMAN</h2>

                          <h5 align="center"><?php if ($id['nosurat']) {
                            echo "No. ".strtoupper($id['nosurat']);
                          }else{
                            echo "No. -";
                            }?>
                          </h5>
                          <h5 align="center">tentang</h5>
                          <h3 align="center"><?= strtoupper($id['judul']); ?></h3>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" id="show<?=$id['id']?>" onclick="change<?=$id['id']?>()"><i class="fa fa-plus"></i></button>
                            <button onclick="changetext<?=$id['id']?>()" class="btn btn-box-tool" id="text<?=$id['id']?>">Show more...</button>
                          <div class="box-tools pull-right">
                            <small><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?=indonesian_date(strtotime($id['tgl_post']),'d F  Y H:i:s','')?></small>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="display: none;">
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                            <p align="justify" ><?= nl2br($id['isi'])?></p>
                          </div>
                          <div class="col-md-1"></div>
                          
                            <?php if ($id['tampil']) {?>
                            <div class="col-md-12" align="center">
                              <iframe src="https://docs.google.com/gview?url=<?=base_url('uploads/pengumuman/').$id['attachment']?>&embedded=true" style="width:500px; height:500px;max-width:100%; max-height:100%;" frameborder="0"></iframe>
                            </div>
                            <?php } ?>
                            <?php if ($id['gambar']) {?>
                              <div class="col-md-12" align="center">
                                <img src="<?=base_url()?>uploads/pengumuman/<?=$id['gambar']?>" style="width:80%; height:80%;max-width:100%; max-height:100%;">
                              </div>
                            <?php } ?>
                          <div class="col-md-12">
                            <span class="fa fa-archive"></span> Download : <?php if ($id['attachment']) { ?>
                              <a target="_blank" href="<?=base_url('uploads/pengumuman/'.$id['attachment'])?>" style=""><?= substr($id['attachment'], 0,30) ?>...</a>
                            <?php }else{
                              echo "-";
                              } ?>
                          </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </td>
                  </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
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

<!-- Menu -->

<script>
  var dashboard = document.getElementById("dashboard");
  


  var statussidangskripsi = document.getElementById("pengumuman");
  
  function clear_menu(){
    dashboard.className = "";
   

    statussidangskripsi.className = "";
  }

  clear_menu();

  statussidangskripsi.className = "active";

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
<!-- <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthMenu": [ 5, 10, 25, 50, 100 ],
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
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
