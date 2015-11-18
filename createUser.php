<?php
    include'connect.php';

    if($_POST['passwordconfirm'] == $_POST['password']){
            if($POST['userID'] != '') {

                $sql = "INSERT INTO User VALUES('" . $_POST['$userID'] . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', 0);";

                $results = mysqli_query($conn, $sql);
                mysqli_close($conn);

                header("Location: user.php?u=" . $_POST['userID']);
            }
            else{ echo "Please insert a username";}
    }
    else{ echo "Passwords did not match"; }
