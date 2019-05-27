
<?php include("header.php"); ?>
<div id="pageMetaAndKeyword">
    <head>
<!--        --><?php //foreach ($healthdata as $hd){?>
<!--            <meta charset="UTF-8">-->
<!--            <meta name="description" content="--><?php //echo $hd->pageMetaData;?><!--">-->
<!--            <meta name="keywords" content="--><?php //echo $hd->pageKeywords;?><!--">-->
<!--            <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--            --><?php //break;}?>
    </head>
</div>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Site Map</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ Site Map</li>
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
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="widget widget-nav-menu">
                            <div class=" widget-inner">
<!--                                --><?php //foreach ($pagetype as $pt){?>
<!--                                    <a href="--><?php //echo base_url()?><!--Page/--><?php //echo $pt->pageId?><!--"><h2 class="widget-title maincolor2" style="background:#841a29; text-align:center; color:#fff">--><?php //echo $pt->pageTitle;?><!--</h2></a>-->
<!--                                --><?php //} ?>
<!--                                <div class="menu-main-navigation-container">-->
<!--                                    <ul id="menu-main-navigation-1" class="menu">-->
<!---->
<!--                                        --><?php
//                                        foreach ($healthdata as $ad) {}
//                                        if ($ad->pageSectionId != null){
//                                            foreach ($healthdata as $hd){
//                                                ?><!--<li class="menu-item"><a href="--><?php //echo "#".$hd->pageSectionId?><!--"><i class="fa fa-arrow-right" aria-hidden="true"></i> --><?php //echo $hd->pageSectionTitle?><!--</a></li>--><?php
//                                            }}?>
<!--                                    </ul>-->
<!--                                </div>-->
                            </div>
                        </div>

                    </div><!-- sidebar -->
                </div><!-- /col-md-3 -->
                <div class="col-md-9">

                    <article class="post-course">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-pad single-course-detail">
                                    <div class="course-detail">
                                        <div class="content-content course-detail-section">
                                            <?php $data=array();foreach($menu as $menuItem) {
                                                if (is_null($menuItem->parentId) && is_null($menuItem->pageId)){?>
                                                <h3><?php echo $menuItem->menuName ?></h3>
                                                    <ul>
                                                <?php foreach ($parentmenu as $q) {
                                                if ($q->parentId ==  $menuItem->menuId){ ?>
                                                    <?php if ($q->pageType == 'Static Type') {
                                                        switch ($q->pageContent) {
                                                            case "course-list.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>course-list"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "department.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>Department"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "faculty-members.php":
                                                                ?><li><a href="<?php array_push($data,$q->pageId); echo base_url()?>Faculty-list"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "photo-gallery.php":
                                                                ?><li><a href="<?php array_push($data,$q->pageId); echo base_url()?>Photo-Gallery"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "news.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>News"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "event-list.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>Events"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "contact.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>Contact"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "registerInterest.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>RegisterInterest"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            case "feedback-form.php":
                                                                ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>Feedback"><b><?php echo $q->menuName?></b></a></li> <?php
                                                                break;
                                                            default:
                                                        }
                                                    }
                                                    else if ($q->pageType == 'Link Type'){
                                                        ?><li><a href="<?php array_push($data,$q->pageId); echo $q->pageContent?>" target="_blank"><b><?php echo $q->menuName?></b></a></li><?php
                                                    } else {
                                                        if (empty($q->pageId)){
                                                            ?> <li><a href="<?php array_push($data,$q->pageId); echo base_url()?>page-not-found"><b><?php echo $q->menuName?></b></a></li> <?php
                                                        }else {
                                                            ?><li><a href="<?php array_push($data,$q->pageId); echo base_url() ?>Page/<?php echo $q->pageId ?>" ><b><?php echo $q->menuName ?></b></a> </li> <?php
                                                        }
                                                    }?>



                                                <?php }} ?>
                                                    </ul>
                                            <?php }elseif(is_null($menuItem->parentId) && !is_null($menuItem->pageId)){
                                                    if (!in_array($menuItem->pageId,$data)){
                                                        foreach ($pages as $q) {
                                                            if ($q->pageId ==  $menuItem->pageId){ ?>
                                                                <?php if ($q->pageType == 'Static Type') {
                                                                    switch ($q->pageContent) {
                                                                        case "course-list.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>course-list"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "department.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>Department"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "faculty-members.php":
                                                                            ?><h3><a href="<?php  echo base_url()?>Faculty-list"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "photo-gallery.php":
                                                                            ?><h3><a href="<?php  echo base_url()?>Photo-Gallery"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "news.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>News"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "event-list.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>Events"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "contact.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>Contact"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "registerInterest.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>RegisterInterest"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        case "feedback-form.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>Feedback"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                            case "sitemap.php":
                                                                            ?> <h3><a href="<?php  echo base_url()?>sitemap"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                            break;
                                                                        default:
                                                                    }
                                                                }
                                                                else if ($q->pageType == 'Link Type'){
                                                                    ?><h3><a href="<?php  echo $q->pageContent?>" target="_blank"><?php echo $menuItem->menuName?></a></h3><?php
                                                                } else {
                                                                    if (empty($q->pageId)){
                                                                        ?> <h3><a href="<?php  echo base_url()?>page-not-found"><?php echo $menuItem->menuName?></a></h3> <?php
                                                                    }else {
                                                                        ?><h3><a href="<?php  echo base_url() ?>Page/<?php echo $q->pageId ?>" ><?php echo $menuItem->menuName ?></a> </h3> <?php
                                                                    }
                                                                }?>



                                                            <?php }} ?>
                                            <?php }?>
                                            <?php }}?>



                                        </div><!--/course-detail-->
                                    </div><!--/single-content-detail-->
                                </div>
                            </div>
                    </article>
                </div>


            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>

</div>
</body>


</html>