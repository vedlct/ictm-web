
<?php include("header.php"); ?>
<style>
    .datepicker .next ,.prev {
        position: relative !important;
    }
</style>

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

<div id="sessionFlashMessageDiv">
    <?php if ($this->session->flashdata('errorMessage')!=null){?>
        <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
    <?php }
    elseif($this->session->flashdata('successMessage')!=null){?>
        <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
    <?php }?>

</div>

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php foreach ($candidateInfos as $candidateInfo){ ?>

                <form role="form"  action="<?php echo base_url()?>ApplyOnline/editApplicationForm1" method="post" class="form-horizontal" onsubmit=" return checkvalidation()">

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
                            <label class="control-label col-md-3">Title:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                <select tabindex="1"  style="width: 100%" name="title" id="title">
                                    <option value=""><?php echo "Select Title"?></option>
                                    <?php for ($i=0;$i<count(Title);$i++){?>
<!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                        <option value="<?php echo Title[$i]?>"<?php if (!empty($candidateInfo->title) && $candidateInfo->title == Title[$i])  echo 'selected = "selected"'; ?>><?php echo Title[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">First Name:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                <input tabindex="2"  type="text" class="form-control" required id="firstName" name="firstName" value="<?php echo $candidateInfo->firstName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Surname:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('surName'); ?></font></p>
                                <input tabindex="3"  type="text" class="form-control" required id="surName" name="surName" value="<?php echo $candidateInfo->surName ?>">
                            </div>
                        </div>

<!--                        <div class="form-group">-->
<!--                            <label class="control-label col-md-3">Other Names:</label>-->
<!--                            <div class="col-md-9">-->
<!--                                <p><font color="red"> --><?php //echo form_error('otherName'); ?><!--</font></p>-->
<!--                                <input type="text" class="form-control" id="otherName" name="otherName" value="--><?php //echo $candidateInfo->otherNames ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('dob'); ?></font></p>
<!--                                <input type="text"  class="form-control datetimepicker" required id="dob" name="dob" value="--><?php //echo $candidateInfo->dateOfBirth ?><!--">-->

                                <?php
                                $dob=$candidateInfo->dateOfBirth;
                                $a=explode('-',$dob);
                                $dobyear = $a[0];
                                $dobmonth = (int)$a[1];
                                $dobdate = (int)$a[2];
                                ?>
                                Date:
                                <select tabindex="6" name="dobdate" id="dobdate">
                                    <option value=""  selected>Select Date</option>
                                    <?php
                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                        // echo "<option value='$dateNumber'>{$date}</option>";
                                        ?><option value="<?php echo $dateNumber?>" <?php if ($dateNumber == $dobdate-1) echo 'selected = "selected"'?> ><?php echo $date?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Month:
                                <select tabindex="5" name="dobmonth" id="dobmonth">
                                    <option value=""  selected>Select Month</option>
                                    <?php
                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                        ?><option value="<?php echo $monthNumber?>" <?php if ($monthNumber == $dobmonth-1) echo 'selected = "selected"'?> ><?php echo $month?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;
                                Year:
                                <?php
                                 $currently_selected = $dobyear;
                                 $earliest_year = 1950;
                                 $latest_year = date('Y');
                                 print '<select tabindex="4"  name="dobyear" id="dobyear">';
                                 print '<option value=""  selected>Select Year</option>';
                                 foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                 }
                                 print '</select>';
                                ?>


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Place of Birth:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('placeOfBirth'); ?></font></p>
                                <input tabindex="6"  type="text" class="form-control" required id="placeOfBirth" maxlength="100" name="placeOfBirth" value="<?php echo $candidateInfo->placeOfBirth ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Sex:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                <input tabindex="7"  type="radio" required id="gender" name="gender" value="M" <?php if($candidateInfo->gender=='M'){ echo "checked=checked";}?>> Male&nbsp;&nbsp;
                                <input tabindex="8"  type="radio" required id="gender" name="gender" value="F" <?php if($candidateInfo->gender=='F'){ echo "checked=checked";}?>> Female&nbsp;&nbsp;
                                <input tabindex="9"  type="radio" required id="gender" name="gender" value="O" <?php if($candidateInfo->gender=='O'){ echo "checked=checked";}?>> Other
                                <input tabindex="10"  type="radio" required id="gender" name="gender" value="PNTS" <?php if($candidateInfo->gender=='PNTS'){ echo "checked=checked";}?>> Pefer Not To Say
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Any Gender Change:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('genderchange'); ?></font></p>
                                <input tabindex="11"  type="radio" required id="genderChange" name="genderChange" value="Y" <?php if($candidateInfo->ganderChange=='Y'){ echo "checked=checked";}?>> Yes&nbsp;&nbsp;
                                <input tabindex="12"  type="radio" required id="genderChange" name="genderChange" value="N" <?php if($candidateInfo->ganderChange=='N'){ echo "checked=checked";}?>> No&nbsp;&nbsp;
                                <input tabindex="13"  type="radio" required id="genderChange" name="genderChange" value="PNTS" <?php if($candidateInfo->ganderChange=='PNTS'){ echo "checked=checked";}?>> Pefer Not To Say
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3">Nationality:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('nationality'); ?></font></p>
                                <select tabindex="15"  style="width: 100%" id="nationality" required name="nationality">
<!--                                    <option value="">--><?php //echo "Select Title"?><!--</option>-->
                                    <option value=""  selected>Select Nationality...</option>
                                    <?php for ($i=0;$i<count(NATIONALITY);$i++){?>
                                        <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                        <option value="<?php echo NATIONALITY[$i]?>"<?php if (!empty($candidateInfo->nationality) && $candidateInfo->nationality == NATIONALITY[$i])  echo 'selected = "selected"'; ?>><?php echo NATIONALITY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Passport / ID No.:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('passportNo'); ?></font></p>
                                <input tabindex="16"  type="text" class="form-control"  id="passportNo" name="passportNo" value="<?php echo $candidateInfo->passportNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Passport / ID Expiry Date:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('pp'); ?></font></p>
<!--                                <input type="text" class="form-control datetimepicker"  id="passportExpiryDate" name="passportExpiryDate" value="--><?php //echo $candidateInfo->passportExpiryDate ?><!--" >-->


                                <?php
                                $pp=$candidateInfo->passportExpiryDate;
                                $b=explode('-',$pp);
                                $ppyear = $b[0];
                                $ppmonth = (int)$b[1];
                                $ppdate = (int)$b[2];
                                ?>

                                Date:
                                <select tabindex="19"  name="ppdate" id="ppdate">
                                    <option value=""  selected>Select Date</option>
                                    <?php
                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                        // echo "<option value='$dateNumber'>{$date}</option>";
                                        ?><option value="<?php echo $dateNumber?>" <?php if ($dateNumber == $ppdate-1) echo 'selected = "selected"'?> ><?php echo $date?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Month:
                                <select tabindex="18"  name="ppmonth" id="ppmonth">
                                    <option value=""  selected>Select Month</option>
                                    <?php
                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                        ?><option value="<?php echo $monthNumber?>" <?php if ($monthNumber == $ppmonth-1) echo 'selected = "selected"'?> ><?php echo $month?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Year:
                                <?php
                                $currently_selected = $ppyear;
								$current_year = date('Y');
//                                $earliest_year = 1950;
                                $latest_year = date('Y')+10;
                                print '<select tabindex="17"  name="ppyear" id="ppyear">';
                                print '<option value=""  selected>Select Year</option>';
                                foreach ( range($current_year,$latest_year) as $i ) {
                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                }
                                print '</select>';
                                ?>


                                &nbsp;&nbsp;&nbsp;


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">UK Entry Date:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('uk'); ?></font></p>
<!--                                <input type="text" class="form-control datetimepicker" id="UkEntryDate" name="UkEntryDate" value="--><?php //echo $candidateInfo->ukEntryDate ?><!--">-->

                                <?php
                                $uk=$candidateInfo->ukEntryDate;
                                $c=explode('-',$uk);
                                $ukyear = $c[0];
                                $ukmonth = (int)$c[1];
                                $ukdate = (int) $c[2];
                                ?>


                                Date:
                                <select tabindex="22"  name="ukdate" id="ukdate">
                                    <option value=""  selected>Select Date</option>
                                    <?php
                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                        // echo "<option value='$dateNumber'>{$date}</option>";
                                        ?><option value="<?php echo $dateNumber?>" <?php if ($dateNumber == $ukdate-1) echo 'selected = "selected"'?> ><?php echo $date?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Month:
                                <select tabindex="21"  name="ukmonth" id="ukmonth">
                                    <option value=""  selected>Select Month</option>
                                    <?php
                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                        ?><option value="<?php echo $monthNumber?>" <?php if ($monthNumber == $ukmonth-1) echo 'selected = "selected"'?> ><?php echo $month?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Year:
                                <?php
                                $currently_selected = $ukyear;
                                $earliest_year = 1950;
                                $latest_year = date('Y');
                                print '<select tabindex="20"  name="ukyear" id="ukyear">';
                                print ' <option value=""  selected>Select Year</option>';
                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                }
                                print '</select>';
                                ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Visa Type:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('VisaType'); ?></font></p>
                                <select tabindex="23"  style="width: 100%" id="VisaType"  name="VisaType">

                                    <option value="" selected><?php echo "Select Visa Type"?></option>
                                    <?php for ($i=0;$i<count(VISA_TYPE);$i++){?>
<!--                                        <option --><?php //echo set_select('VisaType',  VISA_TYPE[$i], False); ?><!-->--><?php //echo VISA_TYPE[$i]?><!--</option>-->
                                        <option value="<?php echo VISA_TYPE[$i]?>"<?php if (!empty($candidateInfo->visaType) && $candidateInfo->visaType == VISA_TYPE[$i])  echo 'selected = "selected"'; ?>><?php echo VISA_TYPE[$i]?></option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Visa Expiry Date:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('visa'); ?></font></p>
<!--                                <input type="text" class="form-control datetimepicker"  id="visaExpiryDate" name="visaExpiryDate" value="--><?php //echo $candidateInfo->visaExpiryDate ?><!--">-->
                                <?php
                                $visa=$candidateInfo->visaExpiryDate;
                                $d=explode('-',$visa);
                                $visayear = $d[0];
                                $visamonth = (int)$d[1];
                                $visadate = (int)$d[2];
                                ?>

                                Date:
                                <select tabindex="26"  name="visadate" id="visadate">
                                    <option value=""  selected>Select Date</option>
                                    <?php
                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                        // echo "<option value='$dateNumber'>{$date}</option>";
                                        ?><option value="<?php echo $dateNumber?>" <?php if ($dateNumber == $visadate-1) echo 'selected = "selected"'?> ><?php echo $date?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Month:
                                <select tabindex="25"  name="visamonth" id="visamonth">
                                    <option value=""  selected>Select Month</option>
                                    <?php
                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                        ?><option value="<?php echo $monthNumber?>" <?php if ($monthNumber == $visamonth-1) echo 'selected = "selected"'?> ><?php echo $month?></option>;<?php
                                    }
                                    ?>
                                </select>
                                &nbsp;
                                Year:
                                <?php
                                $currently_selected = $visayear;
                                $earliest_year = 1950;
                                $latest_year = date('Y')+6;
                                print '<select tabindex="24"  name="visayear" id="visayear">';
                                print '<option value=""  selected>Select Year</option>';
                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                }
                                print '</select>';
                                ?>


                            </div>
                        </div>

                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>
                        <div class="form-group">
                        <h2 class="control-label col-md-3" style="font-weight:bold;  margin-bottom:20px; margin-right: 120px;  text-decoration:underline">Current Address Details</h2>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="caddresslabel">Address Line 1:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                <input tabindex="27"  type="text" class="form-control" required id="currentAddress" name="currentAddress" value="<?php echo $candidateInfo->currentAddress ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="caddresslabel2">Address Line 2:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                <input tabindex="28"  type="text" class="form-control"  id="currentAddress2" name="currentAddress2" value="<?php echo $candidateInfo->currentAddress2 ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="caddresslabel3">Address Line 3:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddress3'); ?></font></p>
                                <input tabindex="29"  type="text" class="form-control"  id="currentAddress3" name="currentAddress3" value="<?php echo $candidateInfo->currentAddress3 ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" id="caddressCity">City/Town:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddressCity'); ?></font></p>
                                <input tabindex="30"  type="text" class="form-control" required id="currentAddressCity" name="currentAddressCity" value="<?php echo $candidateInfo->currentAddressCity ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="caddressState">County/State:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddressState'); ?></font></p>
                                <input tabindex="31"  type="text" class="form-control"  id="currentAddressState" name="currentAddressState" value="<?php echo $candidateInfo->currentAddressState ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="currentAddressPo">Post Code:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddressPo'); ?></font></p>
                                <input tabindex="29"  type="text" class="form-control"  id="currentAddressPo2" name="currentAddressPo" value="<?php echo $candidateInfo->currentAddressPo ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="caddressCountry">Country:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('currentAddressCountry'); ?></font></p>
                                <select tabindex="32"  style="width: 100%" id="currentAddressCountry" required name="currentAddressCountry">
                                    <option value=""  selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->currentAddressCountry) && $candidateInfo->currentAddressCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Telephone:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>
                                <input tabindex="33"  type="text" class="form-control"  id="telephone" minlength="11"  maxlength="20" name="telephone" value="<?php echo $candidateInfo->telephoneNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Mobile:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>
                                <input tabindex="34"  type="text" class="form-control" required id="mobile" name="mobile" value="<?php echo $candidateInfo->mobileNo ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">E-mail:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                <input tabindex="35"  type="email" class="form-control" required id="email" name="email" value="<?php echo $candidateInfo->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                        <h4 class="control-label col-md-3" style="font-weight:bold;  margin-bottom:20px; text-align:center; text-decoration:underline">Permanent Address Details</h4>
                        </div>
                       <div class="form-group">
                        <label class="control-label col-md-3">Same as Current </label>
                           <div class="col-md-9">
                        <input style="margin-top: 10px" tabindex="36"  type="checkbox" id="samecheck2" onclick="addresscheck()">
                           </div>
                           </div>
                       <div class="form-group" id="paddresslabel">
                            <label class="control-label col-md-3" > Address Line 1:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('permanentAddress'); ?></font></p>
                                <!--                                            	<textarea id="comment-message" required id="overseasHomeAddress" maxlength="1000" name="overseasHomeAddress" rows="8" tabindex="4">--><?php //echo set_value('overseasHomeAddress');?><!--</textarea>-->
                                <input tabindex="37"  type="text" class="form-control" required id="permanentAddress" name="permanentAddress" value="<?php echo $candidateInfo->permanentAddress?>">
                            </div>
                        </div>
                        <div class="form-group" id="paddresslabel2">
                            <label class="control-label col-md-3" >Address Line 2:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('permanentAddress2'); ?></font></p>
                                <input tabindex="38"  type="text" class="form-control"  id="permanentAddress2" name="permanentAddress2" value="<?php echo $candidateInfo->permanentAddress2?>">
                            </div>
                        </div>
                        <div class="form-group" id="paddresslabel3">
                            <label class="control-label col-md-3" >Address Line 3:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('permanentAddress3'); ?></font></p>
                                <input tabindex="39"  type="text" class="form-control"  id="permanentAddress3" name="permanentAddress3" value="<?php echo $candidateInfo->permanentAddress3?>">
                            </div>
                        </div>

                        <div class="form-group" id="paddresslabelCity">
                            <label class="control-label col-md-3" >City/Town:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('permanentAddressCity'); ?></font></p>
                                <input tabindex="40"  type="text" class="form-control" required id="permanentAddressCity" name="permanentAddressCity" value="<?php echo $candidateInfo->permanentAddressCity?>">
                            </div>
                        </div>
                        <div class="form-group" id="paddresslabelState">
                            <label class="control-label col-md-3" >County/State:</label>

                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('permanentAddressState'); ?></font></p>
                                <input tabindex="41"  type="text" class="form-control"  id="permanentAddressState" name="permanentAddressState" value="<?php echo $candidateInfo->permanentAddressState?>">
                            </div>
                        </div>

                        <div class="form-group" id="overseasAddressPo">
                            <label class="control-label col-md-3" >Post Code:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('overseasAddressPo'); ?></font></p>
                                <input tabindex="39"  type="text" class="form-control"  id="overseasAddressPo2" name="overseasAddressPo" value="<?php echo $candidateInfo->overseasAddressPo?>">
                            </div>
                        </div>


                        <div class="form-group" id="paddresslabelCountry">
                            <label class="control-label col-md-3" >Country:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('permanentAddressCountry'); ?></font></p>
                                <select tabindex="42"  style="width: 100%" id="permanentAddressCountry" required name="permanentAddressCountry">
                                    <option value=""  selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->permanentAddressCountry) && $candidateInfo->permanentAddressCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>





                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Contact Details</h2>

                        <div class="form-group">
                            <label class="control-label col-md-3">Title:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactTitle'); ?></font></p>
                                <select tabindex="43"  style="width: 100%" id="EmergencyContactTitle" required name="EmergencyContactTitle">

                                    <option value="" selected><?php echo SELECT_TITLE?></option>
                                    <?php for ($i=0;$i<count(Title);$i++){?>
                                        <option value="<?php echo Title[$i]?>"<?php if (!empty($candidateInfo->emergencyContactTitle) && $candidateInfo->emergencyContactTitle == Title[$i])  echo 'selected = "selected"'; ?>><?php echo Title[$i]?></option>

                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Name:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactName'); ?></font></p>
                                <input tabindex="44"  type="text" class="form-control" required id="EmergencyContactName" name="EmergencyContactName" value="<?php echo $candidateInfo->emergencyContactName ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Relation:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactRelation'); ?></font></p>
                                <input tabindex="45"  type="text" class="form-control" required id="EmergencyContactRelation" name="EmergencyContactRelation" value="<?php echo $candidateInfo->emergencyContactRelation ?>">
                            </div>
                        </div>
                        <h4 style="font-weight:bold;  margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Address Details</h4>
                        <div class="form-group">
                        <label class="control-label col-md-3">Same as Permanet </label>
                        <div class="col-md-9">
                        <input style="margin-top: 10px" tabindex="36"  type="checkbox" id="samecheck3" onclick="addresscheck2()">
                        </div>
                        </div>
                        <div class="form-group" id="eaddresslabel">
                            <label class="control-label col-md-3" id="eaddresslabel">Address Line 1:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress'); ?></font></p>
                                <input tabindex="46"  type="text" class="form-control" required id="emaddress" name="EmergencyContactAddress" value="<?php echo $candidateInfo->emergencyContactAddress ?>" >
                            </div>
                        </div>
                        <div class="form-group" id="eaddresslabel2">
                            <label class="control-label col-md-3" id="eaddresslabel2">Address Line 2:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress2'); ?></font></p>
                                <input tabindex="47"  type="text" class="form-control"  id="emaddress2" name="EmergencyContactAddress2" value="<?php echo $candidateInfo->emergencyContactAddress2 ?>" >
                            </div>
                        </div>
                        <div class="form-group" id="eaddresslabel3">
                            <label class="control-label col-md-3" id="eaddresslabel3">Address Line 3:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress3'); ?></font></p>
                                <input tabindex="48"  type="text" class="form-control"  id="emaddress3" name="EmergencyContactAddress3" value="<?php echo $candidateInfo->emergencyContactAddress3 ?>" >
                            </div>
                        </div>

                        <div class="form-group" id="ecitylabel">
                            <label class="control-label col-md-3" id="ecitylabel">City/Town:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactCity'); ?></font></p>
                                <input tabindex="49"  type="text" class="form-control" required id="emaddressCity" name="EmergencyContactCity" value="<?php echo $candidateInfo->emergencyContactAddressCity ?>" >
                            </div>
                        </div>
                        <div class="form-group" id="estatelabel">
                            <label class="control-label col-md-3" id="estatelabel">County/State:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactState'); ?></font></p>
                                <input tabindex="50"  type="text" class="form-control"  id="emaddressState" name="EmergencyContactState" value="<?php echo $candidateInfo->emergencyContactAddressState ?>" >
                            </div>
                        </div>

                        <div class="form-group" id="epostalcodelabel">
                            <label class="control-label col-md-3" id="epostalcodelabel">Post Code:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('emergencyContactAddressPo'); ?></font></p>
                                <input tabindex="48"  type="text" class="form-control"  id="emergencyContactAddressPo" name="emergencyContactAddressPo" value="<?php echo $candidateInfo->emergencyContactAddressPo ?>" >
                            </div>
                        </div>

                        <div class="form-group" id="ecountrylabel">
                            <label class="control-label col-md-3" id="ecountrylabel">Country :<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('emergencyContactCountry'); ?></font></p>
                                <select tabindex="51"  style="width: 100%" id="emaddressCountry" required name="emergencyContactCountry">
                                    <option value=""  selected>Select country...</option>
                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                        <option value="<?php echo COUNTRY[$i]?>"<?php if (!empty($candidateInfo->emergencyContactCountry) && $candidateInfo->emergencyContactCountry == COUNTRY[$i])  echo 'selected = "selected"'; ?>><?php echo COUNTRY[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Mobile/Telephone:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactMobile'); ?></font></p>
                                <input tabindex="52"  type="text"  class="form-control" required id="EmergencyContactMobile" name="EmergencyContactMobile" value="<?php echo $candidateInfo->emergencyContactMobile ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">E-mail:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('EmergencyContactEmail'); ?></font></p>
                                <input tabindex="53"  type="email" class="form-control" required id="EmergencyContactEmail" name="EmergencyContactEmail" value="<?php echo $candidateInfo->emergencyContactEmail ?>">
                            </div>
                        </div>

                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Course Details</h2>


                        <div class="form-group">
                            <label class="control-label col-md-3">Course Name:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('courseName'); ?></font></p>
                                <select tabindex="54"  style="width: 100%" onchange="courseAwardBody()" id="courseName" required name="courseName">
                                    <option value=""><?php echo SELECT_COURSE?></option>
                                    <?php foreach ($courseInfo as $course){?>
<!--                                        <option value="--><?php //echo $course->courseId?><!--" --><?php //echo set_select('courseName',$course->courseId, False); ?><!-->--><?php //echo $course->courseTitle?><!--</option>-->

                                        <option value="<?php echo $course->courseId ?>"<?php if (!empty($candidateInfo->courseName) && $candidateInfo->courseName == $course->courseId)  echo 'selected = "selected"'; ?>><?php echo $course->courseTitle ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Awarding Body:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('awardingBody'); ?></font></p>
                                <input tabindex="55"  type="text" readonly class="form-control" id="awardingBody" name="awardingBody" value="<?php echo $candidateInfo->awardingBody ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Course Level:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('courseLevel'); ?></font></p>
                                <input tabindex="56"  type="text" class="form-control" id="courseLevel" name="courseLevel" readonly value="<?php echo $candidateInfo->courseLevel ?>">
                            </div>
                        </div>

<!--                        <div class="form-group">-->
<!--                            <label class="control-label col-md-3">Course Start Date:</label>-->
<!--                            <div class="col-md-9">-->
<!--                                <p><font color="red"> --><?php //echo form_error('courseStartDate'); ?><!--</font></p>-->
<!--                                <input type="date" class="form-control" id="courseStartDate" name="courseStartDate" value="--><?php //echo $candidateInfo->courseStartDate ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="form-group">-->
<!--                            <label class="control-label col-md-3">Course End Date:</label>-->
<!--                            <div class="col-md-9">-->
<!--                                <p><font color="red"> --><?php //echo form_error('courseEndDate'); ?><!--</font></p>-->
<!--                                <input type="date" class="form-control" id="courseEndDate" name="courseEndDate" value="--><?php //echo $candidateInfo->courseEndDate ?><!--">-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="form-group">
                            <label class="control-label col-md-3">Course Session:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('courseSession'); ?></font></p>
                                <select tabindex="57"  style="width: 100%" id="courseSession" required name="courseSession">
                                    <option value=""  selected>Select Session...</option>
                                    <?php for ($i=0;$i<count(COURSESESSION);$i++){?>
                                        <option value="<?php echo COURSESESSION[$i]?>"<?php if (!empty($candidateInfo->courseSession) && $candidateInfo->courseSession == COURSESESSION[$i])  echo 'selected = "selected"'; ?>><?php echo COURSESESSION[$i]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Year:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('courseYear'); ?></font></p>
                                <input tabindex="58"  type="text" class="form-control" id="courseYear" name="courseYear" required value="<?php echo $candidateInfo->courseYear ?>">
                                <?php
                                $currently_selected = $candidateInfo->courseYear;
                                $earliest_year = date('Y');
                                $latest_year = date('Y')+6;
                                print '<select tabindex="58" name="courseYear" id="courseYear">';
                                print '<option value=""  selected>Select Year</option>';
                                foreach ( range($earliest_year,$latest_year) as $i ) {
                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                }
                                print '</select>';
                                ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Mode of study:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('methodeOfStudy'); ?></font></p>
                                <input tabindex="59"  type="radio" id="methodeOfStudy" required name="methodeOfStudy" value="FT"   <?php if($candidateInfo->methodOfStudy=='FT'){ echo "checked=checked";}?>> Full Time&nbsp;&nbsp;
                                <input tabindex="60"  type="radio" id="methodeOfStudy" required name="methodeOfStudy" value="PT"   <?php if($candidateInfo->methodOfStudy=='PT'){ echo "checked=checked";}?>> Part Time&nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Time of study:<span style="color: red" class="required">*</span></label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('timeOfStudy'); ?></font></p>
                                <input tabindex="61"  type="radio" id="timeOfStudy" required name="timeOfStudy" value="D"    <?php if($candidateInfo->timeOfStudy=='D'){ echo "checked=checked";}?>> Day&nbsp;&nbsp;
                                <input tabindex="62"  type="radio" id="timeOfStudy" required name="timeOfStudy" value="EW"  <?php if($candidateInfo->timeOfStudy=='EW'){ echo "checked=checked";}?>> Evenings & Weekend
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">ULN No.:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('ulnNo'); ?></font></p>
                                <input tabindex="63"  type="text" class="form-control" id="ulnNo" name="ulnNo" value="<?php echo $candidateInfo->ulnNo ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">UCAS Course Code:</label>
                            <div class="col-md-9">
                                <p><font color="red"> <?php echo form_error('ucasCourseCode'); ?></font></p>
                                <input tabindex="64"  type="text" class="form-control" id="ucasCourseCode" name="ucasCourseCode" value="<?php echo $candidateInfo->ucasCourseCode ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-9">
                                <!--                                            <a href="--><?php //echo base_url()?><!--OnlineForms/insertApplicationForm1"> <button type="button" class="btn ">Next</button></a>-->

<!--                                <button type="reset" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>-->
<!--                                <button type="reset" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>-->
<!--                                <button type="submit" class="btn btn-next">Save Application</button>-->
<!--                                <button type="submit" formaction="--><?php //echo base_url()?><!--ApplyOnline/editApplicationForm1AndNext" class="btn btn-next"> Next</button>-->
<!--                                <a href="--><?php //echo base_url()?><!--ApplyForm2" ><button type="button"  class="btn btn-next">Next</button></a>-->
                                <button type="reset" id="hide" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>
                                <button type="submit" formaction="<?php echo base_url()?>AllFormForStudents" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editApplicationForm1Save" class="btn btn-next" onclick="return ValidateEmail()"><span style="color: #FFFFFF;">Save for Later</span></button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editApplicationForm1AndNext" class="btn btn-next" onclick="return ValidateEmail()"><span style="color: #FFFFFF;">Next</span></button>
                            </div>
                        </div>
                    </div>
                    <!--			                    </fieldset>-->



                </form>


                <?php break;} ?>





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
<script type='text/javascript'
        src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
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
                    document.getElementById('courseLevel').value = "Course Level 5";


                }
            });
        }

    }
