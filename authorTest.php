<?php
    include'connect.php';

    $query = "SELECT * FROM adventure WHERE author = '" . $_GET['auth'] . "';";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);

    if (mysqli_num_rows($results) > 0){
        echo "Adventure Found";
        while ($row = mysqli_fetch_array($results)) {
            echo "Adventure: ";
        }

    }
    else{ echo "No Adventures Found"; }