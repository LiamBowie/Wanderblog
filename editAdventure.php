<?php

include'connect.php';

//GET VALUES FOR INPUT
    $photo = $_POST['photo'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $location = $_POST['location'];
    $adv = $_GET['adv'];

//GET AUTHOR ID FROM CURRENT USER
    $authQuery = "SELECT authorID FROM Author WHERE userID = '" . $_SESSION['username'] . "';";
    $authResults = mysqli_query($conn, $authQuery);
    $authRow = mysqli_fetch_array($authResults);
    $authID = $authRow['authorID'];
    echo $authQuery;

$updateQuery = "
    UPDATE Adventure
    SET photo = '" . $photo . "'
    SET title = '" . $title . "'
    SET content = '" . $content . "'
    SET location = '" . $location . "'
    WHERE advID = '" . $adv . "'
";

$results = mysqli_query($conn, $updateQuery);
echo $updateQuery;
mysqli_close($conn);

header("Location: adventure.php?adv=" . $advID);

