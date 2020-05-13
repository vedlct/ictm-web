<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>

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
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit" value="Login">Login</button>
			<label class="checkbox">
			<span class="pull-right"> <a href="#">If you forget your passoword, please contact System Administrator.</a></span>
			</label>
		</div>
      </form>

    </div>


  </body>
</html>
