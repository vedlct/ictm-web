
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

<section class="flat-row padding-small-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <form role="form" action="<?php echo base_url()?>ApplyOnline/editapplyNow3" method="post" class="form-horizontal">




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
                                    <input tabindex="1" type="radio" id="firstLanguage" <?php if ($fLanguage=='1'){?>checked<?php } ?> name="firstLanguage" value="1"> Yes&nbsp;&nbsp;
                                    <input tabindex="2" type="radio" id="firstLanguage" <?php if ($fLanguage=='0'){?>checked<?php }?> name="firstLanguage" value="0"> No&nbsp;&nbsp;
                                </div>
                            </div>
                            <div style="display: none" id="Englishproficience" >
                            <p>If English is not your first language, please state your qualifications.</p>

                            <div class="form-group">
                                <label class="control-label col-md-3">Tests:</label>
                                <div class="col-md-9">
                                    <select tabindex="3" style="width: 100%" name="test" id="test" onchange="checkother()">
                                        <option value="" disabled selected>Select test...</option>
                                        <option value="1">IELTS</option>
                                        <option value="2">TOEFL</option>
                                        <option value="3">PTE</option>
                                        <option value="4">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="listendiv" style="display: block">
                                <label class="control-label col-md-3">Listening:</label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('listening'); ?></font></p>
                                    <input tabindex="4" type="text" class="form-control" id="listening" name="listening" >
                                    <input tabindex="5" type="hidden" id="listeningid" name="listeningid">
                                </div>
                            </div>

                            <div class="form-group" id="readingdiv" style="display: block">
                                <label class="control-label col-md-3">Reading:</label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('reading'); ?></font></p>
                                    <input tabindex="6" type="text" class="form-control" id="reading" name="reading" >
                                    <input tabindex="7" type="hidden" id="readingid" name="readingid">
                                </div>
                            </div>

                            <div class="form-group" id="writingdiv" style="display: block">
                                <label class="control-label col-md-3">Writing:</label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('writing'); ?></font></p>
                                    <input tabindex="8" type="text" class="form-control" id="writing" name="writing" >
                                    <input tabindex="9" type="hidden" id="writingid" name="writingid">
                                </div>
                            </div>

                            <div class="form-group" id="speakingdiv" style="display: block">
                                <label class="control-label col-md-3">Speaking:</label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('speaking'); ?></font></p>
                                    <input tabindex="10" type="text" class="form-control" id="speaking" name="speaking" >
                                    <input tabindex="11" type="hidden" id="speakingid" name="speakingid">
                                </div>
                            </div>

                            <div class="form-group" id="overralldiv" style="display: block">
                                <label class="control-label col-md-3">Overall:</label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('overall'); ?></font></p>
                                    <input tabindex="12" type="text" class="form-control" id="overall" name="overall" >
                                </div>
                            </div>

                            <div class="form-group" id="expirediv" style="display: block">
                                <label class="control-label col-md-3">Expiry Date:</label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('expirydate'); ?></font></p>
                                    <input tabindex="13" type="text" class="form-control datetimepicker" id="expirydate" name="expirydate" >
                                </div>
                            </div>
                            <input tabindex="14" type="hidden" value="" name="languagetestid" id="languagetestid">

<!--                            <div class="form-group">-->
<!--                                <div class="col-sm-offset-2 col-md-9">-->
<!--                                    <button type="button" class="btn btn-previous">Add New</button>-->
<!--                                </div>-->
<!--                            </div>-->


                            <div class="form-group" id="otherdiv" style="display: none">
                                <label class="control-label col-md-3">Other (Please Specify):</label>
                                <div class="col-md-9">
                                    <textarea id="other" name="other" rows="8" tabindex="15"></textarea>
                                    <input tabindex="16" type="hidden" class="form-control" id="otherTab" name="otherTab"value="1">
                                </div>
                            </div>
                            </div>

                            <div class="form-group" align="right">
                                <div class="col-sm-offset-2 col-md-offset-3 col-md-9">

                                    <button type="submit" class="btn btn-next"><span id="update" style="color: #FFFFFF;">Add proficiency</span></button>


                                </div>
                            </div>



                </form>


                <div id="qualificationTable">
                    <table  class="table  table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Test Name</th>
							<th>Overall</th>

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
                                        case "4":
                                            echo "OTHER";
                                            break;
                                        default:
                                            echo "None";
                                    }
                                    ?>
                                </td>
								<td><?php echo $lt->overallScore ?></td>

                                <td>
                                    <a style="cursor: pointer" data-panel-id="<?php echo $lt->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                    <a style="cursor: pointer" data-panel-id="<?php echo $lt->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $count++ ;} ?>
                    </table>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-md-9">

                        <a href="<?php echo base_url()?>Apply-Work-Experience" ><button type="button"  class="btn btn-previous"><span style="color: #FFFFFF;">Previous</span></button></a>
                        <button type="reset" class="btn btn-next"><span style="color: #FFFFFF;">Reset</span></button>
                        <button type="submit" formaction="<?php echo base_url()?>AllFormForStudents" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                        <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editORInsertApplicationForm3AndNext" class="btn btn-next"><span style="color: #FFFFFF;">Save For Later</span></button>

                        <a href="<?php echo base_url()?>ApplyForm5" ><button type="button"  class="btn btn-next"><span style="color: #FFFFFF;">Next</span></button></a>


                    </div>
                </div>
            </div>




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

    $("input[name=firstLanguage]").click( function () {

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


            document.getElementById('otherdiv').style.display = 'none';

        }
    }


    function selectid(x) {
        btn = $(x).data('panel-id');
       // alert(btn);

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("ApplyOnline/EditLanguageTest")?>',
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

                if(test == "4"){
                    document.getElementById('listendiv').style.display = 'none';
                    document.getElementById('readingdiv').style.display = 'none';
                    document.getElementById('writingdiv').style.display = 'none';
                    document.getElementById('speakingdiv').style.display = 'none';
                    document.getElementById('overralldiv').style.display = 'none';
                    document.getElementById('expirediv').style.display = 'none';


                    document.getElementById('otherdiv').style.display = 'block';

                    document.getElementById("test").value = test;
                    document.getElementById("other").value = other;
                    document.getElementById("languagetestid").value = btn;

                }else {

                    document.getElementById("test").value = test;
                    document.getElementById("overall").value = overallScore;
                    document.getElementById("expirydate").value = expireDate;
                    document.getElementById("other").value = other;
                    document.getElementById("languagetestid").value = btn;

                }
            }

        });


        $.ajax({
            type:'POST',
            url:'<?php echo base_url("ApplyOnline/EditLanguageTestHead")?>',
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

                $('#update').html("update");
            }

        });
    }

    function selectidForDelete(x) {

        if (confirm("Are you sure you want to delete this Language Proficiency?")) {
            btn = $(x).data('panel-id');
            $.ajax({
                type:'POST',
                url:'<?php echo base_url("ApplyOnline/DeleteLanguageProficiency")?>',
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
