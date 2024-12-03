<?php
$date= "2024-12-03";
$firstdate = "2024-01-00";
$nk = (strtotime($date)-strtotime("2024-01-00"))/(24*60*60);
echo $nk;
?>