<?php 
  $cek_skripsi=$this->Model->read_detail('nim',$this->session->userdata('username'),'judul_skripsi');
  $cek_dospem=$this->Model->read_detail('nim',$this->session->userdata('username'),'dospem');
?>
<?php 
  if ($this->session->userdata('role')=='mahasiswa') { ?>
      
  <?php } elseif ($this->session->userdata('role')=='staff') {?>
                    
  <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                  
  <?php } elseif ($this->session->userdata('role')=='dosen') {?>

<?php }?>
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>asset/img/user.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <?php 
            if ($this->session->userdata('role')=='mahasiswa') { ?>
              <p  style="width: 150px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                <?=$this->session->userdata('name');?>
              </p>
              <small class="label bg-yellow">Mahasiswa</small>
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
                              
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                            
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
              <p style="width: 150px; white-space: nowrap; overflow: hidden;text-overflow: ellipsis;">
                <?=$this->session->userdata('name');?>
              </p>
              <small class="label bg-green">Dosen</small>
        <?php }?>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?php echo base_url(); ?>Auth/login">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview" id="treeoutline">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Proposal Outline</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <!-- <small class="label pull-right bg-yellow"><?php //=$this->Model->dosenpa_verify_outline($this->session->userdata('username'))?></small> -->
            </span>
          </a>
          <ul class="treeview-menu">
          <?php 
            if ($this->session->userdata('role')=='mahasiswa') { ?>
                <li id="daftar_outline"><a href="<?php echo base_url(); ?>mahasiswa/daftar_outline/"><i class="fa fa-circle-o"></i> Formulir Pendaftaran</a></li>
                <li id="status_outline" class=""><a href="<?php echo base_url(); ?>mahasiswa/status_outline/"><i class="fa fa-circle-o"></i> Status Outline</a></li>
                <li id="log_outline" class=""><a href="<?php echo base_url(); ?>mahasiswa/log_outline/"><i class="fa fa-circle-o"></i> Log Outline</a></li>
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
                              
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                            
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
              <li id="status_outline" class=""><a href="<?php echo base_url(); ?>Dospem/status_outline/"><i class="fa fa-circle-o"></i> Status Outline <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?php //=$this->Model->dosenpa_verify_outline($this->session->userdata('username'))?></small></a></li>
          <?php }?>
            
          </ul>
        </li>
        <?php 
          if ($this->session->userdata('role')=='mahasiswa') { 
              if ($cek_skripsi && $cek_dospem->noreg) {?>
                <li id="log_book">
                  <a href="<?php echo base_url(); ?>Mahasiswa/log_book">
                    <i class="fa fa-book"></i> <span>Log Book</span>
                  </a>
                </li>
                <!-- <li class="treeview" id="treedaftar">
                  <a href="#">
                    <i class="fa fa-edit"></i> <span>Sidang Skripsi</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li id="formulir"><a href="<?php echo base_url(); ?>mahasiswa/forms_daftar/"><i class="fa fa-circle-o"></i> Formulir Pendaftaran</a></li>
                    <li id="statusform" class=""><a href="<?php echo base_url(); ?>mahasiswa/status_sidang/"><i class="fa fa-circle-o"></i> Status Pendaftaran</a></li>
                    <li id="revisisidang" class=""><a href="<?php echo base_url(); ?>mahasiswa/list_revisi/"><i class="fa fa-circle-o"></i> Revisi Sidang</a></li>
                  </ul>
                </li> -->
              <?php  } ?>
          <?php } elseif ($this->session->userdata('role')=='staff') {?>
                      
          <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                          
          <?php } elseif ($this->session->userdata('role')=='dosen') {?>
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
        <?php }?>
          <li class="header">SUB NAVIGATION</li>
          <?php 
            if ($this->session->userdata('role')=='mahasiswa') {
              if ($cek_skripsi && $cek_dospem->noreg) {?>
                <li id="ganti_judul"><a href="<?= base_url('Mahasiswa/ganti_judul/')?>"><i class="fa fa-flag-o"></i> <span>Ganti Judul Skripsi</span></a></li>
                <li id="ganti_pembimbing"><a href="<?= base_url('Mahasiswa/ganti_pembimbing/')?>"><i class="fa fa-exchange"></i> <span>Ganti Pembimbing Skripsi</span></a></li>
            <?php  } ?>
                <li id="helpdesk"><a href="<?= base_url('Mahasiswa/help_desk/')?>"><i class="fa fa-commenting-o"></i> <span>Help Desk</span></a></li>
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
                              
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                            
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
              <li id="ganti_judul"><a href="<?= base_url('Dospem/ganti_judul/')?>"><i class="fa fa-flag-o"></i> <span>Ganti Judul Skripsi</span> <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_ganti_judul_dospem($this->session->userdata('username'))?></small></a></li>
              <!-- <li id="ganti_pembimbing"><a href="<?= base_url('Mahasiswa/')?>"><i class="fa fa-exchange"></i> <span>Ganti Pembimbing Skripsi</span></a></li> -->
              <li id="helpdesk"><a href="<?= base_url('Dospem/help_desk/')?>"><i class="fa fa-commenting-o"></i> <span>Help Desk</span></a></li>
          <?php }?>
          <li class="header">INFORMATION</li>
          <?php 
            if ($this->session->userdata('role')=='mahasiswa') { ?>
                <!-- <li id="about"><a href="<?= base_url('Mahasiswa/about/')?>"><i class="fa fa-info"></i> <span>Tentang Kami</span></a></li> -->
                <li id="userguide"><a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank"><i class="fa fa-support"></i> <span>User Guide PERBANAS SIPSO</span></a></li>
                <!-- <li id="blueprint"><a href="<?= base_url('uploads/doc/pedomanskripsi.pdf')?>" target="_blank"><i class="fa fa-book"></i> <span>Buku Biru Skripsi</span></a></li> -->
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
                <li id="userguide"><a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank"><i class="fa fa-support"></i> <span>User Guide PERBANAS SIPSO</span></a></li>            
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                <li id="userguide"><a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank"><i class="fa fa-support"></i> <span>User Guide PERBANAS SIPSO</span></a></li>        
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
                <li id="userguide"><a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank"><i class="fa fa-support"></i> <span>User Guide PERBANAS SIPSO</span></a></li>
          <?php }?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
