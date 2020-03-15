
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

                <form action="<?php echo base_url()?>ApplyOnline/insertApplicationForm2" method="post" onsubmit="return checkForm()" class="form-horizontal">

                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Qualifications </h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 2 / 10</p>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div id='TextBoxesGroup'>
                                <div id="TextBoxDiv1" >
                            <div class="form-group">
                                <label class="control-label col-md-3">Qualification<span style="color: red">*</span>:</label>
                                <div class="col-md-9">
                                    <input tabindex="1" type="text" class="form-control" id="qualification" required name="qualification[]">
                                </div>
                            </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Qualification Level<span style="color: red">*</span>:</label>
                                        <div class="col-md-9">
                                            <input tabindex="2" type="text" class="form-control" id="qualificationLevel" required name="qualificationLevel[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Awarding Body<span style="color: red">*</span>:</label>
                                        <div class="col-md-9">
                                            <input tabindex="3" type="text" class="form-control" id="awardingBody" required name="awardingBody[]">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Subject<span style="color: red">*</span>:</label>
                                        <div class="col-md-9">
                                            <input tabindex="4" type="text" class="form-control" id="subject" required name="subject[]">
                                        </div>
                                    </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Institution<span style="color: red">*</span>:</label>
                                <div class="col-md-9">
                                    <input tabindex="5" type="text" class="form-control" id="institution" required name="institution[]">
                                </div>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <label class="control-label col-md-3">Start Date<span style="color: red">*</span>:</label>-->
<!--                                <div class="col-md-9">-->
<!--                                    <input type="date" class="form-control" id="startdate" required name="startdate[]">-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="form-group">-->
<!--                                <label class="control-label col-md-3">End Date<span style="color: red">*</span>:</label>-->
<!--                                <div class="col-md-9">-->
<!--                                    <input type="date" class="form-control" id="enddate" required name="enddate[]">-->
<!--                                </div>-->
<!--                            </div>-->

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Completion Year<span style="color: red">*</span>:</label>
                                        <div class="col-md-9">
<!--                                            <input type="text" class="form-control datetimepicker" id="completionYear" required name="completionYear[]">-->
                                            <?php
                                            $currently_selected = date('');
                                            $earliest_year = 1950;
                                            $latest_year = date('Y');
                                            print '<select tabindex="6" name="completionYear[]" required>';
                                            print '<option value=""  selected>Select Year</option>';
                                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                                print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                            }
                                            print '</select>';
                                            ?>

                                        </div>
                                    </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Grade<span style="color: red">*</span>:</label>
                                <div class="col-md-9">
                                    <input tabindex="7" type="text" class="form-control" id="grade" required name="grade[]">
                                </div>
                            </div>

                                </div>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <div class="col-sm-offset-2 col-md-9">-->
<!--                                    <button id='addButton' type="button" class="btn btn-next">Add New Qualification</button>-->
<!--                                    <button class="btn btn-next" type='button'  value='Remove' id='removeButton'> Remove</button>-->
<!--                                </div>-->
<!--                            </div>-->




                            <div class="form-group" align="right">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-next"><span style="color: #FFFFFF;">Add qualifications</span></button>
                                    </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <!--                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                    <a href="<?php echo base_url()?>Apply" ><button type="button"  class="btn btn-previous"><span style="color: #FFFFFF;">Previous</span></button></a>
                                    <button type="reset" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>
                                    <button type="button"  onclick="getConfirmation()" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                                    <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm2Save" class="btn btn-next"><span style="color: #FFFFFF;">Save for Later</span></button>
                                    <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm2AndNext" class="btn btn-next"><span style="color: #FFFFFF;">Next</span></button>
                                    <!--                                    <a href="--><?php //echo base_url()?><!--Apply-Work-Experience" ><button type="button"  class="btn btn-next">Next</button></a>-->
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY'
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

                var Qualification=$('#qualification').val();
                var institution=$('#institution').val();
//                var startdate=$('#startdate').val();
//                var enddate=$('#enddate').val();
                var grade=$('#grade').val();

                var qualificationLevel=$('#qualificationLevel').val();
                var awardingBody=$('#awardingBody').val();
                var subject=$('#subject').val();
                var completionYear=$('#completionYear').val();

                if (Qualification == ""){
                    alert('Please add a Qualification');
                    return false;
                }if (Qualification.length > 100){
                    alert('Qualification must be less then 100 charecter');
                    return false;
                }if (institution == ""){
                    alert('Please add a institution');
                    return false;
                }if (institution.length >100){
                    alert('Institution must be less then 100 charecter');
                    return false;
                }
                if (qualificationLevel == ""){
                    alert('Please add a qualificationLevel');
                    return false;
                }
                if (awardingBody == ""){
                    alert('Please add a awardingBody');
                    return false;
                }
                if (subject == ""){
                    alert('Please add a subject');
                    return false;
                }
                if (completionYear == ""){
                    alert('Please add a completionYear');
                    return false;
                }

