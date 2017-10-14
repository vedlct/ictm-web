		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <?php foreach ($coursedetail as $cd) { ?>
                            <h2 class="title">Course Title: <?php echo $cd->courseTitle ?><br><span style="font-size:16px">Course Code: <?php echo $cd->courseCodePearson ?></span></h2>
                            <?php } ?>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li class="home"><a href="#">\ COURSE </a></li>
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
                        <div class="col-md-9">
                            <article class="post-course">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="content-pad single-course-detail">
                                            <div class="course-detail">
                                                <div class="content-content">
                                                	
            
                
                        <ul style="margin-left:0px" class="nav nav-tabs">
                            <?php foreach ($courseSectiondetail as $csd){ ?>
                            <li class=""><a href="<?php echo "#".$csd->courseSectionId ?>" data-toggle="tab"><?php echo $csd->courseSectionTitle ?></a></li>
                            <?php } ?>
                            <?php foreach ($coursedetail as $cd) { ?>
                            <li><a href="<?php echo base_url()?>applyToCourse/<?php echo $cd->courseId?>">APPLY NOW</a></li>
                            <?php }?>
                        </ul>
                
                
                    <div class="tab-content">
                        <?php foreach ($courseSectiondetail as $csd) {?>
                        <div class="tab-pane fade in active" id="<?php echo $csd->courseSectionId ?>">
                        	<div class="course-detail-section">
                            	<h3><?php echo  $csd->courseSectionTitle?></h3>
                                	<div class="content-dropcap">
                                        <?php echo $csd->courseSectionContent ?>
                                    </div>
                            </div>
                        </div>
                        <?php  break ; } ?>

                        <?php foreach ($courseSectiondetail as $csd) { ?>
                            <div class="tab-pane fade in " id="<?php echo $csd->courseSectionId ?>">
                                <div class="course-detail-section">
                                    <h3><?php echo  $csd->courseSectionTitle?></h3>
                                    <div class="content-dropcap">
                                        <?php echo $csd->courseSectionContent ?>
                                    </div>
                                </div>
                            </div>
                            <?php   } ?>

                    </div>

                                                </div><!--/content-content-->
                                            </div><!--/course-detail-->
                                        </div><!--/single-content-detail-->         
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-3">
                            <div class="sidebar">
                            
                            	<div class="table-responsive">
                                	<table class="table table-bordered">
                                    	<thead style="background-color:#841a29">
                                        	<tr>
                                        		<th style="text-align:center; font-size:16px; color:#fff"><strong>KEY INFORMATION</th>
                                        	</tr>
                                        </thead>
                                    	<?php foreach ($coursedetail as $cd) {?>
                                        <tbody>
                                        	<tr>
                                        		<td><strong>Award:</strong>  <?php echo $cd->awardingTitle ?> </td>
                                            </tr>
                                            <tr>
                                                <td><strong>UCAS Code:</strong> <?php echo $cd->courseCodeIcon ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Location:</strong> <?php echo $cd->couseLocation ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Awarding body:</strong>  <?php echo $cd->awardingBody ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Credit Value:</strong> <?php echo $cd->creditValue ?>  </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Course Structure:</strong> <?php echo $cd->courseStructutre ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Accreditation:</strong> <?php echo $cd->accreditationType ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Accreditation No. (QAN):</strong> <?php echo $cd->accreditationNumber ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Duration:</strong> <?php echo $cd->courseDuration ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Academic year:</strong> <?php echo $cd->academicYear ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Mode of Study:</strong> <?php echo $cd->studyMode ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Language of study:</strong> <?php echo $cd->studyLanguage ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Course Fees*:</strong> <?php echo $cd->courseFees ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Timetables:</strong> <?php echo $cd->timeTable?></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div><br>
                                
                                <!--<div class="content-course">
                                	<div class="course-description">
                                    	<div class="course-action">
                                        	<div class="element-pad">
                                            	<a href="application-form.php" class="flat-button">APPLY NOW</a>
                                            </div>
                                        </div>
                                    </div>                              
                                </div><br>-->
                                
                                <div class="widget widget-courses">
                                    <h2 class="widget-title">COURSES LIST</h2>
                                    <?php include("course-sidebar.php"); ?>
                                </div><!-- /widget-posts -->
                                
                            </div><!-- sidebar -->
                        </div><!-- /col-md-3 -->
                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>

    </div>
</body>

<!-- Mirrored from corpthemes.com/html/university/course-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:02:47 GMT -->
</html>