<?php include("header.php"); ?>
<head>
    <style>
        .owl-stage{
            margin: 0 auto;
        }
    </style>


</head>

<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>

            <?php foreach ($home as $hm) {?>
                <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->slideImage1?>" alt="slider-image">

                    <div id="verticaldata" class="tp-caption sft desc-slide center color-white color-full" data-x="1000" data-y="479" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        <div  class="title main-color-1 font-2"style="margin-top:-15px"><?php echo $hm->slideText1;?></div>
                    </div>

                    <!-- arrow code in "revolution-slider.css:2438". its hidden now -->

                </li>

                <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->slideImage2?>" alt="slider-image">

                    <div id="verticaldata" class="tp-caption sft desc-slide center color-white color-full" data-x="1000" data-y="479" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        <div  class="title main-color-1 font-2" style="margin-top:-15px"><?php echo $hm->slideText2;?></div>
                    </div>
                </li>

                <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                    <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->slideImage3?>" alt="slider-image">

                    <div id="verticaldata" class="tp-caption sft desc-slide center color-white color-full" data-x="1000" data-y="479" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                        <div  class="title main-color-1 font-2" style="margin-top:-15px"><?php echo $hm->slideText3;?></div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div> <!-- /.tp-banner-container -->

<div class="header-overlay-content header-overlay-scroller">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <section class="un-post-scroller un-post-scroller-2901 " data-delay="0">
                    <div class="section-inner-no-padding">
                        <div class="post-scroller-wrap">
                            <div class="post-scroller-carousel" data-next=".post-scroller-down" data-prev=".post-scroller-up">

                                <div class="post-scroller-carousel-inner">
                                    <?php foreach ($home as $hm) {?>
                                        <div class="item post-scroller-item active">
                                            <div class="scroller-item-inner">
                                                <div class="scroller-item-content post-item-mini">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 post-thumbnail-mini">
                                                            <div class="item-thumbnail">
                                                                <a href="<?php echo $hm->verticalBarLink1?>">
                                                                    <!--                                                                    <img  style="width: 80px;height: 80px" src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->verticalBarImage1?><!--" alt="image">-->
                                                                    <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->verticalBarImage1,'80','80')); ?>" alt="image">
                                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                            <h4><a class="post-title-mini main-color-1-hover" href="<?php echo $hm->verticalBarLink1?>" target="_blank" title="<?php echo $hm->verticalBarTitle1?>"><?php echo $hm->verticalBarTitle1?></a></h4>
                                                            <div class="post-excerpt-mini"><?php echo $hm->verticalBarText1?></div>
                                                        </div>
                                                    </div>
                                                </div><!--/post-item-mini-->
                                            </div>
                                        </div><!--/post-scroller-item-->

                                        <div class="item post-scroller-item">
                                            <div class="scroller-item-inner">
                                                <div class="scroller-item-content post-item-mini">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 post-thumbnail-mini">
                                                            <div class="item-thumbnail">
                                                                <a href="<?php echo $hm->verticalBarLink2?>">
                                                                    <!--                                                                    <img  style="width: 80px;height: 80px"src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->verticalBarImage2?><!--" alt="image">-->
                                                                    <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->verticalBarImage2,'80','80')); ?>" alt="image">
                                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                            <h4><a class="post-title-mini main-color-1-hover" href="<?php echo $hm->verticalBarLink2?>" target="_blank" title="<?php echo $hm->verticalBarTitle2?>"><?php echo $hm->verticalBarTitle2?></a></h4>
                                                            <div class="post-excerpt-mini"><?php echo $hm->verticalBarText2?></div>
                                                        </div>
                                                    </div>
                                                </div><!--/post-item-mini-->
                                            </div>
                                        </div><!--/post-scroller-item-->

                                        <div class="item post-scroller-item">
                                            <div class="scroller-item-inner">
                                                <div class="scroller-item-content post-item-mini">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 post-thumbnail-mini">
                                                            <div class="item-thumbnail">
                                                                <a href="<?php echo $hm->verticalBarLink3?>">
                                                                    <!--                                                                    <img  style="width: 80px;height: 80px"src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->verticalBarImage3?><!--" alt="image">-->
                                                                    <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->verticalBarImage3,'80','80')); ?>" alt="image">
                                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                            <h4><a class="post-title-mini main-color-1-hover" href="<?php echo $hm->verticalBarLink3?>" title="<?php echo $hm->verticalBarTitle3?>"><?php echo $hm->verticalBarTitle3?></a></h4>
                                                            <div class="post-excerpt-mini"><?php echo $hm->verticalBarText3?></div>
                                                        </div>
                                                    </div>
                                                </div><!--/post-item-mini-->
                                            </div>
                                        </div><!--/post-scroller-item-->

                                        <div class="item post-scroller-item">
                                            <div class="scroller-item-inner">
                                                <div class="scroller-item-content post-item-mini">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 col-xs-4 post-thumbnail-mini">
                                                            <div class="item-thumbnail">
                                                                <a href="<?php echo $hm->verticalBarLink4?>">
                                                                    <!--                                                                    <img  style="width: 80px;height: 80px"src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->verticalBarImage4?><!--" alt="image">-->
                                                                    <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->verticalBarImage4,'80','80')); ?>" alt="image">
                                                                    <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                    <div class="thumbnail-hoverlay-cross"></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                            <h4><a class="post-title-mini main-color-1-hover" href="<?php echo $hm->verticalBarLink4?>" title="<?php echo $hm->verticalBarTitle4?>"><?php echo $hm->verticalBarTitle4?></a></h4>
                                                            <div class="post-excerpt-mini"><?php echo $hm->verticalBarText4?></div>
                                                        </div>
                                                    </div>
                                                </div><!--/post-item-mini-->
                                            </div>
                                        </div><!--/post-scroller-item-->
                                    <?php }?>
                                </div>


                            </div>

                        </div>
                    </div><!--/section-inner-->
                </section><!--/u-post-carousel-->
            </div>
        </div>
    </div>
