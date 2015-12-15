<?php
    include'connect.php';


$query = "SELECT * FROM adventure WHERE author = '" . $_GET['auth'] . "';";

// Creates result table from query
$results = mysqli_query($conn, $query);


// Gets the row from the created table above
$row = mysqli_fetch_array($results);
echo $row['title'];
/*
if (mysqli_num_rows($results) > 0){
    while ($row = mysqli_fetch_array($results) != 0){
        echo  $row['title'];
    }
} */

//while ($row = mysqli_fetch_array($result2, MYSQLI_BOTH))