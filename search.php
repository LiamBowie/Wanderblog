<!DOCTYPE html>
<html lang="en">
<head>
    <title>Author Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php include'connect.php'; ?>
    <style>
        
        .row.content {height: 450px}

        .sidenav{
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        footer{
            background-color: #555;
            color: white;
            padding: 15px;
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
<body>
<?php include 'navbar.php';?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Displaying results for *searchvalue*</h1>

            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="#" class="thumbnail">
                            <img src="http://bit.ly/1m6Q0nF">
                            <p>Insert Information here</p>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="thumbnail">
                            <img src="http://bit.ly/1m6Q0nF">
                            <p>Insert Information here</p>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="thumbnail">
                            <img src="http://bit.ly/1m6Q0nF">
                            <p>Insert Information here</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>
</body>
<?php
/**
 * Created by PhpStorm.
 * User: Finlay
 * Date: 18/11/2015
 * Time: 13:13
 */
?>

</html>
