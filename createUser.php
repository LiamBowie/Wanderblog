<?php
    //if($_POST['passwordconfirm'] == $_POST['password']){
    //$sql= "INSERT INTO User VALUES(" . "'" . $_POST['userID'] . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', 0);";
    $sql = "INSERT INTO User VALUES('beattiejo1', 'Welcome1', 'Jo', 'Beattie', 'beattiejo1@gmail.com', '0');";
    $results=mysqli_query($conn, $sql);
    header("Location: user.php?u=unknown");
    //}
?>