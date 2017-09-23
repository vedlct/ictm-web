<?php
if (!empty($pageImageName)){
foreach ($pageImageName as $image)
{?>
<img src="<?php echo  base_url()?>images/pageImages/<?php echo $image->pageImage ?>" width="60%">
<?php }}
elseif (!empty($facultyImage)){
    foreach ($facultyImage as $facultyImage){?>

<img src="<?php echo  base_url()?>images/facultyImages/<?php echo $facultyImage->facultyImage ?>" width="60%">
<?php }}
elseif(!empty($courseImage)){
    foreach ($courseImage as $courseImage){?>
<img src="<?php echo  base_url()?>images/courseImages/<?php echo $courseImage->courseImage ?>" width="60%">
<?php }}
elseif(!empty($deptimagename)){
    foreach ($deptimagename as $deptimagename){?>
        <img src="<?php echo  base_url()?>images/departmentImages/<?php echo $deptimagename->departmentImage ?>" width="60%">
    <?php }}

elseif(!empty($newsimage)){
    foreach ($newsimage as $newsimage){?>
        <img src="<?php echo  base_url()?>images/newsImages/<?php echo $newsimage->newsPhoto ?>" width="60%">
     <?php }}
elseif(!empty($eventImage)){
    foreach ($eventImage as $eventImage){?>
        <img src="<?php echo  base_url()?>images/eventImages/<?php echo $eventImage->eventPhotoPath ?>" width="60%">
    <?php }}
elseif(!empty($PhotoImage)){
    foreach ($PhotoImage as $PhotoImage){?>
        <img src="<?php echo  base_url()?>images/eventImages/<?php echo $PhotoImage->photoName ?>" width="60%">
    <?php }}

elseif(!empty($feedbackImage)){
    foreach ($feedbackImage as $feedbackImage){?>
        <img src="<?php echo  base_url()?>images/feedbackImages/<?php echo $feedbackImage->feedbackByPhoto ?>" width="60%">
    <?php }}

?>