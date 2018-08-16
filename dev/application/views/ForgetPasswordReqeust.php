<!DOCTYPE html>
<html lang="en">
<body>

<div align="center"> <h3>We received a request to reset your password !</h3></div>
Use the link below to set up a new password for your account. If you did not request to reset your password, Please Contact Us.<br>
------------------------<br>
Username: <?php  echo $mailData['email']; ?><br>
Password: <?php  echo $mailData['password']; ?><br>
------------------------<br>



<a href="<?php echo base_url()?>ForgetPassChangedFromMail/<?php  echo $mailData['email']; ?>/<?php  echo $mailData['password']; ?>/<?php  echo $mailData['Token']; ?>">Please click this link to Change Your Password</a>


</body>
</html>