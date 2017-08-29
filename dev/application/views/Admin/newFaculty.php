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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New Faculty</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Welcome">Home</a></li>
                        <li><i class="icon_document_alt"></i>Faculty</li>
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
                                <form class="form-validate form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url()?>Admin/Faculty/createNewFaculty" onsubmit="return submitform()">

                                    <div class="form-group ">
                                        <label for="facultyFirstName" class="control-label col-lg-2">Faculty First Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyFirstName'); ?></font></p>
                                            <input class="form-control" id="facultyFirstName"  name="facultyFirstName" type="text" required />
                                        </div>

                                        <label for="facultyLastName" class="control-label col-lg-2">Faculty Last Name <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyLastName'); ?></font></p>
                                            <input class="form-control" id="facultyLastName" name="facultyLastName"  type="text" required />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="facultyDegree" class="control-label col-lg-2">Faculty Degree <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('facultyDegree'); ?></font></p>
                                            <input class="form-control" id="facultyDegree" name="facultyDegree"  type="text" placeholder="Write Multiple Degree with comma" required />
                                        </div>
                                    </div>


                                    <div class="form-group ">

                                        <label for="facultyPosition" class="control-label col-lg-2">Faculty Position <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('facultyPosition'); ?></font></p>
                                            <input class="form-control" id="facultyPosition" name="facultyPosition"  type="text" placeholder="Write Multiple Position with comma"required />
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="facultyImage" class="control-label col-lg-2">Faculty Image <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyImage'); ?></font></p>
                                            <input class="form-control" type="file" name="facultyImage" id="facultyImage" required>
                                        </div>

                                        <label for="facultyEmpType" class="control-label col-lg-2">Faculty Employee type <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyEmpType'); ?></font></p>
                                            <select class="form-control" id="facultyEmpType" name="facultyEmpType" required >

                                                <option value="" selected><?php echo SELECT_EMPLOYEE_TYPE?></option>
                                                <?php for ($i=0;$i<count(EMPLOYEE_TYPE);$i++){?>
                                                    <option><?php echo EMPLOYEE_TYPE[$i]?></option>
                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="form-group ">


                                        </div>


                                        <label for="facultyEmail" class="control-label col-lg-2">Faculty Email <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyEmail'); ?></font></p>
                                            <input class="form-control" id="facultyEmail" name="facultyEmail"  type="email" required />
                                        </div>

                                        <label for="facultyPhone" class="control-label col-lg-2">Faculty Phone <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyPhone'); ?></font></p>
                                            <input class="form-control" id="facultyPhone" name="facultyPhone"  type="text" placeholder="phone number(only digit)" required />
                                        </div>


                                    </div>

                                    <div class="form-group ">

                                        <label for="facultyTwitter" class="control-label col-lg-2">Faculty Twitter</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyTwitter'); ?></font></p>
                                            <input class="form-control" id="facultyTwitter" name="facultyTwitter"  type="text" />
                                        </div>

                                        <label for="facultyLinkedin" class="control-label col-lg-2">Faculty LinkedIn</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyLinkedin'); ?></font></p>
                                            <input class="form-control" id="facultyLinkedin" name="facultyLinkedin"  type="text" />
                                        </div>

                                    </div>

                                    <div class="form-group ">


                                        <label for="facultyStatus" class="control-label col-lg-2">Faculty Status <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyStatus'); ?></font></p>
                                            <select class="form-control" id="facultyStatus" name="facultyStatus" required>

                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option><?php echo STATUS[$i]?></option>
                                                <?php } ?>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group"id="CourseFiled">

                                        <label for="facultyCourses" class="control-label col-lg-2">Faculty Courses </label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('facultyCourses[]'); ?></font></p>
                                            <select class="form-control" id="facultyCourses" name="facultyCourses[]">
                                                <option value="" selected><?php echo SELECT_COURSE ?></option>
                                                <?php
                                                $coursename= array();
                                                $courseid=array();
                                                foreach ($course as $course){?>
                                                    <option value="<?php echo $course->courseId?>"><?php echo $course->courseTitle?></option>
                                                    <?php
                                                    array_push($coursename,$course->courseTitle );
                                                    array_push($courseid,$course->courseId );
                                                }?>

                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6" id="add_remove_button">

                                            <div class="col-lg-2"></div>
                                            <input class="btn btn-sm btn-default" type='button' value='Add Course' id='addCourse'>
                                            <input class="btn btn-sm btn-login" type='button' value='Remove Course' id='removeButton'>


                                        </div>

                                    </div>


                                    <div class="form-group ">
                                        <label for="facultyIntro" class="control-label col-lg-2">Faculty Intro <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('facultyIntro'); ?></font></p>
                                            <textarea class="form-control ckeditor" name="facultyIntro" id="facultyIntro" required></textarea>
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
    var newArray = [];
    $(document).ready(function(){
        var counter = 2;
        $("#addCourse").click(function () {
            var coursename= <?php echo json_encode( $coursename ) ?>;
            var i;
            /*------- for check Faculty Course value ---------*/

            if(counter == '2')
            {
                var id=document.getElementById("facultyCourses").value;
                if(id==""){alert("Please Select a Course First!!");
                    return false;
                }
            }
            else{
                var id=document.getElementById("facultyCourses"+(counter-1)).value;
                if(id=="") {
                    alert("Please Select a Course First!!");
                    return false;
                }
            }
            if(counter<=coursename.length){
                newArray.push(id);
            }

            /*-----------for check Faculty Course value --end-------*/
            var p=<?php echo count($coursename)?>
//            for (i=0;i<coursename.length;i++){
//                 alert(coursename[i])
//            }
            //alert(coursename);
            if(counter > p){
                alert("Only "+p+" Faculty Course Field is allowed");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id",'TextBoxDiv' + counter);
            newTextBoxDiv.after().html('<label class="control-label col-lg-2">Faculty Course #'+ counter + ' : </label>' +
                '<div class="form-group col-lg-4">'+'<select class="form-control"  name="facultyCourses[] '+ counter +
                '" id="facultyCourses' + counter +'" data-panel-id="'+ counter+'"onchange="selectid(this)"'+'" value="" required>'+'<option selected value="" >'+'<?php echo SELECT_COURSE ?>'+'</option>'+
                '<?php for($i=0;$i<count($coursename);$i++){ ?>'+'<option value="<?php echo $courseid[$i] ?>" ><?php echo $coursename[$i] ?>'+'</option>'+'<?php }?>'+
                '</select>'+'</div>' +'<br>'
            );
            newTextBoxDiv.appendTo("#CourseFiled");
            counter++;
        });
        $("#removeButton").click(function () {
            if(counter==2){
                var id=document.getElementById("facultyCourses").value;
                alert("No more faculty course to remove");
                document.getElementById("facultyCourses").selectedIndex= 0;
                return false;
            }
            else{
                var id=document.getElementById("facultyCourses"+(counter-1)).value;
            }
            var index = newArray.indexOf(id);
            newArray.splice(index, 1);
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });
    function selectid(x){
        btn = $(x).data('panel-id');
        var courseId=document.getElementById("facultyCourses"+btn).value;
        for (var k = 0; k < newArray.length; k++) {
            if (newArray[k]==courseId) {
                alert("Allready added the Course");
                document.getElementById("facultyCourses"+btn).selectedIndex=0;
                break;
            }
        }
        //alert(JSON.stringify(newArray));
        //alert(courseId);
    }
</script>
<script>
    function submitform() {
        var facultyIntroLength = CKEDITOR.instances['facultyIntro'].getData().replace(/<[^>]*>/gi, '').length;
        var phone=document.getElementById("facultyPhone").value;
        var email=document.getElementById("facultyEmail").value;

        var chk=/^[0-9]*$/;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!phone.match(chk)) {
            alert( 'Please enter a valid Phone number!!' );
            return false;
        }
        if( !facultyIntroLength ) {
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
