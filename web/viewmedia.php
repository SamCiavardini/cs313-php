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
	$id = $_GET["item"];
	try{
		$db = new PDO("pgsql:host=ec2-54-221-255-153.compute-1.amazonaws.com;dbname=dcej0ad937ahgp;", "ghgozncuniefut", $pass);
	}
	catch(PDOException $ex){
		echo "error: " . $ex->getMessage();
	}
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
	<h1>Comments:</h1>
	<?php
	foreach ($db->query("SELECT * FROM comment WHERE post_id = ". $id) as $comment){
		echo "<strong>" . $comment[useralias] . ": </strong>";
		echo $comment[content] ."<br><br>";

	}
	
?>
</div>
	
</body>