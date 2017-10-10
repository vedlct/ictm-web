		
        <?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Student Registration</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li>\ Student Registration</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="flat-row padding-small-v1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
	
                        	<form role="form" action="" method="post" class="registration-form form-horizontal">
                        		
                        		<fieldset>
		                        
		                            <div class="form-bottom">
                                    <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Personal Details</h2>
                                    	<div class="form-group">
                                                    <label class="control-label col-md-2">Title:</label>
                                                    <div class="col-md-10">
                                                        <select style="width: 100%" name="">
                                                              <option value="">Mr.</option>
                                                              <option value="">Mrs.</option>
                                                              <option value="">Ms.</option>
                                                              <option value="">Miss.</option>
                                                              <option value="">Other...</option>
                                                            </select> 
                                                    </div>
                                                </div>
				                    	<div class="form-group">
				                    		<label class="control-label col-md-2">First Name*</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
				                        <div class="form-group">
				                        	<label class="control-label col-md-2">Surname*</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Email Address*</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
                                        	<label class="control-label col-md-2">Gender:</label>
                                          	<div class="col-md-10">
                                            	<input type="radio" name="" value="male"> Male&nbsp;&nbsp;
                                                <input type="radio" name="" value="female"> Female&nbsp;&nbsp;
                                                <input type="radio" name="" value="other"> Other
                                          	</div>
				                        </div><br>
                                        
                                        <h2 style="font-weight:bold; font-size:17px; margin-bottom:20px; text-align:center; text-decoration:underline">Password</h2>
                                        
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Password*</label>
                                            <div class="col-md-10">
				                        		<input type="password" name="" placeholder="Enter Password" class="form-control" id="">
                                            </div>
				                        </div>
                                        
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Repassword*</label>
                                            <div class="col-md-10">
				                        		<input type="password" name="" placeholder="Re type Password" class="form-control" id="">
                                            </div>
				                        </div>
                                        
                                        <div class="form-group">        
                                          <div class="col-sm-offset-2 col-md-10">
                                            <button type="button" class="btn btn-next">Submit</button>
                                          </div>
                                        </div>
				                        
				                    </div>
			                    </fieldset>                    
		                    </form>

                    </div><!-- /col-md-9 -->

                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
                 
    </div>
</body>

</html>