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
echo $last;

$lastArray = explode(',',$last, 9);

for($i = 0; $i < 9; $i++){
    echo $lastArray[$i] . ", ";
}