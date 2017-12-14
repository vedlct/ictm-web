		
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
	
                        	<form role="form" action="<?php echo base_url()?>OnlineForms/insertApplicationForm1" method="post" class="registration-form form-horizontal">
                        		
                        		<fieldset>
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
                                            	<select style="width: 100%" name="title" required id="title">

                                                    <option value="" selected><?php echo SELECT_TITLE?></option>
                                                    <?php for ($i=0;$i<count(Title);$i++){?>
                                                        <option <?php echo set_select('title',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                                    <?php } ?>

                                                    </select> 
                                          	</div>
				                        </div>
                                        
				                    	<div class="form-group">
                                        	<label class="control-label col-md-2">First Name:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="firstName" name="firstName">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Surname:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="surName" name="surName">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Other Names:</label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" id="otherName" name="otherName">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Date of Birth:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="date" class="form-control" required id="dob" name="dob">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Gender:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="radio" required id="gender" name="gender" value="male"> Male&nbsp;&nbsp;
                                                <input type="radio" required id="gender" name="gender" value="female"> Female&nbsp;&nbsp;
                                                <input type="radio" required id="gender" name="gender" value="other"> Other
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Place of Birth:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="placeOfBirth" name="placeOfBirth">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Nationality:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<select style="width: 100%" id="nationality" required name="nationality">
                                                		<option value="" disabled selected>Select country...</option>
                                                      	<option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antartica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo">Congo, the Democratic Republic of the</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                        <option value="Croatia">Croatia (Hrvatska)</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="East Timor">East Timor</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="France Metropolitan">France, Metropolitan</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                        <option value="Holy See">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran">Iran (Islamic Republic of)</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macau">Macau</option>
                                                        <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia">Micronesia, Federated States of</option>
                                                        <option value="Moldova">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russia">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                                        <option value="Saint LUCIA">Saint LUCIA</option>
                                                        <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                        <option value="Span">Spain</option>
                                                        <option value="SriLanka">Sri Lanka</option>
                                                        <option value="St. Helena">St. Helena</option>
                                                        <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syria">Syrian Arab Republic</option>
                                                        <option value="Taiwan">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Viet Nam</option>
                                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                        <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                        <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Yugoslavia">Yugoslavia</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select> 
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Passport No.:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="passportNo" name="passportNo">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">PP Expiry Date:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="date" class="form-control" required id="passportExpiryDate" name="passportExpiryDate">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">UK Entry Date:<span class="required">*</span> </label>
                                          	<div class="col-md-10">
                                            	<input type="date" class="form-control" required id="UkEntryDate" name="UkEntryDate">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Visa Expiry Date:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="date" class="form-control" required id="visaExpiryDate" name="visaExpiryDate">
                                          	</div>
				                        </div>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Current Address:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<textarea id="comment-message" required id="currentAddress" name="currentAddress" rows="8" tabindex="4"></textarea>
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Overseas (Home) Address:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<textarea id="comment-message" required id="overseasHomeAddress" name="overseasHomeAddress" rows="8" tabindex="4"></textarea>
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Telephone:</label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="telephone" name="telephone">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Mobile:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="mobile" name="mobile">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">E-mail:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="email" class="form-control" required id="email" name="email">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Fax:</label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" id="fax" name="fax">
                                          	</div>
				                        </div>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Contact Details</h2>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Title:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<select style="width: 100%" id="EmergencyContactTitle" required name="EmergencyContactTitle">

                                                    <option value="" selected><?php echo SELECT_TITLE?></option>
                                                    <?php for ($i=0;$i<count(Title);$i++){?>
                                                        <option <?php echo set_select('EmergencyContactDetails',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                                    <?php } ?>

                                                    </select> 
                                          	</div>
				                        </div>
                                        
				                    	<div class="form-group">
                                        	<label class="control-label col-md-2">Name:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="EmergencyContactName" name="EmergencyContactName">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Relation:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="EmergencyContactRelation" name="EmergencyContactRelation">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Address:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<textarea id="comment-message" required id="EmergencyContactAddress" name="EmergencyContactAddress" rows="8" tabindex="4"></textarea>
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Mobile:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" required id="EmergencyContactMobile" name="EmergencyContactMobile">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">E-mail:<span class="required">*</span></label>
                                          	<div class="col-md-10">
                                            	<input type="email" class="form-control" required id="EmergencyContactEmail" name="EmergencyContactEmail">
                                          	</div>
				                        </div>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Course Details</h2>

                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Course Name:</label>
                                          	<div class="col-md-10">
                                                <select style="width: 100%" onchange="courseAwardBody()" id="courseName" required name="courseName">
                                                <option value=""><?php echo SELECT_COURSE?></option>
                                                <?php foreach ($courseInfo as $course){?>
                                                <option value="<?php echo $course->courseId?>" <?php echo set_select('courseName',$course->courseId, False); ?>><?php echo $course->courseTitle?></option>
                                                    <?php } ?>
                                                </select>
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Awarding Body:</label>
                                          	<div class="col-md-10">
                                            	<input type="text" disabled class="form-control" id="awardingBody" name="awardingBody">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Course Level:</label>
                                          	<div class="col-md-10">
                                            	<input type="text" class="form-control" id="courseLevel" name="courseLevel">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Course Start Date:</label>
                                          	<div class="col-md-10">
                                            	<input type="date" class="form-control" id="courseStartDate" name="courseStartDate">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Course End Date:</label>
                                          	<div class="col-md-10">
                                            	<input type="date" class="form-control" id="courseEndDate" name="courseEndDate">
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Method of study:</label>
                                          	<div class="col-md-10">
                                            	<input type="radio" name="methodeOfStudy" value="Full Time"> Full Time&nbsp;&nbsp;
                                                <input type="radio" name="methodeOfStudy" value="Part Time"> Part Time&nbsp;&nbsp;
                                                <input type="radio" name="methodeOfStudy" value="Day"> Day&nbsp;&nbsp;
                                                <input type="radio" name="methodeOfStudy" value="Evenings & Weekend"> Evenings & Weekend
                                          	</div>
				                        </div>
                                        
                                        <div class="form-group">        
                                          <div class="col-sm-offset-2 col-md-10">
                                            <a href="<?php echo base_url()?>OnlineForms/insertApplicationForm1"> <button type="button" class="btn ">Next</button></a>
                                            <button type="submit" class="btn btn-next">Save Application</button>
                                          </div>
                                        </div>
				                    </div>
			                    </fieldset>
			                    

		                    
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