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
          <p  style="width: 150px; white-space: nowrap;
    overflow: hidden;text-overflow: ellipsis;"><?=$this->session->userdata('name');?></p>
          <small class="label bg-yellow">Mahasiswa</small>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?php echo base_url(); ?>Mahasiswa/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview" id="treeoutline">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Proposal Outline</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="daftar_outline"><a href="<?php echo base_url(); ?>Mahasiswa/daftar_outline/"><i class="fa fa-circle-o"></i> Formulir Pendaftaran</a></li>
            <li id="status_outline" class=""><a href="<?php echo base_url(); ?>Mahasiswa/status_outline/"><i class="fa fa-circle-o"></i> Status Outline</a></li>
            <li id="log_outline" class=""><a href="<?php echo base_url(); ?>Mahasiswa/log_outline/"><i class="fa fa-circle-o"></i> Log Outline</a></li>
          </ul>
        </li>
        <li id="log_book">
          <a href="<?php echo base_url(); ?>Mahasiswa/log_book">
            <i class="fa fa-book"></i> <span>Log Book</span>
          </a>
        </li>
        <li class="treeview" id="treedaftar">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Sidang Skripsi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="formulir"><a href="<?php echo base_url(); ?>Mahasiswa/forms_daftar/"><i class="fa fa-circle-o"></i> Formulir Pendaftaran</a></li>
            <li id="statusform" class=""><a href="<?php echo base_url(); ?>Mahasiswa/status_sidang/"><i class="fa fa-circle-o"></i> Status Pendaftaran</a></li>
            <li id="revisisidang" class=""><a href="<?php echo base_url(); ?>Mahasiswa/list_revisi/"><i class="fa fa-circle-o"></i> Revisi Sidang</a></li>
          </ul>
        </li>
            <li class="header">SUB NAVIGATION</li>
            <?php $cek_skripsi=$this->Model->read_detail('nim',$this->session->userdata('username'),'judul_skripsi');
               $cek_dospem=$this->Model->read_detail('nim',$this->session->userdata('username'),'dospem');
              if ($cek_skripsi && $cek_dospem->noreg) {?>
                <li id="ganti_judul"><a href="<?= base_url('Mahasiswa/ganti_judul/')?>"><i class="fa fa-flag-o"></i> <span>Ganti Judul Skripsi</span></a></li>
                <li id="ganti_pembimbing"><a href="<?= base_url('Mahasiswa/ganti_pembimbing/')?>"><i class="fa fa-exchange"></i> <span>Ganti Pembimbing Skripsi</span></a></li>
            <?php  }
            ?>
            
            <li id="helpdesk"><a href="<?= base_url('Mahasiswa/help_desk/')?>"><i class="fa fa-commenting-o"></i> <span>Help Desk</span></a></li>

            <li class="header">INFORMATION</li>
            <li id="userguide"><a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank"><i class="fa fa-support"></i> <span>User Guide PERBANAS SIPSO</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>