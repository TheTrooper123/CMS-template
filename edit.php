<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<?php
	require_once("../db/db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE pages SET url_slug=? , search_title=? , meta_desc=? , meta_nofollow=? , canonical=? , canonical_link=? , title=? , content=? , desc_html=?, html_content=? , widget_calc=? , widget_question=? , widget_faq=? , widget_reviews=? , widget_guides=? , last_updated=NOW() WHERE id=?");
		$url_slug = $_POST['url_slug'];
		$search_title =$_POST['search_title'];
		$meta_desc = $_POST['meta_desc'];
		$meta_nofollow = isset($_POST['meta_nofollow']);
		$canonical = isset($_POST['canonical']);
		$canonical_link = $_POST['canonical_link'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$desc_html = $_POST['desc_html'];
		$html_content = $_POST['html_content'];
		$widget_calc = isset($_POST['widget_calc']);
		$widget_question = isset($_POST['widget_question']);
		$widget_faq = isset($_POST['widget_faq']);
		$widget_reviews = isset($_POST['widget_reviews']);
		$widget_guides = isset($_POST['widget_guides']);
		$sql->bind_param("sssiisssssiiiiii", $url_slug, $search_title, $meta_desc, $meta_nofollow, $canonical, $canonical_link, $title, $content, $desc_html, $html_content, $widget_calc, $widget_question, $widget_faq, $widget_reviews, $widget_guides,$_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}
	}
	$sql = $conn->prepare("SELECT * FROM pages WHERE id=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>

<!doctype html>

<html lang="en">
<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="/_admin/styles/style.css" rel="stylesheet" type="text/css" />
<title>Edit '<?php echo $row["title"]?>'</title>
<meta name="description" content="Admin area">
<meta name="author" content="Admin Area">
</head>
<body>
<?php
	require('includes/header.php');
?>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>

<?php
	require('includes/rightframe.php');
?>

<div class="container">
<div class="timestamp">
<p><span>Last updated:</span> <?php if (!empty($row["last_updated"])) { echo $row["last_updated"]; } ?> | <span>Created:</span> <?php if (!empty($row["created"])) { echo $row["created"]; } ?></p>
</div>
<form content="frmUser" id="adminform" method="post" action="">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr class="light-blue">
			<th colspan="2" class="table-header">Edit - '<?php echo $row["title"]?>'</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row light-blue">		
		<tr class="table-row light-blue">
			<td class="headings">
				<ul class="edit-button-list">
					<li><div class="edit-view"><a href="/_admin/edit.php?id=<?php echo $row["id"]; ?>">Refresh page</a></div></li>
					<li><div class="edit-view"><a href="/page.php?url_slug=<?php echo $row["url_slug"]; ?>">View page</a></div></li>
				</ul>
				<label>Heading:</label>
			</td>
			<td><input name="title" type="text" class="txtField" value="<?php echo $row["title"]?>"></td>
		</tr>
		<tr class="table-row light-blue">
			<td class="headings"><label>Plain text: <span class="title">Elements of html can also be used. USE the HTML element box for complicated code.</span></label></td>
			<td class="contentedit"><textarea name="content" id="article_content" type="text"><?php echo $row["content"]?></textarea></td>
		</tr>
		<tr class="table-row light-blue">
			<td class="headings"><label>Add HTML section to page: <br /><span class="title">Used to process complicated code.</span></label>

			</td>
			<td class="contentedit">
				<div id="fsg">+ Expand +</div>
				<div id="collapse">
				<input type="text" name="desc_html" content="desc_html" class="txtField" placeholder="Add a description for the HTML...Optional" value="<?php echo $row["desc_html"]?>">
				<textarea class="content-html" name="html_content" type="text" ><?php echo htmlspecialchars($row["html_content"])?></textarea>
				</div>
				<?php if (!empty($row["html_content"])) { echo "<p class='customhtml'>Custom HTML is present. Expand to edit</p>";} ?>
			</td>
		</tr>
		</tr>
		<tr class="table-row">
		<td></td><td></td>
		</tr>
		<tr class="table-row light-blue">
			<td class="headings"><label>Page Widgets:</label></td>
			<td>
			<input type="checkbox" name="widget_calc" id="calc" value="1" <?php if ($row['widget_calc'] == 1) { ?> checked="checked" <?php } ?> > Calculator<br>
			<input type="checkbox" name="widget_question" id="question" value="1" <?php if ($row['widget_question'] == 1) { ?> checked="checked" <?php } ?> > Ask a question form<br>
			<input type="checkbox" name="widget_faq" id="faq" value="1" <?php if ($row['widget_faq'] == 1) { ?> checked="checked" <?php } ?> >  FAQs<br>
			<input type="checkbox" name="widget_reviews" id="reviews" value="1" <?php if ($row['widget_reviews'] == 1) { ?> checked="checked" <?php } ?> >  Reviews<br>
			<input type="checkbox" name="widget_guides" id="guides" value="1" <?php if ($row['widget_guides'] == 1) { ?> checked="checked" <?php } ?> >  Useful Guides<br>
			</td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input name="submit" type="submit" value="Update" class="submit" onclick="return confirm('Are you ready to update? This action cannot be undone')"></td>
		</tr>
	</tbody>
		</table>
	<p><strong>Search Engine Optimisation (SEO)</strong></p>

	<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-seo">
	<tbody>
		<tr class="table-row seopresent">
			<td class="seoheadings"><label>Search Engine discouragement:</label></td>
			<td><input type="checkbox" name="meta_nofollow" id="meta-nofollow" value="1" <?php if ($row['meta_nofollow'] == 1) { ?> checked="checked" <?php } ?> >  Check the box for search engines to discourage this page for listing<br></td>
		</tr>
		<tr class="table-row canonical">
			<td class="seoheadings"><label>Include canonical link:</label></td>
			<td><input type="checkbox" name="canonical" id="canonical" value="1" <?php if ($row['canonical'] == 1) { ?> checked="checked" <?php } ?> >  Check box needs to be checked for link to appear.<br></td>
		</tr>
		<tr class="table-row light-blue canon_show">
			<td class="headings">
				<label>Canonical link:</label>
			</td>
			<td><input name="canonical_link" id="canonical_link" type="text" class="txtField" placeholder="Please add the Canonical link inc. https://" value="<?php echo $row["canonical_link"]?>"></td>
		</tr>
		<tr class="table-row seoblue">
			<td class="seoheadings"><label>Meta page title:</label></td>
			<td><input name="search_title" type="text" class="txtField" value="<?php echo $row["search_title"]?>"></td>
		</tr>
		<tr class="table-row seoblue">
			<td class="seoheadings"><label>URL Slug (Permalink):</label></td>
			<td><input name="url_slug" type="text" class="txtField" value="<?php echo $row["url_slug"]?>"></td>
		</tr>
		<tr class="table-row seoblue">
			<td class="seoheadings"><label>Meta Description:</label></td>
			<td><input name="meta_desc" type="text" class="txtField" value="<?php echo $row["meta_desc"]?>"></td>
		</tr>
	</tbody>
		<tr class="table-row seoblue">
			<td colspan="2" class="darksubmit"><input name="submit" type="submit" value="Update" class="submit" onclick="return confirm('Are you ready to update? This action cannot be undone')"></td>
		</tr>	
	</table>
</form>
</div>
</body>
</html>