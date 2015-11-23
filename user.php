<html>
    <head>
        <?php session_start(); ?>
        <title>Created User</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!--Link to personal Stylesheet-->
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="Images/earth.ico">
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include 'connect.php';
        ?>
    </head>

    <body>

    <?php
        if (isset($SESSION)){
            include'navbar-login.php';
        }
        else{
            include'navbar-standard.php';
        }
    ?>


        <?php
            // Send query to db
            if($_GET['u']=='unknown'){ $query = "Select CONCAT(firstName, \" \", lastName) AS FullName, userID, emailAddress, isAdmin FROM User;"; }
            else{ $query = "Select CONCAT(firstName, \" \", lastName) AS FullName, userID, emailAddress, isAdmin FROM User WHERE userID='" . $_GET['u'] . "';"; }
            $results = mysqli_query($conn, $query);

            // Output results
            $output="<br><br><br><br>";
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