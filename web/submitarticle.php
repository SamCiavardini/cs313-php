<?php
	$pass="53247736113d300994a1897a4ea11b45fef4df4028ca7947d16ce9bc97ac8e2b"
	try{
		$db = new PDO("pgsql:host=ec2-54-221-255-153.compute-1.amazonaws.com;dbname=dcej0ad937ahgp;", "ghgozncuniefut", $pass);
	}
	catch(PDOException $ex){
		echo "error: " . $ex->getMessage();
	}
	$title = $_POST['title'];
	$subtitle = $_POST['subtitle'];
	$content = $_POST['content'];
	$topics = $_POST['topics'];
	$type = $_POST['type'];
	$timestamp = date('Y-m-d G:i:s');
	//echo $type;
	//var_dump($_POST['topics']);

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
</head>

<body class="mainstyle">
<div class="top topbar">
	<a href="chevbot.php" class="menutitle">CHEVBOT</a>
</div>
<div class="left leftbar">
	<br><div>Browse by Topic</div><br>
	<a href='browsebytopic.php?topic=1'>Science</a><br>
	<a href='browsebytopic.php?topic=2'>Religion</a><br>
	<a href='browsebytopic.php?topic=3'>Funny</a><br>
	<a href='browsebytopic.php?topic=4'>Politics</a><br><br>

	<hr>

</div>
<div class="main">
<h1>Thank you for your submission!</h1>
<h2>Please press here to return to the main page:</h2>
</div>
