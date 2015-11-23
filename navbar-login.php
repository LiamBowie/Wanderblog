<?php
session_start();
$username = $_SESSION['username'];
echo '
   <style>

        .p{
            padding-top: 5px;
            color: white;
        }
        /* Navbar styling */
        .navbar {
            margin-bottom: 0;
            background-color: #19BEF0;
            z-index: 9999;
            border: 0;
            font-size: 12px !important;
            line-height: 1.42857143 !important;
            letter-spacing: 4px;
            border-radius: 0;
        }

        .navbar li a, .navbar .navbar-brand {
            color: #fff !important;
        }

        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: black !important;
            background-color: #fff !important;
        }

        .navbar-default .navbar-toggle {
            border-color: transparent;
            color: #fff !important;
        }

        .dropdown-menu{
            background-color: #19BEF0;
        }

    </style>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="welcome.php"><span class="glyphicon glyphicon-globe"></span></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><p>Logged in as ' . $username . '</p></li>
                    <li><a href="#top5">TOP 5 TRIPS</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="about.php">ABOUT</a></li>
                            <li><a href="adventuresearch.html">ADVENTURE SEARCH</a></li>
                            <li><a href="authorsearch.html">AUTHOR SEARCH</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</html> '
?>