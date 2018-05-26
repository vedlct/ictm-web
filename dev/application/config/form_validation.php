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
            'rules' => 'regex_match[/^[0-9]*$/]|max_length[20]|xss_clean|htmlspecialchars'
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
//            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'disability',
            'label' => 'Disability requirement',
//            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'appoinment',
            'label' => 'Book appointment/open day',
            'rules' => 'trim|required|xss_clean|htmlspecialchars',
        ),
        array(
            'field' => 'comments',
            'label' => 'Comments',
//            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
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
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars',

		     ),
            array(
		        'field' => 'mobile',
		        'label' => 'Mobile',
		        'rules' => 'max_length[45]|xss_clean|htmlspecialchars',

		     ),
		    array(
		        'field' => 'profession',
		        'label' => 'Profession',
		        'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
		     ),
            array(
                'field' => 'details',
                'label' => 'Details',
                'rules' => 'required|xss_clean|htmlspecialchars'
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

        ),



    'applyfrom3'=>
        array(

            array(
                'field' => 'listening',
                'label' => 'Lstening',
                'rules' => 'required|max_length[3]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'reading',
                'label' => 'Reading',
                'rules' => 'required|max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'Relation',
                'label' => 'relation ',
                'rules' => 'required|max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'writing',
                'label' => 'Writing',
                'rules' => 'required|max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'Overall',
                'label' => 'overall',
                'rules' => 'required|max_length[3]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'expirydate',
                'label' => 'Expiry Date',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',

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
//        array(
//            'field' => 'otherName',
//            'label' => 'Other Name',
//            'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',
//        ),
        array(
            'field' => 'dob',
            'label' => 'Date Of Birth',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'gender',
            'label' => 'Gender',
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
            'field' => 'passportNo',
            'label' => 'PassportNumber',
            'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'passportExpiryDate',
            'label' => 'Passport Expiry Date ',
            'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'UkEntryDate',
            'label' => 'Uk Entry Date',
            'rules' => 'required|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'VisaType',
            'label' => 'Visa Type',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'visaExpiryDate',
            'label' => 'visa Expiry Date',
            'rules' => 'required|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'visaExpiryDate',
            'label' => 'visa Expiry Date',
            'rules' => 'required|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'currentAddress',
            'label' => 'Current Address',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddressCountry',
            'label' => 'Current Address Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddressPO',
            'label' => 'Current Address Post Office',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'overseasHomeAddress',
            'label' => 'overseas Home Address',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddressCountry',
            'label' => 'Permanent Address Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'overseasAddressPO',
            'label' => 'OverSeas Address Post Office',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'telephone',
            'label' => 'Telephone',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[50]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'mobile',
            'label' => 'Mobile',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[50]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'fax',
            'label' => 'Fax',
            'rules' => 'required|max_length[255]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'email',
            'label' => 'Email Address',
            'rules' => 'required|max_length[50]|valid_email|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'EmergencyContactTitle',
            'label' => 'Emergency Contact Title',
            'rules' => 'required|max_length[12]|xss_clean|htmlspecialchars',

        ),

        array(
            'field' => 'EmergencyContactName',
            'label' => 'Emergency Contact Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),

        array(
            'field' => 'EmergencyContactRelation',
            'label' => 'Emergency Contact Relation',
            'rules' => 'required|max_length[45]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactAddress',
            'label' => 'Emergency Contact Address',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

        ),

        array(
            'field' => 'EmergencyContactAddressPO',
            'label' => 'Emergency Contact Address Post Office',
            'rules' => 'required|max_length[15]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'emergencyContactCountry',
            'label' => 'Emergency Contact Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'EmergencyContactMobile',
            'label' => 'Emergency Contact Mobile',
            'rules' => 'required|regex_match[/^[0-9]*$/]|max_length[45]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactEmail',
            'label' => 'Emergency Contact Email',
            'rules' => 'required|max_length[45]|valid_email|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'courseName',
            'label' => 'course Name',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),

        array(
            'field' => 'awardingBody',
            'label' => 'Awarding Body',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),

//        array(
//            'field' => 'courseLevel',
//            'label' => 'courseLevel',
//            'rules' => 'required|max_length[20]|xss_clean|htmlspecialchars'
//        ),

//        array(
//            'field' => 'courseStartDate',
//            'label' => 'course Start Date',
//            'rules' => 'required|xss_clean|htmlspecialchars'
//        ),
//
//        array(
//            'field' => 'courseEndDate',
//            'label' => 'course End Date',
//            'rules' => 'required|xss_clean|htmlspecialchars'
//        ),

//        array(
//            'field' => 'courseEndDate',
//            'label' => 'course End Date',
//            'rules' => 'required|xss_clean|htmlspecialchars'
//        ),

        array(
            'field' => 'methodeOfStudy',
            'label' => 'Method Of Study',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),



     ),


    'applyfrom5'=>
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



    'applyfrom10'=>
        array(


            array(
                'field' => 'organisation',
                'label' => 'Organisation',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'positionHeld',
                'label' => 'Position Held',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'startdate',
                'label' => 'Start Date',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'enddate',
                'label' => 'enddate',
                'rules' => 'required|xss_clean|htmlspecialchars',

            ),







        ),


);
