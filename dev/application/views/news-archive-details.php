
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <?php foreach ($newsDetails as $details){?>
                        <h2 class="title"><?php echo $details->newsTitle;?></h2>
                    <?php }?>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="#">Home </a></li>
                        <li class="home"><a href="#">\ ACADEMIC </a></li>
                        <li> \</li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<!-- Blog posts -->
<section class="main-content blog-single">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                <div class="col-md-9">
                    <article class="post">
                        <div class="entry-wrapper">

                            <?php foreach ($newsDetails as $details){
                                if ($details->newsPhoto != null){?>
                                    <div class="entry-box">
                                        <a href="<?php echo base_url()?>News-Details/<?php echo $details->newsId?>">
                                            <img src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/newsImages/<?php echo $details->newsPhoto?>" alt="images">
                                        </a>
                                    </div>
                                <?php }?>

                                <div class="post-content">

                                    <h2 class="title"><?php echo $details->newsTitle;?></h2>
                                    <p><?php echo $details->newsContent;?></p>

                                </div>


                                <div class="content-pad">
                                    <div class="item-content">
                                        <div class="item-meta blog-item-meta">
                                            <span>Date Published <span class="sep">|</span> </span>
                                            <span><?php echo date('F d, Y',strtotime($details->newsDate))?> <span class="sep">|</span> </span>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>

                            <div class="list-inline item-content">
                                <ul class="social-list">
                                    <li>
                                        <a href="#" class="btn btn-default social-icon">
                                            <i class="fa fa-facebook"></i>
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
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default social-icon">
                                            <i class="fa fa-vk"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-default social-icon">
                                            <i class="fa fa-envelope"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><br>

                            <div class="simple-navigation">
                                <div class="row">
                                    <?php foreach ($next as $pv) {
                                        if ($pv->newsTitle != null){
                                            ?>
                                            <div class="simple-navigation-item col-md-6 col-sm-6 col-xs-6 main-color-1-bg-hover ">
                                                <a class="maincolor2hover" href="<?php echo base_url()?>News-Details/<?php echo $pv->newsId?>">
                                                    <i class="fa fa-angle-left pull-left"></i>
                                                    <div class="simple-navigation-item-content">
                                                        <span>Previous</span>
                                                        <h4><?php echo $pv->newsTitle?></h4>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } }?>
                                    <?php foreach ($previous as $nx) {
                                        if ($nx->newsTitle != null) {
                                            ?>
                                            <div class="simple-navigation-item col-md-6 col-sm-6 col-xs-6 main-color-1-bg-hover ">
                                                <a class="maincolor2hover pull-right" href="<?php echo base_url()?>News-Details/<?php echo $nx->newsId?>">
                                                    <i class="fa fa-angle-right pull-right"></i>
                                                    <div class="simple-navigation-item-content">
                                                        <span>Next</span>
                                                        <h4><?php echo $nx->newsTitle?></h4>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } }?>
                                </div>
                            </div>

                        </div>
                    </article>
                </div><!-- /col-md-9 -->

                <div class="col-md-3">
                    <div class="sidebar">

                        <div class="widget widget-posts">
                            <div class="blog-box">
                                <h2 class="widget-title">LATEST NEWS</h2>
                                <?php include("latest-news-sidebar.php"); ?>
                            </div><br>


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
                                                        <a href="<?php echo base_url()?>News-Archive/<?php echo $m->year?>/<?php echo $m->month?>"><li><?php echo date('F', mktime(0, 0, 0, $m->month, 10))."(".$m->monthcount.")" ?></li></a>
                                                    </ul>
                                                <?php } } ?>
                                        </li>
                                    <?php }?>

                                </ul><!-- /popular-news clearfix -->
                            </div>
                        </div><!-- /widget-posts -->
                    </div><!-- /col-md-9 -->
                </div><!-- /col-md-3 -->
            </div>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>

</div>
</body>

</html>