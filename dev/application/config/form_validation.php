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
            'rules' => 'required',

        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'menuId',
            'label' => 'New/Sub Menu',
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

    'editMenu'=> array (
        array(
            'field' => 'menuTitle',
            'label' => 'Menu Name',
            'rules' => 'required',

        ),
        array(
            'field' => 'menuType',
            'label' => 'Menu Type',
            'rules' => 'required'
        ),
        array(
            'field' => 'menuId',
            'label' => 'New/Sub Menu',
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
            'rules' => 'required',

        ),
//        array(
//            'field' => 'keywords',
//            'label' => 'Page Keywords',
//            'rules' => 'required'
//        ),
//        array(
//            'field' => 'metadata',
//            'label' => 'Page MetaData',
//            'rules' => 'required',
//
//        ),
//        array(
//            'field' => 'content',
//            'label' => 'Page Content',
//            'rules' => ''
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
            'rules' => 'required'
        ),
    ),
    'editPage'=> array (
        array(
            'field' => 'title',
            'label' => 'Page Title',
            'rules' => 'required',

        ),
//        array(
//            'field' => 'keywords',
//            'label' => 'Page Keywords',
//            'rules' => 'required'
//        ),
//        array(
//            'field' => 'metadata',
//            'label' => 'Page MetaData',
//            'rules' => 'required',
//
//        ),
        array(
            'field' => 'content',
            'label' => 'Page Content',
            'rules' => 'encode_php_tags'
        ),
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
            'rules' => 'required'
        ),
    ),
    'createPageSection'=> array (
        array(
            'field' => 'pagetitle',
            'label' => 'Page Title',
            'rules' => 'required',

        ),
        array(
            'field' => 'textbox[]',
            'label' => 'Section Title',
            'rules' => 'required'
        ),

        array(
            'field' => 'text[]',
            'label' => 'Page Section Content',
            'rules' => 'encode_php_tags'
        ),
        array(
            'field' => 'status[]',
            'label' => 'Page Section Status',
            'rules' => 'required'
        ),
    ),
    'editPageSection'=> array (
        array(
            'field' => 'textbox',
            'label' => 'Section Title',
            'rules' => 'required',

        ),
        array(
            'field' => 'text',
            'label' => 'Section Content',
            'rules' => 'encode_php_tags'
        ),
        array(
            'field' => 'status',
            'label' => 'Page Section Status',
            'rules' => 'required'
        ),
    ),
			 
);
