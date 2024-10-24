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
	<h1>Caregivers</h1><br>
	<a href="./">Back</a><br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Rate</th>
				<th scope="col">Rate Type</th>
				<th scope="col">View</th>
			</tr>
		</thead>
		<tbody>
			<?php
			# Grab all of the wheelchair entries from MySQL server. (See PHPMyAdmin)
			$query = "select * from caregivers";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result) > 0) {
					# Loop through every result and add it to the table.
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$rate = $row['rate'];
						$rate_type = $row['rate_type'];
						$amt_fmt = number_format($rate, 2, '.', ',');	
						$viewlink = "caregiver_see.php?id=" . $id;
						$rate_str = "";
						if ($rate_type == 1) {
							$rate_str = "Hourly";
						}
						if ($rate_type == 2) {
							$rate_str = "Daily";
						}
						# Display data to table
						echo "
						<tr>
							<td>" . $firstname . " " . $lastname . "</td>
							<td>$" . $amt_fmt . "</td>
							<td>" . $rate_str . "</td>	
							<td><a href=". $viewlink . " class='btn btn-primary'>View</a></td>
						</tr>";
					}
				}
			}
			?>
		</tbody>
	</table>
</html>

