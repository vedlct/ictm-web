		
		<?php include("header.php"); ?>
        <div id="pageMetaAndKeyword">
            <head>
                <?php foreach ($aboutdata as $ad){?>
                    <meta charset="UTF-8">
                    <meta name="description" content="<?php echo $ad->pageMetaData;?>">
                    <meta name="keywords" content="<?php echo $ad->pageKeywords;?>">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <?php break;}?>
            </head>
        </div>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <?php foreach ($pagetype as $pt){?>
                                <a href="<?php echo base_url()?>Page/<?php echo $pt->pageId?>"><h2 class="title"><?php echo $pt->pageTitle;?></h2></a>
                            <?php }?>
                        </div>

                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home</a></li>
                                <?php foreach ($pagetype as $pt){?>
                                <li><a href="<?php echo base_url()?>Page/<?php echo $pt->pageId?>">\ <?php echo $pt->pageTitle;?> </a></li>
                                <?php } ?>
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

                                                     if ($ad->pageContent !=null){
                                                         echo $ad->pageContent;
                                                     }
                                                     if($ad->pageImage != null){?>
                                                        <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/pageImages/<?php echo $ad->pageImage?>"><br><br>
                                                        <?php };
                                                     break;
                                                    }
                                                    ?>

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
                                                                        case "registerInterest.php":
                                                                            ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $ql->menuName?></a></li> <?php
                                                                            break;
                                                                        default:

                                                                    }

                                                                }
                                                                else if ($ql->pageType == 'Link Type'){


                                                                    ?><li class="menu-item"><a href="<?php echo $ql->pageContent?>" target="_blank"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $ql->menuName?></a></li><?php

                                                                } else {

                                                                    if (empty($ql->pageId)){
                                                                        ?> <li class="menu-item"><a href="<?php echo base_url()?>page-not-found"><?php echo $ql->menuName?></a></li> <?php
                                                                    }else {
                                                                        ?><li class="menu-item"><a href="<?php echo base_url() ?>Page/<?php echo $ql->pageId ?>" ><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $ql->menuName ?></a> </li> <?php
                                                                    }
                                                                }

                                                            }
                                                            ?>
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

</html>