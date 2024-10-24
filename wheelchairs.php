<?php
session_start();
require("requires/autoload.php");
$user_data = check_login($con);
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
            <h2>Your partner in acessibility.</h2><br><br>
        </center>
	<h1>Wheelchairs</h1><br>
	<a href="./">Back</a><br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Model</th>
				<th scope="col">Top Speed</th>
				<th scope="col">Cost</th>
				<th scope="col">Manufacturer</th>
				<th scope="col">View</th>
			</tr>
		</thead>
		<tbody>
			<?php
			# Grab all of the wheelchair entries from MySQL server. (See PHPMyAdmin)
			$query = "select * from wheelchairs";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result) > 0) {
					# Loop through every result and add it to the table.
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$model = $row['model'];
						$topspeed = $row['topspeed'];
						$cost = $row['cost'];
						$amt_fmt = number_format($cost, 2, '.', ',');
						$manufacturer = $row['manufacturer'];
						$viewlink = "wheelchair_see.php?id=" . $id;
						# Display data to table
						echo "
						<tr>
							<td>" . $model . "</td>
							<td>" . $topspeed . " miles per hour</td>
							<td>$" . $amt_fmt . "</td>
							<td>". $manufacturer . "</th>
							<td><a href=". $viewlink . " class='btn btn-primary'>View</a></td>
						</tr>";
					}
				}
			}
			?>
		</tbody>
	</table>
</html>

