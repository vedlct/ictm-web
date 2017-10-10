		
		<?php include("header.php"); ?>

        <div class="page-title full-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Album Title</h2>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li class="home"><a href="#">Home </a></li>
                                <li>\ Album Title</li>
                            </ul>                   
                        </div>                  
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title -->

        <section class="flat-row padding-v1">
            <div class="container">
                <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <a href="#" class="">
                                <img src="images/gallery/img_nature.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="#" class="" > 
                                <img src="images/gallery/img_fjords.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="#" class="" > 
                                <img src="images/gallery/img_mountains.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="#" class=""> 
                                <img src="images/gallery/img_lights.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                            </a>
                        </div>
                </div>
            </div>

        </section>


            <div id="myModal" class="modal">
              <span class="close cursor" onclick="closeModal()">&times;</span>
              <div class="modal-content">
            
                <div class="mySlides">
                  <div class="numbertext">1 / 4</div>
                  <img src="images/gallery/img_nature_wide.jpg" style="width:100%">
                </div>
            
                <div class="mySlides">
                  <div class="numbertext">2 / 4</div>
                  <img src="images/gallery/img_fjords_wide.jpg" style="width:100%">
                </div>
            
                <div class="mySlides">
                  <div class="numbertext">3 / 4</div>
                  <img src="images/gallery/img_mountains_wide.jpg" style="width:100%">
                </div>
                
                <div class="mySlides">
                  <div class="numbertext">4 / 4</div>
                  <img src="images/gallery/img_lights_wide.jpg" style="width:100%">
                </div>
                
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            
                <div class="caption-container">
                  <p id="caption"></p>
                </div>
            
            
                <div class="gallery-column">
                  <img class="demo cursor" src="images/gallery/img_nature_wide.jpg" style="width:100%" onclick="currentSlide(1)" alt="Nature and sunrise">
                </div>
                <div class="gallery-column">
                  <img class="demo cursor" src="images/gallery/img_fjords_wide.jpg" style="width:100%" onclick="currentSlide(2)" alt="Trolltunga, Norway">
                </div>
                <div class="gallery-column">
                  <img class="demo cursor" src="images/gallery/img_mountains_wide.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
                </div>
                <div class="gallery-column">
                  <img class="demo cursor" src="images/gallery/img_lights_wide.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                </div>
              </div>
            </div>

<script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

		<?php include("footer.php"); ?>
        

        
    </div>
</body>

</html>