<?php
$pass="53247736113d300994a1897a4ea11b45fef4df4028ca7947d16ce9bc97ac8e2b"
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Scriptures!</title>
</head>

<body>
<?php
	try{

		$db = new PDO("pgsql:host=ec2-54-221-255-153.compute-1.amazonaws.com;dbname=scriptures;", "postgresql-concentric-32341", $pass);


	}
	catch(PDOException $ex){
		echo "error: " . $ex->getMessage();
	}
	foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
	{
  		echo $row['book'] . " " 
  		. $row['chapter'] .":"
  		. $row['verse'] . " - " 
  		. $row['content'];
  		
  		echo '<br/>';
	}
?>
	
</body>