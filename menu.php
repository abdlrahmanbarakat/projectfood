<?php
session_start();
include_once("config.php");
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>menu</title>
<link rel="stylesheet" type="text/css" href="menu.css" >
</head>
<header class="header">
        <a href="home.php" class="logo">AB eat</a>
        <nav class="nav-items">
          
          <a href="menu.php">menu</a>
          
          <a href="home.php">log out</a>
        </nav>
      </header>
<body>
    <div class= intro>
<h1 align="center"; >Menu </h1>
<?php echo '<div class="cart-btn">
<a href="cart.php" class="button">cart</a>
</div>' ?>

<?php
$results = $mysqli->query("SELECT product_code, product_name, price FROM products ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';

while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-info">
	Price {$currency}{$obj->price} 
    <fieldset>
	
	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>

	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
</div>
<footer class="footer">
        <div class="copy">© copyright 2023 AB Jordan resturant</div>
        <div class="copy"> to contact: +962-796044013</div>
        <div class="copy">our location: Business Park </div>
      
      </footer>    
</body>

</html>