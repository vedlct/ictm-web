<!DOCTYPE html>
<html lang="en">
    <head>
        <title>APPLICATION FORM</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/styleform.css">
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    -->
    </head>
    
    <style>
        @page { size: auto;  margin: 0mm; }
    </style>
    <body>
        <div class="structure">
            <div style= "background: #fff; margin-bottom: 30px;padding: 25px "  class="container">
               
                <table border="0" style="width:100%; margin-top: 30px; border: none;">
                    <tr>
                        <td style="border: none;"><img style="height: 80px; border: none;" src="<?php echo base_url()?>public/img/logoform.jpg" alt=""></td>
                        <td style="border: none;"><h2 style="font-size: 24px; border: none;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
                    </tr>
                </table> 
                <table border="0" style="width:100%; margin-top: 30px; border: none;">
                    <tr>
                        <td style="text-align: center; border: none; margin-left: 20px;"><h3 style="color: #E3352E; margin-left: 70px;">APPLICATION FORM</h3></td>
                       <td style="width: 13%; text-align: center; height: 120px;">photograph</td>
                    </tr>
                    <tr>
                        <td style="border: none;"><b>Please complete this form in BLOCK letters using black ink.</b> <br><small>(You must complete all sections for the application to be accepted)</small> </td>
                    </tr>
                </table> 
                <table border="0" style="width:100%;">

                    <tr style="background: #B0DBF0;">
                        <td> <b>Section A</b> <b style="margin-left: 200px;">Personal Details</b></td>

                    </tr>  

                </table>     
                

                <table style="width:100%">
                    <?php foreach ($personalDetails as $pd) { ?>
                    <tr>
                        <td>First Name(s)</td>
<!--                        <td colspan="3" >Title (Mr / Mrs / Ms / Miss, others....)</td>-->
                        <td colspan="3" ><?php echo $pd->title." ".$pd->firstName ?></td>
                    </tr>
                    <tr>
                        <td>Sure Name</td>
                        <td><?php echo $pd->surName?></td>
                        <td>Sex</td>
                        <td><input type="checkbox" <?php if ($pd->gender =="M") {?> checked <?php } ?> >Male
                            <input type="checkbox" <?php if ($pd->gender =="F") {?> checked <?php } ?>> Female
                            <input type="checkbox" <?php if ($pd->gender =="O") {?> checked <?php } ?>> Other
                            <input type="checkbox" <?php if ($pd->gender =="") {?> checked <?php } ?>> Prefer Not to say</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $pd->dateOfBirth?></td>
                        <td>Any Gender Changed</td>
                        <td><input type="checkbox"> Yes
                           <input type="checkbox"> No
                            <input type="checkbox"> Prefer Not to say</td>
                    </tr>
                    <tr>
                        <td>Place of Birth</td>
                        <td><?php echo $pd->placeOfBirth?></td>
                        <td>Nationality</td>
                        <td><?php echo $pd->nationality?></td>
                    </tr>
                    <tr>
                        <td>Passport/ID No.</td>
                        <td><?php echo $pd->passportNo?></td>
                        <td>Passport/ID Expiry date</td>
                        <td><?php echo $pd->passportExpiryDate?></td>
                    </tr>
                    <tr>
                        <td>UK entry Date</td>
                        <td><?php echo $pd->ukEntryDate?></td>
                        <td>Visa Expiry date</td>
                        <td><?php echo $pd->visaExpiryDate?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Visa Type(where applicable): <?php echo $pd->visaType?></td>
                        <td><input type="checkbox"> ILR </td>
                        <td>Other</td>
                    </tr>
                    <?php } ?>
                </table>
                                           
                <table style="width:100%; margin-top: 30px;">
                    <?php foreach ($contactDetails as $cd) {?>
                    <tr>
                        <td colspan="5"> <b>Contact Details</b> </td>
                    </tr>  
                                     
                    <tr>
                        <td >Current Address</td>
                        <td style="width: 40%"><?php echo $cd->currentAddress ?></td>
                        <td>Permanent Address</td>
                        <td style="width: 40%"><?php echo $cd->overseasAddress ?></td>
                    </tr>
                    
                    <tr>
                        <td>Post Code</td>
                        <td><?php echo $cd->currentAddressPo?></td>
                        <td>Post Code</td>
                        <td><?php echo $cd->overseasAddressPo?></td>
                    </tr>
                    
                    <tr>
                        <td>Country</td>
                        <td><?php echo $cd->currentAddressCountry ?></td>
                        <td>Country</td>
                        <td><?php echo $cd->permanentAddressCountry?></td>
                    </tr>
                    
                    <tr>
                        <td>Mobile</td>
                        <td><?php echo $cd->mobileNo?></td>
                        <td>Telephone</td>
                        <td><?php echo $cd->telephoneNo?></td>
                    </tr>
                    
                    <tr>
                        <td>Email</td>
                        <td colspan="3"><?php echo $cd->email?></td>
                    </tr>
                    <?php } ?>
                </table>
