<?php
    include'connect.php';

    $operation=$_GET['operation'];

// TO CREATE A NEW USER
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
            if($_POST['authorCheck'] == 1){ $_SESSION['isAuthor'] = true; }

            header("Location: login.php?operation==REGIN");
        } else {
            echo "Passwords did not match";
        }
    }

// TO DELETE A CURRENT USER
    else if($operation == 'delete'){
        echo "1";
        session_start();                                                                        //include all previously set Session data
        echo "2";
        if($_SESSION['isAuthor'] == true){                                                      //if session indicates user as an author
            echo"2.1";
            $queryTwo = "DELETE FROM Author WHERE userID='" . $_SESSION['username'] . "';";     //set query to delete from author
            echo"2.2";
            $resultsTwo=mysqli_query($conn, $queryTwo);                                         //execute query
        }                                                                                       //end if
        echo "3";
        $query="DELETE FROM User WHERE userID='" . $_SESSION['username'] . "';";                //set query to delete from user
        echo "4";
        $results = mysqli_query($conn, $query);                                                 //execute query
        echo"5";
        mysqli_close($conn);                                                                    //close the connection
        echo "6";
        session_destroy();                                                                      //destroy the session
        //header("Location: welcome.php");                                                        //navigate to Welcome.php
    }

//IF OPERATION IS NOT SET
    else{ echo "An issue has been detected. Please contact the Site Administrator."; }
