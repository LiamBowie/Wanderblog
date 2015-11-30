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

        <div class="col-sm-9">
            <h2 id="desc" class="anchor">ADVENTURE TITLE</h2>
            <hr>
            <h5><span class="label label-danger">TAG</span> <span class="label label-primary">TAG</span></h5><br>
            <p>Here is where you would describe your boring ass adventure to the supermarket to get your shitty groceries.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <br><br>

            <h4 id="photos" class="anchor"><small>PHOTOS</small></h4>
            <hr>
            <h2>Check out these photos of my adventure to LOCATION</h2>
            <p><strong>GRID OF IMAGES. IMPLEMENT LATER. TOO LAZY JUST NOW.</strong></p>

            <h4 id="comments" class="anchor"><small>COMMENTS</small></h4>
            <hr>
            <h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            <br><br>

            <p><span class="badge">2</span> Comments:</p><br>

            <div class="row">
                <div class="col-sm-2 text-center">
                    <img src="Images/jo.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>Anja <small>Sep 29, 2015, 9:12 PM</small></h4>
                    <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <br>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="Images/jo.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4>John Row <small>Sep 25, 2015, 8:25 PM</small></h4>
                    <p>I am so happy for you man! Finally. I am looking forward to read about your trendy life. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <br>
                    <p><span class="badge">1</span> Comment:</p><br>
                    <div class="row">
                        <div class="col-sm-2 text-center">
                            <img src="Images/jo.jpg" class="img-circle" height="65" width="65" alt="Avatar">
                        </div>
                        <div class="col-xs-10">
                            <h4>Nested Bro <small>Sep 25, 2015, 8:28 PM</small></h4>
                            <p>Me too! WOW!</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>
