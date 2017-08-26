<?php
if (!empty($imagename)){
foreach ($imagename as $im)
{?>
<img src="<?php echo  base_url()?>images/<?php echo $im->pageImage ?>" width="60%">
<?php }}
elseif (!empty($facultyImage)){
    foreach ($facultyImage as $facultyImage){?>

<img src="<?php echo  base_url()?>images/<?php echo $facultyImage->facultyImage ?>" width="60%">
<?php }}?>