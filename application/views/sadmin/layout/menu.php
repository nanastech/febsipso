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
          <p><?= ucwords($this->session->userdata('name'));?></p>
          <small class="label bg-red">Super Admin</small>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard">
          <a href="<?php echo base_url(); ?>superadmin/">
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
            <li id="daftar_akun" ><a href="<?php echo base_url(); ?>Superadmin/daftar_akun/"><i class="fa fa-circle-o"></i> Daftar Akun</a></li>
            <li id="daftar_mhs" ><a href="<?php echo base_url(); ?>Superadmin/daftar_mhs/"><i class="fa fa-circle-o"></i> Daftar Mahasiswa</a></li>
            <li id="daftar_dsn" ><a href="<?php echo base_url(); ?>Superadmin/daftar_dosen/"><i class="fa fa-circle-o"></i> Daftar Dosen</a></li>
            <li id="daftar_pa" ><a href="<?php echo base_url(); ?>Superadmin/daftar_dosenpa/"><i class="fa fa-circle-o"></i> Daftar Dosen PA</a></li>
            <!--<li id="daftar_dospem" ><a href="<?php echo base_url(); ?>superadmin/daftar_dospem/"><i class="fa fa-circle-o"></i> Daftar Dosen Pembimbing</a></li>-->
            <li id="daftar_kaprodi" ><a href="<?php echo base_url(); ?>Superadmin/daftar_kaprodi/"><i class="fa fa-circle-o"></i> Daftar Kaprodi</a></li> 
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
