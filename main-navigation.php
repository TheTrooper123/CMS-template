<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<?php 
require_once("../db/db.php");
?>
<?php
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
<img src="/_admin/images/logo.jpg" alt="logo"/><br />

<table width="20%" border="0">
  <caption>
    Main Navigation
  </caption>
  <tbody>
    <tr class="main-nav-row">
      <th scope="col" class="main-nav-main-select">
<select name="first-box">
<?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['main_nav']==1) { 
        echo "<option value='1' selected>" . $row["title"] . "</option>"; 
    } else if ($row['main_nav']!==1) {
        echo "<option value='1'>" . $row["title"] . "</option>";
    }
}
}
?>
</select>
	  </th>
      <th scope="col" class="main-nav-main-select">
<select name="second-box">
<?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['main_nav']==2) { 
        echo "<option value='2' selected>" . $row["title"] . "</option>"; 
    } else if ($row['main_nav']!==2) {
        echo "<option value='2'>" . $row["title"] . "</option>";
    }
}
}
?>
</select>	  
	  </th>
      <th scope="col" class="main-nav-main-select">
<select name="third-box">
<?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['main_nav']==3) { 
        echo "<option value='3' selected>" . $row["title"] . "</option>"; 
    } else if ($row['main_nav']!==3) {
        echo "<option value='3'>" . $row["title"] . "</option>";
    }
}
}
?>
</select>	  
	  </th>
      <th scope="col" class="main-nav-main-select">
<select name="fourth-box">
<?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['main_nav']==4) { 
        echo "<option value='4' selected>" . $row["title"] . "</option>"; 
    } else if ($row['main_nav']!==4) {
        echo "<option value='4'>" . $row["title"] . "</option>";
    }
}
}
?>
</select>	  
	  </th>
      <th scope="col" class="main-nav-main-select">
<select name="fifth-box">
<?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['main_nav']==5) { 
        echo "<option value='5' selected>" . $row["title"] . "</option>"; 
    } else if ($row['main_nav']!==5) {
        echo "<option value='5'>" . $row["title"] . "</option>";
    }
}
}
?>
</select>	  
	  </th>
    </tr>
    <tr>
      <td><select>
	  <option value=''>none</option>
	  <?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['sub_nav']==1) { 
        echo "<option value='1' selected>" . $row["title"] . "</option>"; 
    } else if ($row['sub_nav']!==1) {
        echo "<option value=''>" . $row["title"] . "</option>";
    }
}
}
?>
</select>
</td>
      <td><select>
	  	  <?php
if ($result->num_rows > 0) {        
mysqli_data_seek($result,0);
while($row = $result->fetch_assoc()) {
    if($row['sub_nav']==2 && ['sub_nav_order'] ==1) { 
        echo "<option value='1' selected>" . $row["title"] . "</option>"; 
    } else if ($row['sub_nav']!==2) {
        echo "<option value=''>" . $row["title"] . "</option>";
    }
}
}
?>
	  </select></td>
      <td><select></select></td>
      <td><select></select></td>
      <td><select></select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>