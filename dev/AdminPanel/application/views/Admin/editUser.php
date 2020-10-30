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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit User</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>User</li>
                        <li><i class="fa fa-files-o"></i>Edit &nbsp; User</li>
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
                            Edit User
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editUserData as $euser) {?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post"  action="<?php echo base_url()?>Admin/User/editUser/<?php echo $euser->userId?>"  onsubmit="return checkvalidation()">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">First Name<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                            <input class="form-control" id="firstName" name="firstName"  type="text" value="<?php echo $euser->firstName;?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Sure Name<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('surName'); ?></font></p>
                                            <input class="form-control" id="surName" name="surName"  type="text" value="<?php echo $euser->surName;?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="feedbackByName" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('userEmail'); ?></font></p>
                                            <input class="form-control" id="userEmail" name="userEmail"  value="<?php echo $euser->userEmail;?>" type="email" required />
                                        </div>

                                    </div>

<!--                                    <div class="form-group">-->
<!--                                        <label class="control-label col-lg-2">Role<span class="required">*</span></label>-->
<!--                                        <div class="col-lg-10">-->
<!--                                            <select class="form-control m-bot15" name="roleId" id="pagetype" onchange="checkPageType()" required>-->
<!--                                                --><?php //foreach ($page as $page){ ?>
<!--                                                    <option value="" >Select Role</option>-->
<!--                                                    <option value="--><?php //echo $page->roleId ?><!--">--><?php //echo $page->roleName ?><!--</option>-->
<!--                                                --><?php //} ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Role<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="roleId" id="pagetype" onchange="checkPageType()" required>
                                                <option value="" >Select Role</option>
                                                <?php foreach ($page as $page) { ?>
                                                    <option <?php if($page->roleId == "$page->roleId"){ echo 'selected="selected"'; } ?> value="<?php echo $page->roleId ?>"><?php echo $page->roleName?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="usersStatus" id="usersStatus" onchange="checkPageType()" required>
                                                <option value="" >Select Status</option>
                                                <option  value="Active" <?php if($euser->usersStatus=='Active'){ echo "selected=selected";}?>>Active</option>
                                                <option  value="Inactive" <?php if($euser->usersStatus=='Inactive'){ echo "selected=selected";}?>>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" onclick="return ValidateEmail()" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" id="hide" type="reset" >
                                        </div>
                                    </div>

                            </div>

                            </form>
                            <?php } ?>
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
<!-- javascripts -->

<?php include('js.php') ?>

</body>
</html>

<script>
    function ValidateEmail(){
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

<script>
    $(document).ready(function(){
        $("#hide").click(function(){

            $("#firstName").removeAttr('value');
            $("#surName").removeAttr('value');
            $("#userEmail").removeAttr('value');
            $("#pagetype").children().removeAttr("selected");
            $("#usersStatus").children().removeAttr("selected");


        });
    });
</script>
