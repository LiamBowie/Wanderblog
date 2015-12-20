<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <title>Adventure</title>
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
    include 'connect.php';
    $query = "
        SELECT Adventure.title, CONCAT(User.firstName, ' ', User.lastName) AS authorName, Adventure.author, Adventure.content, Adventure.photo, Adventure.numVotes, Cities.cityName, User.userID
        FROM Adventure
        LEFT JOIN Author
        ON Adventure.author=Author.authorID
        LEFT JOIN User
        ON Author.userID=User.userID
        LEFT JOIN Locations
        ON Adventure.location=Locations.locationID
        LEFT JOIN Cities
        ON Locations.cityID=Cities.cityID
        WHERE advID = '". $_GET['adv'] . "';
    ";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
    $authorPath= "'author.php?auth=" . $row['author'] . "'";


    $adminQuery = "SELECT * FROM User WHERE userID='" .$_SESSION['username']  . "';";
    $adminResults = mysqli_query($conn, $adminQuery);
    $adminRow = mysqli_fetch_array($adminResults);

    function showDelete($commentID, $commentUser)
    {
        global $row;
        global $adminRow;
        $advID = $_GET['adv'];
        if($_SESSION['username'] == $row['userID'] || $_SESSION['username'] == $commentUser || $adminRow['isAdmin'] == 1)
        {
            echo "<form action='deleteComment.php?adv=$advID&comment=$commentID' method='POST'>";
            echo    "<button class='btn btn-danger' type='submit'>DELETE</button>";
            echo "</form>";
        }
    }

$numVotes = $row['numVotes'];
?>
<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4 class="text-center"><?php echo $row['cityName'] ?></h4>
            <img src= "<?php echo $row['photo']; ?>" class="img-thumbnail img-responsive" alt="Adventure Photo">
            <h5><span class="glyphicon glyphicon-time"></span> Post by <a href=<?php echo $authorPath; ?> > <?php echo $row['authorName'] ?></a></h5>
            <nav class="sticky-sidebar">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#desc">Adventure Description</a></li>
                    <li><a href="#comments">Comments</a></li>
                </ul><br>
            </nav>
        </div>



        <div class="col-sm-9">
            <h2 id="desc" class="anchor">
                <?php
                    echo $row['title'];
                ?>
                <form role="form" action="addVote.php?adv=<?php echo $_GET['adv']?>" method="POST">
                    <?php
                        $votingQuery = "
                        SELECT * FROM Votes
                        WHERE advID = '" . $_GET['adv'] . "';
                        ";
                        $votingResults = mysqli_query($conn, $votingQuery);
                        $votingRow = mysqli_fetch_array($votingResults);


                        $found=false;

                        while (($votingRow = mysqli_fetch_array($votingResults)) && ($found==false))
                        {
                            if($_SESSION['username'] == $votingRow['userID'])
                            {
                                $found = true;
                                echo "<button disabled=\"disabled\" class=\"btn btn-success\">Voted</button>";
                            }
                        }

                        if($found==false)
                        {
                            if($_SESSION['username'] == null || $_SESSION['username'] == $row['userID'])
                            {
                                echo "<button disabled=\"disabled\" class=\"btn btn-info\">Vote</button>";
                            }
                            else
                            {
                                echo "<button class=\"btn btn-info\">Vote</button>";
                            }
                        }
                    ?>
                </form>
                <?php

                if($adminRow['isAdmin'] == 1)
                {
                    echo "<form role='form' action='deleteVote.php?adv=" . $_GET['adv'] . "' method='POST' >";
                    echo    "<button class='btn btn-danger'>Decrement Votes</button>";
                    echo "</form>";
                }
                if($adminRow['isAdmin'] == 1 || $_SESSION['username'] == $row['userID'] ){
                    echo "<p></p><p></p><a class='btn btn-danger' href='delAdv.php?adv=" . $_GET['adv'] . "'>Delete Adventure</a>";
                }
                if( $_SESSION['username'] == $row['userID'] ) {
                    echo '<p></p><p></p><a href="#" data-toggle="modal" data-target="#modal-edit" class="btn btn-primary">Edit Adventure</a>';
                }
                ?>
            </h2>
            <p>votes: <?php echo $numVotes ?> </p>
            <span class="badge"><?php echo $row['noOfVotes'] ?></span>
            <hr>
            <h5><span class="label label-danger">TAG</span> <span class="label label-primary">TAG</span></h5><br>
            <p><?php echo $row['content'] ?></p>
            <br><br>

            <h4 id="comments" class="anchor"><small>COMMENTS</small></h4>
            <hr>
            <h4>Leave a Comment:</h4>
            <form role="form" action="addComment.php?adv=<?php echo $_GET['adv']?>" method="POST">
                <div class="form-group">
                    <input type="text" id="comment-text" name="comment-text" class="form-control" required>
                </div>
                <button <?php if($_SESSION['username'] == null){echo 'disabled="disabled"';} ?> type="submit" class="btn btn-success">Submit</button>
            </form>
            <br><br>

            <p>Comments:</p><br>
            <?php
                $queryTwo = "
                    SELECT Comments.commentID, Comments.userID, Comments.commentText, Author.photo
                    FROM Comments
                    LEFT JOIN Author
                    ON Comments.userID = Author.userID
                    WHERE advID = '" . $_GET['adv'] . "'
                    ;";

                $found = false;
                $resultsTwo = mysqli_query($conn, $queryTwo);
                if (mysqli_num_rows($resultsTwo) > 0)
                {
                    while (($rowTwo = mysqli_fetch_array($resultsTwo)) && ($found == false))
                    {
                        $isAuthor = false;
                        $queryThree="SELECT * FROM Author;";
                        $resultsThree = mysqli_query($conn, $queryThree);
                        while (($rowThree = mysqli_fetch_array($resultsThree)) && ($isAuthor == false)){
                            if($rowThree['userID']== $rowTwo['userID']){
                                $isAuthor=true;
                                $photoPath= $rowThree['photo'];
                            }
                            else{ $photoPath="Images/generic.jpg"; }
                        }

                        echo "<div class=\"col-sm-2 text-center\">";
                        echo    "<img src='" . $photoPath . "' class=\"img-circle\" height=\"65\" width=\"65\" alt=\"Avatar\">";
                        echo "</div>";
                        echo "<div class=\"col-sm-10\">";
                        echo    "<h4>" . $rowTwo['userID'] . "</h4>";
                        echo    "<p>" . $rowTwo['commentText']. "</p>";
                        echo    showDelete($rowTwo['commentID'], $rowTwo['userID']);
                        echo    "</br>";
                        echo "</div>";

                    }
                }
            ?>
        </div>
    </div>
