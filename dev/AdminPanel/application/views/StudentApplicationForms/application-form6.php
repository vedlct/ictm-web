
<?php $this->load->view('Admin/head.php'); ?>
<!-- for Application Form -->
<link rel="stylesheet" href="<?php echo base_url()?>public/css/application-form-style.css">

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table border="0" style="width:100%; margin-top: 30px; border: none;">
                    <tr>
                        <td style="border: none;"><img style="height: 80px; border: none;" src="<?php echo base_url()?>public/img/logoform.jpg" alt=""></td>
                        <td style="border: none;"><h2 style="font-size: 24px; border: none;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
                    </tr>
                </table>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<section class="flat-row padding-small-v1">
    <div class="container">

        <?php if ($this->session->flashdata('errorMessage')!=null){?>
            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
        <?php }
        elseif($this->session->flashdata('successMessage')!=null){?>
            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
        <?php }?>

        <div class="row">
            <div class="col-md-12">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Equal Opportunity</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 7 / 10</p>
                            </div>
                        </div>
                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/insertapplyNow6" method="post" class="registration-form form-horizontal">
                <div class="form-bottom">
                            <p>Equal opportunities monitoring: (please select from the dropdown lists)</p>
                    <?php foreach($opportunityTitle as $a6){
                       // echo $a6->opportunityTitle;
                        ?>
                    <?php  if($a6->opportunityTitle=='Ethnicity') { ?>
                            <div class="form-group">
                                <label class="control-label col-md-2">Ethnicity:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table ">

                        <?php $count=0; foreach($opportunitySubGroupId as $osg){ ?>
                            <?php if ($osg->fkGroupId == $a6->id) { ?>

                                <?php if ($count % 2 ==0) { ?>

                                    <tr>
                                    <?php } ?>
                                                <td ><input type = "radio" required name = "check_list" value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?></td >
<!--                                                <td ><input type = "radio" name = "check_list" value = "--><?php //echo $osg->subGroupTitle?><!--" > --><?php //echo $osg->subGroupTitle?><!--</td >-->
                                    <?php if ($count % 2 !=0) { ?>
                                    </tr>
                                    <?php } ?>

                                    <?php }
                            $count++ ?>
                            <?php }  ?>

                                    </table >
                                </div >
                            </div >
                    <?php }  } ?>


                    <?php foreach($opportunityTitle as $a6){
                        // echo $a6->opportunityTitle;
                        ?>
                        <?php  if($a6->opportunityTitle=='Disability') { ?>
                            <div class="form-group">
                                <label class="control-label col-md-2">Disability:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table ">

                                        <?php $count=0; foreach($opportunitySubGroupId as $osg){ ?>
                                            <?php if ($osg->fkGroupId == $a6->id) { ?>

                                                <?php if ($count % 2 ==0) { ?>

                                                    <tr>
                                                <?php } ?>
                                                <td ><input type = "radio" required name = "check_list1" value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?></td >
                                                <!--                                                <td ><input type = "radio" name = "check_list" value = "--><?php //echo $osg->subGroupTitle?><!--" > --><?php //echo $osg->subGroupTitle?><!--</td >-->
                                                <?php if ($count % 2 !=0) { ?>
                                                    </tr>
                                                <?php } ?>

                                            <?php }
                                            $count++ ?>
                                        <?php }  ?>

                                        <tr>
                                            <td  colspan="2" style="width: 50%;"><span style="margin-right: 100px;">If disabled, are you receiving any Disability Allowances ? </span>


                                                <input type="radio" name="disabilityAllowance" value="1"  >  Yes
                                                <input type="radio" name="disabilityAllowance" value="0" >  No
                                                <input type="radio" name="disabilityAllowance" value="2" >  Prefer Not to say

                                            </td>
                                        </tr>

                                    </table >
                                </div >
                            </div >
                        <?php }  } ?>

                    <?php foreach($opportunityTitle as $a6){
                        // echo $a6->opportunityTitle;
                        ?>
                        <?php  if($a6->opportunityTitle=='Religion Belief') { ?>
                            <div class="form-group">
                                <label class="control-label col-md-2">Religion Belief:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table ">

                                        <?php $count=1; foreach($opportunitySubGroupId as $osg){ ?>
                                            <?php if ($osg->fkGroupId == $a6->id) { ?>

                                                <?php if ($count % 2 ==0) { ?>

                                                    <tr>
                                                <?php }?>
                                                <td ><input type = "radio" required name = "check_list2" value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?></td >
                                                <!--                                                <td ><input type = "radio" name = "check_list" value = "--><?php //echo $osg->subGroupTitle?><!--" > --><?php //echo $osg->subGroupTitle?><!--</td >-->
                                                <?php if ($count % 2 !=0) { ?>
                                                    </tr>
                                                <?php } ?>

                                            <?php }
                                            //echo $count;
                                            $count++ ?>
                                        <?php }  ?>

                                    </table >
                                </div >
                            </div >
                        <?php }  } ?>

                    <?php foreach($opportunityTitle as $a6){
                        // echo $a6->opportunityTitle;
                        ?>
                        <?php  if($a6->opportunityTitle=='Sexual Orientation') { ?>
                            <div class="form-group">
                                <label class="control-label col-md-2">Sexual Orientation:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table ">

                                        <?php $count=0; foreach($opportunitySubGroupId as $osg){ ?>
                                            <?php if ($osg->fkGroupId == $a6->id) { ?>

                                                <?php if ($count % 2 ==0) { ?>

                                                    <tr>
                                                <?php } ?>
                                                <td ><input type = "radio" required name = "check_list3" value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?></td >
                                                <!--                                                <td ><input type = "radio" name = "check_list" value = "--><?php //echo $osg->subGroupTitle?><!--" > --><?php //echo $osg->subGroupTitle?><!--</td >-->
                                                <?php if ($count % 2 !=0) { ?>
                                                    </tr>
                                                <?php } ?>

                                            <?php }
                                            $count++ ?>
                                        <?php }  ?>

                                    </table >
                                </div >
                            </div >
                        <?php }  } ?>

                            <div class="form-group" >
                                <div class="col-sm-offset-2 col-md-10" >
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationPersonalStatement" ><button type="button"  class="btn ">Previous</button></a>
                                    <button type="submit" class="btn btn-next">Save Application</button>
                                    <button type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/insertApplicationForm6AndNext" class="btn btn-next">Save And Next</button>
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationDocumentUpload" ><button type="button"  class="btn ">Next</button></a>
                                </div >
                            </div >
                        </div >


                </form >

<!-- --><?php //  } }?>
            </div><!-- /col-md-9 -->

            <div class="col-md-3">
                <div class="sidebar">

                    <div class="widget widget-courses">
<!--                        <h2 class="widget-title">COURSES LIST</h2>-->
<!--                        --><?php //include("course-sidebar.php"); ?>
                    </div><!-- /widget-posts -->



                </div><!-- sidebar -->
            </div><!-- /col-md-3 -->
        </div>
    </div>
</section>

<?php //include("footer.php"); ?>
<!-- for Application form -->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/jquery.backstretch.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/scripts.js"></script>-->

</div>
</body>

</html>