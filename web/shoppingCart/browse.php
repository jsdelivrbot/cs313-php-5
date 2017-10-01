<?php
// Start the session
session_start();
	if(!isset($_SESSION["dpCount"])){
		$_SESSION["dpCount"] = 0;
	}
	if(!isset($_SESSION["cokeCount"])){
		$_SESSION["cokeCount"] = 0;
	}
	if(!isset($_SESSION["jonesCount"])){
		$_SESSION["jonesCount"] = 0;
	}
	if(!isset($_SESSION["mdCount"])){
		$_SESSION["mdCount"] = 0;
	}
	if(!isset($_SESSION["spriteCount"])){
		$_SESSION["spriteCount"] = 0;
	}
	if(!isset($_SESSION["fantaCount"])){
		$_SESSION["fantaCount"] = 0;
	}

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

	<h2>Sugary bubbles of joy</h2>
	<p>Come visit us and enjoy our collection of all kinds of soda.</p>

	<ul>
  		<li><a class="active" href="#home">Home</a></li>
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

	<div class="row">
		<div class="column" style="background-color: rgb(74,176,204);">
			<p class="itemLabel">Dr.Pepper $4</p>
			<img src="https://www.drpeppersnapplegroup.com/smedia/images/201610251512img-dr-pepper-breakout-box-2-10-2-4_154504302956.png" class="product" width="400px;">
			<a class="buttonStyle" href="cart.php?data=dp">Add To Cart</a>
		</div>
		<div class="column" style="background-color: rgb(74,156,178);">
			<p class="itemLabel">Coca Cola $5</p>
			<img src="http://www.cokeconsolidated.com/files/homepagemultislides/thub_gallery_img11.jpg" class="product" width="220px;">
			<a class="buttonStyle" href="cart.php?data=coke">Add To Cart</a>
		</div>
		<div class="column" style="background-color: rgb(74,176,204);">
			<p class="itemLabel">Jones Soda $6</p>
			<img src="https://cdn.shopify.com/s/files/1/1088/7276/products/cream_front_grande.jpg?v=1505167735" class="product" width="200px;">
			<a class="buttonStyle" href="cart.php?data=jones">Add To Cart</a>
		</div>
		
	<div class="row">
		<div class="column" style="background-color: rgb(74,156,178);">
			<p class="itemLabel">Mountain Dew $3</p>
			<img src="https://www.caffeineinformer.com/wp-content/caffeine/mountain-dew-game-fuel.jpg" class="product" width="90px;">
			<a class="buttonStyle" href="cart.php?data=md">Add To Cart</a>
		</div>
		<div class="column" style="background-color: rgb(74,176,204);">
			<p class="itemLabel">Sprite $3</p>
			<img src="https://platters.drakes.com.au/wp-content/uploads/2016/10/9300675008099.jpg" class="product" width="200px;">
			<a class="buttonStyle" href="cart.php?data=sprite">Add To Cart</a>
		</div>
		<div class="column" style="background-color: rgb(74,156,178);">
			<p class="itemLabel">Fanta $2</p>
			<img src="http://www.coca-colaproductfacts.com/content/dam/productfacts/us/productDetails/ProductImages/PDP_Fanta_Orange_16oz_Bottle.png" class="product" width="90px;">
			<a class="buttonStyle" href="cart.php?data=fanta">Add To Cart</a>
		</div>
	</div>

	<div class="footer">
	  <p>Copyright 2017 Jayton Birch</p>
	</div>

</body>
</html>