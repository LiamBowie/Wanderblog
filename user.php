<html>
    <head>
        <title>New Adventure</title>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include 'connect.php';
        ?>
    </head>

    <body>
        <?php
        // Send query to db
        $query = "SELECT * FROM User";
        $results = mysqli_query($conn, $query);

        // Output results
        $output="";
        if(mysqli_num_rows($results)>0){
            while($row = mysqli_fetch_array($results)) {
                $output = $output . "userID: " . $row['userID'] . "<br>" . "Password: " . $row['password'] . "<br>" . "firstName: " . $row['firstName'] . "<br>" . "email: " . $row['emailAddress'] . "<br>";
            }
            echo $output;
        }
        else {
            echo "0 results" . "<br>";
        }
        ?>
    </body>
</html>