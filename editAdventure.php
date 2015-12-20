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

$updatePhoto = " UPDATE Adventure SET photo = '" . $photo . "' WHERE advID = '" . $adv . "';";
$updateTitle = " UPDATE Adventure SET title = '" . $title . "' WHERE advID = '" . $adv . "';";
$updateContent = " UPDATE Adventure SET content = '" . $content . "' WHERE advID = '" . $adv . "';";
$updateLoc = " UPDATE Adventure SET location = '" . $location . "' WHERE advID = '" . $adv . "';";

$results = mysqli_query($conn, $updatePhoto);
$results1 = mysqli_query($conn, $updateTitle);
$results2 = mysqli_query($conn, $updateContent);
$results3 = mysqli_query($conn, $updateLoc);

echo $updatePhoto . "<br>" . $updateTitle . "<br>" . $updateContent . "<br>" . $updateLoc . "<br>";
mysqli_close($conn);

header("Location: adventure.php?adv=" . $adv);

