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

                <!--                <form role="form" action="--><?php //echo base_url()?><!--OnlineForms/applyNow2" method="post" class="registration-form form-horizontal">-->



                <!--                    <fieldset>-->
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Qualifications</h3>
                    </div>

                    <div class="form-top-right">
                        <p>Step 2 / 10</p>
                    </div>
                </div>




                <form action="<?php echo base_url()?>ApplyOnline/editORInsertApplicationForm2" method="post" onsubmit="return checkForm()" class="registration-form form-horizontal">
                    <div class="form-bottom">
                        <div id='TextBoxesGroup'>
                            <div id="TextBoxDiv1" >
                                <input tabindex="" type="hidden" class="form-control" id="qualificationId"  name="qualificationId">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Qualification Name<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input tabindex="2" type="text" class="form-control" id="qualification" maxlength="100" required name="qualification">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Qualification Level<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input tabindex="2" type="text" class="form-control" id="qualificationLevel" maxlength="100" required name="qualificationLevel">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Name of Institution<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input tabindex="2" type="text" class="form-control" id="institution" maxlength="100" required name="institution">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Awarding Body<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input tabindex="2" type="text" class="form-control" id="awardingBody" maxlength="255" required name="awardingBody">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2">Subject<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input tabindex="2" type="text" class="form-control" id="subject" maxlength="255" required name="subject">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-2">Completion Year<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
<!--                                        <input type="text" class="form-control datetimepicker" id="completionYear" maxlength="100" required name="completionYear">-->

                                        <?php
                                        $currently_selected = date('Y');
                                        $earliest_year = 1950;
                                        $latest_year = date('Y');
                                        print '<select tabindex="2" id="completionYear" name="completionYear">';
                                        foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                            print '<option value="'.$i.'"'.($i == $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                                        }
                                        print '</select>';
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Grade<span style="color: red">*</span>:</label>
                                    <div class="col-md-10">
                                        <input tabindex="2" type="text" class="form-control" id="grade" maxlength="20" required name="grade">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div style="margin: 4px" class="form-group form-bottom">
                            <div class="col-sm-offset-2 col-md-10">
                                <!--                                                                <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                <a href="<?php echo base_url()?>Apply" ><button type="button"  class="btn btn-previous">Previous</button></a>
                                <button type="submit" class="btn btn-next">Save Application</button>
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editORInsertApplicationForm2AndNext" class="btn btn-next">Save And Next</button>
                                <a href="<?php echo base_url()?>Apply-Work-Experience" ><button type="button"  class="btn btn-next">Next</button></a>
                            </div>
                        </div>
                        <!--                    </fieldset>-->

                    <div id="qualificationTable" class=" table-responsive">
                        <table  class="table  table-bordered table-responsive">
                            <tr>

                                <th>Qualification</th>
                                <th>Level</th>
                                <th>Institution</th>
                                <th>Awarding Body</th>
                                <th>Subject</th>
                                <th>Complettion Year</th>
                                <th>Grade</th>
                                <th>Action</th>

                            </tr>
                            <?php foreach ($qualification as $qualifications){?>
                                <tr>

                                    <td><?php echo $qualifications->qualification ?></td>
                                    <td><?php echo $qualifications->qualificationLevel?></td>
                                    <td><?php echo $qualifications->institution ?></td>
                                    <td><?php echo $qualifications->awardingBody ?></td>
                                    <td><?php echo $qualifications->subject ?></td>
                                    <td><?php echo $qualifications->completionYear ?></td>
                                    <td><?php echo $qualifications->obtainResult ?></td>
                                    <td>
                                        <a style="cursor: pointer" data-panel-id="<?php echo $qualifications->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                        <a style="cursor: pointer" data-panel-id="<?php echo $qualifications->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
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

<script>

    function moreQualification() {
        document.getElementById('moreQualification').style.display = 'none';
        document.getElementById('qualification').style.display = 'block';
    }
    function selectid(x) {
        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("ApplyOnline/EditPersonalQualification")?>',
            data:{'id': btn},
            cache: false,
            dataType: 'json',
            success:function(response) {
                var len = response.length;

                if(len > 0){
                    // Read values
                    var qualification = response[0].qualification;
                    var institution = response[0].institution;
//                    var startDate = response[0].startDate;
//                    var endDate = response[0].endDate;
                    var qualificationId = response[0].id;
                    var grade = response[0].obtainResult;

                    var qualificationLevel = response[0].qualificationLevel;
                    var awardingBody = response[0].awardingBody;
                    var subject = response[0].subject;
                    var completionYear = response[0].completionYear;
                }


                document.getElementById("qualification").value= qualification;
                document.getElementById("institution").value= institution;
//                document.getElementById("startdate").value= startDate;
//                document.getElementById("enddate").value= endDate;
                document.getElementById("grade").value= grade;
                document.getElementById("qualificationId").value= qualificationId;

                document.getElementById("qualificationLevel").value= qualificationLevel;
                document.getElementById("awardingBody").value= awardingBody;
                document.getElementById("subject").value= subject;
                document.getElementById("completionYear").value= completionYear;

            }

        });
    }
    function selectidForDelete(x) {

        if (confirm("Are you sure you want to delete this Qualification?")) {
        btn = $(x).data('panel-id');
        $.ajax({
            type:'POST',
            url:'<?php echo base_url("ApplyOnline/DeletePersonalQualification")?>',
            data:{'id': btn},
            cache: false,

            success:function(data) {


                location.reload();

            }

        });
    }else {
            $('#qualificationTable').load(document.URL +  ' #qualificationTable');
        }
    }
    function checkForm() {

//        var Qualification=$('#qualification').val();
//        var institution=$('#institution').val();
////        var startdate=$('#startdate').val();
////        var enddate=$('#enddate').val();
//        var grade=$('#grade').val();
//
//        var qualificationLevel=$('#qualificationLevel').val();
//        var awardingBody=$('#awardingBody').val();
//        var subject=$('#subject').val();
//        var completionYear=$('#completionYear').val();
//
//        if (Qualification == ""){
//            alert('Please add a Qualification');
//            return false;
//        }if (Qualification.length > 100){
//            alert('Qualification must be less then 100 charecter');
//            return false;
//        }if (institution == ""){
//            alert('Please add a institution');
//            return false;
//        }if (institution.length > 100){
//            alert('Institution must be less then 100 charecter');
//            return false;
//        }
////        if (startdate == ""){
////            alert('Please add a startdate');
////            return false;
////        }if (enddate == ""){
////            alert('Please add a enddate');
////            return false;
////        }
//        if (qualificationLevel == ""){
//            alert('Please add a qualificationLevel');
//            return false;
//        }if (awardingBody == ""){
//            alert('Please add a awardingBody');
//            return false;
//        }if (subject == ""){
//            alert('Please add a subject');
//            return false;
//        }if (completionYear == ""){
//            alert('Please add a completionYear');
//            return false;
//        }if (grade == ""){
//            alert('Please add a grade');
//            return false;
//        }
//        if (grade.length > 20){
//            alert('grade must be less then 20 charecter');
//            return false;
//        }
//        if (enddate < startdate){
//            alert('Please Select StartDate and EndDate Correctly');
//            return false;
//        }
    }
    function btnNext() {

        location.href='ApplyForm3';


    }
</script>

</div>
</body>

</html>