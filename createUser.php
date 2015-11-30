<?php
    include'connect.php';

    if($_POST['passwordconfirm'] == $_POST['password']) {
        if($_POST['authorCheck'] == 1){ $author =1; }
        else{ $author = 0; }

        $username = $_POST['userID'];

        $sql = "INSERT INTO User VALUES('" . $username . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "'," . $author . ");";

        $results = mysqli_query($conn, $sql);
        mysqli_close($conn);

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $_POST['password'];

        header("Location: login.php?operation=REGIN");

    }
    else{ echo "Passwords did not match"; }
