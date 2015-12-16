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
	<?php include'connect.php'; ?>

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

	<script>
		window.onload = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					var tweets = JSON.parse(xhttp.responseText);
					var tweetstring = "";

					for (var i =0; i< tweets.length ; i++)
					{
						tweetstring += "<div class="item">";
						tweetstring += "<h4>" + tweets[i].text + "<br><span style= 'font-style:normal;'>" + tweets[i].name + "</span></h4>";
						tweetstring += "</div>";
					}

					document.getElementById("twitter").innerHTML = tweetstring;
				}
			};
			xhttp.open("GET", "http://napp.azurewebsites.net", true);
			xhttp.send();
		}

	</script>

</head>
<body style="padding-top: 0">
	<?php include'navbar.php'; ?>

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

	<h2>What our customers say</h2>
	<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
			</div>
			<div class="item">
				<h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
			</div>
			<div class="item">
				<h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
			</div>
		</div>
	</div>

	<div id="top5" class="carousel slide" data-ride="carousel">
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

	<?php if(isset($_GET['error']) && $_GET['error']=='noUser'){
		echo' <script>alert("Username or Password not recognised"); window.location = "welcome.php";</script> ';
	} ?>

</body>
</html>