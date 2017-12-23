
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


                <?php foreach($apllyfrom6 as $a6){ ?>

                <form role="form" action="<?php echo base_url()?>OnlineForms/updatefrom6/<?php echo  $a6->id ?> " method="post" class="registration-form form-horizontal">



                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Equal Opportunity</h3>
                        </div>

                        <div class="form-top-right">
                            <p>Step 6 / 9</p>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <p>Equal opportunities monitoring: (please select from the dropdown lists)</p>
<!--                   --><?php // if($a6->opportunityTitle=='Ethnicity')   { ?>
                        <div class="form-group">
                            <label class="control-label col-md-2">Ethnicity:</label>
                            <div class="col-md-10 table-responsive">
                                <table class="table ">
                                    <tr>
                                        <td ><input type = "radio" name = "check_list" <?php if($a6->subGroupTitle=="white") {echo "checked";} ?>  value = "white" > White</td >
                                        <td ><input type = "radio" name = "check_list" <?php if($a6->subGroupTitle=="White - Scottish") {echo "checked";} ?> value = "White - Scottish" > White - Scottish</td >

                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"   <?php if($a6->subGroupTitle=="Other White background") {echo "checked";} ?>  value = "Other White background" > Other White background </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Gypsy or Traveller") {echo "checked";} ?>  value = "Gypsy or Traveller" > Gypsy or Traveller </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Black or Black British - Caribbean") {echo "checked";} ?>  value = "Black or Black British - Caribbean" > Black or Black British - Caribbean </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Black or Black British - African") {echo "checked";} ?>  value = "Black or Black British - African" > Black or Black British - African </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Other Black background") {echo "checked";} ?>  value = "Other Black background" > Other Black background </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Asian or Asian British - Indian") {echo "checked";} ?>  value = "Asian or Asian British - Indian" > Asian or Asian British - Indian </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Asian or Asian British - Pakistani") {echo "checked";} ?>  value = "Asian or Asian British - Pakistani" > Asian or Asian British - Pakistani </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Asian or Asian British - Bangladeshi") {echo "checked";} ?>  value = "Asian or Asian British - Bangladeshi" > Asian or Asian British - Bangladeshi </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Chinese") {echo "checked";} ?>  value = "Chinese" > Chinese</td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Other Asian background") {echo "checked";} ?>  value = "Other Asian background" > Other Asian background </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Mixed - White and Black Caribbean") {echo "checked";} ?>  value = "Mixed - White and Black Caribbean" > Mixed - White and Black Caribbean </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="ixed - White and Black African") {echo "checked";} ?>  value = "ixed - White and Black African" > Mixed - White and Black African </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Mixed - White and Asian") {echo "checked";} ?>  value = "Mixed - White and Asian" > Mixed - White and Asian </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Other mixed background") {echo "checked";} ?>  value = "Other mixed background" > Other mixed background </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Arab") {echo "checked";} ?>  value = "Arab" > Arab</td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Not known") {echo "checked";} ?>  value = "Not known" > Not known </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Prefer not to say") {echo "checked";} ?>  value = "Prefer not to say" > Prefer not to say </td >
                                        <td ><input type = "radio" name = "check_list"  <?php if($a6->subGroupTitle=="Other") {echo "checked";} ?>  value = "Other" > Other</td >
                                    </tr >
                                </table >
                            </div >
                        </div >

<!--                        --><?php //} ?>

                       <?php
//                           if($a6->opportunityTitle=='Disability')   { ?>
                        <div class="form-group" >
                            <label class="control-label col-md-2" > Disability:</label >
                            <div class="col-md-10 table-responsive" >
                                <table class="table" >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="No known disability") {echo "checked";} ?>  value = "No known disability" > No known disability </td >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Personal care support") {echo "checked";} ?>  value ="Personal care support" > Personal care support </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Special Learning Difficulty") {echo "checked";} ?>  value = "Special Learning Difficulty" > Special Learning Difficulty </td >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Mental health difficulties") {echo "checked";} ?>  value = "Mental health difficulties" > Mental health difficulties </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Autistic Spectrum Disorder") {echo "checked";} ?>  value = "Autistic Spectrum Disorder" > Autistic Spectrum Disorder </td >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Unseen disability e.g. diabetes") {echo "checked";} ?>  value = "Unseen disability e.g. diabetes" > Unseen disability e . g . diabetes </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Blind/partially sighted") {echo "checked";} ?>  value = "Blind/partially sighted" > Blind / partially sighted </td >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Multiple disabilities") {echo "checked";} ?>  value = "Multiple disabilities" > Multiple disabilities </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Deaf/hearing impairment") {echo "checked";} ?>  value = "Deaf/hearing impairment" > Deaf / hearing impairment </td >
                                        <td ><input type = "radio" name = "check_list1" <?php if($a6->subGroupTitle=="Other") {echo "checked";} ?> value = "Other" > Other</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Dyslexia") {echo "checked";} ?>  value = "Dyslexia" > Dyslexia</td >
                                        <td ><input type = "radio" name = "check_list1"  <?php if($a6->subGroupTitle=="Prefer not to say") {echo "checked";} ?>  value = "Prefer not to say" > Prefer not to say </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list1" <?php if($a6->subGroupTitle=="Wheelchair user/mobility difficulties") {echo "checked";} ?>   value = "Wheelchair user/mobility difficulties" > Wheelchair user / mobility difficulties </td >
                                        <td ></td >
                                    </tr >
                                </table >
                            </div >
                        </div >
