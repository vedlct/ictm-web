		
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

        <section class="flat-row padding-small-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
	
                        	<form role="form" action="<?php echo base_url()?>ApplyOnline/insertApplicationForm1" method="post"  onsubmit=" return checkvalidation()" class="form-horizontal">
                        		
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
                                            	<select tabindex="1" style="width: 100%" name="title" required id="title">

                                                    <option value="" selected><?php echo "Select Title"?></option>
                                                    <?php for ($i=0;$i<count(Title);$i++){?>
                                                        <option <?php echo set_select('title',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                                    <?php } ?>

                                                    </select> 
                                          	</div>
				                        </div>
                                        
				                    	<div class="form-group">
                                        	<label class="control-label col-md-3">First Name:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('firstName'); ?></font></p>
                                            	<input tabindex="2" type="text" class="form-control" required id="firstName" name="firstName" value="<?php echo set_value('firstName'); ?>">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Surname:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('surName'); ?></font></p>
                                            	<input tabindex="3" type="text" class="form-control" required id="surName" name="surName" value="<?php echo set_value('surName'); ?>">
                                          	</div>
				                        </div>
                                        
<!--                                        <div class="form-group">-->
<!--                                        	<label class="control-label col-md-3">Other Names:</label>-->
<!--                                          	<div class="col-md-9">-->
<!--                                                <p><font color="red"> --><?php //echo form_error('otherName'); ?><!--</font></p>-->
<!--                                            	<input type="text" class="form-control" id="otherName" name="otherName" value="--><?php //echo set_value('otherName'); ?><!--">-->
<!--                                          	</div>-->
<!--				                        </div>-->
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Date of Birth:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('dob'); ?></font></p>
<!--                                            	<input type="text" class="form-control datetimepicker" required id="dob" name="dob" value="--><?php //echo set_value('dob'); ?><!--">-->


                                                Year:
                                                <?php
                                                $currently_selected = date('');
                                                $earliest_year = 1950;
                                                $latest_year = date('Y');
                                                print '<select tabindex="4" name="dobyear" id="dobyear" required>';
                                                print ' <option value=""  selected>Select Year</option>';
                                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                                }
                                                print '</select>';
                                                ?>
                                                &nbsp;&nbsp;&nbsp;
                                                Month:
                                                <select tabindex="5" name="dobmonth" id="dobmonth">
                                                    <option value=""  selected><?php echo "Select Month"?></option>
                                                    <?php
                                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                        echo "<option value='$monthNumber'>{$month}</option>";
                                                    }
                                                    ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;
                                                Date:
                                                <select tabindex="6" name="dobdate" id="dobdate">
                                                    <option value=""  selected><?php echo "Select Date"?></option>
                                                    <?php
                                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                                        echo "<option value='$dateNumber'>{$date}</option>";
                                                    }
                                                    ?>
                                                </select>


                                            </div>
				                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Place of Birth:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('placeOfBirth'); ?></font></p>
                                                <input tabindex="6" type="text" class="form-control" required id="placeOfBirth" maxlength="100" name="placeOfBirth" value="<?php echo set_value('placeOfBirth'); ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Sex:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                            	<input tabindex="7" type="radio" required id="gender" name="gender"<?php
                                                echo set_value('gender') == 'M' ? "checked" : "";
                                                ?> value="M"> Male&nbsp;&nbsp;
                                                <input tabindex="8" type="radio" required id="gender" name="gender" <?php
                                                echo set_value('gender') == 'F' ? "checked" : "";
                                                ?> value="F"> Female&nbsp;&nbsp;
                                                <input tabindex="9" type="radio" required id="gender" name="gender" <?php
                                                echo set_value('gender') == 'O' ? "checked" : "";
                                                ?> value="O"> Other
                                                <input tabindex="10" type="radio" required id="gender" name="gender" <?php
                                                echo set_value('gender') == 'PNTS' ? "checked" : "";
                                                ?> value="PNTS"> Pefer Not to Say
                                          	</div>
				                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Any Gender changed:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('genderChange'); ?></font></p>
                                                <input tabindex="11" type="radio" required id="genderChange" name="genderChange"<?php
                                                echo set_value('genderChange') == 'Y' ? "checked" : "";
                                                ?> value="Y"> Yes&nbsp;&nbsp;
                                                <input tabindex="12" type="radio" required id="genderChange" name="genderChange" <?php
                                                echo set_value('genderChange') == 'N' ? "checked" : "";
                                                ?> value="N"> No&nbsp;&nbsp;
                                                <input tabindex="13" type="radio" required id="genderChange" name="genderChange" <?php
                                                echo set_value('genderChange') == 'PNTS' ? "checked" : "";
                                                ?> value="PNTS"> Pefer Not to Say
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Nationality:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('nationality'); ?></font></p>
                                                <select tabindex="15" style="width: 100%" id="nationality" required name="nationality">
                                                    <option value="" disabled selected>Select Nationality...</option>
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
                                        	<label class="control-label col-md-3">Passport / ID No.:</label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('passportNo'); ?></font></p>
                                            	<input tabindex="16" type="text" class="form-control"  id="passportNo" name="passportNo" value="<?php echo set_value('passportNo'); ?>">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Passport / ID Expiry Date:</label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('passportExpiryDate'); ?></font></p>
