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
		        'rules' => 'required|max_length[255]|valid_email|xss_clean|htmlspecialchars',

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

/*Alumni*/

    'alumnis' =>
        array (
            array(
                'field' => 'firstName',
                'label' => 'First Name',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|max_length[255]|valid_email|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'mobileNo',
                'label' => 'Mobile',
                'rules' => 'max_length[45]|xss_clean|htmlspecialchars',

            ),
        ),

/*end*/
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
                'field' => 'address',
                'label' => 'Address Line 1',
                'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'address2',
                'label' => 'Address Line 2',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'address3',
                'label' => 'Address Line 3',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'city',
                'label' => 'City/Town',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'state',
                'label' => 'County/State',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

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
                'label' => 'Address Line 1',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'address2',
                'label' => 'Address Line 2',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'address3',
                'label' => 'Address Line 3',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'city',
                'label' => 'City/Town',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'state',
                'label' => 'County/State',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

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
            'field' => 'dobyear',
            'label' => 'Year',
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
            'label' => 'Current Address Line 1',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddress2',
            'label' => 'Current Address Line 1',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddress3',
            'label' => 'Current Address Line 1',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddressCity',
            'label' => 'Current City/Town',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'currentAddressState',
            'label' => 'Current County/State',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
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
            'field' => 'permanentAddress',
            'label' => 'Permanent Address Line 1',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddress2',
            'label' => 'Permanent Address Line 2',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddress2',
            'label' => 'Permanent Address Line 3',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddressCity',
            'label' => 'Permanent City/Town',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddressState',
            'label' => 'Permanent County/State',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars'
        ),
        array(
            'field' => 'permanentAddressCountry',
            'label' => 'Permanent Country',
            'rules' => 'max_length[255]|xss_clean|htmlspecialchars'
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
            'label' => 'Address Line 1',
            'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactAddress2',
            'label' => 'Address Line 2',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactAddress3',
            'label' => 'Address Line 3',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactCity',
            'label' => 'City/Town',
            'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

        ),
        array(
            'field' => 'EmergencyContactState',
            'label' => 'Country/State:',
            'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

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
                'rules' => 'max_length[60]|xss_clean|htmlspecialchars',

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
                'label' => 'Address Line 1',
                'rules' => 'required|max_length[1000]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'address2',
                'label' => 'Address Line 2',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'address3',
                'label' => 'Address Line 3',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'city',
                'label' => 'City/Town',
                'rules' => 'required|max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'state',
                'label' => 'County/State',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),

            array(
                'field' => 'telephone',
                'label' => 'Telephone',
                'rules' => 'required|max_length[50]|xss_clean|htmlspecialchars',
            ),


        ),
    'applyfromPersonexperience'=>
        array(

            array(
                'field' => 'organisation',
                'label' => 'Organisation',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            ),
            array(
                'field' => 'positionHeld',
                'label' => 'Position Held',
                'rules' => 'max_length[100]|xss_clean|htmlspecialchars',

            )



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
                'label' => 'Completion Year',
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


);
