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
            <div class="col-md-9">

                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/insertapplyNow7" enctype="multipart/form-data" method="post" class="registration-form form-horizontal">

<!--                    <fieldset>-->
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Upload Documents</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 8 / 10</p>
                            </div>
                        </div>
                        <div class="form-bottom">

                            <p style="font-weight:bold; text-decoration:underline">Entry Requirement Documents:</p>
                            <p>Submit a completed Application Form along with the following:</p>
                            <div class="form-group">
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <ul style="list-style-type:disc">
                                        <li>Passport size photo – 2</li>
                                        <li>Academic certificates and transcripts (a qualification that is equivalent to UK NVQ Level 3)</li>
                                        <li>Work reference letter in a letter headed paper (if your qualifications are lower than NVQ Level 3 e.g. GCSE / NVQ Level 2 or Equivalent qualifications) - Within last 3 months’ time</li>
                                        <li>Passport + Visa (if applicable)</li>
                                        <li>Proof of address (bank statement, council tax bill, utility bill, payslip, Full Driving licence) - Within last 3 months’ time</li>
                                        <li>Need to proof 5 Years Residency (If applicable) or if an EU Migrant worker (6 months’ UK payslips)</li>
                                        <li><b>Please note that all students whose first language is not English will be required to prove their proficiency in English Language to a minimum standard of CEFR Level B2 or equivalent.</b></li>
                                        <li><b>Completed application form along with copies of supporting documents will be retained by Icon College in the event of successful / unsuccessful admission.</b></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Upload file:</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control"  name="fileUpload[]" multiple>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationEqualOppertunity" ><button type="button"  class="btn ">Previous</button></a>
                                    <button type="submit" class="btn btn-next">Save Application</button>
                                    <button type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm7AndNext" class="btn btn-next">Save And Next</button>
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationReferences" ><button type="button"  class="btn ">Next</button></a>
                                </div>
                            </div>
                        </div>
<!--                    </fieldset>-->

                </form>










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
<!--<!-- for Application form -->-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/jquery.backstretch.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/scripts.js"></script>-->

</div>
</body>

</html>