</div>

<!-- EDITING THE ADVENTURE -->
    <?php

        //GET LOCATION OPTIONS
            $locQuery = "
                SELECT Cities.cityName, Locations.locationID
                FROM Locations
                LEFT JOIN Cities
                ON Locations.cityID = cities.cityID;
            ";
            $locResults = mysqli_query($conn, $locQuery);
            $locOutput = "";
            while($locRow = mysqli_fetch_array($locResults)){
                $locOutput = $locOutput . "
                    <option id='opt-" . $locRow['cityName'] . "' value='" . $locRow['locationID'] . "'>" . $locRow['cityName'] . "</option>
                ";
            }

        $modal = '
            <!-- CREATE ADVENTURE -->
	        <div class="modal fade" id="modal-edit" role="dialog" style="padding-top: 35px;">
		        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-edit"></span> Create Adventure </h4>
                        </div>
                        <form id="createAdv" action="createAdventure.php" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3"><p>Title: </p></div>
                                    <div class="col-sm-9"><input type="text" name="title" id="title" class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3"><p>Content: </p></div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" name="content" id="content" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p>Please <b><u>do not</u></b> input any of the following characters: ", \', \,;</p >
                                            </div >
                                        </div >
                                    </div >
                                </div >
                                <br >
                                <div class="row" >
                                    <div class="col-sm-3" ><p > Location: </p ></div >
                                    <div class="col-sm-9" >
                                        <select class="form-control" name = "location" id = "location" class="form-control" >
                                            ' . $locOutput . '
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3"><p>Photo URL: </p></div>
                                    <div class="col-sm-9"><input type="text" name="photo" id="photo" class="form-control"></div>
                                </div>
                             </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-block">
                                    <span class="glyphicon glyphicon-ok"></span> CREATE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	<!-- END CREATE ADVENTURE -->
        ';
    ?>
<!-- END EDITING ADVENTURE -->

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
