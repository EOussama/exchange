<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="application-name" content="Exchange">
		<meta name="author" content="Amine, Ayman">
		<meta name="description" content="A user-friendly platform that eases exchanging goods online.">
		<meta name="keywords" content="exchange, shopping, e-commerce">

		<link rel="stylesheet" type="text/css" href="\exchange\fonts\font-awesome\css\fontawesome-all.min.css">
		<link href="\exchange\styles\bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="\exchange\styles\main.css">
		<link rel="icon" type="image/png" href="\exchange\images\favicon.png">

		<title>Exchange</title>
	</head>

	<body>
	   <header>
		   	<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-sign-in-alt"></i> Sign-in</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
					<form action="\exchange\includes\signup.php" method="post">
					  <div class="modal-body">
						  <div class="form-group">
							<label for="signup-username" class="col-form-label">Username</label>
							<input maxlength="25" minlength="5" name="signup-username" type="text" placeholder="Type a valid username" class="form-control" id="signup-username" required>
						  </div>
						  <div class="form-group">
							<label for="signup-email" class="col-form-label">Email</label>
							<input type="email" maxlength="50" placeholder="Type a valid email" name="signup-email" class="form-control" id="signup-email" required>
						  </div>
						  <div class="form-group">
							<label for="signup-password" class="col-form-label">Password</label>
							<input type="password" maxlength="20" placeholder="Type a valid password" name="signup-password" minlength="5" class="form-control" id="signup-password" required>
						  </div>
						  <div class="form-group">
							<label for="signup-city" class="col-form-label">City</label>
							<input type="text" maxlength="50" placeholder="Type a valid city"name="signup-city" minlength="3" class="form-control" id="signup-city" required>
						  </div>
						  <div class="form-group">
							  <select name="signup-states" class="form-control form-control-lg">
								<option value="TA">Tanger-Tetouan-Al Hoceima</option>
								<option value="OR">Oriental</option>
								<option value="FE">Fès-Meknès</option>
								<option value="RA">Rabat-Salé-Kénitra</option>
								<option value="BE">Béni Mellal-Khénifra</option>
								<option value="CA">Casablanca-Settat</option>
								<option value="MA">Marrakesh-Safi</option>
								<option value="DR">Drâa-Tafilalet</option>
								<option value="SO">Souss-Massa</option>
								<option value="GU">Guelmim-Oued Noun</option>
								<option value="LA">Laâyoune-Sakia El Hamra</option>
								<option value="DA">Dakhla-Oued Ed-Dahab</option>        
							</select>
						  </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Sign-in">
					  </div>
					</form>
				</div>
			  </div>
			</div>
		   
		   <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user"></i> Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
					<form action="\exchange\includes\login.php" method="post">
					  <div class="modal-body">
						  <div class="form-group">
							<label for="login-username" maxlength="25" minlength="5" class="col-form-label">Username</label>
							<input type="text" name="login-username" class="form-control" placeholder="Type a valid username" id="login-username" required>
						  </div>
						  <div class="form-group">
							<label for="login-password" class="col-form-label">Password</label>
							<input maxlength="20" name="login-password" minlength="4" placeholder="Type a valid password" type="password" class="form-control" id="login-password" required>
						  </div>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary" value="Login">
					  </div>
					</form>
				</div>
			  </div>
			</div>
		   
			<div class="jumbotron text-center">
				<img src="\exchange\images\logo.svg" alt="Logo" width="200px">
				<h1 class="display-3">Exchange</h1>
				<hr class="my-4">
				<p class="lead text-secondary">The world's most friendly goods exchanging platform</p>
			</div>

		   	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			  <a class="navbar-brand" href="javascript:void(0)">Exchange</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="\exchange\index.php">Home</a>
						</li>
						<?php 
							if(basename($_SERVER['PHP_SELF']) != 'offers.php')
								echo "<li class=\"nav-item\">
										<a class=\"nav-link\" href=\"\\exchange\\pages\\offers.php\">Offers</a>
									</li>";
								else {
									echo "<div class='ml-sm-5'><li class=\"nav-item\">
										<form action=\"/exchange/pages/offers.php\" method=\"post\" class=\"form-inline my-2 my-lg-0\">
										  <input class=\"form-control mr-sm-2\" type=\"search\" name=\"city\" placeholder=\"City\" aria-label=\"Search\">
										  <select name=\"states\" class=\"form-control\">\r\n\t\t\t\t\t\t\t<option value=\"TA\">Tanger-Tetouan-Al Hoceima</option>\r\n\t\t\t\t\t\t\t<option value=\"OR\">Oriental</option>          \r\n\t\t\t\t\t\t\t<option value=\"FE\">F\u00E8s-Mekn\u00E8s</option>\r\n\t\t\t\t\t\t\t<option value=\"RA\">Rabat-Sal\u00E9-K\u00E9nitra</option>\r\n\t\t\t\t\t\t\t<option value=\"BE\">B\u00E9ni Mellal-Kh\u00E9nifra</option>\r\n\t\t\t\t\t\t\t<option value=\"CA\">Casablanca-Settat</option>\r\n\t\t\t\t\t\t\t<option value=\"MA\">Marrakesh-Safi</option>\r\n\t\t\t\t\t\t\t<option value=\"DR\">Dr\u00E2a-Tafilalet</option>\r\n\t\t\t\t\t\t\t<option value=\"SO\">Souss-Massa</option>\r\n\t\t\t\t\t\t\t<option value=\"GU\">Guelmim-Oued Noun</option>\r\n\t\t\t\t\t\t\t<option value=\"LA\">La\u00E2youne-Sakia El Hamra</option>\r\n\t\t\t\t\t\t\t<option value=\"DA\">Dakhla-Oued Ed-Dahab</option>        \r\n\t\t\t\t\t\t</select>
										  
										  <input class='ml-sm-2' name='loc' class='form-control' type='checkbox'>Ignore location</input>
										  <input class=\"ml-sm-2 btn btn-outline-light my-2 my-sm-0\" type=\"submit\" value='Search'\">
										</form>
									</li></div>";
								}
						?>
					</ul>
					<?php if($_SESSION['logged-in'] == false): ?>
						<form class="form-inline my-2 my-lg-0">
							<input class="btn btn-light mr-sm-2" data-toggle="modal" data-target="#signinModal" type="button" value="Sign up">
							<input class="btn btn-outline-light" data-toggle="modal" data-target="#loginModal" type="button" value="Login">
						</form>
					<?php else: ?>						
						<div class="btn-group mr-5">
							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $_SESSION['username']; ?>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="\exchange\pages\newOffer.php"><i class="fa fa-plus"></i> New offer</a>
								<a class="dropdown-item" href="\exchange\pages\myOffers.php"><i class="fa fa-list-alt"></i> My offers</a>
								<a class="dropdown-item" href="\exchange\includes\logout.php"><i class="fa fa-sign-out-alt"></i> logout</a>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</nav>
		</header>