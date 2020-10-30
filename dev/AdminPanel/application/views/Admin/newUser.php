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
                                <form class="form-validate form-horizontal" id="CreateNewUser" method="POST" action="<?php echo base_url() ?>Admin/User/createNewUser" onsubmit="return checkvalidation()">

                                    <div class="form-group ">
                                        <label for="feedbackByName" class="control-label col-lg-2">First Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                            <input class="form-control" id="firstName" name="firstName"  value="<?php echo set_value('firstName'); ?>" type="text" required />
                                        </div>


                                    </div>
                                    <div class="form-group ">
                                        <label for="feedbackByName" class="control-label col-lg-2">Sure Name<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('surName'); ?></font></p>
                                            <input class="form-control" id="surName" name="surName"  value="<?php echo set_value('surName'); ?>" type="text"  />
                                        </div>


                                    </div>
                                    <div class="form-group ">
                                        <label for="feedbackByName" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('userEmail'); ?></font></p>
                                            <input class="form-control" id="userEmail" name="userEmail"  type="email" onkeyup="check_email();" required />
<!--                                            <span id="email_result"></span>-->
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label for="feedbackByName" class="control-label col-lg-2">Password<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('userPassword'); ?></font></p>
                                            <input class="form-control" id="userPassword" name="userPassword"  type="password" required />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Role<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15" name="roleId" id="pagetype" onchange="checkPageType()" required>
                                                <option value="" >Select Role</option>
                                                <?php foreach ($page as $page){ ?>
                                                <option value="<?php echo $page->roleId ?>"><?php echo $page->roleName ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <select class="form-control m-bot15" name="usersStatus" id="usersStatus" onchange="checkPageType()" required>
                                                <option value="" >Select Status</option>
                                                <option  value="Active">Active</option>
                                                <option  value="Inactive">Inactive</option>
                                            </select>
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
    function checkvalidation() {

        var words = document.getElementById('surName').value;
        var wordsarray = words.split(" ");
        var numwords = wordsarray.length;

        if (numwords < 0 || numwords > 1) {
            alert('Sur Name use Single word');
            return false; // keep form from submitting
        }
    }

</script>



