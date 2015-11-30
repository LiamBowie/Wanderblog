<?php
$output="Not begun";
if($_SESSION['loggedIn']==true) {
    $output += $_SESSION['FullName'];
    $output += $_SESSION['LoggedIn'];
}
else{
    $output = $output . "No user detected";
}
echo $output;
