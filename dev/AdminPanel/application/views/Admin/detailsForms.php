<!DOCTYPE html><html lang="en"><head>
        <title>APPLICATION FORM</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<!--        <link rel="stylesheet" href="--><?php //echo base_url()?><!--public/css/styleform.css">-->

    <style>
        @page { size: auto;  margin: 0mm; }

        .logo img {
            width: 80px;

        }
        .versity_name span {
            color: red;
        }

        .application h3 {
            color: red;
            font-size: 25px;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
        }

        .versity_name h2 {
            font-size: 37px;
            margin-left: 18px;
        }
        .application p {
            margin: 0;
            padding: 0;
        }
        .photo > p {
            border: 1px solid;
            height: 122px;
            margin-top: 5px;
            text-align: center;
            width: 110px;
        }

        .personal {
            border: 1px solid #000;
            margin-top: 5px;
            background-color: #B0DBF0;
        }
        .first_name {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            border-color: -moz-use-text-color #000 #000;
            border-image: none;
            border-style: none solid solid;
            border-width: medium 1px 1px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        /*th, td {*/
        /*padding: 5px;*/
        /*text-align: left;    */
        /*}*/

        /* rumi */
        th {
            padding: 5px;
            text-align: left;
        }
        td {
            padding: 3px;
            text-align: left;
        }
        /* rumi */

        input {
            border: medium none;
            padding: 0;
        }
        input[type='checkbox'] {
            margin-top: 6px;
        }

    </style>

    <!-- test -->
    </head><body><div class="structure">
            <div style= "background: #fff; margin-bottom: 30px;padding: 25px "  class="container">
                <table border="0" style="width:100%; margin-top: 15px; border: none;">
                    <tr>
                        <td style="border: none;width:8%"><img style="height: 80px; border: none;" src="<?php echo base_url()?>public/img/logoform.jpg" alt=""></td>
                        <td style="border: none;width: 92%"><h2 style="font-size: 24px; border: none;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
                    </tr>
                </table>
                <table border="0" style="width:100%; margin-top: 15px; border: none;">
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
                        <td width="20%">First Name(s)</td>
                        <td colspan="3" ><?php echo $pd->title." ".$pd->firstName ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Sure Name</td>
                        <td><?php echo $pd->surName?></td>
                        <td width="20%">Sex</td>
                        <td><input type="checkbox" <?php if ($pd->gender =="M") {?> checked <?php } ?> >Male
                            <input type="checkbox" <?php if ($pd->gender =="F") {?> checked <?php } ?>> Female
                            <input type="checkbox" <?php if ($pd->gender =="O") {?> checked <?php } ?>> Other
                            <input type="checkbox" <?php if ($pd->gender =="") {?> checked <?php } ?>> Prefer Not to say
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">Date of Birth</td>
                        <td><?php echo $pd->dateOfBirth?></td>
                        <td width="20%">Any Gender Changed</td>
                        <td>
                            <input type="checkbox"> Yes
                            <input type="checkbox"> No
                            <input type="checkbox"> Prefer Not to say
                        </td>
                    </tr>
                    <tr>
                        <td width="20%">Place of Birth</td>
                        <td><?php echo $pd->placeOfBirth?></td>
                        <td width="20%">Nationality</td>
                        <td><?php echo $pd->nationality?></td>
                    </tr>
                    <tr>
                        <td width="20%">Passport/ID No.</td>
                        <td><?php echo $pd->passportNo?></td>
                        <td width="20%">Passport/ID Expiry date</td>
                        <td><?php echo $pd->passportExpiryDate?></td>
                    </tr>
                    <tr>
                        <td width="20%">UK entry Date</td>
                        <td><?php echo $pd->ukEntryDate?></td>
                        <td width="20%">Visa Expiry date</td>
                        <td><?php echo $pd->visaExpiryDate?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Visa Type(where applicable): <?php echo $pd->visaType?></td>
                        <td><input type="checkbox"> ILR </td>
                        <td>Other</td>
                    </tr>
                    <?php } ?>
                </table>
                                           
                <table style="width:100%; margin-top: 15px;">
                    <?php foreach ($contactDetails as $cd) {?>
                    <tr>
                        <td colspan="4"> <b>Contact Details</b> </td>
                    </tr>  
                                     
                    <tr>
                        <td style="width: 15%">Current Address</td>
                        <td style="width: 35%"><?php echo $cd->currentAddress ?></td>
                        <td style="width: 15%">Permanent Address</td>
                        <td style="width: 35%"><?php echo $cd->overseasAddress ?></td>
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

                                           
                <table style="width:100%; margin-top: 15px;" >
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
                                           
                <table style="width:100%; margin-top: 15px;page-break-before: always"" >
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
                                           
                <table border="0" style="width:100%; margin-top: 15px;">
                   
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


                <table border="0" style="width:100%; margin-top: 15px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="7"> <b>Section C</b> <b style="margin-left: 200px;">English Language Proficiency</b></td>

                    </tr> 
<!--                </table>-->
<!--                <table style="width:100%;">-->
                    <tr>

                        <td colspan="2">Is English your first language ?</td>
                        <?php foreach ($contactDetails as $cd){?>
                        <td colspan="5"><input type="checkbox" value="1" <?php if ($cd->firstLanguageEnglish =="1") {?> checked <?php } ?>>  Yes &nbsp; &nbsp;
                            <input type="checkbox" value="0" <?php if ($cd->firstLanguageEnglish =="0") {?> checked <?php } ?> >  No</td>
                        <?php } ?>

                    </tr>
                </table> 
                                                                                                       
                <table style="width:100%;">
                    <tr>
                        <td colspan="7">If English is not your first language, please state your qualifications.</td>
                    </tr>
                    <tr>
                        <td style="width: 15%">Tests</td>
                        <td>Listening</td>
                        <td>Reading</td>
                        <td>Writing</td>
                        <td>Speaking</td>
                        <td>Overall</td>
                        <td>Expiry Date</td>
                    </tr>
                    <?php foreach ($languageProficiency as $lp) {   ?>
                    <tr>
                        <td style="width: 15%"><?php echo $lp->title ?></td>
                        <?php foreach ($languageProficiencyTestScore as $lpts) {

                            if ($lpts->fkCandidateTestId == $lp->ctestid){
                            ?>
                        <td><?php echo $lpts->score ?></td>

                            <?php } } ?>
                        <td><?php echo $lp->overallScore ?></td>
                        <td><?php echo $lp->expireDate ?></td>
                    </tr>
                    <?php } ?>

                    <tr>
                       <td>Other (Please specify)</td>
                        <td colspan="6"><?php echo $lp->other ?></td>
                    </tr>
                </table>  
                                                                                                                                                                                              
                <table border="0" style="width:100%; margin-top: 15px;">
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
                                                                                                                                                                                              
                <table border="0" style="width:100%; margin-top: 15px; page-break-before: always">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4">
                            <b>Section E</b> <b style="margin-left: 200px;">Finance</b>
                        </td>

                    </tr> 
                    <?php foreach ($finance as $f) {?>
                    <tr>
                        <td style="width: 25%;">Source of Finance:</td>
                        <td colspan="3"><input type="checkbox" <?php if ($f->sourceOfFinance == 'slc') {echo "checked=checked";}?> >  SLC &nbsp;
                            <input type="checkbox" <?php if ($f->sourceOfFinance == 'own') {echo "checked=checked";}?> >  Own Funding &nbsp;
                            <input type="checkbox" <?php if ($f->sourceOfFinance == 'sponsor') {echo "checked=checked";}?> >  Sponsorship
                            
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4"><b>Name and address of person or organisation of sponsorship</b></td>
                    </tr>
                    
                    <tr>
                        <td>Name</td>
                        <td style="" colspan="3"><?php echo  $f->title." ".$f->name ?></td>

                    </tr>
                    <tr>
                        <td colspan="">Relation</td>
                        <td colspan="3"><?php echo  $f->relation ?></td>

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

                <table border="0" style="width:100%; margin-top: 15px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4">
                            <b>Section F</b> <b style="margin-left: 200px;">Equal oppurtunities Monitoring</b>
                        </td>
                    </tr> 
                    <tr>
                        <td colspan="4">( Please put cross (X) in appropriate box )</td>
                    </tr>

                   <?php foreach ($equaloppurtunitiesgroup as $eog) {
                        if ($eog->opportunityTitle == 'Ethnicity' ){
                            $n = 0 ;
                            foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {
                                if ($eosub->fkGroupId == $eog->id  ){$n++; }}

                        ?>
                                        <tr>
                                            <td colspan="4"><b>Ethnicity</b></td>
                                        </tr>

                                    <tr style="width: 100%">
                                        <td colspan="2">
                                       <?php $count = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {

                                           if ($eosub->fkGroupId == $eog->id  ){ ?>

                                       <?php  if ($count==(round($n/2))){ ?></td> <td colspan="2"> <?php }
                                           ?>
                                            <?php foreach ( $personequaloppurtunities as $po) { if ($po->opportunityTitle == 'Ethnicity'){ ?>

                                                   <input type="checkbox" <?php if ($po->fkEqualOpportunitySubGroupId == $eosub->id) {echo "checked=checked";}?> > <?php echo $eosub->subGroupTitle ?> <br>
                                                <?php }} ?>

                                       <?php $count++; ?>  <?php } } ?>
                                        </td>
                                    </tr>

                        <?php
                            break;
                        } } ?>

                </table>
                

                <table border="0" style="width:100%; margin-top: 15px;">

                    <?php foreach ($equaloppurtunitiesgroup as $eog) {
                        if ($eog->opportunityTitle == 'Disability' ){
                            $n = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {
                                if ($eosub->fkGroupId == $eog->id  ){$n++; }}

                            ?>
                            <tr>
                                <td colspan="2"><b>Disabilities</b></td>
                            </tr>

                            <tr style="width: 100%">
                                <td>
                                    <?php $count = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {

                                    if ($eosub->fkGroupId == $eog->id  ){ ?>

                                    <?php  if ($count==round($n/2)){ ?> <td> <?php }
                                    ?>

                                    <?php foreach ( $personequaloppurtunities as $po) { if ($po->opportunityTitle == 'Disability'){ ?>

                                        <input type="checkbox" <?php if ($po->fkEqualOpportunitySubGroupId == $eosub->id) {echo "checked=checked";}?>><?php echo $eosub->subGroupTitle ?> <br>
                                    <?php }} ?>



                                    <?php $count++; ?>  <?php } }?>
                                </td>
                            </tr>


                    <tr>
                        <td  colspan="2" style="width: 50%;"><span style="margin-right: 100px;">If disabled, are you receiving any Disability Allowances ? </span>

                            <?php foreach ( $personequaloppurtunities as $po) { if ($po->opportunityTitle == 'Disability'){ ?>



                             <input type="checkbox"  <?php if ($po->disabilityAllowance == '1') {echo "checked=checked";}?> >  Yes
                            <input type="checkbox" <?php if ($po->disabilityAllowance == '0') {echo "checked=checked";}?> >  No
                            <input type="checkbox" <?php if ($po->disabilityAllowance == '2') {echo "checked=checked";}?> >  Prefer Not to say
                            <?php }} ?>
                        </td>
                    </tr>
                            <?php
                            break;
                        } } ?>
                </table>

                <table border="0" style="width:100%; margin-top: 15px;page-break-before: always ">


                    <?php foreach ($equaloppurtunitiesgroup as $eog) {
                        if ($eog->opportunityTitle == 'Religion Belief' ){
                            $n = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {
                                if ($eosub->fkGroupId == $eog->id  ){$n++; }}

                            ?>
                            <tr>
                                <td colspan="2"><b>Religion Belief</b></td>
                            </tr>

                            <tr style="width: 100%">
                                <td>
                                    <?php $count = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {

                                    if ($eosub->fkGroupId == $eog->id  ){ ?>

                                    <?php  if ($count==round($n/2)){ ?> <td> <?php }
                                    ?>

                                    <?php foreach ( $personequaloppurtunities as $po) { if ($po->opportunityTitle == 'Religion Belief'){ ?>

                                        <input type="checkbox" <?php if ($po->fkEqualOpportunitySubGroupId == $eosub->id) {echo "checked=checked";}?>><?php echo $eosub->subGroupTitle ?> <br>
                                    <?php }} ?>



                                    <?php $count++; ?>  <?php } }?>
                                </td>
                            </tr>

                            <?php
                            break;
                        } } ?>


                </table>

                <table border="0" style="width:100%; margin-top: 15px;">

                    <?php foreach ($equaloppurtunitiesgroup as $eog) {
                        if ($eog->opportunityTitle == 'Sexual Orientation' ){
                            $n = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {
                                if ($eosub->fkGroupId == $eog->id  ){$n++; }}

                            ?>
                            <tr>
                                <td colspan="2"><b>Sexual Orientation</b></td>
                            </tr>

                            <tr style="width: 100%">
                                <td>
                                    <?php $count = 0 ;foreach ($equaloppurtunitiesgroupsubgroup as $eosub) {

                                    if ($eosub->fkGroupId == $eog->id  ){ ?>

                                    <?php  if ($count==round($n/2)){ ?> <td> <?php }
                                    ?>

                                    <?php foreach ( $personequaloppurtunities as $po) { if ($po->opportunityTitle == 'Sexual Orientation'){ ?>

                                        <input type="checkbox" <?php if ($po->fkEqualOpportunitySubGroupId == $eosub->id) {echo "checked=checked";}?>><?php echo $eosub->subGroupTitle ?> <br>
                                    <?php }} ?>



                                    <?php $count++; ?>  <?php } }?>
                                </td>
                            </tr>

                            <?php
                            break;
                        } }   ?>



                </table> 
                

                
                <table border="0" style="width:100%; margin-top: 15px; ">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4"> <b>Section G</b> <b style="margin-left: 200px;">Referees</b></td>
                    </tr> 

                </table> 
                <table border="0" style="width:100%;">
                    <?php $count = 1;foreach ($referees as $cr) {?>
                    <tr>
                        <td colspan="4"><b>Referee <?php echo $count ?></b></td>
                    </tr>

                    <tr>
                        <td>Name</td>
                        <td colspan="3"><?php echo $cr->title." ".$cr->name?></td>

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
                        <td style="border: none;">
                            I confirm that to the best of my knowledge, the information given in this form is correct and complete. I have read the terms and conditions of the College (see www.iconcollege.ac.uk) and agree to abide by them during my entire course of study. I agree to ICON College of Technology and Management processing personal data submitted in this application form, or any other data that the College may obtain from me, for any purposes connected with my studies or my health and safety, or for any other legitimate reason (in accordance with the Data Protection Act <?php echo date('Y');?> ). I authorise ICON College to issue my course result to my sponsor if my sponsor so requests. The application form and copies of all supporting documents will be retained by ICON College in case of an unsuccessful application for admission.
                        </td>
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

                <table border="0" style="width:100%; margin-top: 20px; border: none; page-break-before: always">
                    <tr>
                        <td style="border: none;">
                            Note: All decisions by the College are taken in good faith on the basis of the statements made on your application form. If the College discovers that you have made a false statement or have omitted significant information on your application form, for example in examination results, it may withdraw or amend its offer, or terminate your registration, according to the circumstances. You have the right to appeal or make a complaint if your application has been rejected (see admissions and enrolment policies on the College website). The information given on this application form will be electronically stored and used for administrative purposes by the College in accordance with the provisions of the Data Protection Act <?php echo date('Y');?>.
                        </td>
                    </tr>

                </table> 

                
                <table border="0" style="width:100%; margin-top: 15px;">
                    <tr style="background: #B0DBF0;">
                        <td colspan="4"> <b>FOR OFFICE USE ONLY</b></td>
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
                </table></div></div></body></html>




