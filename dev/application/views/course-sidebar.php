	
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
                                                    <a href="<?php echo base_url()?>course-details/<?php echo $cd->courseId ?>">
                                                        <?php   ;
                                                        switch ($cd->courseCodeIcon) {

                                                            case "ICON005":
                                                                ?><img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/course-sidebar/<?php echo "2_computing.png" ?>" alt="image" style="width: 80px; height: 80px">
                                                                <?php
                                                                break;
                                                            case "ICON001":
                                                                ?><img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/course-sidebar/<?php echo "1_business.png" ?>" alt="image" style="width: 80px; height: 80px">
                                                                <?php
                                                                break;
                                                            case "ICON006":
                                                                ?> <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/course-sidebar/<?php echo "4_hospitality.png" ?>" alt="image" style="width: 80px; height: 80px">
                                                                <?php
                                                                break;
                                                            case "ICON004":
                                                                ?><img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/course-sidebar/<?php echo "2_computing.png" ?>" alt="image" style="width: 80px; height: 80px">
                                                                <?php
                                                                break;
                                                            case "ICON003":
                                                                ?> <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/course-sidebar/<?php echo "3_travel.png" ?>" alt="image" style="width: 80px; height: 80px">
                                                                <?php
                                                                break;
                                                            case "ICON008":
                                                                ?><img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/course-sidebar/<?php echo "4_hospitality.png" ?>" alt="image" style="width: 80px; height: 80px">
                                                                <?php
                                                                break;
                                                            default:
                                                        }
                                                        ?>
<!--                                                        <img src="--><?php //echo base_url(FOLDER_NAME.'/images/courseImages/'.thumb(FOLDER_NAME.'/images/courseImages/'.$cd->courseImage,'90','90')); ?><!--" alt="image">-->
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