//
//    function checkphonenumber() {
//        // var x = document.getElementById('telephone');
//        var value = document.getElementById('EmergencyContactMobile').value;
//        if (value.length < 11) {
//            alert('not ok');
//            return false; // keep form from submitting
//        }
//
//    }
    function checkvalidation() {

        var mobile = document.getElementById('mobile').value;
        if (mobile.length < 11 || mobile.length> 20) {
            alert('Please Enter at least 11 digit Current Mobile number');
            return false; // keep form from submitting
        }
        var value = document.getElementById('EmergencyContactMobile').value;
        if (value.length < 11 || value.length> 20) {
            alert('Please Enter at least 11 digit Emergency Telephone/Mobile number');
            return false; // keep form from submitting
        }



        var startyear = $('#dobyear').val();
        var startmonth = parseInt(document.getElementById('dobmonth').value)+1;
        var startdat = parseInt(document.getElementById('dobdate').value)+1;
        var checktype = "dob";
//        var passporttype ="passportExpiryDate";

        //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);

        var today = new Date();
        today.setHours(0, 0, 0, 0);

        if (startdat-1 == today.getDate()-1 && startmonth-1 == today.getMonth() && startyear == today.getFullYear()){
            alert("DOB cann't be Today");
            return false;
        }



        if(validatedate(startdat, startmonth , startyear, checktype)=="false"){
            return false;
        }



        var startyearpp = $('#ppyear').val();
        var startmonthpp = parseInt(document.getElementById('ppmonth').value)+1;
        var startdatpp = parseInt(document.getElementById('ppdate').value)+1;
        var passporttype = "pp";
//        var passporttype ="passportExpiryDate";
        //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);



        //alert(dob);
        if(validatedate1(startdatpp, startmonthpp , startyearpp,passporttype)=="false"){
            return false;
        }



        var startyearuk = $('#ukyear').val();
        var startmonthuk = parseInt(document.getElementById('ukmonth').value)+1;
        var startdatuk = parseInt(document.getElementById('ukdate').value)+1;
        var uktype ="uk";

        //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);



        //alert(dob);
        if(validatedate2(startdatuk, startmonthuk , startyearuk,uktype)=="false"){
            return false;
        }



        var startyearvs = $('#visayear').val();
        var startmonthvs = parseInt(document.getElementById('visamonth').value)+1;
        var startdatvs = parseInt(document.getElementById('visadate').value)+1;
        var visatype="visa";

        //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);



        //alert(dob);
        if(validatedate3(startdatvs, startmonthvs , startyearvs,visatype)=="false"){
            return false;
        }

        var EmergencyContactEmail=document.getElementById("EmergencyContactEmail").value;
        var mailformat1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(EmergencyContactEmail.match(mailformat1))
        {
            return true;
        }
        else{
            alert("Emergency Email Address is in invalid format!");
            return false;
        }
//        var emtype="EmergencyContactEmail";
//        if(validatedate4(emtype)=="true"){
//            return true;
//        }

//        var email=document.getElementById("email").value;
//        var emailtype="email";
//        if(validatedate5(emailtype)=="true"){
//            return true;
//        }
//        var mailformat1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//
//        if(EmergencyContactEmail.match(mailformat1))
//        {
//            return true;
//        }
//        else{
//            alert("Emergency Email Address is in invalid format!");
//            return false;
//        }







    }

    function ValidateEmail(){
        var email=document.getElementById("email").value;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

        if(email.match(mailformat))
        {
            return true;
        }
        else{
            alert("Current Email Address is in invalid format!");
            return false;
        }
    }

