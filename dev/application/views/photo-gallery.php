
<?php include("header.php"); ?>

<div class="page-title full-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2 class="title">Photo Gallery</h2>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><a href="#">Home </a></li>
                        <li>\ Photo Gallery</li>
                    </ul>
                </div>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /page-title -->

<section class="flat-row padding-v1">
    <div class="container">
        <?php foreach ($albumCategoryList as $acl){?>
        <div class="row single-course-detail" style="border:2px solid #eaeaea">
            <div class="content-content">
                <h3><?php echo $acl->albumCategoryName; ?></h3>
                <?php foreach ($albumname as $an){
                    if ($an->albumCategoryName == $acl->albumCategoryName){

                        $this->db->select('photoName');
                        $this->db->from('ictmphoto');
                        $this->db->where('albumId',$an->albumId);
                        $this->db->limit(1);
                        $query3 = $this->db->get();

                    ?>
                        <div class="col-xs-6 col-sm-4">
                            <?php foreach ($query3->result() as $s) { ?>
                                <a href="<?php echo  base_url()?>album-pictures/<?php echo $an->albumId ?>" class="thumbnail">
                                    <img src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/<?php echo $an->albumTitle?>/<?php echo $s->photoName?>" >
                                    <p style=""><?php echo $an->albumTitle?></p>
                                </a>
                            <?php } ?>
                        </div>
                <?php } } ?>
            </div>
        </div><br>
        <?php } ?>
    </div>

</section>

<?php include("footer.php"); ?>

<script>
    $(document).ready(function() {
        var $lightbox = $('#lightbox');

        $('[data-target="#lightbox"]').on('click', function(event) {
            var $img = $(this).find('img'),
                src = $img.attr('src'),
                alt = $img.attr('alt'),


                css = {
                    'maxWidth': $(window).width() - 100,
                    'maxHeight': $(window).height() - 100
                };

            $lightbox.find('.close').addClass('hidden');
            $lightbox.find('img').attr('src', src);
            $lightbox.find('img').attr('alt', alt);

            $lightbox.find('img').css(css);
        });

        $lightbox.on('shown.bs.modal', function (e) {
            var $img = $lightbox.find('img');

            $lightbox.find('.modal-dialog').css({'width': $img.width()});
            $lightbox.find('.close').removeClass('hidden');
        });
    });
</script>

</div>
</body>

</html>