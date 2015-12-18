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

	#myCarousel{
		padding-top: 20px;
		margin-bottom: 65px;
	}
	</style>

	<script>
		window.onload = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					var tweets = JSON.parse(xhttp.responseText);
					var tweetText = ["", "", "", "", ""];
					var tweetAuth = ["", "", "", "", ""];

					for (var i = 0; i < 5; i++)
					{
						tweetText[i] += tweets[i].text;
						tweetAuth[i] += tweets[i].name;
					}

					document.getElementById("tweetOne").innerHTML =
							"<h4>" + tweetText[0] + "</h4></br>" + tweetAuth[0];
					document.getElementById("tweetTwo").innerHTML =
							"<h4>" + tweetText[1] + "</h4></br>" + tweetAuth[1];
					document.getElementById("tweetThree").innerHTML =
							"<h4>" + tweetText[2] + "</h4></br>" + tweetAuth[2];
					document.getElementById("tweetFour").innerHTML =
							"<h4>" + tweetText[3] + "</h4></br>" + tweetAuth[3];
					document.getElementById("tweetFive").innerHTML =
							"<h4>" + tweetText[4] + "</h4></br>" + tweetAuth[4];
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
		<?php include'searchArea.php' ?>
<!-- SEARCH --><!--
		<form id="search form" class="form-inline" action="search.php?searchx=advID" method="post">
			<input type="search" id="crit" name="crit" class="form-control" size="50" placeholder="What are you waiting for?">
			<select class="form-control" name="select" id="select">
				<option id="opt-Adventure" value="advID">Adventure (by Title)</option>
				<option id ="opt-AdvAuthor" value="author">Adventure (by Author)</option>
				<option id ="opt-Author" value="firstName">Author (by Name)</option>
			</select>
			<button type="submit" class="btn btn-danger">
				<span class="glyphicon glyphicon-search"></span>Search
			</button>
		</form>
<!-- ENF OF SEARCH -->
	</div>

	<h2 class="text-center">Wanderblog on Twitter</h2>


	<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
			<li data-target="#myCarousel" data-slide-to="4"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active" id="tweetOne">
			</div>
			<div class="item" id="tweetTwo">
			</div>
			<div class="item" id="tweetThree">
			</div>
			<div class="item" id="tweetFour">
			</div>
			<div class="item" id="tweetFive">
			</div>
		</div>
	</div>

	<div id="top5" class="carousel slide" data-ride="carousel">
		<!--Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#top5" data-slide-to="0" class="active"></li>
			<li data-target="#top5" data-slide-to="1"></li>
			<li data-target="#top5" data-slide-to="2"></li>
			<li data-target="#top5" data-slide-to="3"></li>
			<li data-target="#top5" data-slide-to="4"></li>
		</ol>

		<!--Wrapper for slides-->
		<div class="carousel-inner" roles="listbox">
			<?php
			$sqlTop5 = "
			SELECT Adventure.title, Adventure.author, Adventure.photo
			FROM Adventure
		  	ORDER BY numVotes DESC;
			";

			$resultsTop5 = mysqli_query($conn, $sqlTop5);
			$rowTop5 = mysqli_fetch_array($resultsTop5);

			if (mysqli_num_rows($resultsTop5) > 0)
			{
				$first = true;
				while ($rowTop5 = mysqli_fetch_array($resultsTop5))
				{
					if($first) {
						echo '<div class="item active">';
					}
					else{
						echo '<div class="item">';
					}
					echo'	<img src=' . $rowTop5['photo'] . ' alt="Image">
							<div class="carousel-caption">
								<h3>' . $rowTop5['title'] . '</h3>
								<p>' . $rowTop5['author'] . '</p>
							</div>
						</div>
						';
					$first=false;
				}
			}
			?>
		</div>

		<a class="left carousel-control" href="#top5" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#top5" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<footer  class="container-fluid bg-4 text-center">
		<p>Wanderblog is a part of SHB Innovative Solutions</p>
	</footer>

	<?php if(isset($_GET['error']) && $_GET['error']=='noUser'){
		echo ' <script>alert("Username or Password not recognised"); window.location = "index.php";</script> ';
	} ?>

</body>
</html>