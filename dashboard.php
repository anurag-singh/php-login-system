<?php
	session_start();
	include_once 'include/class.user.php';

	$user = new User();

	$userID = $_SESSION['userID'];

	if(!$user->get_session()) {
		header("location:login.php");
	}
	if (isset($_GET['q'])) {
		$user->user_logout();
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<header class="container">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
		<h1 class="text-center">User Profile</h1>
	</div>
</header>

<section>
	<div class="container">
	  <div class="row">
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	    	<h3>Hello <?php $user->get_fullname(1);?></h3>
	    	<h3>Hello <?php $user->get_user_details($userID);?></h3>
	    	<h6><a href="index.php?q=logout">Logout</a></h6>
	    </div>
	  </div>
	</div>
</section>

<footer>
	<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</footer>
</body>
</html>