<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type=text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

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

function saveChanges(){
    global $conn;
    $query="UPDATE Adventure
            SET content'" . $_POST['descText'] . "'
            WHERE authorID='" . $_GET['auth'] ."'
            ";
    $results = mysqli_query($conn, $query);
    mysqli_close($conn);
}

?>

<?php echo "form id='changes' action='createAdventure.php?auth=" . $_GET['auth'] ."'method='post'>"; ?>
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <h4 class="text-center"></h4>
                <img src ="" class="img-thumbnail img-responsive" alt="Adventure Photo">
                <h5><span class="glyphicon glyphicon-time"></span>Post by <a href='author.php?auth='></a></h5>
                <nav class="sticky-sidebar">
                    <ul class="nav navpills nav=stacked">
                        <li><a href="#desc">Adventure Description</a></li>
                        <li><a href="#comments">Comments</a></li>
                    </ul><br>
                </nav>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="row">
                <?php echo "<p><textarea id='descText' cols='50' rows='10' type='text' id='desc' >" . "</textarea></p>"; ?>
                <br><br>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-block btn-success">
                    <span class="glyphicon glyphicon-ok"></span>Save
                </button>
                <button type="submit" class="btn btn-danger btn-block">
                    <span class="glyphicon glyphicon-remove"></span>Cancel
                </button>
            </div>
        </div>

    </div>
</form>
<footer class="container-fluid">
    <p>Footer Text</p>
</footer>
</body>
</html>