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
			 
);
