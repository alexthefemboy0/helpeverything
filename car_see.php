<?php
session_start();
require("requires/autoload.php");

# Request data from MySQL

$id = $_GET['id'];

# Global variables to set

$model = "";
$cost = 0;
$manufacturer = "";
$year = 0;
$link = "";

# Grab data from server.
$query = "select * from cars where id='$id' limit 1";
$result = mysqli_query($con, $query);
if ($result) {
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$model = $row['model'];
			$cost = $row['price'];
			$manufacturer = $row['manufacturer'];
			$year = $row['year'];	
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
		<h1>Car <?php echo $model; ?></h1><br>
		<h2>Statistics</h2><br>
		Manufacturer <?php echo $manufacturer; ?><br>
		Model: <?php echo $model; ?><br>
		Year: <?php echo $year; ?><br>	
		Car Price (not including down payment): $<?php $amt_fmt = number_format($cost, 2, '.', ','); echo $amt_fmt; ?><br>
		Model name: <?php echo $model; ?><br>
		<a href=<?php echo $link ?> class="btn btn-primary">Buy Now</a><br><br>
		<a href="cars.php" class="btn btn-danger">Back</a>
	</body>
</html>

