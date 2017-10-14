		
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
                                <div class="entry-wrapper">
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
                                                        <h4 style="color: blue" class="text big-text">START</h4>
                                                        <p><?php echo preg_replace("/  /"," - ",date('F d, Y  h:i a',strtotime($eventDetails->eventStartDate)),1);?></p>
                                                        <h4 class="text small-text">Address</h4>
                                                        <?php echo $eventDetails->eventLocation;?>
                                                        <a target="_blank" href="http://maps.google.com/maps?q=<?php echo $eventDetails->eventLocation;?>" class="map-link text">View map <i class="fa fa-angle-right"></i></a>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6">
                                                    	<h4 style="color: blue"class="text big-text">END</h4>
                                                        <p><?php echo preg_replace("/  /"," - ",date('F d, Y  h:i a',strtotime($eventDetails->eventEndDate)),1);?></p>
                                                    </div>
                                                </div><!--/course-info-->

                                                <div class="content-content">
                                                    <div class="content-dropcap v1">
                                                        <p><?php echo $eventDetails->eventContent?></p>
                                                    </div>



                                                    <div class="content-pad v1">
                                                        <ul class="list-inline social-light">
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon" href="http://www.facebook.com/sharer.php?u=<?php echo current_url();?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon" href="https://twitter.com/share?url=<?php echo current_url();?>&amp;text=Event&amp;hashtags=Event" target="_blank"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a class="btn btn-default btn-lighter social-icon" href="https://plus.google.com/share?url=<?php echo current_url();?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo current_url();?>" target="_blank" class="btn btn-default btn-lighter social-icon">
                                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="mailto:?Subject=Event&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo current_url();?>" class="btn btn-default btn-lighter social-icon">
                                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>




                                                </div><!--/content-content-->
                                            </div><!--/course-detail-->
                                        </div><!--/single-content-detail-->         
                                    </div>
                                    <?php } ?>

                                </div>

                                    <div class="simple-navigation">
                                        <div class="row">

                                            <?php if (!empty($previous)){foreach ($previous as $pd){?>
                                            <div class="simple-navigation-item col-md-6 col-sm-6 col-xs-6 main-color-1-bg-hover ">
                                                <a href="<?php echo base_url()?>/Event-Details/<?php echo $pd->eventId;?>" class="maincolor2hover">
                                                    <i class="fa fa-angle-left pull-left"></i>
                                                    <div class="simple-navigation-item-content">
                                                        <span>Previous</span>
                                                        <h4><?php echo $pd->eventTitle;?></h4>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php }}else{?>
                                            <div class="simple-navigation-item col-md-6 col-sm-6 col-xs-6 main-color-1-bg-hover ">
                                                <a class="maincolor2hover">
                                                    <i class="fa fa-angle-left pull-left"></i>
                                                    <div style="padding-bottom: 40px;" class="simple-navigation-item-content">
                                                        <span></span>
                                                        <h4></h4>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php } ?>
                                            <?php if (!empty($next)){foreach ($next as $nd){?>
                                            <div class="simple-navigation-item col-md-6 col-sm-6 col-xs-6 main-color-1-bg-hover ">
                                                <a href="<?php echo base_url()?>/Event-Details/<?php echo $nd->eventId?>" class="maincolor2hover pull-right">
                                                    <i class="fa fa-angle-right pull-right"></i>
                                                    <div class="simple-navigation-item-content">
                                                        <span>Next</span>
                                                        <h4><?php echo $nd->eventTitle;?></h4>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php }}?>
                                        </div>
                                    </div>

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