<!--                                          <p style="page-break-before: always"></p>-->
                                           
                <table style="width:100%; margin-top: 50px; page-break-before: always">
                    <?php foreach ($emmergencyContact as $ec){ ?>
                    <tr>
                        <td colspan="6"> <b>Emmergency Contact Details/Next of kin</b> <small>(please tell us who you would like the college to contact in case of emmergency)</small> </td>
                    </tr>
                    
                    <tr>
                        <td >Name</td>
                        <td colspan="5" ><?php echo $ec->emergencyContactTitle." ".$ec->emergencyContactName?></td>
                    </tr>
                    
                    <tr>
                        <td>Relation</td>
                        <td colspan="5"><?php echo $ec->emergencyContactRelation?></td>
                    </tr>
                    
                    <tr>
                        <td>Address</td>
                        <td colspan="3"><?php echo $ec->emergencyContactAddress?></td>
                        <td>Mobile/Telephone</td>
                        <td><?php echo $ec->emergencyContactMobile?></td>
                    </tr>
                    
                    <tr>
                        <td>Country</td>
                        <td><?php echo $ec->emergencyContactCountry?></td>
                        <td>Post Code</td>
                        <td><?php echo $ec->emergencyContactAddressPo?></td>
                        <td>Email</td>
                        <td><?php echo $ec->emergencyContactEmail?></td>
                    </tr>   
                          <?php } ?>
                </table>     
                                           
                <table style="width:100%; margin-top: 30px;">
                    <?php foreach ($courseDetails as $cod)  {?>
                    <tr>
                        <td colspan="4"> <b>Course Details</b></td>
                    </tr>
                    
                    <tr>
                        <td >Course Name</td>
                        <td colspan="3"><?php echo $cod->courseTitle?></td>
                    </tr>
                    

                    <tr>
                        <td>Awarding Body</td>
                        <td colspan=""><?php echo $cod->awardbody?></td>
                        <td>Course Level</td>
                        <td><?php echo $cod->courseLevel?></td>
                    </tr>
                    
                    <tr>
                        <td>Session</td>
                        <td><?php echo $cod->courseSession?></td>
                        <td>Year</td>
                        <td><?php echo $cod->courseYear?></td>
                    </tr>
                    
                    <tr>
                        <td>Mode of study</td>
                      <td><input type="checkbox" <?php if ($cod->methodOfStudy =="FT") {?> checked <?php } ?>> Full time
                        <input type="checkbox" <?php if ($cod->methodOfStudy =="PT") {?> checked <?php } ?>> Part time
                       </td>
                        <td>Time of study</td>
                        <td><input type="checkbox" <?php if ($cod->timeOfStudy =="D") {?> checked <?php } ?> >  Day
                            <input type="checkbox"  <?php if ($cod->timeOfStudy =="E&W") {?> checked <?php } ?> > Evening & Weekend
                        </td>
                    </tr>
                    
                    <tr>
                        <td>ULN no (if any): </td>
                        <td><?php echo $cod->ulnNo?></td>
                        <td>UCAS course code:</td>
                        <td><?php echo $cod->ucasCourseCode?></td>
                    </tr>
                    <?php } ?>
                </table> 
                                           
                <table border="0" style="width:100%; margin-top: 30px;">
                   
                    <tr style="background: #B0DBF0;">
                        <td> <b>Section B</b> <b style="margin-left: 200px;">Qualifications</b> <small>(Highest qualification obtained or expected)</small></td>
                        
                    </tr>  
                                   
                </table>  
                <table style="width:100%;">
                    <tr>
                        <td>Qualification Name</td>
                        <td>Qualification Level</td>
                        <td>Name of Institution</td>
                        <td>Awarding Body</td>
                        <td>Subject</td>
                        <td>Year of Completion</td>
                        <td>Grade</td>
                    </tr>

                   <?php foreach ($qualifications as $qu) {?>
                    <tr>
                        <td style=""><?php echo $qu->qualification?></td>
                        <td style=""><?php echo $qu->qualificationLevel?></td>
                        <td style=""><?php echo $qu->institution?></td>
                        <td style=""><?php echo $qu->awardingBody?></td>
                        <td style=""><?php echo $qu->subject?></td>
                        <td style=""><?php echo $qu->completionYear?></td>
                        <td style=""><?php echo $qu->obtainResult?></td>
                    </tr>

                    <?php } ?>

