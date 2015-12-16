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

        .col-sm-12{
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
<?php include 'navbar.php';?>

<div class="container-fluid text-center">
        <div class="col-sm-12 text-left">
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
    </div>
</div>

<footer class="container-fluid bg-4 text-center" style="background-color: #2f2f2f;">
    <p>Wanderblog is a part of SHB Innovative Solutions</p>
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
