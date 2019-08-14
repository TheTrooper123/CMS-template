<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<?php
require_once("../db/db.php");
?>

<?php
	if (isset($_POST['submit'])) {
		$sql = $conn->prepare("INSERT INTO pages (title,content,desc_html,html_content,widget_calc,widget_question,widget_faq,widget_reviews,widget_guides,url_slug,search_title,meta_desc,meta_nofollow,canonical,canonical_link, created) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");  
		$title = $_POST['title'];
		$content = $_POST['content'];
		$desc_html = $_POST['desc_html'];
		$html_content = $_POST['html_content'];
		$widget_calc = isset($_POST['widget_calc']);
		$widget_question = isset($_POST['widget_question']);
		$widget_faq = isset($_POST['widget_faq']);
		$widget_reviews = isset($_POST['widget_reviews']);
		$widget_guides = isset($_POST['widget_guides']);
		$url_slug = $_POST['url_slug'];
		$search_title = $_POST['search_title'];
		$meta_desc= $_POST['meta_desc'];
		$meta_nofollow = isset($_POST['meta_nofollow']);
		$canonical = isset($_POST['canonical']);
		$canonical_link= $_POST['canonical_link'];
		$sql->bind_param("ssssiiiiisssiis", $title, $content, $desc_html, $html_content, $widget_calc, $widget_question, $widget_faq, $widget_reviews, $widget_guides, $url_slug, $search_title, $meta_desc, $meta_nofollow, $canonical, $canonical_link); 
		if($sql->execute()) {
			$success_message = "Added Successfully";
		} else {
			$error_message = "Problem in Adding New Record";
		}
		$sql->close();   
		$conn->close();
	} 
?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="/_admin/styles/style.css" rel="stylesheet" type="text/css" />
	<title>Add new page</title> 	
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
<form content="frmUser" id="adminform" method="post" action="">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Add new page</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row light-blue">
			<td class="headings"><label>Heading:</label></td>
			<td><input type="text" name="title" content="title" class="title" placeholder="Add title..."></td>
		</tr>
		<tr class="table-row light-blue">
			<td class="headings"><label>Add plain Content: </br><span class="title">Elements of html can also be used. USE the HTML element box for complicated code.</span></label></td>
			<td class="contentedit"><textarea class="content-text" name="content" type="text" placeholder="Add text..."></textarea></td>
		</tr>
		<tr class="table-row light-blue">
			<td class="headings"><label>Add HTML section to page: <br /><span class="title">Used to process complicated code.</span></label>
			</td>
			<td class="contentedit">
				<div id="fsg">+ Expand +</div>
				<div id="collapse">
				<input type="text" name="desc_html" content="desc_html" class="txtField" placeholder="Add a description for the HTML...Optional">
				<textarea class="content-html" name="html_content" type="text" placeholder="Add HTML..."></textarea>
				</div>
			</td>
		</tr>
		<tr class="table-row">
		<td></td><td></td>
		</tr>
		<tr class="table-row light-blue">
			<td class="headings"><label>Page Widgets:</label></td>
			<td>
			<input type="checkbox" name="widget_calc" id="calc" value="1"> Calculator<br>
			<input type="checkbox" name="widget_question" id="question" value="1"> Ask a question form<br>
			<input type="checkbox" name="widget_faq" id="faq" value="1">  FAQs<br>
			<input type="checkbox" name="widget_reviews" id="reviews" value="1">  Reviews<br>
			<input type="checkbox" name="widget_guides" id="guides" value="1">  Useful Guides<br>
			</td>
		</tr>
		<tr class="table-row">
			<td colspan="2" class="darksubmit"><input name="submit" type="submit" value="Create page" class="submit"></td>
		</tr>
	</tbody>
</table>
<div class="seo">
<p><strong>Search Engine Optimisation (SEO)</strong></p>
</div>
	<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-seo">
	<tbody>
		<tr class="table-row seopresent">
			<td class="seoheadings"><label>Search Engine discouragement:</label></td>
			<td><input type="checkbox" name="meta_nofollow" id="meta-nofollow" value="1"> Check the box for search engines to discourage this page for listing<br></td>
		</tr>
		<tr class="table-row canonical">
			<td class="seoheadings"><label>Include canonical link:</label></td>
			<td><input type="checkbox" name="canonical" id="canonical" value="1"> Check box needs to be checked for link to appear.<br></td>
		</tr>
		<tr class="table-row light-blue canon_show">
			<td class="headings">
				<label>Canonical link:</label>
			</td>
			<td><input name="canonical_link" id="canonical_link" type="text" class="txtField" value="https://ukcredit.co.uk/"></td>
		</tr>
		<tr class="table-row seoblue">
			<td class="headings"><label>Meta page title:</label></td>
			<td><input type="text" name="search_title" content="search_title" class="txtField" placeholder="Add meta-title..."><div class="metatitle">| UK Credit</div></td>
		</tr>
		<tr class="table-row seoblue">
			<td class="headings"><label>URL Slug (Permalink):</label></td>
			<td><input type="text" name="url_slug" content="url_slug" class="txtField" placeholder="Add url slug/permalink..."></td>
		</tr>
		<tr class="table-row seoblue">
			<td class="headings"><label>Meta Description:</label></td>
			<td><input type="text" name="meta_desc" content="meta_desc" class="txtField" placeholder="Add meta description..."></td>
		</tr>
	</tbody>
		<tr class="table-row seoblue">
			<td colspan="2" class="darksubmit"><input name="submit" type="submit" value="Create page" class="submit"></td>
		</tr>	
	</table>
</form>
</div>
</body>
</html>