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
                    <h3 class="page-header"><i class="fa fa fa-bars"></i> Home</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i><a href="<?php echo base_url()?>Admin/Home/middleBanner">Middle Banner</a></li>

                    </ol>
                </div>
            </div>

            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Home Middle Banner
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($middleBannerdata as $middleBannerdata) { ?>
                                <form class="form-validate form-horizontal" id="newPhoto" name="newPhoto" method="POST"  action="<?php echo base_url()?>Admin/Home/editMiddleBanner/<?php echo $middleBannerdata->homeId ?>" onsubmit="return submitform()">

                                    <div class="form-group col-sm-12">

                                        <label for="title1" class="control-label col-lg-2">Ttile 1<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title1'); ?></font></p>
                                            <input class="form-control" id="title1" name="title1" maxlength="255" value="<?php echo $middleBannerdata->middleBannerTitle1; ?>" type="text" required />
                                        </div>

                                        <label for="link1" class="control-label col-sm-2">Link 1<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <p><font color="red"> <?php echo form_error('link1'); ?></font></p>
                                            <input class="form-control" id="link1" name="link1" maxlength="500" value="<?php echo $middleBannerdata->middleBannerLink1; ?>" type="text" required />

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text1" class="control-label col-sm-2">text 1<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="text1" id="text1" maxlength="255" required><?php echo $middleBannerdata->middleBannerText1; ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title2" class="control-label col-lg-2">Ttile 2<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title2'); ?></font></p>
                                            <input class="form-control" id="title2" name="title2" maxlength="255" value="<?php echo $middleBannerdata->middleBannerTitle2;?>" type="text" required />
                                        </div>

                                        <label for="link2" class="control-label col-sm-2">Link 2<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <p><font color="red"> <?php echo form_error('link2'); ?></font></p>
                                            <input class="form-control" id="link2" name="link2" maxlength="500" value="<?php echo $middleBannerdata->middleBannerLink2;?>" type="text" required />

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text2" class="control-label col-sm-2">text 2<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="text2" maxlength="255" id="text2" required><?php echo $middleBannerdata->middleBannerText2;?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12">

                                        <label for="title3" class="control-label col-lg-2">Ttile 3<span class="required">*</span></label>
                                        <div class="col-lg-4">
                                            <p><font color="red"> <?php echo form_error('title3'); ?></font></p>
                                            <input class="form-control" id="title3" maxlength="255" name="title3"  value="<?php echo $middleBannerdata->middleBannerTitle3;?>" type="text" required />
                                        </div>

                                        <label for="link3" class="control-label col-sm-2">Link 3<span class="required">*</span></label>

                                        <div class="col-sm-4">

                                            <p><font color="red"> <?php echo form_error('link3'); ?></font></p>
                                            <input class="form-control" id="link3" maxlength="500" name="link3"  value="<?php echo $middleBannerdata->middleBannerLink3;?>" type="text" required />

                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">

                                        <label for="text3" class="control-label col-sm-2">text 3<span class="required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control " name="text3" maxlength="255" id="text3" required><?php echo $middleBannerdata->middleBannerText3;?></textarea>
                                        </div>

                                    </div>




                                    <div id="csrf">
                                        <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                    </div>

                                    <div class="form-group "align="center">
                                        <div class="col-sm-10">
                                            <input class="btn btn-success" type="submit" value="Submit" style="margin-left: 180px">
                                            <input class="btn btn-close" type="reset" >
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
<?php include('js.php') ?>

</body>
</html>

<script type="text/javascript">

    function submitform(){

        var Title1=document.getElementById("title1").value;
        var Title2=document.getElementById("title2").value;
        var Title3=document.getElementById("title3").value;
        var Link1=document.getElementById("link1").value;
        var Link2=document.getElementById("link2").value;
        var Link3=document.getElementById("link3").value;
        var Text1=document.getElementById("text1").value;
        var Text2=document.getElementById("text2").value;
        var Text3=document.getElementById("text3").value;

        if(Title1.length >255) {
            alert( 'Title1 must be less than 255 charecter!!' );
            return false;
        }
        if(Title2.length >255) {
            alert( 'Title2 must be less than 255 charecter!!' );
            return false;
        }
        if(Title3.length >255) {
            alert( 'Title3 must be less than 255 charecter!!' );
            return false;
        }
        if(Link1.length >500) {
            alert( 'Link1 must be less than 500 charecter!!' );
            return false;
        }
        if(Link2.length >500) {
            alert( 'Link2 must be less than 500 charecter!!' );
            return false;
        }
        if(Link3.length >500) {
            alert( 'Link3 must be less than 500 charecter!!' );
            return false;
        }
        if(Text1.length >255) {
            alert( 'Text1 must be less than 255 charecter!!' );
            return false;
        }
        if(Text2.length >255) {
            alert( 'Text2 must be less than 255 charecter!!' );
            return false;
        }
        if(Text3.length >255) {
            alert( 'Text2 must be less than 255 charecter!!' );
            return false;
        }

    }
</script>
