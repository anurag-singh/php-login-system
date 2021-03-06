<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();
	if(isset($_REQUEST['login'])) {
		extract($_REQUEST);
		$login = $user->login($email, $password);
		if ($login) {
			header("location: dashboard.php");
		}
		else {
			echo "Wrong user details";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript">
		function submitlogin() {
			var form = document.login;
			if(form.email.value == "") {
				alert("Enter Email");
				return false;
			}
			else if(form.password.value == "") {
				alert("Enter Password");
				return false;
			}
		}
	</script>
</head>
<body>
<header class="container">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
		<h1 class="text-center">Login</h1>
	</div>
</header>
<section>
	<div class="container">
	  <div class="row">
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	    	<form name="login" action="" method="POST">
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-default" value="Login" name="login" onclick="return(submitlogin());">Submit</button>
				<a type="submit" class="btn btn-default" href="login.php">Login</a>
				<a type="submit" class="btn btn-default" href="index.php">Registration</a>
	    </form>
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