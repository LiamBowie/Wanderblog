<!DOCTYPE html>
<html lang="en">
<head>
    <title>Author Search</title>
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
    <?php include'connect.php'; ?>
    <style>

        .col-sm-12{
            /* background-color: #19BEF0; */
        }

        .thumbnail{
            background-color: #2f2f2f;
            border: none;
            height: 80%;
            width: 80%;

        }

        .jumbotron{
            background-color: #19BEF0;
        }


        /*on small screens, set height to 'auto' for sidenav and grid*/
        @media screen and (max-width: 767px){
            .sidenav{
                height: auto;
                padding; 15px;
            }
            .row.content {height: auto;}
        }

        html, body {
            height: 100%;
        }
        footer{
            position: absolute;
        }
    </style>
</head>
<body style="padding-top: 0">

<?php include 'navbar.php'; ?>

<?php
    include 'connect.php';
    $criteria = $_POST['crit'];
    $colmSearch = $_POST['select'];
        if($colmSearch == 'firstName'){
            $query = "  SELECT CONCAT(User.firstName, ' ', User.lastName) AS fullName, User.firstName, Author.photo, User.userID, Author.authorID
                    FROM Author
                    LEFT JOIN User
                    ON  Author.userID=User.userID
                    WHERE User.firstName = '" . $criteria . "'
                    OR User.lastName = '" . $criteria . "'
                    OR CONCAT(User.firstName, ' ', User.lastName) = '" . $criteria . "'
                    OR User.userID = '" . $criteria . "'
                    ;" ;
        }
        else if($colmSearch == 'author') {
            $query = "Select Adventure.photo, Adventure.title, CONCAT(User.firstName, ' ', User.lastName) AS fullName, User.firstName, User.userID, Author.authorID, Adventure.advID
            FROM Adventure
            LEFT JOIN Author
            ON Adventure.author = Author.authorID
            LEFT JOIN User
            ON Author.userID = User.userID
            WHERE User.firstName = '" . $criteria . "'
                    OR User.lastName = '" . $criteria . "'
                    OR CONCAT(User.firstName, ' ', User.lastName) = '" . $criteria . "'
                    OR User.userID = '" . $criteria . "'
                    ;";
        }
        else if($colmSearch == 'advID'){
            $query = "Select Adventure.photo, Adventure.title, Adventure.advID
            FROM Adventure
            WHERE title LIKE '%" . $criteria . "%'
                    ;";
        }

    $results=mysqli_query($conn, $query);
    $found = false;
?>

<div class="jumbotron text-center">
    <p>Search</p>
    <?php include'searchArea.php' ?>
</div>

    <div class="container-fluid text-center">
        <div class="col-sm-12 text-left" style='padding-left: 25px; padding-right: 25px; background-image: url("https://upload.wikimedia.org/wikipedia/commons/5/5b/Middle-earth.svg");'>
            <?php echo "<h2>Displaying results for " . $_POST['crit'] . "</h2>" ?>
            <div class="container">
                <div class="row">
                    <!-- LOOP THROUGH AND OUTPUT FOLLOWING PER EACH -->
                        <?php
                            if($colmSearch == 'firstName') {
                                if (mysqli_num_rows($results) > 0) {
                                    while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                                        $path = "author.php?auth=" . $row['authorID'];
                                        echo '<div class="col-sm-4" >';
                                        echo '<a href = "' . $path . '" class="thumbnail text-center" >';
                                        echo '<img src = "' . $row['photo'] . '" >';
                                        echo '<p style = "color:#ffffff;" > ' . $row['fullName'] . ' </p >';
                                        echo '</a >';
                                        echo '</div >';
                                    }
                                }
                                else{ echo "Your search returned 0 results"; }
                            }
                            else{
                                if (mysqli_num_rows($results) > 0) {
                                    while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                                        $path = "adventure.php?adv=" . $row['advID'];
                                        echo '<div class="col-sm-4" >';
                                        echo '<a href = "' . $path . '" class="thumbnail text-center" >';
                                        echo '<img src = "' . $row['photo'] . '" >';
                                        echo '<p style = "color:#ffffff;" > ' . $row['title'] . ' </p >';
                                        echo '</a >';
                                        echo '</div >';
                                    }
                                }
                                else{ echo "Your search returned 0 results"; }
                            }
                        ?>
                    <!-- END LOOP -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<footer class="container-fluid bg-4 text-center" style="background-color: #2f2f2f; padding: 20px; ">
    <p style="color: #ffffff;">Wanderblog is a part of SHB Innovative Solutions</p>
</footer> -->
</body>


</html>
