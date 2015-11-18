<?php
    include'connect.php';
    //if($_POST['passwordconfirm'] == $_POST['password']){
    $userID =  mysqli_real_escape_string($_POST['userID']);
    //$sql= "INSERT INTO User VALUES(" . "'" . $userID . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', 0);";
    $sql = "INSERT INTO User VALUES('jordannorman', 'Welcome1', 'Jo', 'Beattie', 'beattiejo1@gmail.com', '0');";
    $results=mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: user.php?u=" . $_POST['userID']);
    //}
?>