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
            'rules' => 'required|max_length[100]|callback_menuTitleCheck'
        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'parentId',
            'label' => 'Parent Menu',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]'
        ),
        array(
            'field' => 'pageId',
            'label' => 'Page',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]'
        ),
        array(
            'field' => 'menuStatus',
            'label' => 'Menu Status',
            'rules' => 'required|max_length[50]'
        ),
        ),
    /*---------------- for menu edit-------------*/
    'editMenu'=> array (

        array(
            'field' => 'menuTitle',
            'label' => 'Menu Name',
            'rules' => 'required|max_length[100]|callback_menuTitleCheckFormEditMenu'
        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'parentId',
            'label' => 'Parent Menu',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]',

        ),
        array(
            'field' => 'pageId',
            'label' => 'Page',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]'
        ),
        array(
            'field' => 'menuStatus',
            'label' => 'Menu Status',
            'rules' => 'required|max_length[50]'
        ),
    ),
    /*---------------- for Page create-------------*/
    'createPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required|max_length[255]|is_unique[ictmpage.pageTitle]',
            'errors' => array(
                'is_unique' => 'Page Title Allready Existed !!',
            ),
        ),
        array(
            'field' => 'keywords',
            'label' => 'Page Keywords',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'metadata',
            'label' => 'Page MetaData',
            'rules' => 'max_length[255]',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'pagetype',
            'label' => 'Page Type',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Status',
            'rules' => 'required|max_length[50]'
        ),
    ),
    /*---------------- for Page edit-------------*/
    'editPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required|max_length[255]|callback_pageCheckFormEditPage',

        ),
        array(
            'field' => 'keywords',
            'label' => 'Page Keywords',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'metadata',
            'label' => 'Page MetaData',
            'rules' => 'max_length[255]',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'pagetype',
            'label' => 'Page Type',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Status',
            'rules' => 'required|max_length[50]'
        ),
    ),
    /*---------------- for pageSection create-------------*/
    'createPageSection'=> array (
        array(
            'field' => 'pageId',
            'label' => 'Page Title',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]',

        ),
        array(
            'field' => 'textbox[]',
            'label' => 'Section Title',
            'rules' => 'trim|required|max_length[255]'
        ),

        array(
            'field' => 'status[]',
            'label' => 'Page Section Status',
            'rules' => 'required|max_length[50]'
        ),
    ),
    /*---------------- for pageSection edit-------------*/
    'editPageSection'=> array (
        array(
            'field' => 'textbox',
            'label' => 'Section Title',
            'rules' => 'required|max_length[100]',
        ),
        array(
            'field' => 'status',
            'label' => 'Page Section Status',
            'rules' => 'required|max_length[50]'
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
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'facultyEmail',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[ictmfaculty.facultyEmail]|max_length[100]',
            'errors' => array(
                'is_unique' => 'Email Allready Existed ! Faculty  Existed !',
            ),
        ),
        array(
            'field' => 'facultyPhone',
            'label' => 'Phone',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]'
        ),
        array(
            'field' => 'facultyTwitter',
            'label' => 'Twitter',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'facultyLinkedin',
            'label' => 'LinkedIn',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'facultyStatus',
            'label' => 'Status',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'facultyCourses[]',
            'label' => 'Faculty Course',
            'rules' => 'is_natural_no_zero'
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
            'rules' => 'required|max_length[50]',

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
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'faculty_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[100]|callback_emailCheckFormEditFaculty'
        ),
        array(
            'field' => 'faculty_phone',
            'label' => 'Phone',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]'
        ),
        array(
            'field' => 'faculty_twitter',
            'label' => 'Twitter',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'faculty_linkedin',
            'label' => 'LinkedIn',
            'rules' => 'max_length[255]'
        ),
        array(
            'field' => 'faculty_status',
            'label' => 'Status',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'faculty_intro',
            'label' => 'Faculty Intro',
            'rules' => 'required'
        ),
    ),

    /*---------------- for Course create-------------*/
    'createCourse'=> array (
        array(
            'field' => 'name',
            'label' => 'Course Name',
//            'rules' => 'required|max_length[255]|callback_CourseCheckFormNewCourse',
            'rules' => 'required|max_length[255]|is_unique[ictmcourse.courseTitle]',
            'errors' => array(
                'is_unique' => 'Course Allready Existed !!',
            ),
        ),
        array(
            'field' => 'codeperson',
            'label' => 'Course Code Pearson',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'award',
            'label' => 'Awarding Titlle',
            'rules' => 'required|max_length[255]',

        ),
        array(
            'field' => 'Code',
            'label' => 'Course Code',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'location',
            'label' => 'Course Location',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'awardingBody',
            'label' => 'Awarding Body',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'credit',
            'label' => 'Credit value',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'structure',
            'label' => 'Course Structure',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'accreditation',
            'label' => 'Accreditation',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'accreditationNo',
            'label' => 'Accreditation No',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'duration',
            'label' => 'Course Duration',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'year',
            'label' => 'Academic Year',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'mode',
            'label' => 'Study Mode',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'language',
            'label' => 'Study Language',
            'rules' => 'required|max_length[100]',

        ),
        array(
            'field' => 'fees',
            'label' => 'Course Fees',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'timetables',
            'label' => 'Course Time Table',
            'rules' => 'required|max_length[255]',

        ),
        array(
            'field' => 'status',
            'label' => 'Course Status',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'department',
            'label' => 'Department',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]'
        ),
        array(
            'field' => 'image',
            'label' => 'Course Image',
            'rules' => 'callback_val_img_check'
        ),
    ),

    /*---------------- for Course Edit-------------*/
    'editCourse'=> array (
        array(
            'field' => 'name',
            'label' => 'Course Name',
            'rules' => 'required|max_length[255]|callback_CourseCheckFormEditCourse',
        ),
        array(
            'field' => 'codeperson',
            'label' => 'Course Code Pearson',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'award',
            'label' => 'Awarding Titlle',
            'rules' => 'required|max_length[255]',

        ),
        array(
            'field' => 'code',
            'label' => 'Course Code',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'location',
            'label' => 'Course Location',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'awardingBody',
            'label' => 'Awarding Body',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'credit',
            'label' => 'Credit value',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'structure',
            'label' => 'Course Structure',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'accreditation',
            'label' => 'Accreditation',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'accreditationNo',
            'label' => 'Accreditation No',
            'rules' => 'required|max_length[45]'
        ),
        array(
            'field' => 'duration',
            'label' => 'Course Duration',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'year',
            'label' => 'Academic Year',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'mode',
            'label' => 'Study Mode',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'language',
            'label' => 'Study Language',
            'rules' => 'required|max_length[100]',

        ),
        array(
            'field' => 'fees',
            'label' => 'Course Fees',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'timetables',
            'label' => 'Course Time Table',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'status',
            'label' => 'Course Status',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'department',
            'label' => 'Department',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]'
        ),
        array(
            'field' => 'image',
            'label' => 'Course Image',
            'rules' => 'callback_val_img_check'
        ),
    ),

    /*---------------- for Create Course Section-------------*/
    'createCourseSection'=> array (
        array(
            'field' => 'coursetitle',
            'label' => 'Course Name',
            'rules' => 'required|max_length[11]|regex_match[/^[0-9]*$/]',
        ),
        array(
            'field' => 'textbox[]',
            'label' => 'Course Section Title',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'status[]',
            'label' => 'Course Section Status',
            'rules' => 'required|max_length[50]'
        ),
    ),

    /*---------------- for CourseSection edit-------------*/
    'editCourseSection'=> array (

        array(
            'field' => 'textbox',
            'label' => 'Section Title',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'status',
            'label' => 'Course Section Status',
            'rules' => 'required|max_length[50]'
        ),
    ),

    /*---------------- for Create Department-------------*/
    'createDepartment'=> array (
        array(
            'field' => 'departmentName',
            'label' => 'Department Name',
            'rules' => 'trim|required|max_length[255]|is_unique[ictmdepartment.departmentName]|xss_clean',
            'errors' => array(
                'is_unique' => 'Department Allready Existed !!',
            ),
        ),
        array(
            'field' => 'departmentHead',
            'label' => 'Department Head ',
            'rules' => 'trim|required|max_length[100]|xss_clean',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'departmentStatus',
            'label' => 'Department Status',
            'rules' => 'required|max_length[50]'
        ),
    ),
    /*---------------- for Edit Department-------------*/
    'editDepartment'=> array (

        array(
            'field' => 'departmentName',
            'label' => 'Department Name',
            'rules' => 'required|max_length[255]|callback_DepartmenteditUniqueCheck',
        ),
        array(
            'field' => 'departmentHead',
            'label' => 'Department Head ',
            'rules' => 'trim|required|max_length[100]|xss_clean',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'departmentStatus',
            'label' => 'Department Status',
            'rules' => 'required|max_length[50]'
        ),
    ),
    /*---------------- for Create Event-------------*/
    'createEvent'=> array (

        array(
            'field' => 'eventTitle',
            'label' => 'Event Ttle',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'eventStartDateTime',
            'label' => 'Event Start Time ',
            'rules' => 'trim|required',

        ),
        array(
            'field' => 'eventEndDateTime',
            'label' => 'Event End Time ',
            'rules' => 'trim|required|callback_check_EventDate',

        ),
        array(
            'field' => 'eventLocation',
            'label' => 'Event Location',
            'rules' => 'required|max_length[1000]',
        ),
        array(
            'field' => 'EventType',
            'label' => 'Event Type',
            'rules' => 'required|max_length[100]',
        ),

        array(
            'field' => 'event_image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'eventStatus',
            'label' => 'Event Status',
            'rules' => 'required|max_length[50]'
        ),

    ),

    /*---------------- for Edit Event-------------*/
    'editEvent'=> array (

        array(
            'field' => 'eventTitle',
            'label' => 'Event Ttle',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'eventStartDateTime',
            'label' => 'Event Start Time ',
            'rules' => 'trim|required',

        ),
        array(
            'field' => 'eventEndDateTime',
            'label' => 'Event End Time ',
            'rules' => 'trim|required|callback_check_EventDate',

        ),
        array(
            'field' => 'eventLocation',
            'label' => 'Event Location',
            'rules' => 'required|max_length[1000]',
        ),
        array(
            'field' => 'EventType',
            'label' => 'Event Type',
            'rules' => 'required|max_length[100]',
        ),
        array(
            'field' => 'event_image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'eventStatus',
            'label' => 'Event Status',
            'rules' => 'required|max_length[50]'
        ),

    ),

    /*---------------- for CollegeInfo-------------*/
    'CollegeInfo'=> array (

        array(
            'field' => 'college_name',
            'label' => 'College Name',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'college_location',
            'label' => 'College Address ',
            'rules' => 'required|max_length[1000]',

        ),
        array(
            'field' => 'college_tel1',
            'label' => 'College Telephone 1',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]',

        ),
        array(
            'field' => 'college_tel2',
            'label' => 'College Telephone 2',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[45]',

        ),
        array(
            'field' => 'college_fax',
            'label' => 'College Fax',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'college_email',
            'label' => 'College Email',
            'rules' => 'required|valid_email|max_length[100]',
        ),

        array(
            'field' => 'college_domain',
            'label' => 'College Domain',
            'rules' => 'required|max_length[255]'
        ),
        array(
            'field' => 'college_facebook',
            'label' => 'College Facebook',
            'rules' => 'required|max_length[1000]'
        ),
        array(
            'field' => 'college_twitter',
            'label' => 'College Twitter',
            'rules' => 'required|max_length[1000]'
        ),
        array(
            'field' => 'college_linkedin',
            'label' => 'College LinkedIn',
            'rules' => 'required|max_length[1000]',
        ),
        array(
            'field' => 'college_google',
            'label' => 'College Google',
            'rules' => 'required|max_length[1000]',
        ),

        array(
            'field' => 'college_youtube',
            'label' => 'College Youtube',
            'rules' => 'required|max_length[1000]'
        ),
        array(
            'field' => 'college_status',
            'label' => 'College Status',
            'rules' => 'required|max_length[50]'
        ),

    ),

    /*---------------- for Create News-------------*/

    'createNews'=> array (
        array(
            'field' => 'newsTitle',
            'label' => 'News Title ',
            'rules' => 'required|max_length[255]|is_unique[ictmnews.newsTitle]',
            'errors' => array(
                'is_unique' => 'News Allready Existed !!',
            ),
        ),
        array(
            'field' => 'newsDate',
            'label' => 'News Date',
            'rules' => 'required',

        ),
        array(
            'field' => 'news_image',
            'label' => 'News image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'newsType',
            'label' => 'News Type ',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'newsStatus',
            'label' => 'News Status',
            'rules' => 'required|max_length[50]'
        ),
    ),

    'editNews'=> array (

        array(
            'field' => 'newsTitle',
            'label' => 'News Title ',
            'rules' => 'required|max_length[255]|callback_NewseditUniqueCheck',
        ),
        array(
            'field' => 'newsDate',
            'label' => 'News Date',
            'rules' => 'required',

        ),
        array(
            'field' => 'news_image',
            'label' => 'News image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'newsType',
            'label' => 'News Type ',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'newsStatus',
            'label' => 'News Status',
            'rules' => 'required|max_length[50]'
        ),
    ),

    'createPhoto'=> array (

        array(
            'field' => 'albumId',
            'label' => 'Album',
            'rules' => 'required|max_length[11]|regex_match[/^[0-9]*$/]',
        ),
        array(
            'field' => 'photoImage[]',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'photoStatus[]',
            'label' => 'Image',
            'rules' => 'max_length[50]'
        ),
    ),

    'editPhoto'=> array (

        array(
            'field' => 'albumId',
            'label' => 'Album',
            'rules' => 'required|max_length[11]|regex_match[/^[0-9]*$/]',
        ),
        array(
            'field' => 'photoImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check_fromEdit'
        ),
        array(
            'field' => 'photoStatus',
            'label' => 'Image',
            'rules' => 'max_length[50]'
        ),
    ),


    'createAlbum'=> array (

        array(
            'field' => 'albumCategory',
            'label' => 'Album Category',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'albumTitle',
            'label' => 'Album Title',
            'rules' => 'required|max_length[255]|is_unique[ictmalbum.albumTitle]',
            'errors' => array(
                'is_unique' => 'Already have an album of this Name!! Please Write a Different Album Title',
            ),
        ),
        array(
            'field' => 'albumStatus',
            'label' => 'Album Status',
            'rules' => 'required|max_length[50]'
        ),

    ),

    'editAlbum'=> array (

        array(
            'field' => 'albumCategory',
            'label' => 'Album Category',
            'rules' => 'required|max_length[255]',
        ),
        array(
            'field' => 'albumTitle',
            'label' => 'Album Title',
            'rules' => 'required|max_length[255]|callback_AlbumeditUniqueCheck',
        ),
        array(
            'field' => 'albumStatus',
            'label' => 'Album Status',
            'rules' => 'required|max_length[50]'
        ),

    ),

    'createFeedback'=> array (

        array(
            'field' => 'feedbackByName',
            'label' => 'feedback By Name',
            'rules' => 'required|max_length[100]',
        ),
        array(
            'field' => 'feedbackByImage',
            'label' => 'feedback By Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'feedbackByProfession',
            'label' => 'feedback By Profession',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'feedbackStatus',
            'label' => 'feedback Status',
            'rules' => 'required|max_length[50]'
        ),
    ),

    'editFeedback'=> array (

        array(
            'field' => 'feedbackByName',
            'label' => 'feedback By Name',
            'rules' => 'required|max_length[100]',
        ),
        array(
            'field' => 'feedbackByImage',
            'label' => 'feedback By Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'feedbackByProfession',
            'label' => 'feedback By Profession',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'feedbackStatus',
            'label' => 'feedback Status',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'feedbackSource',
            'label' => 'feedback Source',
            'rules' => 'required|max_length[100]'
        ),
        array(
            'field' => 'feedbackApprove',
            'label' => 'feedback Approve',
            'rules' => 'required|max_length[20]'
        ),
    ),
);
