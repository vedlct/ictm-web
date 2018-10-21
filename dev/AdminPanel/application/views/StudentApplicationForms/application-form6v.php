
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
                        <td style="border: none;"><h2 style="  border: medium none;font-size: 33px;margin-bottom: 22px;margin-left: 37px;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
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
                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/updatefrom6" method="post" class="form-horizontal">


                    <div class="form-bottom">
                        <p>Equal opportunities monitoring: (please select from the dropdown lists)</p>
                        <?php foreach($EqualOpportunity as $EO){ ?>
                        <?php  if($EO->opportunityTitle=='Ethnicity') { ?>
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
                                                    <td ><input type = "radio" required name = "check_list" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                    <input type="hidden" name="id_check_list" value="<?php echo $EO->personalOpportunityId ?>"></td >
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
                            <?php } }  } } ?>

                        <?php foreach($EqualOpportunity as $EO){ ?>
                            <?php  if($EO->opportunityTitle=='Disability') { ?>
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
                                                            <td ><input type = "radio" required name = "check_list1" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                                <input type="hidden" name="id_check_list1" value="<?php echo $EO->personalOpportunityId ?>">
                                                            </td >
                                                            <!--                                                <td ><input type = "radio" name = "check_list" value = "--><?php //echo $osg->subGroupTitle?><!--" > --><?php //echo $osg->subGroupTitle?><!--</td >-->
                                                            <?php if ($count % 2 !=0) { ?>
                                                                </tr>
                                                            <?php } ?>

                                                        <?php }
                                                        $count++ ?>
                                                    <?php }  ?>

                                                    <tr>
                                                        <td  colspan="2" style="width: 50%;"><span style="margin-right: 100px;">If disabled, are you receiving any Disability Allowances ? </span>





                                                            <input type="radio" name="disabilityAllowance" value="1"  <?php if ($EO->personalDisabilityAllowance == '1') {echo "checked=checked";}?> >  Yes
                                                            <input type="radio" name="disabilityAllowance" value="0" <?php if ($EO->personalDisabilityAllowance == '0') {echo "checked=checked";}?> >  No
                                                            <input type="radio" name="disabilityAllowance" value="2" <?php if ($EO->personalDisabilityAllowance == '2') {echo "checked=checked";}?> >  Prefer Not to say

                                                        </td>
                                                    </tr>

                                                </table >
                                            </div >
                                        </div >
                                    <?php }  } } } ?>

                        <?php foreach($EqualOpportunity as $EO){ ?>
                        <?php  if($EO->opportunityTitle=='Religion Belief') { ?>

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
                                                    <td ><input type = "radio" required name = "check_list2" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                        <input type="hidden" name="id_check_list2" value="<?php echo $EO->personalOpportunityId ?>">
                                                    </td >
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
                            <?php }  } } }?>

                        <?php foreach($EqualOpportunity as $EO){ ?>
                        <?php  if($EO->opportunityTitle=='Sexual Orientation') { ?>

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
                                                    <td ><input type = "radio" required name = "check_list3" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                        <input type="hidden" name="id_check_list3" value="<?php echo $EO->personalOpportunityId ?>">
                                                    </td >
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
                            <?php }  } } }?>


                        <div class="form-group" >
                            <div class="col-sm-offset-2 col-md-10" >
                                <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationPersonalStatement" ><button style="color: #fff; background-color: #841A29;" type="button"  class="btn ">Previous</button></a>
                                <button style="color: #fff; background-color: #841A29;" type="submit" class="btn btn-next">Save Application</button>
                                <button style="color: #fff; background-color: #841A29;" type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm6AndNext" class="btn btn-next">Save And Next</button>
                                <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationDocumentUpload" ><button style="color: #fff; background-color: #841A29;" type="button"  class="btn ">Next</button></a>
                            </div >
                        </div >
                    </div >




                </form >





            </div><!-- /col-md-9 -->

            <div class="col-md-3">
                <div class="sidebar">

                    <div class="widget widget-courses">

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