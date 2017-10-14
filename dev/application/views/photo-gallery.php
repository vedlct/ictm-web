
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
                            <?php if (!empty($query3->result())){foreach ($query3->result() as $s) {
                                $path   = 'images/photoAlbum/'.$an->albumTitle;
                                if (is_dir($path)){?>
                                <a href="<?php echo  base_url()?>album-pictures/<?php echo $an->albumId ?>" class="thumbnail">
                                    <?php if ($s->photoName !=null){?>
                                    <img style="width: 320px;height: 238px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/<?php echo $an->albumTitle?>/<?php echo $s->photoName?>" >
                                    <?php }else{?>
                                    <img style="width: 320px;height: 238px" src="<?php echo base_url()?><?php echo FOLDER_NAME ?>/images/photoAlbum/NoImage.JPG" >
                                    <?php }?>
                                <p style=""><?php echo $an->albumTitle?></p>
                                </a>
                            <?php }else{?>
                                    <a style="width: 320px;height: 238px" href="<?php echo base_url()?>page-not-found" class="thumbnail">
                                        <p style="color: red;text-align: center">Something Went Wrong!!</p>
                                    </a>
                            <?php }}}?>
                        </div>
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