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
                    <h3 class="page-header"><i class="fa fa-files-o"></i> Edit &nbsp Affiliation</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="<?php echo base_url()?>Admin/Home">Home</a></li>
                        <li><i class="icon_document_alt"></i>Affiliations</li>
                        <li><i class="fa fa-files-o"></i>Edit Affiliation</li>
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
                            Edit Affiliation
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php foreach ($editAffiliation as $editAffiliation){ ?>
                                    <form class="form-validate form-horizontal" id="editAffiliation" method="POST" action="<?php echo base_url() ?>Admin/Affiliation/editAffiliation/<?php echo $editAffiliation->affiliationsId?>" onsubmit="return formvalidate()" enctype="multipart/form-data">

                                        <div class="form-group ">
                                            <label for="affiliationTitle" class="control-label col-lg-2">Affiliation Title<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('affiliationTitle'); ?></font></p>
                                                <input class="form-control" id="affiliationTitle" name="affiliationTitle"  type="text" value="<?php echo htmlspecialchars(stripslashes($editAffiliation->affiliationsTitle))?>" required />
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label for="AffiliationImage" class="control-label col-lg-2">Image </label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('affiliationImage'); ?></font></p>
                                                <span>Image Allowed Types:&nbsp;&nbsp;<strong>jpg/png/jpeg/gif </strong></span>
                                                <input class="form-control" type="file" name="affiliationImage" id="affiliationImage">

                                                <span>View Existing Image:</span><a href="<?php echo base_url()?>Admin/Affiliation/showImageForEdit/<?php echo $editAffiliation->affiliationsId?>" target="_blank"><span> <?php echo $editAffiliation->affiliationsPhotoPath?></span></a>
                                                <?php if ($editAffiliation->affiliationsPhotoPath!=null){?>
                                                    <a href="<?php echo base_url() ?>Admin/Affiliation/deleteAffiliationImage/<?php echo $editAffiliation->affiliationsId ?>" onclick='return confirm("Are you sure to Delete This Affiliation Image?")'><i class="icon_trash"></i></a>
                                                <?php }?>

                                            </div>

                                            <label class="control-label col-lg-2" for="albumStatus">Affiliation Status<span class="required">*</span></label>
                                            <div class="col-lg-4">
                                                <p><font color="red"> <?php echo form_error('affiliationStatus'); ?></font></p>
                                                <select class="form-control m-bot15" name="affiliationStatus" id="affiliationStatus" required>
                                                    <option value="" selected><?php echo SELECT_STATUS ?></option>
                                                    <?php for ($i=0;$i<count(STATUS);$i++){?>
                                                        <option value="<?php echo STATUS[$i]?>"<?php if (!empty($editAffiliation->affiliationsStatus) && $editAffiliation->affiliationsStatus == STATUS[$i])  echo 'selected = "selected"'; ?>><?php echo STATUS[$i]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label for="affiliationDetails" class="control-label col-lg-2">Affiliation Details <span class="required">*</span></label>
                                            <div class="col-lg-10">
                                                <p><font color="red"> <?php echo form_error('affiliationDetails'); ?></font></p>
                                                <textarea class="form-control ckeditor" name="affiliationDetails"  id="affiliationDetails" required><?php echo $editAffiliation->affiliationsDetails ?></textarea>
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
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script>


    function formvalidate() {

        var affiliationDetails = CKEDITOR.instances['affiliationDetails'].getData().replace(/<[^>]*>/gi, '').length;
        var affiliationTitle =  document.getElementById("affiliationTitle").value;

        if (affiliationTitle.length >100){
            alert("Affiliation Title Should not more than 100 Charecter Length");
            return false;
        }

        if( !affiliationDetails ) {
            alert( 'Please enter Affiliation Details' );
            return false;
        }

        else
        {
            return true;
        }
    }

</script>