<?php
//$pass="53247736113d300994a1897a4ea11b45fef4df4028ca7947d16ce9bc97ac8e2b";
?>

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
	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');
		if (!isset($dbUrl) || empty($dbUrl)) {
			// example localhost configuration URL with user: "ta_user", password: "ta_pass"
			// and a database called "scripture_ta"
			$dbUrl = "postgres://ta_user:ta_pass@localhost:5432/scripture_ta";
			// NOTE: It is not great to put this sensitive information right
			// here in a file that gets committed to version control. It's not
			// as bad as putting your Heroku user and password here, but still
			// not ideal.
			
			// It would be better to put your local connection information
			// into an environment variable on your local computer. That way
			// it would work consistently regardless of whether the application
			// were running locally or at heroku.
		}
		// Get the various parts of the DB Connection from the URL
		$dbopts = parse_url($dbUrl);
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');
		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		die();
	}
	foreach ($db->query('SELECT * FROM post') as $row)
	{
  		echo "<div class='articlecard'><a href='viewmedia.php?item=" . $row['id'] ."'><h1>" 
  		. $row['title'] . "</h1><img class='cardthumb' src='"
  		. $row['thumbnail'] . "'/><br><h2>" 
  		. $row['subtitle'] ."</h2></a>"
  		. $row['date'] 
  		. "<br><img onclick='increment(&quot;" . $row['id'] . "&quot;);' class='thumbicon' src='thumbsup.png'/><span id = 'l". $row['id'] ."'>" 
  		. $row['thumbsup']
  		. "</span><img onclick='decrement(&quot;" . $row['id'] . "&quot;);' class='thumbicon' src='thumbsdown.png'/><span id = 'd". $row['id'] ."'>" 
  		. $row['thumbsdown'] . "</div><br><hr>";
	}
?>
</div>
	
</body>