
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

                <form role="form" action="<?php echo base_url()?>OnlineForms/applyNow2" method="post" class="registration-form form-horizontal">



                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Qualifications</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 2 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Qualification:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="qualification">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Institution:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="institution">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Start Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="startdate">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">End Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="enddate">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Grade:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="grade">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add New Qualification</button>
                                </div>
                            </div>

                            <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Work Experience</h2>

                            <div class="form-group">
                                <label class="control-label col-md-2">Organisation:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Position Held:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">From:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">To:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="">
                                </div>
                            </div>

                            <table class="table  table-bordered">
                                <tr>
                                    <th>Qualification</th>
                                    <th>Institution</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Grade</th>
                                    <th>Action</th>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>

                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn">Next</button>

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