
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

                <form action="<?php echo base_url()?>ApplyOnline/insertApplicationForm10" method="post" onsubmit="return checkForm()" class="registration-form form-horizontal">

                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Work Experience/Training</h3>
                        </div>

                        <div class="form-top-right">
                            <p>Step 3 / 10</p>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <div id='TextBoxesGroup'>
                            <div id="TextBoxDiv1" >
                                <div class="form-group">
                                    <label class="control-label col-md-2">Organisation<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" maxlength="100" id="organisation" required name="organisation[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Position Held<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="positionHeld" maxlength="100" required name="positionHeld[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Start Date<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datetimepicker" id="startdate" required name="startdate[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">End Date<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control datetimepicker" id="enddate" required name="enddate[]">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-10">
                                <button id='addButton' type="button" class="btn">Add New Qualification</button>
                                <button class="btn " type='button' value='Remove' id='removeButton'> Remove</button>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-10">
                                <!--                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                <a href="<?php echo base_url()?>ApplyForm2" ><button type="button" class="btn btn-previous">Previous</button></a>
                                <button type="submit" class="btn btn-next">Save Application</button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm10AndNext" class="btn btn-next">Save And Next</button>
                                <a href="<?php echo base_url()?>ApplyForm3" ><button type="button"  class="btn btn-next">Next</button></a>
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
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
</script>

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
            }if (counter == 2){
                var organisation=$('#organisation').val();
                var positionHeld=$('#positionHeld').val();
                var startdate=$('#startdate').val();
                var enddate=$('#enddate').val();


                if (organisation == ""){
                    alert('Please add a Qualification');
                    return false;
                }if (organisation.length > 100){
                    alert('Qualification must be less then 100 charecter');
                    return false;
                }if (positionHeld == ""){
                    alert('Please add a institution');
                    return false;
                }if (positionHeld.length >100){
                    alert('Institution must be less then 100 charecter');
                    return false;
                }if (startdate == ""){
                    alert('Please add a startdate');
                    return false;
                }if (enddate == ""){
                    alert('Please add a enddate');
                    return false;
                }if (enddate < startdate){
                    alert('Please Select StartDate and EndDate Correctly');
                    return false;
                }
            }else{

                var organisation=$('#organisation'+(counter-1)).val();
                var positionHeld=$('#positionHeld'+(counter-1)).val();
                var startdate=$('#startdate'+(counter-1)).val();
                var enddate=$('#enddate'+(counter-1)).val();



                if (organisation == ""){
                    alert('Please add a Qualification');
                    return false;
                }if (organisation.length > 100){
                    alert('Qualification must be less then 100 charecter');
                    return false;
                }if (positionHeld == ""){
                    alert('Please add a institution');
                    return false;
                }if (positionHeld.length >100){
                    alert('Institution must be less then 100 charecter');
                    return false;
                }if (startdate == ""){
                    alert('Please add a startdate');
                    return false;
                }if (enddate == ""){
                    alert('Please add a enddate');
                    return false;
                }if (enddate < startdate){
                    alert('Please Select StartDate and EndDate Correctly');
                    return false;
                }
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html( '<div class="form-group">'+
                '<label class="control-label col-md-2">Qualification'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="organisation'+counter+'" name="organisation[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Institution'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="positionHeld'+counter+'" name="positionHeld[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Start Date'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="date" class="form-control" id="startdate'+counter+'" name="startdate[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">End Date'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="date" class="form-control" id="enddate'+counter+'" name="enddate[]">'+
                '</div>'+
                '</div>'

            );

            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        });
        $("#removeButton").click(function () {
            if(counter==2){
                alert(" There Should be atleast one Work Experience");
                document.getElementById('Item_price').style.display = "block";

                document.getElementById('add_remove_button').style.display = "none";
                document.getElementById('showattr').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });

    function checkForm() {

        var organisation=$('#organisation').val();
        var positionHeld=$('#positionHeld').val();
        var startdate=$('#startdate').val();
        var enddate=$('#enddate').val();




        if (organisation == ""){
            alert('Please add a Qualification');
            return false;
        }if (positionHeld.length > 100){
            alert('Qualification must be less then 100 charecter');
            return false;

        }if (startdate == ""){
            alert('Please add a startdate');
            return false;
        }if (enddate == ""){
            alert('Please add a enddate');
            return false;

            
        }
        if (enddate < startdate){

            alert('Please Select StartDate and EndDate Correctly');
            return false;
        }
    }

</script>

