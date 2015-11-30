<?php
$output="";
//if(isset($_SESSION['loggedIn'])) {
    $output += $_SESSION['FullName'];
    $output += $_SESSION['LoggedIn'];
//}
//else{
  //  $output = $output . "No user detected";
//}
echo $output;
