
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Application Form</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ Application Form</li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php foreach ($candidateInfos as $candidateInfo){ ?>

                <form role="form" action="<?php echo base_url()?>ApplyOnline/editApplicationForm1" method="post" class="registration-form form-horizontal">

                    <!--                        		<fieldset>-->
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Personal Details</h3>
                        </div>

                        <div class="form-top-right">
                            <p>Step 1 / 9</p>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <div class="form-group">
                            <label class="control-label col-md-2">Title:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                <select style="width: 100%" name="title">
                                    <?php for ($i=0;$i<count(Title);$i++){?>
<!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                        <option value="<?php echo Title[$i]?>"<?php if (!empty($candidateInfo->title) && $candidateInfo->title == Title[$i])  echo 'selected = "selected"'; ?>><?php echo Title[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">First Name:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                <input type="text" class="form-control" required id="firstName" name="firstName" value="<?php echo $candidateInfo->firstName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Surname:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('surName'); ?></font></p>
                                <input type="text" class="form-control" required id="surName" name="surName" value="<?php echo $candidateInfo->surName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Other Names:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('otherName'); ?></font></p>
                                <input type="text" class="form-control" id="otherName" name="otherName" value="<?php echo $candidateInfo->otherNames ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Date of Birth:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('dob'); ?></font></p>
                                <input type="date" class="form-control" required id="dob" name="dob" value="<?php echo $candidateInfo->dateOfBirth ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Gender:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                <input type="radio" required id="gender" name="gender" value="M" <?php if($candidateInfo->gender=='M'){ echo "checked=checked";}?>> Male&nbsp;&nbsp;
                                <input type="radio" required id="gender" name="gender" value="F" <?php if($candidateInfo->gender=='F'){ echo "checked=checked";}?>> Female&nbsp;&nbsp;
                                <input type="radio" required id="gender" name="gender" value="O" <?php if($candidateInfo->gender=='O'){ echo "checked=checked";}?>> Other
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Place of Birth:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('placeOfBirth'); ?></font></p>
                                <input type="text" class="form-control" required id="placeOfBirth" maxlength="100" name="placeOfBirth" value="<?php echo $candidateInfo->placeOfBirth ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Nationality:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('nationality'); ?></font></p>
                                <select style="width: 100%" id="nationality" required name="nationality">
                                    <option value="" disabled selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->nationality) && $candidateInfo->nationality == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Passport No.:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('passportNo'); ?></font></p>
                                <input type="text" class="form-control" required id="passportNo" name="passportNo" value="<?php echo $candidateInfo->passportNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">PP Expiry Date:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('passportExpiryDate'); ?></font></p>
                                <input type="date" class="form-control" required id="passportExpiryDate" name="passportExpiryDate" value="<?php echo $candidateInfo->passportExpiryDate ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">UK Entry Date:<span class="required">*</span> </label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('UkEntryDate'); ?></font></p>
                                <input type="date" class="form-control" required id="UkEntryDate" name="UkEntryDate" value="<?php echo $candidateInfo->ukEntryDate ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Visa Type:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('VisaType'); ?></font></p>
                                <select style="width: 100%" id="VisaType" required name="VisaType">

                                    <option value="" selected><?php echo SELECT_TYPE?></option>
                                    <?php for ($i=0;$i<count(VISA_TYPE);$i++){?>
<!--                                        <option --><?php //echo set_select('VisaType',  VISA_TYPE[$i], False); ?><!-->--><?php //echo VISA_TYPE[$i]?><!--</option>-->
                                        <option value="<?php echo VISA_TYPE[$i]?>"<?php if (!empty($candidateInfo->visaType) && $candidateInfo->visaType == VISA_TYPE[$i])  echo 'selected = "selected"'; ?>><?php echo VISA_TYPE[$i]?></option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Visa Expiry Date:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('visaExpiryDate'); ?></font></p>
                                <input type="date" class="form-control" required id="visaExpiryDate" name="visaExpiryDate" value="<?php echo $candidateInfo->visaExpiryDate ?>">
                            </div>
                        </div>

                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>

                        <div class="form-group">
                            <label class="control-label col-md-2">Current Address:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                <textarea id="comment-message" required id="currentAddress" maxlength="1000" name="currentAddress" rows="8" tabindex="4"><?php echo $candidateInfo->currentAddress ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Current Address P.O :<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('currentAddressPO'); ?></font></p>
                                <input type="text" class="form-control" required id="currentAddressPO" name="currentAddressPO" value="<?php echo $candidateInfo->currentAddressPo?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Overseas (Home) Address:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('overseasHomeAddress'); ?></font></p>
                                <textarea id="comment-message" required id="overseasHomeAddress" maxlength="1000" name="overseasHomeAddress" rows="8" tabindex="4"><?php echo $candidateInfo->overseasAddress?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Overseas (Home) Address P.O :<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('overseasAddressPO'); ?></font></p>
                                <input type="text" class="form-control" required id="overseasAddressPO" name="overseasAddressPO" value="<?php echo $candidateInfo->overseasAddressPo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Telephone:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>
                                <input type="text" class="form-control" required id="telephone" name="telephone" value="<?php echo $candidateInfo->telephoneNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Mobile:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>
                                <input type="text" class="form-control" required id="mobile" name="mobile" value="<?php echo $candidateInfo->mobileNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">E-mail:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                <input type="email" class="form-control" required id="email" name="email" value="<?php echo $candidateInfo->email ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Fax:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('fax'); ?></font></p>
                                <input type="text" class="form-control" id="fax" name="fax" value="<?php echo $candidateInfo->fax ?>">
                            </div>
                        </div>

                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Contact Details</h2>

                        <div class="form-group">
                            <label class="control-label col-md-2">Title:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactTitle'); ?></font></p>
                                <select style="width: 100%" id="EmergencyContactTitle" required name="EmergencyContactTitle">

                                    <option value="" selected><?php echo SELECT_TITLE?></option>
                                    <?php for ($i=0;$i<count(Title);$i++){?>
                                        <option value="<?php echo Title[$i]?>"<?php if (!empty($candidateInfo->emergencyContactTitle) && $candidateInfo->emergencyContactTitle == Title[$i])  echo 'selected = "selected"'; ?>><?php echo Title[$i]?></option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Name:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactName'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactName" name="EmergencyContactName" value="<?php echo $candidateInfo->emergencyContactName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Relation:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactRelation'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactRelation" name="EmergencyContactRelation" value="<?php echo $candidateInfo->emergencyContactRelation ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Address:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress'); ?></font></p>
                                <textarea id="comment-message" required id="EmergencyContactAddress" name="EmergencyContactAddress" rows="8" tabindex="4"><?php echo $candidateInfo->emergencyContactAddress ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Emergency Contact Address P.O :<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddressPO'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactAddressPO" name="EmergencyContactAddressPO" value="<?php echo $candidateInfo->emergencyContactAddressPo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Mobile:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactMobile'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactMobile" name="EmergencyContactMobile" value="<?php echo $candidateInfo->emergencyContactMobile ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">E-mail:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactEmail'); ?></font></p>
                                <input type="email" class="form-control" required id="EmergencyContactEmail" name="EmergencyContactEmail" value="<?php echo $candidateInfo->emergencyContactEmail ?>">
                            </div>
                        </div>

                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Course Details</h2>


                        <div class="form-group">
                            <label class="control-label col-md-2">Course Name:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('courseName'); ?></font></p>
                                <select style="width: 100%" onchange="courseAwardBody()" id="courseName" required name="courseName">
                                    <option value=""><?php echo SELECT_COURSE?></option>
                                    <?php foreach ($courseInfo as $course){?>
<!--                                        <option value="--><?php //echo $course->courseId?><!--" --><?php //echo set_select('courseName',$course->courseId, False); ?><!-->--><?php //echo $course->courseTitle?><!--</option>-->

                                        <option value="<?php echo $course->courseId ?>"<?php if (!empty($candidateInfo->courseName) && $candidateInfo->courseName == $course->courseId)  echo 'selected = "selected"'; ?>><?php echo $course->courseTitle ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Awarding Body:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('awardingBody'); ?></font></p>
                                <input type="text" readonly class="form-control" id="awardingBody" name="awardingBody" value="<?php echo $candidateInfo->awardingBody ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Course Level:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('courseLevel'); ?></font></p>
                                <input type="text" class="form-control" id="courseLevel" name="courseLevel" value="<?php echo $candidateInfo->courseLevel ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Course Start Date:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('courseStartDate'); ?></font></p>
                                <input type="date" class="form-control" id="courseStartDate" name="courseStartDate" value="<?php echo $candidateInfo->courseStartDate ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Course End Date:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('courseEndDate'); ?></font></p>
                                <input type="date" class="form-control" id="courseEndDate" name="courseEndDate" value="<?php echo $candidateInfo->courseEndDate ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Method of study:<span class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('methodeOfStudy'); ?></font></p>
                                <input type="radio" required name="methodeOfStudy" value="FT"   <?php if($candidateInfo->methodOfStudy=='FT'){ echo "checked=checked";}?>> Full Time&nbsp;&nbsp;
                                <input type="radio" required name="methodeOfStudy" value="PT"   <?php if($candidateInfo->methodOfStudy=='PT'){ echo "checked=checked";}?>> Part Time&nbsp;&nbsp;
                                <input type="radio" required name="methodeOfStudy" value="D"    <?php if($candidateInfo->methodOfStudy=='D'){ echo "checked=checked";}?>> Day&nbsp;&nbsp;
                                <input type="radio" required name="methodeOfStudy" value="E&W"  <?php if($candidateInfo->methodOfStudy=='E&W'){ echo "checked=checked";}?>> Evenings & Weekend
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-10">
                                <!--                                            <a href="--><?php //echo base_url()?><!--OnlineForms/insertApplicationForm1"> <button type="button" class="btn ">Next</button></a>-->
                                <button type="submit" class="btn btn-next">Save Application</button>
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
                        <h2 class="widget-title">COURSES LIST</h2>
                        <?php include("course-sidebar.php"); ?>
                    </div><!-- /widget-posts -->



                </div><!-- sidebar -->
            </div><!-- /col-md-3 -->
        </div>
    </div>
</section>

<?php include("footer.php"); ?>
<!-- for Application form -->
<script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/scripts.js"></script>

</div>
</body>

</html>

<script>

    //            function submitedForm() {
    //
    //
    //                var phone=document.getElementById("title").value;
    //                var email=document.getElementById("facultyEmail").value;
    //
    //                var chk=/^[0-9]*$/;
    //                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //                if(!phone.match(chk)) {
    //                    alert( 'Please enter a valid Phone number!!' );
    //                    return false;
    //                }
    //                if(phone.length >45) {
    //                    alert( 'Phone number must be less than 45 charecter!!' );
    //                    return false;
    //                }
    //                if( !facultyIntroLength ) {
    //                    alert( 'Please enter a Faculty Intro' );
    //                    return false;
    //                }
    //                if(email.match(mailformat))
    //                {
    //                    return true;
    //                }
    //                else
    //                {
    //                    alert("You have entered an invalid email address!");
    //                    return false;
    //                }
    //
    //            }

    function courseAwardBody() {

        var courseId=document.getElementById("courseName").value;
        if (courseId ==""){
            alert('please select a course First');
            document.getElementById('awardingBody').value = "";
            return false;
        }else {

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("OnlineForms/getCourseAwardBody")?>',
                data: {courseId: courseId},
                cache: false,
                success: function (data) {

                    document.getElementById('awardingBody').value = data;

                }
            });
        }

    }

</script>