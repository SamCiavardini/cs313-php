<?php
$pass="Inthenavy15"
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Scriptures!</title>
</head>

<body>
<?php
	try{

		$db = new PDO("pgsql:host=localhost;port=5432;dbname=scriptures;", "postgres", $pass);


	}
	catch(PDOException $ex){
		echo "error:" . $ex->getMessage();
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