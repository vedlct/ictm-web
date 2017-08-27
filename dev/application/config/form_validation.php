<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (

	'signin' => array (
		array(
		        'field' => 'useremail',
		        'label' => 'UserEmail',
		        'rules' => 'required|valid_email',

		     ),
		array(
		        'field' => 'password',
		        'label' => 'Password',
		        'rules' => 'required'
		     )
			 ),
    /*---------------- for menu create-------------*/
    'createMenu'=> array (
        array(
            'field' => 'menuTitle',
            'label' => 'Menu Name',
            'rules' => 'required|max_length[45]|callback_menuTitleCheck'
        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'parentId',
            'label' => 'Parent Menu',
            'rules' => 'regex_match[/^[0-9]*$/]'
        ),
        array(
            'field' => 'pageId',
            'label' => 'Page',
            'rules' => 'regex_match[/^[0-9]*$/]'
        ),
        array(
            'field' => 'menuStatus',
            'label' => 'Menu Status',
            'rules' => 'required|alpha'
        ),
        ),
    /*---------------- for menu edit-------------*/
    'editMenu'=> array (

        array(
            'field' => 'menuTitle',
            'label' => 'Menu Name',
            'rules' => 'required|max_length[45]|callback_menuTitleCheckFormEditMenu'

        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'parentId',
            'label' => 'Parent Menu',
            'rules' => 'regex_match[/^[0-9]*$/]',

        ),
        array(
            'field' => 'pageId',
            'label' => 'Page',
            'rules' => 'regex_match[/^[0-9]*$/]'
        ),
        array(
            'field' => 'menuStatus',
            'label' => 'Menu Status',
            'rules' => 'required|alpha'
        ),
    ),
    /*---------------- for Page create-------------*/
    'createPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required|max_length[100]|is_unique[ictmpage.pageTitle]',

        ),
        array(
            'field' => 'keywords',
            'label' => 'Page Keywords',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'metadata',
            'label' => 'Page MetaData',
            'rules' => 'max_length[100]',

        ),
//        array(
//            'field' => 'content',
//            'label' => 'Page Content',
//            'rules' => 'xss_clean'
//        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'pagetype',
            'label' => 'Page Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Status',
            'rules' => 'required|alpha'
        ),
    ),
    /*---------------- for Page edit-------------*/
    'editPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required|max_length[100]|callback_pageCheckFormEditPage',

        ),
        array(
            'field' => 'keywords',
            'label' => 'Page Keywords',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'metadata',
            'label' => 'Page MetaData',
            'rules' => 'max_length[100]',

        ),
//        array(
//            'field' => 'content',
//            'label' => 'Page Content',
//            'rules' => 'encode_php_tags'
//        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'pagetype',
            'label' => 'Page Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Status',
            'rules' => 'required|alpha'
        ),
    ),
    /*---------------- for pageSection create-------------*/
    'createPageSection'=> array (
        array(
            'field' => 'pageId',
            'label' => 'Page Title',
            'rules' => 'required',

        ),
        array(
            'field' => 'textbox[]',
            'label' => 'Section Title',
            'rules' => 'trim|required|max_length[100]'
        ),

//        array(
//            'field' => 'text[]',
//            'label' => 'Page Section Content',
//            'rules' => 'trim|encode_php_tags'
//        ),
        array(
            'field' => 'status[]',
            'label' => 'Page Section Status',
            'rules' => 'required|alpha'
        ),
    ),
    /*---------------- for pageSection edit-------------*/
    'editPageSection'=> array (
        array(
            'field' => 'textbox',
            'label' => 'Section Title',
            'rules' => 'required|max_length[100]',

        ),
//        array(
//            'field' => 'text',
//            'label' => 'Section Content',
//            'rules' => 'encode_php_tags'
//        ),
        array(
            'field' => 'status',
            'label' => 'Page Section Status',
            'rules' => 'required|alpha'
        ),
    ),
    /*---------------- for faculty create-------------*/
    'createFaculty'=> array (
        array(
            'field' => 'facultyFirstName',
            'label' => 'First Name',
            'rules' => 'required|max_length[50]',

        ),
        array(
            'field' => 'facultyLastName',
            'label' => 'Last Name',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'facultyDegree',
            'label' => 'Faculty Degree',
            'rules' => 'required|max_length[255]',

        ),
        array(
            'field' => 'facultyPosition',
            'label' => 'faculty Position',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'facultyImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'facultyEmpType',
            'label' => 'Employee Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'facultyEmail',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'facultyPhone',
            'label' => 'Phone',
            'rules' => 'required|regex_match[/^[0-9]*$/]'
        ),
        array(
            'field' => 'facultyTwitter',
            'label' => 'Twitter',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'facultyLinkedin',
            'label' => 'LinkedIn',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'facultyStatus',
            'label' => 'Status',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'facultyCourses[]',
            'label' => 'LinkedIn',
            'rules' => 'required|is_natural_no_zero'
        ),
        array(
            'field' => 'facultyIntro',
            'label' => 'Faculty Intro',
            'rules' => 'required'
        ),
    ),
    /*---------------- for faculty Edit-------------*/
    'editFaculty'=> array (
        array(
            'field' => 'faculty_first_name',
            'label' => 'First Name',
            'rules' => 'required|max_length[10]',

        ),
        array(
            'field' => 'faculty_last_name',
            'label' => 'Last Name',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'faculty_degree',
            'label' => 'Faculty Degree',
            'rules' => 'required|max_length[255]',

        ),
        array(
            'field' => 'faculty_position',
            'label' => 'faculty Position',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'facultyImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'faculty_emp_type',
            'label' => 'Employee Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'faculty_email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'faculty_phone',
            'label' => 'Phone',
            'rules' => 'required|regex_match[/^[0-9]*$/]'
        ),
        array(
            'field' => 'faculty_twitter',
            'label' => 'Twitter',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'faculty_linkedin',
            'label' => 'LinkedIn',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'faculty_status',
            'label' => 'Status',
            'rules' => 'required|alpha'
        ),
        array(
            'field' => 'faculty_courses[]',
            'label' => 'Faculty Course',
            'rules' => 'required|is_natural_no_zero'
        ),
        array(
            'field' => 'faculty_intro',
            'label' => 'Faculty Intro',
            'rules' => 'required'
        ),
    ),

			 
);
