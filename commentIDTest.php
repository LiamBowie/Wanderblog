<?php
// Jo's AutoGen for Comment ID
include'connect.php';
$found = false;                                                             //have not found id
$query = 'SELECT * FROM Comments;';                                          //get all comments
$results = mysqli_query($conn, $query);                                     //execute query
$last = "";                                                                 //last ID
    while (($row = mysqli_fetch_array($results)) && ($found == false)) {    //loop results
        $last = $row['commentID'];                                          //get last ID used
    }                                                                       //end while

$lastArray = str_split($last);                                              //split into array
$lastNum = (int)$lastArray[8];                                              //last number = last entry in array
$newNum = $lastNum + 1;                                                     //add 1 to last number
$newID = "";                                                                //create blank newID
for ($i = 0; $i < 8; $i++) {                                                //loop to 8
    $newID = $newID . $lastArray[$i];                                       //add elements from last array to new ID
}                                                                           //end loop
$newID = $newID . $newNum;                                                  //newID = newID plus new Number
echo $newID;                                                                //output the new ID
