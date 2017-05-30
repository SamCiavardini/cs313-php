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
	<a href='chevbot.php' class="menutitle">CHEVBOT</a>
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
	$topicId = $_GET["topic"];
	try{
		$db = new PDO("pgsql:host=ec2-54-221-255-153.compute-1.amazonaws.com;dbname=dcej0ad937ahgp;", "ghgozncuniefut", $pass);
	}
	catch(PDOException $ex){
		echo "error: " . $ex->getMessage();
	}
	foreach ($db->query("SELECT topicname FROM topic WHERE id = " . $topicId) as $topic){
		echo "<h1>" . $topic[topicname] . "</h1>";
	}
	foreach ($db->query('SELECT * FROM posttopic WHERE topic_id = ' . $topicId) as $posttopic){
		foreach ($db->query('SELECT * FROM post WHERE id =' . $posttopic[post_id]) as $row) {
			
		
  		echo "<div class='articlecard'><a href='viewmedia.php?item=" . $row['id'] ."'><h1>" 
  		. $row['title'] . "</h1><img class='cardthumb' src='"
  		. $row['thumbnail'] . "'/><br><h2>" 
  		. $row['subtitle'] ."</h2></a>"
  		. $row['date'] . "<br><img class='thumbicon' src='thumbsup.png'/>" 
  		. $row['thumbsup'] . " <img class='thumbicon' src='thumbsdown.png'/>"
  		. $row['thumbsdown'] . "</div>";
  		
  		}
  		echo '<br/>';
	}
?>
</div>
	
</body>