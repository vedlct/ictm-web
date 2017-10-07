		
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
                                <li class="home"><a href="#">Home </a></li>
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
                                                <div class="item-thumbnail">
                                                    <a href="faculty-member-detail.php"><img height="360px" width="360px" src="<?php echo base_url()?>../<?php echo FOLDER_NAME ?>/images/facultyImages/dummy_profile.PNG" alt="image"></a>
                                                </div><!-- /item-thumbnail -->
        
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a href="faculty-member-detail.php"><?php echo $listOfFaculty->facultyTitle." ".$listOfFaculty->facultyFirstName." ".$listOfFaculty->facultyLastName;?></a>
                                                    </h3>
                                                    <h4 class="small-text"><?php echo str_replace(","," AND<br>",$listOfFaculty->facultyPosition);?></h4>
                                                    <ul class="list-inline social-light">
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div><!-- /item-content -->
                                            </div><!-- /thumb-item -->
                                        </div><!-- /item -->
                                     </div>
                                </div>
                            </div>
                            <?php } ?>

                        	<div class="col-md-3">
                            	<div class="project-listing">
                                    <div class="project-portfolio v1">
                                        <div class="item">
                                            <div class="thumb-item">
                                                <div class="item-thumbnail">
                                                    <a href="faculty-member-detail.php"><img src="images/faculty-members/dummy_profile.png" alt="image"></a>
                                                </div><!-- /item-thumbnail -->
        
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a href="faculty-member-detail.php">Mr Morris A Anglin</a>
                                                    </h3>
                                                    <h4 class="small-text">Head of Health and Social Care</h4>
                                                    <ul class="list-inline social-light">
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div><!-- /item-content -->
                                            </div><!-- /thumb-item -->
                                        </div><!-- /item -->
                                     </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                            	<div class="project-listing">
                                    <div class="project-portfolio v1">
                                        <div class="item">
                                            <div class="thumb-item">
                                                <div class="item-thumbnail">
                                                    <a href="faculty-member-detail.php"><img src="images/faculty-members/dummy_profile.png" alt="image"></a>
                                                </div><!-- /item-thumbnail -->
        
                                                <div class="item-content">
                                                    <h3 class="item-title">
                                                        <a href="faculty-member-detail.php">Professor Zakir Hossain</a>
                                                    </h3>
                                                    <h4 class="small-text">Professor of Business Management</h4>
                                                    <ul class="list-inline social-light">
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-linkedin"></i></a></li>
                                                        <li><a class="btn btn-default social-icon" href="#"><i class="fa fa-envelope"></i></a></li>
                                                    </ul>
                                                </div><!-- /item-content -->
                                            </div><!-- /thumb-item -->
                                        </div><!-- /item -->
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /col-md-9 -->

                    <div class="col-md-3">
                        <div class="sidebar">

                            <div class="widget widget-courses">
                                    <h2 class="widget-title">COURSES LIST</h2>
                                    <ul class="recent-posts clearfix">
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/dummy-widget-image.png" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">BTEC Level 5 HND in Business</a>
                                                <p>SEPTEMBER 25, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/dummy-widget-image.png" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">BTEC HND in Health and Social Care</a>
                                                <p>SEPTEMBER 25, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/dummy-widget-image.png" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">BTEC HND in Computing and Systems Development</a>
                                                <p>SEPTEMBER 25, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/dummy-widget-image.png" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">BTEC HND in Electrical and Electronic Engineering</a>
                                                <p>SEPTEMBER 25, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/dummy-widget-image.png" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">BTEC Level 5 HND in Travel and Tourism Management</a>
                                                <p>SEPTEMBER 25, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/dummy-widget-image.png" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">BTEC Level 5 HND in Hospitality Management</a>
                                                <p>SEPTEMBER 25, 2017</p>
                                            </div>
                                        </li>
                                    </ul><!-- /popular-news clearfix -->
                                </div><!-- /widget-posts -->

                            <div class="widget widget-posts">
                                    <h2 class="widget-title">EVENTS LIST</h2>
                                    <ul class="recent-posts clearfix">
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/9.jpg" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">Chicago Architecture Foundation River Cruise</a>
                                                <p>JULY 22, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/10.jpg" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">Good Morning America</a>
                                                <p>JULY 30, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/11.jpg" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">Vegie Garden Wednesday Workshops</a>
                                                <p>AUGUST 06, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/12.jpg" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">The Ecosystem Within Us</a>
                                                <p>AUGUST 19, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/13.jpg" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">Science In The New Era</a>
                                                <p>SEPTEMBER 03, 2017</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                                <a href="#">
                                                    <img src="images/blog/widget/13.jpg" alt="image">
                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                </a>
                                            </div>
                                            <div class="text">
                                                <a href="#">How To Sell Anything</a>
                                                <p>NOVEMBER 12, 2017</p>
                                            </div>
                                        </li>
                                    </ul><!-- /popular-news clearfix -->
                                </div><!-- /widget-posts -->
                        </div><!-- sidebar -->
                    </div><!-- /col-md-3 -->
                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
                 
    </div>
</body>

<!-- Mirrored from corpthemes.com/html/university/member.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:02:59 GMT -->
</html>