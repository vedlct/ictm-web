<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('Admin/head.php') ?>
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method="post" action="<?php echo base_url()?>Login/check_user">
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <p><font color="red"> <?php echo form_error('useremail'); ?></font></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="email" class="form-control" placeholder="UserEmail" name="useremail" autofocus required >
            </div>
            <p><font color="red"> <?php echo form_error('password'); ?></font></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" value="Login">Login</button>
            <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
        </div>
      </form>

    </div>


  </body>
</html>
