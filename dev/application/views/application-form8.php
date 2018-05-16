
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

        <div id="sessionFlashMessageDiv">
            <?php if ($this->session->flashdata('errorMessage')!=null){?>
                <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
            <?php }
            elseif($this->session->flashdata('successMessage')!=null){?>
                <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
            <?php }?>

        </div>



        <div class="row">
            <div class="col-md-9">

                <form role="form" action="<?php echo base_url()?>ApplyOnline/insertapplyNow8" method="post" class="form-horizontal">

<!--                    <fieldset>-->
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Referees</h3>
                            </div>

                            <div class="form-top-right">
                                <p>Step 8 / 9</p>
                            </div>
                        </div>

                        <div class="form-bottom">
                            <div id='TextBoxesGroup'>
                                <div id="TextBoxDiv1" >
                            <div class="form-group">
                                <label class="control-label col-md-2">Title*:</label>
                                <div class="col-md-10">
                                    <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                    <select required style="width: 100%"  id="title1"  name="title[]">

                                        <option value="" selected><?php echo SELECT_TITLE?></option>
                                        <?php for ($i=0;$i<count(Title);$i++){?>
                                            <option <?php echo set_select('title',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                        <?php  } ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Name:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="name1" name="name[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Institution/Company:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="company1" name="company[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Position / Job Title:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="jobTitle1" name="jobTitle[]">
                                </div>
                            </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">Telephone:</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="telephone1" name="telephone[]">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">E-mail:</label>
                                        <div class="col-md-10">
                                            <input type="email" class="form-control" id="email1" name="email[]">
                                        </div>
                                    </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Address:</label>
                                <div class="col-md-10">
                                    <textarea id="address1" name="address[]" rows="8" tabindex="4"></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-2">Address P.O :</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="addressPo1" name="addressPo[]">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Country:</label>
                                <div class="col-md-10">
                                    <select style="width: 100%" id="country1"  name="country[]">
                                        <option value="" disabled selected>Select country...</option>
                                        <?php for ($i=0;$i<count(COUNTRY);$i++){?>
                                            <option value="<?php echo COUNTRY[$i]?>"<?php
                                            echo set_value('country') == COUNTRY[$i] ? "selected" : "";
                                            ?>><?php echo COUNTRY[$i]?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <button id='addButton' type="button" class="btn">Add Another Referee</button>
                                    <button class="btn " type='button' value='Remove' id='removeButton'> Remove</button>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-10">
                                    <a href="<?php echo base_url()?>ApplyForm7" ><button type="button"  class="btn ">Previous</button></a>
                                    <button type="submit" class="btn btn-next">Save Application</button>
                                    <button type="submit" formaction="<?php echo base_url()?>ApplyOnline/insertApplicationForm8AndNext" class="btn btn-next">Save And Next</button>
                                    <a href="<?php echo base_url()?>ApplyForm9" ><button type="button"  class="btn ">Next</button></a>
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
        var counter = 2;
        $("#addButton").click(function () {
            if(counter>10){
                alert("Only 10 textboxes allow");
                return false;
            }
            if (counter == 2){

                var title1=$('#title1').val();
                var name1=$('#name1').val();
                var company1=$('#company1').val();
                var jobTitle1=$('#jobTitle1').val();
                var address1=$('#address1').val();
                var telephone1=$('#telephone1').val();
                var email1=$('#email1').val();
                var country=$('#country1').val();
                var addressPo=$('#addressPo1').val();

                var chk = /^[0-9]*$/;
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (title1 == ""){
                    alert('Please add a Title');
                    return false;
                }if (title1.length > 12){
                    alert('Title must be less then 12 charecter');
                    return false;
                }if (name1 == ""){
                    alert('Please add a Name');
                    return false;
                }if (name1.length >100){
                    alert('Name must be less then 100 charecter');
                    return false;
                }if (company1 == ""){
                    alert('Please add a Company');
                    return false;
                }
                if (company1.length >80){
                    alert('Company name must be less then 80 charecter');
                    return false;
                }
                if (jobTitle1.length >60){
                    alert('JobTitle name must be less then 80 charecter');
                    return false;
                }
                if (address1.length >1000){
                    alert('address name must be less then 1000 charecter');
                    return false;
                }
                if (jobTitle1 == ""){
                    alert('Please add a jobTitle');
                    return false;
                }if (address1 == ""){
                    alert('Please add a Address');
                    return false;
                }if (telephone1 == ""){
                    alert('Please add a Telephone');
                    return false;
                }
                if (telephone1.length >20){
                    alert('Telephone must be less then 20 charecter');
                    return false;
                }
                if (email1 == ""){
                    alert('Please add a Email');
                    return false;
                }
                if (email1.length >100){
                    alert('Email must be less then 100 charecter');
                    return false;
                }
                if (country == ""){
                    alert('Please add a Country');
                    return false;
                }
                if (country.length >255){
                    alert('Country Name must be less then 255 charecter');
                    return false;
                }if (addressPo == ""){
                    alert('Please add a Address P.O');
                    return false;
                }
                if (addressPo.length >8){
                    alert('Address P.O. must be less then 8 charecter');
                    return false;
                }
                if (!email1.match(mailformat)) {
                    alert("You have entered an invalid email address!");
                    return false;
                }
                if (!telephone1.match(chk)) {
                    alert("please enter phone number correctly!");
                    return false;
                }

            }
            else{



                var title=$('#title'+(counter-1)).val();
                var name=$('#name'+(counter-1)).val();
                var company=$('#company'+(counter-1)).val();
                var jobTitle=$('#jobTitle'+(counter-1)).val();
                var address=$('#address'+(counter-1)).val();
                var telephone=$('#telephone'+(counter-1)).val();
                var email=$('#email'+(counter-1)).val();

                var country=$('#country'+(counter-1)).val();
                var addressPo=$('#addressPo'+(counter-1)).val();

                var chk = /^[0-9]*$/;
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (title == ""){
                    alert('Please add a Title'+(counter-1));
                    return false;
                }if (title.length > 12){
                    alert('Title must be less then 12 charecter'+(counter-1));
                    return false;
                }if (name == ""){
                    alert('Please add a Name'+(counter-1));
                    return false;
                }if (name.length >100){
                    alert('Name must be less then 100 charecter'+(counter-1));
                    return false;
                }if (company == ""){
                    alert('Please add a Company'+(counter-1));
                    return false;
                }
                if (company.length >80){
                    alert('Company name must be less then 80 charecter'+(counter-1));
                    return false;
                }
                if (jobTitle.length >60){
                    alert('JobTitle name must be less then 80 charecter'+(counter-1));
                    return false;
                }
                if (address.length >1000){
                    alert('address name must be less then 1000 charecter'+(counter-1));
                    return false;
                }
                if (jobTitle == ""){
                    alert('Please add a jobTitle'+(counter-1));
                    return false;
                }if (address == ""){
                    alert('Please add a Address'+(counter-1));
                    return false;
                }if (telephone == ""){
                    alert('Please add a Telephone'+(counter-1));
                    return false;
                }
                if (telephone.length >20){
                    alert('Telephone must be less then 20 charecter'+(counter-1));
                    return false;
                }
                if (email == ""){
                    alert('Please add a Email'+(counter-1));
                    return false;
                }
                if (email.length >100){
                    alert('Email must be less then 100 charecter'+(counter-1));
                    return false;
                }
                if (country == ""){
                    alert('Please add a Country'+(counter-1));
                    return false;
                }
                if (country.length >255){
                    alert('Country Name must be less then 255 charecter'+(counter-1));
                    return false;
                }if (addressPo == ""){
                    alert('Please add a Address P.O'+(counter-1));
                    return false;
                }
                if (addressPo.length >8){
                    alert('Email must be less then 8 charecter'+(counter-1));
                    return false;
                }

                if (!email.match(mailformat)) {
                    alert("You have entered an invalid email address!"+(counter-1));
                    return false;
                }
                if (!telephone.match(chk)) {
                    alert("please enter phone number correctly!"+(counter-1));
                    return false;
                }

            }

            var newTextBoxDiv = $(document.createElement('div'))
                .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html( '<div class="form-group">'+
                '<label class="control-label col-md-2">Title'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<select required style="width: 100%"  id="title'+counter+'"  name="title[]">'+

                '<option value="" selected><?php echo SELECT_TITLE?></option>'+
            '<?php for ($i=0;$i<count(Title);$i++){?>'+
            '<option ><?php echo Title[$i]?></option>'+
            '<?php  } ?>'+

            '</select>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Name'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="name'+counter+'" name="name[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Institution/Company'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="company'+counter+'" name="company[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Position / Job Title'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="jobTitle'+counter+'" name="jobTitle[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Telephone'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="telephone'+counter+'" name="telephone[]">'+
                '</div>'+
                '</div>'+'<div class="form-group">'+
                '<label class="control-label col-md-2">E-mail'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<input type="email" class="form-control" id="email'+counter+'" name="email[]">'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Address'+counter+':</label>'+
                '<div class="col-md-10">'+
                '<textarea id="address'+counter+'" name="address[]" rows="8" tabindex="4"></textarea>'+
                '</div>'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Address P.O :</label>'+
                '<div class="col-md-10">'+
                '<input type="text" class="form-control" id="addressPo'+counter+'" name="addressPo[]">'+
                '</div>'+
                '<div class="form-group">'+
                '<label class="control-label col-md-2">Country:</label>'+
                '<div class="col-md-10">'+
                '<select style="width: 100%" id="country'+counter+'"  name="country[]">'+
                '<option value=""  selected>Select country...</option>'+
                '<?php for ($i=0;$i<count(COUNTRY);$i++){?>'+
                '<option value="<?php echo COUNTRY[$i]?>">'+'<?php echo COUNTRY[$i]?></option>'+
                '<?php } ?>'+
                '</select>'+
                '</div>'+
                '</div>'+
                '</div>'


            );

            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        });
        $("#removeButton").click(function () {
            if(counter==2){
                alert(" There Should be atleast one Referees");
                document.getElementById('Item_price').style.display = "block";
//                    document.getElementById('Item_Status').style.display = "block";
                document.getElementById('add_remove_button').style.display = "none";
                document.getElementById('showattr').style.display = "none";
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });
</script>