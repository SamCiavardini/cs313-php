<?php
session_start();

if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
		case "add":
			$prices = $_SESSION['$cart'];
			$prices[$_GET["code"]]["quantity"] += 1;
			$_SESSION['$cart'] = $prices;
		break;
	}
}
else{
	$_SESSION['$cart'] = array(
		"Doggo"         => array("price" => 12.99,   "quantity" => 0, "image" => "doggo.jpg",),
		"Pupper"        => array("price" => 34.99,   "quantity" => 0, "image" => "pupper.jpg",),
		"Shoober"       => array("price" => 21.99,   "quantity" => 0, "image" => "shoober.png",),
		"Special Doggo" => array("price" => 1999.99, "quantity" => 0, "image" => "specialDoggo.jpg",),
		"Slither Doggo" => array("price" => 49.99,   "quantity" => 0, "image" => "slitherDoggo.jpg",),
		"Snip Snap doggo not the woof bork kind" => array("price" => 65.45,   "quantity" => 0, "image" => "snipSnapDoggo.jpg",),
		"Clip clop nay doggo" => array("price" => 89.99,   "quantity" => 0, "image" => "horso.jpg",),
	);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Browse Merchandise</title>
	<link rel="stylesheet" type="text/css" href="storeStyle.css">
	
</head>

<body>

<table class="productTable">
	<tr>
		<th></th>
		<th>Product</th>
		<th>Price</th>
		<th>Quantity</th>
		<th></th>
	</tr>

<?php

foreach ($_SESSION['$cart'] as $product => $info) {
	echo "
	<form method='post' action='browse2.php?action=add&code=".$product."'>
	<tr>
		<td><img class='tableImage' src='".$info['image']."'></td>
		<td>".$product."</td>
		<td>".$info['price']."</td>
		<td>".$info['quantity']."</td>
		<td><input class='tableButton' type='submit' value='Add to Cart'></td>
	</tr>
	</form>";
}

?>
</table>

<button onclick="window.location='viewCart.php'">View Cart</button>

</body>
</html>
