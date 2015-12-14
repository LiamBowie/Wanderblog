<!DOCTYPE html>
<html lang="en">
<head>
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
?>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4 class="text-center"><?php echo $row['location'] ?></h4>
            <img src= "<?php echo $photoPath; ?>" class="img-thumbnail img-responsive" alt="Author Photo">
            <h5><span class="glyphicon glyphicon-time"></span> Post by <a href=<?php echo $authorPath; ?> > <?php echo $row['authorName'] ?></a></h5>
            <nav class="sticky-sidebar">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#desc">Author Bio</a></li>
                    <li><a href="#photos">Adventures</a></li>
                </ul><br>
            </nav>
        </div>


        <div class="col-sm-9">
            <h2 id="desc" class="anchor">Bio</h2>
            <hr>
            <h5><span class="label label-danger">TAG</span> <span class="label label-primary">TAG</span></h5><br>
            <p><?php echo $row['content'] ?></p>
            <br><br>

            <h4 id="photos" class="anchor"><small>Adventures</small></h4>
            <hr>
            <h2>Check out all these dank ass adventures I've been on!</h2>


        </div>
    </div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
