<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



////////////////////custom constant////////////////


define("USER_TYPE",array ("Admin","Editor","Contributor"));
define("STATUS",array ("Active","Inactive"));
define("SELECT_STATUS" , "Select Status");
define("NEVER_MODIFIED", "Never Modified");
define("SELECT_APPROVE",array ("Yes","No"));


define("SELECT_TITLE","Select Title");

define("Title",array ("Mr","Mrs","Miss","Ms","Prof","Dr.","Other"));



define("SELECT_TYPE","Select Type");
define("Type",array("Student","Agent"));


define("VISA_TYPE",array("Work Visa","Business Visa", "Study Visa", "Visitor Visa", "Family Visa", "Settlement Visa", "Transit Visa", "Not Applicable", "Other"));


//////////// For Menu    /////////////////
define("NEW_MENU", "New Menu");
define("SELECT_PARENT_MENU", "Select Parent Menu");
define("MENU", "Menu");
define("NONE", "None");
define("SELECT_PAGE", "Select Page");
define("SELECT_MENU_TYPE", "Select Menu Type");
define("MENU_TYPE",array ("Top","MainMenu","KeyInfo","QuickLink","ImportantLink","Bottom"));


////////// For Page ///////////////////////

define("SELECT_PAGE_TYPE", "Select Page Type");
define("PAGE_TYPE", array ("About Type","Health Type","Terms Type"));

////////////    faculy page      ///////////////
define("SELECT_EMPLOYEE_TYPE", "Select Employee Type");
define("EMPLOYEE_TYPE",array ("Part Time","Full Time"));
define("SELECT_COURSE", "Select Course");
define("SELECT_DEPARTMENT", "Select Department");



/////////////// News Page ///////////////

define ("NewsType",array ("Announcement", "News", "Press Release"));


/////////////  Event Page ////////////////////
define ("EventType",array ("Seminar", "Training", "Festival"));
define("SELECT_EVENT_TYPE", "Select Event Type");


/////////////  For Department ////////////////////
define("SELECT_DEPARTMENT_HEAD", "Select Department Head");

////////////// For Photo /////////////////////
define("SELECT_ALBUM", "Select Album");

define("FOLDER_NAME", "AdminPanel");

///////////// For FeedBack ////////////////
define("FEEDBACK_SOURCE",array ("Website","Facebook","Twitter","Youtube","LinkedIn","Google+","Application Form","Feedback Form","Other source"));

///////////// For Register Interest ///////////
define("RegisterInterestTitle",array ("Mr","Mrs","Miss","Ms","Prof","Dr.","Other"));
define("HearAboutUs",array ("Hotcourses","Whatuni","Metro Newspaper","Evening Standard","Eastend Life Newspaper","Bill Board","Internet","Friends","Google Ad","Facebook","TV advert","Other"));

/////////////reCapcha////////

//define("ADMIN_EMAIL", "md.sakibrahman@gmail.com");
//define("SITE_KEY_CONTACT", "6LdJ7UAUAAAAAN7eZtytQzkfyvAi85C7GN_sU-Z5");
//define("SERECT_KEY_CONTACT", "6LdJ7UAUAAAAAN7eZtytQzkfyvAi85C7GN_sU-Z5");
//
define("ADMIN_EMAIL", "ictmuk2003@gmail.com");
define("SITE_KEY_CONTACT", "6LccSkgUAAAAAAkvFU-ws0nvfDZz8wu1MXIRQN36");
define("SERECT_KEY_CONTACT", "6LccSkgUAAAAALZ-4nk3o5TGALcatFYt2KUPhqz0");


//define("ADMIN_EMAIL", "ictmuk2003@gmail.com");
//define("SITE_KEY_CONTACT", "6LccSkgUAAAAAAkvFU-ws0nvfDZz8wu1MXIRQN36");
//define("SERECT_KEY_CONTACT", "6LccSkgUAAAAALZ-4nk3o5TGALcatFYt2KUPhqz0");
//

