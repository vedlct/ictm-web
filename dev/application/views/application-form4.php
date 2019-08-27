
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
            <div class="col-md-9">

<!--                    <fieldset>-->
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Finance</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 6 / 10</p>
                            </div>
                        </div>

                <form  action="<?php echo base_url()?>ApplyOnline/insertapplyNow4" method="post" class="form-horizontal" onsubmit="return formvalidate()">

                        <div class="form-bottom">



                            <div class="form-group">
<!--                                <label class="control-label col-md-2">Self Finance:</label>-->
                                <label class="control-label col-md-2">Source of Finance:</label>

                                <div class="col-md-10">
                                    <input tabindex="1" type="radio"  <?php if (!empty($financeYes) && $financeYes=='slc'){?> checked <?php }?> required name="selfFinance" value="slc"> SLC
                                    <input tabindex="2" type="radio" <?php if (!empty($financeYes) && $financeYes=='own'){?> checked <?php }?> required name="selfFinance" value="own"> OWN&nbsp;&nbsp;
                                    <input tabindex="3" type="radio"  <?php if (!empty($financeYes) && $financeYes=='sponsor'){?> checked <?php }?> required name="selfFinance" value="sponsor"> Sponsorship&nbsp;

                                </div>
                            </div>

                            <div style="display: none" id="otherFinance121">




                                <p>Name and address of person or organisation responsible for paying fees (if not yourself):</p>


                            <div class="form-group">
                                <label class="control-label col-md-2">Title:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                    <select tabindex="4" style="width: 100%"  id="title"  name="title">

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
                                    <input tabindex="5" type="text" class="form-control" id="name" name="name" maxlength="100"  value="<?php echo set_value('name'); ?>" >


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Relation:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('relation'); ?></font></p>
                                    <input tabindex="6" type="text" class="form-control" id="relation" name="relation" maxlength="50"  value="<?php echo set_value('relation'); ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('address'); ?></font></p>
                                    <textarea  name="address"  id="address" rows="8"  maxlength="1000" tabindex="7" ><?php echo set_value('address'); ?></textarea>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Post Code :<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('AddressPO'); ?></font></p>
                                        <input tabindex="8" type="text" class="form-control" id="AddressPO" maxlength="15" name="AddressPO" value="<?php echo set_value('AddressPO'); ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Country:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-10">
                                        <p><font color="red"> <?php echo form_error('country'); ?></font></p>
                                        <select tabindex="9" style="width: 100%" id="country"  name="country">
                                            <option value="" disabled selected>Select country...</option>
                                            <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                                <option value="<?php echo COUNTRY[$i]?>"<?php
                                                echo set_value('country') == COUNTRY[$i] ? "selected" : "";
                                                ?>><?php echo COUNTRY[$i]?></option>
                                            <?php } ?>
                                        </select>


                                    </div>
                                </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Mobile:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>
                                    <input tabindex="10" type="text" class="form-control" id="mobile" name="mobile" maxlength="50" value="<?php echo set_value('mobile'); ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Telephone:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>
                                    <input tabindex="11" type="text" class="form-control" id="telephone" name="telephone" maxlength="50" value="<?php echo set_value('telephone'); ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">E-mail:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>
                                    <input tabindex="12" type="email" class="form-control" id="email" name="email" maxlength="50" value="<?php echo set_value('email'); ?>" >
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
                                        <a href="<?php echo base_url()?>ApplyForm5" ><button type="button" class="btn btn-previous">Previous</button></a>
                                        <button type="submit" class="btn btn-next">Save Application</button>
                                        <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editORInsertApplicationForm4AndNext" class="btn btn-next">Save And Next</button>
<!--                                        <a href="--><?php //echo base_url()?><!--ApplyForm6" ><button type="button"  class="btn ">Next</button></a>-->
                                    </div>
                                </div>



                        </div>
<!--                    </fieldset>-->


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

<script>

    $(document).ready(function(){
        if ( $('input[name=selfFinance]:checked').val() == "slc" || $('input[name=selfFinance]:checked').val() == "own" ){
            $('#otherFinance121').hide();

        }
        else if ($('input[name=selfFinance]:checked').val() == 'sponsor'){
            $('#otherFinance121').show();
        }
    });


    $("input[name=selfFinance]").click( function () {

        if ($(this).val()=='own' || $(this).val()=='slc'){
            //document.getElementById("otherFinance").style.display = "none";
            $('#otherFinance121').hide();
        }else {
            //document.getElementById("otherFinance").style.display = "block";
            $('#otherFinance121').show();
        }

    });



    function formvalidate() {

        var finance=$('input[name=selfFinance]:checked').val();

        if ((finance != 'own' ) && (finance != "slc" )) {


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