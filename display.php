<?php
$output="";
//if(isset($_SESSION['loggedIn'])) {
    $output = $output . "User: " . $_SESSION['FullName'] . "<br>" . "Logged In: " . $_SESSION['loggedIn'];

//}
//else{
  //  $output = $output . "No user detected";
//}
echo $output;
