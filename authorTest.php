<?php
    include'connect.php';

    $query = "SELECT * FROM adventure WHERE author = '" . $_GET['auth'] . "';";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);

    if (mysqli_num_rows($results) > 0){
        echo "Adventure Found \n";
        for($i=0; $i< mysqli_num_rows($results); $i++ ) {
            echo "Adventure: " . $row['title'];
        }

    }
    else{ echo "No Adventures Found"; }