<!--                                            	<input type="text" class="form-control datetimepicker" required id="passportExpiryDate" name="passportExpiryDate" value="--><?php //echo set_value('passportExpiryDate'); ?><!--" >-->


                                                Year:
                                                <?php
                                                $currently_selected = date('');
												$current_year = date('Y');
//                                                $earliest_year = 1950;
                                                $latest_year = date('Y')+10;
                                                print '<select tabindex="17" name="ppyear" id="ppyear">';
                                                print ' <option value=""  selected>Select Year</option>';
                                                foreach ( range($current_year,$latest_year) as $i ) {
                                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                                }
                                                print '</select>';
                                                ?>
                                                &nbsp;&nbsp;&nbsp;
                                                Month:
                                                <select tabindex="18" tab name="ppmonth" id="ppmonth">
                                                    <option value=""  selected><?php echo "Select Month"?></option>
                                                    <?php
                                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                        echo "<option value='$monthNumber'>{$month}</option>";
                                                    }
                                                    ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;
                                                Date:
                                                <select tabindex="19" name="ppdate" id="ppdate">
                                                    <option value=""  selected><?php echo "Select Date"?></option>
                                                    <?php
                                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                                        echo "<option value='$dateNumber'>{$date}</option>";
                                                    }
                                                    ?>
                                                </select>



                                            </div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">UK Entry Date: </label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('UkEntryDate'); ?></font></p>
