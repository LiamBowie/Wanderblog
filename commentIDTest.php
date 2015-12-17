<?php
// Jo's AutoGen for Comment ID

$found = false;                                                             //have not found id
$query = 'SELECT * FROM Comments';                                          //get all comments
$results = mysqli_query($conn, $query);                                     //execute query
$last = "";                                                                 //last ID
if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
    while (($row = mysqli_fetch_array($results)) && ($found == false)) {    //loop results
        $last = $row['commentID'];                                          //get latest ID
    }
}
$lastArray = str_split($last);
$lastNum = (int)$lastArray[9];
$newNum = $lastNum + 1;
$newID = "";
for ($i = 0; $i < 9; $i++) {
    $newID = $newID . $lastArray[$i];
}
$newID = $newID . $newNum;
echo $newID;
