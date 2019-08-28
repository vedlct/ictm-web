
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Application Form</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ Application Form</li>
                    </ul>
                </div>
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
            <div class="col-md-9">






                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Equal Opportunity</h3>
                        </div>

                        <div class="form-top-right">
                            <p>Step 7 / 10</p>
                        </div>
                    </div>
                <form role="form" action="<?php echo base_url()?>ApplyOnline/updatefrom6" method="post" class="form-horizontal">


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
                                                    <td ><input tabindex="1" type = "radio" required name = "check_list" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                    <input tabindex="2" type="hidden" name="id_check_list" value="<?php echo $EO->personalOpportunityId ?>"></td >
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
                                                            <td ><input tabindex="3" type = "radio" required name = "check_list1" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                                <input tabindex="4" type="hidden" name="id_check_list1" value="<?php echo $EO->personalOpportunityId ?>">
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





                                                                <input tabindex="5" type="radio" name="disabilityAllowance" value="1"  <?php if ($EO->personalDisabilityAllowance == '1') {echo "checked=checked";}?> >  Yes
                                                                <input tabindex="6" type="radio" name="disabilityAllowance" value="0" <?php if ($EO->personalDisabilityAllowance == '0') {echo "checked=checked";}?> >  No
                                                                <input tabindex="7" type="radio" name="disabilityAllowance" value="2" <?php if ($EO->personalDisabilityAllowance == '2') {echo "checked=checked";}?> >  Prefer Not to say

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
                                                    <td ><input tabindex="8" type = "radio" required name = "check_list2" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                        <input tabindex="9" type="hidden" name="id_check_list2" value="<?php echo $EO->personalOpportunityId ?>">
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
                                                    <td ><input tabindex="10" type = "radio" required name = "check_list3" <?php if($osg->id==$EO->id){ echo "checked=checked";}?> value = "<?php echo $osg->id?>" > <?php echo $osg->subGroupTitle?>
                                                        <input tabindex="11" type="hidden" name="id_check_list3" value="<?php echo $EO->personalOpportunityId ?>">
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
                                <a href="<?php echo base_url()?>ApplyForm4" ><button type="button"  class="btn ">Previous</button></a>
                                <button type="submit" class="btn btn-next">Save Application</button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editApplicationForm6AndNext" class="btn btn-next">Save And Next</button>
                                <a href="<?php echo base_url()?>ApplyForm8" ><button type="button"  class="btn ">Next</button></a>
                            </div >
                        </div >
                    </div >




                </form >





            </div><!-- /col-md-9 -->

            <div class="col-md-3">
                <div class="sidebar">

                    <div class="widget widget-courses">
                        <h2 class="widget-title">COURSES LIST</h2>
                        <?php include("course-sidebar.php"); ?>
                    </div><!-- /widget-posts -->



                </div><!-- sidebar -->
            </div><!-- /col-md-3 -->
        </div>
    </div>
</section>

<?php include("footer.php"); ?>
<!-- for Application form -->
<script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
<script src="<?php echo base_url()?>public/javascript/scripts.js"></script>

</div>
</body>

</html>