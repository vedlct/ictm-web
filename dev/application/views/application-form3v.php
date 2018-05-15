
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

                <form role="form" action="<?php echo base_url()?>OnlineForms/applyNow3" method="post" class="registration-form form-horizontal">




                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>English Language Proficiency</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 3 / 9</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Is English your first language?:</label>
                                <div class="col-md-10">
                                    <input type="radio" name="" value=""> Yes&nbsp;&nbsp;
                                    <input type="radio" name="" value=""> No&nbsp;&nbsp;
                                </div>
                            </div>

                            <p>If English is not your first language, please state your qualifications.</p>

                            <div class="form-group">
                                <label class="control-label col-md-2">Tests:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="">
                                        <option value="" disabled selected>Select test...</option>
                                        <option value="">IELTS</option>
                                        <option value="">TOEFL</option>
                                        <option value="">PTE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Listening:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="listening">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Reading:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="reading">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Writing:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="writing">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Speaking:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="speaking">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Overall:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="" name="overall">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Expiry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="" name="expirydate">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Add New</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Other (Please Specify):</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>
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


                </form>


                <div id="qualificationTable">
                    <table  class="table  table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Qualification</th>
                            <th>Institution</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Grade</th>
                            <th>Action</th>

                        </tr>
                        <?php foreach ($qualification as $qualifications){?>
                            <tr>
                                <td><?php echo $qualifications->id ?></td>
                                <td><?php echo $qualifications->qualification ?></td>
                                <td><?php echo $qualifications->institution ?></td>
                                <td><?php echo $qualifications->startDate ?></td>
                                <td><?php echo $qualifications->endDate ?></td>
                                <td><?php echo $qualifications->obtainResult ?></td>
                                <td>
                                    <a style="cursor: pointer" data-panel-id="<?php echo $qualifications->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                    <a style="cursor: pointer" data-panel-id="<?php echo $qualifications->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>







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