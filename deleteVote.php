<?php
/**
 * Created by PhpStorm.
 * User: Liam
 * Date: 18/12/2015
 * Time: 16:52
 */
include 'connect.php';
// Display any errors
if(!$conn){ die("Connection failed: " . mysqli_error($conn));}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$adventure = $_GET['adv'];

$sqlAdv = "UPDATE Adventure
           SET numVotes=numVotes-1
           WHERE advID = '$adventure';
           ";

$resultsAdv = mysqli_query($conn, $sqlAdv);

mysqli_close($conn);

header("Location: adventure.php?adv=" . $adventure);
?>