<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chev's Meme Emporium</title>
    <link rel="stylesheet" type="text/css" href="homestyle.css">
    <meta charset="UTF-8">
</head>

<body>
    <div class="main">
        <div class="titleBox">Chev's Meme Emporium</div>
        <div class="memeBox">
            <?php
                $dirname = "media/";
                $images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);
                shuffle($images);
                foreach($images as $image) {
                    echo '<a href="'.$image.'"><img src="'.$image.'" />';
                }
            ?>

        </div>
    </div>
    <div class="left titleBox sideBar">
        <a href="memepage.php">Home</a><br>
        <a href="assignments.html">Assignments</a>
    </div>
	
</body>
</html>