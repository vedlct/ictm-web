<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('header.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New Faculty</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>Faculties</li>
                        <li><i class="fa fa-files-o"></i>Create New Faculty</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Create New Faculty
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">

                                    <div class="form-group ">
                                        <label for="faculty_first_name" class="control-label col-lg-2">Faculty First Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="faculty_first_name"  name="faculty_first_name" type="text" required />
                                        </div>

                                        <label for="faculty_last_name" class="control-label col-lg-2">Faculty Last Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="faculty_last_name" name="faculty_last_name"  type="text" required />
                                        </div>

                                    </div>

                                    <div id='TextBoxesGroup' class="form-group ">
                                        <label for="faculty_degree" class="control-label col-lg-2">Faculty Degree <span class="required">*</span></label>
                                        <div class="col-lg-4" style="display: inline;">
                                            <input class="form-control col-lg-4" id="faculty_degree" name="faculty_degree[]"  type="text" required />
                                        </div>

                                        <div id="add_remove_button" class="form-group">
                                            <div class="col-lg-3 form-group">
                                                <div class="col-lg-3"></div>
                                                <input class="btn btn-sm btn-default" type='button' value='Add Degree' id='addButton'>
                                                <input class="btn btn-sm btn-login" type='button' value='Remove Degree' id='removeButton'>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group ">
                                        <label for="faculty_position" class="control-label col-lg-2">Faculty Position <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="faculty_position" name="faculty_position"  type="text" required />
                                        </div>

                                        <label for="faculty_image" class="control-label col-lg-2">Faculty Image <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="file" name="faculty_image" id="faculty_image" required>
                                        </div>


                                    </div>

                                    <div class="form-group ">
                                        <label for="faculty_emp_type" class="control-label col-lg-2">Faculty Employee type <span class="required">*</span></label>
                                        <div class="col-lg-4">

                                            <select class="form-control" id="faculty_emp_type" name="faculty_emp_type" required >

                                                <option value="Select_Type" selected>Select Type</option>
                                                <option value="PartTime">Part Time</option>
                                                <option value="FullTime">Full Time</option>

                                            </select>

                                        </div>


                                            <label for="faculty_email" class="control-label col-lg-2">Faculty Email <span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <input class="form-control" id="faculty_email" name="faculty_email"  type="text" required />
                                            </div>


                                     </div>

                                    <div class="form-group ">
                                        <label for="faculty_phone" class="control-label col-lg-2">Faculty Phone <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="faculty_phone" name="faculty_phone"  type="text" required />
                                        </div>

                                        <label for="faculty_twitter" class="control-label col-lg-2">Faculty Twitter <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="faculty_twitter" name="faculty_twitter"  type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group ">
                                        <label for="faculty_linkedin" class="control-label col-lg-2">Faculty LinkedIn <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="faculty_linkedin" name="faculty_linkedin"  type="text" required />
                                        </div>

                                        <label for="faculty_status" class="control-label col-lg-2">Faculty Status <span class="required">*</span></label>
                                        <div class="col-lg-4">

                                            <select class="form-control" id="faculty_status" name="faculty_status" required>

                                                <option value="Select_Status" selected>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="faculty_courses" class="control-label col-lg-2">Faculty Courses <span class="required">*</span></label>
                                        <div class="col-lg-4" id="CourseFiled">

                                            <select class="form-control" id="faculty_courses" name="faculty_courses" required>
                                                <option value="Select Course" selected>Select Course</option>
                                                <?php foreach ($course as $course){?>
                                                    <option value="<?php echo $course->courseId?>"><?php echo $course->courseTitle?></option>
                                                <?php }?>

<!--                                                <option value="CourseId">HND in Business</option>-->
<!--                                                <option value="CourseId">Master Of Gamification</option>-->
<!--                                                <option value="CourseId">Master Of Gamification</option>-->
<!--                                                <option value="CourseId">Master Of Gamification</option>-->
<!--                                                <option value="CourseId">Master Of Gamification</option>-->

                                            </select>

                                        </div>

                                        <div id="add_remove_button" class="form-group">
                                            <div class="col-lg-3 form-group">
                                                <div class="col-lg-3"></div>
                                                <input class="btn btn-sm btn-default" type='button' value='Add Course' id='addCourse' onclick="addCourse()">
                                                <input class="btn btn-sm btn-login" type='button' value='Remove Course' id='removeCourse'>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group ">
                                        <label for="faculty_intro" class="control-label col-lg-2">Faculty Intro <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="faculty_intro" id="faculty_intro" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                                </form>
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
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv'+ counter);
            newTextBoxDiv.after().html('<label class="control-label col-lg-2">Faculty Degree #'+ counter + ' : </label>' +
                '<div class="col-lg-4">'+'<input class="form-control" type="text" name="faculty_degree[]' + counter +
                '" id="faculty_degree' + counter + '" value="" >'+'</div>'+'<br>'
            );
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;

        });
        $("#removeButton").click(function () {
            if(counter==2){
                alert("No more textbox to remove");
                document.getElementById('Item_price').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
        $("#getButtonValue").click(function () {
            var msg = '';
            for(i=1; i<counter; i++){
                msg += "\n Faculty Degree #" + i + " : " + $('#faculty_degree' + i).val();
            }
            //  alert(msg);
        });
    });
</script>

<script>

    function addCourse() {

        var newCourse = $(document.createElement('div'))
            .attr("id", 'Course'+ counter);
        newCourse.after().html('<label class="control-label col-lg-2">Faculty Degree #'+ counter + ' : </label>' +
            '<div class="col-lg-4">'+'<input class="form-control" type="text" name="faculty_degree[]' + counter +
            '" id="faculty_degree' + counter + '" value="<?php echo $course->courseId?>" >'+'<?php echo $course->courseTitle?>'+'</div>'+'<br>'
        );

        $("#CourseFiled").append(newCourse);

    }

</script>