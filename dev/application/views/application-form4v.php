
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




                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Finance </h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 6 / 10</p>
                            </div>
                        </div>
                <?php foreach ($Financer as $f4) { ?>

                    <form role="form" action="<?php echo base_url()?>ApplyOnline/updateInfoApply4" method="post" class="form-horizontal" onsubmit="return formvalidate()">

                    <div class="form-bottom">

                                <div class="form-group">
                                    <label class="control-label col-md-3">Self Finance:</label>
                                    <div class="col-md-9">
                                        <input tabindex="1" type="radio"  <?php if (!empty($financeYes) && $financeYes=='slc'){?> checked <?php }?> required name="selfFinance" value="slc"> SLC &nbsp;&nbsp;
                                        <input tabindex="2" type="radio" <?php if (!empty($financeYes) && $financeYes=='own'){?> checked <?php }?> required name="selfFinance" value="own"> OWN&nbsp;&nbsp;
                                        <input tabindex="3" type="radio"  <?php if (!empty($financeYes) && $financeYes=='sponsor'){?> checked <?php }?> required name="selfFinance" value="sponsor"> Sponsorship&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>

                            <div style="display: none" id="otherFinance">
                            <p>Name and address of person or organisation responsible for paying fees (if not yourself):</p>

                            <div class="form-group">
                                <label class="control-label col-md-3">Title:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                    <select tabindex="4" style="width: 100%"  id="title"   name="title">

                                        <option value="" selected><?php echo SELECT_TITLE?></option>
                                        <?php for ($i=0;$i<count(Title);$i++){?>
                                            <option value="<?php echo Title[$i];?>" <?php if(!empty($f4->title) &&  $f4->title == Title[$i] ) echo 'selected = "selected"'; ?> > <?php echo Title[$i] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Name:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('name'); ?></font></p>
                                    <input tabindex="5" type="text" class="form-control" id="name"  maxlength="100" name="name" value="<?php echo $f4->name ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Relation:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('relation'); ?></font></p>
                                    <input tabindex="6" type="text" class="form-control" id="relation"  maxlength="50" name="relation"  value="<?php echo $f4->relation?>">
                                </div>
                            </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Address Line 1:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-9">
                                        <!--                                    <textarea id="address1" name="address[]" rows="8" tabindex="4" required></textarea>-->
                                        <input tabindex="7"  type="text" class="form-control" id="address" name="address"  value="<?php echo $f4->address?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Address Line 2:</label>
                                    <div class="col-md-9">
                                        <!--                                    <textarea id="address1" name="address[]" rows="8" tabindex="4" required></textarea>-->
                                        <input tabindex="8"  type="text" class="form-control" id="address2" name="address2" value="<?php echo $f4->address2?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Address Line 3:</label>
                                    <div class="col-md-9">
                                        <!--                                    <textarea id="address1" name="address[]" rows="8" tabindex="4" required></textarea>-->
                                        <input tabindex="9"  type="text" class="form-control" id="address3" name="address3" value="<?php echo $f4->address3?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Postal Code:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-9">
                                        <!--                                    <textarea id="address1" name="address[]" rows="8" tabindex="4" required></textarea>-->
                                        <input tabindex="7"  type="text" class="form-control" id="addressPo" name="addressPo"  value="<?php echo $f4->addressPo?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">City/Town:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-9">
                                        <!--                                    <textarea id="address1" name="address[]" rows="8" tabindex="4" required></textarea>-->
                                        <input tabindex="10"  type="text" class="form-control" id="city" name="city"  value="<?php echo $f4->city?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">County/State:</label>
                                    <div class="col-md-9">
                                        <!--                                    <textarea id="address1" name="address[]" rows="8" tabindex="4" required></textarea>-->
                                        <input tabindex="11"  type="text" class="form-control" id="state" name="state" value="<?php echo $f4->state?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Country:<span style="color: red" class="required">*</span></label>
                                    <div class="col-md-9">
                                        <p><font color="red"> <?php echo form_error('country'); ?></font></p>
                                        <select tabindex="9" style="width: 100%" id="country"  name="country">
                                            <option value="" disabled selected>Select country...</option>
                                            <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                                <!--                                        <option --><?php //if ($candidateInfo->title == Title[$i]){?><!-- selected --><?php //} ?><!-- value="--><?php //echo Title[$i]?><!--">--><?php //echo Title[$i]?><!--</option>-->
                                                <option value="<?php echo COUNTRY[$i]?>" <?php if(!empty($f4->country) &&  $f4->country == COUNTRY[$i] ) echo 'selected = "selected"'; ?>> <?php echo COUNTRY[$i]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Mobile:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('mobile'); ?></font></p>

                                    <input tabindex="10" type="number" class="form-control" id="mobile" minlength="11" maxlength="20"  name="mobile" value="<?php echo $f4->mobile ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Telephone:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('telephone'); ?></font></p>

                                    <input tabindex="11" type="number" class="form-control" id="telephone" minlength="11" maxlength="20" name="telephone"value="<?php echo $f4->telephone ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">E-mail:<span style="color: red" class="required">*</span></label>
                                <div class="col-md-9">
                                    <p><font color="red"> <?php echo form_error('email'); ?></font></p>

                                    <input tabindex="12" type="email" class="form-control" id="email" maxlength="50" name="email" value="<?php echo $f4->email ?>">
                                </div>
                            </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-9">
                                    <a href="<?php echo base_url()?>ApplyForm5" ><button type="button" class="btn btn-previous">Previous</button></a>

                                    <button type="reset" class="btn btn-next">Reset</button>
                                    <button type="submit" class="btn btn-next">Save Application</button>
                                    <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/editORInsertApplicationForm4AndNext" class="btn btn-next">Save And Next</button>
                                    <a href="<?php echo base_url()?>ApplyForm6" ><button type="button"  class="btn ">Next</button></a>

                                </div>
                            </div>

                        </div>
                </form>
            <?php } ?>



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
        if ('<?php echo $financeYes?>'== 'y' ){
            document.getElementById("otherFinance").style.display = "none";
        }else {
            document.getElementById("otherFinance").style.display = "block";
        }
    });

    $("input[name=selfFinance]").click( function () {

        if ($(this).val()=='own' || $(this).val()=='slc'){
            document.getElementById("otherFinance").style.display = "none";
        }else {
            document.getElementById("otherFinance").style.display = "block";
        }

    });

    function formvalidate() {

        var finance=$('input[name=selfFinance]:checked').val();

        if (finance != 'own'  && finance != "slc") {


            var title = document.getElementById("title").value;
            var email = document.getElementById("email").value;
            var name = document.getElementById("name").value;
            var relation = document.getElementById("relation").value;
            var address = document.getElementById("address").value;
            var phone = document.getElementById("mobile").value;
            var telephone = document.getElementById("telephone").value;
            var chk = /^[0-9]*$/;
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            if (title = ""){
                alert("Please select a title");
                return false;
            }
            if (name = ""){
                alert("Please fill up Name");
                return false;
            }
            if (relation = ""){
                alert("Please fill up relation");
                return false;
            }
            if (address = ""){
                alert("Please fill up address");
                return false;
            }
            if (title = ""){
                alert("Please select a title");
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
            if (!email.match(mailformat)) {
                alert("You have entered an invalid email address!");
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