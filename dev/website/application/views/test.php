<?php

foreach ($departmentname as $dp){
    echo $dp->departmentName."<br>";
    foreach ($coourselist as $cl){
        if ( $cl->departmentId == $dp->departmentId ){
            echo $cl->courseTitle."<br>";
        }
    }
}
?>
