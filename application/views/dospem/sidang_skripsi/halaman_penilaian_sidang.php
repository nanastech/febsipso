<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPSO | Penilaian Sidang</title>
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

	<!-- CK EDITOR-->

  <script src="<?php echo base_url(); ?>assets/plugins/ckeditor4/ckeditor.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/ckeditor4/config.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/ckeditor4/styles.js"></script>
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ckeditor4/contents.css"/>  -->

<!-- MATERIAL DATE PICK -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/materialdatetimepicker/css/bootstrap-material-datetimepicker.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.3.min.js" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
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

	<script type="text/javascript">
		function nilai(value,form){
			var value=value.value;  
	       	var A1=document.getElementById("form-A1").value;
	       	var A2=document.getElementById("form-A2").value;
	       	var A3=document.getElementById("form-A3").value;
	       	var subtotA;

	       	var B1=document.getElementById("form-B1").value;
	       	var B2=document.getElementById("form-B2").value;
	       	var B3=document.getElementById("form-B3").value;
	       	var B4=document.getElementById("form-B4").value;
	       	var subtotB;

			var C1=document.getElementById("form-C1").value;
	       	var C2=document.getElementById("form-C2").value;
	       	var subtotC;

	       	var total;


	      	if (value<=100 && value>=0) {
	      		if (value>=90) {
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='A';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='A';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='A';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='A';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='A';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='A';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='A';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='A';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='A';
					        break;
					   
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value>=80 && value<=89.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='A-';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='A-';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='A-';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='A-';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='A-';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='A-';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='A-';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='A-';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='A-';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value>=75 && value<=79.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='B+';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='B+';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='B+';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='B+';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='B+';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='B+';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='B+';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='B+';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='B+';
					        break;    
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value>=70 && value<=74.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='B';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='B';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='B';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='B';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='B';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='B';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='B';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='B';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='B';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value>=65 && value<=69.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='B-';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='B-';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='B-';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='B-';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='B-';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='B-';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='B-';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='B-';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='B-';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value>=60 && value<=64.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='C+';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='C+';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='C+';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='C+';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='C+';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='C+';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='C+';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='C+';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='C+';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value>=55 && value<=59.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='C';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='C';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='C';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='C';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='C';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='C';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='C';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='C';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='C';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (value<=54.99){
	      			switch(form) {
					    case 'A-1':
					        document.getElementById("huruf-A1").innerHTML='TL';
					        break;
					    case 'A-2':
					        document.getElementById("huruf-A2").innerHTML='TL';
					        break;
					    case 'A-3':
					        document.getElementById("huruf-A3").innerHTML='TL';
					        break;
					    case 'B-1':
					        document.getElementById("huruf-B1").innerHTML='TL';
					        break;
					    case 'B-2':
					        document.getElementById("huruf-B2").innerHTML='TL';
					        break;
					    case 'B-3':
					        document.getElementById("huruf-B3").innerHTML='TL';
					        break;
					    case 'B-4':
					        document.getElementById("huruf-B4").innerHTML='TL';
					        break;
					    case 'C-1':
					        document.getElementById("huruf-C1").innerHTML='TL';
					        break;
					    case 'C-2':
					        document.getElementById("huruf-C2").innerHTML='TL';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}
	      		
	      		var hitungA=(25/100*A1)+(40/100*A2)+(35/100*A3);
		      	if (hitungA) {
		      		subtotA=hitungA.toFixed(2);
		      		subhuruf(subtotA,'A');
		      		document.getElementById("form-subtotA").value=subtotA;
		      	}

		      	var hitungB=(50/100*B1)+(20/100*B2)+(20/100*B3)+(10/100*B4);
		      	if (hitungB) {
		      		subtotB=hitungB.toFixed(2);
		      		subhuruf(subtotB,'B');
		      		document.getElementById("form-subtotB").value=subtotB;
		      	}

		      	var hitungC=(60/100*C1)+(40/100*C2);
		      	if (hitungC) {
		      		subtotC=hitungC.toFixed(2);
		      		subhuruf(subtotC,'C');
			      	document.getElementById("form-subtotC").value=subtotC;
		      	}

		      	if (hitungA && hitungB && hitungC) {
		      		var hitungtotal = (Number(subtotA) + Number(subtotB) + Number(subtotC))/3;
		      		total=hitungtotal.toFixed(2);
		      		subhuruf(total,'akhir');
		      		document.getElementById("form-total").value=total;
		      	}
	      	}else{
	      		alert('Mohon maaf nilai tidak valid! (Range input nilai 0 - 100)');
	      		switch(form) {
				    case 'A-1':
				        document.getElementById("huruf-A1").innerHTML='';
			      		document.getElementById("form-A1").value='';
			      		document.getElementById("form-A1").focus();
			      		document.getElementById("huruf-subtotA").innerHTML='';
			      		document.getElementById("form-subtotA").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'A-2':
				        document.getElementById("huruf-A2").innerHTML='';
			      		document.getElementById("form-A2").value='';
			      		document.getElementById("form-A2").focus();
			      		document.getElementById("huruf-subtotA").innerHTML='';
			      		document.getElementById("form-subtotA").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'A-3':
				        document.getElementById("huruf-A3").innerHTML='';
			      		document.getElementById("form-A3").value='';
			      		document.getElementById("form-A3").focus();
			      		document.getElementById("huruf-subtotA").innerHTML='';
			      		document.getElementById("form-subtotA").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'B-1':
				        document.getElementById("huruf-B1").innerHTML='';
			      		document.getElementById("form-B1").value='';
			      		document.getElementById("form-B1").focus();
			      		document.getElementById("huruf-subtotB").innerHTML='';
			      		document.getElementById("form-subtotB").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'B-2':
				        document.getElementById("huruf-B2").innerHTML='';
			      		document.getElementById("form-B2").value='';
			      		document.getElementById("form-B2").focus();
			      		document.getElementById("huruf-subtotB").innerHTML='';
			      		document.getElementById("form-subtotB").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'B-3':
				        document.getElementById("huruf-B3").innerHTML='';
			      		document.getElementById("form-B3").value='';
			      		document.getElementById("form-B3").focus();
			      		document.getElementById("huruf-subtotB").innerHTML='';
			      		document.getElementById("form-subtotB").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'B-4':
				        document.getElementById("huruf-B4").innerHTML='';
			      		document.getElementById("form-B4").value='';
			      		document.getElementById("form-B4").focus();
			      		document.getElementById("huruf-subtotB").innerHTML='';
			      		document.getElementById("form-subtotB").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'C-1':
				        document.getElementById("huruf-C1").innerHTML='';
			      		document.getElementById("form-C1").value='';
			      		document.getElementById("form-C1").focus();
			      		document.getElementById("huruf-subtotC").innerHTML='';
			      		document.getElementById("form-subtotC").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;
				    case 'C-2':
				        document.getElementById("huruf-C2").innerHTML='';
			      		document.getElementById("form-C2").value='';
			      		document.getElementById("form-C2").focus();
			      		document.getElementById("huruf-subtotC").innerHTML='';
			      		document.getElementById("form-subtotC").value='';

			      		document.getElementById("huruf-total").innerHTML='';
			      		document.getElementById("form-total").value='';
				        break;    
				    default:
				        alert('salah');
				}
	      		
	      	}
	    }
	</script>
	<script type="text/javascript">
		function subhuruf(total,sub){
	    	if (total>=90) {
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='A';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='A';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='A';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='A';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total>=80 && total<=89.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='A-';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='A-';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='A-';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='A-';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total>=75 && total<=79.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='B+';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='B+';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='B+';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='B+';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total>=70 && total<=74.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='B';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='B';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='B';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='B';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total>=65 && total<=69.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='B-';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='B-';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='B-';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='B-';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total>=60 && total<=64.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='C+';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='C+';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='C+';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='C+';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total>=55 && total<=59.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='C';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='C';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='C';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='C';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
	      		}else if (total<=54.99){
	      			switch(sub) {
					    case 'A':
					        document.getElementById("huruf-subtotA").innerHTML='TL';
					        break;
					    case 'B':
					        document.getElementById("huruf-subtotB").innerHTML='TL';
					        break;
					    case 'C':
					        document.getElementById("huruf-subtotC").innerHTML='TL';
					        break;
					    case 'akhir':
					        document.getElementById("huruf-total").innerHTML='TL';
					        break;
					    default:
					        alert('Salah');
					        break;
					}
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
	<?php $this->load->view('dospem/layout/top'); ?>	
	<?php $this->load->view('dospem/layout/menu'); ?>	
  	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Penilaian Sidang
	        <small><?= $hari.', '.date("d F Y");?> (<span id="clock"><?php print date('H:i:s'); ?></span>)</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="<?php echo base_url(); ?>Mahasiswa/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	        <li><a href="#">Sidang Skripsi</a></li>
	        <li class="active">Penilaian Sidang</li>
	      </ol>
	    </section>
	    <!-- Main content -->
	    <section class="content ">
		    <?php echo $notification; ?>
		    <?php 
		    	$nim=base64_decode($this->uri->segment(3));
		    	$jadwal=$this->Model->read_detail('nim',$nim,'jadwal_sidang');
		    	$mahasiswa=$this->Model->read_detail('nim',$nim,'daftar_sidang');
		    	$tanggal=$this->Model->read_detail('id',$jadwal->tanggal_id,'tanggal_sidang');
		    	$bataswaktu=strtotime($jadwal->waktu)+(60*90);
		    	$penilaian=$this->Model->read_detail_dual('nim',$nim,'penguji',$this->session->userdata('username'),'penilaian');
		    ?>
	      	<div class="row">
		        <!-- left column -->
		        <div class="col-xs-12">
			    	<div class="nav-tabs-custom table-responsive">
				        <ul class="nav nav-tabs">
				          <li class="active"><a href="#form_penilaian" data-toggle="tab">Formulir Penilaian</a></li>
				          <li><a href="#form_revisi" data-toggle="tab">Lembar Revisi</a></li>
				          <li><a href="#kesimpulan" data-toggle="tab">Kesimpulan</a></li>
				        </ul>
				        <div class="tab-content">
				        	<div class="row">
			          			<div class="col-md-12">
			          				<br>
			          				<div class="col-md-4">
						                <div class="form-group">
						                    <span class="fa fa-legal"></span><label>&nbsp;&nbsp;NAMA PENILAI :</label>
						                    <input class="form-control" name="penilai" type="text" readonly="" placeholder="" value="<?='['.$this->session->userdata('username').'] '.$this->session->userdata('name');?>">
						               	</div>
						               	<div class="form-group">
						                    <span class="fa fa-calendar"></span><label>&nbsp;&nbsp;HARI/TANGGAL :</label>
						                    <input class="form-control" name="penilai" type="text" readonly="" placeholder="" value="<?= indonesian_date(strtotime($tanggal->tgl_sidang),'l, d F Y','');?>">
						               	</div>
						               	<div class="form-group">
						                    <span class="fa fa-clock-o"></span><label>&nbsp;&nbsp;JAM :</label>
						                    <input class="form-control" name="penilai" type="text" readonly="" placeholder="" value="<?= date('H.i',strtotime($jadwal->waktu)).' - '.date("H.i", $bataswaktu);?>">
						               	</div>
					                </div>
					                <div class="col-md-4">
					                    <div class="form-group">
					                      	<span class="fa fa-envelope"></span><label>&nbsp;&nbsp;NOMOR SURAT</label>
					                      	<input class="form-control" name="mahasiswa" type="text" readonly="" placeholder="Mahasiswa" value="<?php if (!empty($jadwal->no_surat)) {
					                        	echo $jadwal->no_surat;
					                      		}else{
					                        	echo "-";
					                        	} ;?>">
					                    </div>
					                    <div class="form-group">
						                    <span class="fa fa-book"></span><label>&nbsp;&nbsp;JUDUL SKRIPSI</label>
						                    <textarea name="judul" class="form-control" rows="5" readonly=""><?=mb_convert_case($mahasiswa->judul_skripsi, MB_CASE_UPPER, "UTF-8");?></textarea>
						                </div>
					                    <!-- <div class="form-group" align="center">
					                      	<img src="<?php echo base_url('uploads/img/logofull.png'); ?>" style="max-width: 100%;" class="form-group col-md-12">
					                    </div> -->
					                </div>
					                <div class=" col-md-4">
					                   <div class="form-group">
						                    <span class="fa fa-mortar-board"></span><label>&nbsp;&nbsp;NAMA YANG DIUJI :</label>
						                    <input class="form-control" name="penilai" type="text" readonly="" placeholder="" value="[<?= $mahasiswa->nim;?>] <?= $mahasiswa->nama;?>">
						               	</div>
						               	<div class="form-group">
						                    <span class="fa fa-building-o"></span><label>&nbsp;&nbsp;RUANG :</label>
						                    <input class="form-control" name="penilai" type="text" readonly="" placeholder="" value="<?=$jadwal->ruang;?>">
						               	</div>
						               	<div class="form-group">
						                    <span class="fa fa-calendar-times-o"></span><label>&nbsp;&nbsp;TENGGANG WAKTU REVISI :</label>
						                    <input class="form-control" name="tgl_revisi" type="text" placeholder="-" value="<?php if ($penilaian) {
						                    	if ($penilaian->batas_revisi) {
						                    		echo indonesian_date(strtotime($penilaian->batas_revisi),"l, d F Y","");
						                    	}
						                    }
						                    ?>" readonly>
		                                    
						               	</div>
					                    <!-- <div class="form-group" style="margin-bottom: 0px;">
					                      	<span class="fa fa-briefcase"></span><label>&nbsp;&nbsp;Total Bimbingan</label>
					                    </div>
					                    <label style="font-size: 110px;"><strong></strong></label>  -->
					                </div>
			          			</div>
			          		</div>
				          	<!-- FORM PENILAIAN -->
				          	<div class="tab-pane active" id="form_penilaian">
				          		<div class="row">
				          			<div class="col-md-12">
				          				<h3 align="center"><u>Formulir Penilaian Skripsi</u></h3>
				          				<br>
				          			</div>
				          		</div>
				          		<div class="row">
				          			<div class="col-md-1"></div>
				          			<div class="col-md-10">
				          				<form action="<?=base_url('Dospem/nilai_sidang/'.base64_encode($mahasiswa->nim))?>" method="POST">
				          				<table border="1" width="100%" class="table table-bordered">
				          					<thead>
				          						<tr>
				          							<th style="text-align: center; vertical-align: middle;">KRITERIA</th>
				          							<th style="text-align: center; vertical-align: middle;">BOBOT</th>
				          							<th style="text-align: center; vertical-align: middle;width: 70px; ">NILAI</th>
				          							<th style="text-align: center;">BOBOT NILAI</th>
				          						</tr>
				          					</thead>
				          					<tbody>
				          						<tr>
				          						
				          							<td><label> A. PENYAJIAN</label></td>
				          							<td align="center" colspan="3"></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Keyakinan diri/self confidence</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">25%</td>
				          							<td align="center" style="vertical-align: middle; "><input type="text" class="form-control" style="width: 70px;" name="A1" oninput="nilai(this,'A-1');" id="form-A1" required="" value="<?= ($penilaian ? $penilaian->penyajian1 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-A1"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Augmentasi dalam menjawab/menyanggah</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">40%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="A2" oninput="nilai(this,'A-2');" id="form-A2" required="" value="<?= ($penilaian ? $penilaian->penyajian2 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-A2"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Pemahaman (mengerti makna dan fakta yang diketahui)</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">35%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="A3" oninput="nilai(this,'A-3');" id="form-A3" required="" value="<?= ($penilaian ? $penilaian->penyajian3 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-A3"></label></td>
				          						</tr>
				          						<tr>
				          							<td><label> SUB TOTAL A</label></td>
				          							<td align="center" style="vertical-align: middle;">100%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="subtotA" id="form-subtotA" required="" readonly=""></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-subtotA"></label></td>
				          						</tr>
				          						<tr>
				          						
				          							<td><label> B. PENGUASAAN PENULISAN/MATERI PENYAJIAN</label></td>
				          							<td align="center" colspan="3"></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Analisa dan Sintetis (mampu menguraikan suatu pendapat ke dalam komponen materi dan menguraikannya dengan beberapa faktor pengetahuan yang diketahui)</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">50%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="B1" oninput="nilai(this,'B-1');" id="form-B1" required="" value="<?= ($penilaian ? $penilaian->penulisan1 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-B1"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Aspek teori/konsep yang disajikan</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">20%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="B2" oninput="nilai(this,'B-2');" id="form-B2" required="" value="<?= ($penilaian ? $penilaian->penulisan2 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-B2"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Aspek teknis yang disajikan</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">20%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="B3" oninput="nilai(this,'B-3');" id="form-B3" required="" value="<?= ($penilaian ? $penilaian->penulisan3 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-B3"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Kesimpulan dan Saran-saran yang dikemukakan</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">10%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="B4" oninput="nilai(this,'B-4');" id="form-B4" required="" value="<?= ($penilaian ? $penilaian->penulisan4 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-B4"></label></td>
				          						</tr>
				          						<tr>
				          							<td><label> SUB TOTAL B</label></td>
				          							<td align="center" style="vertical-align: middle;">100%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="subtotB" id="form-subtotB" required="" readonly=""></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-subtotB"></label></td>
				          						</tr>
				          						<tr>
				          						
				          							<td><label> C. UMUM</label></td>
				          							<td align="center" colspan="3"></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Sistematika dan relevansi judul dengan isi materi</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">60%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="C1" oninput="nilai(this,'C-1');" id="form-C1" required="" value="<?= ($penilaian ? $penilaian->umum1 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-C1"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: middle;">
				          								<ul style="margin: 0;">
				          									<li>Referensi yang diperlukan</li>
				          								</ul>
				          							</td>
				          							<td align="center" style="vertical-align: middle;">40%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="C2" oninput="nilai(this,'C-2');" id="form-C2" required=""  value="<?= ($penilaian ? $penilaian->umum2 : '')?>"></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-C2"></label></td>
				          						</tr>
				          						<tr>
				          							<td><label> SUB TOTAL C</label></td>
				          							<td align="center" style="vertical-align: middle;">100%</td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="subtotC" id="form-subtotC" required="" readonly=""></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-subtotC"></label></td>
				          						</tr>
				          						<tr>
				          							<td><label> Nilai Akhir = (A+B+C):3 </label></td>
				          							<td align="center" style="vertical-align: middle;"></td>
				          							<td align="center" style="vertical-align: middle;"><input type="text" class="form-control" name="total" id="form-total" readonly="" required=""></td>
				          							<td align="center" style="vertical-align: middle;"><label id="huruf-total"></label></td>
				          						</tr>
				          						<tr>
				          							<td style="vertical-align: top;" colspan="4">
				          								<div class="form-group">
										                    <label>Catatan : </label>
										                    <textarea name="catatan" class="form-control" rows="5"><?= ($penilaian ? $penilaian->catatan : '')?></textarea>
										                </div>
				          							</td>
				          							
				          						</tr>
				          						<tr>
				          							<td colspan="4"></td>
				          						</tr>
				          						<tr>
				          							<td></td>
				          							<td align="center" style="vertical-align: middle;" colspan="3"><button type="button" data-toggle="modal" data-target=".bs-example-modal-sm_app<?=$jadwal->id?>" class="btn btn-primary">Submit</button></td>
				          						</tr>
				          						<?php 
				          							if ($penilaian) { ?>
				          							<script type="text/javascript">
				          								nilai(document.getElementById("form-A1"),'A-1');
				          								nilai(document.getElementById("form-A2"),'A-2');
				          								nilai(document.getElementById("form-A3"),'A-3');
				          								nilai(document.getElementById("form-B1"),'B-1');
				          								nilai(document.getElementById("form-B2"),'B-2');
				          								nilai(document.getElementById("form-B3"),'B-3');
				          								nilai(document.getElementById("form-B4"),'B-4');
				          								nilai(document.getElementById("form-C1"),'C-1');
				          								nilai(document.getElementById("form-C2"),'C-2');
				          							</script>	
				          						<?php	}
				          						?>
				          						<!-- Small modal -->
							                    <div class="modal fade modal-default bs-example-modal-sm_app<?=$jadwal->id?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
							                        <div class="modal-dialog" role="document">
							                          <div class="modal-content">
							                            <div class="modal-header">
							                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							                              <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
							                            </div>
							                            <div class="modal-body">
							                              <strong><h4>Ingin <strong>SUBMIT</strong> nilai skripsi mahasiswa [ <?= $mahasiswa->nim;?> ] <?=$mahasiswa->nama;?>?!</h4></strong>
							                            </div>
							                            <div class="modal-footer">
							                              <input type="submit" name="Submit" class="btn btn-primary">
							                            </div>
							                          </div>
							                        </div>
							                    </div>
				          					</tbody>
				          				</table>
				          				</form>
				          			</div>
				          			<div class="col-md-1"></div>
				          		</div>
					            <br/>
				          	</div>
					        <!-- FORM REVISI -->
					        <div class="tab-pane" id="form_revisi">
					        	<div class="row">
					        		<div class="col-md-12">
					        			<h3 align="center"><u>Lembar Revisi Skripsi</u></h3>
					        			<br>
					        			<div class="col-md-1"></div>
					        			<div class="col-md-10">
					        			<button type="button" data-toggle="modal" data-target=".bs-example-modal-sm_add" class="btn btn-primary"><span class="fa fa-plus-square"></span>&nbsp;&nbsp;Tambah Revisi</button>
					        				
					        			</div>
					        			<div class="col-md-1"></div>
					        			
										
					                    <div class="modal fade modal-default bs-example-modal-sm_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
					                        <div class="modal-dialog modal-lg" role="document">
					                          <div class="modal-content">
					                            <div class="modal-header">
					                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                              <h3 class="modal-title" id="myModalLabel">Tambah Revisi!</h3>
					                            </div>
					                            <div class="modal-body col-md-12">
					                            	<form action="<?=base_url('Dospem/tambah_revisi/'.$mahasiswa->nim)?>" method="POST">
					                            	
			                            			<div class="form-group col-md-4">
									                    <span class="fa fa-calendar-times-o"></span><label>&nbsp;&nbsp;Tenggang Waktu Revisi<font color="red">*</font> :</label>
									                    <input class="form-control" name="tanggal_revisi" id="min-date" type="text" placeholder="YYYY-MM-DD H:i:s" value="<?php if ($penilaian) {
									                    	if ($penilaian->batas_revisi) {
									                    		echo "$penilaian->batas_revisi";
									                    	}
									                    } ?>" required>
					                                    
									               	</div>
					                            	
					                            	<script type="text/javascript">
				                                      $('#min-date').bootstrapMaterialDatePicker({ 
				                                          format : 'YYYY-MM-DD HH:mm:00', 
				                                          minDate : new Date(),
				                                          clearButton: true,
				                                          time: true,
				                                        });
				                                    </script>
				                                    <div class="form-group col-md-8">
										              <label>Halaman<font color="red">*</font> : </label>
										              <input type="text" name="halaman" class="form-control" required="">
										            </div>

					                             	<div class="form-group col-md-12">
										              <label>Uraian<font color="red">*</font> : </label>
										              <textarea id="editor1" name="uraian" class="form-control" required="" >
										              </textarea>
										            </div>
										           
					                            </div>
					                            <div class="modal-footer">
					                              <input type="submit" name="Submit" class="btn btn-primary">
					                            </div>
					                            </form>
					                          </div>
					                        </div>
					                    </div>
					                    <script>
										  $(function () {
										    // Replace the <textarea id="editor1"> with a CKEditor
										    // instance, using default configuration.
										    CKEDITOR.replace('editor1');
										    CKEDITOR.replace('editor2');
										    //bootstrap WYSIHTML5 - text editor
										    $(".textarea").wysihtml5();
										  });
										</script>
					        		</div>
					        	</div>
					        	<div class="row">&nbsp;</div>
					        	<div class="row">
					        		<div class="col-md-12">
					        			<div class="col-md-1"></div>
						        		<div class="col-md-10">
						        			<table border="1" width="100%" class="table table-bordered">
							                	<thead>
							                		<tr>
									                    <th style="width: 40px; text-align: center; vertical-align: middle;">NO</th>
									                    
									                    <th style="width: 450px; text-align: center; vertical-align: middle;">URAIAN</th>
									                    <th style="width: 100px; text-align: center; vertical-align: middle;">HALAMAN</th>
								                	</tr>
							                	</thead>
							                	<tbody>
							                		<?php 
							                		$data_revisis=$this->Model->read_where_dual('nim',$nim,'penguji',$this->session->userdata('username'),'revisi_skripsi');
							                		if (!$data_revisis) {
							                			echo '<tr><td colspan="4"><div class="alert alert-warning alert-dismissible">
			            										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			            										<h4><i class="icon fa fa-info-circle"></i> Data Revisi Skripsi Masih Kosong!</h4>
			            										Silahkan memasukan data revisi skripsi di form atas!</div></td></tr>';
							                		}else{
							                			$no=1;
							                			foreach ($data_revisis as $id) {?>
							                				<tr>
							                					<td>
							                						<?= $no;?>
							                					</td>
							                					<td>
							                						<?= nl2br($id['uraian']);?>
							                					</td>
							                					<td>
							                						<?= $id['halaman']?>
							                					</td>
							                				</tr>
							                		<?php $no++;}
							                		}
							                		?>
							                	</tbody>
							                	
							                </table>
						        		</div>
						        		<div class="col-md-1"></div>
					        		</div>
					        	</div>
					      	</div>
					      	<!-- FORM REVISI -->
					        <div class="tab-pane" id="kesimpulan">
					        	<div class="row">
					        		<div class="col-md-12">
					        			<h3 align="center"><u>Kesimpulan Penilaian Sidang Skripsi</u></h3>
					        			<br>
					        			<div class="col-md-1"></div>
					        			<div class="col-md-10">
					        			
					        			</div>
					        			<div class="col-md-1"></div>
					        			
					        		</div>
					        	</div>
					        	<div class="row">&nbsp;</div>
					        	<div class="row">
					        		<div class="col-md-12">
					        			<div class="col-md-1"></div>
						        		<div class="col-md-10">
						        			<script type="text/javascript">
						        				function konversi(total,sub){

											    	if (total>=90) {
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='A';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='A';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='A';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='A';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total>=80 && total<=89.99){
										      			switch(sub) {
														   case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='A-';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='A-';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='A-';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='A-';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total>=75 && total<=79.99){
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='B+';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='B+';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='B+';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='B+';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total>=70 && total<=74.99){
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='B';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='B';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='B';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='B';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total>=65 && total<=69.99){
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='B-';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='B-';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='B-';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='B-';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total>=60 && total<=64.99){
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='C+';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='C+';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='C+';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='C+';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total>=55 && total<=59.99){
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='C';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='C';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='C';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='C';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										      		}else if (total<=54.99){
										      			switch(sub) {
														    case 'penguji1':
														        document.getElementById("huruf-penguji1").innerHTML='TL';
														        break;
														    case 'penguji2':
														        document.getElementById("huruf-penguji2").innerHTML='TL';
														        break;
														    case 'penguji3':
														        document.getElementById("huruf-penguji3").innerHTML='TL';
														        break;
														    case 'totalakhir':
														        document.getElementById("huruf-totalakhir").innerHTML='TL';
														        break;
														    default:
														        alert('Salah');
														        break;
														}
										    		}
											    }	
						        			</script>
						        			<table border="1" width="100%" class="table table-bordered">
							                	<thead>
							                		<tr>
									                    <th style="width: 40px; text-align: center; vertical-align: middle;">NO</th>
									                    
									                    <th style="width: 200px; text-align: center; vertical-align: middle;">PENGUJI</th>
									                    <th style="width: 100px; text-align: center; vertical-align: middle;">REVISI</th>
									                    <th style="width: 100px; text-align: center; vertical-align: middle;">NILAI AKHIR</th>
									                    <th style="width: 100px; text-align: center; vertical-align: middle;">BOBOT NILAI</th>
								                	</tr>
							                	</thead>
							                	<tbody>
							                		<?php  ?>
							                		<tr>
							                			<td style="text-align: center;">
							                				1
							                			</td>
							                			<td>
							                				<?php $penguji1=$this->Model->read_detail('noreg',$jadwal->penguji1,'dosen');
							                				echo "[".$penguji1->noreg."] ".$penguji1->nama;
							                				?>
							                			</td>
							                			<td><?= $this->Model->jumlah_revisi($nim,$penguji1->noreg);?></td>
							                			<td><label id="na_penguji1">
							                				<?php $nilai1=$this->Model->read_detail_dual('nim',$nim,'penguji',$penguji1->noreg,'penilaian');
							                				if (!empty($nilai1->nilai_akhir)) {
							                					echo $nilai1->nilai_akhir;
							                				}else{
							                					echo "-";
							                				}
							                				?></label>
							                			</td>
							                			<td><label id="huruf-penguji1"></label></td>
							                			<?php 
							                			if (!empty($nilai1->nilai_akhir)) {?>
							                				<script type="text/javascript">
							                					konversi(document.getElementById("na_penguji1").innerHTML,'penguji1');
							                				</script>	
							                			<?php	}
							                			?> 
							                		</tr>
							                		<tr>
							                			<td style="text-align: center;">
							                				2
							                			</td>
							                			<td>
							                				<?php $penguji2=$this->Model->read_detail('noreg',$jadwal->penguji2,'dosen');
							                				echo "[".$penguji2->noreg."] ".$penguji2->nama;
							                				?>
							                			</td>
							                			<td><?= $this->Model->jumlah_revisi($nim,$penguji2->noreg);?></td>
							                			<td><label id="na_penguji2">
							                				<?php $nilai2=$this->Model->read_detail_dual('nim',$nim,'penguji',$penguji2->noreg,'penilaian');
							                				if (!empty($nilai2->nilai_akhir)) {
							                					echo $nilai2->nilai_akhir;
							                				}else{
							                					echo "-";
							                				}
							                				?></label>
							                			</td>
							                			<td><label id="huruf-penguji2"></label></td>
							                			<?php 
							                			if (!empty($nilai2->nilai_akhir)) {?>
							                				<script type="text/javascript">
							                					konversi(document.getElementById("na_penguji2").innerHTML,'penguji2');
							                				</script>	
							                			<?php	}
							                			?> 
							                		</tr>
							                		<tr>
							                			<td style="text-align: center;">
							                				3
							                			</td>
							                			<td>
							                				<?php $pembimbing=$this->Model->read_detail('noreg',$jadwal->pembimbing,'dosen');
							                				echo "[".$pembimbing->noreg."] ".$pembimbing->nama;
							                				?>
							                			</td>
							                			<td><?= $this->Model->jumlah_revisi($nim,$pembimbing->noreg);?></td>
							                			<td><label id="na_penguji3">
							                				<?php $nilai3=$this->Model->read_detail_dual('nim',$nim,'penguji',$pembimbing->noreg,'penilaian');
							                				if (!empty($nilai3->nilai_akhir)) {
							                					echo $nilai3->nilai_akhir;
							                				}else{
							                					echo "-";
							                				}
							                				?></label>
							                			</td>
							                			<td><label id="huruf-penguji3"></label></td>
							                			<?php 
							                			if (!empty($nilai3->nilai_akhir)) {?>
							                				<script type="text/javascript">
							                					konversi(document.getElementById("na_penguji3").innerHTML,'penguji3');
							                				</script>	
							                			<?php	}
							                			?> 
							                		</tr>
							                		<?php ?>
							                	</tbody>
							                	<tfoot>
							                		<tr>
							                			<th colspan="2" style="text-align: right;">Kesimpulan</th>
							                			<th><?= $this->Model->jumlah_revisi($nim,$penguji1->noreg)+$this->Model->jumlah_revisi($nim,$penguji2->noreg)+$this->Model->jumlah_revisi($nim,$pembimbing->noreg)?> Revisi</th>
							                			<th><label id="na_total"><?php 
							                			if (!empty($nilai1->nilai_akhir) && !empty($nilai2->nilai_akhir) && !empty($nilai3->nilai_akhir)) {
							                				echo number_format((float)($nilai1->nilai_akhir + $nilai2->nilai_akhir + $nilai3->nilai_akhir)/3, 2, '.', '');
							                			}
							                			?></label> <?php if (!empty($nilai1->nilai_akhir) && !empty($nilai2->nilai_akhir) && !empty($nilai3->nilai_akhir)) {
							                				if (number_format((float)($nilai1->nilai_akhir + $nilai2->nilai_akhir + $nilai3->nilai_akhir)/3, 2, '.', '')>=56) {
							                					$data_update=array(
							                						'status' => 'lulus',
							                						'tgl_lulus' => date('Y-m-d H:i:s')
							                						);
							                					if ($this->Model->update_data($data_update,'nim',$nim,'judul_skripsi')) {
							                						echo "<script>alert('Mahasiswa ".$nim." Dinyatakan LULUS Pada Tanggal: ".date('Y-m-d H:i:s')."');</script>";
							                					}
							                					echo "[LULUS]";
							                				}else{
							                					$data_update=array(
							                						'status' => 'tl',
							                						'tgl_lulus' => date('Y-m-d H:i:s')
							                						);
							                					if ($this->Model->update_data($data_update,'nim',$nim,'judul_skripsi')) {
							                						echo "<script>alert('Mahasiswa ".$nim." Dinyatakan TIDAK LULUS Pada Tanggal: ".date('Y-m-d H:i:s')."');</script>";
							                					}
							                					echo "[TIDAK LULUS]";
							                				}
							                			} ?></th>
							                			<th><label id="huruf-totalakhir"></label></th>
							                			<?php 
							                			if (!empty($nilai1->nilai_akhir) && !empty($nilai2->nilai_akhir) && !empty($nilai3->nilai_akhir)) {?>
							                				<script type="text/javascript">
							                					konversi(document.getElementById("na_total").innerHTML,'totalakhir');
							                				</script>	
							                			<?php	}
							                			?> 
							                		</tr>
							                	</tfoot>
							                	
							                </table>
						        		</div>
						        		<div class="col-md-1"></div>
					        		</div>
					        	</div>
					      	</div>
				    	</div>
				        <!-- /.tab-content -->
			      	</div>
		          <!-- /.nav-tabs-custom -->
		        </div>
		        <!--/.col (left) -->
	     	</div>
	      <!-- Default box -->
	    </section>
	    <!-- /.content -->
	</div>
  <!-- /.content-wrapper -->

	<?php $this->load->view('dospem/layout/bot'); ?>

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
  

  var treeoutline = document.getElementById("treedaftar");
  var status_outline = document.getElementById("penilaian_sidang");
  
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

<script src="<?php echo base_url(); ?>assets/plugins/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>
<!-- <script type="text/javascript">
$(document).ready(function() {
	var tanggal=document.getElementById("min-date").value;
  if (tanggal) {
  	alert('Ada');
  }else{
  	alert('Kosong');
  }
});
</script> -->
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
