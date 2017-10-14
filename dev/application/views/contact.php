		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Contact Us</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li>\ Contact</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <!-- contact posts -->
        <section class="main-content contact-posts">
            <div class="container">
                <div class="row">
                    <div class="post-contact">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-form">

                                        <form action="#" method="post" id="contactform" class="comment-form" novalidate>                            
                                            <fieldset class="style-1 full-name">
                                                <input type="text" id="name" placeholder="Your name" class="tb-my-input" name="author" tabindex="1" value="" size="32" aria-required="true">
                                            </fieldset>

                                            <fieldset class="style-1 email-address">
                                                <input type="email" id="email" placeholder="Your email" class="tb-my-input" name="email" tabindex="2" value="" size="32" aria-required="true">
                                            </fieldset> 

                                            <fieldset class="style-1 subject">
                                                <input type="text" id="subject" placeholder="Subject" class="tb-my-input" name="subject" tabindex="2" value="" size="32" aria-required="true">
                                            </fieldset> 

                                            <fieldset class="message-form">
                                                <textarea id="comment-message" placeholder="Your Message" name="comment" rows="8" tabindex="4"></textarea>
                                            </fieldset>

                                            <div class="submit-wrap">
                                                <button class="flat-button button-style style-v1">Send <i class="fa fa-angle-right"></i></button>
                                            </div>             
                                        </form>
                                    </div><!-- contact-form -->
                                </div><!-- col-md-6 -->

                                <div class="col-md-6">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div id="map" style="width: 100%; height: 500px; "></div> 
                                        </div>
                                    </div><!-- /container-fluid -->
                                </div>
                            </div><!-- /row-->
                        </div><!-- /col-md-9 -->

                    </div>
                </div>
            </div>
        </section>

        <?php include("footer.php"); ?>
        

        <script type="text/javascript" src="<?php echo base_url()?>public/javascript/gmap3.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery-waypoints.js"></script>

    </div>
</body>

<!-- Mirrored from corpthemes.com/html/university/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2017 06:03:02 GMT -->
</html>