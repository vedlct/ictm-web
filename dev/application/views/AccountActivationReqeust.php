<!DOCTYPE html>
<html>
<head>

</head>
<body>

Dear <?php echo $info['title']." " ;  echo  $info['firstname']." "; echo $info['surname']." "?>, <br><br>

Thanks for registering to manage your application online.<br>

Before you get started, you'll need to activate your account. You can do this by clicking on the Button below:<br><br>

<form method="post"action="<?php echo base_url()?>Registration/activateUser">
	<input type="hidden" value="<?php echo $info['token']?>" name="userToken">
	<input type="hidden" value="<?php echo $info['userId']?>" name="userId">
	<input type="submit" value="Activate">
</form>
<br><br>
<!--Or you can copy and paste the below link in your browser:<br>-->
<!---->
<!--https://iconcollege.ac.uk/Registration/activateUser<br><br>-->

Once you've activated your account, you'll be able to log in (https://www.iconcollege.ac.uk/Login) and get started.<br><br>

This is an automatically generated email. Please don't respond directly to this email as replies are not monitored.<br><br>

To contact us, please visit https://www.iconcollege.ac.uk/Contact<br><br>
<!--<div id=''>-->
<!--    --><?php // echo $info['email']; ?>
<!--    <form method="post"action="--><?php //echo base_url()?><!--Registration/activateUser">-->
<!--        <input type="hidden" value="--><?php //echo $info['token']?><!--" name="userToken">-->
<!--        <input type="hidden" value="--><?php //echo $info['userId']?><!--" name="userId">-->
<!--        <input type="submit" value="Activate">-->
<!--    </form>-->
<!--</div>-->

</body>
</html>
