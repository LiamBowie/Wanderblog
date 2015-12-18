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
        $queryTwo = "INSERT INTO User VALUES('" . $username . "', '" . $row['password'] . "', '" . $row['firstName'] . "', '" . $row['lastName'] . "', '" . $row['emailAddress'] . "', 0');";
       echo "query2: " . $queryTwo;
        $queryFour = "DELETE FROM Authorise WHERE userID= '" . $username . "';";
        $resultsTwo = mysqli_query($conn, $queryTwo);
        $resultsFour =  mysqli_query($conn, $queryFour);
        mysqli_close($conn);
        header("Location: index.php?error=added&user=" . $username);
    }
}