</div>

<section class="flat-row no-padding">
    <div class="flat-fluid">
        <div class="container">
            <div class="row">
                <?php foreach ($home as $hm) {?>
                    <div class="col-md-4">
                        <div class="post">
                            <h1 class="title"><?php echo $hm->middleBannerTitle1?></h1>
                            <p><?php echo $hm->middleBannerText1?></p>
                            <a class="flat-button button-button_30 btn-default " href="<?php echo $hm->middleBannerLink1?>" data-delay="0">VIEW MORE <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="post">
                            <h1 class="title"><?php echo $hm->middleBannerTitle2?></h1>
                            <p><?php echo $hm->middleBannerText2?></p>
                            <a class="flat-button button-button_30 btn-default " href="<?php echo $hm->middleBannerLink2?>" data-delay="0">VIEW MORE <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="post">
                            <h1 class="title"><?php echo $hm->middleBannerTitle3?></h1>
                            <p><?php echo $hm->middleBannerText3?></p>
                            <a class="flat-button button-button_30 btn-default " href="<?php echo $hm->middleBannerLink3?>" data-delay="0">VIEW MORE <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                <?php }?>

            </div><!--/row-->

        </div><!--/flat-fluid-->
    </div><!--/container-->
</section><!--/flat-row -->

<section class="flat-row" style="background:url(public/images/parallax/bg-parallax6.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-events">
                    <?php foreach ($home as $hm) {?>
                        <div class="grid-item color-full">
                            <div class="event-item">
                                <div  class="grid-item-content">
                                    <h1 class="title"><?php echo $hm->squareBoxTitle1;?></h1>
                                    <p style="padding-bottom: 48px"></p>

                                    <a class="flat-button" href="<?php echo $hm->squareBoxLink1;?>">VISIT CAMPUS <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage2 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink2;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage2?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage2,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink2;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>

                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink2;?>">
                                                    <h4><?php echo $hm->squareBoxTitle2;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage3 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink3;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage3?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage3,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink3;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>
                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink3;?>">
                                                    <h4><?php echo $hm->squareBoxTitle3;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage4 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink4;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage4?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage4,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink4;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>
                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink4;?>">
                                                    <h4><?php echo $hm->squareBoxTitle4;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage5 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink5;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage5?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage5,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink5;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>
                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink5;?>">
                                                    <h4><?php echo $hm->squareBoxTitle5;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage6 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink6;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage6?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage6,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink6;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>
                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink6;?>">
                                                    <h4><?php echo $hm->squareBoxTitle6;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage7 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink7;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage7?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage7,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink7;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>
                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink7;?>">
                                                    <h4><?php echo $hm->squareBoxTitle7;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>

                        <div class="grid-item">
                            <div class="grid-item-inner">
                                <div class="event-item">
                                    <div class="event-thumbnail">
                                        <?php if ($hm->squareBoxImage8 != null){?>
                                        <a href="<?php echo $hm->squareBoxLink8;?>">
                                            <!--                                            <img  src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->squareBoxImage8?><!--" alt="image">-->
                                            <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->squareBoxImage8,'235','286')); ?>">
                                            <?php }else{?>
                                            <a href="<?php echo $hm->squareBoxLink8;?>"><img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/noImageSqureBox.jpg" alt="image">
                                                <?php }?>
                                    </div><!-- /event-thumbnail -->

                                    <div class="event-overlay">
                                        <div class="cs-post-header">
                                            <div class="cs-category-links">
                                                <a class="overlay-top" href="<?php echo $hm->squareBoxLink8;?>">
                                                    <h4><?php echo $hm->squareBoxTitle8;?></h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /event-overlay -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flat-row padding-small">
    <div class="container">
        <div class="flat-choose-us">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="flat-accordion">
                        <div class="name-toggle">
                            <h2 class="title">News</h2>
                        </div>
                        <span>
                        <?php foreach ($news as $n) {?>
                            <div class="flat-toggle">
                            <div class="toggle-title "><?php echo $n->newsTitle?><br><span style="font-size:13px"><?php echo date('F d, Y',strtotime($n->newsDate)) ?></span></div>
                            <div class="toggle-content">
                                <pre>
                                <?php echo  substr($n->newsContent, 0, 350);?>
                                    <br><p><a href="<?php echo base_url()?>News-Details/<?php echo $n->newsId?>"><button class="btn btn-default">Read More...</button></a></p>
                                </pre>
                            </div>
                        </div><!-- /toggle -->
                        <?php } ?>
                        </span>
                        <br>
                        <div class="name-toggle">
                            <h2 class="title">Event</h2>
                        </div>

                        <?php foreach ($events as $e) {?>
                            <div class="flat-toggle">
                                <div class="toggle-title"><?php echo $e->eventTitle?><br><span style="font-size:13px"><?php echo date('F d, Y',strtotime($e->eventStartDate)) ?></span></div>
                                <div class="toggle-content">
                                    <div class="info">
                                        <?php $asfsf= strip_tags($e->eventContent)?>
                                        <p><?php echo  substr($asfsf, 0, 350);?></p>
                                        <br><p><a href="<?php echo base_url()?>Event-Details/<?php echo $e->eventId?>"><button class="btn btn-default">Read More...</button></a></p>

                                    </div>
                                </div>
                            </div>
                            <!-- /.toggle -->
                        <?php } ?>

                    </div><!-- /.accordion -->
                </div><!--/col-md-6 col-sm-6 -->

                <div class="col-md-4 col-sm-4">
                    <div class="flat-blog">
                        <div class="section-body">
                            <div class="row">
                                <div class="col-md-12 shortcode-blog-item">
                                    <div class="content-pad">
                                        <div class="post-item row">
                                            <div   class="col-md-12 col-sm-12">
                                                <a  class="twitter-timeline"  data-height="750"  href="https://twitter.com/officestudents">Tweets by DfE</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                                            </div>
                                        </div><!--/post-item-->
                                    </div>
                                </div><!--/shortcode-blog-item-->
                            </div><!--/row-->
                        </div>
                    </div>
                </div><!--/col-md-6 col-sm-6 -->
            </div>
        </div>
    </div>
