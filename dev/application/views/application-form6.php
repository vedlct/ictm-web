
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
        <div class="row">
            <div class="col-md-9">

                <form role="form" action="<?php echo base_url()?>OnlineForms/applyNow6" method="post" class="registration-form form-horizontal">

                    <fieldset>
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
                                            <td><input type="radio" name="" value=""> White</td>
                                            <td><input type="radio" name="" value=""> White - Scottish</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Other White background</td>
                                            <td><input type="radio" name="" value=""> Gypsy or Traveller</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Black or Black British - Caribbean</td>
                                            <td><input type="radio" name="" value=""> Black or Black British - African</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Other Black background</td>
                                            <td><input type="radio" name="" value=""> Asian or Asian British - Indian</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Asian or Asian British - Pakistani</td>
                                            <td><input type="radio" name="" value=""> Asian or Asian British - Bangladeshi</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Chinese</td>
                                            <td><input type="radio" name="" value=""> Other Asian background</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Mixed - White and Black Caribbean</td>
                                            <td><input type="radio" name="" value=""> Mixed - White and Black African</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Mixed - White and Asian</td>
                                            <td><input type="radio" name="" value=""> Other mixed background</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Arab</td>
                                            <td><input type="radio" name="" value=""> Not known</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Disability:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><input type="radio" name="" value=""> No known disability</td>
                                            <td><input type="radio" name="" value=""> Personal care support</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Special Learning Difficulty</td>
                                            <td><input type="radio" name="" value=""> Mental health difficulties</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Autistic Spectrum Disorder</td>
                                            <td><input type="radio" name="" value=""> Unseen disability e.g. diabetes</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Blind/partially sighted</td>
                                            <td><input type="radio" name="" value=""> Multiple disabilities</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Deaf/hearing impairment</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Dyslexia</td>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Wheelchair user/mobility difficulties</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Religion Belief:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><input type="radio" name="" value=""> No religion</td>
                                            <td><input type="radio" name="" value=""> Jewish</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Buddhist</td>
                                            <td><input type="radio" name="" value=""> Muslim</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian</td>
                                            <td><input type="radio" name="" value=""> Sikh</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian - Church of Scotland</td>
                                            <td><input type="radio" name="" value=""> Spiritual</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian - Roman Catholic</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Christian - Other denomination</td>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Hindu</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Sexual Orientation:</label>
                                <div class="col-md-10 table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td><input type="radio" name="" value=""> Bisexual</td>
                                            <td><input type="radio" name="" value=""> Heterosexual</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Gay</td>
                                            <td><input type="radio" name="" value=""> Other</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="" value=""> Lesbian</td>
                                            <td><input type="radio" name="" value=""> Prefer not to say</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn ">Next</button>
                                    <button type="button" class="btn btn-next">Save Application</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                </form>










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