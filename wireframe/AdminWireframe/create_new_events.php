<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('head.php') ?>

    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New Events</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="icon_document_alt"></i>Events</li>
                        <li><i class="fa fa-files-o"></i>Create a new Events</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Events
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">

                                    <div class="form-group ">
                                        <label for="event_title" class="control-label col-lg-2">Event Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <input class="form-control" id="event_title" name="event_title" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="event_content" class="control-label col-lg-2">Event Content <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control summernote" name="event_content" id="event_content" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Event Start Date Time</label>
                                        <div class="col-lg-4">
                                            <!--                                            <input class="form-control " id="curl" type="url" name="url" />-->
<!--                                            <input type="text" class="form-control docs-date" name="date_from" placeholder="Pick a date">-->
                                            <div class="input-group date form_datetime " data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" size="16" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" /><br/>
                                        </div>

                                        <label for="curl" class="control-label col-lg-2">Event End Date Time</label>
                                        <div class="col-lg-4">
                                            <!--                                            <input class="form-control " id="curl" type="url" name="url" />-->
                                            <!--                                            <input type="text" class="form-control docs-date" name="date_from" placeholder="Pick a date">-->
                                            <div class="input-group date form_datetime " data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" size="16" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" /><br/>
                                        </div>



                                    </div>

                                    <div class="form-group ">
                                        <label for="event_type" class="control-label col-lg-2">Event Type <span class="required">*</span></label>
                                        <div class="col-lg-4">

                                            <input class="form-control" id="event_type" name="event_type" type="text" required />

                                        </div>

                                        <label for="event_image" class="control-label col-lg-2">Event Image <span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <input type="file" name="event_image" id="event_image" required>
                                        </div>

                                    </div>


                                    <div class="form-group " align="center">
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
<!--<script src="js/jquery.js"></script>-->
<script src="js/jquery-1.8.3.min.js"></script>
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
<!-- editor-->
<script>


$(document).ready(function() {
$('.summernote').summernote();
});
</script>

<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>


<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>

</body>
</html>
