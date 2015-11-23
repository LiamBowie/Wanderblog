<html>
<head>
	<title>About Us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Links for bootstrap-->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<!--Link to personal Stylesheet-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="images/earth.ico">
	
	<!-- Additional Styling for Current Page -->
	<style>
	
	</style>
	
</head>
<body style="padding-top: 65px;">
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
				<li><a href="welcome.php#top5">TOP 5 TRIPS</a></li>
				<li><a href="#" data-toggle="modal" data-target="#modal-reg">REGISTER</a></li>
				<li>
					<form role="form" style="padding-top: 10px" class="form-inline" action="#" method="post">
						<input class="form-control" type="text" name="username" placeholder="Username">
						<input class="form-control" type="password" name="password" placeholder="Password">
						<button type="submit" class="btn btn-success">LOGIN</button>
					</form>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="about.php">ABOUT</a></li>
						<li><a href="adventuresearch.php">ADVENTURE SEARCH</a></li>
						<li><a href="authorsearch.php">AUTHOR SEARCH</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

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
				<form role="form">
					<div class="form-group">
						<div class="col-sm-6">
							<label for="firstname">First Name</label>
							<input type="text" class="form-control" id="firstname" placeholder="E.g Peregrin">
						</div>
						<div class="col-sm-6">
							<label for="surname">Last name</label>
							<input type="text" class="form-control" id="surname" placeholder="Took">
						</div>
					</div>
					<div class="form-group">
						<label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
						<input type="text" class="form-control" id="username" placeholder="FoolOfATook">
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
					<button type="submit" class="btn btn-block">
						Submit<span class="glyphicon glyphicon-ok"></span>
					</button>
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

	<div id="about" class="container-fluid">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<h1>About Us</h1>
				<h2>Why Wanderblog?</h2>
				<h4> 
					You may be asking yourself "what makes Wanderblog so different from the rest of the blogging sites on the internet?" and the answer couldn't be simpler!
					- There is no difference! However we both know that you are addicted to online blogs and posting pictures of where you've been as you try to pass off going
					for your monthly shop as an "adventure" so why don't you just cut the shit and register your profile already?
				</h4> 
				<p>
					Here at Wanderblog we care deeply about our valued users and do everything we can to make sure that their experience using our site is a pleasant one. Register
					below to create your very own profile and start sharing your incredible experiences with the rest of our thriving community. 
				</p>
				<button class="btn btn-default btn-lg" data-toggle="modal" data-target="#modal-reg">Register now</button>
			</div>
			<div class="col-sm-2">
				<span class="glyphicon glyphicon-globe logo"></span>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>
	
	<div class="container-fluid bg-grey">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-8">
				<h2>Sharing Adventures</h2>
				<h4>
					Going on adventures is one of life's simple pleasures, but what is better than going on an adventure? Well, sharing our your adventure with our incredible 
					online community! 
				</h4>
				<p>
					Our community is made up of a variety of different users, which means you don't have to be an Author to join in the wonderous fun of Wanderblog. Registering 
					as a Reader user allows you to comment and vote on your favourite adventures. You don't even have to register to enjoy our site, simply search something 
					for what kind of adventure you're looking for in the search bar above and start viewing the wonderful world of Wanderblog!
				</p>
			</div>
			<div class="col-sm-2">
				<span class="glyphicon glyphicon-leaf logo"></span>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<footer  class="container-fluid bg-4 text-center">
		<p>Wanderblog is a part of SHB Innovative Solutions</p>
	</footer>
</body>

</html>