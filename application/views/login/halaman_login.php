<body class="hold-transition login-page">
<div class="login-box" style="margin: 2% auto;">
  <div class="login-logo" style="margin-bottom: 15px;">
    <a href="<?=base_url('');?>"><img src="<?=base_url('uploads/img/logo.png');?>" width="200px"><br/><b>Perbanas Institute</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sistem Informasi Pelaksanaan Skripsi Online</p>
    <?php echo $notification; ?>
    <?php echo form_error('username');?>
    <?php echo form_error('password');?>
    <form action="<?=base_url('Auth/login/');?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <!-- <label>
              <input type="checkbox"> Remember Me
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Log in</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <a href="#">I forgot my password</a><br> -->

  </div>

  <!-- /.login-box-body -->
</div>

  
  
<!-- /.login-box -->