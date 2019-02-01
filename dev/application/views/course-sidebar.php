	
                                    <ul class="recent-posts clearfix">
                                        <?php foreach ($coursedata as $cd){ ?>
                                        <li>
                                            <?php
                                            if ($cd->courseImage == null) {
                                                ?>
                                                <div class="thumb item-thumbnail">
                                                    <a href="#">
                                                        <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/courseImages/noImage.jpg" alt="image" style="width: 80px; height: 80px">
                                                        <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                        <div class="thumbnail-hoverlay-cross"></div>
                                                    </a>
                                                </div>
                                                <?php
                                            } else {
                                                ?>

                                                <div class="thumb item-thumbnail">
                                                    <a href="#">
<!--                                                        <img src="--><?php //echo base_url() ?><!----><?php //echo FOLDER_NAME ?><!--/images/courseImages/--><?php //echo $cd->courseImage?><!--" alt="image" style="width: 80px; height: 80px">-->
                                                        <img src="<?php echo base_url(FOLDER_NAME.'/images/courseImages/'.thumb(FOLDER_NAME.'/images/courseImages/'.$cd->courseImage,'90','90')); ?>" alt="image">
                                                        <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                        <div class="thumbnail-hoverlay-cross"></div>
                                                    </a>
                                                </div>

                                                <?php
                                            }
                                            ?>
                                            <div class="text">
                                                <a href="<?php echo base_url()?>course-details/<?php echo $cd->courseId ?>"><?php echo $cd->courseTitle ?></a>
                                                <p><?php echo $cd->academicYear ?></p>
                                            </div>
                                        </li>
                                        <?php  } ?>

                                    </ul><!-- /popular-news clearfix -->
