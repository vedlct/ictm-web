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
    <!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url()?><!--public/stylesheets/bootstrap.css" >-->
    <!--    <link rel="stylesheet" href="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/public/css/bootstrapV3.3.7.min.css" rel="stylesheet"/>-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url()?><!--public/stylesheets/bootstrapV3.3.7.min.css" rel="stylesheet"/>-->


<!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

    <link rel="stylesheet" href="<?php echo base_url()?>public/stylesheets/all.css" rel="stylesheet"/>

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/stylesheets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/stylesheets/owl.theme.default.min.css">
    



<!--    <link href="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/public/css/bootstrap-theme.css" rel="stylesheet">-->
    <!--external css-->
    <!-- font icon -->
    <!--    <link href="--><?php //echo base_url()?><!--public/stylesheets/font-awesome.css" rel="stylesheet" />-->

    <!-- Theme Style -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url()?><!--public/stylesheets/style.css">-->

    <!-- Responsive -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url()?><!--public/stylesheets/responsive.css">-->


    <!-- Animation Style -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url()?><!--public/stylesheets/animate.css">-->

    <!-- Owl Carousel -->
    <!--    <link rel="stylesheet" href="--><?php //echo base_url()?><!--public/stylesheets/owl.carousel.min.css">-->
    <!--    <link rel="stylesheet" href="--><?php //echo base_url()?><!--public/stylesheets/owl.theme.default.min.css">-->

    <!-- for Application Form -->
<!--    <link rel="stylesheet" href="--><?php //echo base_url()?><!--public/stylesheets/application-form-style.css">-->

<!--    <link href="--><?php //echo base_url()?><!----><?php //echo FOLDER_NAME ?><!--/public/css/elegant-icons-style.css" rel="stylesheet" />-->



    <!-- Favicon and touch icons  -->
    <link href="<?php echo base_url()?>public/icon/apple-touch-icon-48-precomposed.php" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?php echo base_url()?>public/icon/apple-touch-icon-32-precomposed.php" rel="apple-touch-icon-precomposed">
    <link href="#" rel="shortcut icon">



    <!--[if lt IE 9]-->
    <script src="<?php echo base_url()?>public/javascript/html5shiv.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>-->

    <script src="<?php echo base_url()?>public/javascript/respond.min.js"></script>

<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <!--[endif]-->



    <script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery.min.js"></script>

