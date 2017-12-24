		<?php include("header.php"); ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Contact Us</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
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

                                        <form action="<?php echo base_url()?>Email/contactEmail" method="post" id="contactform" class="comment-form" >
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

                                            <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY_CONTACT?>"></div><br>
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
        

<!--        <script type="text/javascript" src="--><?php //echo base_url()?><!--public/javascript/gmap3.min.js"></script>-->
<!--        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
        <script type="text/javascript" src="<?php echo base_url()?>public/javascript/jquery-waypoints.js"></script>

        <script>
            function initMap() {
                var uluru = {lat: 51.515698, lng: -0.067622};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZnEw-KEMJGyeJirDzOXa11L9kibGgQXM&callback=initMap">
        </script>

    </div>
</body>


</html>