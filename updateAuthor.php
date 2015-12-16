<?php
    include'connect.php';

    $author = $_GET['auth'];
    $bio = $_POST['bio'];

    $queryTwo="
            UPDATE Author
            SET bio='" . $bio . "'
            WHERE authorID='" . $author . "';
    ";
    $resultsTwo = mysqli_query($conn, $queryTwo);
    mysqli_close($conn);
    header("Location: author.php?auth=" . $_GET['auth'] . "");