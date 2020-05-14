
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
        <div class="container">
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
                <div class="col-md-12">
                    <?php foreach ($candidateInfos as $candidateInfo){ ?>

                        <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm1" method="post" class="form-horizontal" onsubmit="return checkvalidation()">

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
                                        <select style="width: 100%" name="title" id="title">
                                            <option value=""><?php echo "Select Title"?></option>
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


                                <div class="form-group">
                                    <label class="control-label col-md-2">Date of Birth:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('dob'); ?></font></p>
                                        <input type="text"  class="form-control datetimepicker" required id="dob" name="dob" value="<?php echo $candidateInfo->dateOfBirth ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Sex:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                        <input type="radio" required id="gender" name="gender" value="M" <?php if($candidateInfo->gender=='M'){ echo "checked=checked";}?>> Male&nbsp;&nbsp;
                                        <input type="radio" required id="gender" name="gender" value="F" <?php if($candidateInfo->gender=='F'){ echo "checked=checked";}?>> Female&nbsp;&nbsp;
                                        <input type="radio" required id="gender" name="gender" value="O" <?php if($candidateInfo->gender=='O'){ echo "checked=checked";}?>> Other
                                        <input type="radio" required id="gender" name="gender" value="PNTS" <?php if($candidateInfo->gender=='PNTS'){ echo "checked=checked";}?>> Pefer Not To Say
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Any Sex Change:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('genderchange'); ?></font></p>
                                        <input type="radio" required id="genderChange" name="genderChange" value="Y" <?php if($candidateInfo->ganderChange=='Y'){ echo "checked=checked";}?>> Y&nbsp;&nbsp;
                                        <input type="radio" required id="genderChange" name="genderChange" value="N" <?php if($candidateInfo->ganderChange=='N'){ echo "checked=checked";}?>> N&nbsp;&nbsp;
                                        <input type="radio" required id="genderChange" name="genderChange" value="PNTS" <?php if($candidateInfo->ganderChange=='PNTS'){ echo "checked=checked";}?>> Pefer Not To Say
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
                                            <option value=""  selected>Select Nationality...</option>
                                            <?php for ($i=0;$i<count(NATIONALITY);$i++){?>
                                                <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                                <option value="<?php echo NATIONALITY[$i]?>"<?php if (!empty($candidateInfo->nationality) && $candidateInfo->nationality == NATIONALITY[$i])  echo 'selected = "selected"'; ?>><?php echo NATIONALITY[$i]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Passport No.:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('passportNo'); ?></font></p>
                                        <input type="text" class="form-control"  id="passportNo" name="passportNo" value="<?php echo $candidateInfo->passportNo ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">PP Expiry Date:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('passportExpiryDate'); ?></font></p>
                                        <input type="text" class="form-control datetimepicker"  id="passportExpiryDate" name="passportExpiryDate" value="<?php echo $candidateInfo->passportExpiryDate ?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">UK Entry Date:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('UkEntryDate'); ?></font></p>
                                        <input type="text" class="form-control datetimepicker" id="UkEntryDate" name="UkEntryDate" value="<?php echo $candidateInfo->ukEntryDate ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Visa Type:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('VisaType'); ?></font></p>
                                        <select style="width: 100%" id="VisaType"  name="VisaType">

                                            <option value="" selected><?php echo SELECT_TYPE?></option>
                                            <?php for ($i=0;$i<count(VISA_TYPE);$i++){?>
                                                <!--                                        <option --><?php //echo set_select('VisaType',  VISA_TYPE[$i], False); ?><!-->--><?php //echo VISA_TYPE[$i]?><!--</option>-->
                                                <option value="<?php echo VISA_TYPE[$i]?>"<?php if (!empty($candidateInfo->visaType) && $candidateInfo->visaType == VISA_TYPE[$i])  echo 'selected = "selected"'; ?>><?php echo VISA_TYPE[$i]?></option>

                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Visa Expiry Date:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('visaExpiryDate'); ?></font></p>
                                        <input type="text" class="form-control datetimepicker"  id="visaExpiryDate" name="visaExpiryDate" value="<?php echo $candidateInfo->visaExpiryDate ?>">
                                    </div>
                                </div>

                                <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>

                                <div class="form-group">
                                    <label class="control-label col-md-2" id="caddresslabel">Address Line 1:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                        <input tabindex="27"  type="text" class="form-control" required id="currentAddress" name="currentAddress" value="<?php echo $candidateInfo->currentAddress ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" id="caddresslabel2">Address Line 2:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                        <input tabindex="28"  type="text" class="form-control"  id="currentAddress2" name="currentAddress2" value="<?php echo $candidateInfo->currentAddress2 ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" id="caddresslabel3">Address Line 3:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddress3'); ?></font></p>
                                        <input tabindex="29"  type="text" class="form-control"  id="currentAddress3" name="currentAddress3" value="<?php echo $candidateInfo->currentAddress3 ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2" id="caddressCity">City/Town:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddressCity'); ?></font></p>
                                        <input tabindex="30"  type="text" class="form-control" required id="currentAddressCity" name="currentAddressCity" value="<?php echo $candidateInfo->currentAddressCity ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" id="caddressState">County/State:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddressState'); ?></font></p>
                                        <input tabindex="31"  type="text" class="form-control"  id="currentAddressState" name="currentAddressState" value="<?php echo $candidateInfo->currentAddressState ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Post Code :<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddressPO'); ?></font></p>
                                        <input type="text" class="form-control" required id="currentAddressPO" name="currentAddressPO" value="<?php echo $candidateInfo->currentAddressPo?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Country:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('currentAddressCountry'); ?></font></p>
                                        <select style="width: 100%" id="currentAddressCountry" required name="currentAddressCountry">
                                            <option value=""  selected>Select country...</option>
                                            <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->currentAddressCountry) && $candidateInfo->currentAddressCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
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
                                <h4 style="font-weight:bold;  margin-bottom:20px; text-align:center; text-decoration:underline">Permanent Address Details</h4>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Same as Current </label>
                                    <div class="col-md-10">
                                        <input style="margin-top: 10px" tabindex="36"  type="checkbox" id="samecheck2" onclick="addresscheck()">
                                    </div>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label class="control-label col-md-2">Permanent Address:<span style="color: red" class="required">*</span></label>-->
<!--                                    <div class="col-md-10">-->
<!--                                        <p><font color="red"> --><?php //echo form_error('overseasHomeAddress'); ?><!--</font></p>-->
<!--                                        <textarea id="comment-message" required id="overseasHomeAddress" maxlength="1000" name="overseasHomeAddress" rows="8" tabindex="4">--><?php //echo $candidateInfo->overseasAddress?><!--</textarea>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="form-group" id="paddresslabel">
                                    <label class="control-label col-md-2" > Address Line 1:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('permanentAddress'); ?></font></p>
                                        <!--                                            	<textarea id="comment-message" required id="overseasHomeAddress" maxlength="1000" name="overseasHomeAddress" rows="8" tabindex="4">--><?php //echo set_value('overseasHomeAddress');?><!--</textarea>-->
                                        <input tabindex="37"  type="text" class="form-control" required id="permanentAddress" name="permanentAddress" value="<?php echo $candidateInfo->permanentAddress?>">
                                    </div>
                                </div>
                                <div class="form-group" id="paddresslabel2">
                                    <label class="control-label col-md-2" >Address Line 2:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('permanentAddress2'); ?></font></p>
                                        <input tabindex="38"  type="text" class="form-control"  id="permanentAddress2" name="permanentAddress2" value="<?php echo $candidateInfo->permanentAddress2?>">
                                    </div>
                                </div>
                                <div class="form-group" id="paddresslabel3">
                                    <label class="control-label col-md-2" >Address Line 3:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('permanentAddress3'); ?></font></p>
                                        <input tabindex="39"  type="text" class="form-control"  id="permanentAddress3" name="permanentAddress3" value="<?php echo $candidateInfo->permanentAddress3?>">
                                    </div>
                                </div>

                                <div class="form-group" id="paddresslabelCity">
                                    <label class="control-label col-md-2" >City/Town:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('permanentAddressCity'); ?></font></p>
                                        <input tabindex="40"  type="text" class="form-control" required id="permanentAddressCity" name="permanentAddressCity" value="<?php echo $candidateInfo->permanentAddressCity?>">
                                    </div>
                                </div>
                                <div class="form-group" id="paddresslabelState">
                                    <label class="control-label col-md-2" >County/State:</label>

                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('permanentAddressState'); ?></font></p>
                                        <input tabindex="41"  type="text" class="form-control"  id="permanentAddressState" name="permanentAddressState" value="<?php echo $candidateInfo->permanentAddressState?>">
                                    </div>
                                </div>

                                <div class="form-group" id="overseasAddressPo">
                                    <label class="control-label col-md-2">Post Code :<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('overseasAddressPO'); ?></font></p>
                                        <input type="text" class="form-control" required id="overseasAddressPO" name="overseasAddressPO" value="<?php echo $candidateInfo->overseasAddressPo ?>">
                                    </div>
                                </div>

                                <div class="form-group" id="paddresslabelCountry">
                                    <label class="control-label col-md-2">Country:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('permanentAddressCountry'); ?></font></p>
                                        <select style="width: 100%" id="permanentAddressCountry" required name="permanentAddressCountry">
                                            <option value=""  selected>Select country...</option>
                                            <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->permanentAddressCountry) && $candidateInfo->permanentAddressCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>





                                <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Contact Details//Next of Kin</h2>

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

                                <h4 style="font-weight:bold;  margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Address Details</h4>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Same as Permanent </label>
                                    <div class="col-md-10">
                                        <input style="margin-top: 10px" tabindex="36"  type="checkbox" id="samecheck3" onclick="addresscheck2()">
                                    </div>
                                </div>

                                <div class="form-group" id="eaddresslabel">
                                    <label class="control-label col-md-2" id="eaddresslabel">Address Line 1:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('EmergencyContactAddress'); ?></font></p>
                                        <input tabindex="46"  type="text" class="form-control" required id="emaddress" name="EmergencyContactAddress" value="<?php echo $candidateInfo->emergencyContactAddress ?>" >
                                    </div>
                                </div>

                                <div class="form-group" id="eaddresslabel2">
                                    <label class="control-label col-md-2" id="eaddresslabel2">Address Line 2:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('EmergencyContactAddress2'); ?></font></p>
                                        <input tabindex="47"  type="text" class="form-control"  id="emaddress2" name="EmergencyContactAddress2" value="<?php echo $candidateInfo->emergencyContactAddress2 ?>" >
                                    </div>
                                </div>
                                <div class="form-group" id="eaddresslabel3">
                                    <label class="control-label col-md-2" id="eaddresslabel3">Address Line 3:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('EmergencyContactAddress3'); ?></font></p>
                                        <input tabindex="48"  type="text" class="form-control"  id="emaddress3" name="EmergencyContactAddress3" value="<?php echo $candidateInfo->emergencyContactAddress3 ?>" >
                                    </div>
                                </div>

                                <div class="form-group" id="ecitylabel">
                                    <label class="control-label col-md-2" id="ecitylabel">City/Town:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('EmergencyContactCity'); ?></font></p>
                                        <input tabindex="49"  type="text" class="form-control" required id="emaddressCity" name="EmergencyContactCity" value="<?php echo $candidateInfo->emergencyContactAddressCity ?>" >
                                    </div>
                                </div>
                                <div class="form-group" id="estatelabel">
                                    <label class="control-label col-md-2" id="estatelabel">Country/State:</label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('EmergencyContactState'); ?></font></p>
                                        <input tabindex="50"  type="text" class="form-control"  id="emaddressState" name="EmergencyContactState" value="<?php echo $candidateInfo->emergencyContactAddressState ?>" >
                                    </div>
                                </div>

                                <div class="form-group" id="epostalcodelabel">
                                    <label class="control-label col-md-2">Post Code :<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('EmergencyContactAddressPO'); ?></font></p>
                                        <input type="text" class="form-control" required id="EmergencyContactAddressPO" name="EmergencyContactAddressPO" value="<?php echo $candidateInfo->emergencyContactAddressPo ?>">
                                    </div>
                                </div>

                                <div class="form-group" id="ecountrylabel">
                                    <label class="control-label col-md-2">Country :<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="re+d"> <?php echo form_error('emergencyContactCountry'); ?></font></p>
                                        <select style="width: 100%" id="emergencyContactCountry" required name="emergencyContactCountry">
                                            <option value=""  selected>Select country...</option>
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
                                    <label class="control-label col-md-2">Course Name:<span style="color: red" class="required">*</span></label>
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
                                    <label class="control-label col-md-2">Course Session:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('courseSession'); ?></font></p>
                                        <select style="width: 100%;"  id="courseSession" required name="courseSession">
                                        <option value=""  selected>Select Session...</option>
                                        <?php for ($i=0;$i<count(COURSESESSION);$i++){?>
                                            <option value="<?php echo COURSESESSION[$i]?>"<?php if (!empty($candidateInfo->courseSession) && $candidateInfo->courseSession == COURSESESSION[$i])  echo 'selected = "selected"'; ?>><?php echo COURSESESSION[$i]?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="control-label col-md-2">Year:<span style="color: red" class="required">*</span></label>
									<div class="col-md-9">
										<p><font color="red"> <?php echo form_error('courseYear'); ?></font></p>
										<!--                                <input tabindex="58"  type="text" class="form-control" id="courseYear" name="courseYear" required value="--><?php //echo $candidateInfo->courseYear ?><!--">-->
										<?php
										$currently_selected = $candidateInfo->courseYear;
										$earliest_year = date('Y');
										$latest_year = date('Y')+6;
										print '<select tabindex="58" name="courseYear" id="courseYear" required>';
										print '<option value=""  selected>Select Year</option>';
										foreach ( range($earliest_year,$latest_year) as $i ) {
											print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
										}
										print '</select>';
										?>

									</div>
								</div>
<!--                                <div class="form-group">-->
<!--                                    <label class="control-label col-md-2">Year:<span style="color: red" class="required">*</span></label>-->
<!--                                    <div class="col-md-10">-->
<!--                                        <p><font color="red"> --><?php //echo form_error('courseYear'); ?><!--</font></p>-->
<!--                                        <input type="text" class="form-control" id="courseYear" name="courseYear" value="--><?php //echo $candidateInfo->courseYear ?><!--">-->
<!--                                    </div>-->
<!--                                </div>-->

                                <div class="form-group">
                                    <label class="control-label col-md-2">Mode of study:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('methodeOfStudy'); ?></font></p>
                                        <input type="radio" required name="methodeOfStudy" id="methodeOfStudy" value="FT"   <?php if($candidateInfo->methodOfStudy=='FT'){ echo "checked=checked";}?>> Full Time&nbsp;&nbsp;
                                        <input type="radio" required name="methodeOfStudy" id="methodeOfStudy" value="PT"   <?php if($candidateInfo->methodOfStudy=='PT'){ echo "checked=checked";}?>> Part Time&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Time of study:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('timeOfStudy'); ?></font></p>
                                        <input type="radio" required name="timeOfStudy" id="timeOfStudy" value="D"    <?php if($candidateInfo->timeOfStudy=='D'){ echo "checked=checked";}?>> Day&nbsp;&nbsp;
                                        <input type="radio" required name="timeOfStudy" id="timeOfStudy" value="EW"  <?php if($candidateInfo->timeOfStudy=='EW'){ echo "checked=checked";}?>> Evenings & Weekend
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

                                        <button style="color: #fff; background-color: #841A29;" type="reset" id="hide"  class="btn btn-next">Reset</button>
                                        <a  href="<?php echo base_url()?>Admin/StudentApplication/manageApplication" ><button style="color: #fff; background-color: #841A29;" type="button"  class="btn btn-next">Cancel</button></a>
                                        <button formaction="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm1" style="color: #fff; background-color: #841A29;" type="submit" class="btn btn-next">Save for Later</button>
                                        <button style="color: #fff; background-color: #841A29;" type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm1AndNext" class="btn btn-next">Next</button>
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
    function checkvalidation() {
        var value = document.getElementById('EmergencyContactMobile').value;
        if (value.length < 11 || value.length > 20) {
            alert('Please at least 11 digit Telephone/Mobile number');
            return false; // keep form from submitting
        }
    }
</script>

<script type="text/javascript">
    function addresscheck() {
        if (document.getElementById('samecheck2').checked) {
            document.getElementById('permanentAddress').value = document.getElementById('currentAddress').value;
            document.getElementById('permanentAddress2').value = document.getElementById('currentAddress2').value;
            document.getElementById('permanentAddress3').value = document.getElementById('currentAddress3').value;
            document.getElementById('overseasAddressPO').value = document.getElementById('currentAddressPO').value;
            document.getElementById('permanentAddressCity').value = document.getElementById('currentAddressCity').value;
            document.getElementById('permanentAddressState').value = document.getElementById('currentAddressState').value;
            document.getElementById('permanentAddressCountry').value = document.getElementById('currentAddressCountry').value;


            document.getElementById('permanentAddress').style.display = "none";
            document.getElementById('permanentAddress2').style.display = "none";
            document.getElementById('permanentAddress3').style.display = "none";
            document.getElementById('overseasAddressPO').style.display = "none";
            document.getElementById('permanentAddressCity').style.display = "none";
            document.getElementById('permanentAddressState').style.display = "none";
            document.getElementById('permanentAddressCountry').style.display = "none";

            document.getElementById('paddresslabel').style.display = "none";
            document.getElementById('paddresslabel2').style.display = "none";
            document.getElementById('paddresslabel3').style.display = "none";
            document.getElementById('overseasAddressPo').style.display = "none";
            document.getElementById('paddresslabelCity').style.display = "none";
            document.getElementById('paddresslabelState').style.display = "none";
            document.getElementById('paddresslabelCountry').style.display = "none";
            // document.getElementById('sameascurrent').style.display = "block";



        }else
        {
            document.getElementById('permanentAddress').style.display = "block";
            document.getElementById('permanentAddress2').style.display = "block";
            document.getElementById('permanentAddress3').style.display = "block";
            document.getElementById('overseasAddressPO').style.display = "block";
            document.getElementById('permanentAddressCity').style.display = "block";
            document.getElementById('permanentAddressState').style.display = "block";
            document.getElementById('permanentAddressCountry').style.display = "block";

            document.getElementById('paddresslabel').style.display = "block";
            document.getElementById('paddresslabel2').style.display = "block";
            document.getElementById('paddresslabel3').style.display = "block";
            document.getElementById('overseasAddressPo').style.display = "block";
            document.getElementById('paddresslabelCity').style.display = "block";
            document.getElementById('paddresslabelState').style.display = "block";
            document.getElementById('paddresslabelCountry').style.display = "block";
        }
    }

    function addresscheck2() {
        if (document.getElementById('samecheck3').checked) {
            document.getElementById('emaddress').value = document.getElementById('permanentAddress').value;
            document.getElementById('emaddress2').value = document.getElementById('permanentAddress2').value;
            document.getElementById('emaddress3').value = document.getElementById('permanentAddress3').value;
            document.getElementById('EmergencyContactAddressPO').value = document.getElementById('overseasAddressPO').value;
            document.getElementById('emaddressCity').value = document.getElementById('permanentAddressCity').value;
            document.getElementById('emaddressState').value = document.getElementById('permanentAddressState').value;
            document.getElementById('emergencyContactCountry').value = document.getElementById('permanentAddressCountry').value;

            document.getElementById('eaddresslabel').style.display = "none";
            document.getElementById('eaddresslabel2').style.display = "none";
            document.getElementById('eaddresslabel3').style.display = "none";
            document.getElementById('epostalcodelabel').style.display = "none";
            document.getElementById('ecitylabel').style.display = "none";
            document.getElementById('estatelabel').style.display = "none";
            document.getElementById('ecountrylabel').style.display = "none";

        }else
        {
            document.getElementById('eaddresslabel').style.display = "block";
            document.getElementById('eaddresslabel2').style.display = "block";
            document.getElementById('eaddresslabel3').style.display = "block";
            document.getElementById('epostalcodelabel').style.display = "block";
            document.getElementById('ecitylabel').style.display = "block";
            document.getElementById('estatelabel').style.display = "block";
            document.getElementById('ecountrylabel').style.display = "block";

        }
    }

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

<script>
    $(document).ready(function(){
        $("#hide").click(function(){

            $("#firstName").removeAttr('value');
            $("#surName").removeAttr('value');
            $("#placeOfBirth").removeAttr('value');
            $("#dob").removeAttr('value');
            $("#visaExpiryDate").removeAttr('value');
            $("#passportExpiryDate").removeAttr('value');
            $("#UkEntryDate").removeAttr('value');
            $("#passportNo").removeAttr('value');
            $("#currentAddress").removeAttr('value');
            $("#currentAddress2").removeAttr('value');
            $("#currentAddress3").removeAttr('value');
            $("#currentAddressCity").removeAttr('value');
            $("#currentAddressState").removeAttr('value');
            $("#currentAddressPO").removeAttr('value');
            $("#telephone").removeAttr('value');
            $("#courseYear").removeAttr('value');
            $("#mobile").removeAttr('value');
            $("#email").removeAttr('value');
            $("#permanentAddress").removeAttr('value');
            $("#permanentAddress2").removeAttr('value');
            $("#permanentAddress3").removeAttr('value');
            $("#permanentAddressCity").removeAttr('value');
            $("#permanentAddressState").removeAttr('value');
            $("#overseasAddressPO").removeAttr('value');
            $("#EmergencyContactName").removeAttr('value');
            $("#EmergencyContactRelation").removeAttr('value');
            $("#emaddress").removeAttr('value');
            $("#emaddress2").removeAttr('value');
            $("#emaddress3").removeAttr('value');
            $("#emaddressCity").removeAttr('value');
            $("#emaddressState").removeAttr('value');
            $("#EmergencyContactAddressPO").removeAttr('value');
            $("#EmergencyContactMobile").removeAttr('value');
            $("#EmergencyContactEmail").removeAttr('value');
            $("#awardingBody").removeAttr('value');
            $("#courseLevel").removeAttr('value');
            $("#ulnNo").removeAttr('value');
            $("#ucasCourseCode").removeAttr('value');
            $("#title").children().removeAttr("selected");
            $("#nationality").children().removeAttr("selected");
            $("#VisaType").children().removeAttr("selected");
            $("#currentAddressCountry").children().removeAttr("selected");
            $("#permanentAddressCountry").children().removeAttr("selected");
            $("#EmergencyContactTitle").children().removeAttr("selected");
            $("#emergencyContactCountry").children().removeAttr("selected");
            $("#courseName").children().removeAttr("selected");
            $("#courseSession").children().removeAttr("selected");
            $("#gender").removeAttr("checked");
            $("#genderChange").removeAttr("checked");
            $("#methodeOfStudy").removeAttr("checked");
            $("#timeOfStudy").removeAttr("checked");


        });
    });
</script>


