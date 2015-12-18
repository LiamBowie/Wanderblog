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
            background-color: #19BEF0;
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
    </style>
</head>
<body style="padding-top: 75px;">

<?php include 'navbar.php'; ?>

<?php
    include 'connect.php';
    $criteria = $_POST['crit'];
    $colmSearch = $_POST['select'];
    $query="Select * FROM Adventure WHERE " . $colmSearch . " = '" . $criteria . "'; ";
    $results=mysqli_query($conn, $query);
    $found = false;
    echo "SEACRH: " . $colmSearch .  " FOR: " . $criteria;
    echo "\n" . "Select * FROM Adventure WHERE " . $colmSearch . " = '" . $criteria . "'; ";
?>

<div class="jumbotron text-center">
    <form class="form-inline">
        <input type="search" class="form-control" size="50" placeholder="Filter your search further">
        <select class="form-control">
            <option value="tag">Tag</option>
            <option value="authorname">Author Name</option>
            <option value="location">Location</option>
        </select>
        <button type="button" class="btn btn-danger">Search</button>
    </form>

    <div class="container-fluid text-center">
        <div class="col-sm-12 text-left" style="padding-left: 25px; padding-right: 25px">
            <?php echo "<h2 style = 'color:#ffffff;'>Displaying results for " . $_POST['crit'] . "</h2>" ?>
            <div class="container">
                <div class="row">
                    <!-- LOOP THROUGH AND OUTPUT FOLLOWING PER EACH -->
                        <?php
                            if (mysqli_num_rows($results) > 0) {
                                while (($row = mysqli_fetch_array($results)) && ($found == false)) {
                                    echo '<div class="col-sm-4" >';
                                        echo '<a href = "#" class="thumbnail text-center" >';
                                            echo '<img src = "' . $row['photo'] . '" >';
                                            echo '<p style = "color:#ffffff;" > ' . $row['title'] . ' </p >';
                                        echo '</a >';
                                    echo '</div >';
                                }
                            }
                        ?>
                    <!-- END LOOP -->
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid bg-4 text-center" style="background-color: #2f2f2f; padding: 20px; ">
    <p style="color: #ffffff;">Wanderblog is a part of SHB Innovative Solutions</p>
</footer>
</body>


</html>
