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
              <p><?=$this->session->userdata('name');?></p>
              <small class="label bg-purple">Subag LAA</small>             
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
              <p style="width: 150px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                <?=$this->session->userdata('name');?>
              </p>
              <small class="label bg-maroon">Kepala Program Studi</small>             
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
        <?php 
          if ($this->session->userdata('role')=='staff') : ?>
            <li class="treeview" id="treedata">
              <a href="#">
                <i class="fa fa-table"></i> <span>Data Akun</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="daftar_akun" >
                  <a href="<?php echo base_url(); ?>Staff/daftar_akun/">
                    <i class="fa fa-circle-o"></i> Daftar Akun
                  </a>
                </li>
                <li id="daftar_mhs" >
                  <a href="<?php echo base_url(); ?>Staff/daftar_mhs/">
                    <i class="fa fa-circle-o"></i> Daftar Mahasiswa
                  </a>
                </li>
                <li id="daftar_dsn" >
                  <a href="<?php echo base_url(); ?>Staff/daftar_dosen/">
                    <i class="fa fa-circle-o"></i> Daftar Dosen
                  </a>
                </li>
                <li id="daftar_pa" >
                  <a href="<?php echo base_url(); ?>Staff/daftar_dosenpa/">
                    <i class="fa fa-circle-o"></i> Daftar Dosen PA
                  </a>
                </li>
                <!--<li id="daftar_dospem" ><a href="<?php echo base_url(); ?>superadmin/daftar_dospem/"><i class="fa fa-circle-o"></i> Daftar Dosen Pembimbing</a></li>-->
                <li id="daftar_kaprodi" >
                  <a href="<?php echo base_url(); ?>Staff/daftar_kaprodi/">
                    <i class="fa fa-circle-o"></i> Daftar Kaprodi
                  </a>
                </li> 
              </ul>
            </li>
          <?php endif?>
        <li class="treeview" id="treeoutline">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Proposal Outline</span>  
          <?php 
            if ($this->session->userdata('role')=='mahasiswa') { ?>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="daftar_outline">
                  <a href="<?php echo base_url(); ?>mahasiswa/daftar_outline/">
                    <i class="fa fa-circle-o"></i> Formulir Pendaftaran
                  </a>
                </li>
                <li id="status_outline" class="">
                  <a href="<?php echo base_url(); ?>mahasiswa/status_outline/">
                    <i class="fa fa-circle-o"></i> Status Outline
                  </a>
                </li>
                <li id="log_outline" class="">
                  <a href="<?php echo base_url(); ?>mahasiswa/log_outline/">
                    <i class="fa fa-circle-o"></i> Log Outline
                  </a>
                </li>
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                <small class="label pull-right bg-yellow"><?=$this->Model->staff_verify_outline()?></small>
              </span>
              </a>
              <ul class="treeview-menu">
              <li id="status_outline" class="">
                <a href="<?php echo base_url(); ?>Staff/status_outline/">
                  <i class="fa fa-circle-o"></i> Status Outline 
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?=$this->Model->staff_verify_outline()?>
                  </small>
                </a>
              </li>
              <li id="reportoutline" class="">
                <a href="<?php echo base_url(); ?>Staff/report_outline/">
                  <i class="fa fa-circle-o"></i> Report Outline
                </a>
              </li>
              <li id="surat_outline" class="">
                <a href="<?php echo base_url(); ?>Staff/surat_outline/">
                  <i class="fa fa-circle-o"></i> Surat Outline
                </a>
              </li>
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  <small class="label pull-right bg-yellow"><?=$this->Model->kaprodi_verify_outline($this->session->userdata('prodi'))?></small>
                </span>
                </a>
                <ul class="treeview-menu">
                  <li id="status_outline" class="">
                    <a href="<?php echo base_url(); ?>Kaprodi/status_outline/">
                      <i class="fa fa-circle-o"></i> Status Outline 
                      <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                        <?=$this->Model->kaprodi_verify_outline($this->session->userdata('prodi'))?>
                      </small>
                    </a>
                  </li>          
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  <!-- <small class="label pull-right bg-yellow"><?php //=$this->Model->dosenpa_verify_outline($this->session->userdata('username'))?></small> -->
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="status_outline" class="">
                  <a href="<?php echo base_url(); ?>Dospem/status_outline/">
                  <i class="fa fa-circle-o"></i> Status Outline 
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?php //=$this->Model->dosenpa_verify_outline($this->session->userdata('username'))?>
                  </small></a>
                </li>
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
            <li id="log_book">
              <a href="<?php echo base_url(); ?>Staff/log_book">
                <i class="fa fa-book"></i> <span>Log Book</span>
              </a>
            </li>
            <li class="treeview" id="treejadwal">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Sidang Skripsi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow"><?=$this->Model->staff_verify_daftarsidang()?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="statussidangskripsi" class="">
              <a href="<?php echo base_url(); ?>Staff/status_sidang/">
                <i class="fa fa-circle-o"></i> Status Pendaftaran 
                <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                  <?=$this->Model->staff_verify_daftarsidang()?>
                </small>
              </a>
            </li>
            <li id="penguji_sidang">
              <a href="#"><i class="fa fa-circle-o" ></i> Upload Draft
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="pengujiDA">
                  <a href="<?php echo base_url(); ?>Staff/penguji_sidang/DA">
                    <i class="fa fa-circle-o"></i> D3 Akuntansi
                  </a>
                </li>
                <li id="pengujiDKP">
                  <a href="<?php echo base_url(); ?>Staff/penguji_sidang/DKP">
                    <i class="fa fa-circle-o"></i> D3 Keuangan & Perbankan
                  </a>
                </li>
                <li id="pengujiSA">
                  <a href="<?php echo base_url(); ?>Staff/penguji_sidang/SA">
                    <i class="fa fa-circle-o"></i> S1 Akuntansi
                  </a>
                </li>
                <li id="pengujiSM">
                  <a href="<?php echo base_url(); ?>Staff/penguji_sidang/SM">
                    <i class="fa fa-circle-o"></i> S1 Manajemen
                  </a>
                </li>
                <li id="pengujiEKS">
                  <a href="<?php echo base_url(); ?>Staff/penguji_sidang/EKS">
                    <i class="fa fa-circle-o"></i> S1 Ekonomi Syariah
                  </a>
                </li>
              </ul>
            </li>
            <li id="jadwal">
              <a href="<?php echo base_url(); ?>Staff/jadwal_sidang/">
                <i class="fa fa-circle-o"></i> Jadwal Sidang
              </a>
            </li>
            <li id="berita_acara">
              <a href="<?php echo base_url(); ?>Staff/surat_sidang/">
                <i class="fa fa-circle-o"></i> Surat Berita Acara
              </a>
            </li>
          </ul>
          <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
            <li id="log_book">
              <a href="<?php echo base_url(); ?>Kaprodi/log_book">
                <i class="fa fa-book"></i> <span>Log Book</span>
              </a>
            </li>
            <li class="treeview" id="treedaftar">
              <a href="#">
                <i class="fa fa-calendar-check-o"></i><span>Sidang Skripsi</span>
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
                <li id="statussidangskripsi">
                  <a href="<?php echo base_url(); ?>Dospem/status_sidang/">
                    <i class="fa fa-circle-o"></i> Status Pendaftaran 
                    <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                      <?=$this->Model->dospem_verify_daftarsidang($this->session->userdata('username'))?>
                    </small>
                  </a>
                </li>
                <li id="penilaian_sidang">
                  <a href="<?php echo base_url(); ?>Dospem/mahasiswa_sidang/">
                    <i class="fa fa-circle-o"></i> Penilaian Sidang
                  </a>
                </li>
                <li id="revisi_sidang">
                  <a href="<?php echo base_url(); ?>Dospem/mahasiswa_revisi/">
                    <i class="fa fa-circle-o"></i> Revisi Sidang
                  </a>
                </li>
              </ul>
            </li>
        <?php }?>
          <li class="header">SUB NAVIGATION</li>
          <?php 
            if ($this->session->userdata('role')=='mahasiswa') {
              if ($cek_skripsi && $cek_dospem->noreg) {?>
                <li id="ganti_judul">
                  <a href="<?= base_url('Mahasiswa/ganti_judul/')?>">
                    <i class="fa fa-flag-o"></i>
                    <span>Ganti Judul Skripsi</span></a></li>
                <li id="ganti_pembimbing">
                  <a href="<?= base_url('Mahasiswa/ganti_pembimbing/')?>">
                    <i class="fa fa-exchange"></i>
                    <span>Ganti Pembimbing Skripsi</span>
                  </a>
                </li>
              <?php  } ?>
                <li id="helpdesk">
                  <a href="<?= base_url('Mahasiswa/help_desk/')?>">
                    <i class="fa fa-commenting-o"></i>
                    <span>Help Desk</span>
                  </a>
                </li>
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
              <li id="ganti_judul">
                <a href="<?= base_url('Staff/ganti_judul/')?>">
                  <i class="fa fa-flag-o"></i>
                  <span>Ganti Judul Skripsi</span> 
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?=$this->Model->notif_ganti_judul()?>
                  </small>
                </a>
              </li>
              <li id="ganti_pembimbing">
                <a href="<?= base_url('staff/ganti_pembimbing/')?>">
                <i class="fa fa-exchange"></i>
                <span>Ganti Pembimbing Skripsi</span>
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?=$this->Model->notif_ganti_pembimbing()?>
                  </small>
                </a>
              </li>
              <li id="helpdesk">
                <a href="<?= base_url('Staff/help_desk/')?>">
                  <i class="fa fa-commenting-o"></i>
                  <span>Help Desk</span>
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?=$this->Model->notif_help_desk()?>
                  </small>
                </a>
              </li>
              <!-- <li id="pengumuman">
                <a href="<?= base_url('Staff/pengumuman/')?>">
                  <i class="fa fa-bullhorn"></i>
                  <span>Pengumuman</span>
                </a>
              </li>             -->
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
              <li id="ganti_judul">
                <a href="<?= base_url('Kaprodi/ganti_judul/')?>">
                  <i class="fa fa-flag-o"></i>
                  <span>Ganti Judul Skripsi</span>
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?=$this->Model->notif_ganti_judul_kaprodi($this->session->userdata('prodi'))?>
                  </small>
                </a>
              </li>
              <li id="ganti_pembimbing">
                <a href="<?= base_url('Kaprodi/ganti_pembimbing/')?>">
                  <i class="fa fa-exchange"></i>
                  <span>Ganti Pembimbing Skripsi</span>
                    <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                      <?=$this->Model->notif_ganti_pembimbing_kaprodi($this->session->userdata('prodi'))?>
                    </small>
                  </a>
                </li>
              <li id="helpdesk">
                <a href="<?= base_url('Kaprodi/help_desk/')?>">
                  <i class="fa fa-commenting-o"></i>
                  <span>Help Desk</span>
                </a>
              </li>        
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
              <li id="ganti_judul">
                <a href="<?= base_url('Dospem/ganti_judul/')?>">
                  <i class="fa fa-flag-o"></i>
                  <span>Ganti Judul Skripsi</span>
                  <small class="label pull-right bg-yellow" style="margin-top: 3px;">
                    <?=$this->Model->notif_ganti_judul_dospem($this->session->userdata('username'))?>
                  </small>
                </a>
              </li>
              <!-- <li id="ganti_pembimbing">
                <a href="<?= base_url('Mahasiswa/')?>">
                  <i class="fa fa-exchange"></i>
                  <span>Ganti Pembimbing Skripsi</span>
                </a>
              </li> -->
              <li id="helpdesk">
                <a href="<?= base_url('Dospem/help_desk/')?>">
                  <i class="fa fa-commenting-o"></i>
                  <span>Help Desk</span>
                </a>
              </li>
          <?php }?>
          <li class="header">INFORMATION</li>
          <?php 
            if ($this->session->userdata('role')=='mahasiswa') { ?>
                <!-- <li id="about"><a href="<?= base_url('Mahasiswa/about/')?>"><i class="fa fa-info"></i> <span>Tentang Kami</span></a></li> -->
                <li id="userguide">
                  <a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank">
                    <i class="fa fa-support"></i>
                    <span>User Guide PERBANAS SIPSO</span>
                  </a>
                </li>
                <!-- <li id="blueprint"><a href="<?= base_url('uploads/doc/pedomanskripsi.pdf')?>" target="_blank"><i class="fa fa-book"></i> <span>Buku Biru Skripsi</span></a></li> -->
            <?php } elseif ($this->session->userdata('role')=='staff') {?>
                <li id="userguide">
                  <a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank">
                    <i class="fa fa-support"></i>
                    <span>User Guide PERBANAS SIPSO</span>
                  </a>
                </li>            
            <?php } elseif ($this->session->userdata('role')=='kaprodi') {?>
                <li id="userguide">
                  <a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank">
                    <i class="fa fa-support"></i>
                    <span>User Guide PERBANAS SIPSO</span>
                  </a>
                </li>        
            <?php } elseif ($this->session->userdata('role')=='dosen') {?>
                <li id="userguide">
                  <a href="<?= base_url('uploads/doc/userguide.pdf')?>" target="_blank">
                    <i class="fa fa-support"></i>
                    <span>User Guide PERBANAS SIPSO</span>
                  </a>
                </li>
          <?php }?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
