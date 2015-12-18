<?php
include'connect.php';

$task = $_GET['task'];
$username = $_GET['user'];

$query = "SELECT * FROM Authorise WHERE userID ='" . $username . "';";
$results = mysqli_query($conn, $query);

if($task == 'NO'){
    //REMOVE FROM Authorise WHERE userID = username
    $queryThree = "DELETE FROM Authorise WHERE userID ='" . $username . "';";
    $resultsThree = mysqli_query($conn, $queryThree);
    mysqli_close($conn);
    header("Location: index.php?error=deleted&user=" . $username);
}

else if($task == 'OK'){
    //GET ALL DATA AND ADD TO User
    while($row = mysqli_fetch_array($results)){
        echo $username;
        $queryTwo = "INSERT INTO User VALUES('" . $username . "', '" . $row['password'] . "', '" . $row['firstName'] . "', '" . $row['lastName'] . "', '" . $row['emailAddress'] . "', 0);";
        if ($_POST['authorCheck'] == 1) {
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
        $queryFour = "DELETE FROM Authorise WHERE userID= '" . $username . "';";
        $resultsTwo = mysqli_query($conn, $queryTwo);
        echo "query4: " . $queryFour;
        $resultsFour =  mysqli_query($conn, $queryFour);
        mysqli_close($conn);
       header("Location: index.php?error=added&user=" . $username);
    }
}