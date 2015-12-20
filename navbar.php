<?php
session_start(); // include all session data
if(isset($_SESSION['loggedIn'])) {//if user is loggedIn to WanderBlog
    include 'connect.php';
    $query = "SELECT * FROM User WHERE userID = '" . $_SESSION['username'] . "';";
    $results = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($results);
    $myProfile = "";
    if($_SESSION['isAuthor']==true){
        $queryTwo = "SELECT authorID FROM Author WHERE userID = '" . $_SESSION['username'] . "';";
        $resultsTwo = mysqli_query($conn, $queryTwo);
        $rowTwo = mysqli_fetch_array($resultsTwo);
        $profilePath='author.php?auth=' . $rowTwo['authorID'];
        $myProfile = '
            <a type="submit" class="btn btn-info btn-block" href="' . $profilePath . '">
                <span class="glyphicon glyphicon-user"></span> MY PROFILE
            </a>
            <a class="btn btn-primary btn-block" data-dismiss="modal" data-toggle="modal" data-target="#modal-adv">
                <span class="glyphicon glyphicon-edit"></span> CREATE ADVENTURE
            </a>
        ';
    }
    else{ $myProfile =''; }
    $authorise = '';
    if($row['isAdmin'] == true){
        $authorise = '
            <a class="btn btn-info btn-block" data-dismiss="modal" data-toggle="modal" data-target="#modal-auth">
                <span class="glyphicon glyphicon-tasks"></span> AUTHORISE
            </a>
        ';
    }
    else { $authorise = ''; }

    $users = "";
    $queryAuthorise = "SELECT * From Authorise;";
    $resultsAuthorise = mysqli_query($conn, $queryAuthorise);
    if(mysqli_num_rows($resultsAuthorise) >0){
        while( $rowAuthorise = mysqli_fetch_array($resultsAuthorise) ) {
            $OKpath = "addUser.php?task=OK&user=" . $rowAuthorise['userID'];
            $nopath = "addUser.php?task=NO&user=" . $rowAuthorise['userID'];
            $users = $users . '
                <div class="row">
                    <div class="col-sm-6">
                        ' . $rowAuthorise['userID'] . '
                    </div>
                    <div class="col-sm-3">
                        <a href="' . $OKpath . '" class="btn btn-success">
                            <span class="glyphicon glyphicon-ok"></span>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="' . $nopath . '" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </div>
                </div>
                <br>

            ';
        }
    }
    else{ $users = "No users are awaiting authorisation"; }


    echo '
    <nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-globe"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
				    <li class="LoggedIn"><a href="#" data-toggle="modal" data-target="#modal-reg"> Logged in as  ' . $_SESSION['FullName'] . '</a> </li>
				    <li class="LogOut" style="color:white;"><a onclick="confirmLogout()" href="#">LOG OUT</a></li>
					<li><a href="index.php#top5">TOP 5 TRIPS</a></li>
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
	<script>
    function confirmLogout(){
        var logout = confirm("Are you sure you want to Log Out?");
        if(logout==true){ window.location = "login.php?operation=OUT"; }
        else{ window.location = "index.php" }
    }
    function confirmDelete(){
        var deleteUser = confirm("This will permanently remove your existence from Wanderblog. Are you sure you want to continue?");
        if(deleteUser==true){ window.location = "createUser.php?operation=delete"; }
        else{ window.location = "index.php"; }
    }
    </script>
    <!-- Modal -->
    <div class="modal fade" id="modal-reg" role="dialog" style="padding-top: 25px;">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><span class="glyphicon glyphicon-lock"></span> Account Info </h4>
				</div>
				<div class="modal-body">
				    <div class="row">
				        <div class="col-sm-3"><p>Full Name: </p></div>
				        <div class="col-sm-9">' . $_SESSION["FullName"] . '</div>
				     </div>
				     <div class="row">
				        <div class="col-sm-3"><p>Username: </p></div>
				        <div class="col-sm-9">' . $_SESSION["username"] . '</div>
				     </div>
					<div class="row">
				        <div class="col-sm-3"><p>Email Address: </p></div>
				        <div class="col-sm-9">' . $row["emailAddress"] . '</div>
				     </div>
				     <div class="row">
				        <div class="col-sm-3"><p>Password: </p></div>
				        <div class="col-sm-9">' . $row["password"] . '</div>
				     </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-block" data-dismiss="modal">
						<span class="glyphicon glyphicon-ok"></span> OK
					</button>
					' . $myProfile . $authorise . '
                    <a type="submit" class="btn btn-danger btn-block" onCLick="confirmDelete()">
                        <!-- <a href="createUser.php?operation=delete"> -->
                            <span class="glyphicon glyphicon-trash"></span> DELETE ACCOUNT
                        </a>
                    </button>
				</div>
			</div>
		</div>
	</div>

	<!-- AUTHORISE -->
	        <div class="modal fade" id="modal-auth" role="dialog" style="padding-top: 35px;">
		        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-tasks"></span> Authorise </h4>
                        </div>
                        <div class="modal-body">
                            <!-- OUTPUT HERE-->
                            ' . $users . '
                            <!-- END OUTPUT -->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-block" data-dismiss="modal">
                                <span class="glyphicon glyphicon-ok"></span> DONE
                            </button>
                        </div>
                    </div>
                </div>
            </div>
	<!-- END AUTHORISE -->

    <!-- CREATE ADVENTURE -->
	        <div class="modal fade" id="modal-adv" role="dialog" style="padding-top: 35px;">
		        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-edit"></span> Create Adventure </h4>
                        </div>
                        <form id="createAdv" action="createAdventure.php" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3"><p>Title: </p></div>
                                    <div class="col-sm-9"><input type="text" name="title" id="title" class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3"><p>Content: </p></div>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <input type="text" name="content" id="content" class="form-control">
                                        </div>
                                        <div class="row">
                                            <p>Please <b><u>do not</u></b> input any of the following characters: ", \', \, ;</p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3"><p>Location: </p></div>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="location" id="location" class="form-control">
                                            <option id="opt-location" value="1">One</option>
                                            <option id="opt-location" value="1">Two</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3"><p>Photo URL: </p></div>
                                    <div class="col-sm-9"><input type="text" name="photo" id="photo" class="form-control"></div>
                                </div>
                             </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-block">
                                    <span class="glyphicon glyphicon-ok"></span> CREATE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
	<!-- END CREATE ADVENTURE -->

';
}
else{ //if user is not loggedIn to Wanderblog
    echo '
    <nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-globe"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php#top5">TOP 5 TRIPS</a></li>
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
					<form role="form" method="post" id="registerForm" action="createUser.php?operation=create">
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