<?php

function return_img($con, $name) {
	$query = "select * from image where name='$name' limit 1";
	$result = mysqli_query($con, $query);
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$path = $row['path'];
				return $path;
			}
		}
	}
}


?>
