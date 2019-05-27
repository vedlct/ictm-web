<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['course-list'] = 'Course/courseList';
$route['course-details/(:any)'] = 'Course/courseDetails/$1';
$route['department/(:any)'] = 'Department/showDetails/$1';
$route['Faculty-list'] = 'Faculty/facultyList';
$route['Faculty-details/(:any)'] = 'Faculty/facultyDetails/$1';
$route['Photo-Gallery'] = 'Photo/albumList';
$route['album-pictures/(:any)'] = 'Photo/albumPhoto/$1';
$route['News-Details/(:any)'] = 'News/newsDetails/$1';
$route['News-Details-Archive/(:any)'] = 'News/newsDetailsArchive/$1';
$route['News-Archive/(:any)/(:any)'] = 'News/ArchiveShow/$1/$2';
$route['Events'] = 'Event/EventList';
$route['Event-Details/(:any)'] = 'Event/eventDetails/$1';

$route['Contact'] = 'OnlineForms/contactUs';
$route['Logout'] = 'Login/logout';



$route['ForgetPass'] = 'Login/ViewForgetPass';
$route['ForgetPassChangedFromMail/(:any)/(:any)/(:any)'] = 'Login/ChangedPass/$1/$2/$3';

$route['AllFormForAgents'] = 'ApplyOnline/viewallFormsForAgents';
$route['AllFormForStudents'] = 'ApplyOnline/viewallFormsForStudents';

$route['Apply'] = 'ApplyOnline/viewForm1';
$route['ApplyForm2'] = 'ApplyOnline/applyNow2';

$route['RegisterInterest'] = 'OnlineForms/registerInterest';

$route['Feedback'] = 'OnlineForms/feedback';
$route['SubmitFeedback'] = 'OnlineForms/SubmitFeedback';

$route['ApplyForm3'] = 'ApplyOnline/applyNow3';
$route['ApplyForm4'] = 'ApplyOnline/applyNow4';
$route['ApplyForm5'] = 'ApplyOnline/applyNow5';
$route['ApplyForm6'] = 'ApplyOnline/applyNow6';
$route['ApplyForm7'] = 'ApplyOnline/applyNow7';
$route['ApplyForm8'] = 'ApplyOnline/applyNow8';
$route['ApplyForm9'] = 'ApplyOnline/applyNow9';
$route['Apply-Work-Experience'] = 'ApplyOnline/applyNow10';

$route['404_override'] = '';
$route['page-not-found'] = 'ErrorPage';

$route['translate_uri_dashes'] = FALSE;
