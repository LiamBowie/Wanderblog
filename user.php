<html>
    <head>
        <title>Created User</title>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include 'connect.php';
        ?>
    </head>

    <body>
    <?php include'navbar-standard.php'; ?>
        <?php
            // Send query to db
            if($_GET['u']=='unknown'){ $query = "Select CONCAT(firstName, \" \", lastName) AS FullName, userID, emailAddress, isAdmin FROM User;"; }
            else{ $query = "Select CONCAT(firstName, \" \", lastName) AS FullName, userID, emailAddress, isAdmin FROM User WHERE userID='" . $_GET['u'] . "';"; }
            $results = mysqli_query($conn, $query);

            // Output results
            $output="";
            if(mysqli_num_rows($results)>0){
                while($row = mysqli_fetch_array($results)) {
                    $output = $output . "Name: " . $row['FullName'] . "<br>" . "userID: " . $row['userID'] . "<br>" . "Email: " . $row['emailAddress'] . "<br>" . "<br>";
                }
                echo $output;
            }
            else {
                echo "0 results" . "<br>";
            }
        ?>
    </body>
</html>