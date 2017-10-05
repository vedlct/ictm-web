		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Course List</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li>\ Course List</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->
        
        <section class="flat-row ">
            <div class="container">          
                    <div class="row">


                                <?php foreach ($departmentname as $dp) { ?>
                        <div class="col-md-6">
                            <div class="post-item row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="content-pad">
                                            <div class="item-thumbnail">
<<<<<<< HEAD
                                                <a href="#">
                                                    <img src="<?php echo base_url() ?>public/images/course/business.jpg"
                                                         alt="image">
                                                    <span class="thumbnail-overlay">September 3, 2017</span>
                                                </a>
=======
                                                <?php
                                                if ($dp->departmentImage == null){ ?>

                                                <a href="<?php echo base_url()?>department/<?php echo $dp->departmentId?>">
                                                    <img src="<?php echo base_url() ?>../<?php echo FOLDER_NAME ?>/images/departmentImages/NoImage.jpg" alt="image">
                                                    <span class="thumbnail-overlay">September 3, 2017</span>
                                                </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url()?>department/<?php echo $dp->departmentId?>">
                                                        <img src="<?php echo base_url() ?>../<?php echo FOLDER_NAME ?>/images/departmentImages/<?php echo $dp->departmentImage; ?>" alt="image">
                                                        <span class="thumbnail-overlay">September 3, 2017</span>
                                                    </a>    
                                                <?php } ?>
>>>>>>> 6758b94a3ab101d460a1c670bc2a637fda535109
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="content-pad">
                                            <div class="item-content">
                                                <h3 class="item-title">
<<<<<<< HEAD
                                                    <a href="department.php" title="Your Career Starts Here"
=======
                                                    <a href="<?php echo base_url()?>department/<?php echo $dp->departmentId?>" title="Your Career Starts Here"
>>>>>>> 6758b94a3ab101d460a1c670bc2a637fda535109
                                                       class="main-color-1-hover"><?php echo $dp->departmentName?></a>
                                                </h3>
                                                <?php
                                                foreach ($coourselist as $cl){
                                                if ( $cl->departmentId == $dp->departmentId ){ ?>
<<<<<<< HEAD
                                                <div class="shortcode-blog-excerpt"><strong><a href="course-detail.php">
=======
                                                <div class="shortcode-blog-excerpt"><strong><a href="<?php echo base_url()?>course-details/<?php echo $cl->courseId?>">
>>>>>>> 6758b94a3ab101d460a1c670bc2a637fda535109
                                                            <?php echo $cl->courseTitle ?></a></strong></div>
                                                <?php } } ?>

                                            </div>
                                        </div>
                                    </div>

                              </div><!--/post-item-->
                        </div>
                                <?php } ?>
                    </div> <br> 

            </div>
        </section>

        <?php include("footer.php"); ?>
        
    </div>
</body>

</html>