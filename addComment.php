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

    $comment = $_POST['comment-text'];
    $userid = $_SESSION['username'];
    $advid = $_GET['adv'];

echo "U: " . $userid . " C: " . $comment . " A: " . $advid;

    // Still need auto incrementing ID
    $sql = "INSERT INTO comments VALUES('" . "COM000006" . "', '" . $userid . "', '" . $advid . "', '" . $comment . "', NULL);";

    $results = mysqli_query($conn, $sql);
    mysqli_close($conn);

    //header("Location: adventure.php?adv=" . $advid . "#comments");
?>