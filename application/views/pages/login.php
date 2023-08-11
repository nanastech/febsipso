  <div class="wrapper">
      <div style="margin-bottom: 15px; margin-top: 30px;">
        <a href="<?=base_url('');?>"><img src="<?=base_url('');?>/asset/img/logofull.png" width="300px"></a>
      </div>
    <div class="formContent">
        <h2 style="margin-top:10px;">Sistem Informasi Pelaksanaan Skripsi Online</h2>
		<?php echo $notification; ?>
        <?php echo form_error('username');?>
        <?php echo form_error('password');?>
      <!-- Login Form -->
      <form action="<?=base_url('Auth/login/');?>" method="POST">
          <div class="input-group flex-nowrap input-form">
              <span class="input-group-text" id="addon-wrappin"><i class="bi bi-person-circle"></i></span>
              <input type="username" class="form-control" placeholder="Username" aria-label="Username" name="username" aria-describedby="addon-wrapping">
          </div>
          <div class="input-group flex-nowrap input-form mb-2">
              <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span>
              <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" aria-describedby="addon-wrapping">
          </div>
          <div class="d-grid gap-2 col-7 mx-auto mb-4">
              <button class="btn btn-primary" type="submit">Log In</button>
          </div>
      </form>

      <!-- Remind Passowrd -->
      <!--<div class="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div> -->

    </div>
