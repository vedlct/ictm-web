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
                            Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($coursealldata as $cad){?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo base_url()?>Admin/Course/editCourse/<?php echo $cad->courseId?>" enctype="multipart/form-data" onsubmit="return formvalidate()">
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Name <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('name'); ?></font></p>
                                                <input class="form-control"  name="name"  id="name" value="<?php echo $cad->courseTitle?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="control-label col-lg-2" for="inputSuccess">Department<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('department'); ?></font></p>
                                                <select class="form-control m-bot15" id="department" name="department"required>
                                                    <option value="" selected><?php echo SELECT_DEPARTMENT ?></option>
                                                    <?php foreach ($departmentName as $dn) { ?>
                                                        <option value="<?php echo $dn->departmentId?>" <?php if (!empty($cad->departmentName) && $cad->departmentName == $dn->departmentName)  echo 'selected = "selected"'; ?>><?php echo $dn->departmentName?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Awarding Title <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('award'); ?></font></p>
                                                <input class="form-control"  name="award"  id="award" value="<?php echo $cad->awardingTitle?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Id  <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('codeperson'); ?></font></p>
                                                <input class="form-control"  id="codeperson" name="codeperson" value="<?php echo $cad->courseCodeIcon;?>"  type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Location <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('location'); ?></font></p>
                                                <input class="form-control" id="location" name="location"  value="<?php echo $cad->couseLocation?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Awarding body <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('awardingBody'); ?></font></p>
                                                <input class="form-control" id="awardingBody" name="awardingBody"  value="<?php echo $cad->awardingBody?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Credit Value <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('credit'); ?></font></p>
                                                <input class="form-control" id="credit" name="credit" value="<?php echo $cad->creditValue?>"  type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Structure <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('structure'); ?></font></p>
                                                <textarea class="form-control" id="structure" name="structure"  value="" type="text" required ><?php echo $cad->courseStructutre?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Accreditation <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('accreditation'); ?></font></p>
                                                <input class="form-control" id="accreditation" name="accreditation"  value="<?php echo $cad->accreditationType?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Accreditation No <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('accreditationNo'); ?></font></p>
                                                <input class="form-control" id="accreditationNo" name="accreditationNo" value="<?php echo $cad->accreditationNumber?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Duration <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('duration'); ?></font></p>
                                                <input class="form-control" id="duration" name="duration"  value="<?php echo $cad->courseDuration?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Academic year<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('year'); ?></font></p>
                                                <input class="form-control" id="year" name="year" value="<?php echo $cad->academicYear?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Mode of Study<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('mode'); ?></font></p>
                                                <input class="form-control" id="mode" name="mode" value="<?php echo $cad->studyMode?>" type="text" required />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Language of study <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('language'); ?></font></p>
                                                <input class="form-control" id="language" name="language" value="<?php echo $cad->studyLanguage?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Fees<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('fees'); ?></font></p>
                                                <textarea class="form-control" id="fees" name="fees" value="" type="text" required ><?php echo $cad->courseFees?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Timetables<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('timetables'); ?></font></p>
                                                <input class="form-control" id="timetables" name="timetables" value="<?php echo $cad->timeTable?>" type="text" required />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <div class="col-lg-6">
                                            <label class="control-label col-lg-2" for="inputSuccess">Course Status<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('status'); ?></font></p>
                                                <select class="form-control m-bot15" id="status" name="status" required>

                                                    <option value=""><?php echo SELECT_STATUS?></option>
                                                    <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                        <option value="<?php echo STATUS[$i]?>"<?php if (!empty($cad->courseStatus) && $cad->courseStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="cname" class="control-label col-lg-2">Course Code Pearson <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('code'); ?></font></p>
                                                <input class="form-control" id="code" name="code"  value="<?php echo $cad->courseCodePearson?>" type="text" required />
                                            </div>
                                        </div>



                                    </div>
                                    <div class="form-group ">

                                        <div class="col-lg-6">
                                            <label for="curl" class="control-label col-lg-2">Image</label>
                                            <div class="col-lg-10">
                                                <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                                <input class="form-control " id="image" type="file" name="image"  />
                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Course/showImageForEdit/<?php echo $cad->courseId?>" target="_blank"><span> <?php echo $cad->courseImage?></span></a>
                                                <?php if ($cad->courseImage!=null){?>
                                                <a href="<?php echo base_url() ?>Admin/Course/deleteCourseImage/<?php echo $cad->courseId ?>" onclick='return confirm("Are you sure to Delete This Course Image?")'><i class="icon_trash"></i></a>
                                                <?php }?>
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
    function formvalidate() {

        var image =document.getElementById("image").value;

        if(image!='')
        {

            var ext = image.substring(image.lastIndexOf('.') + 1);
            //alert(ext);
            if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png" || ext == "PNG")
            {

            }
            else {
                alert("Upload images of correct format!!");
                return false;
            }

            var img = document.getElementById("image");
            //alert((img.files[0].size/1024));
            if((img.files[0].size/1024) >  4096)  // validation according to file size
            {
                //document.getElementById("imageerror").innerHTML="Image size too big";
                alert('Image size too big');
                return false;
            }

            //return true;
        }


        var name =  document.getElementById("name").value;
        if (length.length >255){
            alert("Course Name Should not more than 255 Charecter Length");
            return false;
        }

        var codeperson =  document.getElementById("codeperson").value;
        if (codeperson.length >100){
            alert("Course Code Pearson Should not more than 100 Charecter Length");
            return false;
        }

        var award =  document.getElementById("award").value;
        if (award.length >255){
            alert("Awarding Titlle Should not more than 255 Charecter Length");
            return false;
        }

        var Code =  document.getElementById("Code").value;
        if (Code.length >100){
            alert("Course Code Should not more than 100 Charecter Length");
            return false;
        }

        var location =  document.getElementById("location").value;
        if (location.length >100){
            alert("Course Location Should not more than 100 Charecter Length");
            return false;
        }
        var awardingBody =  document.getElementById("awardingBody").value;
        if (awardingBody.length >255){
            alert("Course Location Should not more than 255 Charecter Length");
            return false;
        }

        var credit =  document.getElementById("credit").value;
        if (credit.length >100){
            alert("Credit value Should not more than 100 Charecter Length");
            return false;
        }
        var structure =  document.getElementById("structure").value;
        if (structure.length >255){
            alert("Course Structure Should not more than 255 Charecter Length");
            return false;
        }
        var accreditation =  document.getElementById("accreditation").value;
        if (accreditation.length >100){
            alert("Course Structure Should not more than 100 Charecter Length");
            return false;
        }
        var accreditationNo =  document.getElementById("accreditationNo").value;
        if (accreditationNo.length >45){
            alert("Accreditation No Should not more than 45 Charecter Length");
            return false;
        }
        var duration =  document.getElementById("duration").value;
        if (duration.length >50){
            alert("Accreditation No Should not more than 50 Charecter Length");
            return false;
        }
        var year =  document.getElementById("year").value;
        if (year.length >100){
            alert("Accreditation No Should not more than 100 Charecter Length");
            return false;
        }

        var mode =  document.getElementById("mode").value;
        if (mode.length >100){
            alert("Study Mode Should not more than 100 Charecter Length");
            return false;
        }

        var language =  document.getElementById("language").value;
        if (language.length >100){
            alert("Study Language Should not more than 100 Charecter Length");
            return false;
        }
        var fees =  document.getElementById("fees").value;
        if (fees.length >255){
            alert("Study Fess Should not more than 255 Charecter Length");
            return false;
        }
        var timetables =  document.getElementById("timetables").value;
        if (timetables.length >255){
            alert("Course Time Table Should not more than 255 Charecter Length");
            return false;
        }

        var status =  document.getElementById("status").value;
        if (status.length >50){
            alert("Course Status Table Should not more than 50 Charecter Length");
            return false;
        }
        var department=document.getElementById("department").value;
        var chk=/^[0-9]*$/;

        if(!department.match(chk)) {
            alert( 'Please enter a valid Department number!!' );
            return false;
        }


    }
</script>
