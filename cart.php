<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shopping cart</title>
<link rel="stylesheet" type="text/css" href="cart.css" >
</head>
<header class="header">
        <a href="home.php" class="logo">AB eat</a>
        <nav class="nav-items">
          <a href="home.php">Home</a>
          <a href="menu.php">menu</a>
          <a href="about.php">about us</a>
          <a href="login.php">sign up\log in</a>
        </nav>
      </header>
<body>
	<div class=intro>
<h1 align="center">Shopping Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) 
    {
		$total = 0; 
		$b = 0; 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			$subtotal = ($product_price * $product_qty); 
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; 
		    echo '<tr class="'.$bg_color.'">';
			echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$currency.$product_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); 
        }
		echo '<tr><td colspan="4" align="right">Total : '.$currency.$total.'</td></tr>';

	}
    ?>
    <tr><td colspan="5"><<a href="menu.php" class="back-to-menu">back to menu</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
</div>
<footer class="footer">
        <div class="copy">© copyright 2023 AB Jordan resturant</div>
        <div class="copy"> to contact: +962-796044013</div>
        <div class="copy">our location: Business Park </div>
      
      </footer>   

</body>
</html>