<!--                    <tr>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                        <td style="height: 70px;"></td>-->
<!--                    </tr>-->
                    <tr>
                        <td colspan="7">Please forward the certificate and transcript of your qualifications(Officialy translated if not in English)</td>
                    </tr>
                    <tr>
                        <td colspan="7"><b>Work Experience / Training</b></td>
                    </tr>
                    <tr>
                        <td colspan="7">Please indicate details of your recent appointments</td>
                    </tr>
                    <tr>
                        <td colspan=""><b>Organisation / Regulatory Body </b></td>
                        <td colspan="2"><b>Position Held</b></td>
                        <td colspan="2"><b>From </b></td>
                        <td colspan="2"><b>To</b></td>
                    </tr>

                   <?php foreach ($experience as $ex){ ?>
                    <tr>
                        <td style="height: 30px;" colspan=""><?php echo  $ex->organization?></td>
                        <td style="height: 30px;" colspan="2"><?php echo  $ex->positionHeld?></td>
                        <td style="height: 30px;" colspan="2"><?php echo  $ex->startDate?></td>
                        <td style="height: 30px;" colspan="2"><?php echo  $ex->endDate?></td>
                    </tr>
                    <?php } ?>




                </table>  
<!--                <p style="page-break-before: always"></p>    -->

                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr style="background: #B0DBF0;">
                        <td> <b>Section C</b> <b style="margin-left: 200px;">English Language Proficiency</b></td>

                    </tr> 
                </table>  
                                                                                                       
                <table style="width:100%;">
                    <tr>
                        <td style="width: 30%">Is English your first language ?</td>
                        <td><input type="checkbox" >  Yes &nbsp; &nbsp;
                            <input type="checkbox">  No</td>
                    </tr>
                    <tr>
                        <td colspan="2">If English is not your first language, please state your qualifications.</td>
                    </tr>
                </table> 
                                                                                                       
                <table style="width:100%;">
                    <tr>
                        <td style="width: 15%">Tests</td>
                        <td>Listening</td>
                        <td>Reading</td>
                        <td>Writing</td>
                        <td>Speaking</td>
                        <td>Overall</td>
                        <td>Expiry Date</td>
                    </tr>
