		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Terms & Conditions</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li class="home"><a href="#">\ Terms & Conditions</a></li>
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
                                                    <?php $count = 1; foreach ($termsdata as $td) {
                                                        echo $td->pageContent;
                                                        if($td->pageImage != null){?>
                                                        <img src="<?php echo base_url() ?>../<?php echo FOLDER_NAME ?>/images/courseImages/<?php echo $td->pageContent?>"  >
                                                        <?php }else ?>
                                                        <h3 id="<?php echo $td->pageSectionId?>"><?php echo $count.". ".$td->pageSectionTitle?></h3>
                                                    <div class="course-detail-section">
                                                       <?php echo $td->pageSectionContent?>
                                                    </div>

                                                    <?php $count++; } ?>
                                            </div><!--/course-detail-->
                                        </div><!--/single-content-detail-->         
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-3">
                            <div class="sidebar">
                            	<div class="widget widget-nav-menu">
                                                <div class=" widget-inner">
                                                    <a href="about.php"><h2 class="widget-title maincolor2" style="background:#841a29; text-align:center; color:#fff">Terms & Conditions</h2></a>
                                                    <div class="menu-main-navigation-container">
                                                        <ul id="menu-main-navigation-1" class="menu">
                                                            <?php foreach ($termsdata as $td){?>
                                                                <li class="menu-item"><a href="<?php echo "#".$td->pageSectionId?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $td->pageSectionTitle?></a></li>
                                                            <?php } ?>
<!--                                                            <li class="menu-item"><a href="#s1"><i class="fa fa-arrow-right" aria-hidden="true"></i> Introduction</a></li>   -->
<!--                                                            <li class="menu-item"><a href="#s2"><i class="fa fa-arrow-right" aria-hidden="true"></i> Applications</a></li>         -->
<!--                                                            <li class="menu-item"><a href="#s3"><i class="fa fa-arrow-right" aria-hidden="true"></i> Immigration</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s4"><i class="fa fa-arrow-right" aria-hidden="true"></i> Conditions of admission and registration</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s5"><i class="fa fa-arrow-right" aria-hidden="true"></i> Deposits</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s6"><i class="fa fa-arrow-right" aria-hidden="true"></i> Tuition fees and other charges</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s7"><i class="fa fa-arrow-right" aria-hidden="true"></i> Your Cancellation rights</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s8"><i class="fa fa-arrow-right" aria-hidden="true"></i> Changes to your taught programme of study</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s9"><i class="fa fa-arrow-right" aria-hidden="true"></i> Changes to your supervision and/or support for your research study</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s10"><i class="fa fa-arrow-right" aria-hidden="true"></i> Educational provision</a></li>-->
<!--                                                            <li class="menu-item"><a href="#11"><i class="fa fa-arrow-right" aria-hidden="true"></i> Complaints procedure</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s12"><i class="fa fa-arrow-right" aria-hidden="true"></i> Liability</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s13"><i class="fa fa-arrow-right" aria-hidden="true"></i> Termination</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s14"><i class="fa fa-arrow-right" aria-hidden="true"></i> Data protection</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s15"><i class="fa fa-arrow-right" aria-hidden="true"></i> Intellectual Property and research integrity</a></li>-->
<!--                                                            <li class="menu-item"><a href="#s16"><i class="fa fa-arrow-right" aria-hidden="true"></i> General</a></li>-->
                                                         </ul>
                                                    </div>
                                                </div>
                                  </div>

                                <div class="widget widget-posts">
                                    <div class="blog-box">
                                        <h2 class="widget-title">LATEST NEWS</h2>
                                        <?php include("latest-news-sidebar.php"); ?>
                                    </div>
                                </div><!-- /widget-posts -->

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
            </div>
        </section>

        <?php include("footer.php"); ?>

    </div>
</body>

<!-- Mirrored from corpthemes.com/html/university/course-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:02:47 GMT -->
</html>