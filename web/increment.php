<?php 
	$id = $_GET['postId'];
	$thumbsup = $_GET['likes'];
	$db = NULL;
	include ("dbaccess.php");
	$db->query("UPDATE post SET thumbsup = $thumbsup WHERE id = $id;");	
?>