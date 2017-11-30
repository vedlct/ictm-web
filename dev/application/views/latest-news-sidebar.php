										
                                        <ul class="recent-posts clearfix">
                                            <?php foreach ($newsdata as $nd) {?>
                                            <li>
                                                <?php
                                                if ($nd->newsPhoto == null ) {
                                                    ?>
                                                    <div class="thumb item-thumbnail">
                                                        <a href="<?php echo base_url()?>News-Details/<?php echo $nd->newsId?>">
<<<<<<< HEAD:dev/application/views/latest-news-sidebar.php
                                                            <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/newsImages/NoImage.jpg"
=======
                                                            <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/newsImages/noImage.jpg"
>>>>>>> Work:dev/application/views/latest-news-sidebar.php
                                                                 alt="image" style="width: 80px; height: 80px">
                                                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                            <div class="thumbnail-hoverlay-cross"></div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }else {
                                                    ?>
                                                    <div class="thumb item-thumbnail">
                                                        <a href="<?php echo base_url()?>News-Details/<?php echo $nd->newsId?>">
                                                            <img src="<?php echo base_url() ?>AdminPanel/images/newsImages/<?php echo $nd->newsPhoto?>"
                                                                 alt="image" style="width: 80px; height: 80px">
                                                            <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                            <div class="thumbnail-hoverlay-cross"></div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="text">
                                                    <a href="<?php echo base_url()?>News-Details/<?php echo $nd->newsId?>"><?php echo $nd->newsTitle?></a>
                                                    <p><?php echo date('F d, Y',strtotime($nd->newsDate))?></p>
                                                </div>
                                            </li>
                                            <?php } ?>

                                        </ul><!-- /popular-news clearfix -->