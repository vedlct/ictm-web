<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentApplication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin/StudentApplicationm');

    }

    public function index()
    {


    }

    /*---------for Manage StudentApplication -----------------------*/

    public function manageApplication() // for manage Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {

            $this->load->view('Admin/manageStudentApplication');

        }
        else{
            redirect('Admin/Login');
        }
    }

    /*---------datatable code --------------------- */
    public function ajax_list()
    {
        $list = $this->StudentApplicationm->get_datatables();
        $data = array();
//        $no = $_POST['start'];
        foreach ($list as $application) {
//            $no++;
            $row = array();
//            $row[] = $no;
            $row[] = $application->studentApplicationFormId;
            $row[] = $application->title.' '.$application->firstName.' '.$application->surName;
            $row[] = $application->email;
            $row[] = $application->mobileNo;
            $row[] = $application->courseTitle;


            if ($application->applydate==""){
                $row[] = '';
            }else{
                $row[] = preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($application->applydate)),1);
            }




            $html = '<a class="btn" target="_blank" href="'. base_url().'Admin/StudentApplication/viewApplication/'.$application->applicationId.'"><i class="icon_pencil-edit"></i></a>
                                                    
                                                    <a class="btn" target="_blank" href="'. base_url().'Admin/StudentApplication/showApplicationPdf/'.$application->applicationId.'"><i class="fa fa-file-pdf-o"></i></a>
                                                    <a class="btn" target="_blank" href="'. base_url().'Admin/StudentApplication/exportCSV/'.$application->applicationId.'"><i class="fa fa-file-excel-o"></i></a>
                                                    <a class="btn" target="_blank" href="'. base_url().'Admin/StudentApplication/createXMLfile/'.$application->applicationId.'"><i class="fa fa-file-excel-o"></i></a>';


            $row[] = $html;

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->StudentApplicationm->count_all(),
            "recordsFiltered" => $this->StudentApplicationm->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    public function showApplicationPdf($applicationId) // for selected Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $this->load->library('pdfgenerator');
