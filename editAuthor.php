<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php
        echo $row['fullName'];
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type=text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Personal links -->
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/earth.ico">
    <script type="text/javascript" src="script.js"></script>

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body style="padding-top: 75px;" data-spy="scroll" data-target=".sticky-sidebar" data-offset="50">

<?php include'navbar.php'; ?>

<?php
session_start();
include 'connect.php';

// Your query for SQL
$query = "  SELECT CONCAT(User.firstName, ' ', User.lastName) AS fullName, Author.bio, Author.photo, Cities.cityName, Countries.countryName, User.userID
                FROM Author
                LEFT JOIN User
                ON  Author.userID=User.userID
                LEFT JOIN Locations
                ON Author.location=Locations.locationID
                LEFT JOIN Cities
                ON Locations.cityID=Cities.cityID
                LEFT JOIN Countries
                ON Locations.countryID=Countries.countryID
                WHERE authorID = '" . $_GET['auth'] . "';" ;

// Creates result table from query
$results = mysqli_query($conn, $query);

// Gets the row from the created table above
$row = mysqli_fetch_array($results);

function saveChanges(){
    global $conn;
    $queryTwo="
        UPDATE Author
        SET bio='" . $_POST['bio'] . "'
        WHERE authorID='" . $_GET['auth'] ."';
    ";
    $resultsTwo = mysqli_query($conn, $queryTwo);
    mysqli_close($conn);
    header("Location: author.php?auth='" . $_GET['auth'] . "'");
}


?>
<form id="changes" action="updateAuthor.php?auth='<?php $_GET['auth'] ?>'" method="post">
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <img src= "<?php echo $row['photo'] ?>" class="img-thumbnail img-responsive img-profile" alt="Author Photo">
                <h5>
                    <span class="glyphicon glyphicon-map-marker"></span>
                    <?php echo $row['fullName']?> from <?php echo $row['cityName'] ?>, <?php echo $row['countryName'] ?>
                </h5>
                <nav class="sticky-sidebar">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#bio">Author Bio</a></li>
                        <li><a href="#adventures">Adventures</a></li>
                    </ul><br>
                </nav>
            </div>


            <div class="col-sm-9">
                <div class="row">
                    <?php echo "<h2> . " .  $row['fullName'] . "</h2>" ?>
                </div>
                <hr>
                <?php echo "<p><input type='text' name='bio' value='" . $row['bio'] . "'></p>" ?>
                <br><br>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-block btn-success">
                        <span class="glyphicon glyphicon-ok"></span>Save
                    </button>
                    <button type="submit" class="btn btn-danger btn-block">
                        <span class="glyphicon glyphicon-remove"></span> Cancel
                    </button>
                </div>
            </div>

        </div>
    </div>
</form>


<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
