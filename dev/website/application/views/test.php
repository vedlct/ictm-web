<?php

foreach ($mainmenu as $mn) {
    echo $mn->menuName."<br>";

        foreach ($parentmenu as $pm) {
            if ($pm->parentId != ""  ) {
            echo $pm->menuName . "<br>";
        }

    }
}
?>