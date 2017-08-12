<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('topNavigation.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit Page</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                        <li><i class="icon_document_alt"></i>Page</li>
                        <li><i class="fa fa-files-o"></i>Edit &nbsp Page</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Page
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editPageData as $epd) {?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post"  action="<?php echo base_url()?>Admin/Page/editPage/<?php echo $epd->pageId?>"  enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="cname" name="title"  type="text" value="<?php echo $epd->pageTitle?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">


                                            <label class="control-label col-sm-2">Content</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control ckeditor" name="content" rows="6"><?php echo $epd->	pageContent?></textarea>
                                            </div>

                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <input class="form-control"  type="file" name="image"  value="<?php echo $epd->pageImage?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page Type</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="pagetype">
                                                <option value="About Type" <?php if (!empty($epd->pageType) && $epd->pageType == 'About Type')  echo 'selected = "selected"'; ?>>About Type</option>
                                                <option value="Terms Type" <?php if (!empty($epd->pageType) && $epd->pageType == 'Terms Type')  echo 'selected = "selected"'; ?>>Terms Type</option>
                                                <option value="Health Type" <?php if (!empty($epd->pageType) && $epd->pageType == 'Health Type')  echo 'selected = "selected"'; ?>>Health Type</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page Status</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="status">
<!--                                                <option selected>--><?php //echo $epd->pageStatus?><!--</option>-->
<!--                                                <option>Active</option>-->
<!--                                                <option>InActive</option>-->
                                                <option value="<?php echo Active?>" <?php if (!empty($epd->pageStatus) && $epd->pageStatus == 'Active')  echo 'selected = "selected"'; ?>><?php echo Active?></option>
                                                <option value="<?php echo inactive?>" <?php if (!empty($epd->pageStatus) && $epd->pageStatus == 'InActive')  echo 'selected = "selected"'; ?>><?php echo inactive?></option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group " align="center">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>

                            </div>

                            </form>
                            <?php } ?>
                        </div>
                </div>
        </section>
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

<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
