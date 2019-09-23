<!--Work Experience / Training -->
<?php include("header.php"); ?>
<!--<style>-->
<!--    .datepicker .next ,.prev {-->
<!--        position: relative !important;-->
<!--    }-->
<!--</style>-->

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

                <form action="<?php echo base_url()?>ApplyOnline/insertApplicationForm10" method="post" onsubmit="return checkForm()" class="form-horizontal">

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
                                    <label class="control-label col-md-3">Organisation / Regulatory Body:</label>
                                    <div class="col-md-9">
                                        <input tabindex="1"  type="text" class="form-control" maxlength="100" id="organisation"  name="organisation[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Position Held:</label>
                                    <div class="col-md-9">
                                        <input tabindex="2"  type="text" class="form-control" id="positionHeld" maxlength="100"  name="positionHeld[]">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">From:</label>
                                    <div class="col-md-9">
<!--                                        <input type="text" class="form-control datetimepicker" id="startdate"  name="startdate[]">-->


                                        Date:
                                        <select tabindex="5"  id="workstrdate" name="workstrdate">
                                            <?php
                                            foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                                echo "<option value='$dateNumber'>{$date}</option>";
                                            }
                                            ?>
                                        </select>
                                        &nbsp;
                                        Month:
                                        <select tabindex="4"  id="workstrmonth" name="workstrmonth">
                                            <?php
                                            foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                echo "<option value='$monthNumber'>{$month}</option>";
                                            }
                                            ?>
                                        </select>
                                        &nbsp;
                                        Year:
                                        <?php
                                        $currently_selected = date('Y');
                                        $earliest_year = 1950;
                                        $latest_year = date('Y');
                                        print '<select tabindex="3"  id="workstryear" name="workstryear">';
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                            print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                        }
                                        print '</select>';
                                        ?>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">To:</label>
                                    <div class="col-md-9">
<!--                                        <input type="text" class="form-control datetimepicker" id="enddate"  name="enddate[]">-->


                                        Date:
                                        <select tabindex="8"  id="workenddate" name="workenddate">
                                            <?php
                                            foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10','11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30','31'] as $dateNumber => $date) {
                                                echo "<option value='$dateNumber'>{$date}</option>";
                                            }
                                            ?>
                                        </select>
                                        &nbsp;
                                        Month:
                                        <select tabindex="7"  id="workendmonth" name="workendmonth">
                                            <?php
                                            foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $monthNumber => $month) {
                                                echo "<option value='$monthNumber'>{$month}</option>";
                                            }
                                            ?>
                                        </select>
                                        &nbsp;
                                        Year:
                                        <?php
                                        $currently_selected = date('Y');
                                        $earliest_year = 1950;
                                        $latest_year = date('Y');
                                        print '<select tabindex="6"  id="workendyear" name="workendyear">';
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                            print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                        }
                                        print '</select>';
                                        ?>

                                    </div>
                                </div>


                            </div>
                        </div>

<!--                        <div class="form-group">-->
<!--                            <div class="col-sm-offset-2 col-md-9">-->
<!--                                <button id='addButton' type="button" class="btn " style="background-color: #4cae4c">Add New Qualification</button>-->
<!--                                <button class="btn " type='button' value='Remove' id='removeButton' style="background-color: darkred"> Remove</button>-->
<!--                            </div>-->
<!--                        </div>-->




                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-9">
                                <!--                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                <a href="<?php echo base_url()?>ApplyForm2" ><button type="button" class="btn btn-previous">Previous</button></a>
                                <button type="reset" class="btn btn-next">Reset</button>
                                <button type="submit" class="btn btn-next">Add experience</button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm10AndNext" class="btn btn-next">Save And Next</button>
