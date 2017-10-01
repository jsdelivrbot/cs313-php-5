<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jayton's Soda Emporium</title>
	<link rel="stylesheet" type="text/css" href="shoppingCartStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Chewy" rel="stylesheet">
</head>
<body>
	<h1>Jayton's Soda Emporium
		<img src="sodaImage.png" width="50px">
	</h1>

	<h2>Your Cart!</h2>

	<ul>
  		<li><a class="active" href="browse.php">Home</a></li>
  		<li><a href="#news">News</a></li>
  		<li><a href="#contact">Contact</a></li>
  		<li><a href="#about">About</a></li>
  		<a class="cartBlock" href="displayCart.php"><img src="shoppingCartImage.png" alt="shopping cart" width="45" style="padding-right: 5px; float: left;">
  		<p class="cartCount" style="float: right;">(
  		<?php 
  		$total = $_SESSION["dpCount"] + $_SESSION["cokeCount"] + $_SESSION["jonesCount"] + $_SESSION["mdCount"] + $_SESSION["spriteCount"] +
  			$_SESSION["fantaCount"];
  		echo $total;
  		?>
  		)</p></a>
	</ul>

	<table>
		<tr>
			<th>Soda</th>
			<th>Price</th>
			<th>Quantity</th>
		</tr>
		<?php 
		if ($_SESSION["dpCount"] > 0) {
			echo '<tr>
					<td>Dr. Pepper</td>
					<td>$4.00</td>
					<td>';
			echo $_SESSION["dpCount"];
			echo '</td></tr>';
		}
		if ($_SESSION["cokeCount"] > 0) {
			echo '<tr>
					<td>Coca Cola</td>
					<td>$5.00</td>
					<td>';
			echo $_SESSION["cokeCount"];
			echo '</td></tr>';
		}
		if ($_SESSION["jonesCount"] > 0) {
			echo '<tr>
					<td>Jones Soda</td>
					<td>$6.00</td>
					<td>';
			echo $_SESSION["jonesCount"];
			echo '</td></tr>';
			
		}
		if ($_SESSION["mdCount"] > 0) {
			echo '<tr>
					<td>Mountain Dew</td>
					<td>$3.00</td>
					<td>';
			echo $_SESSION["mdCount"];
			echo '</td></tr>';
			
		}
		if ($_SESSION["spriteCount"] > 0) {
			echo '<tr>
					<td>Sprite</td>
					<td>$5.00</td>
					<td>';
			echo $_SESSION["spriteCount"];
			echo '</td></tr>';
		}
		if ($_SESSION["fantaCount"] > 0) {
			echo '<tr>
					<td>Fanta</td>
					<td>$2.00</td>
					<td>';
			echo $_SESSION["fantaCount"];
			echo '</td></tr>';
		}?>
	</table>
	<h2 class="total">Your total is $
		<?php
			$total = 0;
			$total = $total + ($_SESSION["dpCount"] * 4);
							+ ($_SESSION["cokeCount"] * 5);
							+ ($_SESSION["jonesCount"] * 6);
							+ ($_SESSION["spriteCount"] * 4);
							+ ($_SESSION["fantaCount"] * 4);
			echo $total;
		 ?>
	</h2>
	<a class="cartButton" href="checkout.php">Checkout!</a>
	<a class="cartButton" href="browse.php">Shop some more!</a>
	
	<div class="footer">
	  <p>Copyright 2017 Jayton Birch</p>
	</div>

</body>

</html>