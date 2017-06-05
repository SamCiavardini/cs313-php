<?php
	$db = NULL;
	include ("dbaccess.php");
	$title = $_POST['title'];
	$subtitle = $_POST['subtitle'];
	$content = $_POST['content'];
	$topics = $_POST['topics'];
	$type = $_POST['type'];
	$timestamp = date('Y-m-d G:i:s');
	$thumbnail = $_POST[''];


	$query = "INSERT INTO post(title, subtitle, content, type_id, date)
	VALUES ('". $title ."', '" . $subtitle . "', '" . $content . "', " . $type . ", '" . $timestamp . "');";
	//echo $query;
	$db->query($query);
	$postId = $db->lastInsertId();

	foreach ($topics as $key => $value) {
		$query2 = "INSERT INTO posttopic(post_id, topic_id)
		VALUES (" . $postId .", " . $value . ");";
		//echo $query2;
		$db->query($query2);
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Chev Bot</title>
	<link rel="stylesheet" type="text/css" href="chevbotstyle.css">
	<script src="chevbot.js"></script>
</head>

<body class="mainstyle">
<?php
	include ('testheader.php');
?>
<div class="main">
<h1>Thank you for your submission!</h1>
<strong>Now please upload an image for your submission:</strong><br><br>

<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="postId" <?php echo "value='" . $postId . "'";?>">
    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
    <input type="submit" value="Upload Image" name="submit">

</form>


</div>
</body>
</html>
