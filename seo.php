<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<?php 
require_once("../db/db.php");

$sql = "SELECT * FROM pages";
$result = $conn->query($sql);
$conn->close();		
?>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="/_admin/styles/style.css" rel="stylesheet" type="text/css" />
	<title>Admin area</title>
</head>
<body>
<?php
	require('includes/header.php');
?>
<?php
	require('includes/rightframe.php');
?>
<div class="content">
	
<?php
	if ($result->num_rows > 0) {		
		while($row = $result->fetch_assoc()) {
?>
<div class="seo">
<table class="seo-table">
  <tbody>
	<tr>
		<td class="seotitle"><p><a href="../page.php?url_slug=<?php echo $row["url_slug"]; ?>" ><?php echo $row["title"]; ?></p>
		</td>
    </tr>
    <tr>
      <th class="seo-header">URL Slug:</th>
      <td class="seo-td"><p>/<?php echo $row["url_slug"]; ?>/</p></td>
    </tr>
    <tr>
      <th class="seo-header">Meta page title:</th>
      <td class="seo-td"><?php echo $row["search_title"]; ?> | UK Credit</td>
    </tr>
    <tr>
      <th class="seo-header">Meta Description:</th>
      <td class="seo-td"><p><?php echo $row["meta_desc"]; ?></p></td>
    </tr>
    <tr>
      <th class="seo-header">Action:</th>
      <td class="seo-td"><div class="edit"><a href="/_admin/edit.php?id=<?php echo $row["id"]; ?>" class="link">Edit</a> |</div><div class="bin"><a href="delete.php?id=<?php echo $row["id"]; ?>" class="link"><img content="delete" id="delete" title="Delete" onclick="return confirm('Are you sure you want to delete?')" src="/_admin/images/delete.png"/></a></div></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php
		}
	}
?>
</div>
</body>
</html>