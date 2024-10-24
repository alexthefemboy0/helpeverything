<?php
// Logon check
session_start();
require("requires/autoload.php");
$user_data = check_login($con);

function lookup($type, $item_id) {
	global $con;
	$query = "select * from " . $type . " where id='$item_id'";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			return $row;
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
		.card-container {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
			gap: 30px;
			padding: 20px;
			grid-auto-rows: 1fr; /* Ensures all rows are the same height */
		}

		.card {
			background-color: #f8f8f8;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			display: flex;
			flex-direction: column; /* Stack content vertically */
		}
		.stealth-button {
			color: black;
			text-decoration: none;
		}
		.vertical {
			border-left: 5px solid black;
			height: 200px;
		}
	</style>
	<body>
		<img src="images/helpeverythinglogo.png" style="width: 600px; height: 400px;"></img> 
		<h1>Hi, <strong><?php echo $user_data['username']; ?></strong></h1><br><br>
		<h2>Featured Items</h2><br>
		<div class="card-container">
			<?php
			$query = "select * from wheelchairs order by RAND() limit 1";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result)) {
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$model = $row['model'];
						$link = "wheelchair_see.php?id=" . $id;
						$imgpath = return_img($con, $model);
						echo "
						<div class='col-md-4'>
							<div class='card' style='width: 15rem;'>
								<img src=" . $imgpath . " class='card-img-top' alt='...'>
								<div class='card-body'>
						<h4 class='card-title'><strong>Wheelchair</strong></h4>
									<h5 class='card-title'>" . $model . "</h5>
									<a href=" . $link . " class='btn btn-primary'>View</a>
								</div>
							</div>
						</div>
						";
					}
				}
			}
			$query = "select * from caregivers order by RAND() limit 1";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result)) {
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$link = "caregiver_see.php?id=" . $id;
						$imgpath = return_img($con, $firstname . " " . $lastname);
						echo "
						<div class='col-md-4'>
							<div class='card' style='width: 15rem;'>
								<img src=" . $imgpath . " class='card-img-top' alt='...'>
								<div class='card-body'>
									<h4 class='card-title'><strong>Caregiver</strong></h4>
									<h5 class='card-title'>" . $firstname . " " . $lastname . "</h5>
									<a href=" . $link . " class='btn btn-primary'>View</a>
								</div>
							</div>
						</div>
						";
					}
				}
			}
			$query = "select * from cars order by RAND() limit 1";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result)) {
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$manufacturer = $row['manufacturer'];
						$model = $row['model'];
						$year = $row['year'];
						$link = "car_see.php?id=" . $id;
						$imgpath = return_img($con, $model);
						echo "
						<div class='col-md-4'>
							<div class='card' style='width: 15rem;'>
								<img src=" . $imgpath . " class='card-img-top' alt='...'>
								<div class='card-body'>
									<h4 class='card-title'><strong>Car</strong></h4>
									<h5 class='card-title'>". $year . " " . $manufacturer . " " . $model .  "</h5>
									<a href=" . $link . " class='btn btn-primary'>View</a>
								</div>
							</div>
						</div>
						";
					}
				}
			}
			$query = "select * from other order by RAND() limit 1";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result)) {
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$manufacturer = $row['manufacturer'];
						$model = $row['name'];	
						$link = "other_see.php?id=" . $id;
						$imgpath = return_img($con, $model);
						echo "
						<div class='col-md-4'>
							<div class='card' style='width: 15rem;'>
								<img src=" . $imgpath . " class='card-img-top' alt='...'>
								<div class='card-body'>
									<h4 class='card-title'><strong>Other Item</strong></h4>
									<h5 class='card-title'>". $model . "</h5>
									<a href=" . $link . " class='btn btn-primary'>View</a>
								</div>
							</div>
						</div>
						";
					}
				}
			}	
			?>
		</div><br>
		<h2>All Items</h2><br>
		<hr width="100%" style="color: #00008B;" size="8">
		<center>	
		<div class="container">
			<div class="vl"></div>
			<div class="row">
				<div class="col">
					<h3><a class="stealth-button" href="wheelchairs.php">Wheelchairs</a></h3>
				</div>
				<div class="col">
					<h3><a class="stealth-button" href="cars.php">Cars</a></h3>
				</div>
				<div class="col">
					<h3><a class="stealth-button" href="caregivers.php">Caregivers</a></h3>
				</div>
				<div class="col">
					<h3><a class="stealth-button" href="other.php">Other</a></h3>
				</div>
			</div>
		</div>
		</center>
		<hr width="100%" style="color: #00008B;" size="8"><br>
		<h2 align="left" style="text-decoration:underline;" style="font-size:32;">About Us</h2><br>
		<h3><strong>HelpEverything was created so that people with wheelchair-bound or other similar disabilities could get necessities they needed all from one place, without the hassle of searching elsewhere.</strong></h3><br>
		<p align="center"><img src="images/descr.jpeg" style="width: 450px; height: 450px;"></img></p>
    </body>
</html>
