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

            $sql = "INSERT INTO User (userID, password, firstName, lastName, email, isAdmin) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssi", $username, $password, $firstName, $lastName, $email, $isAdmin);

            $username = $_POST['userID'];
            $password = $_POST['password'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $isAdmin = 0;

            $stmt->execute();
            $stmt->close();

            if ($_POST['authorCheck'] == 1) {

                $sqlTwo = "INSERT INTO Author (authorID, userID, photo, bio, location) VALUES (?, ?, ?, ?, ?)";
                $stmtTwo = $conn->prepare($sqlTwo);
                $stmtTwo->bind_param("sssss", $author, $user, $photo, $bio, $location);

                $author = $newID;
                $user = $username;
                $photo = "Images/blankAuth.png";
                $bio = $username . " is a new author to Wanderblog";
                $location = "LO00000";

                $stmtTwo->execute();
                $stmtTwo->close();

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
        session_start();                                                                        //include all previously set Session data
        if($_SESSION['isAuthor'] == true){                                                      //if session indicates user as an author
            $queryTwo = "DELETE FROM Author WHERE userID='" . $_SESSION['username'] . "';";     //set query to delete from author
            $resultsTwo=mysqli_query($conn, $queryTwo);                                         //execute query
        }                                                                                       //end if
        $query="DELETE FROM User WHERE userID='" . $_SESSION['username'] . "';";                //set query to delete from user
        $results = mysqli_query($conn, $query);                                                 //execute query
        mysqli_close($conn);                                                                    //close the connection
        session_destroy();                                                                      //destroy the session
        header("Location: welcome.php");                                                        //navigate to Welcome.php
    }

//IF OPERATION IS NOT SET
    else{ echo "An issue has been detected. Please contact the Site Administrator."; }
