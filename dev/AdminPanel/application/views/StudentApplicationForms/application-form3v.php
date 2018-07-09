
<?php $this->load->view('Admin/head.php'); ?>
<!-- for Application Form -->
<link rel="stylesheet" href="<?php echo base_url()?>public/css/application-form-style.css">
<!-- dateTimepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

<style>

    .datepicker .next ,.prev {
        position: relative !important;
    }
</style>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table border="0" style="width:100%; margin-top: 30px; border: none;">
                    <tr>
                        <td style="border: none;"><img style="height: 80px; border: none;" src="<?php echo base_url()?>public/img/logoform.jpg" alt=""></td>
                        <td style="border: none;"><h2 style="  border: medium none;font-size: 33px;margin-bottom: 22px;margin-left: 37px;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
                    </tr>
                </table>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/updateEnglishLagugeProficiency" method="post" class=" form-horizontal">




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
                                <label class="control-label col-md-2">Is English your first language?:</label>
                                <div class="col-md-10">
                                    <input type="radio" <?php if ($fLanguage=='1'){?>checked<?php } ?> name="firstLanguage" value="1"> Yes&nbsp;&nbsp;
                                    <input type="radio" <?php if ($fLanguage=='0'){?>checked<?php }?> name="firstLanguage" value="0"> No&nbsp;&nbsp;
                                </div>
                            </div>

                            <div id="Englishproficience">

                            <p>If English is not your first language, please state your qualifications.</p>

                            <div class="form-group">
                                <label class="control-label col-md-2">Tests:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%; height: 32px; border: 1px solid #bababa;" name="test" id="test">
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
                                    <p><font color="red"> <?php echo form_error('listening'); ?></font></p>
                                    <input type="text" class="form-control" id="listening" name="listening">
                                    <input type="hidden" id="listeningid" name="listeningid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Reading:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('reading'); ?></font></p>
                                    <input type="text" class="form-control" id="reading" name="reading">
                                    <input type="hidden" id="readingid" name="readingid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Writing:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('writing'); ?></font></p>
                                    <input type="text" class="form-control" id="writing" name="writing">
                                    <input type="hidden" id="writingid" name="writingid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Speaking:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('speaking'); ?></font></p>
                                    <input type="text" class="form-control" id="speaking" name="speaking">
                                    <input type="hidden" id="speakingid" name="speakingid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Overall:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('overall'); ?></font></p>
                                    <input type="text" class="form-control" id="overall" name="overall">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Expiry Date:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('expirydate'); ?></font></p>
                                    <input type="text" class="form-control datetimepicker" id="expirydate" name="expirydate">
                                </div>
                            </div>
                            <input type="hidden" value="" name="languagetestid" id="languagetestid">

<!--                            <div class="form-group">-->
<!--                                <div class="col-sm-offset-2 col-md-10">-->
<!--                                    <button type="button" class="btn btn-previous">Add New</button>-->
<!--                                </div>-->
<!--                            </div>-->


                            <div class="form-group">
                                <label class="control-label col-md-2">Other (Please Specify):</label>
                                <div class="col-md-10">
                                    <textarea style="border: 1px solid #bababa; width: 100%;" id="other" name="other" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">

                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationWorkExperience" ><button style="margin-top:20px; color: #fff; background-color: #841A29;" type="button"  class="btn btn-previous">Previous</button></a>

                                    <button style="margin-top:20px; color: #fff; background-color: #841A29;" type="submit" class="btn btn-next">Save Application</button>
                                    <button style="margin-top:20px; color: #fff; background-color: #841A29;" type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editORInsertApplicationForm3AndNext" class="btn btn-next">Save And Next</button>
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationFinance" ><button style="margin-top:20px; color: #fff; background-color: #841A29;" type="button"  class="btn btn-next">Next</button></a>


                                </div>
                            </div>


                </form>

                <div id="qualificationTable">
                    <table  class="table  table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Test Name</th>
                            <th>Overall Score</th>
                            <th>expireDate</th>
                            <th>Action</th>

                        </tr>
                        <?php $count = 1;foreach ($languagetest as $lt){?>
                            <tr>
                                <td><?php echo $count ?></td>
                                <td>
                                    <?php
                                    switch ($lt->fkTestId) {
                                        case "1":
                                            echo "IELTS";
                                            break;
                                        case "2":
                                            echo "TOFEL";
                                            break;
                                        case "3":
                                            echo "PTE";
                                            break;
                                        default:
                                            echo "Your favorite color is neither red, blue, nor green!";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $lt->overallScore ?></td>

                                <td><?php echo $lt->expireDate ?></td>
                                <td>
                                    <a style="cursor: pointer" data-panel-id="<?php echo $lt->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                    <a style="cursor: pointer" data-panel-id="<?php echo $lt->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php $count++ ;} ?>
                    </table>
                </div>

            </div>




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

<!-- datePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

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

    $("input[name=firstLanguage]").click( function () {

        if ($(this).val()=='1'){
            document.getElementById("Englishproficience").style.display = "none";
        }else {
            document.getElementById("Englishproficience").style.display = "block";
        }
    });
    $(document).ready(function(){
        if ('<?php echo $fLanguage?>'== '1'){
            document.getElementById("Englishproficience").style.display = "none";
        }else {
            document.getElementById("Englishproficience").style.display = "block";
        }
    });

</script>

<script>
    function selectid(x) {
        btn = $(x).data('panel-id');
       // alert(btn);

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/StudentApplication/EditLanguageTest")?>',
            data:{'id': btn},
            cache: false,
            dataType: 'json',
            success:function(response) {


                var len = response.length;

                if(len > 0){
                    // Read values
                    var test = response[0].fkTestId;
                    var overallScore = response[0].overallScore;
                    var expireDate = response[0].expireDate;
                    var other = response[0].other;

                }

                document.getElementById("test").value= test;
                document.getElementById("overall").value= overallScore;
                document.getElementById("expirydate").value= expireDate;
                document.getElementById("other").value= other;
                document.getElementById("languagetestid").value= btn;


            }

        });


        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/StudentApplication/EditLanguageTestHead")?>',
            data:{'id': btn},
            cache: false,
            dataType: 'json',
            success:function(response) {


                var len = response.length;

                if(len > 0){
                    // Read values
                    var listeningid = response[0].fkTestHeadId;
                    var readingid = response[1].fkTestHeadId;
                    var writingid = response[2].fkTestHeadId;
                    var speakingid = response[3].fkTestHeadId;

                    var listeningscore = response[0].score;
                    var readingscore = response[1].score;
                    var writingscore = response[2].score;
                    var speakingscore = response[3].score;

                }

                document.getElementById("listening").value= listeningscore;
                document.getElementById("reading").value= readingscore;
                document.getElementById("writing").value= writingscore;
                document.getElementById("speaking").value= speakingscore;

                document.getElementById("listeningid").value= listeningid;
                document.getElementById("readingid").value= readingid;
                document.getElementById("writingid").value= writingid;
                document.getElementById("speakingid").value= speakingid;


            }

        });
    }

    function selectidForDelete(x) {

        if (confirm("Are you sure you want to delete this Language Proficiency?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("Admin/StudentApplication/DeleteLanguageProficiency")?>',
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
</script>