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

define("Title",array ("Mr","Mrs","Miss","Ms","Other"));


define("SELECT_TYPE","Select Type");
define("Type",array("Student","Agent"));


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
define("ADMIN_EMAIL", "ictmuk2003@gmail.com");
define("SITE_KEY_CONTACT", "6LccSkgUAAAAAAkvFU-ws0nvfDZz8wu1MXIRQN36");
define("SERECT_KEY_CONTACT", "6LccSkgUAAAAALZ-4nk3o5TGALcatFYt2KUPhqz0");
