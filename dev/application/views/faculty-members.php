		
        <?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Teaching Faculty</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li>\ Teaching Faculty</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="flat-row padding-small-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                    	<div class="row">


                            <?php foreach ($facultylist as $listOfFaculty){?>
                        	<div class="col-md-3">
                            	<div class="project-listing">
                                    <div class="project-portfolio v1">
                                        <div class="item">
                                            <div class="thumb-item">
                                                <div   class="item-thumbnail">
                                                    <?php if ($listOfFaculty->facultyImage !=null){?>
                                                    <a href="<?php echo base_url()?>Faculty-details/<?php echo $listOfFaculty->facultyId?>"><img height="360px" width="360px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/facultyImages/<?php echo $listOfFaculty->facultyImage?>" alt="image"></a>
                                                    <?php }else{?>
                                                    <a href="<?php echo base_url()?>Faculty-details/<?php echo $listOfFaculty->facultyId?>"><img height="360px" width="360px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/facultyImages/dummy_profile.PNG" alt="image"></a>
                                                    <?php } ?>
                                                </div><!-- /item-thumbnail -->
        
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a href="<?php echo base_url()?>Faculty-details/<?php echo $listOfFaculty->facultyId?>"><?php echo $listOfFaculty->facultyTitle." ".$listOfFaculty->facultyFirstName." ".$listOfFaculty->facultyLastName?></a>
                                                    </h3>
                                                    <h4 class="small-text"><?php echo str_replace(","," AND<br>",$listOfFaculty->facultyPosition);?></h4>
                                                    <ul class="list-inline social-light">
                                                        <li><a class="btn btn-default social-icon" target="_blank" href="<?php echo $listOfFaculty->facultyTwitter;?>"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" target="_blank" href="<?php echo $listOfFaculty->facultyLinkedIn;?>"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="mailto:<?php echo $listOfFaculty->facultyEmail;?>"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div><!-- /item-content -->
                                            </div><!-- /thumb-item -->
                                        </div><!-- /item -->
                                     </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div><!-- /col-md-9 -->

                    <div class="col-md-3">
                        <div class="sidebar">

                            <div class="widget widget-courses">
                                    <h2 class="widget-title">COURSES LIST</h2>
                                    <?php include("course-sidebar.php"); ?>
                            </div><!-- /widget-posts -->

                            <div class="widget widget-posts">
                                    <h2 class="widget-title">EVENTS LIST</h2>
                                <?php include("event-sidebar.php"); ?>
                                </div><!-- /widget-posts -->
                        </div><!-- sidebar -->
                    </div><!-- /col-md-3 -->
                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
                 
    </div>
</body>


</html>