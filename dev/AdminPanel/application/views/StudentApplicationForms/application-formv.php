
<?php $this->load->view('Admin/head.php'); ?>
<!-- for Application Form -->
<link rel="stylesheet" href="<?php echo base_url()?>public/css/application-form-style.css">
<!-- dateTimepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

<style>

    .datepicker .next ,.prev {
        position: relative !important;
    }
</style>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table border="0" style="width:100%; margin-top: 30px; border: none;">
                    <tr>
                        <td style="border: none;"><img style="height: 80px; border: none;" src="<?php echo base_url()?>public/img/logoform.jpg" alt=""></td>
                        <td style="border: none;"><h2 style="font-size: 24px; border: none;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
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

<section class="flat-row padding-small-v1">
    <div  class="container">
        <div class="row">
            <div class="col-md-9">
                <?php foreach ($candidateInfos as $candidateInfo){ ?>

                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm1" method="post" class="form-horizontal">

                    <!--                        		<fieldset>-->
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Personal Details</h3>
                        </div>

                        <div class="form-top-right">
                            <p>Step 1 / 10</p>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <div class="form-group">
                            <label class="control-label col-md-2">Title:<span style="color: red" class="required">*</span></label>
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
                            <label class="control-label col-md-2">First Name:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                <input type="text" class="form-control" required id="firstName" name="firstName" value="<?php echo $candidateInfo->firstName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Surname:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('surName'); ?></font></p>
                                <input type="text" class="form-control" required id="surName" name="surName" value="<?php echo $candidateInfo->surName ?>">
                            </div>
                        </div>

<!--                        <div class="form-group">-->
<!--                            <label class="control-label col-md-2">Other Names:</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <p><font color="red"> --><?php //echo form_error('otherName'); ?><!--</font></p>-->
<!--                                <input type="text" class="form-control" id="otherName" name="otherName" value="--><?php //echo $candidateInfo->otherNames ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-2">Date of Birth:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('dob'); ?></font></p>
                                <input type="text"  class="form-control datetimepicker" required id="dob" name="dob" value="<?php echo $candidateInfo->dateOfBirth ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Gender:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                <input type="radio" required id="gender" name="gender" value="M" <?php if($candidateInfo->gender=='M'){ echo "checked=checked";}?>> Male&nbsp;&nbsp;
                                <input type="radio" required id="gender" name="gender" value="F" <?php if($candidateInfo->gender=='F'){ echo "checked=checked";}?>> Female&nbsp;&nbsp;
                                <input type="radio" required id="gender" name="gender" value="O" <?php if($candidateInfo->gender=='O'){ echo "checked=checked";}?>> Other
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Place of Birth:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('placeOfBirth'); ?></font></p>
                                <input type="text" class="form-control" required id="placeOfBirth" maxlength="100" name="placeOfBirth" value="<?php echo $candidateInfo->placeOfBirth ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Nationality:<span style="color: red" class="required">*</span></label>
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
                            <label class="control-label col-md-2">Passport No.:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('passportNo'); ?></font></p>
                                <input type="text" class="form-control" required id="passportNo" name="passportNo" value="<?php echo $candidateInfo->passportNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">PP Expiry Date:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('passportExpiryDate'); ?></font></p>
                                <input type="text" class="form-control datetimepicker" required id="passportExpiryDate" name="passportExpiryDate" value="<?php echo $candidateInfo->passportExpiryDate ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">UK Entry Date:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('UkEntryDate'); ?></font></p>
                                <input type="text" class="form-control datetimepicker" required id="UkEntryDate" name="UkEntryDate" value="<?php echo $candidateInfo->ukEntryDate ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Visa Type:<span style="color: red" class="required">*</span></label>
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
                            <label class="control-label col-md-2">Visa Expiry Date:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('visaExpiryDate'); ?></font></p>
                                <input type="text" class="form-control datetimepicker" required id="visaExpiryDate" name="visaExpiryDate" value="<?php echo $candidateInfo->visaExpiryDate ?>">
                            </div>
                        </div>

                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>

                        <div class="form-group">
                            <label class="control-label col-md-2">Current Address:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                <textarea id="comment-message" required id="currentAddress" maxlength="1000" name="currentAddress" rows="8"><?php echo $candidateInfo->currentAddress ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Current Address P.O :<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('currentAddressPO'); ?></font></p>
                                <input type="text" class="form-control" required id="currentAddressPO" name="currentAddressPO" value="<?php echo $candidateInfo->currentAddressPo?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Current Address Courntry:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('currentAddressCountry'); ?></font></p>
                                <select style="width: 100%" id="currentAddressCountry" required name="currentAddressCountry">
                                    <option value="" disabled selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->currentAddressCountry) && $candidateInfo->currentAddressCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Overseas (Home) Address:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('overseasHomeAddress'); ?></font></p>
                                <textarea id="comment-message" required id="overseasHomeAddress" maxlength="1000" name="overseasHomeAddress" rows="8" ><?php echo $candidateInfo->overseasAddress?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Overseas (Home) Address P.O :<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('overseasAddressPO'); ?></font></p>
                                <input type="text" class="form-control" required id="overseasAddressPO" name="overseasAddressPO" value="<?php echo $candidateInfo->overseasAddressPo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Overseas Address Courntry:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('permanentAddressCountry'); ?></font></p>
                                <select style="width: 100%" id="permanentAddressCountry" required name="permanentAddressCountry">
                                    <option value="" disabled selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->permanentAddressCountry) && $candidateInfo->permanentAddressCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
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
                            <label class="control-label col-md-2">Mobile:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>
                                <input type="text" class="form-control" required id="mobile" name="mobile" value="<?php echo $candidateInfo->mobileNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">E-mail:<span style="color: red" class="required">*</span></label>
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
                            <label class="control-label col-md-2">Title:<span style="color: red" class="required">*</span></label>
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
                            <label class="control-label col-md-2">Name:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactName'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactName" name="EmergencyContactName" value="<?php echo $candidateInfo->emergencyContactName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Relation:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactRelation'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactRelation" name="EmergencyContactRelation" value="<?php echo $candidateInfo->emergencyContactRelation ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Address:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress'); ?></font></p>
                                <textarea id="comment-message" required id="EmergencyContactAddress" name="EmergencyContactAddress" rows="8" ><?php echo $candidateInfo->emergencyContactAddress ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Emergency Contact Address P.O :<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddressPO'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactAddressPO" name="EmergencyContactAddressPO" value="<?php echo $candidateInfo->emergencyContactAddressPo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Emergency Contact Country :<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('emergencyContactCountry'); ?></font></p>
                                <select style="width: 100%" id="emergencyContactCountry" required name="emergencyContactCountry">
                                    <option value="" disabled selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->emergencyContactCountry) && $candidateInfo->emergencyContactCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Mobile/Telephone:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('EmergencyContactMobile'); ?></font></p>
                                <input type="text" class="form-control" required id="EmergencyContactMobile" name="EmergencyContactMobile" value="<?php echo $candidateInfo->emergencyContactMobile ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">E-mail:<span style="color: red" class="required">*</span></label>
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