</script>
<script type="text/javascript">
    function addresscheck() {
        if (document.getElementById('samecheck2').checked) {
            document.getElementById('permanentAddress').value = document.getElementById('currentAddress').value;
            document.getElementById('permanentAddress2').value = document.getElementById('currentAddress2').value;
            document.getElementById('permanentAddress3').value = document.getElementById('currentAddress3').value;
            document.getElementById('overseasAddressPo2').value = document.getElementById('currentAddressPo2').value;
            document.getElementById('permanentAddressCity').value = document.getElementById('currentAddressCity').value;
            document.getElementById('permanentAddressState').value = document.getElementById('currentAddressState').value;
            document.getElementById('permanentAddressCountry').value = document.getElementById('currentAddressCountry').value;


            document.getElementById('permanentAddress').style.display = "none";
            document.getElementById('permanentAddress2').style.display = "none";
            document.getElementById('permanentAddress3').style.display = "none";
            document.getElementById('overseasAddressPo').style.display = "none";
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
            document.getElementById('overseasAddressPo').style.display = "block";
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
            document.getElementById('emergencyContactAddressPo').value = document.getElementById('overseasAddressPo').value;
            document.getElementById('emaddressCity').value = document.getElementById('permanentAddressCity').value;
            document.getElementById('emaddressState').value = document.getElementById('permanentAddressState').value;
            document.getElementById('emaddressCountry').value = document.getElementById('permanentAddressCountry').value;

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


    function validatedate(dd , mm , yy, checktype)
    {
            var dd = parseInt(dd);
            var mm  = parseInt(mm);
            var yy = parseInt(yy);

            // Create list of days of a month [assume there is no leap year by default]
            var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
            if (mm==1 || mm>2)
            {
                if (dd>ListofDays[mm-1])
                {
                    if (checktype == "dob") {
                        alert(' Date of Birth is in invalid date format!');
                        return "false";
                    }

                }
            }
            if (mm==2)
            {
                var lyear = false;
                if ( (!(yy % 4) && yy % 100) || !(yy % 400))
                {
                    lyear = true;
                }
                if ((lyear==false) && (dd>=29))
                {
                    if (checktype == "dob") {
                        alert(' Date of Birth is in invalid date format!');
                        return "false";
                    }


                }
                if ((lyear==true) && (dd>29))
                {
                    if (checktype == "dob") {
                        alert(' Date of Birth is in invalid date format!');
                        return "false";
                    }

                }
            }
        }

    function validatedate1(dd , mm , yy, passporttype)
    {
        var dd = parseInt(dd);
        var mm  = parseInt(mm);
        var yy = parseInt(yy);

        // Create list of days of a month [assume there is no leap year by default]
        var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
        if (mm==1 || mm>2)
        {
            if (dd>ListofDays[mm-1])
            {
                if (passporttype == "pp") {
                    alert('Passport/ID Expiry Date is in invalid date format!');
                    return "false";
                }

            }
        }
        if (mm==2)
        {
            var lyear = false;
            if ( (!(yy % 4) && yy % 100) || !(yy % 400))
            {
                lyear = true;
            }
            if ((lyear==false) && (dd>=29))
            {
                if (passporttype == "pp") {
                    alert(' Passport/ID Expiry Date is in invalid date format!');
                    return "false";
                }


            }
            if ((lyear==true) && (dd>29))
            {
                if (passporttype == "pp") {
                    alert(' Passport/ID Expiry Date is in invalid date format!');
                    return "false";
                }

            }
        }
    }


    function validatedate2(dd , mm , yy, uktype)
    {
        var dd = parseInt(dd);
        var mm  = parseInt(mm);
        var yy = parseInt(yy);

        // Create list of days of a month [assume there is no leap year by default]
        var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
        if (mm==1 || mm>2)
        {
            if (dd>ListofDays[mm-1])
            {
                if (uktype == "uk") {
                    alert('UK Entry Date is in invalid date format!');
                    return "false";
                }

            }
        }
        if (mm==2)
        {
            var lyear = false;
            if ( (!(yy % 4) && yy % 100) || !(yy % 400))
            {
                lyear = true;
            }
            if ((lyear==false) && (dd>=29))
            {
                if (uktype == "uk") {
                    alert('UK Entry Date is in invalid date format!');
                    return "false";
                }


            }
            if ((lyear==true) && (dd>29))
            {
                if (uktype == "uk") {
                    alert('UK Entry Date is in invalid date format!');
                    return "false";
                }

            }
        }
    }

    function validatedate3(dd , mm , yy, visatype)
    {
        var dd = parseInt(dd);
        var mm  = parseInt(mm);
        var yy = parseInt(yy);

        // Create list of days of a month [assume there is no leap year by default]
        var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
        if (mm==1 || mm>2)
        {
            if (dd>ListofDays[mm-1])
            {
                if (visatype == "visa") {
                    alert('Visa Expiry Date is in invalid date format!');
                    return "false";
                }

            }
        }
        if (mm==2)
        {
            var lyear = false;
            if ( (!(yy % 4) && yy % 100) || !(yy % 400))
            {
                lyear = true;
            }
            if ((lyear==false) && (dd>=29))
            {
                if (visatype == "visa") {
                    alert('Visa Expiry Date is in invalid date format!');
                    return "false";
                }


            }
            if ((lyear==true) && (dd>29))
            {
                if (visatype == "visa") {
                    alert('Visa Expiry Date is in invalid date format!');
                    return "false";
                }

            }
        }
    }

//    function validatedate4(emtype){
//        var mailformat1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//
////        if(!emtype.match(mailformat1))
////        {
////            alert("Emergency Email Address is in invalid format!");
////            return false;
////        }
//        if(emtype.match(mailformat1))
//        {
//            return true;
//        }
//        else{
//            alert("Emergency Email Address is in invalid format!");
//            return false;
//        }
//
//    }

//    function validatedate5(emailtype){
//        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//
////        if(!emailtype.match(mailformat))
////        {
////            alert("Current Email Address is in invalid format!");
////            return false;
////        }
//
//        if(emailtype.match(mailformat))
//        {
//            return true;
//        }
//        else{
//            alert("Current Email Address is in invalid format!");
//            return false;
//        }
//
//
//    }


</script>

<!--<script>-->
<!--    function hideElement() {-->
<!--        var firstName=document.querySelector("firstName").value;-->
<!--//        element = document.querySelector('.container');-->
<!--        firstName.style.visibility = 'hidden';-->
<!--    }-->
<!--</script>-->

<script>
    $(document).ready(function(){
        $("#hide").click(function(){

            $("#firstName").removeAttr('value');
            $("#surName").removeAttr('value');
            $("#placeOfBirth").removeAttr('value');
            $("#passportNo").removeAttr('value');
            $("#currentAddress").removeAttr('value');
            $("#currentAddress2").removeAttr('value');
            $("#currentAddress3").removeAttr('value');
            $("#currentAddressCity").removeAttr('value');
            $("#currentAddressState").removeAttr('value');
            $("#currentAddressPo2").removeAttr('value');
            $("#telephone").removeAttr('value');
            $("#mobile").removeAttr('value');
            $("#email").removeAttr('value');
            $("#permanentAddress").removeAttr('value');
            $("#permanentAddress2").removeAttr('value');
            $("#permanentAddress3").removeAttr('value');
            $("#permanentAddressCity").removeAttr('value');
            $("#permanentAddressState").removeAttr('value');
            $("#overseasAddressPo2").removeAttr('value');
            $("#EmergencyContactName").removeAttr('value');
            $("#EmergencyContactRelation").removeAttr('value');
            $("#emaddress").removeAttr('value');
            $("#emaddress2").removeAttr('value');
            $("#emaddress3").removeAttr('value');
            $("#emaddressCity").removeAttr('value');
            $("#emaddressState").removeAttr('value');
            $("#emergencyContactAddressPo").removeAttr('value');
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
            $("#emaddressCountry").children().removeAttr("selected");
            $("#courseName").children().removeAttr("selected");
            $("#courseSession").children().removeAttr("selected");
            $("#gender").removeAttr("checked");
            $("#genderChange").removeAttr("checked");
            $("#methodeOfStudy").removeAttr("checked");
            $("#timeOfStudy").removeAttr("checked");
            $("#dobdate").children().removeAttr("selected");
            $("#dobmonth").children().removeAttr("selected");
            $("#dobyear").children().removeAttr("selected");
            $("#ppdate").children().removeAttr("selected");
            $("#ppmonth").children().removeAttr("selected");
            $("#ppyear").children().removeAttr("selected");
            $("#ukdate").children().removeAttr("selected");
            $("#ukmonth").children().removeAttr("selected");
            $("#ukyear").children().removeAttr("selected");
            $("#visadate").children().removeAttr("selected");
            $("#visamonth").children().removeAttr("selected");
            $("#visayear").children().removeAttr("selected");

        });
    });
</script>



