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
echo "<br>";

//$lastArray = explode(',',$last, 0);
//print_r(str_split($last));
echo (str_split($last));

echo "<br>";

for($i = 0; $i < 9; $i++){
    echo $lastArray[$i] . ", ";
}