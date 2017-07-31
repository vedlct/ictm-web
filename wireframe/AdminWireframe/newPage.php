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
                                <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="cname" name="fullname"  type="text" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Content</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control ckeditor" name="editor1" rows="6"></textarea>
                                                        </div>
                                                    </div>
                                        </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Image</label>
                                        <div class="col-lg-10">
                                            <input class="form-control " id="curl" type="file" name="url" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page Type</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="level">
                                                <option>About Type</option>
                                                <option>Terms Type</option>
                                                <option>Health Type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">Page Status</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-bot15" name="level">
                                                <option>Active</option>
                                                <option>InActive</option>
                                                </select>
                                        </div>
                                    </div>


                            <div class="form-group ">
                                <div class="col-lg-10">
                                    <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                    <input class="btn btn-close" type="reset" >
                                </div>
                            </div>

                            </div>

                            </form>
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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- jquery validate js -->
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

<!-- custom form validation script for this page-->
<script src="js/form-validation-script.js"></script>
<!--custome script for all page-->
<script src="js/scripts.js"></script>

<!--<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>-->
<script src="http://cdn.ckeditor.com/4.7.1/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1', {
        height: 300,

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
        filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    } );
</script>

</body>
</html>
