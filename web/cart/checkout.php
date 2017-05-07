<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Checkout</title>
</head>

<body>	
<?php

?>


<form method="post" action="confirmation.php">
	<strong>Name</strong>
	<input type="text" name="name"><br>
	<strong>Address1</strong>
	<input type="text" name="address_1"><br>
	<strong>Address2</strong>
	<input type="text" name="address_2"><br>
	<strong>Postal Code</strong>
	<input type="text" name="postalCode"><br>
	
	<input type="submit" value="Confirm Purchase">
</form>
<button onclick="window.location='viewCart.php'">Return to Cart</button>

</body>
</html>