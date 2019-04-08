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

    <!-- dateTimepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

    <style>
        * {
            box-sizing: border-box;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myUL {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #myUL li a {
            border: 1px solid #ddd;
            margin-top: -1px; /* Prevent double borders */
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block
        }

        #myUL li a:hover:not(.header) {
            background-color: #eee;
        }
    </style>
    
    <style>
        .owl-stage{
            margin: 0 auto;
        }
    </style>

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

                                <li>
                                    <?php if ($this->session->userdata('loggedin') == "true"){?>
                                    <a href="<?php echo base_url()?>Login/logout">Logout</a>
                                    <?php }else{?>
                                    <a href="<?php echo base_url()?>Login">Login</a>
                                    <?php } ?>
                                </li>

                            </ul><!-- /.menu -->
                        </nav><!-- /.mainnav -->

                        <a class="navbar-right search-toggle show-search" href="#">
                            <i class="fa fa-search"></i>
                        </a>

                        <div class="submenu top-search">
                            <form class="search-form">
                                <div class="input-group">
                                    <input type="search" id="myInput" onkeyup="myFunction()" class="search-field" placeholder="Search Here">
                                    <span class="input-group-btn">
                                            <button type="submit"><i class="fa fa-search fa-4x"></i></button>
                                        </span>
                                </div>
                            </form>
                        </div>



                      
            <div class="navbar-right topnav-sidebar" style="margin-right: 0px">


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
                                <li ><a href="<?php echo base_url()?>Home"><b>Home </b> </a></li>

                                <?php foreach ($mainmenu as $mn) {?>

                                    <li><a><b><?php echo $mn->menuName." "; ?></b><i class="fa fa-caret-down" aria-hidden="true"></i></a>

                                        <ul class="submenu">
                                            <?php
                                            foreach ($parentmenu as $q) {
                                                if ($q->parentId ==  $mn->menuId){
                                                    if ($q->pageType == 'Static Type') {
                                                        switch ($q->pageContent) {
                                                            case "course-list.php":
                                                                ?> <li><a href="<?php echo base_url()?>course-list"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "department.php":
                                                                ?> <li><a href="<?php echo base_url()?>Department"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "faculty-members.php":
                                                                ?><li><a href="<?php echo base_url()?>Faculty-list"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "photo-gallery.php":
                                                                ?><li><a href="<?php echo base_url()?>Photo-Gallery"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "news.php":
                                                                ?> <li><a href="<?php echo base_url()?>News"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "event-list.php":
                                                                ?> <li><a href="<?php echo base_url()?>Events"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "contact.php":
                                                                ?> <li><a href="<?php echo base_url()?>Contact"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "registerInterest.php":
                                                                ?> <li><a href="<?php echo base_url()?>RegisterInterest"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "feedback-form.php":
                                                                ?> <li><a href="<?php echo base_url()?>Feedback"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            default:
                                                        }
                                                    }
                                                    else if ($q->pageType == 'Link Type'){
                                                        ?><li><a href="<?php echo $q->pageContent?>" target="_blank"><b><?php echo $q->menuName?></b></a></li><?php
                                                    } else {
                                                        if (empty($q->pageId)){
                                                            ?> <li><a href="<?php echo base_url()?>page-not-found"><b><?php echo $q->menuName?></b></a></li> <?php
                                                        }else {
                                                            ?><li><a href="<?php echo base_url() ?>Page/<?php echo $q->pageId ?>" ><b><?php echo $q->menuName ?></b></a> </li> <?php
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
                                                ?> <li><a href="<?php echo base_url()?>course-list"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "department.php":
                                                ?> <li><a href="<?php echo base_url()?>Department"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "faculty-members.php":
                                                ?><li><a href="<?php echo base_url()?>Faculty-list"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "photo-gallery.php":
                                                ?><li><a href="<?php echo base_url()?>Photo-Gallery"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "news.php":
                                                ?> <li><a href="<?php echo base_url()?>News"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "event-list.php":
                                                ?> <li><a href="<?php echo base_url()?>Events"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "contact.php":
                                                ?> <li><a href="<?php echo base_url()?>Contact"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "registerInterest.php":
                                                ?> <li><a href="<?php echo base_url()?>RegisterInterest"><b><?php echo $cm->menuName?></b></a></li> <?php
                                                break;
                                            case "feedback-form.php":
                                                ?> <li><a href="<?php echo base_url()?>Feedback"><b><?php echo $cm->menuName ?></b></a></li> <?php
                                                break;
                                            default:
                                        }
                                    }
                                    else if ($cm->pageType == 'Link Type'){
                                        ?><li><a href="<?php echo $cm->pageContent?>" target="_blank"><b><?php echo $cm->menuName?></b></a></li><?php
                                    } else {
                                        if (empty($cm->pageId)){
                                            ?> <li><a href="<?php echo base_url()?>page-not-found"><b><?php echo $cm->menuName?></b></a></li> <?php
                                        }else {
                                            ?><li><a href="<?php echo base_url() ?>Page/<?php echo $cm->pageId ?>" ><b><?php echo $cm->menuName ?></b></a> </li> <?php
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

    <div class="searchdiv">
        <ul id="myUL" style="display:none;">
            <?php foreach ($searchpage as $spage) {?>
                <li><a href="<?php echo base_url()?>Page/<?php echo $spage->pageId?>"><?php echo $spage->pageTitle?></a></li>
            <?php } ?>
            <?php foreach ($searchnews as $snews) {?>
                <li><a href="<?php echo base_url()?>News/newsDetails/<?php echo $snews->newsId?>"><?php echo $snews->newsTitle?></a></li>
            <?php } ?>
            <?php foreach ($searchevents as $sevents) {?>
                <li><a href="<?php echo base_url()?>Event/eventDetails/<?php echo $sevents->eventId?>"><?php echo $sevents->eventTitle?></a></li>
            <?php } ?>
            <?php
            ?> <li><a href="<?php echo base_url()?>course-list">Course List</li> <?php
            ?> <li><a href="<?php echo base_url()?>Department">Department</a></li> <?php
            ?><li><a href="<?php echo base_url()?>Faculty-list">Faculty</a></li> <?php
            ?><li><a href="<?php echo base_url()?>Photo-Gallery">Photo Gallery</a></li> <?php
            ?> <li><a href="<?php echo base_url()?>News">News</a></li> <?php
            ?> <li><a href="<?php echo base_url()?>Events">Event List</a></li> <?php
            ?> <li><a href="<?php echo base_url()?>Contact">Contact</a></li> <?php
            ?> <li><a href="<?php echo base_url()?>RegisterInterest">RegisterInterest</a></li> <?php
            ?> <li><a href="<?php echo base_url()?>Feedback">Feedback</a></li>

        </ul>
    </div>

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

    <script>
        function myFunction() {

            document.getElementById("myUL").style.display="block";
            // alert(document.getElementById("myInput").value);
            if (document.getElementById("myInput").value == ''){
                document.getElementById("myUL").style.display="none";
            }
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "block";
                } else {
                    li[i].style.display = "none";

                }
            }
        }
    </script>