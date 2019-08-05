<!-- affiliation for all page -->
<div class="container">
    <div class="row">
        <div class=" bottom-logo-slider owl-carousel owl-theme">
            <?php foreach ($affiliation as $af) { ?>
                <div class="item">
                    <?php if ($af->AffiliationsPhotoPath !=null){?>
                    <img src="<?php echo base_url(FOLDER_NAME.'/images/affiliationImages/'.thumb(FOLDER_NAME.'/images/affiliationImages/'.$af->AffiliationsPhotoPath,'226','94')); ?>" alt="image">
                <?php }else{ ?>
                        <img src="<?php echo base_url(FOLDER_NAME.'/images/affiliationImages/'.thumb(FOLDER_NAME.'/images/affiliationImages/'."noImage.jpg",'226','94')); ?>" alt="image">

                    <?php } ?>
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
                $('.play').on('click', function () {
                    owl.trigger('play.owl.autoplay', [1000])
                });
                $('.stop').on('click', function () {
                    owl.trigger('stop.owl.autoplay')
                });
            });
        </script>
    </div>
</div>

<!-- affiliation for all page end -->



<footer class="footer full-color">
    <section id="bottom">
        <div class="section-inner">
            <div class="container">
                <div class="row normal-sidebar">
                    <div class=" col-md-3  widget divider-widget">
                        <div class=" widget-inner">
                            <div class="un-heading un-separator">

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-3  widget widget-text" style="margin-top: -1px">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">Key Info & Policies</h2>
                            <div class="menu-others-container">
                                <ul id="menu-others" class="menu">

                                    <?php foreach ($keyinfo as $ki) {
                                        if ($ki->pageType == 'Static Type') {
                                            switch ($ki->pageContent) {
                                                case "course-list.php":
                                                    ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "department.php":
                                                    ?> <li><a href="<?php echo base_url()?>Department"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "faculty-members.php":
                                                    ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "photo-gallery.php":
                                                    ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "news.php":
                                                    ?> <li><a href="<?php echo base_url()?>News"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "event-list.php":
                                                    ?> <li><a href="<?php echo base_url()?>Events"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "contact.php":
                                                    ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "registerInterest.php":
                                                    ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "feedback-form.php":
                                                    ?> <li><a href="<?php echo base_url()?>Feedback"><?php echo $ki->menuName ?></a></li> <?php
                                                    break;
                                                default:
                                            }
                                        }
                                        else if ($ki->pageType == 'Link Type'){
                                            ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo $ki->pageContent?>" target="_blank"><?php echo $ki->menuName?></a></li><?php
                                        } else {
                                            if (empty($ki->pageId)){
                                                ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>page-not-found"><?php echo $ki->menuName?></a></li> <?php
                                            }else {
                                                ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url() ?>Page/<?php echo $ki->pageId ?>" ><?php echo $ki->menuName ?></a> </li> <?php
                                            }
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-3  widget widget-nav-menu" style="margin-top: -2px">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">IMPORTANT LINKS</h2>
                            <div class="menu-others-container">
                                <ul id="menu-others" class="menu">
                                    <?php foreach ($implink as $il) {
                                        if ($il->pageType == 'Static Type') {
                                            switch ($il->pageContent) {
                                                case "course-list.php":
                                                    ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "department.php":
                                                    ?> <li><a href="<?php echo base_url()?>Department"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "faculty-members.php":
                                                    ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "photo-gallery.php":
                                                    ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "news.php":
                                                    ?> <li><a href="<?php echo base_url()?>News"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "event-list.php":
                                                    ?> <li><a href="<?php echo base_url()?>Events"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "contact.php":
                                                    ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "registerInterest.php":
                                                    ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $il->menuName?></a></li><?php
                                                    break;
                                                case "feedback-form.php":
                                                    ?> <li><a href="<?php echo base_url()?>Feedback"><?php echo $il->menuName ?></a></li> <?php
                                                    break;
                                                default:
                                            }
                                        }
                                        else if ($il->pageType == 'Link Type'){
                                            ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo $il->pageContent?>" target="_blank"><?php echo $il->menuName?></a></li><?php
                                        } else {
                                            if (empty($il->pageId)){
                                                ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>page-not-found"><?php echo $il->menuName?></a></li> <?php
                                            }else {
                                                ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url() ?>Page/<?php echo $il->pageId ?>" target="_blank"><?php echo $il->menuName ?></a> </li> <?php
                                            }
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-3 border widget widget-text" style="margin-top: -1px">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">CONTACT</h2>
                            <div class="textwidget">
                                <?php foreach ($contact as $contactInfo){?>
                                    <p><?php echo $contactInfo->collegeName;?> <br>
                                        <?php echo $contactInfo->collegeAddress;?> <br>
                                        Tel: <?php echo $contactInfo->collegeTelephone1;?><br>
                                        Fax: <?php echo $contactInfo->collegeFax;?><br>
                                        E-mail: <a href="mailto:<?php echo $contactInfo->collegeEmail;?>" target="_top"><?php echo $contactInfo->collegeEmail;?></a></p>
                                <?php } ?>
                            </div>

                        </div>
                    </div>

                    <div class=" col-md-3  widget widget-flickr">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">Photo Gallery</h2>

                            <ul class="clearfix">
                                <?php foreach ($photoGalleryForFooter as $photoGallery){?>
                                    <li class="last">
                                        <div class="thumb images-hover">

                                            <a href="<?php echo base_url()?>album-pictures/<?php echo $photoGallery['albumId']?>">
                                                <div class="overlay"></div>

                                                <span><img src="<?php echo base_url(FOLDER_NAME.'/images/photoAlbum/'.$photoGallery['albumTitle'].'/'.thumb(FOLDER_NAME.'/images/photoAlbum/'.$photoGallery['albumTitle'].'/'.$photoGallery['photoName'],'80','60')); ?>"></span>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <div id="bottom-nav">
        <div class="container">
            <div class="link-center">
                <div class="line-under"></div>
                <a class="flat-button go-top-v1 style1" href="#top">TOP</a>
            </div>
            <div class="row footer-content">
                <div class="copyright col-md-6">
                    <?php foreach ($bottom as $bm) {
                        if ($bm->pageType == 'Static Type') {
                            switch ($bm->pageContent) {
                                case "course-list.php":
                                    ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "department.php":
                                    ?> <li><a href="<?php echo base_url()?>Department"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "faculty-members.php":
                                    ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "photo-gallery.php":
                                    ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "news.php":
                                    ?> <li><a href="<?php echo base_url()?>News"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "event-list.php":
                                    ?> <li><a href="<?php echo base_url()?>Events"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "contact.php":
                                    ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "registerInterest.php":
                                    ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $bm->menuName?></a></li> <?php
                                    break;
                                case "feedback-form.php":
                                    ?> <li><a href="<?php echo base_url()?>Feedback"><?php echo $bm->menuName ?></a></li> <?php
                                    break;
                                default:
                            }
                        }
                        else if ($bm->pageType == 'Link Type'){
                            ?><a href="<?php echo $bm->pageContent?>" target="_blank"><?php echo $bm->menuName?></a> | <?php
                        } else {
                            if (empty($bm->pageId)){
                                ?> <a href="<?php echo base_url()?>page-not-found"><?php echo $bm->menuName?></a> | <?php
                            }else {
                                ?><a href="<?php echo base_url() ?>Page/<?php echo $bm->pageId ?>"><?php echo $bm->menuName ?></a> | <?php
                            }
                        }
                    }
                    ?><br>



                    <span style="font-size:11px">© <?php echo date("Y"); ?> <a href="#">Icon College</a> - All rights reserved. | Website Designed & Developed by: <a target="_blank" href="http://a2ninfotech.co.uk/">A2N Info Tech Ltd</a>.</span>
                </div>
                <nav class="col-md-6 footer-social">
                    <?php foreach ($contact as $contactInfo){?>
                        <ul class="social-list">
                            <li>
                                <a target="_blank" href="<?php echo $contactInfo->collegeFacebook;?>" class="btn btn-default social-icon">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo $contactInfo->collegeYoutube;?>" class="btn btn-default social-icon">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo $contactInfo->collegeTwitter;?>" class="btn btn-default social-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo $contactInfo->collegeGoogle;?>" class="btn btn-default social-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="<?php echo $contactInfo->collegeLinkedIn;?>" class="btn btn-default social-icon">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </nav>
            </div><!--/row-->
        </div><!--/container-->
    </div>
</footer>

<!-- Javascript -->

<script type="text/javascript" src="<?php echo base_url()?>public/javascript/bootstrap.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.easing.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->


<script type="text/javascript" src="<?php echo base_url()?>public/javascript/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/owl.carousel.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>public/javascript/parallax.js"></script>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>-->

<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery-waypoints.js"></script>
<!--<script type="text/javascript" src="--><?php //echo base_url()?><!--public/javascript/jquery.tweet.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery-validate.js"></script>

<!-- Revolution Slider -->
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/slider.js"></script>

<!--        <script type="text/javascript" src="--><?php //echo base_url()?><!--public/javascript/switcher.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/main.js"></script>

<!--        <script src="--><?php //echo base_url()?><!--public/javascript/retina.min.js"></script>-->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!-- datePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>