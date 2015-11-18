<?php
    include'connect.php';

    if($_POST['passwordconfirm'] == $_POST['password']) {
        if($_POST['authorCheck'] == 1){ $author =1; }
        else{ $author = 0; }

        $sql = "INSERT INTO User VALUES('" . $_POST['$userID'] . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "'," . $author . ");";

        $results = mysqli_query($conn, $sql);
        mysqli_close($conn);

        header("Location: user.php?u=" . $_POST['userID']);

    }
    else{ echo "Passwords did not match"; }
