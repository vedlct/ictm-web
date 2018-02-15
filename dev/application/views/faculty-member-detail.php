
		<?php include("header.php"); ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <?php foreach ($facultydetails as $facultyinfo) { ?>
                            <h2 class="title"><?php echo $facultyinfo->facultyTitle." ".$facultyinfo->facultyFirstName." ".$facultyinfo->facultyLastName;?></h2>
                            <?php }?>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                                <li> \ Teaching FACULTY Detail</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <!-- Blog posts -->
        <section class="flat-row flat-member-single padding-v1">
            <div class="container">
                <div class="row">
                    <div class="member-single">

                        <div class="col-md-9">
                            <?php foreach ($facultydetails as $facultyinfo) {?>
                            <div class="member-single-post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="item-thumbnail">
                                            <?php if ($facultyinfo->facultyImage !=null){?>
                                                <a ><img height="360px" width="360px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/facultyImages/<?php echo $facultyinfo->facultyImage?>" alt="image"></a>
                                            <?php }else{?>
                                                    <a ><img height="360px" width="360px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/facultyImages/dummy_profile.png" alt="image"></a>
                                                <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="content-pad">
                                            <div class="item-content">
                                                <h3 class="item-title"><?php echo $facultyinfo->facultyTitle." ".$facultyinfo->facultyFirstName." ".$facultyinfo->facultyLastName;?></h3>
                                                <h4 class="small-text"><?php echo str_replace(","," , ",$facultyinfo->facultyPosition);?></h4>
                                                <p><?php echo str_replace(","," , ",$facultyinfo->facultyDegree);?></p>
                                                <div class="member-tax ">
                                                    <?php echo $facultyinfo->facultyIntro;?>
                                                </div>
                                                
                                                
                                                <ul class="list-inline social-light">
                                                    <li><a class="btn btn-default social-icon" target="_blank" href="<?php echo $facultyinfo->facultyTwitter;?>"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" target="_blank" href="<?php echo $facultyinfo->facultyLinkedIn;?>"><i class="fa fa-linkedin"></i></a></li>
                                                    <li><a class="btn btn-default social-icon" href="mailto:<?php echo $facultyinfo->facultyEmail;?>"><i class="fa fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                        </div><!--/content-pad-->
                                    </div><!--/col-md-8-->
                                </div><!--/row-->
                            </div><!--/member-single-post-->
                            <?php }?>

                            <div class="course-list-table">
                                <div class="flat-all-course v1 v2">
                                    <div class="title-list v1">
                                        <h2 class="title">Courses</h2>
                                    </div><!-- /title-list -->

                                    <div class="courses-list">
                                        <table class="table course-list-table">
                                            <thead class="main-color-1-bg dark-div">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Course Name</th>
                                                    <th>Duration</th>
                                                    <th>Start Date</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <?php foreach ($facultyCourseData as $facultyAllCourse){?>
                                                <tr>
                                                    <td><?php echo $facultyAllCourse->courseCodePearson;?></td>
                                                    <td><a href="<?php echo base_url()?>course-details/<?php echo $facultyAllCourse->courseId ?>"><?php echo $facultyAllCourse->courseTitle;?></a></td>
                                                    <td><?php echo $facultyAllCourse->courseDuration;?></td>
                                                    <td></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div><!-- /flat-list-table -->
                            </div><br>
                            
                            <div class="post-contact">
                            <div class="row">
                                <div class="col-md-12">
                                	
                                        <h2 style="font-size:24px" class="title">Get in touch</h2>


								
                                    <div class="contact-form">
                                        <div class="line-box"></div>

                                        <?php if ($this->session->flashdata('errorMessage')!=null){?>
                                            <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                                        <?php }
                                        elseif($this->session->flashdata('successMessage')!=null){?>
                                            <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                                        <?php }?>

                                        <form action="<?php echo base_url()?>Email/FacultyEmail/<?php echo $facultyinfo->facultyId?>" onsubmit="return chkFacultymail()" method="post" id="contactform" class="comment-form">
                                        	<div class="row">
                                            	<div class="col-md-12">
                                                	<label><strong>Your Name *</strong></label>
                                                	<fieldset class="style-1 full-name">
                                                        <input type="text" id="name" required class="tb-my-input" name="name" tabindex="2" value="" size="32" aria-required="true">
                                                    </fieldset>
                                                </div>

                                            </div> 
                                            <div class="row">
                                            	<div class="col-md-6">
                                                	<label><strong>Your E-Mail *</strong></label>
                                                	<fieldset class="style-1 email-address">
                                                        <input type="email" id="email"  class="tb-my-input" name="email" required tabindex="2" value="" size="32" aria-required="true">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                	<label><strong>Your Contact Number</strong></label>
                                                	<fieldset class="style-1 contact">
                                                        <input type="text" id="contact"  class="tb-my-input" name="contact" required tabindex="2" size="32" aria-required="true">
                                                    </fieldset>
                                                </div>
                                            </div>                           
											<label><strong>Your Enquiry *</strong></label>
                                            <fieldset class="message-form">
                                                <textarea required id="comment" name="comment" rows="8" tabindex="2"></textarea>
                                            </fieldset>
                                            <input name="facultyEmail" type="hidden" value="<?php echo $facultyinfo->facultyEmail?>">
                                            <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY_CONTACT?>"></div><br>
                                            <div class="submit-wrap">
                                                <button type="submit" class="flat-button button-style style-v1">Send</button>
                                            </div>             
                                        </form>
                                    </div>
                                    <!-- contact-form -->
                                </div><!-- col-md-12 -->
                            </div><!-- /row-->
                            </div>
                        </div><!-- /col-md-9 -->

                        <div class="col-md-3">
                            <div class="sidebar">

                                <div class="widget widget-courses">
                                    <h2 class="widget-title">COURSES LIST</h2>
                                    <?php include ("course-sidebar.php"); ?>
                                </div><!-- /widget-posts -->
                                
                            </div><!-- sidebar -->
                        </div><!-- /col-md-3 -->
                    </div>
                </div>
            </div>
        </section>

		<?php include("footer.php"); ?>
        
    </div>
</body>


</html>

        <script>

            function chkFacultymail() {

                var name =  document.getElementById("name").value;
                var email =  document.getElementById("email").value;
//                var subject =  document.getElementById("subject").value;
                var contact =  document.getElementById("contact").value;
                var comment =  document.getElementById("comment").value;
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

                if (name ==""){
                    alert("name field can not be empty !! ");
                    return false;
                }
                if (contact ==""){
                    alert("contact field can not be empty !! ");
                    return false;
                }
//                if (subject ==""){
//                    alert("Subject field can not be empty !! ");
//                    return false;
//                }
                if (comment == ""){
                    alert("Comment field can not be empty !! ");
                    return false;
                }
                if(email.match(mailformat))
                {
                    return true;
                }
                else
                {
                    alert("You have entered an invalid email address!");
                    return false;
                }


            }

        </script>