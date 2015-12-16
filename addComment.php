<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 16/12/2015
 * Time: 16:04
 */
    session_start();

    $comment = $_POST = ['comment-text'];
    $userid = $_SESSION['username'];
    $advid = $_GET['adv'];

echo "U: " . $userid . " C: " . $comment . " A: " . $advid;

    $sql = "INSERT INTO comments VALUES('" . "COM000001" . "', '" . $userid . "', '" . $advid . "', '" . $comment . "', '" . null . ");";

    $results = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>