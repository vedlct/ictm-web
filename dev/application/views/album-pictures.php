<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($albumphoto as $ap) {?>
                    <div class="page-title-heading">
                        <h2 class="title"><?php echo $ap->albumTitle?></h2>
                    </div>

                    <?php break;} ?>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
                        <li>\ Album Title</li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<section class="flat-row padding-v1">

    <div class="container">

        <?php foreach ($albumphoto as $ap) {?>
            <h1 class="title-section"><?php echo $ap->albumDescription?></h1><br>
            <?php break;} ?>

        <div class="row">

            <?php
            $count1 =1;
            foreach ($albumphoto as $ap) {
                ?>
                <div class="col-xs-6 col-sm-3">
                    <a href="#" class="">
                        <img src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/<?php echo $ap->albumTitle?>/<?php echo $ap->photoName?>" style="width:100%" onclick="openModal();currentSlide(<?php echo $count1?>)" class="picglry hover-shadow cursor">
                    </a>
                </div>
                <?php  $count1++;} ?>
        </div>
    </div>

</section>


<div style="z-index: 9999" id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <?php
        $count2 =1;
        foreach ($albumphoto as $ap) { ?>
            <div class="mySlides">
                <div class="numbertext"><?php echo $count2; ?>/ <?php echo count($albumphoto)?></div>
                <img src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/<?php echo $ap->albumTitle?>/<?php echo $ap->photoName?>" style="width:100%">
            </div>
            <?php $count2++;} ?>


        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <?php
        $count=1;
        foreach ($albumphoto as $ap) { ?>
            <div class="gallery-column">
                <img class="demo cursor" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/<?php echo $ap->albumTitle?>/<?php echo $ap->photoName?>" style="width:100%" onclick="currentSlide(<?php echo $count ?>)" alt="<?php echo $ap->photoDetails?>">
            </div>
            <?php $count++;} ?>
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