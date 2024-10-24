<?php

function check_login($con) {
	$id = $_SESSION['account_id'];

	$query = "select * from accounts where id='$id' limit 1";
	$result = mysqli_query($con, $query);

	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		} else {
			header("Location: login.php");
		}
	}
}

?>
