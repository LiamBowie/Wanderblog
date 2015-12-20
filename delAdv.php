<?php
include'connect.php';

$adventure = $_GET['adv'];

$queryDel = "
                DELETE FROM Comments
                WHERE advID = '" . $adventure . "';
                DELETE FROM Votes
                WHERE advID = '" . $adventure . "';
                DELETE FROM Adventure
                WHERE advID = '" . $adventure . "';
        ";

mysqli_query($conn, $queryDel);
mysqli_close($conn);

echo $queryDel;

//header("Location: index.php?error=advdeleted");