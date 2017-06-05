<?php
echo "

<div class='top topbar'>
	<a href='chevbot.php' class='menutitle'>CHEVBOT</a>
	<span>
	<form method='post' action='search.php' style='position: absolute; display:inline; right: 10px; top: 5px;'>
		Search:
		<input type='text' name='search'>
		<input type='submit' value='&#128270;'>
	</form>
	</span>
	
</div>
<div class='left leftbar'>
	<br><div>Browse by Topic:</div><hr>
	<a href='browsebytopic.php?topic=1'>Science</a><br>
	<a href='browsebytopic.php?topic=2'>Religion</a><br>
	<a href='browsebytopic.php?topic=3'>Funny</a><br>
	<a href='browsebytopic.php?topic=4'>Politics</a><br><hr>
	<br>
	<a href='submit.php'>Make a Submission</a>
</div>
"
?>

