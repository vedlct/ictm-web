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
            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

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
                                            <span>Image Allowed :&nbsp;&nbsp; <strong>jpg/png/jpeg/gif & MaxSize(4MB)</strong></span>
                                            <input class="form-control" type="file" name="news_image" id="news_image" />

                                            <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/News/showImageForEdit/<?php echo $editNews->newsId?>" target="_blank"><span> <?php echo $editNews->newsPhoto?></span></a>
                                            <?php if ($editNews->newsPhoto!=null){?>
                                                <a href="<?php echo base_url() ?>Admin/News/deleteNewsImage/<?php echo $editNews->newsId ?>" onclick='return confirm("Are you sure to Delete This News Image?")'><i class="icon_trash"></i></a>
                                            <?php }?>
                                        </div>

                                    </div>


                                    <div class="form-group">


                                        <label class="control-label col-lg-2" for="newsType">News Type<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('newsType'); ?></font></p>

                                            <select class="form-control m-bot15" name="newsType" id="newsType" required>
                                                <option value="" selected><?php echo SELECT_NEWS_TYPE?></option>
                                                <?php for($i=0;$i<count(NewsType);$i++){?>
                                                <option value="<?php echo NewsType[$i]?>" <?php if (!empty($editNews->newsType) && $editNews->newsType ==  NewsType[$i])  echo 'selected = "selected"'; ?>><?php echo NewsType[$i]?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <label class="control-label col-lg-2" for="newsStatus">News Status<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('newsStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="newsStatus" id="newsStatus" required>
                                                <option value=""><?php echo SELECT_STATUS?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($editNews->newsStatus) && $editNews->newsStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>
                                            </select>


                                        </div>



                                    </div>


                                    <div class="form-group ">
                                        <label for="eventContent" class="control-label col-lg-2">News Content<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" name="newsContent"id="newsContent"required><?php echo $editNews->newsContent?></textarea>
                                        </div>
                                    </div>

                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
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
<script type="text/javascript" src="<?php echo base_url()?>public/js/datepicker.min.js"></script>

<script type="text/javascript">

    $(function () {

        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY H:m'
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