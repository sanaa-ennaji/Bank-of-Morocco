<?php

$time1 =  date("Y-m-d h:i:s:us");
sleep(3);
$time2 =  date("Y-m-d h:i:s:us");

echo $time1;
echo "<br>";
echo $time2;
echo "<br>";


if ($time2 > $time1){
    echo "true";
} else {
    echo "false";
}

?>