<?php
	include_once 'include/class.user.php';
	$user = new User();

	if(isset($_REQUEST['register'])) {
		extract($_REQUEST);
		$register = $user->register($name, $email, $password);
		if($register) {
			echo "Registration Successful <a href='login.php'>Click Here</a> To login";
		}
		else {
			echo "Registration Failed. Email already exits.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function submitreg() {
			var form = document.registration;

			if(form.name.value == ""){
				alert("Enter Name");
				return false;
			}

			else if (form.email.value == "") {
				alert ("Enter Email");
				return false;
			}

			else if (form.password.value == "") {
				alert ("Enter Password");
				return false;
			}
		}
	</script>
</head>
<body>
<header class="container">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
		<h1 class="text-center">Registration</h1>
	</div>
</header>

<section>
	<div class="container">
	  <div class="row">
	    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	    	<form name="registration" action="" method="POST">
	    		<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
				</div>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
				
				<button type="submit" class="btn btn-default" name="register" value="Register" onclick="return(submitreg());">Submit</button>
				<a type="submit" class="btn btn-default" href="login.php">Login</a>
				<a type="submit" class="btn btn-default" href="index.php">Registration</a>
	    </form>
	    </div>
	  </div>
	</div>
</section>

<footer>
	
</footer>
</body>
</html>