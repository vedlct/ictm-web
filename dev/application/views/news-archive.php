
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">NEWS</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="#">Home </a></li>
                        <li>\ NEWS</li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<!-- Blog posts -->
<section class="main-content blog-posts">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <div class="blog-listing">
                        <!--                                <div class="blog-item">-->
                        <!--                                    <div class="post-item blog-post-item">-->
                        <!--                                        <div class="row">-->
                        <!--                                            <div class="col-md-6 col-sm-12">-->
                        <!--                                                <div class="content-pad">-->
                        <!--                                                    <div class="blog-thumbnail">-->
                        <!--                                                        <div class="item-thumbnail-video">-->
                        <!--                                                            <div class="item-thumbnail-video-inner">-->
                        <!--                                                                <iframe src="https://player.vimeo.com/video/81087045" width="900" height="506" frameborder="0" title="Aventura Africa Sudafrica Super Slowmotion" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>-->
                        <!--                                                            </div>-->
                        <!--                                                        </div>-->
                        <!--                                                        <div class="thumbnail-overflow">-->
                        <!--                                                            <!--<div class="comment-block main-color-1-bg dark-div">       -->
                        <!--                                                                <a href="#">-->
                        <!--                                                                    <i class="fa fa-comment"></i>0-->
                        <!--                                                                </a>-->
                        <!--                                                            </div>-->
                        <!--                                                            <div class="date-block main-color-2-bg dark-div">-->
                        <!--                                                                <div class="month">Jun</div>-->
                        <!--                                                                <div class="day">03</div>-->
                        <!--                                                            </div>-->
                        <!--                                                            <div class="comment-block main-color-1-bg dark-div">-->
                        <!--                                                        	<a href="#">2017</a>-->
                        <!--                                                        </div>-->
                        <!--                                                        </div>-->
                        <!--                                                    </div><!--/blog-thumbnail-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!---->
                        <!--                                            <div class="col-md-6 col-sm-12">-->
                        <!--                                                <div class="content-pad">-->
                        <!--                                                    <div class="item-content">-->
                        <!--                                                        <h3 class="title"><a href="news-detail.php" class="main-color-1-hover">Your Career Starts Here</a></h3>-->
                        <!--                                                        <div class="item-excerpt blog-item-excerpt"><p>On the other hand we denounce with righteous indignation and dislike men who are so beguiled and demoralized.</p>-->
                        <!--                                                        </div>-->
                        <!--                                                        <a class="button" href="#">DETAIL<i class="fa fa-angle-right"></i></a>-->
                        <!--                                                    </div>-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <!--                                </div><!-- /blog-item -->

                        <?php foreach ($newsArchive as $n) { ?>
                            <div class="blog-item">
                                <div class="post-item blog-post-item">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="content-pad">
                                                <div class="blog-thumbnail" style="width: 409px; height: 258px;">
                                                    <div class="item-thumbnail-gallery">
                                                        <div class="item-thumbnail" >
                                                            <a href="#">
                                                                <img src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/newsImages/<?php echo $n->newsPhoto?>"  style="width: 409px; height: 258px;" alt="image">
                                                                <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                                <div class="thumbnail-hoverlay-cross"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div><!--/blog-thumbnail-->
                                                <div class="thumbnail-overflow">
                                                    <div class="date-block main-color-2-bg dark-div">
                                                        <div class="month"><?php echo date('M',strtotime($n->newsDate))?></div>
                                                        <div class="day"><?php echo date('j',strtotime($n->newsDate))?></div>
                                                    </div>
                                                    <div class="comment-block main-color-1-bg dark-div">
                                                        <a href="#"><?php echo date('Y',strtotime($n->newsDate))?></a>
                                                    </div>
                                                </div><!--/thumbnail-overflow-->
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="content-pad">
                                                <div class="item-content">
                                                    <h3 class="title"><a href="<?php echo base_url()?>News-Details/<?php echo $n->newsId?>" class="main-color-1-hover"><?php echo $n->newsTitle; ?></a></h3>
                                                    <div class="item-excerpt blog-item-excerpt">
                                                        <p><?php echo  substr($n->newsContent, 0, 150);?></p>
                                                    </div>
                                                    <a class="button" href="<?php echo base_url()?>News-Details/<?php echo $n->newsId?>">DETAIL<i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--/post-item-->
                                </div>
                            </div><!-- /blog-item -->

                        <?php } ?>






                    </div><!-- /blog-listing -->
                </div><!-- /col-md-9 -->

                <div class="col-md-3">
                    <div class="sidebar">

                        <div class="widget widget-posts">
                            <div class="blog-box">
                                <h2 class="widget-title">LATEST NEWS</h2>
                                <?php include("latest-news-sidebar.php"); ?>
                            </div>
                        </div><!-- /widget-posts -->

                        <div class="archive-box">
                            <h2 class="widget-title">Archive</h2>
                            <ul style="margin-left:20px" class="recent-posts clearfix">
                                <?php foreach ($year as $y) { ?>
                                    <li>
                                        <p style="font-size:16px; font-weight:bold"><?php echo $y->year ?></p>
                                        <?php  foreach ($month as $m) {
                                            if ($y->year == $m->year) {
                                                ?>
                                                <ul style="margin-left:20px">
                                                    <a href="<?php echo base_url()?>News/ArchiveShow/<?php echo $m->year?>/<?php echo $m->month?>"><li><?php echo date('F', mktime(0, 0, 0, $m->month, 10))."(".$m->monthcount.")" ?></li></a>
                                                </ul>
                                            <?php } } ?>
                                    </li>
                                <?php }?>

                            </ul><!-- /popular-news clearfix -->
                        </div>

                    </div><!-- /col-md-9 -->
                </div><!-- /col-md-3 -->
            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>

</div>
</body>

<!-- Mirrored from corpthemes.com/html/university/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:00:56 GMT -->
</html>