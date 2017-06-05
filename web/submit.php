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
	$db = NULL;
	include ("dbaccess.php");
	?><br>
	<h1>Make a Submission</h1>
	<form action="submitarticle.php" method="post" enctype="multipart/form-data"><br>
		<strong>Type:</strong><br>
		<select name="type">
			<?php
			foreach ($db->query('SELECT typename, id FROM type')as $type){
			echo "<option value='" . $type['id'] ."'>" . $type['typename'] . "</option><br>";
			}?>
		</select><br><br>

		<strong>Title:</strong><br>
		<input type="text" name="title"><br><br>

		<strong>Subtitle:</strong>
		<br><input type="text" name="subtitle"><br><br>
		
		<strong>Content:</strong><br>
		<textarea name="content" style="height: 100px; width: 500px;"></textarea><br><br>

		<strong>Select topics related to your article:</strong><br><br>
		<?php
			foreach ($db->query('SELECT topicname, id FROM topic')as $topic){
				echo "<input type=checkbox name='topics[]' value='" . $topic['id'] ."'>" . $topic['topicname'] . "<br>";
			}
		?>
		<br>	


	<input type="submit" name="submit">
	
	</form>

</div>
	
</body>