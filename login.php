<?php
/*PHP FOR LOGIN */
		include 'connect.php';
		$tryUsername = $_POST['usernameInput'];
		$tryPassword = $_POST['passwordInput'];
		$found = false;
		$query="SELECT * FROM User;";
		$results=mysqli_query($conn, $query);

		if(mysqli_num_rows($results)>0) { /* if there are results (rows>0) */
            while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                if($tryUsername==$row['userID'] && $tryPassword==$row['password']){
                    $found=true;
                    $username=$tryUsername;
                    session_start();
                    $_SESSION['username']=$username;
                    $_SESSION['access_level']='standard_user';
                    header("Location: user.php?u=" . $_SESSION['username']);
                }
            }
        }
        else{echo'login failed'; }

	?>