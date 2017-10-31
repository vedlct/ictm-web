<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$config = array (

	'feedbacks' =>
        array (
		    array(
		        'field' => 'name',
		        'label' => 'Name',
		        'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

		     ),
		    array(
		        'field' => 'profession',
		        'label' => 'Profession',
		        'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
		     ),
            array(
                'field' => 'details',
                'label' => 'Details',
                'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
            ),
            array(
                'field' => 'image',
                'label' => 'Image',
                'rules' => 'callback_val_img_check'
            ),
		),



);
