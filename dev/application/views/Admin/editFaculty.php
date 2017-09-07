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
                    <h3 class="page-header"><i class="fa fa-files-o"></i>Edit Faculty</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Faculties</li>
                        <li><i class="fa fa-files-o"></i>Edit Faculty</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Faculty
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editFaculty as $editFaculty){?>
                                <form class="form-validate form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>Admin/Faculty/editFacultybyId/<?php echo $editFaculty->facultyId?>" onsubmit="return submitform()">

                                    <div class="form-group ">
                                        <label for="faculty_first_name" class="control-label col-lg-2">Faculty First Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_first_name'); ?></font></p>
                                            <input class="form-control" id="faculty_first_name"  name="faculty_first_name" type="text" value="<?php echo $editFaculty->facultyFirstName?>" required />
                                        </div>

                                        <label for="faculty_last_name" class="control-label col-lg-2">Faculty Last Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_last_name'); ?></font></p>
                                            <input class="form-control" id="faculty_last_name" name="faculty_last_name"  type="text" value="<?php echo $editFaculty->facultyLastName?>" required />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="faculty_degree" class="control-label col-lg-2">Faculty Degree <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('faculty_degree'); ?></font></p>
                                            <input class="form-control" id="faculty_degree" name="faculty_degree"  type="text" placeholder="Write Multiple Degree with comma" required value="<?php echo $editFaculty->facultyDegree?>"/>
                                        </div>
                                    </div>


                                    <div class="form-group ">

                                        <label for="faculty_position" class="control-label col-lg-2">Faculty Position <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('faculty_position'); ?></font></p>
                                            <input class="form-control" id="faculty_position" name="faculty_position"  type="text" placeholder="Write Multiple Position with comma"required value="<?php echo $editFaculty->facultyPosition?>"/>
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="faculty_image" class="control-label col-lg-2">Faculty Image</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyImage'); ?></font></p>
                                            <span>Image Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="facultyImage" id="facultyImage"/>
                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Faculty/showImageForEdit/<?php echo $editFaculty->facultyId?>" target="_blank"><span> <?php echo $editFaculty->facultyImage?></span></a>
                                        </div>

                                        <label for="faculty_emp_type" class="control-label col-lg-2">Faculty Employee type <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_emp_type'); ?></font></p>
                                            <select class="form-control" id="faculty_emp_type" name="faculty_emp_type" required >

                                                <option value=""><?php echo SELECT_EMPLOYEE_TYPE?></option>
                                                <?php for ($i=0;$i<count(EMPLOYEE_TYPE);$i++){?>
                                                    <option value="<?php echo EMPLOYEE_TYPE[$i]?>"<?php if (!empty($editFaculty->facultyEmpType) && $editFaculty->facultyEmpType == EMPLOYEE_TYPE[$i])  echo 'selected = "selected"'; ?>><?php echo EMPLOYEE_TYPE[$i]?></option>
                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group ">


                                        </div>


                                        <label for="faculty_email" class="control-label col-lg-2">Faculty Email <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_email'); ?></font></p>
                                            <input class="form-control" id="faculty_email" name="faculty_email"  type="email" required value="<?php echo $editFaculty->facultyEmail?>"/>
                                        </div>

                                        <label for="faculty_phone" class="control-label col-lg-2">Faculty Phone <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_phone'); ?></font></p>
                                            <input class="form-control" id="faculty_phone" name="faculty_phone" placeholder=" phone number (only digit max 45) " type="text" required value="<?php echo $editFaculty->faultyPhone?>"/>
                                        </div>


                                    </div>

                                    <div class="form-group ">

                                        <label for="faculty_twitter" class="control-label col-lg-2">Faculty Twitter</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_twitter'); ?></font></p>
                                            <input class="form-control" id="faculty_twitter" name="faculty_twitter"  type="text" value="<?php echo $editFaculty->facultyTwitter?>"/>
                                        </div>

                                        <label for="faculty_linkedin" class="control-label col-lg-2">Faculty LinkedIn</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_linkedin'); ?></font></p>
                                            <input class="form-control" id="faculty_linkedin" name="faculty_linkedin"  type="text" value="<?php echo $editFaculty->facultyLinkedIn?>"/>
                                        </div>

                                    </div>

                                    <div class="form-group ">


                                        <label for="faculty_status" class="control-label col-lg-2">Faculty Status <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('faculty_status'); ?></font></p>
                                            <select class="form-control" id="faculty_status" name="faculty_status" required>

                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($editFaculty->facultyStatus) && $editFaculty->facultyStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>


                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="faculty_courses" class="control-label col-lg-2">Faculty Courses</label>

                                        <div class="col-lg-4" >

                                            <div class="form-group" id="CourseTable">
                                            <table class="table table-striped table-advance  table-bordered table-hover ">
                                                <tbody>
                                                <tr>

                                                    <th> Course Title</th>

                                                    <th> Action</th>
                                                </tr>
                                                <?php foreach ($facultyCourse as $facultyCourse ){?>
                                                <tr>
                                                    <td>
                                                        <?php echo $facultyCourse->courseTitle?>
                                                    </td>
                                                    <td>

                                                        <div class="btn-group">

                                                            <a class="btn" data-panel-id="<?php echo $facultyCourse->facultyCourseId ?>"  onclick="selectid1(this)" href="#"><i class="icon_trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>


                                        <label for="add_faculty_courses" class="control-label col-lg-2">Add Courses</label>
                                        <div class="col-lg-3">

                                            <select class="form-control" id="faculty_courses" name="faculty_courses">
                                                <option value="" ><?php echo SELECT_COURSE ?></option>
                                                <?php foreach ($course as $course){?>
                                                <option value="<?php echo $course->courseId?>"><?php echo $course->courseTitle ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                        <div class="col-lg-1">
                                            <input class="btn btn-sm btn-basic" type='button' value='Add' id='addCourse' onclick="selectid(this)">
                                        </div>

                                    </div>



                                    <div class="form-group ">
                                        <label for="faculty_intro" class="control-label col-lg-2">Faculty Intro <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('faculty_intro'); ?></font></p>
                                            <textarea class="form-control ckeditor" name="faculty_intro" id="faculty_intro" required><?php echo $editFaculty->facultyIntro?></textarea>
                                        </div>
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

<?php include('js.php') ?>


</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

    function selectid(x)
    {
            var courseId= document.getElementById('faculty_courses').value;
            var facultyId= <?php echo $editFaculty->facultyId?>;
            if(courseId == ""){
                alert('Please Select a Course First!!');
                return false;
            }
            else {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("Admin/Faculty/addCoursetoFaculty/")?>' + courseId,
                    data: {'facultyId': facultyId},
                    cache: false,
                    success: function (data) {

                        if (data == '0') {
                            alert("Course Added Successfully");

                            document.getElementById("faculty_courses").selectedIndex = 0;
                            $('#CourseTable').load(document.URL +  ' #CourseTable');
                        }
                        else if (data == '1') {
                            alert('This Course is Already Inserted !!!');

                        }


                    }
                });
            }

    }

    function selectid1(x)
    {
        btn = $(x).data('panel-id');
        var facultyId= <?php echo $editFaculty->facultyId?>;
        $.ajax({
                type: 'POST',
                url: '<?php echo base_url("Admin/Faculty/deleteCoursetoFaculty/")?>'+btn,
                data: {'facultyId': facultyId},
                cache: false,
                success: function (data) {
                    $('#CourseTable').load(document.URL +  ' #CourseTable');

                }
        });
    }

</script>
<script>

    function submitform() {
        var messageLength = CKEDITOR.instances['faculty_intro'].getData().replace(/<[^>]*>/gi, '').length;
        var phone=document.getElementById("faculty_phone").value;
        var email=document.getElementById("faculty_email").value;
        var chk=/^[0-9]*$/;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!phone.match(chk)) {
            alert( 'Please enter a valid Phone number!!' );
            return false;
        }
        if(phone.length >45) {
            alert( 'Phone number must be less than 45 charecter!!' );
            return false;
        }

        if( !messageLength ) {
            alert( 'Please enter a Faculty Intro' );
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


