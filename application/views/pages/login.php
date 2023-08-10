<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/asset/css/styles.css">
    <title>Sistem Informasi Pelaksanaan Skripsi Online | Log In</title>
    <link rel="icon" href="<?=base_url('');?>/asset/img/perbanas.ico" type="image/ico">
</head>
<body>
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
   <script src="<?= base_url(); ?>/asset/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>