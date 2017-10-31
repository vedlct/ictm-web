
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Feedback</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ <a href="<?php echo base_url()?>FeedBack">FeedBack </a></li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<?php if ($this->session->flashdata('errorMessage')!=null){?>
    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
<?php }
elseif($this->session->flashdata('successMessage')!=null){?>
    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
<?php }?>

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form role="form" action="<?php echo base_url()?>SubmitFeedback" method="post" enctype="multipart/form-data" class="registration-form form-horizontal">

                    <fieldset>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Name *</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('name'); ?></font></p>
                                    <input type="text" name="name" placeholder="Your Name (maximum 100 charecter)" value="<?php echo set_value('name'); ?>" class="form-control" id="name" maxlength="100" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Profession *</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('profession'); ?></font></p>
                                    <input type="text" name="profession" placeholder="Your Prefession (maximum 100 charecter)" value="<?php echo set_value('profession'); ?>"class="form-control" id="profession" maxlength="100" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Details *</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('details'); ?></font></p>
                                    <textarea name="details" placeholder="Write Feedback (maximum 255 charecter)" class="form-control" id="details" maxlength="255"><?php echo set_value('details'); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Upload Image *:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('image'); ?></font></p>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>

                            <div id="csrf">
                                <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-next">Submit</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </form>


            </div><!-- /col-md-9 -->

        </div>
    </div>
</section>

<?php include("footer.php"); ?>
<script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/scripts.js"></script>
