<!DOCTYPE html>
<html lang="en">
<head>
    <!-- view head ----->
    <?php include('head.php') ?>
    <!-- view head  end----->
    <link href="<?php echo base_url()?>public/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
    <!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">-->
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp News</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li><i class="icon_document_alt"></i>News</li>
                        <li><i class="fa fa-files-o"></i>Edit News</li>
                    </ol>
                </div>
            </div>
            <!-- Form validations -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit News
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editNews as $editNews){?>
                                <form class="form-validate form-horizontal" id="editNews" method="POST" action="<?php echo base_url() ?>Admin/News/editNewsbyId/<?php echo $editNews->newsId?>" enctype="multipart/form-data" onsubmit="return onsumit()">
                                    <div class="form-group ">
                                        <label for="newsTitle" class="control-label col-lg-2">News Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('newsTitle'); ?></font></p>
                                            <input class="form-control" id="newsTitle" name="newsTitle"  type="text" value="<?php echo $editNews->newsTitle?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="NewsDate">News Date<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('eventStartDateTime'); ?></font></p>
                                            <div class='input-group date datetimepicker' id='datetimepicker1'>
                                                <input type='text'name="newsDate" value="<?php echo date('d-m-Y H:i A',strtotime($editNews->newsDate))?>" class="form-control" required/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>

                                            </div>
                                        </div>

                                        <label class="control-label col-lg-2" for="news_image">News Photo</label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('news_image'); ?></font></p>
                                            <input class="form-control" type="file" name="news_image" id="news_image" />
                                            <span><?php echo $editNews->newsPhoto?></span>
                                        </div>

                                    </div>


                                    <div class="form-group">


                                        <label class="control-label col-lg-2" for="newsType">News Type<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('newsType'); ?></font></p>
                                            <input class="form-control" type="text" name="newsType" value="<?php echo $editNews->newsType?>" id="newsType" required/>
                                        </div>

                                        <label class="control-label col-lg-2" for="newsStatus">News Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('newsStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="newsStatus" id="newsStatus" required>
                                                <option value="" selected><?php echo SelectStatus?></option>
                                                <option value="<?php echo Active ?>" <?php if (!empty($editNews->newsStatus) && $editNews->newsStatus == Active)  echo 'selected = "selected"'; ?>><?php echo Active?></option>
                                                <option value="<?php echo InActive ?>" <?php if (!empty($editNews->newsStatus) && $editNews->newsStatus == InActive)  echo 'selected = "selected"'; ?>><?php echo InActive?></option>

                                            </select>


                                        </div>



                                    </div>


                                    <div class="form-group ">
                                        <label for="eventContent" class="control-label col-lg-2">News Content<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="newsContent"id="newsContent"required><?php echo $editNews->newsContent?></textarea>
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
                            <?php } ?>
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
<!--<script type="text/javascript" src="--><?php //echo base_url()?><!--public/js/bootstrap-datetimepicker.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">

    $(function () {

        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY h:m A'
        });

    });
</script>

<script type="text/javascript">
    function onsumit(){
        var messageLength = CKEDITOR.instances['newsContent'].getData().replace(/<[^>]*>/gi, '').length;
        if( !messageLength ) {
            alert( 'Please enter a News Content' );
            return false;
        }

    }
</script>