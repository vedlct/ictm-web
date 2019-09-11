
<?php include("header.php"); ?>
<style>
    .datepicker .next ,.prev {
        position: relative !important;
    }
</style>

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

<?php if ($this->session->flashdata('errorMessage')!=null){?>
    <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
<?php }
elseif($this->session->flashdata('successMessage')!=null){?>
    <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
<?php }?>

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <form role="form" action="<?php echo base_url()?>ApplyOnline/insertApplicationForm3" method="post" class="form-horizontal">

                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>English Language Proficiency</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 4 / 10</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <label class="control-label col-md-3">Is English your first language?<span style="color: red" class="required">*</span>:</label>
                                <div class="col-md-9">
                                    <input tabindex="1" type="radio" <?php if ($fLanguage=='1'){?>checked<?php } ?> name="firstLanguage" value="1"> Yes&nbsp;&nbsp;
                                    <input tabindex="2" type="radio" <?php if ($fLanguage=='0'){?>checked<?php } ?> name="firstLanguage" value="0"> No&nbsp;&nbsp;
                                </div>
                            </div>

                            <div style="display: none" id="Englishproficience">
                            <p>If English is not your first language, please state your qualifications.</p>

                            <div id='TextBoxesGroup'>
                                <div id="TextBoxDiv1" >
                            <div class="form-group">
                                <label class="control-label col-md-3">Tests:</label>
                                <div class="col-md-9">
                                    <select tabindex="3" style="width: 100%" id="test" name="test[]" onchange="checkother()">
                                        <option  value="" disabled selected>Select test...</option>
                                        <option  value="1">IELTS</option>
                                        <option  value="2">TOEFL</option>
                                        <option  value="3">PTE</option>
                                        <option  value="4">OTHER</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="listendiv" style="display: block">
                                <label class="control-label col-md-3">Listening:</label>
                                <div class="col-md-9">
                                    <input tabindex="4" type="text" class="form-control" id="listening" name="listening[]">
                                </div>
                            </div>

                            <div class="form-group" id="readingdiv" style="display: block">
                                <label class="control-label col-md-3">Reading:</label>
                                <div class="col-md-9">
                                    <input tabindex="5" type="text" class="form-control" id="reading" name="reading[]">
                                </div>
                            </div>

                            <div class="form-group" id="writingdiv" style="display: block">
                                <label class="control-label col-md-3">Writing:</label>
                                <div class="col-md-9">
                                    <input tabindex="6" type="text" class="form-control" id="writing" name="writing[]">
                                </div>
                            </div>

                            <div class="form-group" id="speakingdiv" style="display: block">
                                <label class="control-label col-md-3">Speaking: </label>
                                <div class="col-md-9">
                                    <input tabindex="7" type="text" class="form-control" id="speaking" name="speaking[]">
                                </div>
                            </div>

                            <div class="form-group" id="overralldiv" style="display: block">
                                <label class="control-label col-md-3">Overall:</label>
                                <div class="col-md-9">
                                    <input tabindex="8" type="text" class="form-control" id="overall" name="overall[]">
                                </div>
                            </div>

                            <div class="form-group" id="expirediv" style="display: block">
                                <label class="control-label col-md-3">Expiry Date:</label>
                                <div class="col-md-9">
                                    <input tabindex="9" type="text" class="form-control datetimepicker" id="expirydate" name="expirydate[]">
                                </div>
                            </div>
                                </div>
                            </div>

<!--                            <div class="form-group" id="addmore" style="display: block">-->
<!--                                <div class="col-sm-offset-2 col-md-9">-->
<!--                                    <button id='addButton' type="button" class="btn">Add New Proficiency</button>-->
<!--                                    <button class="btn" type='button' value='Remove' id='removeButton'> Remove</button>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="form-group" id="otherdiv" style="display: none">
                                <label class="control-label col-md-3">Other (Please Specify):</label>
                                <div class="col-md-9">
                                    <textarea tabindex="10" id="comment-message" name="other" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-9">


                                    <a href="<?php echo base_url()?>Apply-Work-Experience" ><button type="button"  class="btn btn-previous">Previous</button></a>
                                    <button type="reset" class="btn btn-next">Reset</button>
                                    <button type="submit" class="btn btn-next"><span id="update">Add proficiency</span></button>
                                    <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm3AndNext" class="btn btn-next">Save And Next</button>
<!--                                    <a href="--><?php //echo base_url()?><!--ApplyForm5" ><button type="button"  class="btn btn-next">Next</button></a>-->

                                </div>
                            </div>
                        </div>

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

<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('.datetimepicker').keydown(function(e) {
            e.preventDefault();
            return false;
        });
    });

    $("input  [name=firstLanguage]").click( function () {

        if ($(this).val()=='1'){
            document.getElementById("Englishproficience").style.display = "none";
        }else {
            document.getElementById("Englishproficience").style.display = "block";
        }
    });
    $(document).ready(function(){
        if ('<?php echo $fLanguage?>'== '0'){
            document.getElementById("Englishproficience").style.display = "block";
        }else {
            document.getElementById("Englishproficience").style.display = "none";
        }
    });

</script>

<script>

    function checkother() {
        if(document.getElementById('test').value == "4"){


            document.getElementById('listendiv').style.display = 'none';
            document.getElementById('readingdiv').style.display = 'none';
            document.getElementById('writingdiv').style.display = 'none';
            document.getElementById('speakingdiv').style.display = 'none';
            document.getElementById('overralldiv').style.display = 'none';
            document.getElementById('expirediv').style.display = 'none';
            document.getElementById('addmore').style.display = 'none';


            document.getElementById('otherdiv').style.display = 'block';
        }
        else
        {
            document.getElementById('listendiv').style.display = 'block';
            document.getElementById('readingdiv').style.display = 'block';
            document.getElementById('writingdiv').style.display = 'block';
            document.getElementById('speakingdiv').style.display = 'block';
            document.getElementById('overralldiv').style.display = 'block';
            document.getElementById('expirediv').style.display = 'block';
            document.getElementById('addmore').style.display = 'block';


            document.getElementById('otherdiv').style.display = 'none';

        }
    }

    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html( '<div class="form-group">'+
                '<label class="control-label col-md-3">Tests'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<select tabindex="11" style="width: 100%" name="test[]">'+
                '<option value="" disabled selected>Select test...</option>'+
                '<option value="1">IELTS</option>'+
                '<option value="2">TOEFL</option>'+
                '<option value="3">PTE</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Listening'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="12" type="text" class="form-control" id="" name="listening[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Reading'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="13" type="text" class="form-control" id="" name="reading[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-3">Writing'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="14" type="text" class="form-control" id="" name="writing[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-3">Speaking'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="15" type="text" class="form-control" id="" name="speaking[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-3">Overall'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="16" type="text" class="form-control" id="" name="overall[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-3">Expiry Date'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="17" type="text" class="form-control datetimepicker" id="" name="expirydate[]">'+
                '</div>'+
                '</div>'
            );

            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
            $('.datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('.datetimepicker').keydown(function(e) {
                e.preventDefault();
                return false;
            });
        });
        $("#removeButton").click(function () {
            if(counter==2){
                alert(" There Should be atleast one Qualification");
                document.getElementById('Item_price').style.display = "block";
//                    document.getElementById('Item_Status').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                document.getElementById('showattr').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });

</script>
