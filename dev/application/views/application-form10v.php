
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

                <form action="<?php echo base_url()?>ApplyOnline/updateApplicationForm10" method="post" onsubmit="return checkForm()" class=" form-horizontal">

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
                                    <label class="control-label col-md-3">Organisation:</label>
                                    <div class="col-md-9">

                                        <p><font color="red"> <?php echo form_error('organisation'); ?></font></p>


                                        <input tabindex="1"  type="text" class="form-control" id="organisation"  maxlength="100"  name="organisation">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Position Held:</label>
                                    <div class="col-md-9">

                                        <p><font color="red"> <?php echo form_error('positionHeld'); ?></font></p>

                                        <input tabindex="2"  type="text" class="form-control" id="positionHeld" maxlength="100"  name="positionHeld">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">From:</label>
                                    <div class="col-md-9">
                                        <p><font color="red"> <?php echo form_error('startdate'); ?></font></p>
<!--                                        <input type="text" class="form-control datetimepicker" id="startdate"  name="startdate">-->

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
                                        &nbsp;&nbsp;&nbsp;
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
                                        <p><font color="red"> <?php echo form_error('enddate'); ?></font></p>
<!--                                        <input type="text" class="form-control datetimepicker" id="enddate"  name="enddate">-->

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

                                <input tabindex="9"  type="hidden" name="experience" id="experience">
                            </div>
                        </div>

<!--                        <div class="form-group">-->
<!--                            <div class="col-sm-offset-2 col-md-9">-->
<!--                                <button id='addButton' type="button" class="btn">Add New Qualification</button>-->
<!--                                <button class="btn " type='button' value='Remove' id='removeButton'> Remove</button>-->
<!--                            </div>-->
<!--                        </div>-->




                        <div class="form-group" align="right">
                            <div class="col-sm-offset-2 col-md-9">
                                <!--                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                <button type="submit" class="btn btn-next"><span id="update" style="color: #FFFFFF;">Add experience</span></button>

                            </div>
                        </div>
                        <div id="qualificationTable" class="table-responsive">
                            <table  class="table  table-bordered ">
                                <tr>
                                    <th>Id</th>
                                    <th>Organization</th>
                                    <th>PositionHeld</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>

                                </tr>
                                <?php foreach ($experience as $experiences){?>
                                    <tr>
                                        <td><?php echo $experiences->id ?></td>
                                        <td><?php echo $experiences->organization ?></td>
                                        <td><?php echo $experiences->positionHeld ?></td>
                                        <td><?php echo $experiences->startDate ?></td>
                                        <td><?php echo $experiences->endDate ?></td>

                                        <td>
                                            <a style="cursor: pointer" data-panel-id="<?php echo $experiences->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                            <a style="cursor: pointer" data-panel-id="<?php echo $experiences->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-9">
                                <!--                                    <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                <a href="<?php echo base_url()?>ApplyForm2" ><button type="button" class="btn btn-previous"><span style="color: #FFFFFF;">Previous</span></button></a>
                                <button type="reset" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>
                                <button type="submit" formaction="<?php echo base_url()?>AllFormForStudents" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/updateApplicationForm10AndNext" class="btn btn-next"><span style="color: #FFFFFF;">Save For Later</span></button>
                                <a href="<?php echo base_url()?>ApplyForm3" ><button type="button"  class="btn btn-next"><span style="color: #FFFFFF;">Next</span></button></a>
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
        $("#addButton").click(function() {
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
                '<input type="date" class="form-control" id="startdate'+counter+'" name="startdate[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-3">End Date'+counter+':</label>'+
                '<div class="col-md-9">'+
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



        if (organisation == ""){
            alert('Please add a Qualification');
            return false;
        }if (positionHeld.length > 100){
            alert('Qualification must be less then 100 charecter');
            return false;

        }



        var startyear = $('#workstryear').val();
        var startmonth = parseInt(document.getElementById('workstrmonth').value)+1;
        var startdat = parseInt(document.getElementById('workstrdate').value)+1;
        var start = "startdate";

        //var stratdate = new Date(startyear + "-" + startmonth + "-" + startdat);



        //alert(dob);
        if(validatedate(startdat, startmonth , startyear,start)=="false"){
            return false;
        }





        var endyear = $('#workendyear').val();
        var endmonth = parseInt(document.getElementById('workendmonth').value)+1;
        var enddat = parseInt(document.getElementById('workenddate').value)+1;
        var end = "enddate";

        //var endatdate = new Date(endyear + "-" + endmonth + "-" + enddat);


        //alert(dob);
        if(validatedate1(enddat, endmonth , endyear,end)=="false"){
            return false;
        }


}



    function selectid(x) {
        btn = $(x).data('panel-id');


        $.ajax({
            type:'POST',
            url:'<?php echo base_url("ApplyOnline/EditPersonalExperience")?>',
            data:{'id': btn},
            cache: false,
            dataType: 'json',
            success:function(response) {

                var len = response.length;

                if(len > 0){
                    // Read values
                    var organisation = response[0].organization;
                    var positionHeld = response[0].positionHeld;
                    var startDate = response[0].startDate;
                    var endDate = response[0].endDate;
                    var experienceId = response[0].id;


                    var startDateArr = startDate.split('-');
                    var endDateArr = endDate.split('-');

                }



                document.getElementById("organisation").value= organisation;
                document.getElementById("positionHeld").value= positionHeld;
                document.getElementById("workstryear").value= startDateArr[0];
                document.getElementById("workstrmonth").value= parseInt(startDateArr[1])-1;
                document.getElementById("workstrdate").value= parseInt(startDateArr[2])-1;
                document.getElementById("workendyear").value= endDateArr[0];
                document.getElementById("workendmonth").value= parseInt(endDateArr[1])-1;
                document.getElementById("workenddate").value= parseInt(endDateArr[2])-1;
                document.getElementById("experience").value= experienceId;

                $('#update').html('update');

            }

        });
    }

    function selectidForDelete(x) {

        if (confirm("Are you sure you want to delete this Experience?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("ApplyOnline/DeletePersonalExperience")?>',
                data:{'id': btn},
                cache: false,

                success:function(data) {


                    location.reload();

                }

            });
        }else {
          //  $('#qualificationTable').load(document.URL +  ' #qualificationTable');
        }
    }

</script>

<script>
    function validatedate(dd , mm , yy,start)
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
                if (start == "startdate") {
                    alert(' Start Date in invalid date format!');
                    return "false";
                }
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
                if (start == "startdate") {
                    alert(' Start Date in invalid date format!');
                    return "false";
                }
            }
            if ((lyear==true) && (dd>29))
            {
                if (start == "startdate") {
                    alert(' Start Date in invalid date format!');
                    return "false";
                }
            }
        }
    }

    function validatedate1(dd , mm , yy,end)
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
                if (end == "enddate") {
                    alert(' End Date in invalid date format!');
                    return "false";
                }
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
                if (end == "enddate") {
                    alert(' End Date in invalid date format!');
                    return "false";
                }
            }
            if ((lyear==true) && (dd>29))
            {
                if (end == "enddate") {
                    alert(' End Date in invalid date format!');
                    return "false";
                }
            }
        }
    }
</script>

</html>
