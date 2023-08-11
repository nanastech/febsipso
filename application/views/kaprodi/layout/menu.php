  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('uploads/img/logo.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="width: 150px; white-space: nowrap;
    overflow: hidden;text-overflow: ellipsis;"><?=$this->session->userdata('name');?></p>
          <small class="label bg-maroon">Kepala Program Studi</small>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?php echo base_url(); ?>kaprodi/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview" id="treeoutline">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Proposal Outline</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow"><?=$this->Model->kaprodi_verify_outline($this->session->userdata('prodi'))?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="status_outline" class=""><a href="<?php echo base_url(); ?>Kaprodi/status_outline/"><i class="fa fa-circle-o"></i> Status Outline <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->kaprodi_verify_outline($this->session->userdata('prodi'))?></small></a></li>
          </ul>
        </li>
        <li id="log_book">
          <a href="<?php echo base_url(); ?>Kaprodi/log_book">
            <i class="fa fa-book"></i> <span>Log Book</span>
          </a>
        </li>
        <li class="treeview" id="treedaftar">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Sidang Skripsi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow"><?=$this->Model->kaprodi_verify_daftarsidang($this->session->userdata('prodi'))?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="formulir"><a href="<?php echo base_url(); ?>Kaprodi/status_sidang/"><i class="fa fa-circle-o"></i>Status Pendaftaran <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->kaprodi_verify_daftarsidang($this->session->userdata('prodi'))?></small></a></li>
            <li id="jadwal_sidang"><a href="<?php echo base_url(); ?>Kaprodi/jadwal_sidang/"><i class="fa fa-circle-o"></i>Jadwal Sidang </a></li>
            <!-- <li id="statusform" class=""><a href="<?php echo base_url(); ?>mahasiswa/status/"><i class="fa fa-circle-o"></i> Status Formulir</a></li> -->
          </ul>
        </li>
        <li class="header">SUB NAVIGATION</li>
        <li id="ganti_judul"><a href="<?= base_url('Kaprodi/ganti_judul/')?>"><i class="fa fa-flag-o"></i> <span>Ganti Judul Skripsi</span> <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_ganti_judul_kaprodi($this->session->userdata('prodi'))?></small></a></li>
        <li id="ganti_pembimbing"><a href="<?= base_url('Kaprodi/ganti_pembimbing/')?>"><i class="fa fa-exchange"></i> <span>Ganti Pembimbing Skripsi</span><small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_ganti_pembimbing_kaprodi($this->session->userdata('prodi'))?></small></a></li>
        <li id="helpdesk"><a href="<?= base_url('Kaprodi/help_desk/')?>"><i class="fa fa-commenting-o"></i> <span>Help Desk</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