<!--                    --><?php //foreach ($languageProficiency as $lp) {   ?>
<!--                    <tr>-->
<!--                        <td style="width: 15%">--><?php //echo $lp->title ?><!--</td>-->
<!--                        --><?php //foreach ($languageProficiencyTestScore as $lpts) {
//
//                            if ($lpts->fkCandidateTestId == $lp->ctestid){
//                            ?>
<!--                        <td>--><?php //echo $lpts->score ?><!--</td>-->
<!---->
<!--                            --><?php //} } ?>
<!--                        <td>--><?php //echo $lp->overallScore ?><!--</td>-->
<!--                        <td>--><?php //echo $lp->expireDate ?><!--</td>-->
<!--                    </tr>-->
<!--                    --><?php //} ?>

                    <tr>
                       <td>Other (Please specify)</td>
<!--                        <td colspan="6">--><?php //echo $lp->other ?><!--</td>-->
                    </tr>
                </table>  
                                                                                                                                                                                              
                <table border="0" style="width:100%; margin-top: 30px;page-break-before: always">
                    <tr style="background: #B0DBF0;">
                        <td> <b>Section D</b> <b style="margin-left: 200px;">Personal Statement</b></td>

                    </tr> 
                    <tr>
                        <td>Why do you wish to do this course ? (please attach an extra sheet if needed)</td>

                    </tr>
                    <?php foreach ($personalstatement as $ps){ ?>
                    <tr>
                        <td style=""><?php echo $ps->courseChoiceStatement?></td>

                    </tr>
                    <?php } ?>

                    <tr>
                        <td>Where did you find out about this courses of our college ?</td>
                    </tr>
                    <?php foreach ($personalstatement as $ps){ ?>
                        <tr>
                            <td style=""><?php echo $ps->collegeChoiceStatement?></td>

                        </tr>
                    <?php } ?>
                </table> 
                                                                                                                                                                                              
                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4"> <b>Section E</b> <b style="margin-left: 200px;">Finance</b></td>

                    </tr> 
                    <?php foreach ($finance as $f) {?>
                    <tr>
                        <td style="width: 25%;">Source of Finance:</td>
                        <td><input type="checkbox">  SLC &nbsp;
                            <input type="checkbox">  Own Funding &nbsp;
                            <input type="checkbox">  Sponsorship
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Name and address of person or organisation of sponsorship</b></td>
                    </tr>
                    
                    <tr>
                        <td>Name</td>
                        <td style="" colspan="7"><?php echo  $f->title." ".$f->name ?></td>

                    </tr>
                    <tr>
                        <td colspan="">Relation</td>
                        <td colspan="7"><?php echo  $f->relation ?></td>

                    </tr>
                    <tr>
                        <td>Address</td>
                        <td style="width: 40%;"><?php echo  $f->address ?></td>
                        <td>Mobile / Tel</td>
                        <td style="width: 25%;"><?php echo  $f->mobile ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Post code</td>
                        <td style="width: 15%;"><?php echo  $f->addressPo ?></td>
                        <td style="width: 10%;">Email</td>
                        <td style="width: 50%;"><?php echo  $f->email ?></td>
                    </tr>
                    <?php } ?>
                </table>

                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4"> <b>Section F</b> <b style="margin-left: 200px;">Equal oppurtunities Monitoring</b>
                        </td>
                    </tr> 
                    <tr>
                        <td colspan="2">( Please put cross (X) in appropriate box )</td>
                    </tr>

                    <?php foreach ($equaloppurtunitiesgroup as $eog) {
                        if ($eog->opportunityTitle == 'Ethnicity' ){

                        ?>
                                        <tr>
                                            <td colspan="2"><b>Ethnicity</b></td>
                                        </tr>

                                    <tr style="width: 100%">
                                        <td>
                                       <?php $count = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {

                                           if ($eosub->fkGroupId == $eog->id  ){ ?>

                                               <?php  if ($count==10){ ?> <td> <?php }
                                           ?>


                                        <input type="checkbox"><?php echo $eosub->subGroupTitle ?> <br>

                                       <?php $count++; ?>  <?php } }?>
                                        </td>
                                    </tr>

                        <?php
                            break;
                        } } ?>


