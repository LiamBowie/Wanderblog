<?php
include'connect.php';

$adventure = $_GET['adv'];

$queryDel = "
                DELETE FROM Comments
                WHERE advID = '" . $adventure . "';
                DELETE FROM Votes
                WHERE advID = '" . $adventure . "';
                DELETE FROM Adventure
                WHERE advID = '" . $adventure . "';
        ";

mysqli_query($conn, $queryDel);
mysqli_close($conn);

echo $queryDel;

if(!$conn){ die("Connection failed: " . mysqli_error($conn));}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//header("Location: index.php?error=advdeleted");