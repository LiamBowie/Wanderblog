<?php
$x=$_GET['x'];

    if($x=='IN') {
        include 'connect.php';
        $tryUsername = $_POST['usernameInput'];
        $tryPassword = $_POST['passwordInput'];
        $found = false;
        $query = 'Select CONCAT(firstName, " ", lastName) AS FullName, userID, emailAddress, isAdmin FROM User;';
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
            while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                if ($tryUsername == $row['userID'] && $tryPassword == $row['password']) {
                    $found = true; //to jump out the loop
                    $loggedIn=true;
                    session_start();
                    $_SESSION['username'] = $tryUsername;
                    $_SESSION['FullName'] = $row['FullName'];
                    $_SESSION['access_level'] = 'standard_user';
                    header("welcometest.php");
                }
            }
        } else {} //do nothing
    }

    else if($x=='OUT'){
        session_destroy();
        $loggedIn=false;
        header("Location: welcometest.php");
    }

    else{ $loggedIn=false; } //do nothing

