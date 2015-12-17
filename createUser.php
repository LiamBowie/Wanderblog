<?php
    include'connect.php';

    $operation=$_GET['operation'];

    if($operation=='create') {

        $found = false;
        $query = 'SELECT * FROM Author';
        $results = mysqli_query($conn, $query);
        $last = "";
        if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
            while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                $last = $row['authorID'];
            }
        }
        $lastArray = str_split($last);
        $lastNum = (int)$lastArray[8];
        $newNum = $lastNum + 1;
        $newID = "";
        for ($i = 0; $i < 8; $i++) {
            $newID = $newID . $lastArray[$i];
        }
        $newID = $newID . $newNum;

        if ($_POST['passwordconfirm'] == $_POST['password']) {

            $username = $_POST['userID'];
            $sql = "INSERT INTO User VALUES('" . $username . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', 0);";

            $results = mysqli_query($conn, $sql);

            if ($_POST['authorCheck'] == 1) {
                $photo = "Images/blankAuth.png";
                $sqlTwo = "INSERT INTO Author VALUES('" . $newID . "', '" . $username . "', '" . $photo . "', '" . $username . " is a new author to Wanderblog', 'LO00000');";
                $resultsTwo = mysqli_query($conn, $sqlTwo);
            }

            mysqli_close($conn);

            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $_POST['password'];

            header("Location: login.php?operation==REGIN");
        } else {
            echo "Passwords did not match";
        }
    }

    else if($operation == 'delete'){
        session_start();
        $query="DELETE FROM User WHERE userID='" . $_SESSION['username'] . "';";
        $results = mysqli_query($conn, $query);
        mysqli_close($conn);
        session_destroy();
        header("Location: welcome.php");
    }
