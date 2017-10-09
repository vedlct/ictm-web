		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Health & Safety</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li class="home"><a href="#">\ Health & Safety</a></li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="main-content course-single">
            <div class="container">
                <div class="content-course">
                    <div class="row">
                    <div class="col-md-3">
                            <div class="sidebar">
                            	<div class="widget widget-nav-menu">
                                                <div class=" widget-inner">
                                                    <a href="about.php"><h2 class="widget-title maincolor2" style="background:#841a29; text-align:center; color:#fff">Health & Safety</h2></a>
                                                    <div class="menu-main-navigation-container">
                                                        <ul id="menu-main-navigation-1" class="menu">

                                                            <?php
                                                            foreach ($healthdata as $ad) {}
                                                            if ($ad->pageSectionId != null){
                                                            foreach ($healthdata as $hd){
                                                                ?><li class="menu-item"><a href="<?php echo "#".$hd->pageSectionId?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $hd->pageSectionTitle?></a></li><?php
                                                            }}?>
<!--                                                            <li class="menu-item"><a href="#s1"><i class="fa fa-arrow-right" aria-hidden="true"></i> Aims</a></li>   -->
<!--                                                            <li class="menu-item"><a href="#s2"><i class="fa fa-arrow-right" aria-hidden="true"></i> Responsibilities of the College</a></li>         -->
<!--                                                            <li class="menu-item"><a href="#s3"><i class="fa fa-arrow-right" aria-hidden="true"></i> Responsibilities of managers and supervisors</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s4"><i class="fa fa-arrow-right" aria-hidden="true"></i> Responsibilities of students, trainees, agents and employees</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s5"><i class="fa fa-arrow-right" aria-hidden="true"></i> Responsibilities of safety representatives</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s6"><i class="fa fa-arrow-right" aria-hidden="true"></i> Administration</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s7"><i class="fa fa-arrow-right" aria-hidden="true"></i> Emergency Evacuation Procedure</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s8"><i class="fa fa-arrow-right" aria-hidden="true"></i> Fire regulations</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s9"><i class="fa fa-arrow-right" aria-hidden="true"></i> Fire prevention</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s10"><i class="fa fa-arrow-right" aria-hidden="true"></i> Health and safety notices</a></li>-->
<!--                                                            <li class="menu-item"><a href="#11"><i class="fa fa-arrow-right" aria-hidden="true"></i> Calling the Fire Brigade</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s12"><i class="fa fa-arrow-right" aria-hidden="true"></i> Golden rules for your safety in the event of an emergency</a></li>-->
                                                         </ul>
                                                    </div>
                                                </div>
                                  </div>
    
                            </div><!-- sidebar -->
                        </div><!-- /col-md-3 -->
                        <div class="col-md-9">
                        	
                            <article class="post-course">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-pad single-course-detail">
                                            <div class="course-detail">
                                                <div class="content-content course-detail-section">
                                                    <?php
                                                    foreach ($healthdata as $hd){

                                                        if ($hd->pageContent !=null){
                                                            echo $hd->pageContent;
                                                        }
                                                        if($hd->pageImage != null) {?>
                                                            <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/pageImages/<?php echo $hd->pageImage ?>">
                                                            <?php
                                                        }
                                                        break;
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <?php
                                                    foreach ($healthdata as $ad) {}
                                                    if ($ad->pageSectionId != null){
                                                    foreach ($healthdata as $hd) {
                                                        ?>
                                                        <h3 id="<?php echo $hd->pageSectionId?>"><?php echo $hd->pageSectionTitle?></h3>

                                                        <?php
                                                        echo $hd->pageSectionContent;
                                                    }}
                                                    ?>
<!--                                                    <h3 id="s2">-->
<!--                      Responsibilities of the College</h3>-->
<!--                      • To work towards the achievement of these policy -->
<!--                      aims.<br>-->
<!--                      • To provide appropriate training, advice, protective -->
<!--                      clothing, equipment and documentation as is necessary or -->
<!--                      advisable.<br>-->
<!--                      • To carry out assessment of risks and endeavour to -->
<!--                      reduce or eliminate these risks.<br>-->
<!--                      • To provide written systems of work for all and any -->
<!--                      procedures which are exposed to hazard.<br>-->
<!--                      • To record notification of hazards and accidents -->
<!--                      and incorporate improvements suggested as a result of investigations -->
<!--                      conducted following such notifications as soon as possible.<br><br>-->
<!--                      <h3 id="s3">-->
<!--                      Responsibilities of managers and supervisors</h3>-->
<!--                      • To be personally responsible for the execution of -->
<!--                      the safety policy as far as the department/employees for -->
<!--                      which he/she is responsible.<br>-->
<!--                      • To be personally responsible, as far as reasonably -->
<!--                      practicable, for the safety of all persons working in or -->
<!--                      visiting his/her department, and for all equipment under -->
<!--                      his/her control.<br>-->
<!--                      • To ensure, in the event of any accident, prompt -->
<!--                      and appropriate first aid is administered, and that further -->
<!--                      medical assistance is obtained if necessary, the circumstances -->
<!--                      of the incident are investigated and reported, and that -->
<!--                      recommendations made as a result of an investigation are -->
<!--                      implemented.<br>-->
<!--                      • To ensure the workplace safety folder is kept and -->
<!--                      displayed, its contents are brought to the attention of -->
<!--                      every employee, and all employees are conversant with such -->
<!--                      data.<br>-->
<!--                      • To ensure protective clothing/equipment is used -->
<!--                      at all times where and when necessary.<br><br>-->
<!--                      <h3 id="s4">-->
<!--                      Responsibilities of students, trainees, agents and employees</h3>-->
<!--                      • To ensure that students, trainees agents and employees -->
<!--                      (on site) are conversant with the accident/hazard reporting -->
<!--                      procedure and that notification of hazards is passed to -->
<!--                      the appropriate person for action.<br>-->
<!--                      • To make them familiar with and adhere to safety -->
<!--                      procedures, including the fire alarm procedure and evacuation -->
<!--                      route(s).<br>-->
<!--                      • To wear protective clothing/equipment at all times -->
<!--                      when necessary, and to report any defects in such clothing/equipment -->
<!--                      to their supervisor.<br>-->
<!--                      • To report all accidents/incidents to a supervisor, -->
<!--                      and to carry out instructions given by a supervisor.<br>-->
<!--                      • To report all safety and health hazards and machinery -->
<!--                      defects using the hazard report procedure.<br>-->
<!--                      • To co-operate with the organisation at all times -->
<!--                      on matters of safety.<br><br>-->
<!--                      <h3 id="s5">-->
<!--                      Responsibilities of safety representatives</h3>-->
<!--                      • To assist the employer in the assessment and reduction -->
<!--                      of risk and hazards, by being aware of the implementation -->
<!--                      and effect of procedures and work in the workplace.<br>-->
<!--                      • To advise the employer on matters of concern voiced -->
<!--                      by employees and liaise/help in rectification thereof.<br><br>-->
<!--                      <h3 id="s6">-->
<!--                      Administration</h3>-->
<!--                      The Safety Officer is Nasir Uddin (Extension 28; nas@iconcollege.com) -->
<!--                      and Senior Fire Marshal Waseem Ahammed (Extension 25; waseem@iconcollege.com) -->
<!--                      are responsible for:<br>-->
<!--                      • Preparing, reviewing and updating this policy and -->
<!--                      reporting his activity in these regards to Academic Committee.<br>-->
<!--                      • Accident/hazard reporting procedures<br>-->
<!--                      • Fire and safety procedures and evacuation guidance.<br>-->
<!--                      • Ensuring compliance with the responsibilities laid -->
<!--                      down in this policy statement and reporting any non-compliance -->
<!--                      to senior management for sanctions to be applied.<br>-->
<!--                      • Liaison with Health and Safety Officers, Insurers, -->
<!--                      Factory and Environmental Health Officers, Fire Brigade, -->
<!--                      etc., and ensuring appropriate recommendations are effected.<br>-->
<!--                      • Implementing the requirements of the Reporting of -->
<!--                      Injuries, Diseases and Dangerous Occurrences Regulations -->
<!--                      1995 (RIDDOR)<br>-->
<!--                      • Implementing all other relevant/applicable legislation, -->
<!--                      regulations, and codes of practice or requirements.<br>-->
<!--                      • To further the interest of all involved in the reduction -->
<!--                      and/or elimination of risk,<br>-->
<!--                      or, failing this, of its control.<br>-->
<!--                      • To advise management on safety matters.<br>-->
<!--                      • To assist in the education of employees in operating -->
<!--                      safe working practices.<br>-->
<!--                      • To raise awareness of the need for a high-profile -->
<!--                      safety policy/procedure.<br>-->
<!--                      <br>-->
<!--                      <h3 id="s7">Emergency Evacuation Procedure</h3>-->
<!--                      This statement will be referred to during the induction -->
<!--                      of new students<br>-->
<!--                      According to the Health and Safety at Work Act (1974) and -->
<!--                      reflected in the College’s Health and Safety Policy, -->
<!--                      each individual needs to be aware of evacuation procedures -->
<!--                      in the cases of an emergency and must comply fully with -->
<!--                      them. This part of the Handbook outlines the evacuation -->
<!--                      procedures that ICON College of Technology and Management -->
<!--                      carries out for all people within its responsibilities (employees, -->
<!--                      work placement trainees, students and visitors to the college), -->
<!--                      as well as evacuation procedures carried out by the management -->
<!--                      of the premises occupied by ICON for all occupiers of the -->
<!--                      building. It applies to drills as well as genuine emergencies.<br>-->
<!--                      You should ensure that you have read and understood these -->
<!--                      instructions, as your life and health and that of your colleagues -->
<!--                      and friends may depend on this.<br><br>-->
<!--                      <h3 id="s8">-->
<!--                      Fire regulations</h3>-->
<!--                      <strong>Fire Marshals:</strong><br>-->
<!--                      <br>-->
<!--                      The Fire Marshals are responsible for overseeing the evacuation -->
<!--                      procedures, ensuring that everybody is safe and accounted -->
<!--                      for, and that the premises/ buildings are safe before anyone -->
<!--                      returns to his/ her workstation. They will take the daily -->
<!--                      register to the assembly points to check that all persons -->
<!--                      in attendance, noted in the register, are safely out of -->
<!--                      the building and accounted for. You must know where the -->
<!--                      assembly point is and who the Fire Marshals are, and report -->
<!--                      to them once you have evacuated the building.<br>-->
<!--                      <strong>ICON’s Senior Fire Marshal: </strong>Waseem -->
<!--                      Ahammed (Extension 25; Waseem@iconcollege.com)<br>-->
<!--                      <strong><br>-->
<!--                      Assembly point in cases of emergency evacuation:</strong><br>-->
<!--                      <br>-->
<!--                      <strong>Front of Altab Ali Park in Adler Street </strong>(please -->
<!--                      try not to block the road)<br><br>-->
<!--                      <h3 id="s9">-->
<!--                      Fire prevention</h3>-->
<!--                      -->
<!--                      • Keep all doors, especially fire doors, and walkways -->
<!--                      clear. Do not prop open fire doors.<br>-->
<!--                      • Ensure that all paper rubbish is put into the rubbish -->
<!--                      receptacles provided.<br>-->
<!--                      • Ensure that all staff and students are made aware -->
<!--                      of the health and safety rules and regulations, disciplinary -->
<!--                      procedures, ICON’s and the centre’s rules and -->
<!--                      regulations governing their attendance and behaviour whilst -->
<!--                      on the premises.<br>-->
<!--                      • The building which ICON occupies is an all non-smoking -->
<!--                      environment, Smoking is strictly prohibited in all ICON`s -->
<!--                      premises, as well as the corridors, balconies, hallways -->
<!--                      and entrances of the building.<br><br>-->
<!--                      <h3 id="s10">-->
<!--                      Health and safety notices</h3>-->
<!--                      There are health and safety notices all-round the College -->
<!--                      and in every room in ICON’s premises. You must ensure -->
<!--                      you have read and familiarise yourself with the contents. -->
<!--                      You must also ensure you know where the fire exits, signs -->
<!--                      and the fire extinguishers are.<br>-->
<!--                      Normally it is the premises manager or Fire Marshal in ICON -->
<!--                      who should sound the fire alarm and summon the fire brigade. -->
<!--                      No one else should normally be called upon to fight a fire, -->
<!--                      but in exceptional emergency cases, such as coming upon -->
<!--                      a small fire and tackling it, you need to know which fire -->
<!--                      extinguisher to use and how to tackle the fire.<br>-->
<!--                      Fire extinguisher types: water and CO2.<br>-->
<!--                      Instructions on how to use the fire extinguishers are found -->
<!--                      on the equipment.<br>-->
<!--                      <strong><br>-->
<!--                      If you discover a fire: the emergency plan</strong><br>-->
<!--                      <br>-->
<!--                      • Operate the nearest fire alarm<br>-->
<!--                      • Inform the Fire Marshal or another member of senior -->
<!--                      staff immediately.<br>-->
<!--                      • Attack the fire, if possible, with (appropriate) -->
<!--                      appliances provided, but do not take personal risks.<br><br>-->
<!--                      <h3 id="s11">-->
<!--                      Calling the Fire Brigade</h3>-->
<!--                      -->
<!--                      • This should normally be done by the Fire Marshal -->
<!--                      or another senior member of staff.<br>-->
<!--                      • However, if they are not available and you need -->
<!--                      to call the Fire Brigade, dial 999.<br>-->
<!--                      • Give the operator your telephone number and ask -->
<!--                      for the Fire Brigade.<br>-->
<!--                      • When the Fire Brigade replies, tell them distinctly:<br>-->
<!--                      ‘Fire in ICON College of Technology and Management,<br>-->
<!--                      location: Unit 21-22, 1-13 Adler Street, London E1 1EG’<br>-->
<!--                      • Do not ring off or replace the receiver until the -->
<!--                      Fire Brigade has repeated the address.<br>-->
<!--                      • Leave the building immediately and report to the -->
<!--                      Fire Marshal at the assembly point.<br><br>-->
<!--                      <h3 id="s12">-->
<!--                      Golden rules for your safety in the event of an emergency</h3>-->
<!--                      • Walk! Do not run! You should have enough time to -->
<!--                      get out of the building safely. In the past, deaths and -->
<!--                      serious injuries have occurred when people have given way -->
<!--                      to panic and rushed to evacuate a building. Leave your personal -->
<!--                      property behind.<br>-->
<!--                      • When you arrive at the assembly point, stay with -->
<!--                      your group and do not wander off. Watch out for traffic -->
<!--                      and don`t block the road.<br>-->
<!--                      • When the register is being called, make sure that, -->
<!--                      when your name is called you answer loudly enough to be -->
<!--                      heard clearly.<br>-->
<!--                      • Do not assume that everyone has heard the fire alarm. -->
<!--                      Although your hearing may be perfect, there could be some -->
<!--                      people who haven`t heard the alarm; some may have hearing -->
<!--                      problems. If in doubt, remind people that the fire alarm -->
<!--                      is ringing.<br>-->
<!--                      • Do not re- enter the building until you have been -->
<!--                      told that it is safe by the Fire Marshal.<br>-->
<!--                      <strong><br>-->
<!--                      On hearing the fire alarm:</strong><br>-->
<!--                      <strong><br>-->
<!--                      ICON staff:</strong><br>-->
<!--                      • Stop what you are doing immediately and proceed -->
<!--                      out of the building.<br>-->
<!--                      • Use the nearest available exit.<br>-->
<!--                      • Do not use lifts (except where special arrangements -->
<!--                      exist for disabled people).<br>-->
<!--                      • Do not stop to collect belongings.<br>-->
<!--                      • Leave the building immediately and proceed at once -->
<!--                      to the assembly point.<br>-->
<!--                      <br>-->
<!--                      <strong>ICON Fire Marshal:</strong><br>-->
<!--                      • Co-ordinate actions of ICON staff.<br>-->
<!--                      • Ensure evacuation of offices/ floor proceeds and -->
<!--                      is completed by checking all rooms, lavatories, etc.<br>-->
<!--                      • Close doors and windows to prevent fire spreading. -->
<!--                      Ensure that you collect the daily register record(s)<br>-->
<!--                      • Leave building and check the names of those present -->
<!--                      against the register<br>-->
<!--                      • Report the details of incident and evacuation when -->
<!--                      complete to Senior (Building) Fire Marshal.<br>-->
<!--                      <strong><br>-->
<!--                      Senior Fire Marshal:</strong><br>-->
<!--                      • Ensure the Fire Brigade has been called.<br>-->
<!--                      • Report to assembly point.<br>-->
<!--                      • Record details of incident and evacuation from floor -->
<!--                      to ICON Fire Marshals.<br>-->
<!--                      • Report details to Fire Brigade on arrival.<br>-->
<!--                      • Assist Fire Brigade if requested.<br>-->
<!--                      <br>-->
<!--                      <br>-->
                    </span></font></p>
                                                    
                                                   
                                            </div><!--/course-detail-->
                                        </div><!--/single-content-detail-->         
                                    </div>
                                </div>
                            </article>
                        </div>

                        
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

    </div>
</body>

<!-- Mirrored from corpthemes.com/html/university/course-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:02:47 GMT -->
</html>