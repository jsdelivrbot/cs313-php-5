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

	<h2>Checkout</h2>

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

<h1>Thank's for your order!</h1>
<h2> 
  <?php 
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $streetAddress = $_POST["streetAddress"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $email = $_POST["email"];

  echo "Thank you, ";
  echo $firstName;
  echo '! You purchased ';
  echo $_SESSION["totalSodas"];
  echo " sodas! They will arrive to you shortly at the following address:
   $streetAddress $city $state $zip";
   ?>


</h2>





  <a class="cartButton" href="browse.php">Shop some more!</a>
  <div class="footer">
    <p>Copyright 2017 Jayton Birch</p>
  </div>

</body>

</html>