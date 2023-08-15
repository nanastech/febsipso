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
          <small class="label bg-green">Dosen</small>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?php echo base_url(); ?>Dospem/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview" id="treeoutline">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Proposal Outline</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow"><?php //=$this->Model->dosenpa_verify_outline($this->session->userdata('username'))?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="status_outline" class=""><a href="<?php echo base_url(); ?>Dospem/status_outline/"><i class="fa fa-circle-o"></i> Status Outline <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?php //=$this->Model->dosenpa_verify_outline($this->session->userdata('username'))?></small></a></li>
          </ul>
        </li>
        <li id="log_book" class="">
          <a href="<?php echo base_url(); ?>Dospem/log_book">
            <i class="fa fa-book"></i> <span>Log Book</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?=$this->Model->notif_logbook_pembimbing($this->session->userdata('username'))?></small>
            </span>
          </a>
        </li>
        <li class="treeview" id="treedaftar">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Sidang Skripsi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow"><?=$this->Model->dospem_verify_daftarsidang($this->session->userdata('username'))?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="statussidangskripsi"><a href="<?php echo base_url(); ?>Dospem/status_sidang/"><i class="fa fa-circle-o"></i> Status Pendaftaran <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->dospem_verify_daftarsidang($this->session->userdata('username'))?></small></a></li>
            <li id="penilaian_sidang"><a href="<?php echo base_url(); ?>Dospem/mahasiswa_sidang/"><i class="fa fa-circle-o"></i> Penilaian Sidang</a></li>
            <li id="revisi_sidang"><a href="<?php echo base_url(); ?>Dospem/mahasiswa_revisi/"><i class="fa fa-circle-o"></i> Revisi Sidang</a></li>
          </ul>
        </li>
        <li class="header">SUB NAVIGATION</li>
        <li id="ganti_judul"><a href="<?= base_url('Dospem/ganti_judul/')?>"><i class="fa fa-flag-o"></i> <span>Ganti Judul Skripsi</span> <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_ganti_judul_dospem($this->session->userdata('username'))?></small></a></li>
        <!-- <li id="ganti_pembimbing"><a href="<?= base_url('Mahasiswa/')?>"><i class="fa fa-exchange"></i> <span>Ganti Pembimbing Skripsi</span></a></li> -->
        <li id="helpdesk"><a href="<?= base_url('Dospem/help_desk/')?>"><i class="fa fa-commenting-o"></i> <span>Help Desk</span></a></li>
     <!--    <li class="header">LABELS</li> -->
        <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
