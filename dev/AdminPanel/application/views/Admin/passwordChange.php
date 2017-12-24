<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Password Change</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">ChangePassword</a></li>

                    </ol>
                </div>
            </div>

            <!-- Form validations -->

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Reset Password
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewMenu" method="POST" action="<?php echo base_url() ?>Admin/Login/resetPassword" onsubmit="return formvalidate()">
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-2">Email<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                            <input class="form-control" id="email" name="email"  value="<?php echo set_value('email'); ?>" type="email" required />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="pass" class="control-label col-lg-2">Password<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('pass'); ?></font></p>
                                            <input class="form-control" id="pass" name="pass"  value="<?php echo set_value('pass'); ?>" type="password" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="conPass" class="control-label col-lg-2">Confirm Password<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('conPass'); ?></font></p>
                                            <input class="form-control" id="conPass" name="conPass"  value="<?php echo set_value('conPass'); ?>" type="password" required />
                                        </div>
                                    </div>

                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px" value="Submit">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>


                            </form>
                        </div>

                </div>
        </section>
        </div>
            <!-- page end-->

        </section>

    </section>
    <!--main content end-->

    <div class="text-right wrapper">
        <div class="credits">
            <a href="#">Icon College</a> by <a href="#">A2N</a>
        </div>
    </div>

</section>
<!-- container section end -->

<?php include('js.php') ?>


</body>
</html>

<script>
    function formvalidate() {
        var email =  document.getElementById("email").value;
        var pass =  document.getElementById("pass").value;
        var conPass =  document.getElementById("conPass").value;

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(!email.match(mailformat))
        {
            alert("You have entered an invalid email address!");
            return false;
        }

        if (pass!=conPass){
            alert("Password and Confirm Pass word Doesn't Match");
            return false;
        }
        else
        {
            return true;
        }
    }
</script>