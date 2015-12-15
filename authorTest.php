<?php
    include'connect.php';


$query = "SELECT * FROM adventure WHERE author = '" . $_GET['auth'] . "';";
$results = mysqli_query($conn, $query);
$row = mysqli_fetch_array($results);
$found = false;


if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
    while (($row = mysqli_fetch_array($results)) && ($found == false)) {
        echo $row['title']  . "<br>";
    }
}