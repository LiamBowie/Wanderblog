<?php
    include'connect.php';
    $queryTwo="
            UPDATE Author
            SET bio='Hello'
            WHERE authorID='AUTH00001';
    ";
    $resultsTwo = mysqli_query($conn, $queryTwo);
    mysqli_close($conn);
    header("Location: author.php?auth=" . $_GET['auth'] . "");