<?php
session_start();
require("requires/autoload.php");
$user_data = check_login($con);
# Request data from MySQL

$id = $_GET['id'];

# Global variables to set

$type = "wheelchairs";

# Grab star data

$uid = $user_data['id'];
$query = "select * from star_entries where user_id='$uid' and type='$type' and item_id='$id'";
$result = mysqli_query($con, $query);
$star_class = "";
$star_text = "";
$star_link = "starmgr.php?type=" . $type . "&id=" . $id;
if ($result) {
	if (mysqli_num_rows($result) > 0) {
		$star_class = "btn btn-secondary";
		$star_text = "Remove Star";
	} else {
		$star_class = "btn btn-warning";
		$star_text = "Add Star";
	}
}

$model = "";
$cost = 0;
$manufacturer = "";
$topspeed = 0;
$batteryhours = 0;
$rechargetime = 0;
$chair_range = 0;
$link = "";

# Grab data from server.
$query = "select * from wheelchairs where id='$id' limit 1";
$result = mysqli_query($con, $query);
if ($result) {
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$model = $row['model'];
			$cost = $row['cost'];
			$manufacturer = $row['manufacturer'];
			$topspeed = $row['topspeed'];
			$batteryhours = $row['batteryhours'];
			$rechargetime = $row['rechargetime'];
			$chair_range = $row['chair_range'];
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
		<h1>Wheelchair <?php echo $model; ?></h1><br>
		<h2>Statistics</h2><br>
		Top speed: <?php echo $topspeed; ?> miles per hour<br>
		Battery life: <?php echo $batteryhours; ?> hours on full charge<br>
		Time to recharge from dead: <?php $hours = round($rechargetime / 60); echo $hours; ?> hours<br>
		Estimated Range: <?php echo $chair_range; ?> miles<br>
		Manufacturer: <?php echo $manufacturer; ?><br>	
		Wheelchair Price (not including insurance deduction): $<?php $amt_fmt = number_format($cost, 2, '.', ','); echo $amt_fmt; ?><br>
		Model name: <?php echo $model; ?><br>
		<a href=<?php echo $link ?> class="btn btn-primary">Buy Now</a><br><br>
		<a href="wheelchairs.php" class="btn btn-danger">Back</a>
	</body>
</html>

