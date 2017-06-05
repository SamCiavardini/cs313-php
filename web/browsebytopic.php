<!DOCTYPE html>
<html lang="en">

<head>
	<title>Browse by Topic</title>
	<link rel="stylesheet" type="text/css" href="chevbotstyle.css">
	<script src="chevbot.js"></script>
</head>

<body class="mainstyle">
<?php
	include ('testheader.php');
?>
<div class="main">
<?php
	$topicId = $_GET["topic"];
	$db = NULL;
	include ("dbaccess.php");
	foreach ($db->query("SELECT topicname FROM topic WHERE id = " . $topicId) as $topic){
		echo "<h1>" . $topic[topicname] . "</h1>";
	}
	foreach ($db->query('SELECT * FROM posttopic WHERE topic_id = ' . $topicId) as $posttopic){
		foreach ($db->query('SELECT * FROM post WHERE id =' . $posttopic[post_id]) as $row) {
			
		
  		echo "<div class='articlecard'><a href='viewmedia.php?item=" . $row['id'] ."'><h1>" 
  		. $row['title'] . "</h1><img class='cardthumb' src='"
  		. $row['thumbnail'] . "'/><br><h2>" 
  		. $row['subtitle'] ."</h2></a>"
  		. $row['date'] 
  		. "<br><img onclick='increment(&quot;" . $row['id'] . "&quot;);' class='thumbicon' src='thumbsup.png'/><span id = 'l". $row['id'] ."'>" 
  		. $row['thumbsup'] 
  		. "</span><img onclick='decrement(&quot;" . $row['id'] . "&quot;);' class='thumbicon' src='thumbsdown.png'/><span id = 'd". $row['id'] ."'>" 
  		. $row['thumbsdown'] . "</div>";
  		
  		}
  		echo '<br/>';
	}
?>
</div>
	
</body>