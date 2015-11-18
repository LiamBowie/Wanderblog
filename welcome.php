<html lang="en">
<head>
	<title>Wanderblog Welcome</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Links for bootstrap-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<!--Link to personal Stylesheet-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="images/earth.ico">
	<?php include'connect.php'; ?> /* iclude connection to db */
	
	<!-- Additional Styling for Current Page -->
	<style>
	.jumbotron{
		background-color: #19BEF0;
		color: #ffffff;
		padding:100px 25px;
	}
	
	.carousel-inner img {
		width: 100%;
		min-height: 500px;
		max-height: 500px;
		margin: auto;
	}
	</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
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
					<li><a href="#carousel">TOP 5 TRIPS</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal-reg">REGISTER</a></li>
					<li>
						<form style="padding-top: 10px" class="form-inline" action="#" method="post">
							<input class="form-control" type="text" name="usernameInput" placeholder="Username">
							<input class="form-control" type="password" name="passwordInput" placeholder="Password">
							<input type="submit" class="btn btn-success" value="LOGIN">
						</form>
					</li>
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

	<!-- PHP HERE -->
	<?php
		/*PHP FOR LOGIN */
		include 'connect.php';
		$tryUsername = $_POST['usernameInput'];
		$tryPassword = $_POST['passwordInput'];
		$found = false;
		$query="SELECT * FROM User;";
		$results=mysqli_query($conn, $query);

		if(mysqli_num_rows($results)>0) { /* if there are results (rows>0) */
			while (($row = mysqli_fetch_array($results)) && ($found == false)) {
				if($tryUsername==$row['userID'] && $tryPassword==$row['password']){
					$found=true;
					$username=$tryUsername;
					session_start();
					$_SESSION['username']=$username;
					$_SESSION['access_level']='standard_user';
					header("Location: https://google.com");
				}
			}
		}
		else{}

	?>

	<!-- Modal -->
	<div class="modal fade" id="modal-reg" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><span class="glyphicon glyphicon-lock"></span> Register your account</h4>
				</div>
				<div class="modal-body">
					<form role="form" method="post" id="registerForm" action="user.php">
						<div class="form-group">
							<div class="col-sm-6">
								<label for="firstname">First Name</label>
								<input type="text" class="form-control" id="firstName" placeholder="E.g Peregrin">
							</div>
							<div class="col-sm-6">
								<label for="surname">Last name</label>
								<input type="text" class="form-control" id="lastName" placeholder="Took">
							</div>
						</div>
						<div class="form-group">
							<label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
							<input type="text" class="form-control" id="userID" placeholder="FoolOfATook">
						</div>
						<div class="form-group">
							<label for="email"><span class="glyphicon glyphicon-envelope"></span> Email Address</label>
							<input type="text" class="form-control" id="email" placeholder="WhatAboutSecondBreakfast@hobbitmail.com">
						</div>
						<div class="form-group">
							<label for="password"><span class="glyphicon glyphicon-lock"></span> Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="passwordconfirm"><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
							<input type="password" class="form-control" id="passwordconfirm" placeholder="Password">
						</div>
						<input type="submit" class="btn btn-block">
							Submit<span class="glyphicon glyphicon-ok"></span>
						</input>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">
						<span class="glyphicon glyphicon-remove"></span> Cancel
					</button>
				</div>
			</div>
		</div>
	</div>

	<?php
	/* PHP FOR REGISTER */
		//if($_POST['passwordconfirm'] == $_POST['password']){
			$sql= "INSERT INTO User VALUES(" . "'" . $_POST['userID'] . "', '" . $_POST['password'] . "', '" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', 0);";
			$sql = "INSERT INTO User VALUES('jordannbeattie', 'Welcome1', 'Jo', 'Beattie', 'beattiejo1@gmail.com', '0');";
			$results=mysqli_query($conn, $query);
			header("Location: user.php");
		//}
	?>

	<div class="jumbotron text-center">
		<h1>Wanderblog</h1> 
		<p>Blogging site specifically for travelers</p> 
		<form class="form-inline">
			<input type="search" class="form-control" size="50" placeholder="What are you waiting for?">
			<select class="form-control">
				<option value="adventure">Adventure</option>
				<option value="author">Author</option>
			</select>
			<button type="button" class="btn btn-danger">Search</button>
		</form>
	</div>


	<div id="carousel" class="carousel slide" data-ride="carousel">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
			<li data-target="#carousel" data-slide-to="1"></li>
			<li data-target="#carousel" data-slide-to="2"></li>
			<li data-target="#carousel" data-slide-to="3"></li>
			<li data-target="#carousel" data-slide-to="4"></li>
		</ol>

		<!--Wrapper for slides-->
		<div class="carousel-inner" roles="listbox">
			<div class="item active">
				<img src="images/lake.jpg" alt="Image">
				<div class="carousel-caption">
					<h3>Trip 1</h3>
					<p>Lovely trip to a lake</p>
				</div>
			</div>

			<div class="item">
				<img src="images/mountain.jpg" alt="Image">
				<div class="carousel-caption">
					<h3>Trip 2</h3>
					<p>Oh look! A mountain!</p>
				</div>
			</div>

			<div class="item">
				<img src="images/woods.jpg" alt="Image">
				<div class="carousel-caption">
					<h3>Trip 3</h3>
					<p>Picturesque stroll through the woods</p>
				</div>
			</div>

			<div class="item">
				<img src="images/canyon.jpg" alt="Image">
				<div class="carousel-caption">
					<h3>Trip 4</h3>
					<p>Better not fall in! hahaha lololol</p>
				</div>
			</div>

			<div class="item">
				<img src="images/sky.jpg" alt="Image">
				<div class="carousel-caption">
					<h3>Trip 5</h3>
					<p>Cheeky balloon ride! #SkyHigh #HighAsAKite #SmokeWeedEvryday</p>
				</div>
			</div>
		</div>

		<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<footer  class="container-fluid bg-4 text-center">
		<p>Wanderblog is a part of SHB Innovative Solutions</p>
	</footer>

</body>
</html>