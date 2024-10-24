<?php
session_start();
require("requires/autoload.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	if ($password === $cpassword) {
		$query = "insert into accounts (username, password) values ('$username', '$password')";
		$result = mysqli_query($con, $query);
		if ($result) {
			header("Location: login.php");
		} else {
			echo "<script>alert('We had some trouble signing you up. Please try again.')</script>";
		}
	} else {
		echo "<script>alert('Passwords do not match.')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
        <title>HelpEverything Landing Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Fredoka One" rel="stylesheet">
    </head>
    <style>
		.custom-hr {
			border: 0;
			height: 9995px;
			background-color: #82deec;
		}
		.vl {
			border-left: 6px turquoise bluee
			height: 500px;
		}
	</style>
    <body>
        <center>
            <h1>HelpEverything</h1>
	    <h2>Your partner in accessibility.</h2><br><br>	
        </center>
	<h1>Sign up</h1><br><br>
	<form method="post">
		<input type="text" name="username" class="form-control" placeholder="Username">
		<input type="password" name="password" class="form-control" placeholder="Password">
		<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"><br>
		<button type="submit" class="btn btn-primary">Sign up</button>
	</form><br>
	<a href="login.php">Already have an account?</a>	
    </body>
</html>

