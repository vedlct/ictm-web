<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>
    <!-- date picker      -->
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/datepicker_main.css">
    <!-- date picker      -->

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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New Menu</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>Menu</li>
                        <li><i class="fa fa-files-o"></i>Create a new Menu</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Menu
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">

                                    <div class="form-group ">
                                        <label for="news_title" class="control-label col-lg-2">News Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="news_title" name="news_title" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="news_content" class="control-label col-lg-2">News Content <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="editor1" id="news_content" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">News Date</label>
                                        <div class="col-lg-4">
<!--                                            <input class="form-control " id="curl" type="url" name="url" />-->
                                            <input type="text" class="form-control docs-date" name="date_from" placeholder="Pick a date">
                                        </div>

                                        <label for="news_status" class="control-label col-lg-2">News Status <span class="required">*</span></label>
                                        <div class="col-lg-4">

                                            <select class="form-control" id="news_status" name="news_status" required>

                                                <option value="Select_Status" selected>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>

                                            </select>

                                        </div>

                                    </div>


                                    <div class="form-group ">
                                        <div class="col-lg-10">
                                            <input class="btn btn-success" type="submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
                                        </div>
                                    </div>


                                </form>
                            </div>

                        </div>

                </div>
        </section>
        </div>
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
<!--ck editor-->
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

<!--<script src="js/jquery-1.12.4.js"></script>-->
<!-- date picker-->
<script src="js/datepicker.js"></script>

</body>
</html>
