		
		<?php include("header.php"); ?>
        <div id="pageMetaAndKeyword">
            <head>
                <?php foreach ($healthdata as $hd){?>
                    <meta charset="UTF-8">
                    <meta name="description" content="<?php echo $hd->pageMetaData;?>">
                    <meta name="keywords" content="<?php echo $hd->pageKeywords;?>">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <?php break;}?>
            </head>
        </div>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <?php foreach ($pagetype as $pt){?>
                                <a href="<?php echo base_url()?>Page/<?php echo $pt->pageId?>"><h2 class="title"><?php echo $pt->pageTitle;?></h2></a>
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
                                                    <?php foreach ($pagetype as $pt){?>
                                                    <a href="<?php echo base_url()?>Page/<?php echo $pt->pageId?>"><h2 class="widget-title maincolor2" style="background:#841a29; text-align:center; color:#fff"><?php echo $pt->pageTitle;?></h2></a>
                                                    <?php } ?>
                                                    <div class="menu-main-navigation-container">
                                                        <ul id="menu-main-navigation-1" class="menu">

                                                            <?php
                                                            foreach ($healthdata as $ad) {}
                                                            if ($ad->pageSectionId != null){
                                                            foreach ($healthdata as $hd){
                                                                ?><li class="menu-item"><a href="<?php echo "#".$hd->pageSectionId?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $hd->pageSectionTitle?></a></li><?php
                                                            }}?>
                                                        </ul>
                                                    </div>
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
                                                    <?php
                                                    foreach ($healthdata as $hd){

                                                        if ($hd->pageContent !=null){
                                                            echo $hd->pageContent;
                                                        }
                                                        if($hd->pageImage != null) {?>
                                                            <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/pageImages/<?php echo $hd->pageImage ?>">
                                                            <?php
                                                        }
                                                        break;
                                                    }
                                                    ?>
                                                    <br><br>
                                                    <?php
                                                    foreach ($healthdata as $ad) {}
                                                    if ($ad->pageSectionId != null){
                                                    foreach ($healthdata as $hd) {
                                                        ?>
                                                        <h3 id="<?php echo $hd->pageSectionId?>"><?php echo $hd->pageSectionTitle?></h3>

                                                        <?php
                                                        echo $hd->pageSectionContent;
                                                    }}
                                                    ?>
                    </span></font></p>
                                                    
                                                   
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