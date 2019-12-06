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
            'rules' => 'required|max_length[100]|callback_menuTitleCheck|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'parentId',
            'label' => 'Parent Menu',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'pageId',
            'label' => 'Page',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'orderNumber',
            'label' => 'Order Number',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|callback_menuOrderCheckFormNewMenu|htmlspecialchars'
        ),
        array(
            'field' => 'menuStatus',
            'label' => 'Menu Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
        ),
    /*---------------- for menu edit-------------*/
    'editMenu'=> array (

        array(
            'field' => 'menuTitle',
            'label' => 'Menu Name',
            'rules' => 'required|max_length[100]|callback_menuTitleCheckFormEditMenu|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'parentId',
            'label' => 'Parent Menu',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'orderNumber',
            'label' => 'Order Number',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|callback_menuOrderCheckFormeditMenu|htmlspecialchars'
        ),
        array(
            'field' => 'pageId',
            'label' => 'Page',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'menuStatus',
            'label' => 'Menu Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),
    /*---------------- for Page create-------------*/
    'createPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required|max_length[255]|is_unique[ictmpage.pageTitle]|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'Page Title Allready Existed !!',
            ),
        ),
        array(
            'field' => 'keywords',
            'label' => 'Page Keywords',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'metadata',
            'label' => 'Page MetaData',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'pagetype',
            'label' => 'Page Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),
    /*---------------- for Page edit-------------*/
    'editPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required|max_length[255]|callback_pageCheckFormEditPage|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'keywords',
            'label' => 'Page Keywords',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'metadata',
            'label' => 'Page MetaData',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'pagetype',
            'label' => 'Page Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),
    /*---------------- for pageSection create-------------*/
    'createPageSection'=> array (
        array(
            'field' => 'pageId',
            'label' => 'Page Title',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'textbox[]',
            'label' => 'Section Title',
            'rules' => 'trim|required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'ordernumber[]',
            'label' => 'Order Number',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|callback_PageSectionOrderNumberFromInsert|htmlspecialchars'
        ),

        array(
            'field' => 'status[]',
            'label' => 'Page Section Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),
    /*---------------- for pageSection edit-------------*/
    'editPageSection'=> array (
        array(
            'field' => 'textbox',
            'label' => 'Title',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'ordernumber',
            'label' => 'Order Number',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|callback_PageSectionOrderNumber|htmlspecialchars'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Section Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),
    /*---------------- for faculty create-------------*/
    'createFaculty'=> array (
        array(
            'field' => 'facultyFirstName',
            'label' => 'First Name',
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'facultyLastName',
            'label' => 'Last Name',
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyDegree',
            'label' => 'Faculty Degree',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'facultyPosition',
            'label' => 'faculty Position',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'facultyEmpType',
            'label' => 'Employee Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyEmail',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'facultyPhone',
            'label' => 'Phone',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyTwitter',
            'label' => 'Twitter',
            'rules' => 'trim|prep_url|valid_url|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyLinkedin',
            'label' => 'LinkedIn',
            'rules' => 'trim|prep_url|valid_url|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyStatus',
            'label' => 'Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyCourses[]',
            'label' => 'Faculty Course',
            'rules' => 'is_natural_no_zero|xss_clean|htmlspecialchars'
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
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'faculty_last_name',
            'label' => 'Last Name',
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'faculty_degree',
            'label' => 'Faculty Degree',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'faculty_position',
            'label' => 'faculty Position',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'facultyImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'faculty_emp_type',
            'label' => 'Employee Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'faculty_email',
            'label' => 'Email',
            'rules' => 'required|valid_email|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'faculty_phone',
            'label' => 'Phone',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'faculty_twitter',
            'label' => 'Twitter',
            'rules' => 'trim|prep_url|valid_url|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'faculty_linkedin',
            'label' => 'LinkedIn',
            'rules' => 'trim|prep_url|valid_url|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'faculty_status',
            'label' => 'Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
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
            'rules' => 'required|max_length[255]|is_unique[ictmcourse.courseTitle]|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'Course Allready Existed !!',
            ),
        ),
        array(
            'field' => 'codeperson',
            'label' => 'Course Code Pearson',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'award',
            'label' => 'Awarding Titlle',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'Code',
            'label' => 'Course Code',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'location',
            'label' => 'Course Location',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'awardingBody',
            'label' => 'Awarding Body',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'credit',
            'label' => 'Credit value',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'structure',
            'label' => 'Course Structure',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'accreditation',
            'label' => 'Accreditation',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'accreditationNo',
            'label' => 'Accreditation No',
            'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'duration',
            'label' => 'Course Duration',
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'year',
            'label' => 'Academic Year',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'mode',
            'label' => 'Study Mode',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'language',
            'label' => 'Study Language',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'fees',
            'label' => 'Course Fees',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'timetables',
            'label' => 'Course Time Table',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'status',
            'label' => 'Course Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'department',
            'label' => 'Department',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars'
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
            'rules' => 'required|max_length[255]|callback_CourseCheckFormEditCourse|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'codeperson',
            'label' => 'Course Code Pearson',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'award',
            'label' => 'Awarding Titlle',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'code',
            'label' => 'Course Code',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'location',
            'label' => 'Course Location',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'awardingBody',
            'label' => 'Awarding Body',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'credit',
            'label' => 'Credit value',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'structure',
            'label' => 'Course Structure',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'accreditation',
            'label' => 'Accreditation',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'accreditationNo',
            'label' => 'Accreditation No',
            'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'duration',
            'label' => 'Course Duration',
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'year',
            'label' => 'Academic Year',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'mode',
            'label' => 'Study Mode',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'language',
            'label' => 'Study Language',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'fees',
            'label' => 'Course Fees',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'timetables',
            'label' => 'Course Time Table',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'status',
            'label' => 'Course Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'department',
            'label' => 'Department',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[11]|xss_clean|htmlspecialchars'
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
            'rules' => 'required|max_length[11]|regex_match[/^[0-9]*$/]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'textbox[]',
            'label' => 'Course Section Title',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'ordernumber[]',
            'label' => 'Order Number ',
            'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'status[]',
            'label' => 'Course Section Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    /*---------------- for CourseSection edit-------------*/
    'editCourseSection'=> array (

        array(
            'field' => 'textbox',
            'label' => 'Section Title',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'status',
            'label' => 'Course Section Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'ordernumber',
            'label' => 'Order Number ',
            'rules' => 'required|max_length[11]|xss_clean|callback_CourseSectionOrderNumber|htmlspecialchars',
        ),
    ),

    /*---------------- for Create Department-------------*/
    'createDepartment'=> array (
        array(
            'field' => 'departmentName',
            'label' => 'Department Name',
            'rules' => 'trim|required|max_length[255]|is_unique[ictmdepartment.departmentName]|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'Department Allready Existed !!',
            ),
        ),
        array(
            'field' => 'departmentHead',
            'label' => 'Department Head ',
            'rules' => 'trim|required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'departmentStatus',
            'label' => 'Department Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']'
        ),
    ),
    /*---------------- for Edit Department-------------*/
    'editDepartment'=> array (

        array(
            'field' => 'departmentName',
            'label' => 'Department Name',
            'rules' => 'required|max_length[255]|callback_DepartmenteditUniqueCheck|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'departmentHead',
            'label' => 'Department Head ',
            'rules' => 'trim|required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'departmentStatus',
            'label' => 'Department Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),
    /*---------------- for Create Event-------------*/
    'createEvent'=> array (

        array(
            'field' => 'eventTitle',
            'label' => 'Event Ttle',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'eventStartDateTime',
            'label' => 'Event Start Time ',
            'rules' => 'trim|required|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'eventEndDateTime',
            'label' => 'Event End Time ',
            'rules' => 'trim|required|callback_check_EventDate|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'eventLocation',
            'label' => 'Event Location',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'EventType',
            'label' => 'Event Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),

        array(
            'field' => 'event_image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'eventStatus',
            'label' => 'Event Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),

    ),

    /*---------------- for Edit Event-------------*/
    'editEvent'=> array (

        array(
            'field' => 'eventTitle',
            'label' => 'Event Ttle',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'eventStartDateTime',
            'label' => 'Event Start Time ',
            'rules' => 'trim|required|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'eventEndDateTime',
            'label' => 'Event End Time ',
            'rules' => 'trim|required|callback_check_EventDate|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'eventLocation',
            'label' => 'Event Location',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'EventType',
            'label' => 'Event Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'event_image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'eventStatus',
            'label' => 'Event Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),

    ),

    /*---------------- for CollegeInfo-------------*/
    'CollegeInfo'=> array (

        array(
            'field' => 'college_name',
            'label' => 'College Name',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'college_location',
            'label' => 'College Address ',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'college_tel1',
            'label' => 'College Telephone 1',
            'rules' => 'required|regex_match[/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/]|max_length[20]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'college_tel2',
            'label' => 'College Telephone 2',
            'rules' => 'regex_match[/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/]|max_length[20]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'college_fax',
            'label' => 'College Fax',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'college_email',
            'label' => 'College Email',
            'rules' => 'required|valid_email|max_length[100]|xss_clean|htmlspecialchars',
        ),

        array(
            'field' => 'college_domain',
            'label' => 'College Domain',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'college_facebook',
            'label' => 'College Facebook',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'college_twitter',
            'label' => 'College Twitter',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'college_linkedin',
            'label' => 'College LinkedIn',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'college_google',
            'label' => 'College Google',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',
        ),

        array(
            'field' => 'college_youtube',
            'label' => 'College Youtube',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'college_status',
            'label' => 'College Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),

    ),

    /*---------------- for Create News-------------*/

    'createNews'=> array (
        array(
            'field' => 'newsTitle',
            'label' => 'News Title ',
            'rules' => 'required|max_length[255]|is_unique[ictmnews.newsTitle]|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'News Allready Existed !!',
            ),
        ),
        array(
            'field' => 'newsDate',
            'label' => 'News Date',
            'rules' => 'trim|required|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'news_image',
            'label' => 'News image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'newsType',
            'label' => 'News Type ',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'newsStatus',
            'label' => 'News Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'editNews'=> array (

        array(
            'field' => 'newsTitle',
            'label' => 'News Title ',
            'rules' => 'required|max_length[255]|callback_NewseditUniqueCheck|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'newsDate',
            'label' => 'News Date',
            'rules' => 'trim|required|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'news_image',
            'label' => 'News image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'newsType',
            'label' => 'News Type ',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'newsStatus',
            'label' => 'News Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'createPhoto'=> array (

        array(
            'field' => 'albumId',
            'label' => 'Album',
            'rules' => 'required|max_length[11]|regex_match[/^[0-9]*$/]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'photoImage[]',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'photoStatus[]',
            'label' => 'Image',
            'rules' => 'max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'editPhoto'=> array (

        array(
            'field' => 'albumId',
            'label' => 'Album',
            'rules' => 'required|max_length[11]|regex_match[/^[0-9]*$/]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'photoImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check_fromEdit'
        ),
        array(
            'field' => 'photoStatus',
            'label' => 'Status',
            'rules' => 'max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),


    'createAlbum'=> array (

        array(
            'field' => 'albumCategory',
            'label' => 'Album Category',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'albumDetails',
            'label' => 'Album Details',
            'rules' => 'required|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'albumTitle',
            'label' => 'Album Title',
            'rules' => 'required|max_length[255]|is_unique[ictmalbum.albumTitle]|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'Already have an album of this Name!! Please Write a Different Album Title',
            ),
        ),
        array(
            'field' => 'albumStatus',
            'label' => 'Album Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),

    ),

    'editAlbum'=> array (

        array(
            'field' => 'albumCategory',
            'label' => 'Album Category',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'albumTitle',
            'label' => 'Album Title',
            'rules' => 'required|max_length[255]|callback_AlbumeditUniqueCheck|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'albumDetails',
            'label' => 'Album Details',
            'rules' => 'required|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'albumStatus',
            'label' => 'Album Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),

    ),

    'createFeedback'=> array (

        array(
            'field' => 'feedbackByName',
            'label' => 'feedback By Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'feedbackByImage',
            'label' => 'feedback By Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'feedbackByEmail',
            'label' => 'Email',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'feedbackByMobile',
            'label' => 'Mobile',
            'rules' => 'max_length[45]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'feedbackByProfession',
            'label' => 'feedback By Profession',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'feedbackStatus',
            'label' => 'feedback Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'editFeedback'=> array (

        array(
            'field' => 'feedbackByName',
            'label' => 'feedback By Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'feedbackByImage',
            'label' => 'feedback By Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'feedbackByProfession',
            'label' => 'feedback By Profession',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'feedbackByEmail',
            'label' => 'Email',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'feedbackByMobile',
            'label' => 'Mobile',
            'rules' => 'max_length[45]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'feedbackStatus',
            'label' => 'feedback Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'feedbackSource',
            'label' => 'feedback Source',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'feedbackApprove',
            'label' => 'feedback Approve',
            'rules' => 'required|max_length[20]|in_list['.SELECT_APPROVE[0].','.SELECT_APPROVE[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'createAffiliation'=> array (

        array(
            'field' => 'affiliationTitle',
            'label' => 'Affiliation Title',
            'rules' => 'required|max_length[100]|is_unique[ictmaffiliations.affiliationsTitle]|xss_clean|htmlspecialchars',
            'errors'=> array(
                'is_unique' => 'affiliationsTitle Allready Existed !! Please Write a Different Affiliation Title',
            ),
        ),
        array(
            'field' => 'affiliationImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'affiliationStatus',
            'label' => 'Affiliation Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'editAffiliation'=> array (

        array(
            'field' => 'affiliationTitle',
            'label' => 'Affiliation Title',
            'rules' => 'required|max_length[100]|callback_AffiliationTitleUniqueCheck|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'affiliationImage',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'affiliationStatus',
            'label' => 'Affiliation Status',
            'rules' => 'required|max_length[50]|in_list['.STATUS[0].','.STATUS[1].']|xss_clean|htmlspecialchars'
        ),
    ),

    'BottomBanner'=> array (

        array(
            'field' => 'title',
            'label' => 'Banner Title',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'image',
            'label' => 'Image',
            'rules' => 'callback_val_img_check'
        ),
        array(
            'field' => 'subTitle',
            'label' => 'Banner Sub Title',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
    ),

    'SqureBox'=> array (

        array(
            'field' => 'title1',
            'label' => 'SqureBox Title',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title2',
            'label' => 'SqureBox Title 2',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title3',
            'label' => 'SqureBox Title 3',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title4',
            'label' => 'SqureBox Title 4',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title5',
            'label' => 'SqureBox Title 5',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title6',
            'label' => 'SqureBox Title 6',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title7',
            'label' => 'SqureBox Title 7',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title8',
            'label' => 'SqureBox Title 8',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link1',
            'label' => 'Link 1',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link2',
            'label' => 'Link 2',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link3',
            'label' => 'Link 3',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link4',
            'label' => 'Link 4',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link5',
            'label' => 'Link 5',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link6',
            'label' => 'Link 6',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link7',
            'label' => 'Link 7',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link8',
            'label' => 'Link 8',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'image[]',
            'label' => 'Image',
            'rules' => 'callback_val_img_checkSqureBox'
        ),
    ),

    'MiddleBanner'=> array (

        array(
            'field' => 'title1',
            'label' => 'Middle Banner Title 1',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link1',
            'label' => 'Middle Banner Link 1',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text1',
            'label' => 'Middle Banner Text 1',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title2',
            'label' => 'Middle Banner Title 2',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link2',
            'label' => 'Middle Banner Link 2',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text2',
            'label' => 'Middle Banner Text 2',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title3',
            'label' => 'Middle Banner Title 3',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link3',
            'label' => 'Middle Banner Link 3',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text3',
            'label' => 'Middle Banner Text 3',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
    ),

    'VerticalBar'=> array (

        array(
            'field' => 'title1',
            'label' => 'VerTical Bar Title 1',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link1',
            'label' => 'VerTical Bar Link 1',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text1',
            'label' => 'VerTical Bar Text 1',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title2',
            'label' => 'VerTical Bar Title 2',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link2',
            'label' => 'VerTical Bar Link 2',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text2',
            'label' => 'VerTical Bar Text 2',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title3',
            'label' => 'VerTical Bar Title 3',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link3',
            'label' => 'VerTical Bar Link 3',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text3',
            'label' => 'VerTical Bar Text 3',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'title4',
            'label' => 'VerTical Bar Title 4',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'link4',
            'label' => 'VerTical Bar Link 4',
            'rules' => 'required|max_length[500]|valid_url|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text4',
            'label' => 'VerTical Bar Text 4',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'image[]',
            'label' => 'VerTical Bar Image',
            'rules' => 'callback_val_img_checkSqureBox'
        ),
    ),

    'Slider'=> array (

        array(
            'field' => 'text1',
            'label' => 'Slider Text 1',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text2',
            'label' => 'Slider Text 2',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'text3',
            'label' => 'Slider Text 3',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'image[]',
            'label' => 'Image',
            'rules' => 'callback_val_img_checkSqureBox'
        ),
    ),

    'resetPassword'=> array (

        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'pass',
            'label' => 'Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'conPass',
            'label' => 'ConFirm Password',
            'rules' => 'trim|required|matches[pass]'
        ),

    ),

    /* student Application form*/

    'applyfrom4'=>
        array(

            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[12]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'relation',
                'label' => 'Relation ',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'AddressPO',
                'label' => 'Post Code',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'country',
                'label' => 'country',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'mobile',
                'label' => 'Moble number',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|max_length[50]|valid_email|xss_clean|htmlspecialchars',

            ),

        ),



    'applyfrom3'=>
        array(

            array(
                'field' => 'firstLanguage',
                'label' => 'Is English your first language?',
                'rules' => 'required|max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'listening',
                'label' => 'Lstening',
                'rules' => 'max_length[3]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'reading',
                'label' => 'Reading',
                'rules' => 'max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'writing',
                'label' => 'Writing ',
                'rules' => 'max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'speaking',
                'label' => 'Speaking',
                'rules' => 'max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'overall',
                'label' => 'Overall',
                'rules' => 'max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'expirydate',
                'label' => 'Expiry Date',
                'rules' => 'max_length[50]|xss_clean|htmlspecialchars',

            ),

        ),

    'applyfromfinance'=>
        array(

            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[12]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'relation',
                'label' => 'Relation ',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'mobile',
                'label' => 'Moble number',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|max_length[50]|valid_email|xss_clean|htmlspecialchars',

            ),


            array(
                'field' => 'telephone',
                'label' => 'Telephone',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',
            ),
            array(
                'field' => 'AddressPO',
                'label' => 'Address P.O.',
                'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars',
            ),



        ),





    'checkApplicationForm1' => array (
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|max_length[12]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'firstName',
            'label' => 'First Name',
            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'surName',
            'label' => 'Sur Name',
            'rules' => 'max_length[50]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'dob',
            'label' => 'Date Of Birth',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'gender',
            'label' => 'Sex',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'genderChange',
            'label' => 'Any Sex Change',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'placeOfBirth',
            'label' => 'Place of Birth',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'nationality',
            'label' => 'Nationality',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddress',
            'label' => 'Current Address',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddressPO',
            'label' => 'Post Code',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddressCountry',
            'label' => 'Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[50]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'required|max_length[50]|valid_email|xss_clean|htmlspecialchars'
        ),
        array(
            'label' => 'Permanet Address',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddressCountry',
            'label' => 'Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'overseasAddressPO',
            'label' => 'Post Code',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'EmergencyContactTitle',
            'label' => 'Title',
            'rules' => 'required|max_length[12]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactName',
            'label' => 'Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),

        array(
            'field' => 'EmergencyContactRelation',
            'label' => 'Relation',
            'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactAddress',
            'label' => 'Address',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

        ),

        array(
            'field' => 'EmergencyContactAddressPO',
            'label' => 'Post Code',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'emergencyContactCountry',
            'label' => 'Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'EmergencyContactMobile',
            'label' => 'Mobile',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactEmail',
            'label' => 'Email',
            'rules' => 'required|max_length[45]|valid_email|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'courseName',
            'label' => 'Course Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'courseSession',
            'label' => 'Course Session',
            'rules' => 'required|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'courseYear',
            'label' => 'Year',
            'rules' => 'required|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'methodeOfStudy',
            'label' => 'Method Of Study',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'timeOfStudy',
            'label' => 'Time of study',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),

    ),


    'applyfromPersonalStatement'=>
        array(


            array(
                'field' => 'courseChoiceStatement',
                'label' => 'Course Choice Statement',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'collegeChoiceStatement',
                'label' => 'College Choice Statement',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),
        ),

    'applyfromRefrees'=>
        array(

            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[12]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'company',
                'label' => 'Institution/Company ',
                'rules' => 'required|max_length[80]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'jobTitle',
                'label' => 'Position / Job Title',
                'rules' => 'required|max_length[60]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'telephone',
                'label' => 'Telephone/Mobile',
                'rules' => 'required|max_length[20]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|max_length[100]|valid_email|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'telephone',
                'label' => 'Telephone',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',
            ),
            array(
                'field' => 'addressPo',
                'label' => 'Address P.O.',
                'rules' => 'required|max_length[8]|xss_clean|htmlspecialchars',
            ),



        ),
    'applyfromPersonexperience'=>
        array(

            array(
                'field' => 'organisation',
                'label' => 'Organisation',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'positionHeld',
                'label' => 'Position Held',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'startdate',
                'label' => 'Start Date',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'enddate',
                'label' => 'End Date',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),



        ),
    'applyfromQualification'=>
        array(

            array(
                'field' => 'qualification',
                'label' => 'Qualification',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'qualificationLevel',
                'label' => 'Qualification Level',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'awardingBody',
                'label' => 'Awarding Body',
                'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'institution',
                'label' => 'Name of Institution',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'completionYear',
                'label' => 'CompletionYear',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'grade',
                'label' => 'Grade',
                'rules' => 'required|max_length[20]|xss_clean|htmlspecialchars',

            ),



        ),



    'applyfrom10'=>
        array(


            array(
                'field' => 'Organisation / Regulatory Body',
                'label' => 'Organisation',
                'rules' => 'xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'positionHeld',
                'label' => 'Position Held',
                'rules' => 'xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'From',
                'label' => 'Start Date',
                'rules' => 'xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'To',
                'label' => 'enddate',
                'rules' => 'xss_clean|htmlspecialchars',

            ),







        ),

    /* student Application form end*/
    /*Alumni*/

    'alumnis' =>
        array (
            array(
                'field' => 'firstName',
                'label' => 'First Name',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'max_length[255]|valid_email|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'mobileNo',
                'label' => 'Mobile',
                'rules' => 'max_length[45]|xss_clean|htmlspecialchars',

            ),
        ),

    'createUser'=> array (

        array(
            'field' => 'firstName',
            'label' => 'First Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'surName',
            'label' => 'Sure Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'userEmail',
            'label' => 'Email',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars|is_unique[ictmusers.userEmail]',

        ),
        array(
            'field' => 'userPassword',
            'label' => 'Password',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),

    ),

    'editUser'=> array (

        array(
            'field' => 'firstName',
            'label' => 'First Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'surName',
            'label' => 'Sure Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'userEmail',
            'label' => 'Email',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),

    ),

    'createRole'=> array (

        array(
            'field' => 'userId[]',
            'label' => 'User',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars',
        ),

    ),

    /*end*/
);