<!--                    <tr>-->
<!--                        <td colspan="2"><b>Ethnicity</b></td>-->
<!--                    </tr>-->
<!--                    <tr style="width: 100%">-->
<!--                        <td><input type="checkbox">  White - British <br>-->
<!--                            <input type="checkbox">  White - Irish <br> -->
<!--                            <input type="checkbox">  White - Other <br>-->
<!--                            <input type="checkbox">  Mixed White / Black African <br>-->
<!--                            <input type="checkbox">  Mixed White / Black Caribbean <br>-->
<!--                            <input type="checkbox">  Mixed White / Asian <br>-->
<!--                            <input type="checkbox">  Mixed - Other <br>-->
<!--                            <input type="checkbox">  Chinese -->
<!--                        </td>-->
<!--                        <td><input type="checkbox">  Asian / Asian British - Indian <br>-->
<!--                            <input type="checkbox">  Asian / Asian British - Pakistani <br> -->
<!--                            <input type="checkbox">  Asian / Asian British - Bangladeshi <br>-->
<!--                            <input type="checkbox">  Black / Black British - Caribbean <br>-->
<!--                            <input type="checkbox">  Black / Black British - African <br>-->
<!--                            <input type="checkbox">  Black / Black British - Other <br>-->
<!--                            <input type="checkbox">  Other ethnic group <br>-->
<!--                            <input type="checkbox">  Please specify.................. -->
<!--                        </td>-->
<!--                    </tr>-->
                </table>
                

                <table border="0" style="width:100%; margin-top: 30px;page-break-before: always">

                    <tr>
                        <td colspan="2"><b>Disabilities</b></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox">  No known disability <br>
                            <input type="checkbox">  Special learning difficulty / Dyslexia <br> 
                            <input type="checkbox">  Autistic Spectrum Disorder <br>
                            <input type="checkbox">  Blind / Partially sighted <br>
                            <input type="checkbox">  Deaf / hearing impairment <br>
                            <input type="checkbox">  Two or More Impairments <br>
                        </td>
                        <td><input type="checkbox">  Wheelchair user / Mobility difficulties <br>
                            <input type="checkbox">  Personal care support <br> 
                            <input type="checkbox">  Mental health difficulties <br>
                            <input type="checkbox">  Unseen disability e.g. diabetes <br>
                            <input type="checkbox">  Multiple disabities <br>
                            <input type="checkbox">  other................  
                        </td>
                    </tr>
                    <tr>
                        <td  colspan="2" style="width: 50%;"><span style="margin-right: 100px;">If disabled, are you receiving any Disability Allowances ? </span>
                             <input type="checkbox">  Yes
                            <input type="checkbox">  No
                            <input type="checkbox">  Prefer Not to say
                        </td>
                    </tr>
                </table>
<!--                -->
                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr>
                        <td colspan="2"><b>Religion or Belief</b></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox">  No religion <br>
                            <input type="checkbox">  Buddhist <br> 
                            <input type="checkbox">  Christian <br>
                            <input type="checkbox">  Christian - Church of Scotland <br>
                            <input type="checkbox">  Christian - Roman Catholic <br>
                            <input type="checkbox">  Christian - Other denomination <br>
                            <input type="checkbox">  Hindu
                        </td>
                        <td><input type="checkbox">  Jewish <br>
                            <input type="checkbox">  Muslim <br> 
                            <input type="checkbox">  Sikh <br>
                            <input type="checkbox">  Prefer not to say <br>
                            <input type="checkbox">  Not known <br>
                            <input type="checkbox">  other................  
                        </td>
                    </tr>
                </table>
<!--                -->
                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr>
                        <td colspan="2"><b>Sexual Orientation</b></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox">  Bisexual <br>
                            <input type="checkbox">  Gay man <br> 
                            <input type="checkbox">  Gay woman/lesbian
                        </td>
                        <td><input type="checkbox">  Heterosexual <br>
                            <input type="checkbox">  Prefer not to say <br> 
                            <input type="checkbox">  other................  
                        </td>
                    </tr>
                </table> 
                
