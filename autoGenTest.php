<?php

include'connect.php';

$found = false;
$query = 'SELECT * FROM Author';
$results = mysqli_query($conn, $query);
$last = "";

if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
    while (($row = mysqli_fetch_array($results)) && ($found == false)) {
        $last = $row['authorID'];
    }
}

$lastArray = str_split($last);
$lastNum = (int)$lastArray[8];
$newNum = $lastNum + 1;
$newNum = "";
for($i=0; $i<8; $i++){ $newNum = $newNum . $lastArray[$i]; }
echo $newNum;