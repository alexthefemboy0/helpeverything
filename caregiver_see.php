<?php
session_start();
require("requires/autoload.php");

# Request data from MySQL

$id = $_GET['id'];

# Global variables to set

$model = "";
$cost = 0;
$manufacturer = "";
$topspeed = 0;
$batteryhours = 0;
$rechargetime = 0;
$chair_range = 0;

# Grab data from server.
$query = "select * from caregivers where id='$id' limit 1";
$result = mysqli_query($con, $query);
if ($result) {
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$rate = $row['rate'];
			$rate_type = $row['rate_type'];
			$link = $row['link'];
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
	</style>
    <body>
        <center>
            <h1>HelpEverything</h1>
            <h2>Your partner in accessibility.</h2><br><br>
        </center>
		<h1><?php echo $firstname . " " . $lastname; ?></h1><br>
		<h2>Statistics</h2><br>
		First Name: <?php echo $firstname; ?><br>
		Last Name: <?php echo $lastname; ?><br>
		Rate: <?php $amt_fmt = number_format($rate, 2, ".", ","); echo $amt_fmt; ?><br>
		Rate Type: <?php if ($rate_type == 2) {echo "daily";} if ($rate_type == 1) {echo "hourly";}  ?><br><br>
		<a href=<?php echo $link ?> class="btn btn-primary">See More</a><br><br>
		<a href="caregivers.php" class="btn btn-danger">Back</a>
	</body>
</html>

