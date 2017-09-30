<!DOCTYPE html>
<html lang="en">
<!-- view head ----->
<head>
    <?php include('head.php') ?>
    <!-- view head  end----->
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i>College Info Edit</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/CollegeInfo/createCollegeInfo">College Info</a></li>

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
                            College Info
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($infodata as $infd) { ?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo base_url()?>Admin/CollegeInfo/editCollegeInfo/<?php echo $infd->collegeInfoId?>" onsubmit="return submitform()">
                                    <div class="form-group ">
                                        <label for="college_name" class="control-label col-lg-2">College Name <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('college_name'); ?></font></p>
                                            <input class="form-control" id="college_name" name="college_name" value="<?php echo htmlspecialchars(stripslashes($infd->collegeName))?>" type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="event_content" class="control-label col-lg-2">College Location <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('college_location'); ?></font></p>
                                            <textarea class="form-control " name="college_location"  id="college_location" required><?php echo $infd->collegeAddress?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="college_tel1" class="control-label col-lg-2">College Telephone 1: <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_tel1'); ?></font></p>
                                            <input class="form-control" id="college_tel1" name="college_tel1"  placeholder="only number max 45 " value="<?php echo $infd->collegeTelephone1?>" type="text" required />

                                        </div>

                                        <label for="college_tel2" class="control-label col-lg-2">College Telephone 2:</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_tel2'); ?></font></p>
                                            <input class="form-control" id="college_tel2" name="college_tel2" placeholder="only number max 45 " value="<?php echo $infd->collegeTelephone2?>" type="text" />

                                        </div>

                                    </div>

                                    <div class="form-group ">

                                        <label for="college_fax" class="control-label col-lg-2">College Fax: <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_fax'); ?></font></p>
                                            <input class="form-control" id="college_fax" name="college_fax" value="<?php echo htmlspecialchars(stripslashes($infd->collegeFax))?>" type="text" required />
                                        </div>

                                        <label for="college_email" class="control-label col-lg-2">College Email <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_email'); ?></font></p>
                                            <input class="form-control" id="college_email" name="college_email" value="<?php echo $infd->collegeEmail?>"  type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group ">

                                        <label for="college_domain" class="control-label col-lg-2">College Domain <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_domain'); ?></font></p>
                                            <input class="form-control" id="college_domain" name="college_domain" value="<?php echo htmlspecialchars(stripslashes($infd->collegeDomain))?>" type="text" required />
                                        </div>

                                        <label for="college_facebook" class="control-label col-lg-2">College Facebook <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_facebook'); ?></font></p>
                                            <input class="form-control" id="college_facebook" name="college_facebook" value="<?php echo htmlspecialchars(stripslashes($infd->collegeFacebook))?>" type="text" required />
                                        </div>



                                    </div>

                                    <div class="form-group ">

                                        <label for="college_twitter" class="control-label col-lg-2">College Twitter <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_twitter'); ?></font></p>
                                            <input class="form-control" id="college_twitter" name="college_twitter" value="<?php echo htmlspecialchars(stripslashes($infd->collegeTwitter))?>" type="text" required />
                                        </div>

                                        <label for="college_linkedin" class="control-label col-lg-2">College LinkedIn <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_linkedin'); ?></font></p>
                                            <input class="form-control" id="college_linkedin" name="college_linkedin" value="<?php echo htmlspecialchars(stripslashes($infd->collegeLinkedIn))?>" type="text" required />
                                        </div>
                                        
                                    </div>

                                    <div class="form-group ">

                                        <label for="college_google" class="control-label col-lg-2">College Google <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_google'); ?></font></p>
                                            <input class="form-control" id="college_google" name="college_google" value="<?php echo htmlspecialchars(stripslashes($infd->collegeGoogle))?>" type="text" required />
                                        </div>

                                        <label for="college_youtube" class="control-label col-lg-2">College Youtube <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_youtube'); ?></font></p>
                                            <input class="form-control" id="college_youtube" name="college_youtube"  value="<?php echo htmlspecialchars(stripslashes($infd->collegeYoutube))?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group ">

                                        <label for="college_status" class="control-label col-lg-2">College Status <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('college_status'); ?></font></p>
                                            <select class="form-control" id="college_status" name="college_status" required>

                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($infd->collegeInfoStatus) && $infd->collegeInfoStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>

                                            </select>

                                        </div>
                                    </div>

                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>


                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>

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

<script type="text/javascript">

    function submitform(){
        var phone1=document.getElementById("college_tel1").value;
        var phone2=document.getElementById("college_tel2").value;
        var email=document.getElementById("college_email").value;
        var chk=/^[0-9]*$/;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(!phone1.match(chk)) {
            alert( 'Please enter a valid Phone number!!' );
            return false;
        }
        if(phone1.length >45) {
            alert( 'Phone number must be less than 45 charecter!!' );
            return false;
        }

        if( phone2!=null && !phone2.match(chk)) {
            alert( 'Please enter a valid Phone number!!' );
            return false;
        }
        if(phone2!=null && phone2.length >45) {
            alert( 'Phone number must be less than 45 charecter!!' );
            return false;
        }

        if(email.match(mailformat))
        {
            return true;
        }
        else
        {
            alert("You have entered an invalid email address!");
            return false;
        }

    }
</script>