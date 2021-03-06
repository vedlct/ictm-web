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
                        <li class="home"><a href="<?php echo base_url()?>Home">Home </a></li>
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
            <div class="phtoglry row single-course-detail" style="border:2px solid #eaeaea">
                <div class="content-content">
                    <h3><?php echo $acl->albumCategoryName; ?></h3>
                    <?php foreach ($albumname as $an){
                        if ($an->albumCategoryName == $acl->albumCategoryName){
                            $this->db->select('photoName');
                            $this->db->from('ictmphoto');
                            $this->db->where('albumId',$an->albumId);
                            $this->db->where('albumCover',SELECT_APPROVE[0]);

                            $query3 = $this->db->get();
                            ?>
                            <?php if (!empty($query3->result())){foreach ($query3->result() as $s) {?>
                            <div class="col-xs-6 col-sm-4">

                                        <a href="<?php echo  base_url()?>album-pictures/<?php echo $an->albumId ?>" class="thumbnail">
                                            <?php if ($s->photoName !=null){?>
                                                <img  src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/<?php echo $an->albumTitle?>/<?php echo $s->photoName?>" >
                                            <?php }else{?>
                                                <img src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/noImage.jpg" >
                                            <?php }?>
                                            <p style=""><?php echo $an->albumTitle?></p>
                                        </a>


                            </div>
                            <?php }}?>
                        <?php } } ?>
                </div>
            </div><br>
        <?php } ?>
    </div>

</section>

<?php include("footer.php"); ?>


</div>
</body>

</html>