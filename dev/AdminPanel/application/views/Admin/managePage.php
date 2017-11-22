<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>
<style>
    .pagination2 {
        letter-spacing: 15px;
    }


</style>
<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php') ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-table"></i> Page</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="fa fa-table"></i>Page</li>
                        <li><i class="fa fa-th-list"></i>Manage Page</li>
                    </ol>
                </div>
            </div>
            <!-- page start-->

            <?php if ($this->session->flashdata('successMessage')!=null){?>
            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Manage Page
                            <span align="">
                                 <a href="<?php echo base_url()?>Admin/Page/createPage"> <button class="btn btn-sm" style="float: right; height: 26px; margin-top: 4px; background-color: #00A8FF;color: whitesmoke; ">New Page</button> </a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="table table-responsive">
                                <form method="post" action="<?php echo base_url()?>Admin/Page/searchByTitlPage">
                                    <div class="form-group col-md-6">
                                        <label for="email">Search By Title</label>
                                        <input type="text" class="form-control col-md-6" id="title" name="title">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button style="margin-top: 23px" type="submit" class="btn btn-default">Submit</button>
                                    </div>

                                </form>

                        <table class="table table-striped table-advance  table-bordered table-hover" id="myTable">
                            <tbody>
                            <tr>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(0)"> Page Title</th>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center" onclick="sortTable(1)"> Page Type</th>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center"; width="10%"> Status</th>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center"; width="15%"> Insert By</th>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center" ; width="15%"> Last Modified By</th>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center"; width="15%"> Last Modified Date (d-m-Y)</th>
                                <th style="background-color: #394A59; color: whitesmoke; text-align: center"; width="10%"> Action</th>
                            </tr>


                            <?php if (!empty($pageData)){
                                foreach ($pageData as $pd){?>
                                    <tr align="center">
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
                            </div>

                            <div class="pagination2" align="center">
                                <a href="#"><?php echo $links?></a>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
            <!-- page end-->

        </section>
    </section>
    <!--main content end-->

    <div class="text-right wrapper">
        <div class="credits">
            <a href="#">Icon College</a> by <a href="#">A2N</a>
        </div>
    </div>

</section>
<!-- container section end -->
<!-- javascripts -->

<?php include('js.php') ?>

</body>
</html>

