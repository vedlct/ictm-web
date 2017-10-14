		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Welcome to Icon College</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li class="home"><a href="#">\ ABOUT </a></li>
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
                                                <div class="content-content">

                                                    <?php foreach ($aboutdata as $ad){
                                                     //echo  $ad->pageContent;
                                                     if ($ad->pageContent !=null){
                                                         echo $ad->pageContent;
                                                     }
                                                     if($ad->pageImage != null){?>
                                                        <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/pageImages/<?php echo $ad->pageImage?>" >
                                                        <?php };
                                                     break;
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <?php foreach ($aboutdata as $ad) {}
                                                        if ($ad->pageSectionId != null){?>
                                                                <ul style="margin-left:0px" class="nav nav-tabs">
                                                                 <?php foreach ($aboutdata as $ad) { ?>
                                                                    <li class=""><a href="<?php echo "#".$ad->pageSectionId?>" data-toggle="tab"><?php echo $ad->pageSectionTitle?></a></li>

                                                                    <?php } ?>
                                                                </ul>


                                                            <div class="tab-content">

                                                               <?php foreach ($aboutdata as $ad) { ?>
                                                                <div class="tab-pane fade in active" id="<?php echo $ad->pageSectionId?>">
                                                                	<div class="course-detail-section">
                                                                        <p><?php echo $ad->pageSectionContent?></p>
                                                                    </div>
                                                                </div>

                                                                <?php
                                                               break;} ?>
                                                                <?php foreach ($aboutdata as $ad) { ?>
                                                                    <div class="tab-pane fade in " id="<?php echo $ad->pageSectionId?>">
                                                                        <div class="course-detail-section">
                                                                            <p><?php echo $ad->pageSectionContent?></p>
                                                                        </div>
                                                                    </div>

                                                                <?php } ?>

                                                            </div>
                                                    <?php }?>
                                                        
                                                                                   
                                                </div><!--/content-content-->
                                            
                                        </div><!--/single-content-detail-->         
                                    </div>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-3">
                        
                            <div class="sidebar">
                            	<div>
                                	<img src="<?php echo base_url()?>public/images/sidebar-banner.png">
                                </div><br>
                                
                                <div class="widget widget-nav-menu">
                                                <div class=" widget-inner">
                                                    <a ><h2 class="widget-title maincolor2" style="background:#841a29; text-align:center; color:#fff">Quick Links</h2></a>
                                                    <div class="menu-main-navigation-container">
                                                        <ul id="menu-main-navigation-1" class="menu">
                                                            <?php foreach ($quicklink as $ql) {
                                                                //echo $tm->pageType;


                                                                if ($ql->pageType == 'Static Type') {

                                                                    switch ($ql->pageContent) {

                                                                        case "course-list.php":
                                                                            ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        case "department.php":
                                                                            ?> <li><a href="<?php echo base_url()?>Department"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        case "faculty-members.php":
                                                                            ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        case "photo-gallery.php":
                                                                            ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        case "news.php":
                                                                            ?> <li><a href="<?php echo base_url()?>News"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        case "event-list.php":
                                                                            ?> <li><a href="<?php echo base_url()?>Events"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        case "contact.php":
                                                                            ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        default:

                                                                    }

                                                                }
                                                                else if ($ql->pageType == 'Link Type'){


                                                                    ?><li class="menu-item"><a href="<?php echo $ql->pageContent?>" target="_blank"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $ql->menuName?></a></li><?php

                                                                } else {

                                                                    if (empty($ql->pageId)){
                                                                        ?> <li class="menu-item"><a href="#"><?php echo $ql->menuName?></a></li> <?php
                                                                    }else {
                                                                        ?><li class="menu-item"><a href="<?php echo base_url() ?>Page/<?php echo $ql->pageId ?>" ><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $ql->menuName ?></a> </li> <?php
                                                                    }
                                                                }

                                                            }
                                                            ?>
<!--                                                            <li class="menu-item"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> Open Days</a></li>   -->
<!--                                                            <li class="menu-item"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> Loans & Maintenances</a></li>         -->
<!--                                                            <li class="menu-item"><a href="course-list.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> Our Courses</a></li>-->
<!--                                                            <li class="menu-item"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> Students Services</a></li>-->
<!--                                                            <li class="menu-item"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> Clearing Students</a></li>-->
<!--                                                            <li class="menu-item"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> Enrol Now</a></li>-->
<!--                                                            <li class="menu-item"><a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i> How to Find Us</a></li>                                   -->
                                                         </ul>
                                                    </div>
                                                </div>
                                  </div>
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