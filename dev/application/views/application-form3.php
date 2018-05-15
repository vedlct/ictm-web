
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

                <form role="form" action="<?php echo base_url()?>ApplyOnline/insertApplicationForm3" method="post" class="registration-form form-horizontal">

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
                                    <input type="radio" name="firstlanguage" value="yes"> Yes&nbsp;&nbsp;
                                    <input type="radio" name="firstlanguage" value="no"> No&nbsp;&nbsp;
                                </div>
                            </div>


                            <p>If English is not your first language, please state your qualifications.</p>

                            <div id='TextBoxesGroup'>
                                <div id="TextBoxDiv1" >
                            <div class="form-group">
                                <label class="control-label col-md-2">Tests:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" id="test" name="test[]">
                                        <option value="" disabled selected>Select test...</option>
                                        <option value="1">IELTS</option>
                                        <option value="2">TOEFL</option>
                                        <option value="3">PTE</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Listening:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="listening" name="listening[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Reading:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="reading" name="reading[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Writing:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="writing" name="writing[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Speaking:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="speaking" name="speaking[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Overall:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="overall" name="overall[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Expiry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="expirydate" name="expirydate[]">
                                </div>
                            </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button id='addButton' type="button" class="btn">Add New Proficiency</button>
                                    <button class="btn" type='button' value='Remove' id='removeButton'> Remove</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Other (Please Specify):</label>
                                <div class="col-md-10">
                                    <textarea id="comment-message" name="other" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn ">Next</button>
                                    <button type="submit" class="btn btn-next">Save Application</button>
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

<script>

</script>

<script>

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
                '<label class="control-label col-md-2">Tests'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<select style="width: 100%" name="test[]">'+
                '<option value="" disabled selected>Select test...</option>'+
                '<option value="">IELTS</option>'+
                '<option value="">TOEFL</option>'+
                '<option value="">PTE</option>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Listening'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="" name="listening[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Reading'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="" name="reading[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-2">Writing'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="" name="writing[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-2">Speaking'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="" name="speaking[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-2">Overall'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="" name="overall[]">'+
                '</div>'+
                '</div>'+

                '<div class="form-group">'+
                '<label class="control-label col-md-2">Expiry Date'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="date" class="form-control" id="" name="expirydate[]">'+
                '</div>'+
                '</div>'
            );

            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
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
</html>