<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Album</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Album</li>
                        <li><i class="fa fa-files-o"></i>Edit Album</li>
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
                            Edit Album
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($edit_Album as $edit_Album){ ?>
                                <form class="form-validate form-horizontal" id="editAlbum" method="POST" action="<?php echo base_url() ?>Admin/Album/editAlbum/<?php echo $edit_Album->albumId?>" onsubmit="return formvalidate()">

                                    <div class="form-group ">
                                        <label for="albumCategory" class="control-label col-lg-2">Album Category Name<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('albumCategory'); ?></font></p>
                                            <input class="form-control" id="albumCategory" name="albumCategory"  type="text" value="<?php echo $edit_Album->albumCategoryName?>" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="albumTitle">Album Title <span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('albumTitle'); ?></font></p>
                                            <input class="form-control" id="albumTitle" name="albumTitle"  value="<?php echo $edit_Album->albumTitle?>" type="text" required />

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label for="albumDetails" class="control-label col-lg-2">Album Description<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="albumDetails" id="albumDetails" required><?php echo $edit_Album->albumDescription ; ?></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2" for="albumStatus">Album Status<span class="required">*</span></label>
                                        <div class="col-lg-10">
                                            <p><font color="red"> <?php echo form_error('albumStatus'); ?></font></p>
                                            <select class="form-control m-bot15" name="albumStatus" id="albumStatus" required>
                                                <option value=""><?php echo SELECT_STATUS?></option>
                                                <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                    <option value="<?php echo STATUS[$i]?>"<?php if (!empty($edit_Album->albumStatus) && $edit_Album->albumStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                <?php } ?>

                                            </select>

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
<script>


    function formvalidate() {

        var albumCategory =  document.getElementById("albumCategory").value;
        var albumTitle =  document.getElementById("albumTitle").value;
        var albumDetails =  document.getElementById("albumDetails").value;

        if (albumCategory.length >255){
            alert("Album Category Name Should not more than 255 Charecter Length");
            return false;
        }
        if (albumTitle.length >255){
            alert("Album Title Should not more than 255 Charecter Length");
            return false;
        }
        if (albumDetails.length<=0){
            alert("Album Description is nedded");
            return false;
        }
        else
        {
            return true;
        }
    }

</script>