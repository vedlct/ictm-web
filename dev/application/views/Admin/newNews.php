<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
    <link href="<?php echo base_url()?>public/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">

</head>

<body>
<!-- container section start -->
<section id="container" class="">
    <!--top Navigation start-->
    <?php include ('topNavigation.php')?>
    <!--top Navigation end-->
    <!--sidebar start-->
    <?php include('leftNavigation.php') ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-files-o"></i> New &nbsp News</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="icon_document_alt"></i>News</li>
                        <li><i class="fa fa-files-o"></i>Create a new News</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            New News
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="form-validate form-horizontal" id="CreateNewNews" method="POST" action="<?php echo base_url() ?>Admin/News/createNewNews" enctype="multipart/form-data" onsubmit="return onsumit()">
                                    <div class="form-group ">
                                        <label for="newsTitle" class="control-label col-lg-2">News Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('newsTitle'); ?></font></p>
                                            <input class="form-control" id="newsTitle" name="newsTitle" value="<?php echo set_value('newsTitle'); ?>" type="text" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="NewsDate">News Date<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStartDateTime'); ?></font></p>
                                            <div class='input-group date datetimepicker' id='datetimepicker1'>
                                                <input type='text' id="newsDate" name="newsDate" value="<?php echo set_value('newsDate'); ?>" class="form-control" required/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                        </div>

                                        <label class="control-label col-lg-2" for="news_image">News Photo</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('news_image'); ?></font></p>
                                            <span>Image Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                            <input class="form-control" type="file" name="news_image" id="news_image"/>
                                        </div>

                                    </div>


                                    <div class="form-group">


                                        <label class="control-label col-lg-2" for="newsType">News Type<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('newsType'); ?></font></p>

                                            <select class="form-control m-bot15" name="newsType" id="newsType" required>
                                                <option value="" selected><?php echo SELECT_STATUS?></option>
                                            <?php for($i=0;$i<count(NewsType);$i++){?>
                                                <option value="<?php echo NewsType[$i]?>" <?php echo set_select('newsType',  NewsType[$i], False); ?>><?php echo NewsType[$i]?></option>
                                            <?php } ?>
                                            </select>

                                        </div>

                                        <label class="control-label col-lg-2" for="newsStatus">News Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('newsStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="newsStatus" id="newsStatus" required>
                                                <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option <?php echo set_select('newsStatus',  STATUS[$i], False); ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>


                                        </div>



                                    </div>


                                    <div class="form-group ">
                                        <label for="eventContent" class="control-label col-lg-2">News Content<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="newsContent"id="newsContent"required><?php echo set_value('newsContent'); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group "align="center">
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

<?php include ('js.php')?>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>public/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/js/datepicker.min.js"></script>

<script type="text/javascript">

    $(function () {

        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY h:m A'
        });

    });
</script>

<script type="text/javascript">
    function onsumit(){

        var newsTitle =  document.getElementById("newsTitle").value;
        if (newsTitle.length >255){
            alert("News Title Should not more than 255 Charecter Length");
            return false;
        }

        var messageLength = CKEDITOR.instances['newsContent'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a News Content' );
            return false;
        }

    }
</script>
<script>

    $('#newsDate').keydown(function(e) {
        e.preventDefault();
        return false;
    });

</script>