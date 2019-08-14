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
<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" colspan="2" width="100px">Action</th>
				<th class="table-header">Title</th>

			  </tr>
		</thead>
		<tbody>	
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
				<td class="table-row" colspan="2" width="100px"><div class="edit"><a href="/_admin/edit.php?id=<?php echo $row["id"]; ?>" class="link">Edit</a> |</div><div class="bin"><a href="delete.php?id=<?php echo $row["id"]; ?>" class="link"><img content="delete" id="delete" title="Delete" onclick="return confirm('Are you sure you want to delete?')" src="/_admin/images/delete.png"/></div>
				</a>
				</td>
				<td class="table-row"><a href="/page.php?url_slug=<?php echo $row["url_slug"]; ?>"><?php echo $row["title"]; ?></a></td>
				<!-- action -->
				</tr>
		
			<?php
					}
				}
				
			?>
		</tbody>
	</table>
</div>
</body>
</html>