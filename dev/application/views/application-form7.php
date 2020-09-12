
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

        <?php if ($this->session->flashdata('errorMessage')!=null){?>
            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
        <?php }
        elseif($this->session->flashdata('successMessage')!=null){?>
            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
        <?php }?>
        <div class="row">
            <div class="col-md-10">

                <form role="form" action="<?php echo base_url()?>ApplyOnline/insertapplyNow7" enctype="multipart/form-data" method="post" class="form-horizontal">

                    <!--                    <fieldset>-->
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Upload Documents</h3>
                        </div>

                        <div class="form-top-right">
                            <p>Step 9 / 10</p>
                        </div>
                    </div>
                    <div class="form-bottom">

                        <p style="font-weight:bold; text-decoration:underline">Entry Requirement Documents:</p>
                        <p>Submit a completed Application Form along with the following:</p>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <ul style="list-style-type:disc">
                                    <li>Passport size photo – 2</li>
                                    <li>Academic certificates and transcripts (a qualification that is equivalent to UK NVQ Level 3)</li>
                                    <li>Work reference letter in a letter headed paper (if your qualifications are lower than NVQ Level 3 e.g. GCSE / NVQ Level 2 or Equivalent qualifications) - Within last 3 months’ time</li>
                                    <li>Passport + Visa (if applicable)</li>
                                    <li>Proof of address (bank statement, council tax bill, utility bill, payslip, Full Driving licence) - Within last 3 months’ time</li>
                                    <li>Need to proof 5 Years Residency (If applicable) or if an EU Migrant worker (6 months’ UK payslips)</li>
                                    <li><b>Please note that all students whose first language is not English will be required to prove their proficiency in English Language to a minimum standard of CEFR Level B2 or equivalent.</b></li>
                                    <li><b>Completed application form along with copies of supporting documents will be retained by Icon College in the event of successful / unsuccessful admission.</b></li>
                                    <li><b>FILE UPLOAD TYPE  SHOULD BE IN DOC,IMAGE(JPG,PNG,JPEG),PDF,EXCEL FORMATE.</b></li>
                                    <li><b>MAXIMUM FILE SIZE SHOULD BE  4MB. MORE THAN 4MB FILE NOT ACCEPTABLE.</b></li>
                                </ul>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2">Upload file:</label>
                            <div class="col-md-8">
                                <input tabindex="1" type="file" class="form-control" id="file-upload" name="fileUpload[]" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2">Description:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control " name="description[]" id="photoDetails[]" ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-10 col-md-12">
                                <button type="submit" class="btn btn-next" onclick="return VerifyUploadSizeIsOK()">Add File</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-md-10">
                                <a href="<?php echo base_url()?>ApplyForm8" ><button type="button"  class="btn btn-previous"><span style="color: #FFFFFF;">Previous</span></button></a>
                                <button type="button"  onclick="getConfirmation()" class="btn btn-next"><span style="color: #FFFFFF;">Cancel</span></button>
                                <!--                                    <button type="submit" class="btn btn-next">Save Application</button>-->
                                <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editApplicationForm7Save" class="btn btn-next"><span style="color: #FFFFFF;">Save for later</span></button>
                                <!--                                    <button type="submit" formaction="--><?php //echo base_url()?><!--ApplyOnline/editApplicationForm7AndNext" class="btn btn-next">Next</button>-->

                                <?php
                                $applicationId = $this->session->userdata('studentApplicationId');
                                $dir =   "./AdminPanel/studentApplications/$applicationId/";

                                $fcount = 0;
                                $files = glob($dir . "*");
                                if ($files){
                                    $fcount = count($files);
                                }
                                ?>

                                <?php if($fcount >=1) { ?><a href="<?php echo base_url()?>ApplyForm9" ><button type="button"  class="btn btn-next">Next</button> <?php }?></a>
                            </div>
                        </div>
                        <div id="qualificationTable">
                            <table  class="table  table-bordered">
                                <tr>
<!--                                    <th>SL</th>-->
                                    <th>File Name</th>
                                    <th>Description</th>
                                    <th>Action</th>

                                </tr>
                                <?php foreach ($document as $document){?>
                                    <tr>

<!--                                        <td></td>-->
                                        <td><?php echo $document->filename?></td>
                                        <td><?php echo $document->description ?></td>
                                        <td>
                                            <a style="cursor: pointer" data-panel-id="<?php echo $document->id  ?>" onclick="selectidForDelete(this)"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
<!--                                --><?php
//                                $applicationId = $this->session->userdata('studentApplicationId');
//                                $dir =   "./AdminPanel/studentApplications/$applicationId/";
//
//                                // Open a directory, and read its contents
//                                if (is_dir($dir)) {
//                                    if ($dh = opendir($dir)) {
//
//                                        $count = 1;
//                                        while (($file = readdir($dh)) !== false) {
//                                            if ($file != "." && $file != "..") {  ?>
<!--                                                <tr>-->
<!--                                                    <td>--><?php //echo $count ?><!--</td>-->
<!--                                                    <td>-->
<!---->
<!--                                                        <a target="_blank" href="--><?php //echo $dir . "/" . $file ?><!--"> --><?php //echo $file  ?><!-- </a>-->
<!---->
<!--                                                    </td>-->
<!--                                                    <td></td>-->
<!---->
<!--                                                    <td>-->
<!--                                                        <a style="cursor: pointer" data-panel-id="--><?php //echo $file ?><!--" onclick="selectidForDelete(this)"><i class="fa fa-trash"></i></a>-->
<!--                                                    </td>-->
<!--                                                </tr>-->
<!--                                                --><?php //$count++;
//                                            }
//
//                                        }
//
//                                    }
//                                }?>



                            </table>
                        </div>



                    </div>

                    <!--                    </fieldset>-->

                </form>










            </div><!-- /col-md-10 -->

            <div class="col-md-2">
                <div class="sidebar">

                    <div class="widget widget-courses">
                        <h2 class="widget-title">COURSES LIST</h2>
                        <?php include("course-sidebar.php"); ?>
                    </div><!-- /widget-posts -->



                </div><!-- sidebar -->
            </div><!-- /col-md-2 -->
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


    function selectidForDelete(x) {

//        var fileName=$(x).data('panel-id');
        if (confirm('Are you sure to delete this file!')){
            btn = $(x).data('panel-id');
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("ApplyOnline/deleteStudentFile")?>',
                data: {'id': btn},
                cache: false,
                success: function (data) {

                    location.reload();

//                    if (data=='0'){
//
//                        alert('there is a problem with a file please contact us');
//
//                    }else if(data=='1'){
//
//                        $('#qualificationTable').load(document.URL +  ' #qualificationTable');
//                        location.reload();
//
//                    }



                }
            });

        }


    }
</script>
<script type="text/javascript">
    function VerifyUploadSizeIsOK()
    {
        /* Attached file size check. Will Bontrager Software LLC, https://www.willmaster.com */
        var UploadFieldID = "file-upload";
        var MaxSizeInBytes = 5097152;
        var fld = document.getElementById(UploadFieldID);
        if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
        {
            alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
            return false;
        }
        return true;
    } // function VerifyUploadSizeIsOK()
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