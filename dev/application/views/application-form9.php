
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

<div id="sessionFlashMessageDiv">
    <?php if ($this->session->flashdata('errorMessage')!=null){?>
        <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
    <?php }
    elseif($this->session->flashdata('successMessage')!=null){?>
        <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
    <?php }?>

</div>

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <form role="form" action="<?php echo base_url()?>ApplyOnline/insertApplyNow9" method="post" onsubmit="return checkForm()" class="form-horizontal">



<!--                    <fieldset>-->
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Completed</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 10 / 10</p>
                            </div>
                        </div>
                        <div class="form-bottom">

                            <p><input tabindex="1"  required type="checkbox" id="check" name="check"> &nbsp;&nbsp;I confirm that to the best of my knowledge, the information given in this form is correct and complete.  I have read the terms and conditions and other policies of the college and agree to abide by them during my entire course of study. I agree to ICON College of Technology and Management processing personal data submitted in this application form, or any other data that the College may obtain from me to the processing for any purposes connected with my studies or my health and safety, or for any other legitimate reason (in accordance with the Data Protection Act 1998). I authorise ICON College to issue my course result to my sponsor if my sponsor so requests. The Application form and copies of all supporting documents will be retained by ICON College in case of an unsuccessful application for admission.</p>
                            <p><strong>Note:</strong> All decisions by the College are taken in good faith on the basis of the statements made on your application form.  If the College discovers that you have made a false statement or have omitted significant information on your application form, for example in examination results, it may withdraw or amend its offer, or terminate your registration, according to the circumstances. The information given on this application form will be electronically stored and used for administrative purposes by the College in accordance with the provisions of the Data Protection Acts 1984 and 1998.</p>

                            <a href="<?php echo base_url()?>ApplyForm7" ><button type="button" class="btn btn-previous"><span style="color: #FFFFFF;">Previous</span></button></a>
                            <button type="submit"  class="btn btn-next"><span style="color: #FFFFFF;">SUBMIT!</span></button>
<!--                            --><?php //foreach ($applications as $application){?>
<!--                                <a target="_blank" href="--><?php //echo base_url()?><!--ApplyOnline/showApplicationPdf/--><?php //echo $application->id ?><!--"><button type="button" class="btn btn-next"><span style="color: #FFFFFF;">Download PDF</span></button></a>-->
<!--                            --><?php //} ?>
<!--                            <button type="button" class="btn btn-next"><span style="color: #FFFFFF;">Download PDF</span></button>-->

                            <a class="btn" target="_blank" href="<?php echo base_url()?>ApplyOnline/showApplicationPdflast/"><button type="button" class="btn btn-next"><span style="color: #FFFFFF;">Download PDF</span></button></a>


                        </div>
<!--                    </fieldset>-->

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
<script>
    function checkForm() {


        if ($('input#check').is(':checked')) {

            var result = confirm("Are you sure you want to submit the Application");
            if (result) {
                return true;
            }else {
                return false;
            }


        }

    }
</script>