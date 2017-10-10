									
                                    <ul class="recent-posts clearfix">
                                        <?php foreach ($eventdata as $ed) {?>
                                        <li>
                                            <div class="thumb item-thumbnail">
                                               <?php if ($ed->eventPhotoPath == null) { ?>
                                                   <a href="">
                                                       <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/eventImages/NoImage.jpg"
                                                            alt="image" style="width: 80px; height: 80px">
                                                       <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                       <div class="thumbnail-hoverlay-cross"></div>
                                                   </a>
                                                   <?php
                                               } else {
                                                   ?>
                                                   <a href="">
                                                       <img src="<?php echo base_url() ?><?php echo FOLDER_NAME ?>/images/eventImages/<?php echo $ed->eventPhotoPath?>"
                                                            alt="image" style="width: 80px; height: 80px">
                                                       <div class="thumbnail-hoverlay main-color-1-bg"></div>
                                                       <div class="thumbnail-hoverlay-cross"></div>
                                                   </a>
                                                   <?php
                                               }
                                                ?>
                                            </div>
                                            <div class="text">
                                                <a href="<?php echo base_url()?>Event/<?php echo $ed->eventId?>"><?php echo $ed->eventTitle ?></a>
                                                <p><?php echo date('F d, Y',strtotime($ed->eventStartDate))?></p>
                                            </div>
                                        </li>
                                        <?php } ?>

                                    </ul><!-- /popular-news clearfix -->