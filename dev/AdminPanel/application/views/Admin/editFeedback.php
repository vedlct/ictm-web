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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Feedbanck</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Feedback</li>
                        <li><i class="fa fa-files-o"></i>Edit Feedback</li>
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
                            Edit Feedback
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editFeedback as $editFeedback ){?>
                                <form class="form-validate form-horizontal"  method="POST" action="<?php echo base_url() ?>Admin/Feedback/editFeedbackbyId/<?php echo $editFeedback->feedbackId?>" onsubmit="return submitform()" enctype="multipart/form-data">

                                    <div class="form-group">

                                            <label class="control-label col-lg-2" for="feedbackSource">Feedback Source<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('feedbackSource'); ?></font></p>
                                                <select class="form-control m-bot15" name="feedbackSource" id="feedbackSource" required>
                                                    <option value="" selected><?php echo SELECT_FEEDBACK_SOURCE ?></option>
                                                    <?php for ($i=0;$i<count(FEEDBACK_SOURCE);$i++){?>
                                                        <option value="<?php echo FEEDBACK_SOURCE[$i]?>" <?php if (!empty($editFeedback->feedbackSource) && $editFeedback->feedbackSource==FEEDBACK_SOURCE[$i])echo 'selected = "selected"'; ?>><?php echo FEEDBACK_SOURCE[$i]?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>



                                        <label class="control-label col-lg-2" for="feedbackApprove">Feedback Approve<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('feedbackApprove'); ?></font></p>
                                            <select class="form-control m-bot15" name="feedbackApprove" id="feedbackApprove" required>
                                                <option value=""><?php echo SELECT_FEEDBACK_APPROVE?></option>
                                                <?php for ($i=0;$i<count(SELECT_APPROVE);$i++){?>
                                                    <option value="<?php echo SELECT_APPROVE[$i]?>"<?php if (!empty($editFeedback->feedbackApprove) && $editFeedback->feedbackApprove == SELECT_APPROVE[$i])  echo 'selected = "selected"'; ?>><?php echo SELECT_APPROVE[$i]?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label for="feedbackByName" class="control-label col-lg-2">Feedback By Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('feedbackByName'); ?></font></p>
                                            <input class="form-control" id="feedbackByName" name="feedbackByName" value="<?php echo htmlspecialchars(stripslashes($editFeedback->feedbackByName))?>" type="text" required />
                                        </div>

                                        <label for="feedbackByProfession" class="control-label col-lg-2">Feedback By Profession <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('feedbackByProfession'); ?></font></p>
                                            <input class="form-control" id="feedbackByProfession" name="feedbackByProfession"  value="<?php echo htmlspecialchars(stripslashes($editFeedback->feedbackByProfession))?>" type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label for="feedbackByImage" class="control-label col-lg-2">Feedback By Image </label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('feedbackByImage'); ?></font></p>
                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="feedbackByImage" id="feedbackByImage">
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Feedback/showImageForEdit/<?php echo $editFeedback->feedbackId?>" target="_blank"><span> <?php echo $editFeedback->feedbackByPhoto?></span></a>
                                            <?php if ($editFeedback->feedbackByPhoto!=null){?>
                                                <a href="<?php echo base_url() ?>Admin/Feedback/deleteFeedbackImage/<?php echo $editFeedback->feedbackId ?>" onclick='return confirm("Are you sure to Delete This Feedback Image?")'><i class="icon_trash"></i></a>
                                            <?php }?>
                                        </div>

                                        <label class="control-label col-lg-2" for="feedbackStatus">Feedback Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('feedbackStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="feedbackStatus" id="feedbackStatus" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>" <?php if (!empty($editFeedback->feedbackStatus) && $editFeedback->feedbackStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label for="feedbackDetails" class="control-label col-lg-2">Feedback Details <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('feedbackDetails'); ?></font></p>
                                            <textarea class="form-control" name="feedbackDetails"  id="feedbackDetails" required><?php echo $editFeedback->feedbackDetails?></textarea>
                                        </div>
                                    </div>

                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>
                                </form>
                            <?php }?>
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
    function submitform() {

        var feedbackByName =  document.getElementById("feedbackByName").value;
        var feedbackByProfession =  document.getElementById("feedbackByProfession").value;

        if (feedbackByName.length >100){
            alert("Feedback By Name Should not more than 100 Charecter Length");
            return false;
        }
        if (feedbackByProfession.length >100){
            alert("Feedback By Profession Should not more than 100 Charecter Length");
            return false;
        }
        else
        {
            return true;
        }
    }
</script>
