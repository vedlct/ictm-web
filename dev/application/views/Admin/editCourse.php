<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('leftNavigation.php')?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit Course</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Course</li>
                        <li><i class="fa fa-files-o"></i>Edit Course</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($coursealldata as $cad)?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo base_url()?>Admin/Course/editCourse/<?php echo $cad->courseId?>" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Name <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('name'); ?></font></p>
                                                <input class="form-control"  name="name"  value="<?php echo $cad->courseTitle?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Code Pearson <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('code'); ?></font></p>
                                                <input class="form-control"  name="code"  value="<?php echo $cad->courseCodePearson?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Award <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('award'); ?></font></p>
                                                <input class="form-control"  name="award"  value="<?php echo $cad->awardingTitle?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Code  <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('codeperson'); ?></font></p>
                                                <input class="form-control"  name="codeperson" value="<?php echo $cad->courseCodeIcon?>"  type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Location <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('location'); ?></font></p>
                                                <input class="form-control"  name="location"  value="<?php echo $cad->couseLocation?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Awarding body <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('awardingBody'); ?></font></p>
                                                <input class="form-control"  name="awardingBody"  value="<?php echo $cad->awardingBody?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Credit Value <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('credit'); ?></font></p>
                                                <input class="form-control"  name="credit" value="<?php echo $cad->creditValue?>"  type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Structure <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('structure'); ?></font></p>
                                                <textarea class="form-control"  name="structure"  value="" type="text" required ><?php echo $cad->courseStructutre?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Accreditation <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('accreditation'); ?></font></p>
                                                <input class="form-control"  name="accreditation"  value="<?php echo $cad->accreditationType?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Accreditation No <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('accreditationNo'); ?></font></p>
                                                <input class="form-control"  name="accreditationNo" value="<?php echo $cad->accreditationNumber?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Duration <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('duration'); ?></font></p>
                                                <input class="form-control"  name="duration"  value="<?php echo $cad->courseDuration?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Academic year<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('year'); ?></font></p>
                                                <input class="form-control"  name="year" value="<?php echo $cad->academicYear?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Mode of Study<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('mode'); ?></font></p>
                                                <input class="form-control"  name="mode" value="<?php echo $cad->studyMode?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Language of study <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('language'); ?></font></p>
                                                <input class="form-control"  name="language" value="<?php echo $cad->studyLanguage?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Fees<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('fees'); ?></font></p>
                                                <textarea class="form-control"  name="fees" value="" type="text" required ><?php echo $cad->courseFees?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Timetables<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('timetables'); ?></font></p>
                                                <input class="form-control"  name="timetables" value="<?php echo $cad->timeTable?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label class="control-label col-lg-2" for="inputSuccess">Course Status<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('status'); ?></font></p>
                                                <select class="form-control m-bot15" name="status" required>

                                                    <option value=""><?php echo SELECT_STATUS?></option>
                                                    <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                        <option value="<?php echo STATUS[$i]?>"<?php if (!empty($cad->courseStatus) && $cad->courseStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="control-label col-lg-2" for="inputSuccess">Department<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('department'); ?></font></p>
                                                <select class="form-control m-bot15" name="department"required>
                                                    <option value="" selected><?php echo SELECT_DEPARTMENT ?></option>
                                                    <?php foreach ($departmentName as $dn) { ?>
                                                        <option value="<?php echo $dn->departmentId?>" <?php if (!empty($dn->departmentName) && $dn->departmentName == $dn->departmentName)  echo 'selected = "selected"'; ?>><?php echo $dn->departmentName?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">

                                        <div class="col-lg-6">
                                            <label for="curl" class="control-label col-lg-2">Image</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="image" type="file" name="image"  />
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Course/showImageForEdit/<?php echo $cad->courseId?>" target="_blank"><span> <?php echo $cad->courseImage?></span></a>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group" align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
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
<div class="text-right">
    <div class="credits">
        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
        -->
        <a href="#">Icon College</a> by <a href="#">A2N</a>
    </div>
</div>
</section>
<!-- container section end -->

<!-- javascripts -->
<?php include ('js.php')?>


</body>
</html>
