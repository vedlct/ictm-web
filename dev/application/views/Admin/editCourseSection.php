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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit Course Section </h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Course</li>
                        <li><i class="fa fa-files-o"></i>Edit Course Section</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Course Section
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($coursedataall as $cd) { ?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo base_url()?>Admin/CourseSection/editCourseSec/<?php echo $cd->courseSectionId?>" onsubmit="return formsubmited()">





                                                <label class="control-label col-lg-2">Title : <span class="required">*</span></label>
                                                <div class="col-lg-10 form-group">
                                                    <p><font color="red"> <?php echo form_error('textbox'); ?></font></p>
                                                    <input class="form-control" type='textbox' id='textbox1'
                                                          value="<?php echo $cd->courseSectionTitle?>" name="textbox">
                                                </div>
                                                <label class="control-label col-lg-2">Content : </label>
                                                <div class="col-sm-10 form-group">
                                                    <p><font color="red"> <?php echo form_error('text'); ?></font></p>
                                                    <textarea class="form-control ckeditor" id="ckeditor" name="text"
                                                              rows="6"><?php echo $cd->courseSectionContent?></textarea>
                                                </div>

                                    <label class="control-label col-lg-2" for="inputSuccess">Course Section Status<span class="required">*</span></label>
                                    <div class="col-lg-10 form-group">
                                        <p><font color="red"> <?php echo form_error('status'); ?></font></p>
                                        <select class="form-control m-bot15" name="status" required>
                                            <option value="" selected><?php echo SELECT_STATUS ?></option>
                                            <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                <option value="<?php echo STATUS[$i]?>" <?php if (!empty($cd->courseSectionStatus) && $cd->courseSectionStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                            <?php } ?>

                                        </select>
                                    </div>




                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>

                            </form>
                            <?php
                            }
                            ?>
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

<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script>
    function formsubmited() {
        var title =  document.getElementById("textbox1").value;
        if (title.length >100){
            alert("Course Title Should not more than 100 Charecter Length");
            return false;
        }
        else
        {
            return true;

        }
    }
</script>