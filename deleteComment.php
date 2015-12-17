<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 17/12/2015
 * Time: 13:38
 */
include 'connect.php';
session_start();

// Display any errors
if(!$conn){ die("Connection failed: " . mysqli_error($conn));}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$comment = $_GET['comment'];

$sql = "DELETE FROM Comments WHERE commentID='" . $comment . "';";

$results = mysqli($conn, $sql);

mysqli_close($conn);

header("Location: adventure.php?adv=" . $advid . "#comments");

?>