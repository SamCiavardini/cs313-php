<?php
session_start();
if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
		case "remove":
			$prices = $_SESSION['$cart'];
			$prices[$_GET["code"]]["quantity"] = 0;
			$_SESSION['$cart'] = $prices;
		break;
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>View Cart</title>
</head>

<body>	
<?php
$totalPrice = 0.0;

echo "<table>";
foreach ($_SESSION['$cart'] as $product => $info) {
	if ($info["quantity"] != 0){
		echo "
		<form method='post' action='viewCart.php?action=remove&code=".$product."'>
		<tr>
			<td>".$product."</td>
			<td>".$info['price']."</td>
			<td>".$info['quantity']."</td>
			</td><td><input type='submit' value='Remove'></td>
		</tr>
		</form>";
	}
	$totalPrice += ($info['price'] * $info['quantity']);
	
}
echo "<tr>
	<td>Total:</td><td>".$totalPrice."</td>
</tr>";
?>

</table>
<button onclick="window.location='checkout.php'">Checkout</button>

</body>
</html>