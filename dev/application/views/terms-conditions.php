<?php include("header.php"); ?>

<div id="pageMetaAndKeyword">

    <head>
        <?php foreach ($termsdata as $td){?>
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $td->pageMetaData;?>">
        <meta name="keywords" content="<?php echo $td->pageKeywords;?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php break;}?>

        <script>
            upDownleyout = function() {
                if($(window).width() < 768) {
                    $( "#termsinner" ).prependTo( $( "#maincontainerright" ) );
                }else{
                    $( "#termsinner" ).appendTo( $( "#maincontainerright" ) );
                }
            }
            $(document).ready(upDownleyout);
            $(window).resize(upDownleyout);
        </script>
        
    </head>
</div>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <?php foreach ($pagetype as $pt){?>
                    <a href="<?php echo base_url()?>Page/<?php echo $pt->pageId?>">
                        <h2 class="title">
                            <?php echo $pt->pageTitle;?>
                        </h2>
                    </a>
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
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /page-title -->

<section  class="main-content course-single">
    <div class="container">
        <div id="maincontainerright" class="content-course">
            <div class="row">
                <div class="col-md-9 testright">
                    <article class="post-course">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-pad single-course-detail">
                                    <div class="course-detail">
                                        <div class="content-content">
                                            <?php
                                                    $count = 1; foreach ($termsdata as $td) {

                                                        if ($td->pageContent != null){
                                                            echo $td->pageContent;
                                                        }
                                                        if($td->pageImage != null){?>
                                                <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/pageImages/<?php echo $td->pageImage?>"><br><br>
                                                <?php }break;}?>

                                                <?php
                                                    foreach ($termsdata as $terms){}if ($terms->pageSectionId !=null){
                                                        foreach ($termsdata as $td){?>
                                                    <h3 id="<?php echo $td->pageSectionId?>">
                                                        <?php echo $count.". ".$td->pageSectionTitle?>
                                                    </h3>
                                                    <div class="course-detail-section">
                                                        <?php echo $td->pageSectionContent?>
                                                    </div>

                                                    <?php $count++; }} ?>
                                        </div>
                                        <!--/course-detail-->
                                    </div>
                                    <!--/single-content-detail-->
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-md-3 testleft">
                    <div class="sidebar">
                        <div id="termsinner" class="widget widget-nav-menu">
                            <div class="widget-inner">
                                <?php foreach ($pagetype as $pt){?>
                                <a href="<?php echo base_url()?>Page/<?php echo $pt->pageId?>">
                                    <h2 class="widget-title maincolor2" style="background:#841a29; text-align:center; color:#fff">
                                        <?php echo $pt->pageTitle;?>
                                    </h2>
                                </a>
                                <?php } ?>
                                <div class="menu-main-navigation-container">
                                    <ul id="menu-main-navigation-1" class="menu">
                                        <?php
                                                    foreach ($termsdata as $ad) {}
                                                    if ($ad->pageSectionId != null){
                                                        foreach ($termsdata as $td){?>
                                            <li class="menu-item"><a href="<?php echo " # ".$td->pageSectionId?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $td->pageSectionTitle?></a></li>
                                            <?php }} ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-posts">
                            <div class="blog-box">
                                <h2 class="widget-title">LATEST NEWS</h2>
                                <?php include("latest-news-sidebar.php"); ?>
                            </div>
                        </div>
                        <!-- /widget-posts -->

                        <div class="widget widget-courses">
                            <h2 class="widget-title">COURSES LIST</h2>
                            <?php include("course-sidebar.php"); ?>
                        </div>
                        <!-- /widget-posts -->

                        <div class="widget widget-posts">
                            <h2 class="widget-title">EVENTS LIST</h2>
                            <?php include("event-sidebar.php"); ?>
                        </div>
                        <!-- /widget-posts -->

                    </div>
                    <!-- sidebar -->
                </div>
                <!-- /col-md-3 -->


            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>

</div>
</body>


</html>