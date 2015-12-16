<?php
    include'connect.php';
    $queryTwo="
            UPDATE Author
            SET bio='" . $_POST['bio'] . "'
            WHERE authorID='" . $_GET['auth'] ."';
    ";
    $resultsTwo = mysqli_query($conn, $queryTwo);
    mysqli_close($conn);
    header("Location: author.php?auth='" . $_GET['auth'] . "'");