//            $data='';
//
//            $html = $this->load->view('Admin/testPdf', $data, true);
//            $filename = 'testPdf';
//            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

            //$applicationId = $this->input->post();
            /*     $applicationId = 4;

                 $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
                 $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
                 $this->data['emmergencyContact'] = $this->StudentApplicationm->emmergancyContact($applicationId);
                 $this->data['courseDetails'] = $this->StudentApplicationm->courseDetails($applicationId);
                 $this->data['qualifications'] = $this->StudentApplicationm->qualifications($applicationId);
                 $this->data['experience'] = $this->StudentApplicationm->workExperience($applicationId);
     //            $this->data['languageProficiency'] = $this->StudentApplicationm->languageProficiency($applicationId);
                 $this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore();
                 $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);
                 $this->data['finance'] = $this->StudentApplicationm->finance($applicationId);
                 $this->data['referees'] = $this->StudentApplicationm->referees($applicationId);
                 //$this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);

                 //$this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore($applicationId);
                 $html=$this->load->view('Admin/detailsForms', $this->data,true);

                 $filename = 'testPdf';
                 $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');*/


            $this->data['applicationDetails'] = $this->StudentApplicationm->applicationDetails($applicationId);

            $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
            $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
            $this->data['emmergencyContact'] = $this->StudentApplicationm->emmergancyContact($applicationId);
            $this->data['courseDetails'] = $this->StudentApplicationm->courseDetails($applicationId);
            $this->data['qualifications'] = $this->StudentApplicationm->qualifications($applicationId);
            $this->data['experience'] = $this->StudentApplicationm->workExperience($applicationId);
            $this->data['languageProficiency'] = $this->StudentApplicationm->languageProficiency($applicationId);
            $this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore();
            $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);
            $this->data['finance'] = $this->StudentApplicationm->finance($applicationId);
            $this->data['referees'] = $this->StudentApplicationm->referees($applicationId);
            $this->data['equaloppurtunitiesgroup'] = $this->StudentApplicationm->equalOppurtunitiesGroup();
            $this->data['equaloppurtunitiesgroupsubgroup'] = $this->StudentApplicationm->equalOppurtunitiesSubGroup();
            $this->data['personequaloppurtunities'] = $this->StudentApplicationm->personequalOppurtunities($applicationId);

            $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);

            $html=$this->load->view('Admin/detailsForms', $this->data,true);

            $filename = 'ApplicationFormPDF';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

        }

        else{
            redirect('Admin/Login');
        }
    }

    //////////////////CSV//////////////////

    public function exportCSV($applicationId)
    {
        // get data
        //$myData['ab'] = $this->StudentApplicationm->personalDetails($applicationId);
        // $myData2 = $this->StudentApplicationm->contactDetails($applicationId);
        $myData= $this->StudentApplicationm->allDetails($applicationId);
//        $myData1= $this->StudentApplicationm->equalOppurtunitiesGroup();
//        print_r($myData);
//        exit();
        $Ethnicity = $this->StudentApplicationm->equalopportunity($applicationId);
        foreach ($Ethnicity as $ethci){
         $ethnicity = $ethci->subGroupTitle;
        }

        $disability = $this->StudentApplicationm->disability($applicationId);
        foreach ($disability as $ethci){
            $disability = $ethci->subGroupTitle;
        }

        $religionbelief = $this->StudentApplicationm->religionbelief($applicationId);
        foreach ($religionbelief as $ethci){
            $religionbelief = $ethci->subGroupTitle;
        }

        $orientation = $this->StudentApplicationm->orientation($applicationId);
        foreach ($orientation as $ethci){
            $orientation = $ethci->subGroupTitle;
        }

        // file name
        $filename = 'applicationForm_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");


        // file creation
        $file = fopen('php://output', 'w');


        $header = array("Title", "First Name", "Surname","Date of Birth","Sex", "Any Sex Change", "Place of Birth", "Nationality", "Passport No", "PP Expiry Date", "UK Entry Date", "Visa Expiry Date", "Visa Type", "Address Line 1","Address Line 2","Address Line 3","City/Town","County/State","Post Code", "Country", "Telephone", "Mobile", "E-mail", "Fax", "Permanent Address Line 1","Permanent Address Line 2","Permanent Address Line 3", "Post Code", "Courntry", "FirstLanguageEnglish", "Applydate", "EmergencyContactName", "EmergencyContactTitle", "EmergencyContactRelation", "Emergency Address Line 1","Emergency Address Line 2","Emergency Address Line 3","City/Town","Country/State", "Post Code", "Country", "Emergency Mobile/Telephone", "Emergency Contact Email", "Course Name", "Course Session", "Year", "ULN No", "UCAS Course Code", "Course Level", "Course Start Date", "Course End Date", "Mode of study", "Time of study", "Qualification Name", "Institution", "Qualification Level", "Subject", "Completion Year", "Start Date", "End Date", "Grade", "Organisation", "Position Held", "Start Date", "End Date", "Course Choice Statement", "College Choice Statement", "Source Of Finance", "Name", "Title", "Relation", "Address Line 1", "Address Line 2", "Address Line 3", "City/Town", "County/State", "Post Code", "Country", "Mobile", "Telephone", "E-mail", "Fax", "Referees Name", "Title", "Institution/Company", "Position / Job Title", "Address Line 1", "Address Line 2", "Address Line 3", "City/Town", "County/State", "Post Code", "Country", "Contact No", "E-mail","Disability", "Ethnicity", "Religion Belief","Sexual Orientation");
        fputcsv($file, $header);

//            print_r($newarray);
//            exit();

        foreach ($myData as $line){
            fputcsv($file,array($line->title,$line->firstName,$line->surName,$line->dateOfBirth,$line->gender,$line->ganderChange,$line->placeOfBirth,$line->nationality,$line->passportNo,$line->passportExpiryDate,$line->ukEntryDate,$line->visaExpiryDate,$line->visaType,$line->currentAddress,$line->currentAddress2,$line->currentAddress3,$line->currentAddressCity,$line->currentAddressState,$line->currentAddressPo,$line->currentAddressCountry,$line->telephoneNo,$line->mobileNo,$line->email,$line->fax,$line->permanentAddress,$line->permanentAddress2,$line->permanentAddress3,$line->overseasAddressPo,$line->permanentAddressCountry,$line->firstLanguageEnglish,$line->applydate,$line->emergencyContactName,$line->emergencyContactTitle,$line->emergencyContactRelation,$line->emergencyContactAddress,$line->emergencyContactAddress2,$line->emergencyContactAddress3,$line->emergencyContactAddressCity,$line->emergencyContactAddressState,$line->emergencyContactAddressPo,$line->emergencyContactCountry,$line->emergencyContactMobile,$line->emergencyContactEmail,$line->courseName,$line->courseSession,$line->courseYear,$line->ulnNo,$line->ucasCourseCode,$line->courseLevel,$line->courseStartDate,$line->courseEndDate,$line->methodOfStudy,$line->timeOfStudy,$line->qualification,$line->institution,$line->qualificationLevel,$line->subject,$line->completionYear,$line->startDate,$line->endDate,$line->obtainResult,$line->organization,$line->positionHeld,$line->startDate,$line->endDate,$line->courseChoiceStatement,$line->collegeChoiceStatement,$line->sourceOfFinance,$line->name,$line->title,$line->relation,$line->address,$line->address2,$line->address3,$line->city,$line->state,$line->addressPo,$line->country,$line->mobile,$line->telephone,$line->email,$line->fax,$line->name,$line->title,$line->workingCompany,$line->jobTitle,$line->address,$line->address2,$line->address3,$line->city,$line->state,$line->postCode,$line->fkCountry,$line->contactNo,$line->email,$ethnicity,$disability,$religionbelief,$orientation));
        }



        fclose($file);
        exit;
    }

    ///////////////////////xml////////////////////////
    function createXMLfile($applicationId){
        $myData= $this->StudentApplicationm->allDetails($applicationId);
        $Ethnicity = $this->StudentApplicationm->equalopportunity($applicationId);
        foreach ($Ethnicity as $ethci){
            $ethnicity = $ethci->subGroupTitle;
        }
        $disability = $this->StudentApplicationm->disability($applicationId);
        foreach ($disability as $ethci){
            $disability = $ethci->subGroupTitle;
        }

        $religionbelief = $this->StudentApplicationm->religionbelief($applicationId);
        foreach ($religionbelief as $ethci){
            $religionbelief = $ethci->subGroupTitle;
        }

        $orientation = $this->StudentApplicationm->orientation($applicationId);
        foreach ($orientation as $ethci){
            $orientation = $ethci->subGroupTitle;
        }
        $filePath = 'public/xml/book.xml';
//        $filePath ='/path/to/myfile.xml';
        $dom     = new DOMDocument('1.0', 'utf-8');
        $root      = $dom->createElement('ApplicationForm');
        for($i=0; $i<count($myData); $i++){
            $title = $myData[$i]->title;
            $firstName  = $myData[$i]->firstName;
            $surName = $myData[$i]->surName;
            $dateOfBirth  = $myData[$i]->dateOfBirth;
            $gender = $myData[$i]->gender;
            $ganderChange  = $myData[$i]->ganderChange;
            $placeOfBirth = $myData[$i]->placeOfBirth;
            $nationality  = $myData[$i]->nationality;
            $passportNo = $myData[$i]->passportNo;
            $passportExpiryDate  = $myData[$i]->passportExpiryDate;
            $ukEntryDate = $myData[$i]->ukEntryDate;
            $visaExpiryDate = $myData[$i]->visaExpiryDate;
            $visaType = $myData[$i]->visaType;
            $currentAddress  = $myData[$i]->currentAddress;
            $currentAddress2 = $myData[$i]->currentAddress2;
            $currentAddress3 = $myData[$i]->currentAddress3;
            $currentAddressCity = $myData[$i]->currentAddressCity;
            $currentAddressState  = $myData[$i]->currentAddressState;
            $currentAddressPo = $myData[$i]->currentAddressPo;
            $currentAddressCountry = $myData[$i]->currentAddressCountry;
            $telephoneNo = $myData[$i]->telephoneNo;
            $mobileNo  = $myData[$i]->mobileNo;
            $email = $myData[$i]->email;
            $fax = $myData[$i]->fax;
            $permanentAddress= $myData[$i]->permanentAddress;
            $permanentAddress2  = $myData[$i]->permanentAddress2;
            $permanentAddress3 = $myData[$i]->permanentAddress3;
            $overseasAddressPo = $myData[$i]->overseasAddressPo;
            $permanentAddressCountry= $myData[$i]->permanentAddressCountry;
            $firstLanguageEnglish = $myData[$i]->firstLanguageEnglish;
            $applydate = $myData[$i]->applydate;
            $emergencyContactName = $myData[$i]->emergencyContactName;
            $emergencyContactTitle= $myData[$i]->emergencyContactTitle;
            $emergencyContactRelation = $myData[$i]->emergencyContactRelation;
            $emergencyContactAddress = $myData[$i]->emergencyContactAddress;
            $emergencyContactAddress2 = $myData[$i]->emergencyContactAddress2;
            $emergencyContactAddress3= $myData[$i]->emergencyContactAddress3;
            $emergencyContactAddressCity = $myData[$i]->emergencyContactAddressCity;
            $emergencyContactAddressState = $myData[$i]->emergencyContactAddressState;
            $emergencyContactAddressPo = $myData[$i]->emergencyContactAddressPo;
            $emergencyContactCountry= $myData[$i]->emergencyContactCountry;
            $emergencyContactMobile = $myData[$i]->emergencyContactMobile;
            $emergencyContactEmail = $myData[$i]->emergencyContactEmail;
            $courseName = $myData[$i]->courseName;
            $courseSession= $myData[$i]->courseSession;
            $courseYear = $myData[$i]->courseYear;
            $ucasCourseCode = $myData[$i]->ucasCourseCode;
            $courseLevel = $myData[$i]->courseLevel;
            $courseStartDate= $myData[$i]->courseStartDate;
            $courseEndDate = $myData[$i]->courseEndDate;
            $methodOfStudy = $myData[$i]->methodOfStudy;
            $timeOfStudy = $myData[$i]->timeOfStudy;
            $qualification= $myData[$i]->qualification;
            $institution = $myData[$i]->institution;
            $qualificationLevel = $myData[$i]->qualificationLevel;
            $subject= $myData[$i]->subject;
            $completionYear= $myData[$i]->completionYear;
            $startDate = $myData[$i]->startDate;
            $endDate = $myData[$i]->endDate;
            $obtainResult= $myData[$i]->obtainResult;
            $organization= $myData[$i]->organization;
            $positionHeld = $myData[$i]->positionHeld;
            $startDate1 = $myData[$i]->startDate;
            $endDate1= $myData[$i]->endDate;
            $courseChoiceStatement= $myData[$i]->courseChoiceStatement;
            $collegeChoiceStatement= $myData[$i]->collegeChoiceStatement;
            $sourceOfFinance= $myData[$i]->sourceOfFinance;
            $name= $myData[$i]->name;
            $title11= $myData[$i]->title;
            $relation= $myData[$i]->relation;
            $address= $myData[$i]->address;
            $address2= $myData[$i]->address2;
            $address3= $myData[$i]->address3;
            $city= $myData[$i]->city;
            $state= $myData[$i]->state;
            $addressPo= $myData[$i]->addressPo;
            $country= $myData[$i]->country;
            $mobile= $myData[$i]->mobile;
            $telephone= $myData[$i]->telephone;
            $email2= $myData[$i]->email;
            $fax12= $myData[$i]->fax;
            $name23= $myData[$i]->name;
            $title23= $myData[$i]->title;
            $workingCompany= $myData[$i]->workingCompany;
            $jobTitle= $myData[$i]->jobTitle;
            $address23= $myData[$i]->address;
            $address24= $myData[$i]->address2;
            $address34= $myData[$i]->address3;
            $city34= $myData[$i]->city;
            $state34= $myData[$i]->state;
            $postCode34= $myData[$i]->postCode;
            $fkCountry34= $myData[$i]->fkCountry;
            $contactNo34= $myData[$i]->contactNo;
            $email44= $myData[$i]->email;

            $book = $dom->createElement('ApplicationForm');
            $title1     = $dom->createElement('Title', $title);
            $book->appendChild($title1);

            $firstName1 = $dom->createElement('FirstName', $firstName);
            $book->appendChild($firstName1);

            $surName1     = $dom->createElement('Surname', $surName);
            $book->appendChild($surName1);

            $dateOfBirth1 = $dom->createElement('DateOfBirth', $dateOfBirth);
            $book->appendChild($dateOfBirth1);

            $gender1     = $dom->createElement('Gender', $gender);
            $book->appendChild( $gender1);

            $ganderChange1 = $dom->createElement('GenderChange', $ganderChange);
            $book->appendChild($ganderChange1);

            $placeOfBirth1 = $dom->createElement('PlaceOfBirth', $placeOfBirth);
            $book->appendChild($placeOfBirth1);

            $nationality1 = $dom->createElement('Nationality', $nationality);
            $book->appendChild($nationality1);

            $passportNo1     = $dom->createElement('PassportNo', $passportNo);
            $book->appendChild( $passportNo1);

            $passportExpiryDate1 = $dom->createElement('PPExpiryDate', $passportExpiryDate);
            $book->appendChild($passportExpiryDate1);

            $ukEntryDate1 = $dom->createElement('UKEntryDate', $ukEntryDate);
            $book->appendChild($ukEntryDate1);

            $visaExpiryDate1 = $dom->createElement('VisaExpiryDate', $visaExpiryDate);
            $book->appendChild($visaExpiryDate1);

            $visaType1     = $dom->createElement('VisaType', $visaType);
            $book->appendChild( $visaType1);

            $currentAddress1 = $dom->createElement('AddressLine1', $currentAddress);
            $book->appendChild($currentAddress1);

            $currentAddress21 = $dom->createElement('AddressLine2', $currentAddress2);
            $book->appendChild($currentAddress21);

            $currentAddress31 = $dom->createElement('AddressLine3', $currentAddress3);
            $book->appendChild($currentAddress31);

            $currentAddressCity1     = $dom->createElement('City_Town', $currentAddressCity);
            $book->appendChild( $currentAddressCity1);

            $currentAddressState1 = $dom->createElement('County_State', $currentAddressState);
            $book->appendChild($currentAddressState1);

            $currentAddressPo1 = $dom->createElement('PostCode', $currentAddressPo);
            $book->appendChild($currentAddressPo1);

            $currentAddressCountry1 = $dom->createElement('Country', $currentAddressCountry);
            $book->appendChild($currentAddressCountry1);

            $telephoneNo1     = $dom->createElement('Telephone', $telephoneNo);
            $book->appendChild( $telephoneNo1);

            $mobileNo1 = $dom->createElement('Mobile', $mobileNo);
            $book->appendChild($mobileNo1);

            $email1 = $dom->createElement('Email', $email);
            $book->appendChild($email1);

            $fax1 = $dom->createElement('Fax', $fax);
            $book->appendChild($fax1);

            $permanentAddress1  = $dom->createElement('Permanent_Address_Line1', $permanentAddress);
            $book->appendChild( $permanentAddress1);

            $permanentAddress21 = $dom->createElement('Permanent_Address_Line2', $permanentAddress2);
            $book->appendChild($permanentAddress21);

            $permanentAddress31 = $dom->createElement('Permanent_Address_Line3', $permanentAddress3);
            $book->appendChild($permanentAddress31);

            $overseasAddressPo1 = $dom->createElement('Post_Code', $overseasAddressPo);
            $book->appendChild($overseasAddressPo1);

            $permanentAddressCountry1  = $dom->createElement('Country', $permanentAddressCountry);
            $book->appendChild( $permanentAddressCountry1);

            $firstLanguageEnglish1 = $dom->createElement('FirstLanguageEnglish', $firstLanguageEnglish);
            $book->appendChild($firstLanguageEnglish1);

            $applydate1 = $dom->createElement('ApplyDate', $applydate);
            $book->appendChild($applydate1);

            $emergencyContactName1 = $dom->createElement('EmergencyContactName', $emergencyContactName);
            $book->appendChild($emergencyContactName1);

            $emergencyContactTitle1  = $dom->createElement('EmergencyContactTitle', $emergencyContactTitle);
            $book->appendChild( $emergencyContactTitle1);

            $emergencyContactRelation1 = $dom->createElement('EmergencyContactRelation', $emergencyContactRelation);
            $book->appendChild($emergencyContactRelation1);

            $emergencyContactAddress1 = $dom->createElement('Emergency_Address_Line1', $emergencyContactAddress);
            $book->appendChild($emergencyContactAddress1);

            $emergencyContactAddress21 = $dom->createElement('Emergency_Address_Line2', $emergencyContactAddress2);
            $book->appendChild($emergencyContactAddress21);

            $emergencyContactAddress31  = $dom->createElement('Emergency_Address_Line3', $emergencyContactAddress3);
            $book->appendChild( $emergencyContactAddress31);

            $emergencyContactAddressCity1 = $dom->createElement('City', $emergencyContactAddressCity);
            $book->appendChild($emergencyContactAddressCity1);

            $emergencyContactAddressState1 = $dom->createElement('State', $emergencyContactAddressState);
            $book->appendChild($emergencyContactAddressState1);

            $emergencyContactAddressPo1 = $dom->createElement('Post_code', $emergencyContactAddressPo);
            $book->appendChild($emergencyContactAddressPo1);

            $emergencyContactCountry1  = $dom->createElement('Country', $emergencyContactCountry);
            $book->appendChild( $emergencyContactCountry1);

            $emergencyContactMobile1 = $dom->createElement('Emergency_Mobile', $emergencyContactMobile);
            $book->appendChild($emergencyContactMobile1);

            $emergencyContactEmail1 = $dom->createElement('Emergency_Contact_Email', $emergencyContactEmail);
            $book->appendChild($emergencyContactEmail1);

            $courseName1 = $dom->createElement('CourseName', $courseName);
            $book->appendChild($courseName1);

            $courseSession1  = $dom->createElement('CourseSession', $courseSession);
            $book->appendChild( $courseSession1);

            $courseYear1 = $dom->createElement('Year', $courseYear);
            $book->appendChild($courseYear1);

            $ucasCourseCode1 = $dom->createElement('ULN_No', $ucasCourseCode);
            $book->appendChild($ucasCourseCode1);

            $courseLevel1 = $dom->createElement('UCAS_Course_Code', $courseLevel);
            $book->appendChild($courseLevel1);

            $courseStartDate1  = $dom->createElement('Course_Start_Date', $courseStartDate);
            $book->appendChild( $courseStartDate1);

            $courseEndDate1 = $dom->createElement('Course_End_Date', $courseEndDate);
            $book->appendChild($courseEndDate1);

            $methodOfStudy1 = $dom->createElement('Mode_of_study', $methodOfStudy);
            $book->appendChild($methodOfStudy1);

            $timeOfStudy1 = $dom->createElement('Time_of_study', $timeOfStudy);
            $book->appendChild($timeOfStudy1);

            $qualification1  = $dom->createElement('Qualification_Name', $qualification);
            $book->appendChild( $qualification1);

            $institution1 = $dom->createElement('Institution', $institution);
            $book->appendChild($institution1);

            $qualificationLevel1 = $dom->createElement('Qualification_Level', $qualificationLevel);
            $book->appendChild($qualificationLevel1);

            $subject1 = $dom->createElement('Subject', $subject);
            $book->appendChild($subject1);

            $completionYear1 = $dom->createElement('Completion_Year', $completionYear);
            $book->appendChild($completionYear1);
            $startDate13 = $dom->createElement('Start_Date', $startDate);
            $book->appendChild($startDate13);
            $endDate13 = $dom->createElement('End_Date', $endDate);
            $book->appendChild($endDate13);
            $obtainResult1 = $dom->createElement('Grade', $obtainResult);
            $book->appendChild($obtainResult1);
            $organization1 = $dom->createElement('Organisation', $organization);
            $book->appendChild($organization1);
            $positionHeld1 = $dom->createElement('Position_Held', $positionHeld);
            $book->appendChild($positionHeld1);
            $startDate11 = $dom->createElement('StartDate', $startDate1);
            $book->appendChild($startDate11);
            $endDate11 = $dom->createElement('EndDate', $endDate1);
            $book->appendChild($endDate11);
            $courseChoiceStatement1 = $dom->createElement('Course_Choice_Statement', $courseChoiceStatement);
            $book->appendChild($courseChoiceStatement1);
            $collegeChoiceStatement1 = $dom->createElement('College_Choice_Statement', $collegeChoiceStatement);
            $book->appendChild($collegeChoiceStatement1);
            $sourceOfFinance1 = $dom->createElement('Source_Of_Finance', $sourceOfFinance);
            $book->appendChild($sourceOfFinance1);
            $name1 = $dom->createElement('Name', $name);
            $book->appendChild($name1);
            $title111 = $dom->createElement('Title', $title11);
            $book->appendChild($title111);
            $relation1 = $dom->createElement('Relation', $relation);
            $book->appendChild($relation1);
            $address1 = $dom->createElement('Address_Line1', $address);
            $book->appendChild($address1);
            $address21 = $dom->createElement('Address_Line_2', $address2);
            $book->appendChild($address21);
            $address31 = $dom->createElement('Address_Line3',  $address3);
            $book->appendChild($address31);
            $city1 = $dom->createElement('CityOrTown',  $city);
            $book->appendChild($city1);
            $state1 = $dom->createElement('CountyOrState', $state);
            $book->appendChild($state1);
            $addressPo1 = $dom->createElement('PostCode', $addressPo);
            $book->appendChild($addressPo1);
            $country1 = $dom->createElement('Country', $country);
            $book->appendChild($country1);
            $mobile1 = $dom->createElement('Mobile', $mobile);
            $book->appendChild($mobile1);
            $telephone1 = $dom->createElement('Telephone', $telephone);
            $book->appendChild($telephone1);
            $email21 = $dom->createElement('Email', $email2);
            $book->appendChild($email21);
            $fax121 = $dom->createElement('Email', $fax12);
            $book->appendChild($fax121);
            $name231 = $dom->createElement('RefereesName', $name23);
            $book->appendChild($name231);
            $title231 = $dom->createElement('Title',  $title23);
            $book->appendChild($title231);
            $workingCompany1 = $dom->createElement('Institution',  $workingCompany);
            $book->appendChild($workingCompany1);
            $jobTitle1 = $dom->createElement('Position', $jobTitle);
            $book->appendChild($jobTitle1);
            $address231 = $dom->createElement('Address_Line1', $address23);
            $book->appendChild($address231);
            $address241 = $dom->createElement('Address_Line2', $address24);
            $book->appendChild($address241);
            $address341 = $dom->createElement('Address_Line3', $address34);
            $book->appendChild($address341);
            $city341 = $dom->createElement('City', $city34);
            $book->appendChild($city341);
            $state341 = $dom->createElement('State', $state34);
            $book->appendChild($state341);
            $postCode341 = $dom->createElement('Post_Code', $postCode34);
            $book->appendChild($postCode341);
            $fkCountry341 = $dom->createElement('Country', $fkCountry34);
            $book->appendChild($fkCountry341);
            $contactNo341 = $dom->createElement('Contact_No', $contactNo34);
            $book->appendChild($contactNo341);
            $email441 = $dom->createElement('Email', $email44);
            $book->appendChild($email441);
            $ethnicity1 = $dom->createElement('Disability', $ethnicity);
            $book->appendChild($ethnicity1);
            $disability1 = $dom->createElement('Ethnicity', $disability);
            $book->appendChild($disability1);
            $religionbelief1 = $dom->createElement('Religion_Belief', $religionbelief);
            $book->appendChild($religionbelief1);

            $orientation1 = $dom->createElement('Sexual_Orientation', $orientation);
            $book->appendChild($orientation1);

            $root->appendChild($book);
        }
        $dom->appendChild($root);
        $dom->save($filePath);

    }

    //////end///////

