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

$arr1 = str_split($last);
$arr2 = str_split($last, 3);

echo $arr1;
echo $arr2;

for($i=0; $i<9; $i++){ echo $row[$i] . ", "; }