
<?php include("header.php"); ?>

<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>

            <?php foreach ($home as $hm) {?>
            <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->slideImage1?>" alt="slider-image">

                <div class="tp-caption sft desc-slide center color-white color-full" data-x="1000" data-y="479" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                    <div class="title main-color-1 font-2"><?php echo $hm->slideText1;?></div>
                </div>

                <!-- arrow code in "revolution-slider.css:2438". its hidden now -->

            </li>

            <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->slideImage2?>" alt="slider-image">

                <div class="tp-caption sft desc-slide center color-white color-full" data-x="1000" data-y="479" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                    <div class="title main-color-1 font-2" style="margin-top:-15px"><?php echo $hm->slideText2;?></div>
                </div>
            </li>

            <li data-transition="slideleft" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->slideImage3?>" alt="slider-image">

                <div class="tp-caption sft desc-slide center color-white color-full" data-x="1000" data-y="479" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
                    <div class="title main-color-1 font-2"><?php echo $hm->slideText3;?></div>
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
                                                            <a href="#">
                                                                <img style="height: 80px;width: 80px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->verticalBarImage1?>" alt="image">
                                                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                <div class="thumbnail-hoverlay-cross"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                        <h4><a class="post-title-mini main-color-1-hover" href="<?php echo base_url()?><?php echo FOLDER_NAME ?>/public/pdf-files/<?php echo $hm->verticalBarLink1?>" target="_blank" title="Prospectus"><?php echo $hm->verticalBarTitle1?></a></h4>
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
                                                            <a href="#">
                                                                <img style="height: 80px;width: 80px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->verticalBarImage2?>" alt="image">
                                                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                <div class="thumbnail-hoverlay-cross"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                        <h4><a class="post-title-mini main-color-1-hover" href="<?php echo base_url()?><?php echo FOLDER_NAME ?>/public/pdf-files/<?php echo $hm->verticalBarLink2?>" target="_blank" title="Apply Online"><?php echo $hm->verticalBarTitle2?></a></h4>
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
                                                            <a href="#">
                                                                <img style="height: 80px;width: 80px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->verticalBarImage3?>" alt="image">
                                                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                <div class="thumbnail-hoverlay-cross"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                        <h4><a class="post-title-mini main-color-1-hover" href="<?php echo $hm->verticalBarLink3?>" title="Register Interest"><?php echo $hm->verticalBarTitle3?></a></h4>
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
                                                            <a href="#">
                                                                <img style="height: 80px;width: 80px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/homeImage/<?php echo $hm->verticalBarImage4?>" alt="image">
                                                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                <div class="thumbnail-hoverlay-cross"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8 col-xs-8 post-content-mini">
                                                        <h4><a class="post-title-mini main-color-1-hover" href="<?php echo $hm->verticalBarLink4?>" title="Contact Us"><?php echo $hm->verticalBarTitle4?></a></h4>
                                                        <div class="post-excerpt-mini"><?php echo $hm->verticalBarText4?></div>
                                                    </div>
                                                </div>
                                            </div><!--/post-item-mini-->
                                        </div>
                                    </div><!--/post-scroller-item-->
                                    <?php }?>
                                </div>

                            </div>
                            <div class="post-scroller-control">
                                        <span class="post-scroller-button-wrap">
                                            <a class="btn btn-primary post-scroller-button post-scroller-down" href="#"><i class="fa fa-angle-down"></i></a>
                                            <a class="btn btn-primary post-scroller-button post-scroller-up" href="#"> <i class="fa fa-angle-up"></i></a>
                                        </span>
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
                    <div class="grid-item color-full">
                        <div class="event-item">
                            <div class="grid-item-content">
                                <h1 class="title">You Are Welcome</h1>
                                <p>Cras site amet nibh libero, in gravida nulla dignissimos</p>
                                <a class="flat-button" href="#">VISIT CAMPUS <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="grid-item">
                        <div class="grid-item-inner">
                            <div class="event-item">
                                <div class="event-thumbnail">
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/1.jpg" alt="image">
                                    </a>
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>Why ICON College</h4>
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
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/2.jpg" alt="image">
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>Students Loans & Maintenance</h4>
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
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/3.jpg" alt="image">
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>Enrol Now</h4>
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
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/4.jpg" alt="image">
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>Fees</h4>
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
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/5.jpg" alt="image">
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>Clearing Students</h4>
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
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/6.jpg" alt="image">
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>How to Find us</h4>
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
                                    <a href="#"><img src="<?php echo base_url()?>public/images/you-are-welcome-images/7.jpg" alt="image">
                                </div><!-- /event-thumbnail -->

                                <div class="event-overlay">
                                    <div class="cs-post-header">
                                        <div class="cs-category-links">
                                            <a class="overlay-top" href="#">
                                                <h4>Admissions</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /event-overlay -->
                            </div>
                        </div>
                    </div>
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
                        <?php foreach ($news as $n) {?>
                        <div class="flat-toggle">
                            <div class="toggle-title "><?php echo $n->newsTitle?><br><span style="font-size:13px"><?php echo date('F d, Y',strtotime($n->newsDate)) ?></span></div>
                            <div class="toggle-content">
                                <?php echo  substr($n->newsContent, 0, 350);?>
                                <br><p><a href="#"><button class="btn btn-default">Read More...</button></a></p>
                            </div>
                        </div><!-- /toggle -->
                        <?php } ?>
                        <br>
                        <div class="name-toggle">
                            <h2 class="title">Event</h2>
                        </div>
                        <?php foreach ($events as $e) {?>
                        <div class="flat-toggle">
                            <div class="toggle-title"><?php echo $e->eventTitle?><br><span style="font-size:13px"><?php echo date('F d, Y',strtotime($e->eventStartDate)) ?></span></div>
                            <div class="toggle-content">
                                <div class="info">
                                    <p class="desc-info"> <?php echo  substr($e->eventContent, 0, 350);?></p>
                                    <br><p><a href="#"><button class="btn btn-default">Read More...</button></a></p>
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
                                            <div class="col-md-12 col-sm-12">
                                                <a class="twitter-timeline" data-height="750" href="https://twitter.com/educationgovuk">Tweets by DfE</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
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
                                        <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/feedbackImages/<?php echo $fb->feedbackByPhoto?>" alt="image">
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
                <div class="news-letter">
                    <h1 class="title">WE BELIEVE THAT EDUCATION IS FOR EVERYONE</h1>
                    <h4>There are many features available to help you complete your project</h4>
                </div>
                <div class="img-news">
                    <img src="<?php echo base_url()?>public/images/about/index1/11.jpg" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class=" bottom-logo-slider owl-carousel owl-theme">
            <?php foreach ($affiliation as $af) {?>
            <div class="item">
                <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/affiliationImages/<?php echo $af->AffiliationsPhotoPath?>" alt="image">
            </div>
            <?php } ?>
        </div>
        <script>
            $(document).ready(function() {
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    items: 5,
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: false
                });
                $('.play').on('click', function() {
                    owl.trigger('play.owl.autoplay', [1000])
                })
                $('.stop').on('click', function() {
                    owl.trigger('stop.owl.autoplay')
                })
            })
        </script>
    </div>
</div>

<?php include("footer.php"); ?>

</div>
</body>

</html>