<?php
    // SQL Variables for connection
        $servername = 'eu-cdbr-azure-north-d.cloudapp.net';
        $dbusername = 'b5b914ecf97d5c';
        $password = 'ff9cd70a';
        $dbname = 'SHBWanderBlog';

    // Connect to DB
        $conn = mysqli_connect($servername, $dbusername, $password, $dbname);

    // Display any errors
        if(!$conn){ die("Connection failed: " . mysqli_error($conn));}

        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);
?>
