<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>ICON College</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/stylesheets/bootstrap.css" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/stylesheets/responsive.css">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/stylesheets/color1.css" >

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/stylesheets/animate.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/stylesheets/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>public/stylesheets/owl.theme.default.min.css">

    <!-- for Application Form -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/stylesheets/application-form-style.css">



    <!-- Favicon and touch icons  -->
    <link href="<?php echo base_url()?>public/icon/apple-touch-icon-48-precomposed.php" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?php echo base_url()?>public/icon/apple-touch-icon-32-precomposed.php" rel="apple-touch-icon-precomposed">
    <link href="#" rel="shortcut icon">



    <!--[if lt IE 9]>
        <script src="<?php echo base_url()?>public/javascript/html5shiv.js"></script>
        <script src="<?php echo base_url()?>public/javascript/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/javascript/owl.carousel.js"></script>


</head>

<body class="header-sticky">

    <div class="boxed">

        <div class="menu-hover">
            <div class="btn-menu">
                <span></span>
            </div><!-- //mobile menu button -->
        </div>

        <div class="header-inner-pages">
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar menu-top">
                                <ul class="menu">
                                    <?php foreach ($topmenu as $tm) {
                                        //echo $tm->pageType;


                                        if ($tm->pageType == 'Static Type') {

                                            switch ($tm->pageContent) {
                                                case "course-list.php":
                                                    ?> <li><a href="<?php echo base_url()?>Course"><?php echo $tm->menuName?></a></li> <?php
                                                    break;
                                                case "department.php":
                                                    ?> <li><a href="<?php echo base_url()?>Department"><?php echo $tm->menuName?></a></li> <?php
                                                    break;
                                                case "":
                                                    ?> <li><a href="<?php echo base_url()?>Course"><?php echo $tm->menuName?></a></li> <?php
                                                    break;

                                                default:

                                            }

                                        }
                                        else if ($tm->pageType == 'Link Type'){


                                            ?><li><a href="<?php echo $tm->pageContent?>" target="_blank"><?php echo $tm->menuName?></a></li><?php

                                        } else {

                                            if (empty($tm->pageId)){
                                                ?> <li><a href="#"><?php echo $tm->menuName?></a></li> <?php
                                            }else {
                                                ?><li><a href="<?php echo base_url() ?>Page/<?php echo $tm->pageId ?>" ><?php echo $tm->menuName ?></a> </li> <?php
                                            }
                                        }

                                    }
                                    ?>

                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->

                            <a class="navbar-right search-toggle show-search" href="#">
                                <i class="fa fa-search"></i>
                            </a>

                            <div class="submenu top-search">
                                <form class="search-form">
                                    <div class="input-group">
                                        <input type="search" class="search-field" placeholder="Search Here">
                                        <span class="input-group-btn">
                                            <button type="submit"><i class="fa fa-search fa-4x"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>

                            <div class="navbar-right topnav-sidebar">
                                <ul class="textwidget">
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- col-md-12 -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- Top -->
        </div><!-- header-inner-pages -->

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-wrap">
                <div class="container">
                    <div class="header-wrap clearfix">
                        <div id="logo" class="logo">
                            <a href="<?php echo base_url()?>Home" rel="home">
                                <img src="<?php echo base_url()?>public/images/icon_college_logo.png" alt="image">
                            </a>
                        </div><!-- /.logo -->


                        <div class="nav-wrap">

                            <nav id="mainnav" class="mainnav">
                                <ul class="menu"> 
                                    <li >
                                        <a href="<?php echo base_url()?>Home">Home</a>
                                    </li>
                                    <?php
                                    foreach ($mainmenu as $mn) {
                                        //echo $id = $mn->menuId;
                                        //echo $mn->menuName; ?>
                                        <li >
                                            <a href="<?php echo base_url()?>Home"><?php echo $mn->menuName; ?></a>

                                    <ul class="submenu">
                                            <?php
                                            $id = $mn->menuId;
                                            $this->db->select('menuId, menuName, parentId,pageTitle, ictmpage.pageId,pageType,pageContent ');
                                            $this->db->where('menuType', MENU_TYPE[1]);
                                            $this->db->where('menuStatus', STATUS[0]);
                                            $this->db->where('parentId =', $id);
                                            $this->db->join('ictmpage', 'ictmmenu.pageId = ictmpage.pageId','left');
                                            $query = $this->db->get('ictmmenu');
                                            foreach ($query->result() as $q) {

                                                if ($q->pageType == 'Static Type') {

                                                    switch ($q->pageContent) {
                                                        case "course-list.php":
                                                            ?> <li><a href="<?php echo base_url()?>Course"><?php echo $q->menuName?></a></li> <?php
                                                            break;
                                                        case "department.php":
                                                            ?> <li><a href="<?php echo base_url()?>Department"><?php echo $q->menuName?></a></li> <?php
                                                            break;
                                                        case "":
                                                            ?> <li><a href="<?php echo base_url()?>Course"><?php echo $q->menuName?></a></li> <?php
                                                            break;

                                                        default:

                                                    }

                                                }
                                                else if ($q->pageType == 'Link Type'){


                                                    ?><li><a href="<?php echo $q->pageContent?>" target="_blank"><?php echo $q->menuName?></a></li><?php

                                                } else {

                                                    if (empty($q->pageId)){
                                                        ?> <li><a href="#"><?php echo $q->menuName?></a></li> <?php
                                                    }else {
                                                        ?><li><a href="<?php echo base_url() ?>Page/<?php echo $q->pageId ?>" ><?php echo $q->menuName ?></a> </li> <?php
                                                    }
                                                }

//                                                 ?><!--<li><a href="--><?php //echo base_url()?><!--Home">--><?php //echo $q->menuName; ?><!--</a></li>-->
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                        </li>
                                    <?php
//                                            $this->db->select('menuId, menuName, parentId ');
//                                            $this->db->where('menuType', MENU_TYPE[1]);
//                                            $this->db->where('menuStatus', STATUS[0]);
//                                            $this->db->where('parentId =', $id);
//                                            $query = $this->db->get('ictmmenu');
//                                            foreach ($query->result() as $q) {
//                                                echo $q->menuName;
//                                            }

                                    }
                                    ?>
<!--                                    <li>-->
<!--                                        <a href="#">About</a>-->
<!--                                        <ul class="submenu">-->
<!--                                            <li><a href="--><?php //echo base_url()?><!--Welcome">About ICON College</a></li>-->
<!--                                            <li><a href="#">Board of Directors</a></li>-->
<!--                                            <li><a href="#">College Governance</a></li>-->
<!--                                            <li><a href="#">Organisational Structure</a></li>-->
<!--                                            <li><a href="#">Affiliation & Accreditations</a></li>-->
<!--                                            <li><a href="#">Policies & Procedures</a></li>-->
<!--                                            <li><a href="#">Location and Maps</a></li>-->
<!--                                        </ul><!-- /.submenu -->
<!--                                    </li> -->
<!--                                    <li>-->
<!--                                        <a href="#">Courses</a>-->
<!--                                        <ul class="submenu">-->
<!--                                            <li><a href="--><?php //echo base_url()?><!--Course">Our Courses</a></li>-->
<!--                                            <li><a href="#">Business & Management</a></li>-->
<!--                                            <li><a href="#">Information Technology & Engineering</a></li>-->
<!--                                            <li><a href="#">Health & Social Care</a></li>-->
<!--                                            <li><a href="#">Travel, Tourism & Hospitality Management</a></li>-->
<!--                                            <li><a href="faculty-members.php">Teaching Faculty</a></li>-->
<!--                                        </ul><!-- /.submenu -->
<!--                                    </li>                                -->
<!--                                    <li>-->
<!--                                        <a href="#">Admission</a>-->
<!--                                        <ul class="submenu">-->
<!--                                            <li><a href="#">How to Apply</a></li>-->
<!--                                            <li><a href="#">Admission Procedure</a></li>-->
<!--                                            <li><a href="#">Admission Policy</a></li>-->
<!--                                            <li><a href="#">Loans & Maintenance</a></li>-->
<!--                                            <li><a href="login.php">Apply Now</a></li>-->
<!--                                        </ul><!-- /.submenu -->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a href="#">College Life</a>-->
<!--                                        <ul class="submenu">-->
<!--                                            <li><a href="#">Student Services</a></li>-->
<!--                                            <li><a href="#">Facilities</a></li>-->
<!--                                            <li><a href="#">Student Supports</a></li>-->
<!--                                            <li><a href="#">Term Dates</a></li>-->
<!--                                            <li><a href="photo-gallery.php">Photo Gallery</a></li>-->
<!--                                            <li><a href="#">Register Interest</a></li>-->
<!--                                        </ul><!-- /.submenu -->
<!--                                    </li>  -->
<!--                                    <li>-->
<!--                                        <a href="#">News & Events</a>-->
<!--                                        <ul class="submenu">-->
<!--                                            <li><a href="news.php">News</a></li>-->
<!--                                            <li><a href="event-list.php">Events</a></li>-->
<!--                                        </ul><!-- /.submenu -->
<!--                                    </li>                                       -->
                                </ul><!-- /.menu -->
                            </nav><!-- /.mainnav -->
                        </div><!-- /.nav-wrap -->
                    </div><!-- /.header-wrap -->
                </div><!-- /.container-->
            </div><!-- /.header-wrap-->
        </header><!-- /.header -->

<!--        <script>-->
<!--            jQuery(document).ready(function() {-->
<!--                var loc = window.location.href;-->
<!--                jQuery(".menu li").removeClass('active');-->
<!--                jQuery(".menu li a").each(function() {-->
<!--                    if (loc.indexOf(jQuery(this).attr("href")) != -1) {-->
<!--                        jQuery(this).closest('li').addClass("active");-->
<!--                    }-->
<!--                });-->
<!--            });-->
<!--        </script>-->


<!--<script>-->
<!--    $(function() {-->
<!---->
<!--        var pgurl = window.location.href.-->
<!--        substr(window.location.href.lastIndexOf("/")+1);-->
<!---->
<!---->
<!--        $(".menu li").each(function(){-->
<!---->
<!--            if(pgurl==''){-->
<!--                $(".menu li:eq(1)").addClass("active");-->
<!--            }else-->
<!--            if($('a',this).attr("href") == pgurl || $('a', this).attr("href") == '')-->
<!--                $(this).addClass("active");-->
<!--        })-->
<!--    });-->
<!--</script>-->

