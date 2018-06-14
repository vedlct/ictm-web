
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



                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Personal Statement</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 6 / 10</p>
                            </div>
                        </div>
                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/updateAapplyNow5" method="post" class="registration-form form-horizontal">

                <?php foreach ($PersonalStatementData as $f5) { ?>

                    <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-2">Why do you wish to do this course?<span style="color: red">*</span>:</label>
                                <div class="col-md-10">
                                    <textarea id="courseChoiceStatement"  required name="courseChoiceStatement" rows="8" tabindex="4"  ><?php echo $f5->courseChoiceStatement ?> </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Where did you find out about the courses of our College?<span style="color: red">*</span>:</label>
                                <div class="col-md-10">
                                    <textarea id="collegeChoiceStatement" required name="collegeChoiceStatement" rows="8" tabindex="4"><?php echo $f5->collegeChoiceStatement ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <a href="<?php echo base_url()?>ApplyForm4" ><button type="button" class="btn btn-previous">Previous</button></a>
                                    <button type="submit" class="btn btn-next">Save Application</button>
                                    <button type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editApplicationForm5AndNext" class="btn btn-next">Save And Next</button>
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationEqualOppertunity" ><button type="button"  class="btn ">Next</button></a>
                                </div>
                            </div>
                        </div>
                <?php    } ?>

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
<script>

    function formvalidate() {


        var courseChoiceStatement =  document.getElementById("courseChoiceStatement").value;
        var collegeChoiceStatement = document.getElementById("collegeChoiceStatement").value;



        if ( courseChoiceStatement==""){
            alert("Course Choice Statement  Can not Empty");
            return false;
        }



        if (collegeChoiceStatement=="" )
        {
            alert(" College Choice Statement  Can not Empty");
            return false;
        }



        else
        {
            return true;
        }
    }
</script>