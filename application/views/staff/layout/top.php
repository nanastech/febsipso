  
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('Staff')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size: 12px"><b>PERBANAS</b>SO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PERBANAS </b>Skripsi Online</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
     
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('uploads/img/logo.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('uploads/img/logo2.png'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('name');?>
                  <small class="label bg-purple">Subag LAA</small>
                  
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('Staff/ganti_password')?>" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <!-- <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?= base_url('Auth/logout/');?>" title="Log Out"><i class="fa fa-sign-out"></i> Log out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>