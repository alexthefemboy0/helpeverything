<?php

require("sql.php");
require("functions.php");
require("images.php");

if (isset($_GET['initjs'])) {
	$js = $_GET['initjs'];
	echo "<script> " . $js . "</script>";
}

?>
