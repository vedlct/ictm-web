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
        <div class="row">
            <div class="col-md-9">

                <!--                <form role="form" action="--><?php //echo base_url()?><!--OnlineForms/applyNow2" method="post" class="registration-form form-horizontal">-->



                <!--                    <fieldset>-->
                <div class="form-top">
                    <div class="form-top-left">
                        <h3>Qualifications</h3>
                    </div>

                    <div class="form-top-right">
                        <p>Step 2 / 9</p>
                    </div>
                </div>




                <form action="<?php echo base_url()?>ApplyOnline/editApplicationForm" method="post" class="registration-form form-horizontal">
                    <div class="form-bottom">
                        <div id='TextBoxesGroup'>
                            <div id="TextBoxDiv1" >
                                <input type="hidden" class="form-control" id="qualificationId"  name="qualificationId">
                                <div class="form-group">
                                    <label class="control-label col-md-2">Qualification:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="qualification" name="qualification">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Institution:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="institution" name="institution">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Start Date:</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="startdate" name="startdate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">End Date:</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" id="enddate" name="enddate">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Grade:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="grade" name="grade">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div style="margin: 4px" class="form-group form-bottom">
                            <div class="col-sm-offset-2 col-md-10">
                                <!--                                                                <button type="button" class="btn btn-previous">Add New Work Experience</button><br><br>-->

                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn">Next</button>
                                <button type="submit" class="btn btn-next">Save Application</button>
                            </div>
                        </div>
                        <!--                    </fieldset>-->


                        <table class="table  table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Qualification</th>
                                <th>Institution</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Grade</th>
                                <th>Action</th>

                            </tr>
                            <?php foreach ($qualification as $qualifications){?>
                                <tr>
                                    <td><?php echo $qualifications->id ?></td>
                                    <td><?php echo $qualifications->qualification ?></td>
                                    <td><?php echo $qualifications->institution ?></td>
                                    <td><?php echo $qualifications->startDate ?></td>
                                    <td><?php echo $qualifications->endDate ?></td>
                                    <td><?php echo $qualifications->obtainResult ?></td>
                                    <td>
                                        <a style="cursor: pointer" data-panel-id="<?php echo $qualifications->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                        <a class="btn" ><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>

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
                    var startDate = response[0].startDate;
                    var endDate = response[0].endDate;
                    var qualificationId = response[0].id;
                    var grade = response[0].obtainResult;
                }


                document.getElementById("qualification").value= qualification;
                document.getElementById("institution").value= institution;
                document.getElementById("startdate").value= startDate;
                document.getElementById("enddate").value= endDate;
                document.getElementById("grade").value= grade;
                document.getElementById("qualificationId").value= qualificationId;

            }

        });
    }
</script>

</div>
</body>

</html>