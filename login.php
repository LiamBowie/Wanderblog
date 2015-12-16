<?php

//show any errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$operation=$_GET["operation"];

    if($operation=="IN") {
        include 'connect.php';
        $tryUsername = $_POST['usernameInput'];
        $tryPassword = $_POST['passwordInput'];
        $found = false;
        $query = 'Select CONCAT(firstName, " ", lastName) AS FullName, userID, emailAddress, password, isAdmin FROM User;';
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
            while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                if ($tryUsername == $row['userID'] && $tryPassword == $row['password']) {
                    $found = true; //to jump out the loop
                    session_start(); //include any previous session
                    session_destroy(); //drop any previous data
                    session_start(); //setup fresh session
                    $_SESSION['username'] = $tryUsername;
                    $_SESSION['FullName'] = $row['FullName'];
                    $_SESSION['access_level'] = 'standard_user';
                    $_SESSION['loggedIn'] = true;
                    header("Location: welcome.php");
                }else{ header("Location: welcome.php?error=noUser"); }
            }
        }
    }

    else if($operation=="OUT"){
        session_start();
        session_destroy();
        header("Location: welcome.php");
        echo 'Logged Out';
    }

    else if($operation="REGIN"){
        include 'connect.php';
        session_start(); //pull through existing data
        $tryUsername = $_SESSION['username'];
        $tryPassword = $_SESSION['password'];
        $found = false;
        $query = 'Select CONCAT(firstName, " ", lastName) AS FullName, userID, emailAddress, password, isAdmin FROM User;';
        $results = mysqli_query($conn, $query);

        if (mysqli_num_rows($results) > 0) { /* if there are results (rows>0) */
            while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                if ($tryUsername == $row['userID'] && $tryPassword == $row['password']) {
                    $found = true; //to jump out the loop
                    session_start(); //include any previous session
                    session_destroy(); //drop any previous data
                    session_start(); //setup fresh session
                    $_SESSION['username'] = $tryUsername;
                    $_SESSION['FullName'] = $row['FullName'];
                    $_SESSION['access_level'] = 'standard_user';
                    $_SESSION['loggedIn'] = true;
                    if(isset($_SESSION['authID'])){header("Location: author.php?auth=" . $_SESSION['authID'] );}
                    header("Location: welcome.php");
                }
            }
        } else {} //do nothing
    }

    else{ echo "error detected. Please contact the site administrator"; } //do nothing

