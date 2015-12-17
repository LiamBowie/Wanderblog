<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 16/12/2015
 * Time: 16:04
 */

include 'connect.php';
    // Display any errors
    if(!$conn){ die("Connection failed: " . mysqli_error($conn));}
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();


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


    $comment = $_POST['comment-text'];
        $userid = $_SESSION['username'];
        $advid = $_GET['adv'];

    echo "U: " . $userid . " C: " . $comment . " A: " . $advid;

        // Still need auto incrementing ID
        $sql = "INSERT INTO comments VALUES('" . $newID . "', '" . $userid . "', '" . $advid . "', '" . $comment . "', NULL);";

        $results = mysqli_query($conn, $sql);
        mysqli_close($conn);

        header("Location: adventure.php?adv=" . $advid . "#comments");
?>