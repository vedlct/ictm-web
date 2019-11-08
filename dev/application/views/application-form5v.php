
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
                                <h3>Personal Statement</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 5 / 10</p>
                            </div>
                        </div>
                <form role="form" action="<?php echo base_url()?>ApplyOnline/updateAapplyNow5" method="post" class="form-horizontal" onsubmit="return checkvalidation()">

                <?php foreach ($PersonalStatementData as $f5) { ?>

                    <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-3">Why do you wish to do this course?<br> (Minimum 200 words required)<span style="color: red">*</span>:</label>
                                <div class="col-md-9">
                                    <textarea id="courseChoiceStatement"  required name="courseChoiceStatement" rows="8" tabindex="1"  ><?php echo $f5->courseChoiceStatement ?> </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Where did you find out about the courses of our College? <span style="color: red">*</span>:</label>
                                <div class="col-md-9">

                                    <select tabindex="2" style="width: 100%" id="collegeChoiceStatement" required name="collegeChoiceStatement">
                                        <option value=""  selected>Select Source...</option>
                                        <?php for ($i=0;$i<count(PERSONAL_STATEMENT);$i++){?>
                                            <option value="<?php echo PERSONAL_STATEMENT[$i]?>"<?php if (!empty($f5->collegeChoiceStatement) && $f5->collegeChoiceStatement == PERSONAL_STATEMENT[$i])  echo 'selected = "selected"'; ?>><?php echo PERSONAL_STATEMENT[$i]?></option>
                                        <?php } ?>
                                    </select>
                                  
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-9">
                                    <a href="<?php echo base_url()?>ApplyForm3" ><button type="button" class="btn btn-previous"><span style="color: #FFFFFF;">Previous</span></button></a>
                                    <button type="reset" id="hide" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>
                                    <button type="submit" formaction="<?php echo base_url()?>AllFormForStudents" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                                    <button type="submit" class="btn btn-next"><span style="color: #FFFFFF;">Save For Later</span></button>
                                    <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editApplicationForm5AndNext" class="btn btn-next"><span style="color: #FFFFFF;">Next</span></button>
<!--                                    <a href="--><?php //echo base_url()?><!--ApplyForm4" ><button type="button"  class="btn btn-next">Next</button></a>-->

                                </div>
                            </div>
                        </div>
                <?php    } ?>

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

<script>
    function checkvalidation() {

        var words = document.getElementById('courseChoiceStatement').value;
        var wordsarray = words.split(" ");
        var numwords = wordsarray.length;
//        var words = $.questionField.value.split(" ").length;
//        if(value.match(words)<200 || value.match(words)>1000){
//            alert('Please lengthen this text 200 words or more ');
//            return false;
//
//        }
        if (numwords < 200 || numwords > 1000) {
            alert('Please lengthen this text 200 words to 1000 words ');
            return false; // keep form from submitting
        }
    }
</script>
<script>
    $(document).ready(function(){
        $("#hide").click(function(){
//            $("#courseChoiceStatement").removeAttr('value');
            $('#courseChoiceStatement').val('').empty();
            $("#collegeChoiceStatement").children().removeAttr("selected");



        });
    });
</script>