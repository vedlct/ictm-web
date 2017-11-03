
        <?php include("header.php");
        //require_once "recaptchalib.php";
       // include ('recaptchalib.php');
        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola",
            "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia",
            "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium",
            "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island",
            "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia",
            "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China",
            "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the",
            "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark",
            "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
            "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France",
            "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia",
            "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala",
            "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)",
            "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland",
            "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of",
            "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia",
            "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of",
            "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius",
            "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco",
            "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand",
            "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau",
            "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion",
            "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa",
            "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)",
            "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena",
            "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic",
            "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia",
            "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
            "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)",
            "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        ?>
        <script src="<?php echo base_url()?><?php echo FOLDER_NAME?>/public/js/jquery-1.12.4.js"></script>
        <link href="<?php echo base_url()?><?php echo FOLDER_NAME?>/public/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">


        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Register Interest</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li>\ Register Interest</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="flat-row padding-small-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <?php if ($this->session->flashdata('errorMessage')!=null){?>
                            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                        <?php }
                        elseif($this->session->flashdata('successMessage')!=null){?>
                            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                        <?php }?>

                        	<form role="form" action="<?php echo  base_url()?>OnlineForms/insertRegisterInterest" method="post" class="registration-form form-horizontal">



		                        
		                            <div class="form-bottom">
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Title</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                                <select style="width: 100%" name="title" >
                                                    <option value="#" selected disabled>Select...</option>
                                                    <option value="Hotcourses">Mr</option>
                                                    <option value="Whatuni">Mrs</option>
                                                    <option value="Metro Newspaper">Miss</option>
                                                    <option value="Evening Standard">MS</option>
                                                    <option value="Eastend Life Newspaper">Doc</option>
                                                    <option value="Bill Board">Engr</option>
                                                </select>
                                            </div>
                                        </div>
				                    	<div class="form-group">
				                    		<label class="control-label col-md-2">First Name*</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('fname'); ?></font></p>
				                        		<input type="text" name="fname" placeholder="" class="form-control" id="" value="<?php echo set_value('fname'); ?>">
                                            </div>
				                        </div>
				                        <div class="form-group">
				                        	<label class="control-label col-md-2">Surname*</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('sname'); ?></font></p>
				                        		<input type="text" name="sname" class="form-control" id="" value="<?php echo set_value('sname'); ?>">
                                            </div>
				                        </div>
				                        <div class="form-group">
				                        	<label class="control-label col-md-2">House Name/Numbe* </label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('house'); ?></font></p>
                                                <input type="text" name="house" placeholder="" class="form-control" id="" value="<?php echo set_value('house'); ?>">
                                            </div>
				                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Street</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('street'); ?></font></p>
                                                <input type="text" name="street" placeholder="" class="form-control" id="" value="<?php echo set_value('street'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Post Code</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('postcode'); ?></font></p>
                                                <input type="text" name="postcode" placeholder="" class="form-control" id="" value="<?php echo set_value('postcode'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Town/City</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('city'); ?></font></p>
                                                <input type="text" name="city" placeholder="" class="form-control" id="" value="<?php echo set_value('city'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Country</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('country'); ?></font></p>
                                                <select style="width: 100%" name="country" >
                                                    <option value="#" selected disabled>Select...</option>
<!--                                                    --><?php //foreach ($countries as $country){?>
<!--                                                    <option value="--><?php //echo $country?><!--" --><?php //echo set_select('country', $country, False); ?><!-->--><?php //echo $country?><!--</option>-->
<!--                                                    --><?php //} ?>
                                                    <?php foreach ($countries as $country){?>
                                                        <option value="<?php echo $country?>" <?php echo set_select('country', $country, False); ?>><?php echo $country?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Phone Number</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('phone'); ?></font></p>
				                        		<input type="text" name="phone" placeholder="" class="form-control" id="" value="<?php echo set_value('phone'); ?>">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Email Address*</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('email'); ?></font></p>
				                        		<input type="text" name="email" placeholder="" class="form-control" id="" value="<?php echo set_value('email'); ?>">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Course</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('course'); ?></font></p>

                                                <select style="width: 100%" name="course" >
                                                    <option value="#" selected disabled>Select...</option>
                                                    <?php foreach ($course as $course) {?>
                                                    <option value="<?php echo $course->courseTitle?>" <?php echo set_select('course',  $course->courseTitle, False); ?>><?php echo $course->courseTitle?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">How did you hear about us*</label>
                                            <div class="col-md-10">

                                                <p><font color="red"> <?php echo form_error('hear');?></font></p>
                                                <select style="width: 100%" name="hear">

                                                	<option value="#" selected disabled>Select...</option>
                                                    <option value="Hotcourses">Hotcourses</option>
                                                    <option value="Whatuni">Whatuni</option>
                                                    <option value="Metro Newspaper">Metro Newspaper</option>
                                                    <option value="Evening Standard">Evening Standard</option>
                                                    <option value="Eastend Life Newspaper">Eastend Life Newspaper</option>
                                                    <option value="Bill Board">Bill Board</option>
                                                    <option value="Internet">Internet</option>
                                                    <option value="Friends">Friends</option>
                                                    <option value="Google Ad">Google Ad</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="TV advert">TV advert</option>
                                                    <option value="Other">Other Newspaper/media: Please specify</option>
                                                 </select> 
                                             </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Other</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('other'); ?></font></p>
				                        		<input type="text" name="other" placeholder="" class="form-control" id="" value="<?php echo set_value('other'); ?>">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Disability requirement</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('disability'); ?></font></p>
				                        		<input type="text" name="disability" placeholder="" class="form-control" id="" value="<?php echo set_value('disability'); ?>">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Book appointment/open day</label>

<!--                                            <div class="col-md-10">-->
<!--				                        		<input type="text" name="appoinment" placeholder="" class="form-control" id="" value="--><?php //echo set_value('appoinment'); ?><!--">-->
<!--                                            </div>-->

                                            <p><font color="red"> <?php echo form_error('appoinment'); ?></font></p>
                                            <div class='input-group date datetimepicker col-md-10' id='datetimepicker1'>
                                                <input type='text' id="newsDate" name="appoinment" value="<?php echo set_value('appoinment'); ?>" class="form-control" required/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>

				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Comments</label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('comments'); ?></font></p>
				                        		<textarea name="comments" class="form-control" id=""><?php echo set_value('comments'); ?></textarea>
                                            </div>
				                        </div>
                                        
                                        <div class="form-group">        
                                          <div class="col-sm-offset-2 col-md-10">

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

        <script type="text/javascript" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/public/js/moment.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/public/js/datepicker.min.js"></script>

<!--        <script src="--><?php //echo base_url()?><!--public/javascript/jquery.backstretch.min.js"></script>-->
<!--        <script src="--><?php //echo base_url()?><!--public/javascript/scripts.js"></script>-->

        <script type="text/javascript">

            $(function () {

                $('.datetimepicker').datetimepicker({
                    format: 'DD-MM-YYYY h:m A'
                });

            });
        </script>
        <script>
            $('.datetimepicker').keydown(function(e) {
                e.preventDefault();
                return false;
            });

        </script>

