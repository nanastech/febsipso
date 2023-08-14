<!-- ======= Header ======= -->
<header id="header" class="fixed-top main-color-perbanas">
	<div class="container d-flex align-items-center justify-content-between">
		  <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>asset/img/Logo-Horizontal-white-tx-250.png" class="img-fluid" alt=""></a>
		<!-- Uncomment below if you prefer to use text as a logo -->
		<!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link scrollto" href="#hero">Home</a></li>
				<!--<li><a class="nav-link scrollto" href="#jadwal">Jadwal</a></li> -->
				<!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
				<li><a class="nav-link scrollto" href="#team">Team</a></li>
				<?php if ($this->session->userdata('username')) { ?>
					<li><a class="nav-link scrollto" href="<?=base_url('Auth/login'); ?>">Dashboard</a></li>
					<li><a class="nav-link scrollto" href="<?=base_url('Auth/logout'); ?>">Logout</a></li>
				<?php }else{ ?>
					<li><a class="nav-link scrollto" href="<?=base_url('Auth/login'); ?>">Login</a></li>
				<?php } ?>
			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav><!-- .navbar -->

	</div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

	<div class="container" style="margin-top: 80px;">
		<div class="row">
			<div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
				<h1>Aplikasi Sistem Informasi Pelaksanaan Skripsi Online</h1>
				<h2>Sistem informasi pelaksanaan skripsi online ini merupakan aplikasi yang digunakan mahasiswa Perbanas Institute
					untuk mempermudah proses pengumpulan berkas dan bimbingan skripsi/thesis.</h2>
			  <br>
			</div>
			<div class="col-lg-6 order-1 order-lg-2 hero-img">
				<img src="<?= base_url(); ?>asset/img/hero-img.png" class="img-fluid" alt="">
			</div>
		</div>
	</div>

</section><!-- End Hero -->

<main id="main">
	  <section id="team" class="team section-bg">
		<div class="container text-center">
			<div class="section-title">
				<h2>Team</h2>
			</div>
			  <div class="row">
				<div class="d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/we2.png" class="img-fluid" style="width: 2500px; height: 250px" alt="Responsive image">
						</div>
					</div>
				</div>
			  </div>
			  <div class="row">
				<div class="d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/we1.png" class="img-fluid" style="width: 2500px; height: 250px" alt="Responsive image">
						</div>
					</div>
				</div>
			  </div>
			<div class="row">
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/i.jpg" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Idham Mulya</h4>
							  <h4>1313000005</h4>
							  <span>Project Manager</span>
							</center>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/ir.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>M. Irsan Anugrah</h4>
							  <h4>1313000013</h4>
							  <span>Project Manager</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/do1.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Fadho'il Pamuji</h4>
							  <h4>1314000008</h4>
							  <span>Software Developer</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/al.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Ali Akbar</h4>
							  <h4>1314000007</h4>
							  <span>Software Developer</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/sq.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Shidqur Rachman</h4>
							  <h4>1314000012</h4>
							  <span>Software Developer</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/st.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Amadeus Satria P.H </h4>
							  <h4>1513000005</h4>
							  <span>System Designer</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/de.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Anissa Dea Tachry </h4>
							  <h4>1513000024</h4>
							  <span>System Designer</span>
							</center>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/rc.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Rachma Sari D</h4>
							  <h4>1314000013</h4>
							  <span>Database Specialist</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/bl.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Anabella Mayzira</h4>
							  <h4>1414000024</h4>
							  <span>Database Specialist</span>
							</center>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/stl.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Stela Veranita Anwar</h4>
							  <h4>1414000013</h4>
							  <span>Database Specialist</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/sp.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Syarifah Nurul M</h4>
							  <h4>1314000017</h4>
							  <span>System Analyst</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/rt.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Rizky Rianti</h4>
							  <h4>1414000001</h4>
							  <span>System Analyst</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/mi.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>M Idham</h4>
							  <h4>1513000003</h4>
							  <span>System Analyst</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/rs.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Rizka Amalia</h4>
							  <h4>1315000005</h4>
							  <span>Network Specialist</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/fr.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Frandy Kurnianto</h4>
							  <h4>1315000003</h4>
							  <span>Network Specialist</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/jn.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Jasmine Damayanti </h4>
							  <h4>1415000004</h4>
							  <span>Network Specialist</span>
							</center>
						</div>
					</div>
				</div>
				  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
					<div class="member">
						<div class="member-img">
							<img src="<?= base_url('') ?>/asset/img/team/ft.png" class="img-fluid" alt="">
						</div>
						<div class="member-info">
							<center>
							  <h4>Firsta Samudera D</h4>
							  <h4>1415000003</h4>
							  <span>Network Specialist</span>
							</center>
						</div>
					</div>
				</div>

			</div>

		</div>
	</section><!-- End Team Section -->