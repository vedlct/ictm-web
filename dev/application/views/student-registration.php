
        <?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Agent/Student Registration</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li>\ Agent/Student Registration</li>
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
                    <div class="col-md-12">
	
                        	<form role="form" action="<?php echo base_url()?>Registration/newRegistaion" method="post" class="registration-form form-horizontal" onsubmit="return formvalidate()">

		                        
		                            <div class="form-bottom">
                                    <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Personal Details</h2>
                                        <div class="form-group">
                                            <label class="control-label col-md-2">Type:<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('type'); ?></font></p>
                                                <select style="width: 100%"  id="type" required name="type">

                                                    <option value="" selected><?php echo SELECT_TYPE?></option>
                                                    <?php for ($i=0;$i<count(Type);$i++){?>
                                                        <option <?php echo set_select('type',  Type[$i], False); ?>><?php echo Type[$i]?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                    	<div class="form-group">
                                                    <label class="control-label col-md-2">Title:<span style="color: red" class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <p><font color="red"> <?php echo form_error('title'); ?></font></p>
                                                        <select style="width: 100%"  id="title" required name="title">

                                                            <option value="" selected><?php echo SELECT_TITLE?></option>
                                                            <?php for ($i=0;$i<count(Title);$i++){?>
                                                                <option <?php echo set_select('title',  Title[$i], False); ?>><?php echo Title[$i]?></option>
                                                            <?php } ?>

                                                            </select> 
                                                    </div>
                                                </div>


				                    	<div class="form-group">
				                    		<label class="control-label col-md-2">First Name<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('firstname'); ?></font></p>
				                        		<input type="text" name="firstname" placeholder="" required value="<?php echo set_value('firstname'); ?>" class="form-control" id="firstname">
                                            </div>
				                        </div>
				                        <div class="form-group">
				                        	<label class="control-label col-md-2">Surname<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('surname'); ?></font></p>
				                        		<input type="text" name="surname" required value="<?php echo set_value('surname'); ?>" class="form-control" id="surname">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Email<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('email'); ?></font></p>
				                        		<input type="email" name="email" required value="<?php echo set_value('email'); ?>" placeholder="" class="form-control" id="email">
                                            </div>
				                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Gender:<span style="color: red" class="required">*</span></label>
                                          	<div class="col-md-10" >
                                                <p><font color="red"> <?php echo form_error('gender'); ?></font></p>
                                            	<input type="radio" required name="gender" value="male"> Male&nbsp;&nbsp;
                                                <input type="radio" required name="gender" value="female"> Female&nbsp;&nbsp;
                                                <input type="radio" required name="gender" value="other"> Other
                                          	</div>
				                        </div><br>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Password</h2>
                                        
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Password<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('password'); ?></font></p>
				                        		<input type="password" name="password" required value="<?php echo set_value('password'); ?>" placeholder="Enter Password" class="form-control" id="password">
                                            </div>
				                        </div>
                                        
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Repassword<span style="color: red" class="required">*</span></label>
                                            <div class="col-md-10">
                                                <p><font color="red"> <?php echo form_error('confirmpassword'); ?></font></p>
				                        		<input type="password" name="confirmpassword" required value="<?php echo set_value('confirmpassword'); ?>" placeholder="Re type Password" class="form-control" id="confirmpassword">
                                            </div>
				                        </div>
                                        
                                        <div class="form-group">        
                                          <div class="col-sm-offset-2 col-md-10">
                                            <button type="submit"  class="btn btn-next">Submit</button>
                                          </div>
                                        </div>
				                        
				                    </div>

		                    </form>

                    </div><!-- /col-md-9 -->

                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
                 
    </div>
</body>

</html>
        <script>
            function formvalidate() {
                var email =  document.getElementById("email").value;
                var pass =  document.getElementById("password").value;
                var conPass =  document.getElementById("confirmpassword").value;
                var surname =  document.getElementById("surname").value;
                var firstname =  document.getElementById("firstname").value;


                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if(!email.match(mailformat))
                {
                    alert("You have entered an invalid email address!");
                    return false;
                }

                if (pass!=conPass){
                    alert("Password and Confirm Pass word Doesn't Match");
                    return false;
                }

                if (surname==null  )
                {
                    alert("User Name Can not Empty");
                    return false;
                }
               if(firstname==null)
               {
                   alert(" First Name can not Empty");
                   return false;
               }


                else
                {
                    return true;
                }
            }
        </script>
