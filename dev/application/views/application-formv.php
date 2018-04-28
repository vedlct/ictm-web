
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

            <?php foreach ($candidateInfos as $candidateInfo){?>
                <form role="form" action="" method="post" class="registration-form form-horizontal">

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
                                <label class="control-label col-md-2">Title:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <?php for ($i=0;$i<count(Title);$i++){?>
                                        <option <?php if ($candidateInfo->title == Title[$i]){?> selected <?php } ?> value="<?php echo Title[$i]?>"><?php echo Title[$i]?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">First Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="firstName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Surname:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="surName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Other Names:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="otherName">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Date of Birth:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="dob">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Gender:</label>
                                <div class="col-md-10">
                                    <input type="radio" name="" value="male"> Male&nbsp;&nbsp;
                                    <input type="radio" name="" value="female"> Female&nbsp;&nbsp;
                                    <input type="radio" name="" value="other"> Other
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Place of Birth:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Nationality:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
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
                                <label class="control-label col-md-2">Passport No.:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">PP Expiry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">UK Entry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Visa Expiry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Contact Details</h2>

                            <div class="form-group">
                                <label class="control-label col-md-2">Current Address:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Overseas (Home) Address:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mobile:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Fax:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Emergency Contact Details</h2>

                            <div class="form-group">
                                <label class="control-label col-md-2">Title:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <option value="">Mr.</option>
                                        <option value="">Mrs.</option>
                                        <option value="">Ms.</option>
                                        <option value="">Miss.</option>
                                        <option value="">Other...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Relation:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mobile:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="" name="">
                                </div>
                            </div>

                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Course Details</h2>

                            <div class="form-group">
                                <label class="control-label col-md-2">Course Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Awarding Body:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Course Level:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Course Start Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Course End Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Method of study:</label>
                                <div class="col-md-10">
                                    <input type="radio" name="" value=""> Full Time&nbsp;&nbsp;
                                    <input type="radio" name="" value=""> Part Time&nbsp;&nbsp;
                                    <input type="radio" name="" value=""> Day&nbsp;&nbsp;
                                    <input type="radio" name="" value=""> Evenings & Weekend
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <a href="<?php echo base_url()?>OnlineForms/applyNow2"> <button type="button" class="btn ">Next</button></a>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Qualifications</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 2 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Qualification:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Institution:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Start Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">End Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Grade:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add New Qualification</button>
                                </div>
                            </div>

                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Work Experience</h2>

                            <div class="form-group">
                                <label class="control-label col-md-2">Organisation:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Position Held:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">From:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">To:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>

                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>

                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>


                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>English Language Proficiency</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 3 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Is English your first language?:</label>
                                <div class="col-md-10">
                                    <input type="radio" name="" value=""> Yes&nbsp;&nbsp;
                                    <input type="radio" name="" value=""> No&nbsp;&nbsp;
                                </div>
                            </div>

                            <p>If English is not your first language, please state your qualifications.</p>

                            <div class="form-group">
                                <label class="control-label col-md-2">Tests:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <option value="" disabled selected>Select test...</option>
                                        <option value="">IELTS</option>
                                        <option value="">TOEFL</option>
                                        <option value="">PTE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Listening:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Reading:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Writing:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Speaking:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Overall:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Expiry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add New</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Other (Please Specify):</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Finance</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 4 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <p>Name and address of person or organisation responsible for paying fees (if not yourself):</p>

                            <div class="form-group">
                                <label class="control-label col-md-2">Title:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <option value="">Mr.</option>
                                        <option value="">Mrs.</option>
                                        <option value="">Ms.</option>
                                        <option value="">Miss.</option>
                                        <option value="">Other...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Relation:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mobile:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Fax:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Personal Statement</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 5 / 8</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Why do you wish to do this course?:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Where did you find out about the courses of our College?:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Equal Opportunity</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 6 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <p>Equal opportunities monitoring: (please select from the dropdown lists)</p>
                            <div class="form-group">
                                <label class="control-label col-md-2">Ethnicity:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table ">
                                        <tr>
                                            <td><input type="radio" name="" value=""> White</td>
                                            <td><input type="radio" name="" value=""> White - Scottish</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Other White background</td>
                                            <td><input type="radio" name="" value=""> Gypsy or Traveller</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Black or Black British - Caribbean</td>
                                            <td><input type="radio" name="" value=""> Black or Black British - African</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Other Black background</td>
                                            <td><input type="radio" name="" value=""> Asian or Asian British - Indian</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Asian or Asian British - Pakistani</td>
                                            <td><input type="radio" name="" value=""> Asian or Asian British - Bangladeshi</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Chinese</td>
                                            <td><input type="radio" name="" value=""> Other Asian background</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Mixed - White and Black Caribbean</td>
                                            <td><input type="radio" name="" value=""> Mixed - White and Black African</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Mixed - White and Asian</td>
                                            <td><input type="radio" name="" value=""> Other mixed background</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Arab</td>
                                            <td><input type="radio" name="" value=""> Not known</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Disability:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><input type="radio" name="" value=""> No known disability</td>
                                            <td><input type="radio" name="" value=""> Personal care support</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Special Learning Difficulty</td>
                                            <td><input type="radio" name="" value=""> Mental health difficulties</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Autistic Spectrum Disorder</td>
                                            <td><input type="radio" name="" value=""> Unseen disability e.g. diabetes</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Blind/partially sighted</td>
                                            <td><input type="radio" name="" value=""> Multiple disabilities</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Deaf/hearing impairment</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Dyslexia</td>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Wheelchair user/mobility difficulties</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Religion Belief:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><input type="radio" name="" value=""> No religion</td>
                                            <td><input type="radio" name="" value=""> Jewish</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Buddhist</td>
                                            <td><input type="radio" name="" value=""> Muslim</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian</td>
                                            <td><input type="radio" name="" value=""> Sikh</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian - Church of Scotland</td>
                                            <td><input type="radio" name="" value=""> Spiritual</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian - Roman Catholic</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian - Other denomination</td>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Hindu</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Sexual Orientation:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><input type="radio" name="" value=""> Bisexual</td>
                                            <td><input type="radio" name="" value=""> Heterosexual</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Gay</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Lesbian</td>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Upload Documents</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 7 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">

                            <p style="font-weight:bold; text-decoration:underline">Entry Requirement Documents:</p>
                            <p>Submit a completed Application Form along with the following:</p>
                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <ul style="list-style-type:disc">
                                        <li>Passport size photo – 2</li>
                                        <li>Academic certificates and transcripts (a qualification that is equivalent to UK NVQ Level 3)</li>
                                        <li>Work reference letter in a letter headed paper (if your qualifications are lower than NVQ Level 3 e.g. GCSE / NVQ Level 2 or Equivalent qualifications) - Within last 3 months’ time</li>
                                        <li>Passport + Visa (if applicable)</li>
                                        <li>Proof of address (bank statement, council tax bill, utility bill, payslip, Full Driving licence) - Within last 3 months’ time</li>
                                        <li>Need to proof 5 Years Residency (If applicable) or if an EU Migrant worker (6 months’ UK payslips)</li>
                                        <li><b>Please note that all students whose first language is not English will be required to prove their proficiency in English Language to a minimum standard of CEFR Level B2 or equivalent.</b></li>
                                        <li><b>Completed application form along with copies of supporting documents will be retained by Icon College in the event of successful / unsuccessful admission.</b></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Upload file:</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add Another File</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Referees</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 8 / 9</p>
                            </div>
                        </div>

                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Title:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <option value="">Mr.</option>
                                        <option value="">Mrs.</option>
                                        <option value="">Ms.</option>
                                        <option value="">Miss.</option>
                                        <option value="">Other...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Institution/Company:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Position / Job Title:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add Another Referee</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Completed</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 9 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">

                            <p><input type="checkbox" name="" value=""> &nbsp;&nbsp;I confirm that to the best of my knowledge, the information given in this form is correct and complete.  I have read the terms and conditions and other policies of the college and agree to abide by them during my entire course of study. I agree to ICON College of Technology and Management processing personal data submitted in this application form, or any other data that the College may obtain from me to the processing for any purposes connected with my studies or my health and safety, or for any other legitimate reason (in accordance with the Data Protection Act 1998). I authorise ICON College to issue my course result to my sponsor if my sponsor so requests. The Application form and copies of all supporting documents will be retained by ICON College in case of an unsuccessful application for admission.</p>
                            <p><strong>Note:</strong> All decisions by the College are taken in good faith on the basis of the statements made on your application form.  If the College discovers that you have made a false statement or have omitted significant information on your application form, for example in examination results, it may withdraw or amend its offer, or terminate your registration, according to the circumstances. The information given on this application form will be electronically stored and used for administrative purposes by the College in accordance with the provisions of the Data Protection Acts 1984 and 1998.</p>

                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="submit" class="btn btn-next">Submit!</button>
                            <button type="button" class="btn btn-next">Save Application</button>
                            <button type="button" class="btn btn-next">Download PDF</button>
                        </div>
                    </fieldset>

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