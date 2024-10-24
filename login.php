<?php
session_start();
require("requires/autoload.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "select * from accounts where username='$username' limit 1";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['id'];
				$actual_password = $row['password'];
				if ($password === $actual_password) {
					$_SESSION['account_id'] = $id;
					header("Location: index.php");
				} else {
					echo "<script>alert('Username or password is incorrect.')</script>";
				}
			}
		} else {
			echo "<script>alert('Username or password is incorrect.')</script>";
		}
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
	    <h2>Your partner in accessiblity.</h2><br><br>	
        </center>
	<h1>Login</h1><br><br>
	<form method="post">
		<input type="text" name="username" class="form-control" placeholder="Username">
		<input type="password" name="password" class="form-control" placeholder="Password"><br>
		<button type="submit" class="btn btn-primary">Login</button>
	</form><br>
	<a href="signup.php">Don't have an account?</a>	
    </body>
</html>

