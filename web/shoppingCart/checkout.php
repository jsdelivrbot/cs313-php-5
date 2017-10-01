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

  <form action="confirmation.php" method="post">
    First Name: <input type="text" name="firstName"> <br>
    Last Name: <input type="text" name="lastName"> <br>
    Street Address: <input type="text" name="streetAddress"> <br>
    City: <input type="text" name="city"><br>
    State: <select name="state">
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="DC">District Of Columbia</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MS">Mississippi</option>
      <option value="MO">Missouri</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select>
    <br>
    Zip Code <input type="text" name="zip"> <br>
    Email <input type="email" name="email"><br>
    <input type="submit" name="submit">
  </form>
  <a class="cartButton" href="browse.php">Shop some more!</a>

  <div class="footer">
    <p>Copyright 2017 Jayton Birch</p>
  </div>

</body>

</html>