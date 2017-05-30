<?php
$pass="53247736113d300994a1897a4ea11b45fef4df4028ca7947d16ce9bc97ac8e2b"
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
	<br><div>Browse by Topic:</div><hr>
	<a href='browsebytopic.php?topic=1'>Science</a><br>
	<a href='browsebytopic.php?topic=2'>Religion</a><br>
	<a href='browsebytopic.php?topic=3'>Funny</a><br>
	<a href='browsebytopic.php?topic=4'>Politics</a><br><hr>
	<br>
	<a href='submit.php'>Make a Submission</a>

</div>
<div class="main">
<?php
	try{
		$db = new PDO("pgsql:host=ec2-54-221-255-153.compute-1.amazonaws.com;dbname=dcej0ad937ahgp;", "ghgozncuniefut", $pass);
	}
	catch(PDOException $ex){
		echo "error: " . $ex->getMessage();
	}
	?><br>
	<h1>Make a Submission</h1>
	<form action="submitarticle.php" method="post"><br>
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
		<textarea name="content"></textarea><br><br>
		<strong>Select topics related to your article:</strong><br><br>

		<?php
			foreach ($db->query('SELECT topicname, id FROM topic')as $topic){
				echo "<input type=checkbox name='topics[]' value='" . $topic['id'] ."'>" . $topic['topicname'] . "<br>";
			}
		?>
		<br>

	<input type="submit">
	
	</form>

</div>
	
</body>