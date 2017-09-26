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

                    <div class=" col-md-3  widget widget-text">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">Key Info & Policies</h2>
                            <div class="menu-others-container">
                                <ul id="menu-others" class="menu">

                                    <?php foreach ($keyinfo as $ki) {
                                        //echo $tm->pageType;
                                        if ($ki->pageType == 'Static Type') {
                                            switch ($ki->pageContent) {
                                                case "course-list.php":
                                                    ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>Course"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "department.php":
                                                    ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>Department"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                case "":
                                                    ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>Course"><?php echo $ki->menuName?></a></li> <?php
                                                    break;
                                                default:
                                            }
                                        }
                                        else if ($ki->pageType == 'Link Type'){
                                            ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo $ki->pageContent?>" target="_blank"><?php echo $ki->menuName?></a></li><?php
                                        } else {
                                            if (empty($ki->pageId)){
                                                ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="#"><?php echo $ki->menuName?></a></li> <?php
                                            }else {
                                                ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url() ?>Page/<?php echo $ki->pageId ?>" ><?php echo $ki->menuName ?></a> </li> <?php
                                            }
                                        }
                                    }
                                    ?>

                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="health-safety.php">Health and Safety</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1307"><a href="#">Prevent Duty</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1308"><a href="#">Equal Opportunity</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1309"><a href="#">Admissions</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1310"><a href="#">Student Handbook</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1310"><a href="#">Office of the Independent Adjudicator (OIA)</a></li>-->
                                    <!--                                        	<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1310"><a href="#">Competitions and Markets Authority (CMA)</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-3  widget widget-nav-menu">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">IMPORTANT LINKS</h2>
                            <div class="menu-others-container">
                                <ul id="menu-others" class="menu">
                                    <?php foreach ($implink as $il) {
                                        if ($il->pageType == 'Static Type') {
                                            switch ($il->pageContent) {
                                                case "course-list.php":
                                                    ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>Course"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "department.php":
                                                    ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>Department"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                case "":
                                                    ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url()?>Course"><?php echo $il->menuName?></a></li> <?php
                                                    break;
                                                default:
                                            }
                                        }
                                        else if ($il->pageType == 'Link Type'){
                                            ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo $il->pageContent?>" target="_blank"><?php echo $il->menuName?></a></li><?php
                                        } else {
                                            if (empty($il->pageId)){
                                                ?> <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="#"><?php echo $il->menuName?></a></li> <?php
                                            }else {
                                                ?><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="<?php echo base_url() ?>Page/<?php echo $il->pageId ?>" target="_blank"><?php echo $il->menuName ?></a> </li> <?php
                                            }
                                        }
                                    }
                                    ?>





                                    <!---->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1306"><a href="#">Students Support</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1307"><a href="#">Students Union</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1308"><a href="#">Accommodation</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1309"><a href="#">Academic Calendar</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1310"><a href="#">HESA Data Return</a></li>-->
                                    <!--                                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1310"><a href="http://www.qaa.ac.uk/reviews-and-reports/provider?UKPRN=10003239" target="_blank">QAA Report</a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-3 border widget widget-text">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">CONTACT</h2>
                            <div class="textwidget">
                                <p>ICON College of Technology and Management<br>
                                    Unit 21-22, 1-13 Adler Street,<br>
                                    London E1 1EG<br>
                                    United Kingdom<br>
                                    Tel: +44 20 7377 2800<br>
                                    Fax: +44 20 7377 0822<br>
                                    E-mail: <a href="mailto:info@iconcollege.com?Subject=Hello" target="_top">info@iconcollege.com</a></p>
                            </div>
                        </div>
                    </div>

                    <div class=" col-md-3  widget widget-flickr">
                        <div class=" widget-inner">
                            <h2 class="widget-title maincolor1">Photo Gallery</h2>
                            <ul class="clearfix">
                                <li class="last">
                                    <div class="thumb images-hover">
                                        <div class="overlay"></div>
                                        <a href="#">
                                            <span><img src="<?php echo base_url()?>public/images/flickr/1.jpg" alt="image"></span>
                                        </a>
                                    </div>
                                </li>
                                <li class="last">
                                    <div class="thumb images-hover">
                                        <div class="overlay"></div>
                                        <a href="#">
                                            <span><img src="<?php echo base_url()?>public/images/flickr/2.jpg" alt="image"></span>
                                        </a>
                                    </div>
                                </li>
                                <li class="last">
                                    <div class="thumb images-hover">
                                        <div class="overlay"></div>
                                        <a href="#">
                                            <span><img src="<?php echo base_url()?>public/images/flickr/3.jpg" alt="image"></span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb images-hover images-hover">
                                        <div class="overlay"></div>
                                        <a href="#">
                                            <span><img src="<?php echo base_url()?>public/images/flickr/4.jpg" alt="image"></span>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <div class="thumb images-hover">
                                        <div class="overlay"></div>
                                        <a href="#">
                                            <span><img src="<?php echo base_url()?>public/images/flickr/5.jpg" alt="image"></span>
                                        </a>
                                    </div>
                                </li>
                                <li class="last">
                                    <div class="thumb images-hover">
                                        <div class="overlay"></div>
                                        <a href="#">
                                            <span><img src="<?php echo base_url()?>public/images/flickr/6.jpg" alt="image"></span>
                                        </a>
                                    </div>
                                </li>
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
                                    ?> <a href="<?php echo base_url()?>Course"><?php echo $bm->menuName?></a> | <?php
                                    break;
                                case "department.php":
                                    ?> <a href="<?php echo base_url()?>Department"><?php echo $bm->menuName?></a> | <?php
                                    break;
                                case "":
                                    ?> <a href="<?php echo base_url()?>Course"><?php echo $bm->menuName?></a> | <?php
                                    break;
                                default:
                            }
                        }
                        else if ($bm->pageType == 'Link Type'){
                            ?><a href="<?php echo $bm->pageContent?>" target="_blank"><?php echo $bm->menuName?></a> | <?php
                        } else {
                            if (empty($bm->pageId)){
                                ?> <a href="#"><?php echo $bm->menuName?></a> | <?php
                            }else {
                                ?><a href="<?php echo base_url() ?>Page/<?php echo $bm->pageId ?>"><?php echo $bm->menuName ?></a> | <?php
                            }
                        }
                    }
                    ?><br>

                    <!---->
                    <!--                            <a href="terms-conditions.php">Terms & Conditions</a>-->
                    <!--                            | <a href="#">Privacy Policy</a>-->
                    <!--                            | <a href="#">Data Protection</a>-->
                    <!--                            | <a href="#">Accessibility</a>-->
                    <!--                            | <a href="#">Site Map</a>-->
                    <!--                            | <a href="#">Cookies</a><br>-->


                    <span style="font-size:11px">© 2017 <a href="#">Icon College</a> - All rights reserved. | Website Designed & Developed by: <a target="_blank" href="http://a2ninfotech.co.uk/">A2N Info Tech Ltd</a>.</span>
                </div>
                <nav class="col-md-6 footer-social">
                    <ul class="social-list">
                        <li>
                            <a href="#" class="btn btn-default social-icon">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default social-icon">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default social-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default social-icon">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default social-icon">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div><!--/row-->
        </div><!--/container-->
    </div>
</footer>

<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.easing.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/smoothscroll.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery-waypoints.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.tweet.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery-validate.js"></script>

<!-- Revolution Slider -->
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/slider.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>public/javascript/switcher.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/javascript/main.js"></script>

<!-- for Application form -->
<script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/retina.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/scripts.js"></script>