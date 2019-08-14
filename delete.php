<?php 
	require_once("../db/db.php");
	
	$sql = $conn->prepare("DELETE  FROM pages WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:index.php');		
?>