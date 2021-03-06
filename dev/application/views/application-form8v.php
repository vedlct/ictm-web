
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

                <form role="form" action="<?php echo base_url()?>OnlineForms/applyNow8" method="post" class="registration-form form-horizontal">

                    <fieldset>
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Referees</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 8 / 9</p>
                            </div>
                        </div>

                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Title:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <option value="">Mr.</option>
                                        <option value="">Mrs.</option>
                                        <option value="">Ms.</option>
                                        <option value="">Miss.</option>
                                        <option value="">Other...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Institution/Company:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Position / Job Title:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="" name="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add Another Referee</button>
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