<!--                        <div class="form-group">-->
<!--                            <label class="control-label col-md-2">Course Start Date:</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <p><font color="red"> --><?php //echo form_error('courseStartDate'); ?><!--</font></p>-->
<!--                                <input type="date" class="form-control" id="courseStartDate" name="courseStartDate" value="--><?php //echo $candidateInfo->courseStartDate ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label class="control-label col-md-2">Course End Date:</label>-->
<!--                            <div class="col-md-10">-->
<!--                                <p><font color="red"> --><?php //echo form_error('courseEndDate'); ?><!--</font></p>-->
<!--                                <input type="date" class="form-control" id="courseEndDate" name="courseEndDate" value="--><?php //echo $candidateInfo->courseEndDate ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-2">Course Session:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('courseSession'); ?></font></p>
                                <input type="text" class="form-control" id="courseSession" name="courseSession" value="<?php echo $candidateInfo->courseSession ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Year:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('courseYear'); ?></font></p>
                                <input type="text" class="form-control" id="courseYear" name="courseYear" value="<?php echo $candidateInfo->courseYear ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Mode of study:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('methodeOfStudy'); ?></font></p>
                                <input type="radio" required name="methodeOfStudy" value="FT"   <?php if($candidateInfo->methodOfStudy=='FT'){ echo "checked=checked";}?>> Full Time&nbsp;&nbsp;
                                <input type="radio" required name="methodeOfStudy" value="PT"   <?php if($candidateInfo->methodOfStudy=='PT'){ echo "checked=checked";}?>> Part Time&nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">Time of study:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('timeOfStudy'); ?></font></p>
                                <input type="radio" required name="timeOfStudy" value="D"    <?php if($candidateInfo->timeOfStudy=='D'){ echo "checked=checked";}?>> Day&nbsp;&nbsp;
                                <input type="radio" required name="timeOfStudy" value="E&W"  <?php if($candidateInfo->timeOfStudy=='E&W'){ echo "checked=checked";}?>> Evenings & Weekend
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">ULN No.:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('ulnNo'); ?></font></p>
                                <input type="text" class="form-control" id="ulnNo" name="ulnNo" value="<?php echo $candidateInfo->ulnNo ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2">UCAS Course Code:</label>
                            <div class="col-md-10">
                                <p><font color="red"> <?php echo form_error('ucasCourseCode'); ?></font></p>
                                <input type="text" class="form-control" id="ucasCourseCode" name="ucasCourseCode" value="<?php echo $candidateInfo->ucasCourseCode ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-10">
                                <!--                                            <a href="--><?php //echo base_url()?><!--OnlineForms/insertApplicationForm1"> <button type="button" class="btn ">Next</button></a>-->

                                <button type="submit" class="btn btn-next">Save Application</button>
                                <button type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm1AndNext" class="btn btn-next">Save And Next</button>
                                <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationQualification" ><button type="button"  class="btn btn-next">Next</button></a>

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
                url: '<?php echo base_url("Admin/StudentApplication/getCourseAwardBody")?>',
                data: {courseId: courseId},
                cache: false,
                success: function (data) {

                    document.getElementById('awardingBody').value = data;

                }
            });
        }

    }

</script>