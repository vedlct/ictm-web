
<?php $this->load->view('Admin/head.php'); ?>
<!-- for Application Form -->
<link rel="stylesheet" href="<?php echo base_url()?>public/css/application-form-style.css">
<!-- dateTimepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

<style>

    .datepicker .next ,.prev {
        position: relative !important;
    }
    select{
        height: 32px; border: 1px solid #bababa;
    }
    textarea{
        border: 1px solid #bababa; width: 100%;
    }
</style>

<div class="maindiv">
    <div class="page-title full-color">
        <div class="container" style="background-color: #F4F4F4;">
            <div class="row">
                <div class="col-md-12">
                    <table border="0" style="width:100%; margin-top: 30px; border: none;">
                        <tr>
                            <td style="border: none;"><img style="height: 80px; border: none;" src="<?php echo base_url()?>public/img/logoform.jpg" alt=""></td>
                            <td style="border: none;"><h2 style="  border: medium none;font-size: 33px;margin-bottom: 22px;margin-left: 37px;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
                        </tr>
                    </table>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /page-title -->

    <div id="sessionFlashMessageDiv">
        <?php if ($this->session->flashdata('errorMessage')!=null){?>
            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
        <?php }
        elseif($this->session->flashdata('successMessage')!=null){?>
            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
        <?php }?>

    </div>

    <section class="flat-row padding-small-v1 text-center">
        <div  class="container">
            <div class="row">
                <div class="col-md-12" style="background-color: #F4F4F4;">
                    <?php foreach ($alumniInfos as $alumniInfos){ ?>

                        <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/editAlumniForm1" method="post" class="form-horizontal" onsubmit="return checkvalidation()">

                            <!--                        		<fieldset>-->
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Alumni Details</h3>
                                </div>

                                <div class="form-top-right">
                                    <p>Step 1 / 10</p>
                                </div>
                            </div>
                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">PERSONAL DETAILS</h2>
                            <div class="form-group">
                                <label class="control-label col-md-2">Title:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-4">
                                    <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                    <input type="radio"  id="title" required name="title" value="Mr" <?php if($alumniInfos->title=="Mr"){ ?> checked=checked <?php } ?> />&nbsp;Mr&nbsp;
                                    <input type="radio"  id="title" required name="title" value="Miss" <?php if($alumniInfos->title=="Miss"){ ?> checked=checked <?php } ?> />&nbsp;Miss&nbsp;
                                    <input type="radio"  id="title" required name="title" value="Ms" <?php if($alumniInfos->title=="Ms"){ ?> checked=checked <?php } ?> />&nbsp;Ms&nbsp;
                                    <input type="radio"  id="title" required name="title" value="Mrs" <?php if($alumniInfos->title=="Mrs"){ ?> checked=checked <?php } ?> />&nbsp;Mrs&nbsp;
                                    <input type="radio"  id="title" required name="title" value="Mx" <?php if($alumniInfos->title=="Mx"){ ?> checked=checked <?php } ?> />&nbsp;Mx&nbsp;
                                    <input type="radio"  id="title" required name="title" value="Other" <?php if($alumniInfos->title=="Other"){ ?> checked=checked <?php } ?> />&nbsp;Other
                                </div>
                            </div>


                            <div class="form-group">
                                    <label class="control-label col-md-2">First Name:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
<!--                                        <p><font color="red"> --><?php //echo form_error('firstName'); ?><!--</font></p>-->
                                        <input type="text" class="form-control" required id="firstName" name="firstName" value="<?php echo $alumniInfos->firstName ?>">
                                    </div>
                                </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Last Name:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <!--                                        <p><font color="red"> --><?php //echo form_error('firstName'); ?><!--</font></p>-->
                                    <input type="text" class="form-control" required id="lastName" name="lastName" value="<?php echo $alumniInfos->lastName ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Gender:</label>
                                <div class="col-md-3">
                                    <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                    <input type="radio"  id="gender" name="gender" value="M" <?php if($alumniInfos->gender=='M'){ echo "checked=checked";}?>> MALE&nbsp;&nbsp;
                                    <input type="radio"  id="gender" name="gender" value="F" <?php if($alumniInfos->gender=='F'){ echo "checked=checked";}?>> FEMALE&nbsp;&nbsp;
                                    <input type="radio"  id="gender" name="gender" value="O" <?php if($alumniInfos->gender=='O'){ echo "checked=checked";}?>> OTHER
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Date of Birth:</label>
                                <div class="col-md-10">
                                    <input type="text"  class="form-control datetimepicker"  id="dob" name="dateOfBirth" value="<?php echo $alumniInfos->dateOfBirth ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Nationality:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('nationality'); ?></font></p>
                                    <select style="width: 100%" id="nationality"  name="nationality">
                                        <option value=""  selected>Select Nationality...</option>
                                        <?php for ($i=0;$i<count(NATIONALITY);$i++){?>
                                            <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                            <option value="<?php echo NATIONALITY[$i]?>"<?php if (!empty($alumniInfos->nationality) && $alumniInfos->nationality == NATIONALITY[$i])  echo 'selected = "selected"'; ?>><?php echo NATIONALITY[$i]?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2" id="address">Address:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                                    <input tabindex="27"  type="text" class="form-control" required id="address" name="address" value="<?php echo $alumniInfos->address ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Post Code :<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('postcode'); ?></font></p>
                                    <input type="text" class="form-control" required id="postcode" name="postcode" value="<?php echo $alumniInfos->postcode?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mobile:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('mobileNo'); ?></font></p>
                                    <input type="text" class="form-control" required id="mobileNo" name="mobileNo" value="<?php echo $alumniInfos->mobileNo ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                    <input type="email" class="form-control" required id="email" name="email" value="<?php echo $alumniInfos->email ?>">
                                </div>
                            </div>
                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">COURSE DETAILS</h2>

                            <div class="form-group">
                                <label class="control-label col-md-2">Student ID:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('studentId'); ?></font></p>
                                    <input type="text" class="form-control"  id="studentId" name="studentId" value="<?php echo $alumniInfos->studentId ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Course complete:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-7">
                                    <p><font color="red"> <?php echo form_error('courseComplete'); ?></font></p>
                                    <input type="radio"  id="courseComplete" required name="courseComplete" value="B" <?php if($alumniInfos->courseComplete=='B'){ echo "checked=checked";}?>> Business&nbsp;&nbsp;
                                    <input type="radio"  id="courseComplete" required name="courseComplete" value="C" <?php if($alumniInfos->courseComplete=='C'){ echo "checked=checked";}?>> Computing&nbsp;&nbsp;
                                    <input type="radio"  id="courseComplete" required name="courseComplete" value="H" <?php if($alumniInfos->courseComplete=='H'){ echo "checked=checked";}?>> Health and Social Care&nbsp;&nbsp;
                                    <input type="radio"  id="courseComplete" required name="courseComplete" value="T" <?php if($alumniInfos->courseComplete=='T'){ echo "checked=checked";}?>> Travel Tourism&nbsp;&nbsp;
                                    <input type="radio"  id="courseComplete" required name="courseComplete" value="M" <?php if($alumniInfos->courseComplete=='M'){ echo "checked=checked";}?>> Hospitality Management
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Course Start Year:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('courseStartYear'); ?></font></p>
                                    <input type="text" class="form-control"  id="courseStartYear" name="courseStartYear" value="<?php echo $alumniInfos->courseStartYear ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Course Completion Year:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('courseCompleteYear'); ?></font></p>
                                    <input type="text" class="form-control"  id="courseCompleteYear" name="courseCompleteYear" value="<?php echo $alumniInfos->courseCompleteYear ?>">
                                </div>
                            </div>
                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">CAREER DETAILS</h2>
                            <div class="form-group">
                                <label class="control-label col-md-2">Current Status:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-4">
                                    <p><font color="red"> <?php echo form_error('currentStatus'); ?></font></p>
                                    <input type="radio"  id="currentStatus" required name="currentStatus" value="Employed" <?php if($alumniInfos->currentStatus=="Employed"){ ?> checked=checked <?php } ?> />&nbsp;Employed&nbsp;
                                    <input type="radio"  id="currentStatus" required name="currentStatus" value="Further Education" <?php if($alumniInfos->currentStatus=="Further Education"){ ?> checked=checked <?php } ?> />&nbsp;Further Education&nbsp;
                                    <input type="radio"  id="currentStatus" required name="currentStatus" value="Other" <?php if($alumniInfos->currentStatus=="Other"){ ?> checked=checked <?php } ?> />&nbsp;Other<br>
                                    <input  style="display:none;" type="text" name="currentOther" value="<?php echo $alumniInfos->currentOther ?>" id="currentOther"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Name of Employer:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('organisation'); ?></font></p>
                                    <input type="text" class="form-control" required id="organisation" name="organisation" value="<?php echo $alumniInfos->organisation ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Address of Employer:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('emAddress'); ?></font></p>
                                    <input type="text" class="form-control"  id="emAddress" name="emAddress" value="<?php echo $alumniInfos->emAddress ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Job Title:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('jobTitle'); ?></font></p>
                                    <input type="text" class="form-control" required id="jobTitle" name="jobTitle" value="<?php echo $alumniInfos->jobTitle ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Year Started of Job:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('startCourse'); ?></font></p>
                                    <input type="number" class="form-control" required id="startCourse" name="startCourse" value="<?php echo $alumniInfos->startCourse ?>">
                                </div>
                            </div>
                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Stay Connected</h2>
                            <div class="form-group">
                                <div class="col-md-offset-1 col-md-9">
                                    <label class="control-label col-md-10" style="margin-left:1%;">If you would like to receive information from ICON College, please tick the relevant box:<span style="color: red" class="required">*</span></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-6">
                                    <p><font color="red"> <?php echo form_error('receiveInfo'); ?></font></p>
                                    <input type="checkbox"  id="receiveInfo" name="receiveInfo" value="T" <?php if($alumniInfos->receiveInfo=='T'){ echo "checked=checked";}?>> Telephone/Mobile&nbsp;&nbsp;
                                    <input type="checkbox"  id="receiveInfo" name="receiveInfo" value="E" <?php if($alumniInfos->receiveInfo=='E'){ echo "checked=checked";}?>> By E-mail&nbsp;&nbsp;
                                    <input type="checkbox"  id="receiveInfo" name="receiveInfo" value="P" <?php if($alumniInfos->receiveInfo=='P'){ echo "checked=checked";}?>> By Post&nbsp;
                                    <input type="checkbox"  id="receiveInfo" name="receiveInfo" value="N" <?php if($alumniInfos->receiveInfo=='N'){ echo "checked=checked";}?>> No thanks, I don't want to be contacted
                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="col-sm-offset-2 col-md-10">
                                        <!--                                            <a href="--><?php //echo base_url()?><!--OnlineForms/insertApplicationForm1"> <button type="button" class="btn ">Next</button></a>-->

                                        <a  href="<?php echo base_url()?>Admin/StudentApplication/manageAlamni" ><button style="color: #fff; background-color: #841A29;" type="button"  class="btn btn-next">Back</button></a>

                                        <!--                                        <a  href="--><?php //echo base_url()?><!--Admin/StudentApplication/editStudentApplicationQualification" ><button style="color: #fff; background-color: #841A29;" type="button"  class="btn btn-next">Next</button></a>-->

                                    </div>
                                </div>
                            </div>
                            <!--			                    </fieldset>-->



                        </form>


                    <?php } ?>





                </div><!-- /col-md-9 -->

                <div class="col-md-3">
                    <div class="sidebar">

                        <div class="widget widget-courses">
                            <!--                        <h2 class="widget-title">COURSES LIST</h2>-->
                            <!--                        --><?php //include("course-sidebar.php"); ?>
                        </div><!-- /widget-posts -->



                    </div><!-- sidebar -->
                </div><!-- /col-md-3 -->
            </div>
        </div>
    </section>
</div>

<?php //include("footer.php"); ?>

<!-- datePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<!-- for Application form -->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/jquery.backstretch.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/scripts.js"></script>-->

</div>
</body>

</html>

<script>
    function checkvalidation() {
        var mobile = document.getElementById('mobileNo').value;
        if (mobile.length < 11 || mobile.length> 20) {
            alert('Please Enter at least 11 digit  Mobile number');
            return false; // keep form from submitting
        }

        var EmergencyContactEmail=document.getElementById("email").value;
        var mailformat1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(EmergencyContactEmail.match(mailformat1))
        {
            return true;
        }
        else{
            alert(" Email Address is in invalid format!");
            return false;
        }
    }

</script>

<!--<script src="--><?php //echo base_url()?><!--public/javascript/jquery.backstretch.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/scripts.js"></script>-->

<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('.datetimepicker').keydown(function(e) {
            e.preventDefault();
            return false;
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("input[type='radio']").change(function(){
            if($(this).val()=="Other")
            {
                $("#currentOther").show();
            }
            else
            {
                $("#currentOther").hide();
            }
        });
    });
</script>








