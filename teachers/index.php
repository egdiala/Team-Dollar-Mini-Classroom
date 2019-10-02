<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Teacher Login</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <!-- FontAwesome 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Acme|Amatic+SC|Anton|Archivo+Narrow|Arimo|Arvo|Asap|Assistant|Barlow|Bitter|Bree+Serif|Cabin|Cairo|Catamaran|Cinzel|Coda|Coda+Caption:800|Comfortaa|Crete+Round|Crimson+Text|Dancing+Script|Domine|Dosis|EB+Garamond|Encode+Sans+Condensed|Exo|Exo+2|Fahkwang|Fira+Sans|Fira+Sans+Condensed|Fjalla+One|Francois+One|Gloria+Hallelujah|Heebo|Hind|Hind+Madurai|Hind+Siliguri|Inconsolata|Indie+Flower|Jacques+Francois|Josefin+Sans|Kanit|Karla|Kdam+Thmor|Lato|Libre+Baskerville|Libre+Franklin|Lobster|Lora|Major+Mono+Display|Maven+Pro|Merriweather|Merriweather+Sans|Montserrat|Mukta|Muli|Nanum+Gothic|Noto+Sans|Noto+Sans+JP|Noto+Sans+KR|Noto+Sans+TC|Noto+Serif|Noto+Serif+SC|Nunito|Nunito+Sans|Open+Sans|Open+Sans+Condensed:300|Oswald|Oxygen|PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Pacifico|Play|Playfair+Display|Poppins|Questrial|Quicksand|Rajdhani:Bold|Raleway|Righteous|Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab|Rubik|Saira+Extra+Condensed|Sarabun|Shadows+Into+Light|Signika|Slabo+27px|Source+Code+Pro|Source+Sans+Pro|Source+Serif+Pro|Staatliches|Teko|Titillium+Web|Ubuntu|Ubuntu+Condensed|Varela+Round|Vollkorn|Work+Sans|Yanone+Kaffeesatz|ZCOOL+KuaiLe" rel="stylesheet">
	<!-- Script -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	
</head>
<body>
	<section>
		<div class="bg-img"></div>
		<div class="bg-cover"></div>
		<div ng-app="myApp" ng-controller="myCtrl">
			<p ng-bind="response"></p>
			<div class="container mt-5" style="width: 30rem;">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sign In</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sign Up</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane box-shadow fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
						<div class="bg-color">
							<div class="text-center">
								<div class="container p-3">
									<div class="card-img-top">
										<img src="../assets/images/logo.png" style="width: 35%">
									</div>
									<form action="api/login.php" method="post" class="m-5">
										<div class="form-group form-row justify-content-center align-items-center">

											<p class="text-muted text-white">
													<?php
														if(isset($_GET["m"])){
															echo $_GET["m"];
														}
													?>
											</p>

											<div class="input-group col-10">

												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-envelope" aria-hidden="true"></i>
													</span>
												</div>
												<input type="Email" class="form-control form-control-lg" ng-model='email' name="email"
												placeholder="Enter Email" aria-label="Email" aria-describedby="basic-addon1">

											</div>
										</div>
										<div class="form-group form-row justify-content-center align-items-center">
											<div class="input-group col-10">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-lock" aria-hidden="true"></i>
													</span>
												</div>
												<input type="Password" class="form-control form-control-lg" ng-model='password' name="password"
												placeholder="Enter Password" aria-label="Password" aria-describedby="basic-addon1">
											</div>
										</div>
										
										<button class="btn btn-shadow btn-lg btn-primary" type="submit" ng-click="postData()">
											<span class="">Sign In</span>
										</button>
									</form>
									
									<div class="d-flex">
										<div class="col-auto">
											<p class="col-auto text-white"><span><a href="../teachers/reset-password.html">Forgot Password?</a></span></p>
										</div>
										<div class="col-auto">
											<p class="col-auto text-white"><span><a href="#nav-profile">Yet to register?</a></span></p>
										</div>
									</div>
								</div>
							</div> 
						</div>
					</div>
					<div class="tab-pane box-shadow fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
						<div class="bg-color">
							<div class="text-center">
								<div class="container">
									<div class="card-img-top">
										<img src="../assets/images/logo.png" style="width: 40%">
									</div>
									<form class="p-4" action="api/register.php" method="post">
										<div class="form-row justify-content-center align-items-center">
											<!--
											<div class="form-group input-group col-md-5">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-user" aria-hidden="true"></i>
													</span>
												</div>
												<input id="firstName" name="firstName" type="text" class="form-control form-control-lg" 
												placeholder="First Name" required minlength="5" aria-label="firstName">
											</div>
											<div class="form-group input-group col-md-5">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-user" aria-hidden="true"></i>
													</span>
												</div>
												<input id="lastName" name="lastName" type="text" class="form-control form-control-lg"
													required minlength="5" placeholder="Last Name" aria-label="lastName">
											</div>
											-->
											<div class="form-group input-group col-md-10">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-user" aria-hidden="true"></i>
													</span>
												</div>
												<input id="firstName" name="name" type="text" class="form-control form-control-lg" 
												placeholder="Fullame" required minlength="5" aria-label="firstName">
											</div>
										</div>
										<div class="form-group form-row justify-content-center align-items-center">
											<div class="input-group mb-3 col-10">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-envelope" aria-hidden="true"></i>
													</span>
												</div>
												<input id="email" name="email" type="Email" class="form-control form-control-lg" 
												placeholder="Email Address" aria-label="Email" required>
											</div>
											<div class="input-group mb-3 col-10">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">
														<i class="fa fa-lock" aria-hidden="true"></i>
													</span>
												</div>
												<input id="password" name="password"  type="Password" class="form-control form-control-lg" 
												placeholder="Password" aria-label="Password">
											</div>
										</div>
										
										<button class="btn btn-shadow btn-lg btn-primary" type="submit">
											<span class="">Register</span>
										</button>
										<div class="d-flex p-2">
											<div class="col">
												<p class="col-auto text-white">Registered Already, 
													<span><a href="#nav-home">Sign in here!</a></span>
												</p>
											</div>
										</div>
									</form>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>


	</section>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>