<!--                                <a href="--><?php //echo base_url()?><!--ApplyForm3" ><button type="button"  class="btn btn-next">Next</button></a>-->
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
<!--<script type="text/javascript">-->
<!--    $(function () {-->
<!--        $('.datetimepicker').datetimepicker({-->
<!--            format: 'YYYY-MM-DD'-->
<!--        });-->
<!--        $('.datetimepicker').keydown(function(e) {-->
<!--            e.preventDefault();-->
<!--            return false;-->
<!--        });-->
<!--    });-->
<!--</script>-->

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
                '<label class="control-label col-md-3">Qualification'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input type="text" class="form-control" id="organisation'+counter+'" name="organisation[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Institution'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input type="text" class="form-control" id="positionHeld'+counter+'" name="positionHeld[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">Start Date'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input type="text" class="form-control datetimepicker" id="startdate'+counter+'" name="startdate[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">End Date'+counter+':</label>'+
                '<div class="col-md-9">'+
                '<input type="text" class="form-control datetimepicker" id="enddate'+counter+'" name="enddate[]">'+
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


        var organisation = $('#organisation').val();
        var positionHeld = $('#positionHeld').val();
//        var startdate=$('#startdate').val();
//        var enddate=$('#enddate').val();
//        var strdate = new Date(startdate);
//        var stryear = strdate.getFullYear();
//        var enddate = new Date(enddate);
//        var endyear = enddate.getFullYear();
        var recentyr = new Date().getFullYear();



        var startyear = $('#workstryear').val();
        var startmonth = $('#workstrmonth').val();
        var startdat = $('#workstrdate').val();

        var stratdate = new Date(startyear, startmonth ,startdat);

        var endyear = $('#workendyear').val();
        var endmonth = $('#workendmonth').val();
        var enddat = $('#workenddate').val();
        var enddate = new Date(endyear,endmonth,enddat);

        //alert(stratdate)
        if (enddate < stratdate) {

            alert('Please Select StartDate and EndDate Correctly');
            return false;
        }


        if (organisation == "") {
            alert('Please add a Qualification');
            return false;
        }
        if (positionHeld.length > 100) {
            alert('Qualification must be less then 100 charecter');
            return false;
        }
//        }if (startdate == ""){
//            alert('Please add a startdate');
//            return false;
//        }if (enddate == ""){
//            alert('Please add a enddate');
//            return false;
//
//
//        }
//        if (enddate < startdate){
//
//            alert('Please Select StartDate and EndDate Correctly');
//            return false;
//        }
        if (startyear > recentyr){

            alert('Future Year cannot be selected');
            return false;
        }
        if (endyear > recentyr){

            alert('Future Year cannot be selected');
            return false;
        }



        var startyear = $('#workstryear').val();
        var startmonth = parseInt(document.getElementById('workstrmonth').value)+1;
        var startdat = parseInt(document.getElementById('workstrdate').value)+1;

        //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);


        //alert(dob);
        if(validatedate(startdat, startmonth , startyear)=="false"){
            return false;
        }






        var endyear = $('#workendyear').val();
		var endmonth = parseInt(document.getElementById('workendmonth').value)+1;
		var enddat = parseInt(document.getElementById('workenddate').value)+1;

		//var endatdate = new Date(endyear + "-" + endmonth + "-" + enddat);


		//alert(dob);
		if(validatedate(enddat, endmonth , endyear)=="false"){
			return false;
		}

}



</script>


<script>
    function validatedate(dd , mm , yy)
    {
        var dd = parseInt(dd);
        var mm  = parseInt(mm);
        var yy = parseInt(yy);

        // Create list of days of a month [assume there is no leap year by default]
        var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];
        if (mm==1 || mm>2)
        {
            if (dd>ListofDays[mm-1])
            {
                alert('Invalid date format!');
                return "false";
            }
        }
        if (mm==2)
        {
            var lyear = false;
            if ( (!(yy % 4) && yy % 100) || !(yy % 400))
            {
                lyear = true;
            }
            if ((lyear==false) && (dd>=29))
            {
                alert('Invalid date format!');
                return "false";
            }
            if ((lyear==true) && (dd>29))
            {
                alert('Invalid date format!');
                return "false";
            }
        }
    }
</script>
