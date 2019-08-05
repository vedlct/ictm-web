
<?php $this->load->view('Admin/head.php'); ?>
<!-- for Application Form -->
<link rel="stylesheet" href="<?php echo base_url()?>public/css/application-form-style.css">

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
            <div class="col-md-12">

                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/editORInsertApplicationForm8" method="post" class="form-horizontal">

<!--                    <fieldset>-->
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Referees</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 9 / 10</p>
                            </div>
                        </div>

                        <div class="form-bottom">
                            <input type="hidden" class="form-control" id="refereesId"  name="refereesId">
                            <div class="form-group">
                                <label class="control-label col-md-2">Title:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%; height: 32px; border: 1px solid #bababa;"  required style="width: 100%"  id="title"  name="title">

                                        <option value="" selected><?php echo SELECT_TITLE?></option>
                                        <?php for ($i=0;$i<count(Title);$i++){?>
                                            <option <?php echo set_select('title',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                        <?php  } ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('name'); ?></font></p>
                                    <input required type="text" maxlength="100" class="form-control" id="name" name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Institution/Company*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('company'); ?></font></p>
                                    <input required type="text" maxlength="80" class="form-control" id="company" name="company">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Position / Job Title*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('jobTitle'); ?></font></p>
                                    <input required type="text" maxlength="60" class="form-control" id="jobTitle" name="jobTitle">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone/Mobile*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>
                                    <input required type="text" class="form-control" maxlength="20" id="telephone" name="telephone">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                    <input required type="email" class="form-control" maxlength="100" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Address*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                                    <textarea style="border: 1px solid #bababa; width: 100%;" required id="address" name="address" rows="8" maxlength="1000" tabindex="4"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Post Code*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('addressPo'); ?></font></p>
                                    <input required type="text" class="form-control" maxlength="8" id="addressPo" name="addressPo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Country*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('country'); ?></font></p>
                                    <select style="width: 100%; height: 32px; border: 1px solid #bababa;" 

                                            required style="width: 100%" id="country"  name="country">
                                        <option value="" disabled selected>Select country...</option>
                                        <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                            <option value="<?php echo COUNTRY[$i]?>"<?php
                                            echo set_value('country') == COUNTRY[$i] ? "selected" : "";
                                            ?>><?php echo COUNTRY[$i]?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationDocumentUpload" ><button style="color: #fff; background-color: #841A29;" type="button"  class="btn ">Previous</button></a>
                                    <button style="color: #fff; background-color: #841A29;" type="submit" class="btn btn-next">Save Application</button>
<!--                                    <button type="submit" formaction="--><?php //echo base_url()?><!--Admin/StudentApplication/editApplicationForm8AndNext" class="btn btn-next">Save And Next</button>-->
<!--                                    <a href="--><?php //echo base_url()?><!--Admin/StudentApplication/editStudentApplicationSubmitApplication" ><button type="button"  class="btn ">Next</button></a>-->
                                </div>
                            </div>


                            <div id="refereesTable">
                                <table  class="table  table-bordered">
                                    <tr>
<!--                                        <th>Id</th>-->
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Job Title</th>
                                        <th>Address</th>
                                        <th>Phone No.</th>
                                        <th>Email</th>
                                        <th>Action</th>

                                    </tr>
                                    <?php foreach ($References as $Reference){?>
                                        <tr>
<!--                                            <td>--><?php //echo $Reference->id ?><!--</td>-->
                                            <td><?php echo $Reference->title ?> <?php echo $Reference->name ?></td>
                                            <td><?php echo $Reference->workingCompany ?></td>
                                            <td><?php echo $Reference->jobTitle ?></td>
                                            <td><?php echo $Reference->address ?><br><b>P.O:</b><?php echo $Reference->postCode?> , <b>Country :</b><?php echo $Reference->fkCountry?></td>
                                            <td><?php echo $Reference->contactNo ?></td>
                                            <td><?php echo $Reference->email ?></td>
                                            <td>
                                                <a style="cursor: pointer" data-panel-id="<?php echo $Reference->id ?>"  onclick="selectid(this)"><i class="fa fa-edit"></i></a>
                                                <a style="cursor: pointer" data-panel-id="<?php echo $Reference->id ?>"  onclick="selectidForDelete(this)"   ><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                        </div>
<!--                    </fieldset>-->

                </form>




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

<script>

    function selectid(x) {
        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/StudentApplication/EditPersonalReferees")?>',
            data:{'id': btn},
            cache: false,
            dataType: 'json',
            success:function(response) {
                var len = response.length;

                if(len > 0){
                    // Read values
                    var id = response[0].id;
                    var name = response[0].name;
                    var title = response[0].title;
                    var workingCompany = response[0].workingCompany;
                    var jobTitle = response[0].jobTitle;
                    var address = response[0].address;
                    var postCode = response[0].postCode;
                    var fkCountry = response[0].fkCountry;
                    var contactNo = response[0].contactNo;
                    var email = response[0].email;
                }


                document.getElementById("refereesId").value= id;
                document.getElementById("title").value= title;
                document.getElementById("name").value= name;
                document.getElementById("company").value= workingCompany;
                document.getElementById("jobTitle").value= jobTitle;
                document.getElementById("telephone").value= contactNo;
                document.getElementById("email").value= email;
                document.getElementById("address").value= address;
                document.getElementById("addressPo").value= postCode;
                document.getElementById("country").value= fkCountry;

            }

        });
    }
    function selectidForDelete(x) {

        if (confirm('Are You sure You want to delete this reference?'))
        btn = $(x).data('panel-id');

        $.ajax({
            type:'POST',
            url:'<?php echo base_url("Admin/StudentApplication/deletePersonalReferees")?>',
            data:{'id': btn},
            cache: false,
            success:function(data) {

                location.reload();

            }

        });
    }

</script>