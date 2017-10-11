		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <?php foreach ($Eventdetails as $eventDetails){?>
                            <h2 class="title"><?php echo $eventDetails->eventTitle?></h2>
                            <?php } ?>
                        </div>
                        <div class="breadcrumbs v1">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li class="home"><a href="#">\ EVENT DETAIL</a></li>
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

                                    <?php foreach ($Eventdetails as $eventDetails){?>
                                    <div class="col-md-4 col-sm-5">
                                        <div class="content-pad single-event-meta">
                                            <div class="item-thumbnail">
                                                <?php if ($eventDetails->eventPhotoPath !=null){?>
                                                <img style="height: 265px;width: 265px" src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/eventImages/<?php echo $eventDetails->eventPhotoPath?>" alt="image">
                                                <?php }else{?>
                                                <img style="height: 265px;width: 265px" src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/eventImages/noImage.jpg" alt="image">
                                                <?php }?>
                                            </div><!--/item-thumbnail-->
                                            <div style="text-align: center" class="event-description">
                                                <?php echo $eventDetails->eventType;?>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="content-pad single-course-detail">
                                            <div class="course-detail">

                                                <div class="course-info row content-pad">
                                                    <div class="col-md-6 col-sm-6 v1">
                                                        <h4 class="text small-text">START</h4>
                                                        <p><?php echo preg_replace("/  /"," - ",date('F d, Y  h:i a',strtotime($eventDetails->eventStartDate)),1);?></p>
                                                        <h4 class="text small-text">Address</h4>
                                                        <?php echo $eventDetails->eventLocation;?>
                                                        <a target="_blank" href="http://maps.google.com/maps?q=<?php echo $eventDetails->eventLocation;?>" class="map-link text">View map <i class="fa fa-angle-right"></i></a>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                    	<h4 class="text small-text">END</h4>
                                                        <p><?php echo preg_replace("/  /"," - ",date('F d, Y  h:i a',strtotime($eventDetails->eventEndDate)),1);?></p>
                                                    </div>
                                                </div><!--/course-info-->

                                                <div class="content-content">
                                                    <div class="content-dropcap v1">
                                                        <p><?php echo $eventDetails->eventContent?></p>
                                                    </div>

                                                    <div class="content-pad calendar-import">
                                                        <a class="flat-button" href="#">+ GOOGLE CALENDAR</a>
                                                        <a href="#" class="flat-button">+ ICAL IMPORT</a>
                                                    </div>

                                                    <div class="content-pad v1">
                                                        <ul class="list-inline social-light">
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon"><i class="fa fa-google-plus"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon"><i class="fa fa-pinterest"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon"><i class="fa fa-vk"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon"><i class="fa fa-envelope"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="event-more-detail">
                                                        <h4>MORE DETAIL</h4>
                                                        <div class="row">
                                                        	<div class="col-md-6">
                                                            	<h6 class="text">Phone</h6>
                                                        		<p><a href="#">098-765-4321</a></p>
                                                            </div>
                                                            <div class="col-md-6">
                                                            	<h6 class="text">Email</h6>
                                                        		<p><a href="#">example@email.com</a></p>
                                                            </div>
                                                        </div>  
                                                    </div>                             
                                                </div><!--/content-content-->
                                            </div><!--/course-detail-->
                                        </div><!--/single-content-detail-->         
                                    </div>
                                    <?php } ?>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-3">
                            <div class="sidebar">
                                
                                <div class="widget widget-posts">
                                    <h2 class="widget-title">EVENTS LIST</h2>
                                    <?php include("event-sidebar.php"); ?>
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

<!-- Mirrored from corpthemes.com/html/university/event-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:01:58 GMT -->
</html>