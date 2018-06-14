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
                        <td style="border: none;"><h2 style="font-size: 24px; border: none;"> <span style="color: #E3352E">ICON</span> COLLEGE OF TECHNOLOGY OF MANAGEMENT</h2></td>
                    </tr>
                </table>
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
            <div class="col-md-9">

<!--                    <fieldset>-->
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Finance</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 5 / 10</p>
                            </div>
                        </div>

                <form role="form" action="<?php echo base_url()?>Admin/StudentApplication/insertapplyNow4" method="post" class="form-horizontal" onsubmit="return formvalidate()">

                        <div class="form-bottom">



                            <div class="form-group">
<!--                                <label class="control-label col-md-2">Self Finance:</label>-->
                                <label class="control-label col-md-2">Source of Finance:</label>

                                <div class="col-md-10">
                                    <input type="radio"  <?php if (!empty($financeYes) && $financeYes=='slc'){?> checked <?php }?> required name="selfFinance" value="slc"> SLC
                                    <input type="radio" <?php if (!empty($financeYes) && $financeYes=='own'){?> checked <?php }?> required name="selfFinance" value="own"> Yes&nbsp;&nbsp;
                                    <input type="radio"  <?php if (!empty($financeYes) && $financeYes=='sponsor'){?> checked <?php }?> required name="selfFinance" value="sponsor"> Sponsor&nbsp;

                                </div>
                            </div>

                            <div style="display: none" id="otherFinance">




                                <p>Name and address of person or organisation responsible for paying fees (if not yourself):</p>


                            <div class="form-group">
                                <label class="control-label col-md-2">Title:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                    <select style="width: 100%"  id="title"  name="title">

                                        <option value="" selected><?php echo SELECT_TITLE?></option>
                                        <?php for ($i=0;$i<count(Title);$i++){?>
                                            <option <?php echo set_select('title',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                        <?php  } ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('name'); ?></font></p>
                                    <input type="text" class="form-control" id="name" name="name" maxlength="100"  value="<?php echo set_value('name'); ?>" >


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Relation:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('relation'); ?></font></p>
                                    <input type="text" class="form-control" id="relation" name="relation" maxlength="50"  value="<?php echo set_value('relation'); ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                                    <textarea  name="address"  id="address" rows="8"  maxlength="1000" tabindex="4" ><?php echo set_value('address'); ?></textarea>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Address P.O :<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('AddressPO'); ?></font></p>
                                        <input type="text" class="form-control" id="AddressPO" maxlength="15" name="AddressPO" value="<?php echo set_value('AddressPO'); ?>">
                                    </div>
                                </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mobile:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>
                                    <input type="text" class="form-control" id="mobile" name="mobile" maxlength="50" value="<?php echo set_value('mobile'); ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>
                                    <input type="text" class="form-control" id="telephone" name="telephone" maxlength="50" value="<?php echo set_value('telephone'); ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                    <input type="email" class="form-control" id="email" name="email" maxlength="50" value="<?php echo set_value('email'); ?>" >
                                </div>
                            </div>

<!--                            <div class="form-group">-->
<!--                                <label class="control-label col-md-2">Fax*:</label>-->
<!--                                <div class="col-md-10">-->
<!--                                    <p><font color="red"> --><?php //echo form_error('fax'); ?><!--</font></p>-->
<!--                                    <input type="text" class="form-control" id="fax" name="fax"  value="--><?php //echo set_value('fax'); ?><!--" >-->
<!--                                </div>-->
<!--                            </div>-->


                            </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-md-10">
                                        <a href="<?php echo base_url()?>ApplyForm3" ><button type="button" class="btn btn-previous">Previous</button></a>
                                        <button type="submit" class="btn btn-next">Save Application</button>
                                        <button type="submit" formaction="<?php echo base_url()?>Admin/StudentApplication/editORInsertApplicationForm4AndNext" class="btn btn-next">Save And Next</button>
                                        <a href="<?php echo base_url()?>Admin/StudentApplication/editStudentApplicationPersonalStatement" ><button type="button"  class="btn ">Next</button></a>
                                    </div>
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
<!---->
<?php //include("footer.php"); ?>
<!--<!-- for Application form -->-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/jquery.backstretch.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--public/javascript/scripts.js"></script>-->

</div>
</body>





</html>

<script>
    


    $("input[name=selfFinance]").click( function () {

        if ($(this).val()=='own'){
            document.getElementById("otherFinance").style.display = "none";
        }else {
            document.getElementById("otherFinance").style.display = "block";
        }

    });



    function formvalidate() {

        var finance=$('input[name=selfFinance]:checked').val();
        if (finance != 'own') {


            var title = document.getElementById("title").value;
            var email = document.getElementById("email").value;
            var name = document.getElementById("name").value;
            var AddressPO = document.getElementById("AddressPO").value;
            var relation = document.getElementById("relation").value;
            var address = document.getElementById("address").value;
            var phone = document.getElementById("mobile").value;
            var telephone = document.getElementById("telephone").value;
            var chk = /^[0-9]*$/;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (title == "") {
                alert("Please select a Title");
                return false;
            }
            if (name == "") {
                alert("Name  Can not Empty");
                return false;
            }
            if (relation == "") {
                alert(" Relation  Can not Empty");
                return false;
            }
            if (address == "") {
                alert("Address  can not  empty");
                return false;
            }

            if (AddressPO == "") {
                alert("Address PO  Can not Empty");
                return false;
            }
            if (AddressPO.length >15) {
                alert("Address PO  must be less than 15 charecter");
                return false;
            }


            if (!phone.match(chk)) {
                alert('Please enter a valid Mobile Phone number!!');
                return false;
            }
            if (phone.length > 50) {
                alert('Mobile Phone number must be less than 50 charecter!!');
                return false;
            }

            if (email == "") {
                alert("email can not empty");
                return false;
            }
            if (!email.match(mailformat)) {
                alert("You have entered an invalid email address!");
                return false;
            }

            if (telephone == "") {
                alert("Give the telephone number ");
                return false;
            }
            else {
                return true;
            }
        }else {
            return true;
        }
    }
</script>