////////////country/////////////////////////
define("COUNTRY",array ("United Kingdom","Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d`Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People`s Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People`s Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"));
define("languageTest", array("Lisiting"=>'1',"Reading"=>'2', "Speaking"=>'3', "Writing"=>'4' ));
////////Nationality//////
define("NATIONALITY",array ("United Kingdom","Afghan", "Albanian", "Algerian","American", "Andorran", "Angolan", "Anguillan", "Antarctic", "Antiguan", "Argentine", "Armenian", "Arubian", "Australian", "Austrian", "Azerbaijani", "Bahameese", "Bahrainian", "Bangladeshi", "Barbadian", "Belarusian", "Belgian", "Belizean", "Beninese", "Bermudan", "Bhutanese", "Bolivian", "Bosnian", "Bouvet Island", "Brazilian", "British Indian Ocean Territory","British", "Bruneian", "Bulgarian", "Burkinabe", "Burundian", "Cambodian", "Cameroonian", "Canadian", "Cape Verdean", "Caymanian", "Central African", "Chadian", "Chilean", "Chinese", "Christmas Islander", "Cocossian", "Colombian", "Comoran", "Congolese", "Congolese", "Cook Islander", "Costa Rican" , "Croatian", "Cuban", "Cypriot", "Czech", "Danish", "Djiboutian", "Dominican", "Dominican","Dutch", "East Timor", "Ecuadorean", "Egyptian","Emirian",  "Equatorial Guinean", "Eritrean", "Estonian", "Ethiopian", "Falkland Islander", "Faroese","Filipino", "Fijian", "Finnish", "French", "French", "French Guianese", "French Polynesian", "French Southern Territories", "Gabonese", "Gambian", "Georgian", "German", "Ghanaian", "Gibraltarian", "Greek", "Greenlander", "Grenadian", "Guadeloupean", "Guamanian", "Guatemalan", "Guinean", "Guinean", "Guyanese", "Haitian", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduran", "Hong Konger", "Hungarian", "Icelander", "Indian", "Indonesian", "Iranian", "Iraqi", "Irish", "Israeli", "Italian","Ivorian", "I-Kiribati", "Jamaican", "Japanese", "Jordanian", "Kazakhstani", "Kenyan","Kittian",  "Kuwaiti", "Kyrgyzstani", "Laotian", "Latvian", "Lebanese", "Liberian", "Libyan Arab Jamahiriya", "Liechtensteiner", "Lithunian", "Luxembourger", "Macanese", "Macedonian", "Malagasy", "Malawian", "Malaysian", "Maldivan", "Malian", "Maltese", "Marshallese", "Martinican", "Mauritanian", "Mauritian", "Mahoran", "Mexican", "Micronesian", "Moldovan", "Monacan",  "Mosotho","Mongolian", "Montserratian", "Moroccan", "Mozambican","Motswana", "Myanmarese", "Namibian", "Nauruan","North Korea", "Nepalese",  "Netherlands Antilles", "New Caledonian", "New Zealander", "Nicaraguan", "Nigerien", "Nigerian", "Niuean", "Norfolk Islander", "Northern Mariana Islander", "Norwegian", "Omani", "Pakistani", "Palauan", "Panamanian", "Papua New Guinean", "Paraguayan", "Peruvian", "Pitcairn Islander", "Polish", "Portuguese", "Puerto Rican", "Qatari", "Reunion", "Romanian", "Russian", "Rwandan", "Saint Lucian","South Korean", "Saint Vincentian", "Samoan", "Sanmarinese","Samoan","Salvadorean","São Tomean", "Saudi Arabian", "Senegalese", "Seychellois", "Sierra Leonean", "Singaporean", "Slovakian", "Slovenian", "Solomon Islander", "Somali", "South African", "South Georgia and the South Sandwich Islands", "Spanish", "Sri Lankan", "St. Helena", "Saint-Pierrais", "Sudanese", "Surinamer", "Svalbard and Jan Mayen Islands", "Swazi", "Swedish", "Swiss", "Syrian Arab Republic", "Taiwanese", "Tajikistani", "Tanzanian", "Thai", "Togolese", "Tokelauan", "Tongan", "Trinidadian", "Tunisian", "Turkish", "Turkmen", "Turks and Caicos Islande", "Tuvaluan", "Ugandan", "Ukrainian",  "United States Minor Outlying Islands", "Uruguayan", "Uzbekistani", "Ni-Vanuatu", "Venezuelan", "Vietnamese", "Virgin Islander", "Virgin Islander", "Wallisian", "Western Saharan", "Yemeni", "Yugoslavia", "Zambian", "Zimbabwean"));
//////////////Aplication/////////////////

define("COURSESESSION",array ("February","May","September"));
define("PERSONAL_STATEMENT",array ("Facebook","Friend","Family","News","Google","Agent"));
define("Login",array ("Login","Sigin"));
define("Logout",array ("Logout","Sigout"));


/////////////Date//////////////////////////////
define ("Year",array ("Seminar", "Training", "Festival"));

/////////doctype//////////

define("doc_type",array ("Image","Academic certificates and transcripts","Work reference letter","Passport and Visa","Proof of address","Proof of 5 Years Residency"));

define ("agentList", serialize (array ("ALUC2021"=>"Allied UK Consultant LTD", "ASUK1945"=>"Advise UK",
	"ATLN1834"=>"Atlantic London", "COCE1712"=>"Course Centre","ILCR3078"=>"I learn centre",
	"JHAY1689"=>"John Agency","RSSD4156"=>"Ready Steady Study","SPIM5023"=>"Simple Immigration","SKTH1534"=>"Skytouch",
	"TMGL6067"=>"Tim Group LTD","ZNGL1424"=>"Zain Global Ltd.","AHAT7079"=>"AH&Z Agent","ORTI8067"=>"Ornate I","ABTR1901"=>"Albatross",
	"PAST9036"=>"PA Studies","PRSL4510"=>"Pro Education and Services LTD","IENE3692"=>"IEE","UNWN9099"=>"Unknown" )));
