<?php
    include'connect.php';

    $operation=$_GET['operation'];

// TO CREATE A NEW USER
    if($operation=='create') {
        include'connect.php';
        if ($_POST['passwordconfirm'] == $_POST['password']) {

            $username = $_POST['userID'];
            $author = $_POST['authorCheck'];
            $sql = "INSERT INTO Authorise VALUES('" . $username . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', " . $author . ");";

            $results = mysqli_query($conn, $sql);

            /*
            if ($_POST['authorCheck'] == 1) {
                header("Location: createUser.php?operation=author");
            } */

            echo $sql;

            mysqli_close($conn);

            /*
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $_POST['password'];
            if($_POST['authorCheck'] == 1){ $_SESSION['isAuthor'] = true; }
            else{$_SESSION['isAuthor'] = true;} */

            //header("Location: login.php?operation=REGIN");
            header("Location: index.php?error=Registered");
        } else {
            echo "Passwords did not match";
        }
    }

// TO DELETE A CURRENT USER
    else if($operation == 'delete'){
        session_start();                                                                        //include all previously set Session data
        if($_SESSION['isAuthor'] == true){                                                      //if session indicates user as an author
            $queryTwo = "DELETE FROM Author WHERE userID='" . $_SESSION['username'] . "';";     //set query to delete from author
            $resultsTwo=mysqli_query($conn, $queryTwo);                                         //execute query
        }                                                                                       //end if
        $query="DELETE FROM User WHERE userID='" . $_SESSION['username'] . "';";                //set query to delete from user
        $results = mysqli_query($conn, $query);                                                 //execute query
        mysqli_close($conn);                                                                    //close the connection
        session_destroy();                                                                      //destroy the session
        header("Location: index.php");                                                        //navigate to Welcome.php
    }

//IF OPERATION IS TO CREATE AUTHOR
    if ($operation = "author") {
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

        if($newNum>9){ $length = 7; }
        else if($newNum>99){ $length = 6;}
        else{$length=8;}

        $newID = "";
        for ($i = 0; $i < $length; $i++) {
            $newID = $newID . $lastArray[$i];
        }
        $newID = $newID . $newNum;

        $photo = "Images/blankAuth.png";
        $sqlTwo = "INSERT INTO Author VALUES('" . $newID . "', '" . $username . "', '" . $photo . "', '" . $username . " is a new author to Wanderblog', 'LO00000');";
        $resultsTwo = mysqli_query($conn, $sqlTwo);
    }

//IF OPERATION IS NOT SET
    else{ echo "An issue has been detected. Please contact the Site Administrator."; }