</section>

<section class="flat-row full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-reviews">
                    <div class="flat-causes">
                        <div class="featured-causes" data-item="3" data-nav="false"
                             data-dots="false" data-auto="false">

                            <?php foreach ($feedback as $fb) { ?>
                                <div class="item">
                                    <div class="text">
                                        <p style="color:#fff"><?php echo $fb->feedbackDetails ?></p>
                                    </div>
                                    <div class="title-testimonial">
                                        <div class="thumb-title">
                                            <?php if ($fb->feedbackByPhoto !=null){?>
                                                <!--                                                <img src="--><?php //echo base_url() ?><!----><?php //echo FOLDER_NAME ?><!--/images/feedbackImages/--><?php //echo $fb->feedbackByPhoto?><!--" alt="image">-->
                                                <img src="<?php echo base_url(FOLDER_NAME.'/images/feedbackImages/'.thumb(FOLDER_NAME.'/images/feedbackImages/'.$fb->feedbackByPhoto,'50','65')); ?>" alt="image">
                                            <?php }?>
                                        </div>
                                        <div class="post-title">
                                            <h6 class="title-post"><?php echo $fb->feedbackByName?></h6>
                                            <span><?php echo $fb->feedbackByProfession?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /flat-row -->

<section class="flat-row no-padding-bottom">
    <div class="container-fluid">
        <div class="new-bottom">
            <div class="row">
                <?php foreach ($home as $hm) {?>
                    <div class="news-letter">
                        <h1 class="title"><?php echo $hm->bottomBannerTitle;?></h1>
                        <h4><?php echo $hm->bottomBannerSubTitle;?></h4>
                    </div>
                    <div class="img-news">
                        <!--                        <img src="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/images/homeImage/--><?php //echo $hm->bottomBannerImage ?><!--" alt="image">-->
                        <img src="<?php echo base_url(FOLDER_NAME.'/images/homeImage/'.thumb(FOLDER_NAME.'/images/homeImage/'.$hm->bottomBannerImage,'2000','331')); ?>" alt="image">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class=" bottom-logo-slider owl-carousel owl-theme">-->
<!--            --><?php //foreach ($affiliation as $af) { ?>
<!--                <div class="item">-->

<!--                    <img src="--><?php //echo base_url(FOLDER_NAME.'/images/affiliationImages/'.thumb(FOLDER_NAME.'/images/affiliationImages/'.$af->AffiliationsPhotoPath,'248','103')); ?><!--" alt="image">-->
<!--                </div>-->
<!--            --><?php //} ?>
<!--        </div>-->
<!--        <script>-->
<!--            $(document).ready(function() {-->
<!--                var owl = $('.owl-carousel');-->
<!--                owl.owlCarousel({-->
<!--                    items: 5,-->
<!--                    loop: true,-->
<!--                    margin: 10,-->
<!--                    autoplay: true,-->
<!--                    autoplayTimeout: 2000,-->
<!--                    autoplayHoverPause: false-->
<!--                });-->
<!--                $('.play').on('click', function () {-->
<!--                    owl.trigger('play.owl.autoplay', [1000])-->
<!--                })-->
<!--                $('.stop').on('click', function () {-->
<!--                    owl.trigger('stop.owl.autoplay')-->
<!--                })-->
<!--            })-->
<!--        </script>-->
<!--    </div>-->
<!--</div>-->

<?php include("footer.php"); ?>

</div>
</body>

</html>