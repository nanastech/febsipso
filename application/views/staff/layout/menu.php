  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url(''); ?>/asset/img/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('name');?></p>
          <small class="label bg-purple">Subag LAA</small>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?= base_url(); ?>Staff/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview" id="treedata">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data Akun</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="daftar_akun" ><a href="<?= base_url(); ?>Staff/daftar_akun/"><i class="fa fa-circle-o"></i> Daftar Akun</a></li>
            <li id="daftar_mhs" ><a href="<?= base_url(); ?>Staff/daftar_mhs/"><i class="fa fa-circle-o"></i> Daftar Mahasiswa</a></li>
            <li id="daftar_dsn" ><a href="<?= base_url(); ?>Staff/daftar_dosen/"><i class="fa fa-circle-o"></i> Daftar Dosen</a></li>
            <li id="daftar_pa" ><a href="<?= base_url(); ?>Staff/daftar_dosenpa/"><i class="fa fa-circle-o"></i> Daftar Dosen PA</a></li>
            <!--<li id="daftar_dospem" ><a href="<?= base_url(); ?>superadmin/daftar_dospem/"><i class="fa fa-circle-o"></i> Daftar Dosen Pembimbing</a></li>-->
            <li id="daftar_kaprodi" ><a href="<?= base_url(); ?>Staff/daftar_kaprodi/"><i class="fa fa-circle-o"></i> Daftar Kaprodi</a></li> 
          </ul>
        </li>
        <li class="treeview" id="treeoutline">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Proposal Outline</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              <small class="label pull-right bg-yellow"><?=$this->Model->staff_verify_outline()?></small>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="status_outline" class=""><a href="<?= base_url(); ?>Staff/status_outline/"><i class="fa fa-circle-o"></i> Status Outline <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->staff_verify_outline()?></small></a></li>
            <li id="reportoutline" class=""><a href="<?= base_url(); ?>Staff/report_outline/"><i class="fa fa-circle-o"></i> Report Outline</a></li>
            <li id="surat_outline" class=""><a href="<?= base_url(); ?>Staff/surat_outline/"><i class="fa fa-circle-o"></i> Surat Outline</a></li>
          </ul>
        </li>
        <li id="log_book">
          <a href="<?= base_url(); ?>Staff/log_book">
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
            <li id="statussidangskripsi" class=""><a href="<?= base_url(); ?>Staff/status_sidang/"><i class="fa fa-circle-o"></i> Status Pendaftaran <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->staff_verify_daftarsidang()?></small></a>
            </li>
            <li id="penguji_sidang">
              <a href="#"><i class="fa fa-circle-o" ></i> Upload Draft
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="pengujiTI"><a href="<?= base_url(); ?>Staff/penguji_sidang/TI"><i class="fa fa-circle-o"></i> S1 Teknik Informatika</a></li>
                <li id="pengujiSI"><a href="<?= base_url(); ?>Staff/penguji_sidang/SI"><i class="fa fa-circle-o"></i> S1 Sistem Informasi</a></li>
                <li id="pengujiSK"><a href="<?= base_url(); ?>Staff/penguji_sidang/SK"><i class="fa fa-circle-o"></i> S1 Sistem Komputer</a></li>
                <li id="pengujiADB"><a href="<?= base_url(); ?>Staff/penguji_sidang/ADB"><i class="fa fa-circle-o"></i> S1 Analitika Data Bisnis</a></li>
                <li id="pengujiMAKSI"><a href="<?= base_url(); ?>Staff/penguji_sidang/MAKSI"><i class="fa fa-circle-o"></i> S2 Magister Akuntansi</a></li>
                <li id="pengujiMM"><a href="<?= base_url(); ?>Staff/penguji_sidang/MM"><i class="fa fa-circle-o"></i> S2 Magister Manajemen</a></li>
                <li id="pengujiPPAK"><a href="<?= base_url(); ?>Staff/penguji_sidang/PPAK"><i class="fa fa-circle-o"></i> Pendidikan Profesi Akuntansi</a></li>
                <li id="pengujiDA"><a href="<?= base_url(); ?>Staff/penguji_sidang/DA"><i class="fa fa-circle-o"></i> D3 Akuntansi</a></li>
                <li id="pengujiDKP"><a href="<?= base_url(); ?>Staff/penguji_sidang/DKP"><i class="fa fa-circle-o"></i> D3 Keuangan & Perbankan</a></li>
                <li id="pengujiAK"><a href="<?= base_url(); ?>Staff/penguji_sidang/AK"><i class="fa fa-circle-o"></i> S1 Akuntasi</a></li>
                <li id="pengujiM"><a href="<?= base_url(); ?>Staff/penguji_sidang/M"><i class="fa fa-circle-o"></i> S1 Manajemen</a></li>
                <li id="pengujiES"><a href="<?= base_url(); ?>Staff/penguji_sidang/ES"><i class="fa fa-circle-o"></i> S1 Ekonomi Syariah</a></li>
              </ul>
            </li>
            <li id="jadwal"><a href="<?= base_url(); ?>Staff/jadwal_sidang/"><i class="fa fa-circle-o"></i> Jadwal Sidang</a></li>
            <li id="berita_acara"><a href="<?= base_url(); ?>Staff/surat_sidang/"><i class="fa fa-circle-o"></i> Surat Berita Acara</a></li>
           


            
            <!-- <li>
              <a href="#"><i class="fa fa-circle-o"></i> Program Studi
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
           
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Teknik Informatika</a></li>
                <li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Sistem Informasi</a></li>
                <li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Sistem Komputer</a></li>
              </ul>
            </li>  -->
          </ul>
        </li>
        <li class="header">SUB NAVIGATION</li>
        <li id="ganti_judul"><a href="<?= base_url('Staff/ganti_judul/')?>"><i class="fa fa-flag-o"></i> <span>Ganti Judul Skripsi</span> <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_ganti_judul()?></small></a></li>
        <li id="ganti_pembimbing"><a href="<?= base_url('staff/ganti_pembimbing/')?>"><i class="fa fa-exchange"></i> <span>Ganti Pembimbing Skripsi</span> <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_ganti_pembimbing()?></small></a></li>
        <li id="helpdesk"><a href="<?= base_url('Staff/help_desk/')?>"><i class="fa fa-commenting-o"></i> <span>Help Desk</span> <small class="label pull-right bg-yellow" style="margin-top: 3px;"><?=$this->Model->notif_help_desk()?></small></a></li>
        <li id="pengumuman"><a href="<?= base_url('Staff/pengumuman/')?>"><i class="fa fa-bullhorn"></i> <span>Pengumuman</span> </a></li>
        <!-- <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
