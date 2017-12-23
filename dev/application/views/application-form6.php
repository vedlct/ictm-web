
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

                <form role="form" action="<?php echo base_url()?>OnlineForms/insertapplyNow6" method="post" class="registration-form form-horizontal">


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
                            <div class="form-group">
                                <label class="control-label col-md-2">Ethnicity:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table ">
                                        <tr>
<!--                                            --><?php // foreach ($title as $id ) { ?>
<!--                                               --><?php // if( $id->opportunityTitle == 'Ethnicity') {  ?>
<!--                                                 <input type="text" value="--><?php //echo $id->id ?><!--">-->
                                                <td ><input type = "radio" name = "check_list" value = "white" > White</td >
                                            <td ><input type = "radio" name = "check_list" value = "White - Scottish" > White - Scottish</td >

                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Other White background" > Other White background </td >
                                            <td ><input type = "radio" name = "check_list" value = "Gypsy or Traveller" > Gypsy or Traveller </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Black or Black British - Caribbean" > Black or Black British - Caribbean </td >
                                            <td ><input type = "radio" name = "check_list" value = "Black or Black British - African" > Black or Black British - African </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Other Black background" > Other Black background </td >
                                            <td ><input type = "radio" name = "check_list" value = "Asian or Asian British - Indian" > Asian or Asian British - Indian </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Asian or Asian British - Pakistani" > Asian or Asian British - Pakistani </td >
                                            <td ><input type = "radio" name = "check_list" value = "Asian or Asian British - Bangladeshi" > Asian or Asian British - Bangladeshi </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Chinese" > Chinese</td >
                                            <td ><input type = "radio" name = "check_list" value = "Other Asian background" > Other Asian background </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = " Mixed - White and Black Caribbean" > Mixed - White and Black Caribbean </td >
                                            <td ><input type = "radio" name = "check_list" value = "ixed - White and Black African" > Mixed - White and Black African </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Mixed - White and Asian" > Mixed - White and Asian </td >
                                            <td ><input type = "radio" name = "check_list" value = "Other mixed background" > Other mixed background </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = "Arab" > Arab</td >
                                            <td ><input type = "radio" name = "check_list" value = "Not known" > Not known </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list" value = " Prefer not to say" > Prefer not to say </td >
                                            <td ><input type = "radio" name = "check_list" value = "Other" > Other</td >
                                        </tr >
                                    </table >
                                </div >
                            </div >

                            <div class="form-group" >
                                <label class="control-label col-md-2" > Disability:</label >
                                <div class="col-md-10 table-responsive" >
                                    <table class="table" >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "No known disability" > No known disability </td >
                                            <td ><input type = "radio" name = "check_list1" value = "Personal care support" > Personal care support </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "Special Learning Difficulty" > Special Learning Difficulty </td >
                                            <td ><input type = "radio" name = "check_list1" value = "Mental health difficulties" > Mental health difficulties </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "Autistic Spectrum Disorder" > Autistic Spectrum Disorder </td >
                                            <td ><input type = "radio" name = "check_list1" value = "Unseen disability e.g. diabetes" > Unseen disability e . g . diabetes </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "Blind/partially sighted" > Blind / partially sighted </td >
                                            <td ><input type = "radio" name = "check_list1" value = "Multiple disabilities" > Multiple disabilities </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "Deaf/hearing impairment" > Deaf / hearing impairment </td >
                                            <td ><input type = "radio" name = "check_list1" value = "Other" > Other</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "Dyslexia" > Dyslexia</td >
                                            <td ><input type = "radio" name = "check_list1" value = "Prefer not to say" > Prefer not to say </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list1" value = "Wheelchair user/mobility difficulties" > Wheelchair user / mobility difficulties </td >
                                            <td ></td >
                                        </tr >
                                    </table >
                                </div >
                            </div >

                            <div class="form-group" >
                                <label class="control-label col-md-2" > Religion Belief:</label >
                                <div class="col-md-10 table-responsive" >
                                    <table class="table" >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = " No religion" > No religion </td >
                                            <td ><input type = "radio" name = "check_list2" value = "Jewish" > Jewish</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = "Buddhist" > Buddhist</td >
                                            <td ><input type = "radio" name = "check_list2" value = "Muslim" > Muslim</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = "Christian" > Christian</td >
                                            <td ><input type = "radio" name = "check_list2" value = "Sikh" > Sikh</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = "Christian - Church of Scotland" > Christian - Church of Scotland </td >
                                            <td ><input type = "radio" name = "check_list2" value = "Spiritual" > Spiritual</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = "Christian - Roman Catholic" > Christian - Roman Catholic </td >
                                            <td ><input type = "radio" name = "check_list2" value = "Other" > Other</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = "Christian - Other denomination" > Christian - Other denomination </td >
                                            <td ><input type = "radio" name = "check_list2" value = "Prefer not to say" > Prefer not to say </td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list2" value = "Hindu" > Hindu</td >
                                            <td ></td >
                                        </tr >
                                    </table >
                                </div >
                            </div >

                            <div class="form-group" >
                                <label class="control-label col-md-2" > Sexual Orientation:</label >
                                <div class="col-md-10 table-responsive" >
                                    <table class="table" >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list3" value = "Bisexual" > Bisexual</td >
                                            <td ><input type = "radio" name = "check_list3" value = "Heterosexual" > Heterosexual</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list3" value = "Gay" > Gay</td >
                                            <td ><input type = "radio" name = "check_list3" value = "Other" > Other</td >
                                        </tr >
                                        <tr >
                                            <td ><input type = "radio" name = "check_list3" value = "Lesbian" > Lesbian</td >
                                            <td ><input type = "radio" name = "check_list3" value = "Prefer not to say" > Prefer not to say </td >
                                        </tr >
                                    </table >
                                </div >
                            </div >

                            <div class="form-group" >
                                <div class="col-sm-offset-2 col-md-10" >
                                    <button type = "button" class="btn btn-previous" > Previous</button >
                                    <button type = "submit" class="btn " > Next</button >
                                    <button type = "submit" class="btn btn-next" > Save Application </button >
                                </div >
                            </div >
                        </div >


                </form >

<!-- --><?php //  } }?>
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