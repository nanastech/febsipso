  <script type="text/javascript">
    function lihatnotif(){
           $.ajax({   
                    url: "<?=base_url('Mahasiswa/testdah/'.$this->session->userdata('username'));?>", 
                    type: "POST", 
                    // data: test,
                    success: function(data) {
                      document.getElementById("notif01").innerHTML='0';
                      document.getElementById("notif02").innerHTML='0';
                    }
                });
       
      }
  </script>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?=base_url('Mahasiswa')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="font-size: 12px"><b>FTI</b>SO</span>
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
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="lihatnotif()">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><div id="notif02"><?= $this->Model->notif($this->session->userdata('username'))?></div></span>
            </a>
            <ul class="dropdown-menu" style="    width: 335px;">
              <li class="header">You have <span id="notif01"><?= $this->Model->notif($this->session->userdata('username'))?></span> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                <?php 
                  $notification = $this->Model->read_orderby('username',$this->session->userdata('username'),'info','tanggal','desc');
                  if (empty($notification)) {
                    }else{
                      foreach ($notification as $row) { ?>
                        <li><!-- start message -->
                          <a href="<?= base_url($row['link'])?>">
                            <div class="pull-left">
                              <img src="<?php echo base_url('asset/img/logo.png'); ?>" class="img-circle" alt="User Image">
                            </div>
                            <h4>
                              <?= $row['dari']?>
                              <small><i class="fa fa-clock-o"></i>&nbsp;<?= $row['tanggal']?></small>
                            </h4>
                            <p><?= $row['info']?></p>
                          </a>
                        </li>
                  <?php }
                  } ?>
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('asset/img/logo.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('asset/img/logo.png'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('name');?><br/>
                  <small><?=$this->session->userdata('username');?></small>
                  <small class="label bg-yellow">Mahasiswa</small>
                  
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('mahasiswa/ganti_password/')?>" class="btn btn-default btn-flat">Change Password</a>
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
