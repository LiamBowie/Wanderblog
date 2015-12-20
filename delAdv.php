<?php
include'connect.php';
if(!$conn){ die("Connection failed: " . mysqli_error($conn));}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$adventure = $_GET['adv'];

$delComments = "DELETE FROM Comments WHERE advID = '" . $adventure . "';";
$delVotes = "DELETE FROM Votes WHERE advID = '" . $adventure . "'; ";
$delAdv = "DELETE FROM Adventure WHERE advID = '" . $adventure . "'; ";
//$resultsDel = mysqli_query($conn, $queryDel);
mysqli_query($conn, $delComments);
mysqli_query($conn, $delVotes);
mysqli_query($conn, $delAdv);
mysqli_close($conn);

//echo $queryDel;

if(!$conn){ die("Connection failed: " . mysqli_error($conn));}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//header("Location: index.php?error=advdeleted");