<!--                                            	<input type="text" class="form-control datetimepicker"  id="UkEntryDate" name="UkEntryDate" value="--><?php //echo set_value('UkEntryDate'); ?><!--">-->
                                                Year:
                                                <?php
                                                $currently_selected = date('');
                                                $earliest_year = 1950;
                                                $latest_year = date('Y');
                                                print '<select tabindex="20" name="ukyear" id="ukyear">';
                                                print ' <option value=""  selected>Select Year</option>';
                                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                                }
                                                print '</select>';
                                                ?>
                                                &nbsp;&nbsp;&nbsp;
                                                Month:
                                                <select tabindex="21" name="ukmonth" id="ukmonth">
                                                    <option value=""  selected><?php echo "Select Month"?></option>
                                                    <?php
                                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                        echo "<option value='$monthNumber'>{$month}</option>";
                                                    }
                                                    ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;
                                                Date:
                                                <select tabindex="22" name="ukdate" id="ukdate">
                                                    <option value=""  selected><?php echo "Select Date"?></option>
                                                    <?php
                                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                                        echo "<option value='$dateNumber'>{$date}</option>";
                                                    }
                                                    ?>
                                                </select>



                                            </div>
				                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Visa Type:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('VisaType'); ?></font></p>
                                                <select tabindex="23" style="width: 100%" id="VisaType"  name="VisaType">

                                                    <option value="" selected><?php echo "Select Visa Type"?></option>
                                                    <?php for ($i=0;$i<count(VISA_TYPE);$i++){?>
                                                        <option <?php echo set_select('VisaType',  VISA_TYPE[$i], False); ?>><?php echo VISA_TYPE[$i]?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Visa Expiry Date:</label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('visaExpiryDate'); ?></font></p>
<!--                                            	<input type="text" class="form-control datetimepicker"  id="visaExpiryDate" name="visaExpiryDate" value="--><?php //echo set_value('visaExpiryDate'); ?><!--">-->

                                                Year:
                                                <?php
                                                $currently_selected = date('');
                                                $earliest_year = 1950;
                                                $latest_year = date('Y')+6;
                                                print '<select tabindex="24" name="visayear" id="visayear">';
                                                print ' <option value=""  selected>Select Year</option>';
                                                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                    print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                                }
                                                print '</select>';
                                                ?>
                                                &nbsp;&nbsp;&nbsp;
                                                Month:
                                                <select tabindex="25" name="visamonth" id="visamonth">
                                                    <option value=""  selected><?php echo "Select Month"?></option>
                                                    <?php
                                                    foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                        echo "<option value='$monthNumber'>{$month}</option>";
                                                    }
                                                    ?>
                                                </select>
                                                &nbsp;&nbsp;&nbsp;
                                                Date:
                                                <select tabindex="26" name="visadate" id="visadate">
                                                    <option value=""  selected><?php echo "Select Date"?></option>
                                                    <?php
                                                    foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                                        echo "<option value='$dateNumber'>{$date}</option>";
                                                    }
                                                    ?>
                                                </select>


                                            </div>
				                        </div>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>
                                        <div class="form-group">
                                        <h2 class="control-label col-md-3" style="font-weight:bold;  margin-bottom:20px; text-align:center; text-decoration:underline">Current Address Details</h2>
                                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Address Line 1:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddress'); ?></font></p>
                                            	<input tabindex="27" type="text" class="form-control" required id="currentAddress" name="currentAddress" value="<?php echo set_value('currentAddress'); ?>">
                                            </div>
				                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address Line 2:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddress2'); ?></font></p>
                                                <input tabindex="28" type="text" class="form-control"  id="currentAddress2" name="currentAddress2" value="<?php echo set_value('currentAddress2'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address Line 3:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddress3'); ?></font></p>
                                                <input tabindex="29" type="text" class="form-control"  id="currentAddress3" name="currentAddress3" value="<?php echo set_value('currentAddress3'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">City/Town:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddressCity'); ?></font></p>
                                                <input tabindex="30" type="text" class="form-control" required id="currentAddressCity" name="currentAddressCity" value="<?php echo set_value('currentAddressCity'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">County/State:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddressState'); ?></font></p>
                                                <input tabindex="31" type="text" class="form-control"  id="currentAddressState" name="currentAddressState" value="<?php echo set_value('currentAddressState'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Post Code:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddressPo'); ?></font></p>
                                                <input tabindex="29" type="text" class="form-control"  id="currentAddressPo" name="currentAddressPo" value="<?php echo set_value('currentAddressPo'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Country:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('currentAddressCountry'); ?></font></p>

                                                <select tabindex="32" style="width: 100%" id="currentAddressCountry" required name="currentAddressCountry">
                                                    <option value="" disabled selected>Select country...</option>
                                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                        <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                                        <option value="<?php echo COUNTRY[$i]?>"<?php
                                                        echo set_value('currentAddressCountry') == COUNTRY[$i] ? "selected" : "";
                                                        ?>><?php echo COUNTRY[$i]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
				                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Telephone:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>
                                                <input tabindex="33" type="text" class="form-control" minlength="11"  maxlength="20" length="11"  id="telephone" name="telephone" value="<?php echo set_value('telephone'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Mobile:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>
                                                <input tabindex="34" type="text" class="form-control" required id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">E-mail:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                                <input tabindex="35" type="email" class="form-control" required id="email" name="email"  value="<?php echo set_value('email'); ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <h2 class="control-label col-md-3" style="font-weight:bold;  margin-bottom:20px; text-align:center; text-decoration:underline">Permanent  Address Details</h2>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Same as Current </label>
                                            <div class="col-md-9">
                                                <input style="margin-top: 10px" tabindex="36"  type="checkbox" id="samecheck2" onclick="addresscheck()">
                                            </div>
                                        </div>
                                        <!-- This is overseas Address ,We consider this permanent address -->
                                        <div class="form-group" id="paddresslabel">
                                            <label class="control-label col-md-3">Address Line 1:<span style="color: red" class="required">*</span></label>

                                             <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('permanentAddress'); ?></font></p>
                                                <!--                                            	<textarea id="comment-message" required id="overseasHomeAddress" maxlength="1000" name="overseasHomeAddress" rows="8" tabindex="4">--><?php //echo set_value('overseasHomeAddress');?><!--</textarea>-->
                                                <input tabindex="37" type="text" class="form-control" required id="permanentAddress" name="permanentAddress" value="<?php echo set_value('permanentAddress'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group" id="paddresslabel2">
                                            <label class="control-label col-md-3">Address Line 2:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('permanentAddress2'); ?></font></p>
                                                <input tabindex="38" type="text" class="form-control"  id="permanentAddress2" name="permanentAddress2" value="<?php echo set_value('permanentAddress2'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group" id="paddresslabel3">
                                            <label class="control-label col-md-3">Address Line 3:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('permanentAddress3'); ?></font></p>
                                                <input tabindex="39" type="text" class="form-control"  id="permanentAddress3" name="permanentAddress3" value="<?php echo set_value('permanentAddress3'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group" id="paddresslabelCity">
                                            <label class="control-label col-md-3">City/Town:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('permanentAddressCity'); ?></font></p>
                                                <input tabindex="40" type="text" class="form-control" required id="permanentAddressCity" name="permanentAddressCity" value="<?php echo set_value('permanentAddressCity'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group" id="paddresslabelState">
                                            <label class="control-label col-md-3">County/State:</label>

                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('permanentAddressState'); ?></font></p>
                                                <input tabindex="41" type="text" class="form-control"  id="permanentAddressState" name="permanentAddressState" value="<?php echo set_value('permanentAddressState'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group" id="ppostalcodelabel">
                                            <label class="control-label col-md-3">Post Code:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('overseasAddressPo'); ?></font></p>
                                                <input tabindex="39" type="text" class="form-control"  id="overseasAddressPo" name="overseasAddressPo" value="<?php echo set_value('overseasAddressPo'); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group" id="paddresslabelCountry">
                                            <label class="control-label col-md-3">Country:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('permanentAddressCountry'); ?></font></p>

                                                <select tabindex="42" style="width: 100%" id="permanentAddressCountry" required name="permanentAddressCountry">
                                                    <option value="" disabled selected>Select country...</option>
                                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                        <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                                        <option value="<?php echo COUNTRY[$i]?>"<?php
                                                        echo set_value('permanentAddressCountry') == COUNTRY[$i] ? "selected" : "";
                                                        ?>><?php echo COUNTRY[$i]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Contact Details</h2>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Title:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactTitle'); ?></font></p>
                                            	<select tabindex="43" style="width: 100%" id="EmergencyContactTitle" required name="EmergencyContactTitle">

                                                    <option value="" selected><?php echo SELECT_TITLE?></option>
                                                    <?php for ($i=0;$i<count(Title);$i++){?>
                                                        <option <?php echo set_select('EmergencyContactTitle',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                                    <?php } ?>

                                                    </select> 
                                          	</div>
				                        </div>
                                        
				                    	<div class="form-group">
                                        	<label class="control-label col-md-3">Name:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactName'); ?></font></p>
                                            	<input tabindex="44" type="text" class="form-control" required id="EmergencyContactName" name="EmergencyContactName" value="<?php echo set_value('EmergencyContactName'); ?>">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Relation:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactRelation'); ?></font></p>
                                            	<input tabindex="45" type="text" class="form-control" required id="EmergencyContactRelation" value="<?php echo set_value('EmergencyContactRelation'); ?>" name="EmergencyContactRelation">
                                          	</div>
				                        </div>
                                        <h2 style="font-weight:bold; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Address Details</h2>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Same as Permanet </label>
                                            <div class="col-md-9">
                                                <input style="margin-top: 10px" tabindex="36"  type="checkbox" id="samecheck3" onclick="addresscheck2()">
                                            </div>
                                        </div>
                                        <div class="form-group" id="eaddresslabel">
                                           <label class="control-label col-md-3">Address Line 1:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress'); ?></font></p>
                                                <input tabindex="46" type="text" class="form-control" required id="emaddress" value="<?php echo set_value('EmergencyContactAddress'); ?>" name="EmergencyContactAddress">
                                          	</div>
				                        </div>
                                        <div class="form-group" id="eaddresslabel2">
                                            <label class="control-label col-md-3">Address Line 2:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress2'); ?></font></p>
                                                <input tabindex="47" type="text" class="form-control"  id="emaddress2" value="<?php echo set_value('EmergencyContactAddress2'); ?>" name="EmergencyContactAddress2">
                                            </div>
                                        </div>
                                        <div class="form-group" id="eaddresslabel3">
                                            <label class="control-label col-md-3">Address Line 3:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactAddress3'); ?></font></p>
                                                <input tabindex="48" type="text" class="form-control"  id="emaddress3" value="<?php echo set_value('EmergencyContactAddress3'); ?>" name="EmergencyContactAddress3">
                                            </div>
                                        </div>
                                        <div class="form-group" id="ecitylabel">
                                            <label class="control-label col-md-3">City/Town:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactCity'); ?></font></p>
                                                <input tabindex="49" type="text" class="form-control" required id="emaddressCity" value="<?php echo set_value('EmergencyContactCity'); ?>" name="EmergencyContactCity">
                                            </div>
                                        </div>
                                        <div class="form-group" id="estatelabel">
                                            <label class="control-label col-md-3">County/State:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactState'); ?></font></p>
                                                <input tabindex="50" type="text" class="form-control"  id="emaddressState" value="<?php echo set_value('EmergencyContactState'); ?>" name="EmergencyContactState">
                                            </div>
                                        </div>

                                        <div class="form-group" id="epostalcodelabel">
                                            <label class="control-label col-md-3">Post Code:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('emergencyContactAddressPo'); ?></font></p>
                                                <input tabindex="48" type="text" class="form-control"  id="emergencyContactAddressPo" value="<?php echo set_value('emergencyContactAddressPo'); ?>" name="emergencyContactAddressPo">
                                            </div>
                                        </div>

                                        <div class="form-group" id="ecountrylabel">
                                            <label class="control-label col-md-3">Country :<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('emergencyContactCountry'); ?></font></p>

                                                <select tabindex="51" style="width: 100%" id="emaddressCountry" required name="emergencyContactCountry">
                                                    <option value="" disabled selected>Select country...</option>
                                                    <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                        <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                                        <option value="<?php echo COUNTRY[$i]?>"<?php
                                                        echo set_value('emergencyContactCountry') == COUNTRY[$i] ? "selected" : "";
                                                        ?>><?php echo COUNTRY[$i]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Mobile/Telephone:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactMobile'); ?></font></p>
                                            	<input tabindex="52" type="text" minlength="11"  maxlength="20" class="form-control" required id="EmergencyContactMobile" name="EmergencyContactMobile" value="<?php echo set_value('EmergencyContactMobile'); ?>">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">E-mail:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('EmergencyContactEmail'); ?></font></p>
                                            	<input tabindex="53" type="email" class="form-control" required id="EmergencyContactEmail" name="EmergencyContactEmail" value="<?php echo set_value('EmergencyContactEmail'); ?>">
                                          	</div>
				                        </div>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Course Details</h2>

                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Course Name:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('courseName'); ?></font></p>
                                                <select tabindex="54" style="width: 100%" onchange="courseAwardBody()" id="courseName" required name="courseName">
                                                <option value=""><?php echo SELECT_COURSE?></option>
                                                <?php foreach ($courseInfo as $course){?>
                                                <option value="<?php echo $course->courseId?>" <?php echo set_select('courseName',$course->courseId, False); ?>><?php echo $course->courseTitle?></option>
                                                    <?php } ?>
                                                </select>
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Awarding Body:</label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('awardingBody'); ?></font></p>
                                            	<input tabindex="55" type="text" readonly class="form-control" id="awardingBody" value="<?php echo set_value('awardingBody'); ?>" name="awardingBody">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Course Level:</label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('courseLevel'); ?></font></p>
                                            	<input tabindex="56" type="text" class="form-control" id="courseLevel" name="courseLevel" readonly value="<?php echo set_value('courseLevel'); ?>">
                                          	</div>
				                        </div>



                                        <div class="form-group">
                                            <label class="control-label col-md-3">Course Session:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('courseSession'); ?></font></p>
                                                <select tabindex="57" style="width: 100%" id="courseSession" required name="courseSession">
                                                    <option value="" disabled selected>Select Session...</option>
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
<!--                                                <input tabindex="58" type="text" class="form-control" id="courseYear" name="courseYear" value="--><?php //echo set_value('courseYear'); ?><!--">-->
                                                <?php
                                                $currently_selected = date('');
                                                $earliest_year = date('Y');
                                                $latest_year = date('Y')+6;
                                                print '<select tabindex="58" name="courseYear" id="courseYear">';
                                                print '<option value=""  selected>Select Year</option>';
                                                foreach ( range( $earliest_year,$latest_year ) as $i ) {
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
                                            	<input tabindex="59" type="radio" required name="methodeOfStudy" <?php
                                                echo set_value('methodeOfStudy') == 'FT' ? "checked" : "";
                                                ?> value="FT"> Full Time&nbsp;&nbsp;
                                                <input tabindex="60" type="radio" required name="methodeOfStudy" <?php
                                                echo set_value('methodeOfStudy') == 'PT' ? "checked" : "";
                                                ?> value="PT"> Part Time&nbsp;&nbsp;

                                          	</div>
				                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-3">Time of study:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('timeOfStudy'); ?></font></p>

                                                <input tabindex="61" type="radio" required name="timeOfStudy" <?php
                                                echo set_value('timeOfStudy') == 'D' ? "checked" : "";
                                                ?> value="D"> Day&nbsp;&nbsp;
                                                <input tabindex="62" type="radio" required name="timeOfStudy" <?php
                                                echo set_value('timeOfStudy') == 'EW' ? "checked" : "";
                                                ?> value="EW"> Evenings & Weekend
                                          	</div>
				                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ULN No.:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('ulnNo'); ?></font></p>
                                                <input tabindex="63" type="text" class="form-control" id="ulnNo" name="ulnNo" value="<?php echo set_value('ulnNo'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">UCAS Course Code:</label>
                                            <div class="col-md-9">
                                                <p><font color="red"> <?php echo form_error('ucasCourseCode'); ?></font></p>
                                                <input tabindex="64" type="text" class="form-control" id="ucasCourseCode" name="ucasCourseCode" value="<?php echo set_value('ucasCourseCode'); ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">        
                                          <div class="col-sm-offset-2 col-md-9">
<!--                                            <a href="--><?php //echo base_url()?><!--OnlineForms/insertApplicationForm1"> <button type="button" class="btn ">Next</button></a>-->
                                              <button type="reset" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>
                                              <button type="submit" formaction="<?php echo base_url()?>AllFormForStudents" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                                              <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm1Save" class="btn btn-next" onclick="return ValidateEmail()"><span style="color: #FFFFFF;">Save for Later</span></button>
                                              <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm1AndNext" class="btn btn-next" onclick="return ValidateEmail()"><span style="color: #FFFFFF;">Next</span></button>
<!--                                              <a href="--><?php //echo base_url()?><!--ApplyForm2" ><button type="button"  class="btn btn-next">Next</button></a>-->
                                          </div>
                                        </div>
				                    </div>
<!--			                    </fieldset>-->

		                    </form>



               
        
            
   

                        
    
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
                if (courseId == ""){
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





        </script>


        <script>
            function checkphonenumber() {
               // var x = document.getElementById('telephone');
                var value = document.getElementById('telephone').value;
                if (value.length > 11) {
                    return false; // keep form from submitting
                }
            }

            function checkvalidation() {

                var mobile = document.getElementById('mobile').value;
                if (mobile.length < 11 || mobile.length> 20) {
                    alert('Please Enter at least 11 digit Current Mobile number');
                    return false; // keep form from submitting
                }

                var value = document.getElementById('EmergencyContactMobile').value;
                if (value.length < 11 || value.length > 20) {
                    alert('Please Enter at least 11 digit Emergency Telephone/Mobile number');
                    return false; // keep form from submitting
                }

                // if (document.getElementById('courseYear').value > 2019) {
                //     alert("year cant be future")
                //     return false;
                // } else
                //     return true;
				//
				//
                // var startyear = $('#dobyear').val();
                // var startmonth = $('#dobmonth').val();
                // var startdat = $('#dobdate').val();
				//
                // var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);
                // var today = new Date();
                // today.setHours(0, 0, 0, 0)
                // if (stratdate == today){
                //     alert("DOB cann't be Today")
                // }
                //



                var startyear = $('#dobyear').val();
                var startmonth = parseInt(document.getElementById('dobmonth').value)+1;
                var startdat = parseInt(document.getElementById('dobdate').value)+1;
                var checktype = "dob";
                //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);

                var today = new Date();
                today.setHours(0, 0, 0, 0);

                if (startdat-1 == today.getDate()-1 && startmonth-1 == today.getMonth() && startyear == today.getFullYear()){
                    alert("DOB cann't be Today");
                    return false;
                }


                //alert(dob);
                if(validatedate(startdat, startmonth , startyear, checktype)=="false"){
                    return false;
                }



                var startyearpp = $('#ppyear').val();
                var startmonthpp = parseInt(document.getElementById('ppmonth').value)+1;
                var startdatpp = parseInt(document.getElementById('ppdate').value)+1;
                var passporttype ="passportExpiryDate";
                //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);



                //alert(dob);
                if(validatedate1(startdatpp, startmonthpp , startyearpp,passporttype)=="false"){
                    return false;
                }



                var startyearvs = $('#visayear').val();
                var startmonthvs = parseInt(document.getElementById('visamonth').value)+1;
                var startdatvs = parseInt(document.getElementById('visadate').value)+1;
                var visatype="visaExpiryDate";

                //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);



                //alert(dob);
                if(validatedate3(startdatvs, startmonthvs , startyearvs,visatype)=="false"){
                    return false;
                }



                var startyearuk = $('#ukyear').val();
                var startmonthuk = parseInt(document.getElementById('ukmonth').value)+1;
                var startdatuk = parseInt(document.getElementById('ukdate').value)+1;
                var uktype ="UkEntryDate";

                //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);




                //alert(dob);
                if(validatedate2(startdatuk, startmonthuk , startyearuk,uktype)=="false"){
                    return false;
                }

                var email1=document.getElementById("email").value;
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if(email1.match(mailformat))
                {
                    return true;
                }
                else{
                    alert("You have entered an invalid email address!");
                    return false;
                }


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
                    document.getElementById('overseasAddressPo').value = document.getElementById('currentAddressPo').value;
                    document.getElementById('permanentAddressCity').value = document.getElementById('currentAddressCity').value;
                    document.getElementById('permanentAddressState').value = document.getElementById('currentAddressState').value;
                    document.getElementById('permanentAddressCountry').value = document.getElementById('currentAddressCountry').value;


                    document.getElementById('permanentAddress').style.display = "none";
                    document.getElementById('permanentAddress2').style.display = "none";
                    document.getElementById('permanentAddress3').style.display = "none";
                    document.getElementById('permanentAddressCity').style.display = "none";
                    document.getElementById('overseasAddressPo').style.display = "none";
                    document.getElementById('permanentAddressState').style.display = "none";
                    document.getElementById('permanentAddressCountry').style.display = "none";

                    document.getElementById('paddresslabel').style.display = "none";
                    document.getElementById('paddresslabel2').style.display = "none";
                    document.getElementById('paddresslabel3').style.display = "none";
                    document.getElementById('ppostalcodelabel').style.display = "none";
                    document.getElementById('paddresslabelCity').style.display = "none";
                    document.getElementById('paddresslabelState').style.display = "none";
                    document.getElementById('paddresslabelCountry').style.display = "none";
                    // document.getElementById('sameascurrent').style.display = "block";



                }else
                {
                    document.getElementById('permanentAddress').style.display = "block";
                    document.getElementById('permanentAddress2').style.display = "block";
                    document.getElementById('permanentAddress3').style.display = "block";
                    document.getElementById('ppostalcodelabel').style.display = "block";
                    document.getElementById('permanentAddressCity').style.display = "block";
                    document.getElementById('permanentAddressState').style.display = "block";
                    document.getElementById('permanentAddressCountry').style.display = "block";

                    document.getElementById('paddresslabel').style.display = "block";
                    document.getElementById('paddresslabel2').style.display = "block";
                    document.getElementById('paddresslabel3').style.display = "block";
                    document.getElementById('ppostalcodelabel').style.display = "block";
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

            function validatedate(dd , mm , yy , checktype)
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
                        if (passporttype == "passportExpiryDate") {
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
                        if (passporttype == "passportExpiryDate") {
                            alert(' Passport/ID Expiry Date is in invalid date format!');
                            return "false";
                        }


                    }
                    if ((lyear==true) && (dd>29))
                    {
                        if (passporttype == "passportExpiryDate") {
                            alert(' Passport/ID Expiry Date is in invalid date format!” ');
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
                        if (uktype == "UkEntryDate") {
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
                        if (uktype == "UkEntryDate") {
                            alert('UK Entry Date is in invalid date format!');
                            return "false";
                        }


                    }
                    if ((lyear==true) && (dd>29))
                    {
                        if (uktype == "UkEntryDate") {
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
                        if (visatype == "visaExpiryDate") {
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
                        if (visatype == "visaExpiryDate") {
                            alert('Visa Expiry Date is in invalid date format!');
                            return "false";
                        }


                    }
                    if ((lyear==true) && (dd>29))
                    {
                        if (visatype == "visaExpiryDate") {
                            alert('Visa Expiry Date is in invalid date format!');
                            return "false";
                        }

                    }
                }
            }

        </script>


