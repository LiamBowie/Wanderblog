<?php
    include'connect.php';

    $query = "SELECT title FROM adventure WHERE author = '" . $_GET['auth'] . "';";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);

    if (mysqli_num_rows($results) > 0){
        while ($row = mysqli_fetch_array($resultsTwo)) {
            echo "Adventure: " . $row['title'];
        }
    }
    else{ echo "No adventures"; }