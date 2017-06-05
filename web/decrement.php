<?php 
	$id = $_GET['postId'];
	$thumbsdown = $_GET['dislikes'];
	$db = NULL;
	include ("dbaccess.php");
	$db->query("UPDATE post SET thumbsdown = $thumbsdown WHERE id = $id;");
?>