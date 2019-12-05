<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--top Navigation start-->
    <?php include ('topNavigation.php')?>
    <!--top Navigation end-->
    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp User</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>User</li>
                        <li><i class="fa fa-files-o"></i><a href="<?php echo base_url()?>/Admin/User/newUser">Create a New User</a></li>
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

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            New User
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewUser" method="POST" action="<?php echo base_url() ?>Admin/User/createUserRole" enctype="multipart/form-data" onsubmit="return checkvalidation()">


                                    <div class="form-group">
                                        <label class="control-label col-lg-2">User<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15" name="userId" id="pagetype" onchange="checkPageType()" required>
                                                <option value="" >Select User</option>
                                                <?php foreach ($user as $user){ ?>
                                                    <option value="<?php echo $user->userId ?>"><?php echo $user->userEmail ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">User Role<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <?php foreach ($menu as $menu){ ?>
                                            <input tabindex="8"  type="checkbox"  name="menuId" value="<?php echo $menu->id ?>">&nbsp;<?php echo $menu->menuName ?><br>
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" onclick="return ValidateEmail()" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>
                            </form>
                        </div>

                </div>
        </section>
        </div>
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

<?php include ('js.php')?>
</body>
</html>

<script>
    function ValidateEmail(){
        var userPassword = document.getElementById('userPassword').value;
        if (userPassword.length < 6) {
            alert('Please Enter at least 6 digit Password');
            return false; // keep form from submitting
        }

        var email=document.getElementById("userEmail").value;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(email.match(mailformat))
        {
            return true;
        }
        else{
            alert("Email Address is in invalid format!");
            return false;
        }
    }
</script>



