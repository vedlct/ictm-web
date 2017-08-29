<?php
if (!empty($imagename)){
foreach ($imagename as $im)
{?>
<img src="<?php echo  base_url()?>images/<?php echo $im->pageImage ?>" width="60%">
<?php }}
elseif (!empty($facultyImage)){
    foreach ($facultyImage as $facultyImage){?>

<img src="<?php echo  base_url()?>images/<?php echo $facultyImage->facultyImage ?>" width="60%">
<?php }}
elseif(!empty($courseImage)){
    foreach ($courseImage as $courseImage){?>
<img src="<?php echo  base_url()?>images/<?php echo $courseImage->courseImage ?>" width="60%">
<?php }}
elseif(!empty($deptimagename)){
    foreach ($deptimagename as $deptimagename){?>
        <img src="<?php echo  base_url()?>images/<?php echo $deptimagename->departmentImage ?>" width="60%">
    <?php }}
?>