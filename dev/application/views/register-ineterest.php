		
        <?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Register Interest</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li>\ Register Interest</li>
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
				                        	<label class="control-label col-md-2">Address</label>
                                            <div class="col-md-10">
				                        		<textarea name="" class="form-control" id=""></textarea>
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Phone Number</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Email Address*</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Course</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">How did you hear about us*</label>
                                            <div class="col-md-10">
                                                <select style="width: 100%" name="carlist" form="carform">
                                                	<option value="#" selected disabled>Select...</option>
                                                    <option value="Hotcourses">Hotcourses</option>
                                                    <option value="Whatuni">Whatuni</option>
                                                    <option value="Metro Newspaper">Metro Newspaper</option>
                                                    <option value="Evening Standard">Evening Standard</option>
                                                    <option value="Eastend Life Newspaper">Eastend Life Newspaper</option>
                                                    <option value="Bill Board">Bill Board</option>
                                                    <option value="Internet">Internet</option>
                                                    <option value="Friends">Friends</option>
                                                    <option value="Google Ad">Google Ad</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="TV advert">TV advert</option>
                                                    <option value="Other">Other Newspaper/media: Please specify</option>
                                                 </select> 
                                             </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Other</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Disability requirement</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Book appointment/open day</label>
                                            <div class="col-md-10">
				                        		<input type="text" name="" placeholder="" class="form-control" id="">
                                            </div>
				                        </div>
                                        <div class="form-group">
				                    		<label class="control-label col-md-2">Comments</label>
                                            <div class="col-md-10">
				                        		<textarea name="" class="form-control" id=""></textarea>
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
        <script src="<?php echo base_url()?>public/javascript/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url()?>public/javascript/scripts.js"></script>
                 
    </div>
</body>

</html>