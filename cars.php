<?php
session_start();
require("requires/autoload.php");
$user_data = check_login($con);

$rows_per_page = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $rows_per_page;

$total_query = "select COUNT(*) as total from cars";
$total_result = mysqli_query($con, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_rows = $total_row['total'];

$total_pages = ceil($total_rows / $rows_per_page);
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
	<h1>Cars</h1><br>
	<a href="./">Back</a><br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Manufacturer</th>
				<th scope="col">Model</th>
				<th scope="col">Price</th>
				<th scope="col">Year</th>
				<th scope="col">View</th>
			</tr>
		</thead>
		<tbody>
			<?php
			# Grab all of the wheelchair entries from MySQL server. (See PHPMyAdmin)
			$query = "select * from cars limit $rows_per_page offset $offset";
			$result = mysqli_query($con, $query);
			if ($result) {
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$id = $row['id'];
						$manufacturer = $row['manufacturer'];
						$model = $row['model'];
						$price = $row['price'];
						$year = $row['year'];
						$amt_fmt = number_format($price, 2, '.', ',');
						$viewlink = "car_see.php?id=" . $id;	
						echo "
						<tr>
							<td>" . $manufacturer . "</td>
							<td>" . $model . "</td>
							<td>$" . $amt_fmt . "</td>
							<td>". $year . "</th>
							<td><a href=". $viewlink . " class='btn btn-primary'>View</a></td>
						</tr>";		
					}
				}
			}
			?>
		</tbody>
	</table>
</html>

