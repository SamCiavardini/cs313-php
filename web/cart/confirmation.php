<?php
session_start();
echo "You have purchased the following items:<br>";
$totalPrice = 0.0;
$totalPrice = number_format($totalPrice, 3);

foreach ($_SESSION['$cart'] as $product => $info) {
	if ($info['quantity'] != 0){
		echo "<strong>".$product." (".$info['quantity'] ."): </strong>$".$info['price']." ea.<br>";
	}
$totalPrice += ($info['price'] * $info['quantity']);
}
$totalPrice = number_format($totalPrice, 2);
echo "<strong>Total: </strong>$".$totalPrice."<br><br>
	They will be shipped to the following address within the next 5-10 business days:<br>"
	.$_POST['name']."<br>"
	.$_POST['address_1']."<br>"
	.$_POST['address_2']."<br>"
	.$_POST['postalCode']."<br>";
?>