<!--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->



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
                                    if ($tm->pageType == 'Static Type') {
                                        switch ($tm->pageContent) {
                                            case "course-list.php":
                                                ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "department.php":
                                                ?> <li><a href="<?php echo base_url()?>Department"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "faculty-members.php":
                                                ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "photo-gallery.php":
                                                ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "news.php":
                                                ?> <li><a href="<?php echo base_url()?>News"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "event-list.php":
                                                ?> <li><a href="<?php echo base_url()?>Events"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "contact.php":
                                                ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "registerInterest.php":
                                                ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            case "feedback-form.php":
                                                ?> <li><a href="<?php echo base_url()?>Feedback"><?php echo $tm->menuName?></a></li> <?php
                                                break;
                                            default:
                                        }
                                    }
                                    else if ($tm->pageType == 'Link Type'){
                                        ?><li><a href="<?php echo $tm->pageContent?>" target="_blank"><?php echo $tm->menuName?></a></li><?php
                                    } else {
                                        if (empty($tm->pageId)){
                                            ?> <li><a href="<?php echo base_url()?>page-not-found"><?php echo $tm->menuName?></a></li> <?php
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
                                <?php foreach ($contact as $contactInfo){?>
                                    <li>
                                        <a href="<?php echo $contactInfo->collegeFacebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $contactInfo->collegeYoutube;?>"target="_blank"><i class="fa fa-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $contactInfo->collegeTwitter;?>"target="_blank"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $contactInfo->collegeGoogle;?>"target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $contactInfo->collegeLinkedIn;?>"target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                <?php } ?>
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
                                <li ><a href="<?php echo base_url()?>Home">Home</a></li>

                                <?php foreach ($mainmenu as $mn) {?>

                                    <li><a><?php echo $mn->menuName; ?></a>

                                        <ul class="submenu">
                                            <?php
                                            foreach ($parentmenu as $q) {
                                                if ($q->parentId ==  $mn->menuId){
                                                    if ($q->pageType == 'Static Type') {
                                                        switch ($q->pageContent) {
                                                            case "course-list.php":
                                                                ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "department.php":
                                                                ?> <li><a href="<?php echo base_url()?>Department"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "faculty-members.php":
                                                                ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "photo-gallery.php":
                                                                ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "news.php":
                                                                ?> <li><a href="<?php echo base_url()?>News"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "event-list.php":
                                                                ?> <li><a href="<?php echo base_url()?>Events"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "contact.php":
                                                                ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "registerInterest.php":
                                                                ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            case "feedback-form.php":
                                                                ?> <li><a href="<?php echo base_url()?>Feedback"><?php echo $q->menuName?></a></li> <?php
                                                                break;
                                                            default:
                                                        }
                                                    }
                                                    else if ($q->pageType == 'Link Type'){
                                                        ?><li><a href="<?php echo $q->pageContent?>" target="_blank"><?php echo $q->menuName?></a></li><?php
                                                    } else {
                                                        if (empty($q->pageId)){
                                                            ?> <li><a href="<?php echo base_url()?>page-not-found"><?php echo $q->menuName?></a></li> <?php
                                                        }else {
                                                            ?><li><a href="<?php echo base_url() ?>Page/<?php echo $q->pageId ?>" ><?php echo $q->menuName ?></a> </li> <?php
                                                        }
                                                    }
                                                } }
                                            ?>
                                        </ul>
                                    </li>
                                <?php } ?>

                                <?php foreach ($checkparentmenu as $cm){ ?>
                                    <?php
                                    if ($cm->pageType == 'Static Type') {
                                        switch ($cm->pageContent) {
                                            case "course-list.php":
                                                ?> <li><a href="<?php echo base_url()?>course-list"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "department.php":
                                                ?> <li><a href="<?php echo base_url()?>Department"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "faculty-members.php":
                                                ?><li><a href="<?php echo base_url()?>Faculty-list"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "photo-gallery.php":
                                                ?><li><a href="<?php echo base_url()?>Photo-Gallery"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "news.php":
                                                ?> <li><a href="<?php echo base_url()?>News"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "event-list.php":
                                                ?> <li><a href="<?php echo base_url()?>Events"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "contact.php":
                                                ?> <li><a href="<?php echo base_url()?>Contact"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "registerInterest.php":
                                                ?> <li><a href="<?php echo base_url()?>RegisterInterest"><?php echo $cm->menuName?></a></li> <?php
                                                break;
                                            case "feedback-form.php":
                                                ?> <li><a href="<?php echo base_url()?>Feedback"><?php echo $cm->menuName ?></a></li> <?php
                                                break;
                                            default:
                                        }
                                    }
                                    else if ($cm->pageType == 'Link Type'){
                                        ?><li><a href="<?php echo $cm->pageContent?>" target="_blank"><?php echo $cm->menuName?></a></li><?php
                                    } else {
                                        if (empty($cm->pageId)){
                                            ?> <li><a href="<?php echo base_url()?>page-not-found"><?php echo $cm->menuName?></a></li> <?php
                                        }else {
                                            ?><li><a href="<?php echo base_url() ?>Page/<?php echo $cm->pageId ?>" ><?php echo $cm->menuName ?></a> </li> <?php
                                        }
                                    }
                                }
                                ?>
                            </ul><!-- /.menu -->
                        </nav><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                </div><!-- /.header-wrap -->
            </div><!-- /.container-->
        </div><!-- /.header-wrap-->
    </header><!-- /.header -->

    <script>
        jQuery(document).ready(function() {
            var loc = window.location.href;
            jQuery(".menu li").removeClass('active');
            jQuery(".menu li a").each(function() {
                if (loc.indexOf(jQuery(this).attr("href")) != -1) {
                    jQuery(this).parents('li').addClass("active");
                }
            });
        });
    </script>