//                if (startdate == ""){
//                    alert('Please add a startdate');
//                    return false;
//                }if (enddate == ""){
//                    alert('Please add a enddate');
//                    return false;
//                }

                if (grade == ""){
                    alert('Please add a grade');
                    return false;
                }if (grade.length > 20){
                    alert('grade must be less then 20 charecter');
                    return false;
                }
//                if (enddate < startdate){
//                    alert('Please Select StartDate and EndDate Correctly');
//                    return false;
//                }
            }
            else{

                var Qualification=$('#qualification'+(counter-1)).val();
                var institution=$('#institution'+(counter-1)).val();
//                var startdate=$('#startdate'+(counter-1)).val();
//                var enddate=$('#enddate'+(counter-1)).val();
                var grade=$('#grade'+(counter-1)).val();

                var qualificationLevel=$('#qualificationLevel'+(counter-1)).val();
                var awardingBody=$('#awardingBody'+(counter-1)).val();
                var subject=$('#subject'+(counter-1)).val();
                var completionYear=$('#completionYear'+(counter-1)).val();


                if (Qualification == ""){
                    alert('Please add a Qualification'+counter);
                    return false;
                }if (Qualification.length > 100){
                    alert('Qualification'+counter+' must be less then 100 charecter');
                    return false;
                }if (institution == ""){
                    alert('Please add a institution'+counter);
                    return false;
                }if (institution.length >100){
                    alert('Institution'+counter+' must be less then 100 charecter');
                    return false;
                }
                if (qualificationLevel == ""){
                    alert('Please add a qualificationLevel'+counter);
                    return false;
                }
                if (awardingBody == ""){
                    alert('Please add a awardingBody'+counter);
                    return false;
                }
                if (subject == ""){
                    alert('Please add a subject'+counter);
                    return false;
                }
                if (completionYear == ""){
                    alert('Please add a completionYear'+counter);
                    return false;
                }

//                if (startdate == ""){
//                    alert('Please add a startdate');
//                    return false;
//                }if (enddate == ""){
//                    alert('Please add a enddate');
//                    return false;
//                }

                if (grade == ""){
                    alert('Please add a grade'+counter);
                    return false;
                }if (grade.length > 20){
                    alert('grade'+counter+' must be less then 20 charecter');
                    return false;
                }
//                if (enddate < startdate){
//                    alert('Please Select StartDate and EndDate Correctly');
//                    return false;
//                }
            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html( '<div class="form-group">'+
                '<label class="control-label col-md-3">Qualification'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="8" type="text" class="form-control" id="qualification'+counter+'" name="qualification[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Institution'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="9" type="text" class="form-control" id="institution'+counter+'" name="institution[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Qualification Level'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="10" type="text" class="form-control" id="qualificationLevel"  name="qualificationLevel[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Awarding Body'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="11" type="text" class="form-control" id="awardingBody"  name="awardingBody[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Subject'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="12" type="text" class="form-control" id="subject" required name="subject[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Completion Year'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="13" type="text" class="form-control datetimepicker" id="completionYear"  name="completionYear[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Grade'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input tabindex="14" type="text" class="form-control" id="grade'+counter+'" name="grade[]">'+
                '</div>'+
                '</div>'
            );

            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
            $('.datetimepicker').datetimepicker({
                format: 'YYYY'
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


    function checkForm() {

        var Qualification=$('#qualification').val();
        var institution=$('#institution').val();
//        var startdate=$('#startdate').val();
//        var enddate=$('#enddate').val();
        var grade=$('#grade').val();

        var qualificationLevel=$('#qualificationLevel').val();
        var awardingBody=$('#awardingBody').val();
        var subject=$('#subject').val();
        var completionYear=$('#completionYear').val();

        if (Qualification == ""){
            alert('Please add a Qualification');
            return false;
        }if (Qualification.length > 100){
            alert('Qualification must be less then 100 charecter');
            return false;
        }if (institution == ""){
            alert('Please add a institution');
            return false;
        }if (institution.length > 100){
            alert('Institution must be less then 100 charecter');
            return false;
        }

        if (qualificationLevel == ""){
            alert('Please add a qualificationLevel');
            return false;
        }
        if (awardingBody == ""){
            alert('Please add a awardingBody');
            return false;
        }
        if (subject == ""){
            alert('Please add a subject');
            return false;
        }
        if (completionYear == ""){
            alert('Please add a completionYear');
            return false;
        }

//        if (startdate == ""){
//            alert('Please add a startdate');
//            return false;
//        }if (enddate == ""){
//            alert('Please add a enddate');
//            return false;
//        }
        if (grade == ""){
            alert('Please add a grade');
            return false;
        }if (grade.length > 20){
            alert('grade must be less then 20 charecter');
            return false;
        }
//        if (enddate < startdate){
//            alert('Please Select StartDate and EndDate Correctly');
//            return false;
//        }
    }

</script>
<script type="text/javascript">

    function getConfirmation()
    {


        if (confirm("Do You Want to Continue ?")) {
            window.location.href = "<?php echo base_url()?>AllFormForStudents";
        } else {
            return false;

        }


    }
</script>

</html>
