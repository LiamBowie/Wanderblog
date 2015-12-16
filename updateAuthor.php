<?php
    include'connect.php';

    $author = $_GET['auth'];

    $queryTwo="
            UPDATE Author
            SET bio='Trying this'
            WHERE authorID='" . $author . "';
    ";
    $resultsTwo = mysqli_query($conn, $queryTwo);
    mysqli_close($conn);
    header("Location: author.php?auth=" . $_GET['auth'] . "");