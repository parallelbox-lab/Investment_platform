<?php

    $now = strtotime("2020-10-10");
    $second = strtotime("2020-12-12");

    $datediff=  $second - $now;
    echo round($datediff/(60 * 60 * 24));

?>