<!--                <p style="page-break-before: always"></p>  -->
                
                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4"> <b>Section G</b> <b style="margin-left: 200px;">Referees</b></td>
                    </tr> 

                </table> 
                <table border="0" style="width:100%;">
                    <?php $count = 1;foreach ($referees as $cr) {?>
                    <tr>
                        <td colspan="7"><b>Referee <?php echo $count ?></b></td>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td style="width: 30%;"><?php echo $cr->title." ".$cr->name?></td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>Institution/Company</td>
                        <td style="width: 40%;"><?php echo $cr->workingCompany?></td>
                        <td>Position/Job title</td>
                        <td style="width: 25%;"><?php echo $cr->jobTitle?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td style="width: 40%;"><?php echo $cr->address?></td>
                        <td>Telephone/Mobile</td>
                        <td style="width: 25%;"><?php echo $cr->contactNo?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Post code</td>
                        <td style="width: 15%;"><?php echo $cr->postCode?></td>
                        <td style="width: 10%;">Email</td>
                        <td style="width: 50%;"><?php echo $cr->email?></td>
                    </tr>
                    <?php $count++ ;} ?>
                </table>                                                                                                                                     

                <table border="0" style="width:100%; margin-top: 20px; border: none;">
                    <tr>
                        <td style="border: none;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                    </tr>

                </table>                                                                                                                                  
                <table border="0" style="width:100%; margin-top: 20px;">
                    <tr>
                        <td style="width: 25%;"><b>Applicants Signature</b></td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;"><b>Date of Application</b></td>
                        <td style="width: 25%;"></td>
                    </tr>

                </table>   

                <table border="0" style="width:100%; margin-top: 20px; border: none;">
                    <tr>
                        <td style="border: none;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                    </tr>

                </table> 
<!--                <p style="page-break-before: always"></p>  -->
                
                <table border="0" style="width:100%; margin-top: 30px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4"> <b>FOR OFFICE USE ONLY</b></td>
                    </tr> 
                    <tr>
                        <td colspan="4"></td>
                    </tr> 
                    <tr>
                        <td style="width: 25%;">Application Received Date</td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;">Students ID Number</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Course Approved for</td>
                        <td colspan="3" style="width: 75%;"></td>
                    </tr>

                    <tr>
                        <td style="width: 25%;">Session</td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;">Year</td>
                        <td style="width: 25%;"></td>
                    </tr>

                    <tr>
                        <td style="width: 25%;">Offer Decision</td>
                        <td colspan="3" style="width: 75%;">
                            <input type="checkbox">  Unconditional
                            <input type="checkbox">  Conditional
                            <input type="checkbox">  Rejection
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 50px;" colspan="4">( If conditional of rejection please specify the reason for rejection )</td>
                    </tr> 
                    
                    <tr>
                        <td style="width: 25%;">Staff Signature</td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;">Date</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="width: 25%;">Name</td>
                        <td style="width: 25%;"></td>
                        <td style="width: 25%;">Position</td>
                        <td style="width: 25%;"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="4">Please send the completed and signed application form along with registration fee (if applicable) to <br>

                            <b>The Admission Office, ICON College of Technology and Management</b> <br>
                            <b> Unit 21, 1-13 Adler Street, London E1 1EG</b> <br>
                           
                            <b>Tel: +44 (0) 2307 377 2800 &nbsp; Fax: +44 (0 207 377 0822)</b>  <br>
                            <b>E-mail: <a href="mailto:info@iconcollege.ac.uk" target="_top">info@iconcollege.ac.uk</a>  &nbsp; Web: <a href="">www.iconcollege.ac.uk</a> </b> 
                            </td>
                    </tr>
                </table>                                                                                                                                  
            </div>
        </div>
    </body>
</html>