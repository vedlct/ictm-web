<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div id=''>
    <?php  echo $info['email']; ?>
    <form method="post"action="<?php echo base_url()?>Registration/activateUser">
        <input type="hidden" value="<?php echo $info['token']?>" name="userToken">
        <input type="hidden" value="<?php echo $info['userId']?>" name="userId">
        <input type="submit" value="Activate">
    </form>
</div>

</body>
</html>