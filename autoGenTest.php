<?php

include'connect.php';

$found = false;
$query = 'SELECT * FROM Author';
$results = mysqli_query($conn, $query);
$last = "";

if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
    while ($row = mysqli_fetch_array($results)){ //$row = the row you're in
        $last = $row['authorID'];   //get the latest AuthID
    } //close while
} //close if

$lastArray = str_split($last); //turn the authID into an array
$toNum = ""; //set variable for going to a number
foreach($lastArray as $entry){ $toNum = $toNum . $entry; }
$lastNum = (int)$lastArray;
echo $lastNum;
$newNum = $lastNum + 1;
echo $newNum;