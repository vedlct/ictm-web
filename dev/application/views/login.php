		
        <?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Login</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li>\ Login</li>
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
                    <div class="col-md-6">	
                        	<form role="form" action="" method="post" class="registration-form">                        		
<!--                        		<fieldset>-->
                                	<div class="form-bottom">
		                            <h2 style="background:#EDE5E5;padding:20px; font-weight:bold; font-size:17px">Do You want to apply for a course at ICON College?</h2><br>
                                    <p>To apply and track your application you'll need to take a minute to create a new account for yourself on this web site. Here are the steps:<br>

                                        1. Fill out the New Account form with your details.<br>
                                        2. An email will be immediately sent to your email address.<br>
                                        3. Read your email, and click on the web link it contains.<br>
                                        4. Your account will be confirmed and you will be logged in.<br>
                                        5. Now, Apply for a course at ICON College.</p>
                                        
                                        <a href="<?php echo base_url()?>Registration"><button type="button" class="btn btn-next">Create Account</button></a>
                                        </div>
<!--			                    </fieldset>		                    -->
		                    </form>
                    </div><!-- /col-md-6 -->
                    
                    <div class="col-md-6">
                    	<form role="form" action="<?php echo base_url()?>Login/check_user" method="post"  class="registration-form">

		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label>E-Mail*</label>
				                        	<input type="email" name="useremail" placeholder="" class="form-first-name form-control" id="form-first-name">
				                        </div>
				                        <div class="form-group">
				                        	<label>Password*</label>
				                        	<input type="password" name="password" class="form-last-name form-control" id="form-last-name">
				                        </div>


                                            <button type="submit" class="btn btn-next">Login</button>

                                        <a href="<?php echo base_url()?>ForgetPass" class="pull-right"><i class="mdi mdi-lock"></i> Forgot your password?</a>

				                    </div>


		                    </form>


                    </div><!-- /col-md-6 -->

                    
                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
                 
    </div>
</body>

</html>
