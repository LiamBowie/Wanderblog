<?php
session_start(); // include all session data
if(isset($_SESSION['loggedIn'])) {//if user is loggedIn to WanderBlog
    echo '<nav class="navbar navbar-default navbar-fixed-top">
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
				    <li class="LoggedIn" style="padding-top:10px; color:white;"> Logged in as ' . $_SESSION['FullName'] . '</li>
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
	</nav>'; //Display navbar with users name
}
else{ //if user is not loggedIn to Wanderblog
    echo'
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
					<li><a href="#top5">TOP 5 TRIPS</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal-reg">REGISTER</a></li>
					<li>
						<form style="padding-top: 10px" class="form-inline" action="login.php?operation=IN" method="post">
							<input class="form-control" type="text" name="usernameInput" placeholder="Username" required>
							<input class="form-control" type="password" name="passwordInput" placeholder="Password" required>
							<button type="submit" class="btn btn-success"> LOGIN</button>
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
					<form role="form" method="post" id="registerForm" action="createUser.php">
						<div class="form-group">
							<div class="col-sm-6">
								<label for="firstname">First Name</label>
								<input type="text" class="form-control" name="firstName" placeholder="E.g Peregrin" required>
							</div>
							<div class="col-sm-6">
								<label for="surname">Last name</label>
								<input type="text" class="form-control" name="lastName" placeholder="Took" required>
							</div>
						</div>
						<div class="form-group">
							<label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
							<input type="text" class="form-control" name="userID" placeholder="FoolOfATook" required>
						</div>
						<div class="form-group">
							<label for="email"><span class="glyphicon glyphicon-envelope"></span> Email Address</label>
							<input type="text" class="form-control" name="email" placeholder="WhatAboutSecondBreakfast@hobbitmail.com" required>
						</div>
						<div class="form-group">
							<label for="password"><span class="glyphicon glyphicon-lock"></span> Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label for="passwordconfirm"><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
							<input type="password" class="form-control" name="passwordconfirm" placeholder="Password" onChange="checkPasswordMatch();" required>
						</div>
                        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1">
                                    <input type="hidden" name="authorCheck" value="0" />
                                    <input type="checkbox" class="form-control" name="authorCheck" value="1">
                                </div>
                                <div class="col-sm-9">
                                    <label>Check this box to sign up as a Wanderlog Author</label>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
						<button type="submit" class="btn btn-block btn-success">
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
	</div>'; //Display navbar with login and register options
}