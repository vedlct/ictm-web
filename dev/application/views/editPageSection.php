<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--header start-->
    <?php include ('header.php')?>
    <!--header end-->

    <!--sidebar start-->
    <?php include ('sidebar.php')?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> NewPage</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
                        <li><i class="icon_document_alt"></i>Page</li>
                        <li><i class="fa fa-files-o"></i>Create a new Page</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Page
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editPageData as $epd) { ?>
                                <form class="form-validate form-horizontal" id="feedback_form" method="post"  action="<?php echo base_url()?>Admin_page/editPage/<?php echo $epd->pageId?>"  enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="cname" name="title"  type="text" value="<?php echo $epd->pageTitle?>" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">

                                        <div class="form-group">
                                            <label class="control-label col-sm-2">Content</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control summernote" name="content" rows="6"><?php echo $epd->	pageContent?></textarea>
                                            </div>
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
                                                <option selected><?php echo $epd->pageStatus?></option>
                                                <option>Active</option>
                                                <option>InActive</option>
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
<div class="text-right">
    <div class="credits">
        <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
        -->
        <a href="#">Icon College</a> by <a href="#">A2N</a>
    </div>
</div>
</section>
<!-- container section end -->

<!-- javascripts -->
<?php include ('js.php') ?>

<!--<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>-->
<!--<script src="http://cdn.ckeditor.com/4.7.1/standard-all/ckeditor.js"></script>-->
<!--<script>-->
<!--    CKEDITOR.replace( 'editor1', {-->
<!--        height: 300,-->
<!---->
<!--        // Configure your file manager integration. This example uses CKFinder 3 for PHP.-->
<!--        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',-->
<!--        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',-->
<!--        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',-->
<!--        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'-->
<!--    } );-->
<!--</script>-->


<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>

</body>
</html>
