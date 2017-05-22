<?php
$pass="Inthenavy15"
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
	<a href='browsebytopic.php?topic=4'>Politics</a><br>

</div>
<div class="main">
<?php
	try{

		$db = new PDO("pgsql:host=localhost;port=5432;dbname=chevbot;", "postgres", $pass);


	}
	catch(PDOException $ex){
		echo "error: " . $ex->getMessage();
	}
	foreach ($db->query('SELECT * FROM post') as $row)
	{
  		echo "<div class='articlecard'><a href='viewmedia.php?item=" . $row['id'] ."'><h1>" 
  		. $row['title'] . "</h1><img class='cardthumb' src='"
  		. $row['thumbnail'] . "'/><br><h2>" 
  		. $row['subtitle'] ."</h2></a>"
  		. $row['date'] . "<br><img class='thumbicon' src='thumbsup.png'/>" 
  		. $row['thumbsup'] . " <img class='thumbicon' src='thumbsdown.png'/>"
  		. $row['thumbsdown'] . "</div>";
  		
  		
  		echo '<br/>';
	}
?>
</div>
	
</body>