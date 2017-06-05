<?php
	$postId = $_POST['postId'];
	$userAlias = $_POST['alias'];
	$content = $_POST['content'];
	$timestamp = date('Y-m-d G:i:s');
	
	$db = NULL;
	include ("dbaccess.php");
	
	$query = "INSERT INTO comment(post_id, date, userAlias, content) 
	VALUES ($postId, '$timestamp', '$userAlias', '$content');";
	$db->query($query);
	echo $_POST['postId'];
	echo $query;
	header ("Location: viewmedia.php?item=$postId");
?>