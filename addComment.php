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



    $comment = $_POST['comment-text'];
    $userid = $_SESSION['username'];
    $advid = $_GET['adv'];

echo "U: " . $userid . " C: " . $comment . " A: " . $advid;

    $sql = "INSERT INTO comments VALUES('" . "COM000002" . "', '" . $userid . "', '" . $advid . "', '" . $comment . "', NULL);";
    //$sql = "INSERT INTO Comments VALUES('COM000001', 'Mithrandir', 'ADV00001', 'Hello', null);";

    $results = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>