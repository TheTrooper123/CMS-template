
<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<?php 
require_once("../db/db.php");

$sql = "SELECT * FROM pages";
$result = $conn->query($sql);
$conn->close();		
?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="/_admin/styles/style.css" rel="stylesheet" type="text/css" />
	<title>Admin area</title>
	<meta name="description" content="Admin area">
	<meta name="author" content="Admin Area">
</head>
<body>
<?php
	require('includes/header.php');
?>
<?php

	require('includes/rightframe.php');
?>
<div class="content">
	<div class="graphic">
		<img src="images/cms-graphic.jpg" alt="CMS Graphic"/>
	</div>

</div>
</body>
</html>