<!--                        --><?php //} ?>

                        <?php
//                            if($a6->opportunityTitle=='Religion Belief')   { ?>
                        <div class="form-group" >
                            <label class="control-label col-md-2" > Religion Belief:</label >
                            <div class="col-md-10 table-responsive" >
                                <table class="table" >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="No religion") {echo "checked";} ?>  value = " No religion" > No religion </td >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Jewish") {echo "checked";} ?>  value = "Jewish" > Jewish</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Buddhist") {echo "checked";} ?>  value = "Buddhist" > Buddhist</td >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Muslim") {echo "checked";} ?>  value = "Muslim" > Muslim</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Christian") {echo "checked";} ?>  value = "Christian" > Christian</td >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Sikh") {echo "checked";} ?>  value = "Sikh" > Sikh</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Christian - Church of Scotland") {echo "checked";} ?>  value = "Christian - Church of Scotland" > Christian - Church of Scotland </td >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Spiritual") {echo "checked";} ?>  value = "Spiritual" > Spiritual</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Christian - Roman Catholic") {echo "checked";} ?>  value = "Christian - Roman Catholic" > Christian - Roman Catholic </td >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Other") {echo "checked";} ?>  value = "Other" > Other</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Christian - Other denomination") {echo "checked";} ?>  value = "Christian - Other denomination" > Christian - Other denomination </td >
                                        <td ><input type = "radio" name = "check_list2"  <?php if($a6->subGroupTitle=="Prefer not to say") {echo "checked";} ?>  value = "Prefer not to say" > Prefer not to say </td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list2" value = "Hindu" > Hindu</td >
                                        <td ></td >
                                    </tr >
                                </table >
                            </div >
                        </div >

<!--                        --><?php //} ?>
                        <?php
//                            if($a6->opportunityTitle=='Sexual Orientation')   { ?>
                        <div class="form-group" >
                            <label class="control-label col-md-2" > Sexual Orientation:</label >
                            <div class="col-md-10 table-responsive" >
                                <table class="table" >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list3"  <?php if($a6->subGroupTitle=="Bisexual") {echo "checked";} ?>  value = "Bisexual" > Bisexual</td >
                                        <td ><input type = "radio" name = "check_list3"  <?php if($a6->subGroupTitle=="Heterosexual") {echo "checked";} ?>  value = "Heterosexual" > Heterosexual</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list3"  <?php if($a6->subGroupTitle=="Gay") {echo "checked";} ?>  value = "Gay" > Gay</td >
                                        <td ><input type = "radio" name = "check_list3"  <?php if($a6->subGroupTitle=="Other") {echo "checked";} ?>  value = "Other" > Other</td >
                                    </tr >
                                    <tr >
                                        <td ><input type = "radio" name = "check_list3"  <?php if($a6->subGroupTitle=="Lesbian") {echo "checked";} ?>  value = "Lesbian" > Lesbian</td >
                                        <td ><input type = "radio" name = "check_list3"  <?php if($a6->subGroupTitle=="Prefer not to say") {echo "checked";} ?>  value = "Prefer not to say" > Prefer not to say </td >
                                    </tr >
                                </table >
                            </div >
                        </div >
<!--                  --><?php //} ?>
                        <div class="form-group" >
                            <div class="col-sm-offset-2 col-md-10" >
                                <button type = "button" class="btn btn-previous" > Previous</button >
                                <button type = "submit" class="btn " > Next</button >
                                <button type = "submit" class="btn btn-next" > Save Application </button >
                            </div >
                        </div >
                    </div >


                </form >



                 <?php break; } ?>
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