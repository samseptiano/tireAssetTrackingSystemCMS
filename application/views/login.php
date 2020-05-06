<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url();?>assets/admin/img/logo/logo.png" rel="icon">
  <title><?php echo APPNAME ?> - <?php echo LOGIN ?></title>
  <link href="<?php echo base_url();?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/style.css">

<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("<?php echo base_url();?>assets/admin/img/login-bg.jpg");
  /* Full height */
  height: 100%; 
  width: 100%;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
<div class="login-clean bg">
             <form class="user" method="post" action="<?php echo base_url()?>Admin/Login/process_login">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="******"></div>
               <div class="form-group">
                        <select class="form-control" id="role" name="role">
                          <?php foreach($role as $r){ ?>
                          <option value="<?php echo $r->idRole?>"><?php echo $r->descRole?></option>
                          <?php } ?>
                        </select>
                    </div>
            <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
            <!-- <a href="#" class="forgot">Forgot your email or password?</a> -->
          </form>
    </div>
 
  <!-- Login Content -->
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/js/ruang-admin.min.js"></script>
</body>

</html>