//////////////////CSV//////////////////

//    public function exportData($applicationId)
//    {
//
//        $data   = [];
//        $this->db->select('title,firstName,surName,otherNames,dateOfBirth,ganderChange,gender,placeOfBirth,nationality,passportNo,passportExpiryDate,ukEntryDate,visaExpiryDate,visaType');
//        $this->db->where('applicationId =', $applicationId);
//        $query  =	$this->db->get('candidateinfo');
//        $result	=	$query->result_array();
////        $this->load->helper('download');
//
////        $list = $result;
////        $fp = fopen('php://output', 'w');
////        foreach ($list as $fields) {
////            fputcsv($fp, $fields);
////        }
////
////        $fp = file_get_contents('php://output');
////        $name = 'data.csv';
////
////        // Build the headers to push out the file properly.
////        header('Pragma: public');     // required
////        header('Expires: 0');         // no cache
////        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
////        header('Cache-Control: private',false);
////        header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
////        header('Content-Transfer-Encoding: binary');
////        header('Connection: close');
////        exit();
////
////        force_download($name, $data);
////        fclose($fp);
//        if(isset($result)){
//
//            $data['export']	=	$result;
//        }
//        if(isset($_POST['import']))
//        {
//            $query  =	$this->db->get('candidateinfo');
//            if($query->num_rows() > 0){
//
//                $path ="";
////                $filename = 'mydata_'.date('Ymd').'.csv';
//                header("Content-Description: File Transfer");
//                header("Content-Disposition: attachment; filename=$path");
//                header("Content-Type: application/csv; ");
//                $this->load->dbutil();
//                $delimiter = ",";
//                $newline = "\r\n";
//                $data = $this->dbutil->csv_from_result($query, $delimiter,
//                    $newline);
//                $this->load->helper('download');
//                force_download('CSV_Report.csv', $data);
//
//            }
//        }
//        $this->load->view('Admin/csvForms',$data);
//    }


    ///////////////////////////////sakib//////////////////

    public function ApplicationDetails()
    {

        //$applicationId = $this->input->post();
        $applicationId = 4;

        $this->data['applicationDetails'] = $this->StudentApplicationm->applicationDetails($applicationId);
        $this->data['personalDetails'] = $this->StudentApplicationm->personalDetails($applicationId);
        $this->data['contactDetails'] = $this->StudentApplicationm->contactDetails($applicationId);
        $this->data['emmergencyContact'] = $this->StudentApplicationm->emmergancyContact($applicationId);
        $this->data['courseDetails'] = $this->StudentApplicationm->courseDetails($applicationId);
        $this->data['qualifications'] = $this->StudentApplicationm->qualifications($applicationId);
        $this->data['experience'] = $this->StudentApplicationm->workExperience($applicationId);
        $this->data['languageProficiency'] = $this->StudentApplicationm->languageProficiency($applicationId);
        $this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore();
        $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);
        $this->data['finance'] = $this->StudentApplicationm->finance($applicationId);
        $this->data['referees'] = $this->StudentApplicationm->referees($applicationId);
        $this->data['equaloppurtunitiesgroup'] = $this->StudentApplicationm->equalOppurtunitiesGroup();
        $this->data['equaloppurtunitiesgroupsubgroup'] = $this->StudentApplicationm->equalOppurtunitiesSubGroup();
        $this->data['personequaloppurtunities'] = $this->StudentApplicationm->personequalOppurtunities($applicationId);

        $this->data['personalstatement'] = $this->StudentApplicationm->personalStatement($applicationId);

        //  print_r($this->data['applicationDetails']);

        //$this->data['languageProficiencyTestScore'] = $this->StudentApplicationm->languageProficiencyTestScore($applicationId);
        $this->load->view('Admin/detailsForms', $this->data);
    }
    /////////////////////////////////////////////////////

    /* for edit application */

    public function viewApplication($applicationId) // for selected Application view
    {
        if ($this->session->userdata('type') == USER_TYPE[0])
        {
            $dataSession = [
                'studentApplicationId' => $applicationId,
            ];

            $this->session->set_userdata($dataSession);

            $studentApplicationId=$applicationId;
            $this->data['courseInfo'] = $this->StudentApplicationm->getCourseInfo();
            $this->data['candidateInfos'] = $this->StudentApplicationm->getCandidateInfo($studentApplicationId);

            $this->load->view('StudentApplicationForms/application-formv', $this->data);


        }

        else{
            redirect('Admin/Login');
        }
    }

    public function getCourseAwardBody() // get Award body of selected course
    {

        $courseId=$this->input->post('courseId');
        $this->data['courseAwardBody']=$this->StudentApplicationm->getCourseAwardBody($courseId);
        foreach ($this->data['courseAwardBody'] as $awardBody){

            $body=$awardBody->awardingBody;
        }

        echo $body;

    }

    public function editApplicationForm1(){


        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('checkApplicationForm1')) {


                $this->data['courseInfo']=$this->StudentApplicationm->getCourseInfo();

                $this->data['candidateInfos'] = $this->StudentApplicationm->getCandidateInfo($this->session->userdata('studentApplicationId'));
                $this->load->view('StudentApplicationForms/application-formv', $this->data);
            }
            else {

                $candidateTitle = $this->input->post("title");
                $candidateFirstName = $this->input->post("firstName");
                $candidateSurName = $this->input->post("surName");
//                $candidateOtherNamee = $this->input->post("otherName");
                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
                $candidateGender = $this->input->post("gender");
                $candidateGenderChanged = $this->input->post("genderChange");
                $candidatePlaceOfBirth = $this->input->post("placeOfBirth");
                $candidateNationality = $this->input->post("nationality");
                $candidatePassportNo = $this->input->post("passportNo");
                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
                $candidateVisaType = $this->input->post("VisaType");
                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
                $candidateCurrentAddress = $this->input->post("currentAddress");
                $candidateCurrentAddress2 = $this->input->post("currentAddress2");
                $candidateCurrentAddress3 = $this->input->post("currentAddress3");
                $candidateCurrentAddressCity = $this->input->post("currentAddressCity");
                $candidateCurrentAddressState = $this->input->post("currentAddressState");
                $candidateCurrentAddressPO = $this->input->post("currentAddressPO");
//                $candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
                $candidatePermanentAddress = $this->input->post("permanentAddress");
                $candidatePermanentAddress2 = $this->input->post("permanentAddress2");
                $candidatePermanentAddress3 = $this->input->post("permanentAddress3");
                $candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
                $candidatePermanentAddressState = $this->input->post("permanentAddressState");
                $candidateOverseasHomeAddressPO = $this->input->post("overseasAddressPO");
                $candidateTelephone = $this->input->post("telephone");
                $candidateMobile = $this->input->post("mobile");
                $candidateEmail = $this->input->post("email");
                $candidateFax = $this->input->post("fax");
                $EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
                $EmergencyContactName = $this->input->post("EmergencyContactName");
                $EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
                $EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
                $EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
                $EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
                $EmergencyContactCity = $this->input->post("EmergencyContactCity");
                $EmergencyContactState = $this->input->post("EmergencyContactState");
                $EmergencyContactAddressPO = $this->input->post("EmergencyContactAddressPO");
                $EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
                $EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
                $courseName = $this->input->post("courseName");
                $awardingBody = $this->input->post("awardingBody");
                $courseLevel = $this->input->post("courseLevel");
//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");
                $methodeOfStudy = $this->input->post("methodeOfStudy");

                $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
                $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
                $EmergencyContactCountry = $this->input->post("emergencyContactCountry");

                $courseSession = $this->input->post("courseSession");
                $courseYear = $this->input->post("courseYear");
                $timeOfStudy = $this->input->post("timeOfStudy");
                $ulnNo = $this->input->post("ulnNo");
                $ucasCourseCode = $this->input->post("ucasCourseCode");


//                $aplicationFormid=$this->session->userdata('id').date("YmdHis");
//
//                $data3=array(
//                    'studentOrAgentId'=>$this->session->userdata('id'),
//                    'studentApplicationFormId'=>$aplicationFormid
//                );
//                $studentApplicationId = $this->ApplyOnlinem->insertStudentApplicationForm($data3);
//                $dataSession = [
//                    'studentApplicationId' => $studentApplicationId,
//                ];
//                $this->session->set_userdata($dataSession);

                $data=array(
                    //'applicationId'=>$this->session->userdata('studentApplicationId'),
                    'title'=>$candidateTitle,
                    'firstName'=>$candidateFirstName,
                    'surName'=>$candidateSurName,
//                    'otherNames'=>$candidateOtherNamee,
                    'dateOfBirth'=>$candidateDob,
                    'gender'=>$candidateGender,
                    'ganderChange'=>$candidateGenderChanged,
                    'placeOfBirth'=>$candidatePlaceOfBirth,
                    'nationality'=>$candidateNationality,
                    'passportNo'=>$candidatePassportNo,
                    'passportExpiryDate'=>$candidatePassportExpiryDate,
                    'ukEntryDate'=>$candidateUkEntryDate,
                    'visaType'=>$candidateVisaType,
                    'visaExpiryDate'=>$candidateVisaExpiryDate,
                    'currentAddress'=>$candidateCurrentAddress,
                    'currentAddress2' => $candidateCurrentAddress2,
                    'currentAddress3' => $candidateCurrentAddress3,
                    'currentAddressCity' => $candidateCurrentAddressCity,
                    'currentAddressState' => $candidateCurrentAddressState,
                    'currentAddressPo'=>$candidateCurrentAddressPO,
//                    'overseasAddress'=>$candidateOverseasHomeAddress,
                    'permanentAddress' => $candidatePermanentAddress,
                    'permanentAddress2' => $candidatePermanentAddress2,
                    'permanentAddress3' => $candidatePermanentAddress3,
                    'permanentAddressCity' => $candidatePermanentAddressCity,
                    'permanentAddressState' => $candidatePermanentAddressState,
                    'overseasAddressPo'=>$candidateOverseasHomeAddressPO,
                    'telephoneNo'=>$candidateTelephone,
                    'mobileNo'=>$candidateMobile,
                    'email'=>$candidateEmail,
                    'fax'=>$candidateFax,
                    'emergencyContactName'=>$EmergencyContactName,
                    'emergencyContactTitle'=>$EmergencyContactTitle,
                    'emergencyContactRelation'=>$EmergencyContactRelation,
                    'emergencyContactAddress'=>$EmergencyContactAddress,
                    'emergencyContactAddress2' => $EmergencyContactAddress2,
                    'emergencyContactAddress3' => $EmergencyContactAddress3,
                    'emergencyContactAddressCity' => $EmergencyContactCity,
                    'emergencyContactAddressState' => $EmergencyContactState,
                    'emergencyContactAddressPo'=>$EmergencyContactAddressPO,
                    'emergencyContactMobile'=>$EmergencyContactMobile,
                    'emergencyContactEmail'=>$EmergencyContactEmail,

                    'currentAddressCountry'=>$candidateCurrentAddressCountry,
                    'permanentAddressCountry'=>$candidatePermanentAddressCountry,
                    'emergencyContactCountry'=>$EmergencyContactCountry,
                );
                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
//                    'courseStartDate'=>$courseStartDate,
//                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,

                    'courseSession'=>$courseSession,
                    'courseYear'=>$courseYear,
                    'timeOfStudy'=>$timeOfStudy,
                    'ulnNo'=>$ulnNo,
                    'ucasCourseCode'=>$ucasCourseCode,

                );

                $this->data['error']=$this->StudentApplicationm->editApplyForm1($data,$data1);



                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                }

            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editApplicationForm1AndNext(){

        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('checkApplicationForm1')) {

                $this->data['courseInfo']=$this->StudentApplicationm->getCourseInfo();

                $this->data['candidateInfos'] = $this->StudentApplicationm->getCandidateInfo($this->session->userdata('studentApplicationId'));
                $this->load->view('StudentApplicationForms/application-formv', $this->data);
            }
            else {

                $candidateTitle = $this->input->post("title");
                $candidateFirstName = $this->input->post("firstName");
                $candidateSurName = $this->input->post("surName");
//                $candidateOtherNamee = $this->input->post("otherName");
                $candidateDob = date('Y-m-d',strtotime($this->input->post("dob")));
                $candidateGender = $this->input->post("gender");
                $candidateGenderChanged = $this->input->post("genderChange");
                $candidatePlaceOfBirth = $this->input->post("placeOfBirth");
                $candidateNationality = $this->input->post("nationality");
                $candidatePassportNo = $this->input->post("passportNo");
                $candidatePassportExpiryDate = date('Y-m-d',strtotime($this->input->post("passportExpiryDate")));
                $candidateUkEntryDate = date('Y-m-d',strtotime($this->input->post("UkEntryDate")));
                $candidateVisaType = $this->input->post("VisaType");
                $candidateVisaExpiryDate = date('Y-m-d',strtotime($this->input->post("visaExpiryDate")));
                $candidateCurrentAddress = $this->input->post("currentAddress");
                $candidateCurrentAddress2 = $this->input->post("currentAddress2");
                $candidateCurrentAddress3 = $this->input->post("currentAddress3");
                $candidateCurrentAddressCity = $this->input->post("currentAddressCity");
                $candidateCurrentAddressState = $this->input->post("currentAddressState");
                $candidateCurrentAddressPO = $this->input->post("currentAddressPO");
//                $candidateOverseasHomeAddress = $this->input->post("overseasHomeAddress");
                $candidatePermanentAddress = $this->input->post("permanentAddress");
                $candidatePermanentAddress2 = $this->input->post("permanentAddress2");
                $candidatePermanentAddress3 = $this->input->post("permanentAddress3");
                $candidatePermanentAddressCity = $this->input->post("permanentAddressCity");
                $candidatePermanentAddressState = $this->input->post("permanentAddressState");
                $candidateOverseasHomeAddressPO = $this->input->post("overseasAddressPO");
                $candidateTelephone = $this->input->post("telephone");
                $candidateMobile = $this->input->post("mobile");
                $candidateEmail = $this->input->post("email");
                $candidateFax = $this->input->post("fax");
                $EmergencyContactTitle = $this->input->post("EmergencyContactTitle");
                $EmergencyContactName = $this->input->post("EmergencyContactName");
                $EmergencyContactRelation = $this->input->post("EmergencyContactRelation");
                $EmergencyContactAddress = $this->input->post("EmergencyContactAddress");
                $EmergencyContactAddress2 = $this->input->post("EmergencyContactAddress2");
                $EmergencyContactAddress3 = $this->input->post("EmergencyContactAddress3");
                $EmergencyContactCity = $this->input->post("EmergencyContactCity");
                $EmergencyContactState = $this->input->post("EmergencyContactState");
                $EmergencyContactAddressPO = $this->input->post("EmergencyContactAddressPO");
                $EmergencyContactMobile = $this->input->post("EmergencyContactMobile");
                $EmergencyContactEmail = $this->input->post("EmergencyContactEmail");
                $courseName = $this->input->post("courseName");
                $awardingBody = $this->input->post("awardingBody");
                $courseLevel = $this->input->post("courseLevel");
//                $courseStartDate = $this->input->post("courseStartDate");
//                $courseEndDate = $this->input->post("courseEndDate");
                $methodeOfStudy = $this->input->post("methodeOfStudy");

                $candidateCurrentAddressCountry = $this->input->post("currentAddressCountry");
                $candidatePermanentAddressCountry = $this->input->post("permanentAddressCountry");
                $EmergencyContactCountry = $this->input->post("emergencyContactCountry");

                $courseSession = $this->input->post("courseSession");
                $courseYear = $this->input->post("courseYear");
                $timeOfStudy = $this->input->post("timeOfStudy");
                $ulnNo = $this->input->post("ulnNo");
                $ucasCourseCode = $this->input->post("ucasCourseCode");


//                $aplicationFormid=$this->session->userdata('id').date("YmdHis");
//
//                $data3=array(
//                    'studentOrAgentId'=>$this->session->userdata('id'),
//                    'studentApplicationFormId'=>$aplicationFormid
//                );
//                $studentApplicationId = $this->ApplyOnlinem->insertStudentApplicationForm($data3);
//                $dataSession = [
//                    'studentApplicationId' => $studentApplicationId,
//                ];
//                $this->session->set_userdata($dataSession);

                $data=array(
                    //'applicationId'=>$this->session->userdata('studentApplicationId'),
                    'title'=>$candidateTitle,
                    'firstName'=>$candidateFirstName,
                    'surName'=>$candidateSurName,
//                    'otherNames'=>$candidateOtherNamee,
                    'dateOfBirth'=>$candidateDob,
                    'gender'=>$candidateGender,
                    'ganderChange'=>$candidateGenderChanged,
                    'placeOfBirth'=>$candidatePlaceOfBirth,
                    'nationality'=>$candidateNationality,
                    'passportNo'=>$candidatePassportNo,
                    'passportExpiryDate'=>$candidatePassportExpiryDate,
                    'ukEntryDate'=>$candidateUkEntryDate,
                    'visaType'=>$candidateVisaType,
                    'visaExpiryDate'=>$candidateVisaExpiryDate,
                    'currentAddress'=>$candidateCurrentAddress,
                    'currentAddress2' => $candidateCurrentAddress2,
                    'currentAddress3' => $candidateCurrentAddress3,
                    'currentAddressCity' => $candidateCurrentAddressCity,
                    'currentAddressState' => $candidateCurrentAddressState,
                    'currentAddressPo'=>$candidateCurrentAddressPO,
//                    'overseasAddress'=>$candidateOverseasHomeAddress,
                    'permanentAddress' => $candidatePermanentAddress,
                    'permanentAddress2' => $candidatePermanentAddress2,
                    'permanentAddress3' => $candidatePermanentAddress3,
                    'permanentAddressCity' => $candidatePermanentAddressCity,
                    'permanentAddressState' => $candidatePermanentAddressState,
                    'overseasAddressPo'=>$candidateOverseasHomeAddressPO,
                    'telephoneNo'=>$candidateTelephone,
                    'mobileNo'=>$candidateMobile,
                    'email'=>$candidateEmail,
                    'fax'=>$candidateFax,
                    'emergencyContactName'=>$EmergencyContactName,
                    'emergencyContactTitle'=>$EmergencyContactTitle,
                    'emergencyContactRelation'=>$EmergencyContactRelation,
                    'emergencyContactAddress'=>$EmergencyContactAddress,
                    'emergencyContactAddress2' => $EmergencyContactAddress2,
                    'emergencyContactAddress3' => $EmergencyContactAddress3,
                    'emergencyContactAddressCity' => $EmergencyContactCity,
                    'emergencyContactAddressState' => $EmergencyContactState,
                    'emergencyContactAddressPo'=>$EmergencyContactAddressPO,
                    'emergencyContactMobile'=>$EmergencyContactMobile,
                    'emergencyContactEmail'=>$EmergencyContactEmail,

                    'currentAddressCountry'=>$candidateCurrentAddressCountry,
                    'permanentAddressCountry'=>$candidatePermanentAddressCountry,
                    'emergencyContactCountry'=>$EmergencyContactCountry,
                );
                $data1=array(
                    'courseName'=>$courseName,
                    'awardingBody'=>$awardingBody,
                    'courseLevel'=>$courseLevel,
//                    'courseStartDate'=>$courseStartDate,
//                    'courseEndDate'=>$courseEndDate,
                    'methodOfStudy'=>$methodeOfStudy,

                    'courseSession'=>$courseSession,
                    'courseYear'=>$courseYear,
                    'timeOfStudy'=>$timeOfStudy,
                    'ulnNo'=>$ulnNo,
                    'ucasCourseCode'=>$ucasCourseCode,

                );

                $this->data['error']=$this->StudentApplicationm->editApplyForm1($data,$data1);

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationQualification');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');

                    redirect('Admin/StudentApplication/viewApplication/'.$this->session->userdata('studentApplicationId'));

                }


            }
        }
        else {
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editStudentApplicationQualification() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            $applicationId = $this->session->userdata('studentApplicationId');
            $this->data['qualification'] = $this->StudentApplicationm->getQualifications($applicationId);
            $this->load->view('StudentApplicationForms/application-form2v', $this->data);

        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function EditPersonalQualification()
    {
        $qualificationId = $this->input->post("id");
        $data = $this->StudentApplicationm->getQualificationsDetails($qualificationId);

        echo  json_encode($data);
    }

    public function DeletePersonalQualification()
    {

        $qualificationId = $this->input->post("id");
        $data = $this->StudentApplicationm->deleteQualifications($qualificationId);
        $this->session->set_flashdata('successMessage', 'Qualification Deleted Successfully');


    }

    public function editORInsertApplicationForm2() // edit OR Insert Application Form2
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromQualification')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['qualification'] = $this->StudentApplicationm->getQualifications($applicationId);
                $this->load->view('StudentApplicationForms/application-form2v', $this->data);


            }else {


                $qualificationId = $this->input->post("qualificationId");
                $qualification = $this->input->post("qualification");
                $institution = $this->input->post("institution");
//            $startdate = $this->input->post("startdate");
//            $enddate = $this->input->post("enddate");
                $grade = $this->input->post("grade");


                $qualificationLevel = $this->input->post("qualificationLevel");
                $awardingBody = $this->input->post("awardingBody");
                $subject = $this->input->post("subject");
                $completionYear = date('Y',strtotime($this->input->post("completionYear")));

                $data = array(
                    'qualification' => $qualification,
                    'institution' => $institution,
//                'startdate' => $startdate,
//                'enddate' => $enddate,
                    'obtainResult' => $grade,
                    'qualificationLevel' => $qualificationLevel,
                    'awardingBody' => $awardingBody,
                    'subject' => $subject,
                    'completionYear' => $completionYear,
                );

                if (!empty($qualificationId)) {

                    $this->StudentApplicationm->editQualificationsDetailsById($qualificationId, $data);
                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationQualification');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->StudentApplicationm->insertQualificationsDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationQualification');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editORInsertApplicationForm2AndNext() // edit OR Insert Application Form2 And Next
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromQualification')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['qualification'] = $this->StudentApplicationm->getQualifications($applicationId);
                $this->load->view('StudentApplicationForms/application-form2v', $this->data);

            }else {


                $qualificationId = $this->input->post("qualificationId");
                $qualification = $this->input->post("qualification");
                $institution = $this->input->post("institution");
//            $startdate = $this->input->post("startdate");
//            $enddate = $this->input->post("enddate");
                $grade = $this->input->post("grade");

                $qualificationLevel = $this->input->post("qualificationLevel");
                $awardingBody = $this->input->post("awardingBody");
                $subject = $this->input->post("subject");
                $completionYear = date('Y',strtotime($this->input->post("completionYear")));

                $data = array(
                    'qualification' => $qualification,
                    'institution' => $institution,
//                'startdate' => $startdate,
//                'enddate' => $enddate,
                    'obtainResult' => $grade,

                    'qualificationLevel' => $qualificationLevel,
                    'awardingBody' => $awardingBody,
                    'subject' => $subject,
                    'completionYear' => $completionYear,

                );

                if (!empty($qualificationId)) {

                    $this->StudentApplicationm->editQualificationsDetailsById($qualificationId, $data);
                    $this->session->set_flashdata('successMessage', 'Qualification Edited Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationWorkExperience');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->StudentApplicationm->insertQualificationsDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Qualification Added Successfully');

                    redirect('Admin/StudentApplication/editStudentApplicationWorkExperience');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editStudentApplicationWorkExperience() // go to the apply page of selected course
    {

        if ($this->session->userdata('loggedin') == "true") {


            $applicationId = $this->session->userdata('studentApplicationId');
            $this->data['experience'] = $this->StudentApplicationm->getExprerience($applicationId);
            $this->load->view('StudentApplicationForms/application-form10v', $this->data);

        }else{
            echo "<script>
                        alert('Your Session has Expired ,Please Login Again');
                        window.location.href= '" . base_url() . "Admin/Login';
                        </script>";
        }



    }

    public function updateApplicationForm10(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonexperience')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['experience'] = $this->StudentApplicationm->getExprerience($applicationId);
                $this->load->view('StudentApplicationForms/application-form10v', $this->data);

            }
            else{
                $this->StudentApplicationm->applyNow10update();
                redirect('Admin/StudentApplication/editStudentApplicationWorkExperience');
            }
        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public function updateApplicationForm10AndNext(){
        if ($this->session->userdata('loggedin') == "true") {
            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonexperience')) {

                $applicationId = $this->session->userdata('studentApplicationId');
                $this->data['experience'] = $this->StudentApplicationm->getExprerience($applicationId);
                $this->load->view('StudentApplicationForms/application-form10v', $this->data);
            }
            else{
                $this->StudentApplicationm->applyNow10update();
                redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');
            }
        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public function editStudentApplicationEnglishLanguageProficiency() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $applicationId = $this->session->userdata('studentApplicationId');
            $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);

            if(!empty($firstLanguage)){

                foreach ( $firstLanguage as $First){
                    $this->data['fLanguage']=$First->firstLanguageEnglish;
                }
                if ($this->data['fLanguage'] == '1') {

                    $this->data['fLanguage']='1';
                    $this->load->view('StudentApplicationForms/application-form3', $this->data);

                }else{


                    $this->data['fLanguage']='0';
                    $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
                    $this->load->view('StudentApplicationForms/application-form3v', $this->data);

                }


            }else{
                $this->data['fLanguage']=null;
                $this->load->view('StudentApplicationForms/application-form3', $this->data);

            }



        }
        else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";

        }

    }

    public function insertApplicationForm3AndNext() // insert application form 3 and go form 4
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->data['error']=$this->StudentApplicationm->applyNow3Insert();

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            } else {


                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

            }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";

        }
    }

    public function insertApplicationForm3() // insert application form 3
    {

        if ($this->session->userdata('loggedin') == "true") {




            $this->data['error']=$this->StudentApplicationm->applyNow3Insert();


            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

            } else {


                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

            }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public function EditPersonalExperience()
    {


        $experienceId = $this->input->post("id");
        $data = $this->StudentApplicationm->getExprerienceDetails($experienceId);

        echo json_encode($data);

    }

    public function DeletePersonalExperience()
    {
        $experienceId = $this->input->post("id");
        $data = $this->StudentApplicationm->deleteExperience($experienceId);
        $this->session->set_flashdata('successMessage', 'Experience Deleted Successfully');
    }

    public function updateEnglishLagugeProficiency(){
        if ($this->session->userdata('loggedin') == "true") {


            $firstLanguage = $this->input->post('firstLanguage');
            $otherTab = $this->input->post('otherTab');

            if ($firstLanguage=='0'){

                if ($otherTab != '1' ) {

                    $this->load->library('form_validation');
                    if (!$this->form_validation->run('applyfrom3')) {


                        $applicationId = $this->session->userdata('studentApplicationId');
                        //   $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);
                        $this->data['fLanguage'] = '0';

                        $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
                        $this->load->view('StudentApplicationForms/application-form3v', $this->data);
                    } else {
                        $this->data['error'] = $this->StudentApplicationm->applyNow3update();
                        if (empty($this->data['error'])) {


                            $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                            redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                        } else {


                            $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                            redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                        }
                    }
                }else{

                    $this->data['error']=$this->StudentApplicationm->applyNow3update();

                    if (empty($this->data['error'])) {


                        $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                        redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                    } else {


                        $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                        redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                    }

                }

            }
            else {
                $this->data['error']=$this->StudentApplicationm->applyNow3update();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationEnglishLanguageProficiency');

                }
            }

        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }
    public function editORInsertApplicationForm3AndNext(){
        if ($this->session->userdata('loggedin') == "true") {

//            $this->load->library('form_validation');
//            if (!$this->form_validation->run('applyfrom3')) {
//
//                $applicationId = $this->session->userdata('studentApplicationId');
//                $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);
//
//                if(!empty($firstLanguage)){
//
//                    foreach ( $firstLanguage as $First){
//                        $this->data['fLanguage']=$First->firstLanguageEnglish;
//                    }
//
//                }else{
//                    $this->data['fLanguage']=null;
//
//                }
//
//                $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
//                $this->load->view('StudentApplicationForms/application-form3v', $this->data);
//
//            }
//            else {
            $firstLanguage = $this->input->post('firstLanguage');
            if ($firstLanguage=='0'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfrom3')) {



                    $applicationId = $this->session->userdata('studentApplicationId');
                    //   $firstLanguage = $this->StudentApplicationm->getfirstLanguage($applicationId);
                    $this->data['fLanguage']='0';

                    $this->data['languagetest'] = $this->StudentApplicationm->getlanguagetest($applicationId);
                    $this->load->view('StudentApplicationForms/application-form3v', $this->data);
                }else{

                    $this->data['error']=$this->StudentApplicationm->applyNow3update();

                    if (empty($this->data['error'])) {


                        $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                        redirect('Admin/StudentApplication/editStudentApplicationFinance');

                    } else {


                        $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                        redirect('Admin/StudentApplication/editStudentApplicationFinance');

                    }

                }

            }else{

                $this->data['error']=$this->StudentApplicationm->applyNow3update();

                if (empty($this->data['error'])) {


                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationFinance');

                } else {


                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationFinance');

                }

            }



//            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public  function EditLanguageTest(){
        $languagetestId = $this->input->post("id");
        $data = $this->StudentApplicationm->getLanguageTestDetails($languagetestId);

        echo  json_encode($data);

    }

    public function EditLanguageTestHead(){
        $languagetestId = $this->input->post("id");
        $data = $this->StudentApplicationm->getLanguageTestHeadDetails($languagetestId);

        echo  json_encode($data);
    }

    public function DeleteLanguageProficiency(){

        $LanguageProficiencyId = $this->input->post("id");
        $data = $this->StudentApplicationm->deleteLanguageProficiency($LanguageProficiencyId);
        $this->session->set_flashdata('successMessage', 'Language Proficiency Deleted Successfully');
    }

    public function editStudentApplicationFinance()
    {
        if ($this->session->userdata('loggedin') == "true") {


            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->StudentApplicationm->getFinancerData($applicationId);

            foreach ($this->data['Financer'] as $Financer){
                $finance=$Financer->sourceOfFinance;
            }


            if (empty($finance)) {
                $this->data['financeYes'] = null;
                $this->load->view('StudentApplicationForms/application-form4', $this->data);
            } else {


                if ($finance == 'own') {
                    $this->data['financeYes'] = 'own';
                    $this->load->view('StudentApplicationForms/application-form4', $this->data);
                }if ($finance == 'slc' ) {
                    $this->data['financeYes'] = 'slc';
                    $this->load->view('StudentApplicationForms/application-form4', $this->data);
                }
                else {
                    $this->data['financeYes'] = $finance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);
                    //print_r($this->data['Financer']);
                    $this->load->view('StudentApplicationForms/application-form4v', $this->data);
                }

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function updateInfoApply4()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');
            if ($selfFinance != 'own' || $selfFinance != 'slc'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {


                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);
                    $this->load->view('StudentApplicationForms/application-form4v', $this->data);

                }

            }

            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->StudentApplicationm->getFinancerData($applicationId);

            foreach ($this->data['Financer'] as $Financer) {
                $finance = $Financer->sourceOfFinance;
            }

            if (empty($finance)) {

                $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();

            } else {

                if ($finance == 'own') {
                    $this->data['financeYes'] = 'own';
                    $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();
                } else {
                    $this->data['financeYes'] = $finance;
                    $this->data['error'] = $this->StudentApplicationm->updatApplynow4();
                }


            }


            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            }


        }
        else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";

        }

    }

    public function editORInsertApplicationForm4AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');

            if ($selfFinance != 'own'){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);
                    $this->load->view('StudentApplicationForms/application-form4v', $this->data);

                }

            }


            $applicationId = $this->session->userdata('studentApplicationId');

            $this->data['Financer'] = $this->StudentApplicationm->getFinancerData($applicationId);

            foreach ($this->data['Financer'] as $Financer) {
                $finance = $Financer->sourceOfFinance;
            }

            if (empty($finance)) {

                $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();

            } else {

                if ($finance == 'own') {
                    $this->data['financeYes'] = 'own';
                    $this->data['error'] = $this->StudentApplicationm->editORInsertApplicationForm4();
                } else {
                    $this->data['financeYes'] = $finance;
                    $this->data['error'] = $this->StudentApplicationm->updatApplynow4();
                }


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationPersonalStatement');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function insertapplyNow4()

    {

        if ($this->session->userdata('loggedin') == "true") {

            $selfFinance=$this->input->post('selfFinance');

            if ($selfFinance != 'own' || $selfFinance != 'slc' ){

                $this->load->library('form_validation');
                if (!$this->form_validation->run('applyfromfinance')) {

                    $applicationId=$this->session->userdata('studentApplicationId');

                    $this->data['financeYes'] = $selfFinance;
                    $this->data['Financer'] = $this->StudentApplicationm->getFinancerDataFromOthers($applicationId);

                    $this->load->view('StudentApplicationForms/application-form4', $this->data);

                }

            }


            $this->data['error'] = $this->StudentApplicationm->insertnewfrom4();




            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            } else {


                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationFinance');

            }


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editStudentApplicationPersonalStatement() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {


            $applicationId=$this->session->userdata('studentApplicationId');

            $this->data['PersonalStatementData'] = $this->StudentApplicationm->getPersonalStatementData($applicationId);


            $this->load->view('StudentApplicationForms/application-form5v', $this->data);


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function updateAapplyNow5()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonalStatement')) {


                $applicationId=$this->session->userdata('studentApplicationId');
                $this->data['PersonalStatementData'] = $this->StudentApplicationm->getPersonalStatementData($applicationId);
                $this->load->view('StudentApplicationForms/application-form5v', $this->data);

            }
            else {


                $this->data['error'] = $this->StudentApplicationm->updatApplynow5();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationPersonalStatement');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationPersonalStatement');

                }
            }

        }
        else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }


    }

    public function editApplicationForm5AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromPersonalStatement')) {


                $applicationId=$this->session->userdata('studentApplicationId');
                $this->data['PersonalStatementData'] = $this->StudentApplicationm->getPersonalStatementData($applicationId);
                $this->load->view('StudentApplicationForms/application-form5v', $this->data);

            }else {


                $this->data['error'] = $this->StudentApplicationm->updatApplynow5();
                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage', 'Information Saved  Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationPersonalStatement');

                }
            }

        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }

    }

    public function editStudentApplicationEqualOppertunity() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->data['EqualOpportunity'] = $this->StudentApplicationm->getAllEqualOpportunity();
            $this->data['opportunityTitle']= $this->StudentApplicationm->checkopportunityTitle();
            $this->data['opportunitySubGroupId']= $this->StudentApplicationm->getOpportunitySubGroupId();

            if (empty($this->data['EqualOpportunity'])) {

                $this->load->view('StudentApplicationForms/application-form6', $this->data);
            } else {

                $this->load->view('StudentApplicationForms/application-form6v', $this->data);
            }





        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function insertapplyNow6()
    {
        if ($this->session->userdata('loggedin') == "true") {

            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');

            $disabilityAllowance = $this->input->post('disabilityAllowance');


            $this->data['opportunityTitle'] = $this->StudentApplicationm->checkopportunityTitle();
            $applicationId = $this->session->userdata('studentApplicationId');
            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Disability')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,
                        'fkApplicationId' => $applicationId,
                        'disabilityAllowance' => $disabilityAllowance,

                    );

                if ($title->opportunityTitle == 'Religion Belief')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Sexual Orientation')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,
                        'fkApplicationId' => $applicationId,

                    );


                $this->data['error'] = $this->StudentApplicationm->insertapplyNow6personal($data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }


    }
    public function insertApplicationForm6AndNext()
    {
        if ($this->session->userdata('loggedin') == "true") {

            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');

            $disabilityAllowance = $this->input->post('disabilityAllowance');


            $this->data['opportunityTitle'] = $this->StudentApplicationm->checkopportunityTitle();
            $applicationId = $this->session->userdata('studentApplicationId');
            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Disability')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,
                        'fkApplicationId' => $applicationId,
                        'disabilityAllowance' => $disabilityAllowance,

                    );

                if ($title->opportunityTitle == 'Religion Belief')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,
                        'fkApplicationId' => $applicationId,

                    );

                if ($title->opportunityTitle == 'Sexual Orientation')

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,
                        'fkApplicationId' => $applicationId,

                    );


                $this->data['error'] = $this->StudentApplicationm->insertapplyNow6personal($data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Login';
                    </script>";
        }


    }

    public function updatefrom6()
    {
        if ($this->session->userdata('loggedin') == "true") {


            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');
            $Id_check_list = $this->input->post('id_check_list');
            $Id_check_list1 = $this->input->post('id_check_list1');
            $Id_check_list2 = $this->input->post('id_check_list2');
            $Id_check_list3 = $this->input->post('id_check_list3');

            $disabilityAllowance = $this->input->post('disabilityAllowance');


            $this->data['opportunityTitle'] = $this->StudentApplicationm->checkopportunityTitle();

            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,


                    );
                    $id = $Id_check_list;
                }


                if ($title->opportunityTitle == 'Disability') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,
                        'disabilityAllowance' => $disabilityAllowance,


                    );
                    $id = $Id_check_list1;
                }

                if ($title->opportunityTitle == 'Religion Belief') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,


                    );
                    $id = $Id_check_list2;
                }

                if ($title->opportunityTitle == 'Sexual Orientation') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,


                    );
                    $id = $Id_check_list3;
                }


                $this->data['error'] = $this->StudentApplicationm->updateApplyNow6personal($id, $data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }



    }

    public function editApplicationForm6AndNext()
    {
        if ($this->session->userdata('loggedin') == "true") {

            $check_list = $this->input->post('check_list');
            $check_list1 = $this->input->post('check_list1');
            $check_list2 = $this->input->post('check_list2');
            $check_list3 = $this->input->post('check_list3');
            $Id_check_list = $this->input->post('id_check_list');
            $Id_check_list1 = $this->input->post('id_check_list1');
            $Id_check_list2 = $this->input->post('id_check_list2');
            $Id_check_list3 = $this->input->post('id_check_list3');

            $disabilityAllowance = $this->input->post('disabilityAllowance');


            $this->data['opportunityTitle'] = $this->StudentApplicationm->checkopportunityTitle();

            foreach ($this->data['opportunityTitle'] as $title) {

                if ($title->opportunityTitle == 'Ethnicity') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list,


                    );
                    $id = $Id_check_list;
                }


                if ($title->opportunityTitle == 'Disability') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list1,
                        'disabilityAllowance' => $disabilityAllowance,


                    );
                    $id = $Id_check_list1;
                }

                if ($title->opportunityTitle == 'Religion Belief') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list2,


                    );
                    $id = $Id_check_list2;
                }

                if ($title->opportunityTitle == 'Sexual Orientation') {

                    $data1 = array(
                        'fkEqualOpportunitySubGroupId' => $check_list3,


                    );
                    $id = $Id_check_list3;
                }


                $this->data['error'] = $this->StudentApplicationm->updateApplyNow6personal($id, $data1);


            }

            if (empty($this->data['error'])) {


                $this->session->set_flashdata('successMessage', 'Information was  Successfully save');
                redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');


            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/StudentApplication/editStudentApplicationEqualOppertunity');

            }
        }else{

            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }



    }

    public function editStudentApplicationDocumentUpload() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->view('StudentApplicationForms/application-form7');


        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function deleteStudentFile()
    {
        $fileName = $this->input->post('fileName');
        $applicationId = $this->session->userdata('studentApplicationId');
        $filePath= 'studentApplications/'.$applicationId.'/';

        if (file_exists($filePath.$fileName)) {
            unlink ($filePath.$fileName);
            echo '1';
        } else {
            echo '0';
        }
        // echo  $filePath.$fileName;

    }

    public function insertapplyNow7()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $applicatfiles = $_FILES['fileUpload']['name'];
            $applicationId = $this->session->userdata('studentApplicationId');
            $files = $_FILES;
            $data = array();
            $fileCount = 0;

            if (array_filter($applicatfiles)!=null ) {

                for ($i = 0; $i < count($applicatfiles); $i++) {

                    if ($applicatfiles[$i] != null) {


                        $_FILES['fileUpload']['name'] = $files['fileUpload']['name'][$i];
                        $_FILES['fileUpload']['type'] = $files['fileUpload']['type'][$i];
                        $_FILES['fileUpload']['tmp_name'] = $files['fileUpload']['tmp_name'][$i];
                        $_FILES['fileUpload']['error'] = $files['fileUpload']['error'][$i];
                        $_FILES['fileUpload']['size'] = $files['fileUpload']['size'][$i];

                        $this->load->library('upload');

                        $this->upload->initialize($this->set_upload_options($applicationId));

                        if (!$this->upload->do_upload('fileUpload')) {
                            $error[$i] = $this->upload->display_errors();
                            $data[$error[$i]];

                        }

                        $fileCount++;


                    } else {

                    }
                }

                if (empty($data)) {


                    $this->session->set_flashdata('successMessage', $fileCount . ' are uploaded Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');

                }

            }else{

                $this->session->set_flashdata('errorMessage', 'There was no files for Upload');
                redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    public function editApplicationForm7AndNext()
    {

        if ($this->session->userdata('loggedin') == "true") {

            $applicatfiles = $_FILES['fileUpload']['name'];
            $applicationId = $this->session->userdata('studentApplicationId');
            $files = $_FILES;
            $data = array();
            $fileCount = 0;

            if (array_filter($applicatfiles)!=null ) {

                for ($i = 0; $i < count($applicatfiles); $i++) {

                    if ($applicatfiles[$i] != null) {


                        $_FILES['fileUpload']['name'] = $files['fileUpload']['name'][$i];
                        $_FILES['fileUpload']['type'] = $files['fileUpload']['type'][$i];
                        $_FILES['fileUpload']['tmp_name'] = $files['fileUpload']['tmp_name'][$i];
                        $_FILES['fileUpload']['error'] = $files['fileUpload']['error'][$i];
                        $_FILES['fileUpload']['size'] = $files['fileUpload']['size'][$i];

                        $this->load->library('upload');

                        $this->upload->initialize($this->set_upload_options($applicationId));

                        if (!$this->upload->do_upload('fileUpload')) {
                            $error[$i] = $this->upload->display_errors();
                            $data[$error[$i]];

                        }

                        $fileCount++;


                    } else {

                    }
                }

                if (empty($data)) {


                    $this->session->set_flashdata('successMessage', $fileCount . ' are uploaded Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationReferences');


                } else {

                    $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');

                }

            }else{

                $this->session->set_flashdata('errorMessage', 'There was no files for Upload');
                redirect('Admin/StudentApplication/editStudentApplicationDocumentUpload');

            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }
    }

    //upload an image options
    private function set_upload_options($applicationId)
    {

        if (!is_dir('studentApplications/'.$applicationId)){
            mkdir('studentApplications/'.$applicationId, 0777, TRUE);
        }

        $config = array();
        $config['upload_path'] = 'studentApplications/'.$applicationId."/";
        $config['allowed_types'] = 'jpg|jpeg|gif|png|xlsx|pdf|doc|docx|xls|xlsx';

        $config['overwrite'] = true;
        //  $config['file_name'] = $photoId;

        return $config;
    }

    public function editStudentApplicationReferences() // go to the apply page of selected course
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->data['References'] = $this->StudentApplicationm->getAllRefences();

            $this->load->view('StudentApplicationForms/application-form8v', $this->data);



        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editORInsertApplicationForm8() // edit OR Insert Application Form2
    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromRefrees')) {

                $this->data['References'] = $this->StudentApplicationm->getAllRefences();

                $this->load->view('StudentApplicationForms/application-form8v', $this->data);

            }
            else {


                $refereesId = $this->input->post("refereesId");
                $title = $this->input->post("title");
                $name = $this->input->post("name");
                $company = $this->input->post("company");
                $jobTitle = $this->input->post("jobTitle");
                $telephone = $this->input->post("telephone");
                $email = $this->input->post("email");
                $address = $this->input->post("address");
                $address2 = $this->input->post('address2');
                $address3 = $this->input->post('address3');
                $city = $this->input->post('city');
                $state = $this->input->post('state');
                $addressPo = $this->input->post("addressPo");
                $country = $this->input->post("country");


                $data = array(

                    'name' => $name,
                    'title' => $title,
                    'workingCompany' => $company,
                    'jobTitle' => $jobTitle,
                    'address' => $address,
                    'address2' => $address2,
                    'address3' => $address3,
                    'city' => $city,
                    'state' => $state,
                    'postCode' => $addressPo,
                    'contactNo' => $telephone,
                    'email' => $email,
                    'fkCountry' => $country,

                );

                if (!empty($refereesId)) {

                    $this->StudentApplicationm->editRefereesDetailsById($refereesId, $data);
                    $this->session->set_flashdata('successMessage', 'Referees Edited Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationReferences');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->StudentApplicationm->insertRefereesDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Referees Added Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationReferences');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }

    public function editApplicationForm8AndNext() // edit OR Insert Application Form8

    {
        if ($this->session->userdata('loggedin') == "true") {

            $this->load->library('form_validation');
            if (!$this->form_validation->run('applyfromRefrees')) {

                $this->data['References'] = $this->StudentApplicationm->getAllRefences();

                $this->load->view('StudentApplicationForms/application-form8v', $this->data);

            }else {


                $refereesId = $this->input->post("refereesId");
                $title = $this->input->post("title");
                $name = $this->input->post("name");
                $company = $this->input->post("company");
                $jobTitle = $this->input->post("jobTitle");
                $telephone = $this->input->post("telephone");
                $email = $this->input->post("email");
                $address = $this->input->post("address");
                $address2 = $this->input->post('address2');
                $address3 = $this->input->post('address3');
                $city = $this->input->post('city');
                $state = $this->input->post('state');
                $addressPo = $this->input->post("addressPo");
                $country = $this->input->post("country");


                $data = array(

                    'name' => $name,
                    'title' => $title,
                    'workingCompany' => $company,
                    'jobTitle' => $jobTitle,
                    'address' => $address,
                    'address2' => $address2,
                    'address3' => $address3,
                    'city' => $city,
                    'state' => $state,
                    'postCode' => $addressPo,
                    'contactNo' => $telephone,
                    'email' => $email,
                    'fkCountry' => $country,

                );

                if (!empty($refereesId)) {

                    $this->StudentApplicationm->editRefereesDetailsById($refereesId, $data);
                    $this->session->set_flashdata('successMessage', 'Referees Edited Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationReferences');
                } else {

                    $data2 = array(
                        'fkApplicationId' => $this->session->userdata('studentApplicationId'),
                    );
                    $data = array_merge($data, $data2);
                    $this->StudentApplicationm->insertRefereesDetailsFromEdit($data);
                    $this->session->set_flashdata('successMessage', 'Referees Added Successfully');
                    redirect('Admin/StudentApplication/editStudentApplicationReferences');

                }
            }
        }else{
            echo "<script>
                    alert('Your Session has Expired ,Please Login Again');
                    window.location.href= '" . base_url() . "Admin/Login';
                    </script>";
        }

    }



    public function EditPersonalReferees()
    {
        $refereesId = $this->input->post("id");
        $data = $this->StudentApplicationm->getRefereesDetails($refereesId);

        echo  json_encode($data);
    }

    public function deletePersonalReferees() // delete personal Referees
    {
        $refereesId = $this->input->post("id");

        $this->StudentApplicationm->deleteRefereesDetailsById($refereesId);
        $this->session->set_flashdata('successMessage', 'Referees Deleted Successfully');


    }

//    public function editStudentApplicationSubmitApplication() // go to the apply page of selected course
//    {
//        if ($this->session->userdata('loggedin') == "true") {
//
//            $this->load->view('StudentApplicationForms/application-form9');
//
//        }else{
//            echo "<script>
//                    alert('Your Session has Expired ,Please Login Again');
//                    window.location.href= '" . base_url() . "Admin/Login';
//                    </script>";
//        }
//
//    }


    /* for edit application end */
}