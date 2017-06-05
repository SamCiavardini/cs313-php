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
<?php
	$id = $_GET["item"];
	
	$db = NULL;
	include ("dbaccess.php");
	
	foreach ($db->query("SELECT * FROM post WHERE id = ". $id) as $thepost){
  		echo "<h1>" . $thepost[title] . "</h1><br><img src='" . $thepost[thumbnail] . "'/><h2>" 
  		. $thepost[subtitle] . "</h2>";
  		
  		
  		echo '<br/>';
	}?>
	<h3>Topics:</h3>
	<?php
	

	foreach ($db->query("SELECT * FROM posttopic WHERE post_id = ". $id) as $posttopic){
		foreach ($db->query("SELECT topicname FROM topic WHERE id = ". $posttopic[topic_id]) as $topicName){
			echo "<strong>" . $topicName[topicname] . ", </strong>";
		}

	}
	foreach ($db->query("SELECT content FROM post WHERE id = " . $id) as $post){
		echo "<br><br>" . $post[content];
	}?>
	<br><br>
	<input type="button" id="typeComment" value="Add a comment..." onclick="setvisible();">
	<form  method="post" action="submitComment.php" id="commentInput" style="display: none;">
		<strong>Name or Alias:</strong><br>
		<input type="text" name="alias"><br>

		<strong>Comment:</strong><br>
		<textarea name="content"></textarea>

		<input type="hidden" name="postId" <?php echo "value='" . $id . "'";?>"><br>
		<input type="submit">

	</form>
	<h1>Comments:</h1>
	<?php
	foreach ($db->query("SELECT * FROM comment WHERE post_id = ". $id) as $comment){
		echo "<strong>" . $comment[useralias] . ": </strong>";
		echo $comment[content] ."<br><br>";

	}
	
	?>
</div>
	
</body>