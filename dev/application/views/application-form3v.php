
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

                <form role="form" action="<?php echo base_url()?>ApplyOnline/editapplyNow3" method="post" class="registration-form form-horizontal">




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
                                    <input type="radio" name="" value=""> Yes&nbsp;&nbsp;
                                    <input type="radio" name="" value=""> No&nbsp;&nbsp;
                                </div>
                            </div>

                            <p>If English is not your first language, please state your qualifications.</p>

                            <div class="form-group">
                                <label class="control-label col-md-2">Tests:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" name="test" id="test">
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
                                    <input type="text" class="form-control" id="listening" name="listening">
                                    <input type="hidden" id="listeningid" name="listeningid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Reading:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="reading" name="reading">
                                    <input type="hidden" id="readingid" name="readingid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Writing:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="writing" name="writing">
                                    <input type="hidden" id="writingid" name="writingid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Speaking:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="speaking" name="speaking">
                                    <input type="hidden" id="speakingid" name="speakingid">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Overall:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="overall" name="overall">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Expiry Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="expirydate" name="expirydate">
                                </div>
                            </div>
                            <input type="hidden" value="" name="languagetestid" id="languagetestid">

<!--                            <div class="form-group">-->
<!--                                <div class="col-sm-offset-2 col-md-10">-->
<!--                                    <button type="button" class="btn btn-previous">Add New</button>-->
<!--                                </div>-->
<!--                            </div>-->


<!--                            <div class="form-group">-->
<!--                                <label class="control-label col-md-2">Other (Please Specify):</label>-->
<!--                                <div class="col-md-10">-->
<!--                                    <textarea id="comment-message" name="comment" rows="8" tabindex="4"></textarea>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn ">Next</button>
                                    <button type="submit" class="btn btn-next">Save Application</button>
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
                                    <a style="cursor: pointer" data-panel-id="<?php echo $lt->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash"></i></a>
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

<script>
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

                }

                document.getElementById("test").value= test;
                document.getElementById("overall").value= overallScore;
                document.getElementById("expirydate").value= expireDate;
                document.getElementById("languagetestid").value= btn;


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


            }

        });
    }
</script>