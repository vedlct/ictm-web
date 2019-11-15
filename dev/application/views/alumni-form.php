
<?php include("header.php"); ?>
<style>
    .datepicker .next ,.prev {
        position: relative !important;
    }
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Alumni Registration Form</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ <a href="<?php echo base_url()?>Alumni">Alumni </a></li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<?php if ($this->session->flashdata('errorMessage')!=null){?>
    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
<?php }
elseif($this->session->flashdata('successMessage')!=null){?>
    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
<?php }?>

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form role="form" action="<?php echo base_url()?>SubmitAlumni" method="post" class="form-horizontal" onsubmit="return submitAlumni()">


                    <div class="form-bottom">
                        <div class="form-group">
                            <label class="control-label col-md-2">PERSONAL DETAILS</label>
                       </div>
                        <div class="form-group">
                        <div class="col-md-offset-1 col-md-9">
                            <label class="control-label col-md-2" style="margin-left:1%;">1.&nbsp;Title<span style="color: red" class="required">*</span></label>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                <input tabindex="7" type="radio" required id="title" name="title"value="Mr"> Mr <br>
                                <input tabindex="7" type="radio" required id="title" name="title"value="Miss"> Miss<br>
                                <input tabindex="7" type="radio" required id="title" name="title"value="Ms"> Ms<br>
                                <input tabindex="7" type="radio" required id="title" name="title"value="Mrs"> Mrs<br>
                                <input tabindex="7" type="radio" required id="title" name="title"value="Mx"> Mx<br>
                                <input tabindex="7" type="radio" required id="title" name="title"value="Other"> Other
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3">2.&nbsp;First Name<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                <input type="text" name="firstName" placeholder="Your First Name" value="<?php echo set_value('firstName');?>" class="form-control" id="firstName" maxlength="100" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3">3.&nbsp;Last Name<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('lastName'); ?></font></p>
                                <input type="text" name="lastName" placeholder="Your Last Name" value="<?php echo set_value('lastName');?>" class="form-control" id="lastName" maxlength="100" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-2" style="margin-left:2%;">&nbsp;4.&nbsp;Gender</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                <input tabindex="7" type="radio"  id="gender" name="gender"<?php
                                echo set_value('gender') == 'M' ? "checked" : "";
                                ?> value="M"> Male<br>
                                <input tabindex="8" type="radio"  id="gender" name="gender" <?php
                                echo set_value('gender') == 'F' ? "checked" : "";
                                ?> value="F"> Female<br>
                                <input tabindex="9" type="radio"  id="gender" name="gender" <?php
                                echo set_value('gender') == 'O' ? "checked" : "";
                                ?> value="O"> Other
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3">5.&nbsp;Date of Birth:</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <input type="text" class="form-control datetimepicker"  id="dob" name="dateOfBirth" value="<?php echo set_value('dateOfBirth'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3">6.&nbsp;Nationality:</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('nationality'); ?></font></p>
                                <select style="width: 100%" id="nationality" name="nationality">
                                    <option value=""  selected>Select nationality...</option>
                                    <?php for ($i=0;$i<count(NATIONALITY);$i++){?>
                                        <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                        <option value="<?php echo NATIONALITY[$i]?>"<?php
                                        echo set_value('nationality') == NATIONALITY[$i] ? "selected" : "";
                                        ?>><?php echo NATIONALITY[$i]?></option>
                                    <?php } ?>
                                </select>


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left: -2%;">7.&nbsp;Address:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                                <input tabindex="27" type="text" class="form-control" required id="address" name="address" value="<?php echo set_value('address'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left: -1%;">8.&nbsp;Post Code:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('postcode'); ?></font></p>
                                <input tabindex="29" type="text" class="form-control"  id="postcode" name="postcode" value="<?php echo set_value('postcode'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left: -4%;">9.&nbsp;Mobile:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('mobileNo'); ?></font></p>
                                <input tabindex="34" type="text" class="form-control" required id="mobileNo" name="mobileNo" value="<?php echo set_value('mobileNo'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left: -4%;">10.&nbsp;E-mail:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                <input tabindex="35" type="email" class="form-control" required id="email" name="email"  value="<?php echo set_value('email'); ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">COURSE DETAILS</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left: -1%;">11.&nbsp;Student ID:</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <input tabindex="34" type="text" class="form-control" id="studentId" name="studentId" value="<?php echo set_value('studentId'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left:4%;">12.&nbsp;Course complete:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('courseComplete'); ?></font></p>
                                <input tabindex="7" type="radio" required id="courseComplete" name="courseComplete"<?php
                                echo set_value('courseComplete') == 'B' ? "checked" : "";
                                ?> value="B"> Business<br>
                                <input tabindex="8" type="radio" required id="courseComplete" name="courseComplete" <?php
                                echo set_value('courseComplete') == 'C' ? "checked" : "";
                                ?> value="C"> Computing<br>
                                <input tabindex="8" type="radio" required id="courseComplete" name="courseComplete" <?php
                                echo set_value('courseComplete') == 'HS' ? "checked" : "";
                                ?> value="HS"> Health and Social Care<br>
                                <input tabindex="8" type="radio" required id="courseComplete" name="courseComplete" <?php
                                echo set_value('courseComplete') == 'T' ? "checked" : "";
                                ?> value="T"> Travel Tourism<br>
                                <input tabindex="9" type="radio" required id="courseComplete" name="courseComplete" <?php
                                echo set_value('courseComplete') == 'HM' ? "checked" : "";
                                ?> value="HM"> Hospitality Management
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-3" style="margin-left:5%;">13.&nbsp;Course Start Year:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('courseStartYear'); ?></font></p>
                                <input tabindex="29" type="text" class="form-control"  id="courseStartYear" name="courseStartYear" value="<?php echo set_value('courseStartYear'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-4" style="margin-left:3%;">14.&nbsp;Course Completion Year:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('courseCompleteYear'); ?></font></p>
                                <input tabindex="29" type="text" class="form-control"  id="courseCompleteYear" required name="courseCompleteYear" value="<?php echo set_value('courseCompleteYear'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">CAREER DETAILS</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-4" style="margin-left:-5%;">15.&nbsp;Current Status<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('currentStatus'); ?></font></p>
                                <input tabindex="7" type="radio" required id="currentStatus" name="currentStatus"value="Employed">Employed <br>
                                <input tabindex="7" type="radio" required id="currentStatus" name="currentStatus"value="Further Education">Further Education<br>
                                <input tabindex="7" type="radio" required id="currentStatus" name="currentStatus"value="Other">Other<br>
                                <input tabindex="7" style="display:none;" type="text" name="currentOther" id="currentOther"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-7" style="margin-left:8%;">16.&nbsp;Name of Employer/ Organisation/College/University (if Applicable):<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <input tabindex="34" type="text" class="form-control" required id="organisation" name="organisation" value="<?php echo set_value('organisation'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-7" style="margin-left:-12%;">17.&nbsp;Address of Employer/College/University:</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <input tabindex="34" type="text" class="form-control"  id="emAddress" name="emAddress" value="<?php echo set_value('emAddress'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-7" style="margin-left:-10%;">18.&nbsp;Job Title / Course Studying (if Applicable):<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <input tabindex="34" type="text" class="form-control" required id="jobTitle" name="jobTitle" value="<?php echo set_value('jobTitle'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-4" style="margin-left:4%;">19.&nbsp;Year Started of Job/Course:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('startCourse'); ?></font></p>
                                <input tabindex="34" type="number" class="form-control" required id="startCourse" name="startCourse" value="<?php echo set_value('startCourse'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Stay Connected</label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-1 col-md-9">
                                <label class="control-label col-md-9" style="margin-left:7%;">20.&nbsp;If you would like to receive information from ICON College, please tick the relevant box:<span style="color: red" class="required">*</span></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-9">
                                <p><font color="red"> <?php echo form_error('receiveInfo'); ?></font></p>
<!--                                <input tabindex="7" type="checkbox" required id="receiveInfo" name="receiveInfo"--><?php
//                                echo set_value('receiveInfo') == 'T' ? "checked" : "";
//                                ?><!-- value="M"> Telephone/Mobile<br>-->
<!--                                <input tabindex="8" type="checkbox" required id="receiveInfo" name="receiveInfo" --><?php
//                                echo set_value('receiveInfo') == 'E' ? "" : "";
//                                ?><!-- value="F"> By E-mail<br>-->
<!--                                <input tabindex="8" type="checkbox" required id="receiveInfo" name="receiveInfo" --><?php
//                                echo set_value('receiveInfo') == 'P' ? "" : "";
//                                ?><!-- value="F"> No thanks, I don't want to be contacted-->
                                <input tabindex="7"  type="checkbox"  name="receiveInfo" value="T">Telephone/Mobile<br>
                                <input tabindex="8"  type="checkbox"  name="receiveInfo" value="E" >By E-mail<br>
                                <input tabindex="9"  type="checkbox"  name="receiveInfo" value="N" >No thanks, I don't want to be contacted
                            </div>
                        </div>

                        <div id="csrf">
                            <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        </div>
<!--                        <div style="margin-left: 140px" class="g-recaptcha" data-sitekey="--><?php //echo SITE_KEY_CONTACT?><!--"></div><br>-->
                        <div style="margin-left: 140px" class="g-recaptcha" data-sitekey="<?php echo SITE_KEY_CONTACT?>"></div><br>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-10">
                                <button type="reset" style="color: #fff;" class="btn btn-next">Reset</button>
                                <button type="submit" class="btn btn-next">Submit</button>
                            </div>
                        </div>
                    </div>


                </form>


            </div><!-- /col-md-9 -->

        </div>
    </div>
</section>

<?php include("footer.php"); ?>
<script>
    function submitAlumni() {
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
<!--<script>-->
<!--    function submitFeedback() {-->
<!---->
<!--        var name =  document.getElementById("name").value;-->
<!--        var profession =  document.getElementById("profession").value;-->
<!--        var details =  document.getElementById("details").value;-->
<!--        var email =  document.getElementById("email").value;-->
<!--        var mobile =  document.getElementById("mobile").value;-->
<!---->
<!--        var chk=/^[0-9]*$/;-->
<!--        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;-->
<!---->
<!--        if(grecaptcha && grecaptcha.getResponse().length <= 0)-->
<!--        {-->
<!--            //the recaptcha is checked-->
<!--            // Do what you want here-->
<!--            alert('Please select the recaptcha !');-->
<!--            return false;-->
<!--        }-->
<!---->
<!---->
<!---->
<!--        if (name ==""){-->
<!--            alert("Name field can not be empty !! ");-->
<!--            return false;-->
<!--        }-->
<!--        if (name.length > 100){-->
<!--            alert("Name field can not be greater than 100 charecter !! ");-->
<!--            return false;-->
<!--        }-->
<!--        if (email ==""){-->
<!--            alert("Email field can not be empty !! ");-->
<!--            return false;-->
<!--        }-->
<!--        if (profession.length > 100){-->
<!--            alert("Profession field can not be greater than 100 charecter !! ");-->
<!--            return false;-->
<!--        }-->
<!--        if (details == ""){-->
<!--            alert("Details field can not be empty !! ");-->
<!--            return false;-->
<!--        }-->
<!--        if(!mobile.match(chk)) {-->
<!--            alert( 'Please enter a valid Mobile number!!' );-->
<!--            return false;-->
<!--        }-->
<!--        if(mobile.length >45) {-->
<!--            alert( 'Mobile number must be less than 45 charecter!!' );-->
<!--            return false;-->
<!--        }-->
<!--        if(!email.match(mailformat))-->
<!--        {-->
<!--            alert("You have entered an invalid email address!");-->
<!--            return false;-->
<!--        }-->
<!---->
<!---->
<!--    }-->
<!--</script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/scripts.js"></script>

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

