<?php
session_start();
require("requires/autoload.php");

if (isset($_SESSION['account_id'])) {
	unset($_SESSION['account_id']);
}

header("Location: login.php");
?>
