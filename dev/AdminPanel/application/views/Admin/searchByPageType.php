
   <table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
                                    <tbody>
                                    <tr>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(0)" > <span id="down"><i class="fa fa-sort-desc"></i> </span><span id="up" style="display: none"><i class="fa fa-sort-asc"></i> </span> Page Title</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" onclick="sortTable(1)"> Page Type</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Status</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Insert By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left" ; width="15%"> Last Modified By</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="15%"> Last Modified Date (d-m-Y)</th>
                                        <th style="background-color: #394A59; color: whitesmoke; text-align: left"; width="10%"> Action</th>
                                    </tr>


                                    <?php if (!empty($pageData)){
                                        foreach ($pageData as $pd){?>
                                            <tr align="left">
                                                <td><?php echo $pd->pageTitle?></td>
                                                <td><?php echo $pd->pageType?></td>
                                                <td><?php echo $pd->pageStatus?></td>

                                                <td><?php echo $pd->insertedBy?></td>
                                                <td><?php if ($pd->lastModifiedBy==""){echo NEVER_MODIFIED;}else{echo $pd->lastModifiedBy;} ?></td>
                                                <td><?php if ($pd->lastModifiedDate==""){echo NEVER_MODIFIED;}
                                                    else
                                                    {
                                                        echo preg_replace("/ /","<br>",date('d-m-Y h:i A',strtotime($pd->lastModifiedDate)),1);
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <div class="btn-group">

                                                        <a class="btn" href="<?php echo base_url()?>Admin/Page/editPageShow/<?php echo $pd->pageId?>"><i class="icon_pencil-edit"></i></a>
                                                        <a class="btn " data-panel-id="<?php echo $pd->pageId ?>"  onclick='return confirm("Are you sure to Delete This Page?")' href="<?php echo base_url()?>Admin/Page/deletePage/<?php echo $pd->pageId?>"><i class="icon_trash"></i></a>

                                                    </div>
                                                </td>
                                            </tr>

                                        <?php }
                                    }?>
                                    </tbody>

                                </table>


