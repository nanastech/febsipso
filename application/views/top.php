<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="<?=base_url()?>" class="navbar-brand"><b>PERBANAS</b>|SIPSO</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"><i class="fa fa-bars"></i></button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li id="home"><a href="<?=base_url()?>">Home <span class="sr-only">(current)</span></a></li>
          <li id="alur"><a href="#">Alur SIPSO</a></li>
          <li id="mahasiswa"><a href="<?=base_url('Front/daftar_mahasiswa/')?>">Daftar Mahasiswa</a></li>
          <li id="ujianskripsi"><a href="<?=base_url('Front/jadwal_sidang_skripsi/')?>">Jadwal Sidang Skripsi</a></li>
          <li id="tentangkami"><a href="<?=base_url('Front/tentang_kami/')?>">Tentang Kami</a></li>  
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <?php if ($this->session->userdata('username')) { ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url('uploads/img/logo.png'); ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$this->session->userdata('name')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url('uploads/img/logo2.png'); ?>" class="img-circle" alt="User Image">
                <p>
                  <?=$this->session->userdata('name');?><br/>
                  <small><?=$this->session->userdata('username');?></small>
                  <?php switch ($this->session->userdata('role')) {
                    case 'mahasiswa':
                      echo '<small class="label bg-yellow">Mahasiswa</small>';
                      break;
                    case 'dosen':
                      echo '<small class="label bg-green">Dosen</small>';
                      break;
                    case 'kaprodi':
                      echo '<small class="label bg-maroon">Kepala Program Studi</small>';
                      break;
                    case 'staff':
                      echo '<small class="label bg-purple">Subag LAA</small>';
                      break;
                    default:
                      echo '<small class="label bg-red">Super Admin</small>';
                      break;
                  } ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?=base_url('Auth/Login/')?>" class="btn btn-default btn-flat"><span class="fa fa-dashboard"></span> Dashboard</a>
                </div>
              </li>
            </ul>
              <li><a href="<?= base_url('Auth/logout/');?>" title="Log Out"><i class="fa fa-sign-out"></i> Log out</a></li>
              <?php }else{ ?>
                <a href="<?=base_url('Auth/login/')?>"><i class="fa fa-sign-in"></i> Login SIPSO</a>
              <?php } ?>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>