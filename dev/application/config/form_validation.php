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
			 
);
