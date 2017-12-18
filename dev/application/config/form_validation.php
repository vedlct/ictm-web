<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$config = array (


	'RegisterInterest' => array (
        array(
            'field' => 'fname',
            'label' => 'First Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
		array(
		        'field' => 'sname',
		        'label' => 'Surname',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
		array(
		        'field' => 'house',
		        'label' => 'House Name/Numbe',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'street',
            'label' => 'Street',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'Post Code',
            'label' => 'postcode',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[10]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'city',
            'label' => 'Town/City',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'country',
            'label' => 'Country',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'phone',
            'label' => 'Phone Number',
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[10]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'required|max_length[100]|valid_email|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'course',
            'label' => 'Course',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'hear',
            'label' => 'How did you hear about us*',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'other',
            'label' => 'Other',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'disability',
            'label' => 'Disability requirement',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'appoinment',
            'label' => 'Book appointment/open day',
            'rules' => 'trim|required|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'comments',
            'label' => 'Comments',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),

    ),
    /*---------------- for Page create-------------*/

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


    'studentRegistation'=>
    array(

        array(
            'field' => 'type',
            'label' => 'Type',
            'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'firstname',
            'label' => 'First Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'surname',
            'label' => 'User name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'required|max_length[100]|is_unique[studentregistration.email]|valid_email|xss_clean|htmlspecialchars',
            'errors' => array(
                'is_unique' => 'Email Allready Existed ! ',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),

        array(
            'field' => 'confirmpassword',
            'label' => 'Confirm password',
            'rules' => 'required|matches[password]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required|max_length[50]|in_list[male,female,other]|xss_clean|htmlspecialchars'
        ),


  ),

    'applyfrom4'=>
        array(

            array(
                'field' => 'type',
                'label' => 'Type',
                'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required|max_length[11]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'relation',
                'label' => 'Relation ',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'address',
                'label' => 'Password',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'email',
                'label' => 'Email Address',
                'rules' => 'required|max_length[100]|is_unique[studentregistration.email]|valid_email|xss_clean|htmlspecialchars',
                'errors' => array(
                    'is_unique' => 'Email Allready Existed ! ',
                ),
            ),


            array(
                'field' => 'mobile',
                'label' => 'Moble number',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'telephone',
                'label' => 'Telephone',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
            ),
            array(
                'field' => 'fax',
                'label' => 'Fax',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',
            ),


        ),

);
