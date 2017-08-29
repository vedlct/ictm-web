<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>

<!--    <noscript>-->
<!--        <span style="color: red;align-content:center;"><strong>Notice: </strong> JavaScript is not enabled. <a href="http://enable-javascript.com/" class="alert-link">Please Enable JavaScript Safley</a>.</span>-->
<!--             <style>form{ display:none; }</style>-->
<!--    </noscript>-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" method="post" action="<?php echo base_url()?>Admin/Login/check_user">
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
